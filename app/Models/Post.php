<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Uuids;
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'content',
        'category_id',
        'image',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'hits',
        'status',
        'moderated_by',
        'moderated_at',
        'created_by',
        'updated_by',
        'deleted_by',
        'published_at',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}