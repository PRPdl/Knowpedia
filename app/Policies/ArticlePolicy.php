<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;


class ArticlePolicy
{
    use HandlesAuthorization;


    public function create(User $user, Article $article)
    {
        return $user->is(auth()->user());
    }

    public function update(User $user, Article $article)
    {
        return $article->user->is($user);
    }

}
