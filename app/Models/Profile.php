<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use Uuids;
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'mobile',
        'gender',
        'date_of_birth',
        'avatar',
        'url_website',
        'url_github',
        'url_facebook',
        'url_twitter',
        'url_instagram',
        'url_linkedin',
        'address',
        'bio',
        'user_metadata',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}