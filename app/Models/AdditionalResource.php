<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalResource extends Model
{
    use HasFactory;
    //this is the database handling of the additional resource page
    //where we can see or allow only this column in the database can be added
    protected $fillable = [
      'title',
        'source',
        'url',
        'image',
    ];
}
