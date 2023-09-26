<?php

namespace App\Models\Profile;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserProfile extends Model
{
    use HasFactory;
    //this is the database handling of the assessmetnResult page
    //where we can see or allow only this column in the database can be added
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
//this is to show relation between the user and the userprofile table
    public function user():HasOne
    {
        return $this->hasOne(User::class,'user_id', 'id');
    }
}
