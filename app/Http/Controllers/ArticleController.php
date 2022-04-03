<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Redirect;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->paginate(10);
        return view('article.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\ArticleRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ArticleRequest $request)
    {
        $this->build($request, new Article());

        return Redirect::route('article.index')->with('success', 'Article successfully created');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Article $article
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Article $article)
    {
        return view('article.edit', [
            'article' => $article,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\ArticleRequest $request
     * @param \App\Models\Article $article
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $this->build($request, $article);

        return Redirect::route('article.index')
            ->with('success', 'Article successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Article $article
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return Redirect::route('article.index')
            ->with('success', 'Article successfully deleted.');
    }

    /**
     * Build the model object and save.
     *
     * @param \App\Http\Requests\ArticleRequest $request
     * @param \App\Models\Article $article
     */
    private function build(ArticleRequest $request, Article $article) {
        $article->title = $request->get('title');
        $article->subtitle = $request->get('subtitle');
        $article->content = $request->get('content');
        $article->category_id = $request->get('category_id');
        $article->save();
    }
}
