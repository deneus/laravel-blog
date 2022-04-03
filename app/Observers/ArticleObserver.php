<?php

namespace App\Observers;

use App\Models\Article;
use Cocur\Slugify\Slugify;
use Illuminate\Support\Str;

class ArticleObserver
{

    private Slugify $slugify;

    /**
     * ArticleObserver constructor.
     */
    public function __construct() {
        $this->slugify = new Slugify();
    }


    /**
     * Store the slug of an article.
     *
     * @param \App\Models\Article $article
     */
    private function storeSlug(Article $article) {
//        $article->slug = $this->slugify->slugify($article->title);
        $article->slug = Str::slug($article->title);
        $article->save();
    }


    private function generateSlug(Article $article) {
        return Str::slug($article->title);
    }


    /**
     * Handle the Article "created" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function created(Article $article)
    {
//        $this->storeSlug($article);
        $article->slug = $this->generateSlug($article);
        $article->save();
    }

    /**
     * Handle the Article "updated" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function updated(Article $article)
    {
        // We need to ensure there is a change otherwise it crashes the seeding.
//        if ($article->slug !== $article->getChanges()['slug']) {
//            $this->storeSlug($article);
//        }
        $article->slug = $this->generateSlug($article);
        $article->saveQuietly();
    }


    /**
     * Handle the Article "deleted" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function deleted(Article $article)
    {
        //
    }

    /**
     * Handle the Article "restored" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function restored(Article $article)
    {
        $this->storeSlug($article);
    }

    /**
     * Handle the Article "force deleted" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function forceDeleted(Article $article)
    {
        //
    }
}
