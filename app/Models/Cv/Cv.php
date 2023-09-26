<?php

namespace App\Models\Cv;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cv extends Model
{
    use HasFactory;

    //this is the database handling of the cv page
    //where we can see or allow only this column in the database can be added
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
//this function defines the relation ofthe table between cv and user table
    public function user():HasOne
    {
        //it says tahat it has one to one relationship
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
