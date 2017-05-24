<?php

namespace App\Http\Controllers\User;

use Auth;
use File;
use Image;
use Session;
use App\Post;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Notifications\PostLiked;
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
        return view('posts.index');
    }

    /**
     * Display a listing of the Posts.
     *
     * @return App\Posts
     */
    public function posts(Request $request)
    {
        $perPage = 10;
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
        return $posts;
    }

    public function usersposts()
    {
        $perPage = 10;
        $users = [];
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
        return $posts;   
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
        $imagePath = null;
        if($request->hasFile('image')){
            $image = Image::make($request->file('image'))->resize(null, 400, function ($constraint) {
                $constraint->aspectRatio();
            });
            $imageFolder = 'posts/';
            $imageExt = $request->file('image')->getClientOriginalExtension();
            $imageName = Auth::id() . str_random(10) . time() . '.' .$imageExt;
            $imagePath = $imageFolder . $imageName;

            $image->save(storagePath($imagePath), 60);
        }
        

        $requestData = [
            'body' => $request->body,
            'user_id' => $user->id,
            'image'  => $imagePath
        ];

        $post = Post::create($requestData);

        return $post->load('likesCounter', 'user', 'comments.creator');
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

        return redirect('posts');
    }

    public function likePost(Post $post)
    {

        $post->like();
        
        /*Notify the user to whome the post belong to */
        $notifiableUser = $post->user;
        $notifiableUser->notify(new PostLiked(auth()->user(), $post));

        return back();
    }
    public function unlikePost(Post $post)
    {
        $post->unlike();
        return back();
    }
}
