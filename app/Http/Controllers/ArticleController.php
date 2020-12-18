<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;
use GuzzleHttp\Promise\Create;

use function PHPSTORM_META\type;

class ArticleController extends Controller
{

    public function index(Article $article) {

        if(request()->has('tag')){

            return view('articles.index', ['articles'=> Tag::where('tag', request('tag'))->firstOrFail()->articles]);

        }
        return view('articles.index', ['articles'=> $article->latest()->get()]);

    }

    public function show(Article $article) {

        return view('articles.show', compact('article'));
    }

    public function create(Tag $tags) {
        return view('articles.create' , ['tags' => $tags->all()]);
    }

    public function store(Article $article) {

        $this->validateArticle();
        $article = new $article(request(['title', 'excerpt','body']));
        $article->user_id = 4;
        $article->save();

        $article->tags()->attach(request('tags'));

        return redirect(route('articles'));
    }

    public function edit(Article $article) {
        $tags = Tag::all();
        $originalTags = $article->tags->pluck('id')->toArray();
        return view('articles.edit', compact(['article', 'tags', 'originalTags']));
    }

    public function update(Article $article) {

       $article->update($this->validateArticle());
       $article->user_id = 3;
       $article->save();

       $article->tags()->detach();
       $article->tags()->attach(request('tags'));

        return redirect($article->path());
    }

    public function destroy(Article $article) {
        try {
            $article->delete();
        } catch (\Exception $e) {
            return response()->json(['error' => $e, 401]);
        }
        return redirect(route('articles'));

    }

    public function validateArticle(): array
    {

        return request()->validate([
            'title' => 'required|max:50|min:10',
            'excerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id'
        ]);
    }
}
