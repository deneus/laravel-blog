<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


/**
 * Class Article
 *
 * @package App\Http\Entities
 * @property int $id
 * @property string $title
 * @property string $subtitle
 * @property string $slug
 * @property string $content
 * @property int $category_id
 */
class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'slug',
        'content',
        'category_id'
    ];

    public function formattedDate()
    {
        return date_format($this->created_at, 'd/m/Y');
    }

    /**
     * Allow the access to "category" entity.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'article_tag');
    }
}
