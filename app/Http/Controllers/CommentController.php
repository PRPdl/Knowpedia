<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Article $article, Comment $comment) {
        $comment->user_id = auth()->user()->id;
        $comment->article_id = $article->id;
        $comment->comment = \request('comment');
        $comment->save();

        return redirect($article->path());
    }

    public function markAsBest(Comment $comment){

        $this->authorize('update-article', $comment->article);

        $comment->article->best_reply_id = $comment->id;
        $comment->article->save();

        return redirect($comment->article->path());
    }
}
