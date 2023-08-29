<?php

namespace App\Models\Cv;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cv extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fullname',
        'email',
        'title',
        'location',
        'contact_number',
        'skills',
        'objective',
        'experience',
        'projects',
        'education',
        'image_name',
        'image_path',
        'experience',
        'linkedin_link',
        'github_link',
        'language',
        'certification_training',
    ];

    public function user():HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
