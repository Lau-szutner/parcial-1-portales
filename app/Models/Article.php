<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // protected $table = 'articles';

    protected $fillable = ['title', 'img', 'category', 'time-to-read', 'author', 'content_path', 'excerpt'];
}
