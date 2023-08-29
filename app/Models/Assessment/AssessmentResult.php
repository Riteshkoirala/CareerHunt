<?php

namespace App\Models\Assessment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssessmentResult extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
      'user_id',
      'assessment_id',
      'easy_mode',
      'intermediate_mode',
      'hard_mode',
      'mark',
      'updated_at',
    ];
}