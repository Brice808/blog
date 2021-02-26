<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\CommentRequest;
use App\Models\{Post, Comment};

class CommentController extends Controller
{
    public function __construct()
    {
        if (!request()->ajax()) {
            abort(403);
        }
    }

    public function store(CommentRequest $request, Post $post)
    {
        $data = [
            'body' => $request->message,
            'post_id' => $post->id,
            'user_id' => $request->user()->id,
        ];

        $request->has('commentId') ?
            Comment::findOrFail($request->commentId)->children()->create($data) :
            Comment::create($data);

            $commenter = $request->user();

            return response()->json($commenter->valid ? 'ok' : 'invalid');
    }

    public function destroy()
    {
    }

    /**
     * Get the comments for the specified post.
     *
     * @param  \App\Models\Post  $post
     * @param  integer $page
     * @return array
     */
    public function comments(Post $post)
    {
        $comments = $post->validComments()
            ->withDepth()
            ->latest()
            ->get()
            ->toTree();

        return [
            'html' => view('front/comments', compact('comments'))->render(),
        ];
    }
}
