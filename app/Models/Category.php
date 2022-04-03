<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model Category.
 *
 * @property int id
 * @property string label
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
    ];

    public function articles() {
        return $this->hasMany(Article::class);
    }
}
