<?php

namespace App\Http\Controllers\User;

use File;
use Auth;
use Image;
use Session;
use App\Post;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the Posts.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 15;
        $users = auth()->user()->getFriends()->pluck('id');
        $users[] = auth()->user()->id; 

        if (!empty($keyword)) {
            $posts = Post::WhereIn('user_id', $users)
                ->where('body', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->with('likesCounter', 'user')
                ->latest()
                ->paginate($perPage);
        } else {
            $posts = Post::WhereIn('user_id', $users)->with('likesCounter', 'user', 'comments.creator')->latest()->paginate($perPage);
        }
        // dd($posts);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new Post.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created Post in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $image = Image::make($request->file('image'))->resize(null, 400, function ($constraint) {
                $constraint->aspectRatio();
            });
        $imageFolder = 'posts/';
        $imageExt = $request->file('image')->getClientOriginalExtension();
        $imageName = Auth::id() . str_random(10) . time() . '.' .$imageExt;
        $imagePath = $imageFolder . $imageName;
        
        $requestData = [
            'body' => $request->body,
            'user_id' => $user->id,
            'image'  => $imagePath
        ];

        $image->save(storagePath($imagePath), 60);

        $post = Post::create($requestData);

        return redirect('/posts');
    }

    /**
     * Display the specified Post.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {

        $post = Post::findOrFail($id);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified Post.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        $this->authorize('update', $post);
        

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified Post in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $post = Post::findOrFail($id);

        $this->authorize('update', $post);

        $post->update($requestData);

        Session::flash('flash_message', 'Post updated!');

        return redirect('posts');
    }

    /**
     * Remove the specified Post from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        
        $this->authorize('delete', $post);

        Post::destroy($id);

        Session::flash('flash_message', 'Post deleted!');

        return redirect('posts');
    }

    public function likePost(Post $post)
    {
        $post->like();
        return back();
    }
    public function unlikePost(Post $post)
    {
        $post->unlike();
        return back();
    }
}
