<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable implements MustVerifyEmail
{
    use HasRoles,HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'banner_image',
        'image',
        'phone',
        'about',
        'bio',
        'meta_title',
        'meta_desc',
        'status',
        'review_avg',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'user_tags', 'user_id','tag_id');
    }
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'user_categories', 'user_id','category_id');
    }
    public function types()
    {
        return $this->belongsToMany('App\Models\Type', 'user_types', 'user_id','type_id');
    }
}
