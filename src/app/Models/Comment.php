<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";
    protected $primaryKey = "id";

    protected $fillable = [
        'article_id',
        'comment'
    ];
    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
