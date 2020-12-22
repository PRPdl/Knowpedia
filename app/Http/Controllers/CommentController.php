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

    public function update(Comment $comment){

        $this->authorize($comment->article);

        $comment->setBestReply();

        return redirect($comment->article->path());
    }
}
