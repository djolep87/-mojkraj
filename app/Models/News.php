<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'summary',
        'images',
        'videos',
        'category',
        'is_published',
        'is_featured',
        'views',
        'likes',
    ];

    protected function casts(): array
    {
        return [
            'images' => 'array',
            'videos' => 'array',
            'is_published' => 'boolean',
            'is_featured' => 'boolean',
            'views' => 'integer',
            'likes' => 'integer',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(NewsComment::class, 'news_id')->whereNull('parent_id');
    }

    public function allComments()
    {
        return $this->hasMany(NewsComment::class, 'news_id');
    }

    public function likes()
    {
        return $this->hasMany(NewsLike::class, 'news_id');
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function incrementViews()
    {
        $this->increment('views');
    }

    public function incrementLikes()
    {
        $this->increment('likes');
    }
}