<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable =[
      'contact_fullname',
      'contact_email',
      'contact_numbers',
      'contact_message',
        'is_read',
    ];
}
