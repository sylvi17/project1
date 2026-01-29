<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

    protected $with =['classroom'];

    protected $fillable = [
        'name',
        'email',
        'bday',
        'gender',
        'address',
        'classroom_id',
    ];

    public function classroom(){
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }
}
