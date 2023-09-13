<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Cv\Cv;
use App\Models\Post\Post;
use App\Models\Profile\UserProfile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function userProfile():HasOne
    {
        return $this->hasOne(UserProfile::class, 'user_id', 'id');
    }

    public function userCv():HasOne
    {
        return $this->hasOne(Cv::class, 'id', 'user_id');
    }

    public function user():HasMany
    {
        return $this->hasMany(Post::class,'id','user_id');
    }

    public function PostReaction():BelongsToMany
    {
        return $this->belongsToMany(Post::class,'post_reactions','user_id','post_id');
    }
}
