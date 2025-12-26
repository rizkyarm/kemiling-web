<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id','title','slug','excerpt','content',
        'cover_image','meta_title','meta_description',
        'status','published_at','is_pinned','view_count',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_pinned'    => 'boolean',
        'view_count'   => 'integer',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function images()
    {
        return $this->hasMany(NewsImage::class)->orderBy('position');
    }
}
