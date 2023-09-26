<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    //this is the database handling of the contact page
    //where we can see or allow only this column in the database can be added
    protected $fillable =[
      'contact_fullname',
      'contact_email',
      'contact_numbers',
      'contact_message',
        'is_read',
    ];
}
