<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleTag;

class MainController extends Controller
{
    public static function articles() {

        $articles = Article::orderBy('id', 'desc')->paginate(4);
        return view('articles', [
            'articles' => $articles,
        ]);
    }

    public static function article(Article $article) {
        return view('article', [
            'article' => $article,
        ]);
    }
}
