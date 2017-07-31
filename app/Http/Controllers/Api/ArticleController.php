<?php

namespace App\Http\Controllers\Api;

use App\Article;
use App\Http\Controllers\Controller;
use App\Transformers\ArticleTransformer;

class ArticleController extends Controller
{
    protected $articleUrl = '/article/';

    public function index()
    {
        $articles = Article::with('author')->get();

        return response(
            fractal()
            ->collection($articles)
            ->transformWith(new ArticleTransformer())
            ->toArray()['data']
        );
    }

    public function create()
    {
        $request = request();
        $validator = \Validator::make($request->all(), [
            'title' => 'required|max:255',
            'author_id' => 'required|exists:authors,id',
            'content' => 'required'
        ]);

        if ($validator->fails()) {
            return response($validator->errors()->toArray(), 422);
        } else {
            $article = Article::create($request->only('title', 'author_id', 'content'));
            $article->update([
                'url' => $this->articleUrl . $article->id
            ]);
            $article->load('author');

            return response(fractal()
                ->item($article)
                ->transformWith(new ArticleTransformer())
                ->toArray()['data']
            );
        }
    }
}
