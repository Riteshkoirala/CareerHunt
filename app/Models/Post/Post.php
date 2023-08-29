<?php

namespace App\Models\Post;

use App\Models\Post\comments\Comments;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'message',
        'user_id',
        'updated_at',
    ];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('message', 'like', '%' . request('search') . '%');
        }
    }
    public function postImages():HasMany
    {
        return $this->hasMany(PostImage::class,'post_id','id');
    }

    public function postComment():HasMany
    {
        return $this->hasMany(Comments::class,'post_id', 'id');
    }
}
