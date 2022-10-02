<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Uuids;

class Setting extends Model
{
    use Uuids;
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'app_name',
        'footer_text',
        'email',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'linkedin_url',
        'youtube_url',
        'meta_site_name',
        'meta_description',
        'meta_keyword',
        'meta_image',
        'meta_fb_app_id',
        'meta_twitter_site',
        'meta_twitter_creator',
        'google_analytics',
    ];
}