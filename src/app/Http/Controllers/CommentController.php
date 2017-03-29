<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
    * Show all the comments
    *
    */
    public function index(Post $post)
    {
    	return $post->comments()->get();
    }

    /**
    * Show all the comments
    *
    */
    public function show(Post $post, $comments)
    {
    	dd($post->comments()->find($comments));
    	return $post->comments()->find($comments);
    }

    /**
    * Add Comment to the given Post
    *
    */
    public function addComment(Request $request ,Post $post)
    {
    	$user = Auth::user();

		$comment = $post->comment([
		    'body' => $request->comment,
		], $user);

		return back();

    }

    /**
    * Delete Comment of the given Post
    *
    */
    public function deleteComment(Post $post, $comment)
    {
    	$post->deleteComment($comment);
    }
}
