<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class Article extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function path() {
        return route('articles.show', $this);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function comments(){
       return $this->hasMany(Comment::class);
    }

}

