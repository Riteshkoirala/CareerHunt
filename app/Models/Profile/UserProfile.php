<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'location',
        'contact_number',
        'skills',
        'education',
        'image_name',
        'image_path',
        'cv_path',
        'college_name',
        'about',
        'experience',
        'linkedin_link',
        'updated_by',
    ];

    public function user():HasOne
    {
        return $this->hasOne(UserProfile::class,'user_id', 'id');
    }
}
