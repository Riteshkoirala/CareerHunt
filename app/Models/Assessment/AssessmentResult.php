<?php

namespace App\Models\Assessment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssessmentResult extends Model
{
    use HasFactory, SoftDeletes;

    //this is the database handling of the assessmetnResult page
    //where we can see or allow only this column in the database can be added
    protected $fillable = [
      'user_id',
      'assessment_tag',
      'mode',
      'mark',
      'updated_at',
    ];
}
