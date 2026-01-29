<?php

namespace App\Models;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    /** @use HasFactory<\Database\Factories\SubjectFactory> */
    use HasFactory;

    protected $fillable = [
    'availSubject',
    'desc'
    ];

    public function teachers(){
        return $this->belongsTo(Teacher::class, 'subject_id');
    }
}
