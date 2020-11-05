<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'author',
        'short_text',
        'full_text',
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'article_id', 'id');
    }

}
