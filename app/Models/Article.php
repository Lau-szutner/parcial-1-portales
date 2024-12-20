<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;

    // protected $table = 'articles';

    protected $fillable = ['title', 'img', 'category', 'time', 'author', 'body', 'excerpt', 'nivel_fk'];


    public function nivel(): BelongsTo
    {
        return $this->belongsTo(Nivel::class, 'nivel_fk', 'nivel_id');
    }

    public function topics()
    {
        return $this->belongsToMany(
            Topic::class,
            'articles_have_topics',
            'article_fk',
            'topic_fk',
            'id',
            'topic_id'
        );
    }
}
