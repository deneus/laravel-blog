<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['label'];

    /**
     * The roles that belong to the user.
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_tag');
    }
}
