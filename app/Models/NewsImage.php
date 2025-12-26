<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewsImage extends Model
{
    use HasFactory;

    protected $fillable = ['news_id','path','alt','caption','credit','position'];

    protected $casts = [
        'position' => 'integer',
    ];

    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
