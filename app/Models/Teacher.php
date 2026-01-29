<?php

namespace App\Models;

use App\Models\Teacher;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    /** @use HasFactory<\Database\Factories\TeacherFactory> */
    use HasFactory;

    protected $with=['subject'];

    protected $fillable = [
    'name',
    'email',
    'phone',
    'address',
    'subject_id',
    ];

    public function subject(){
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
