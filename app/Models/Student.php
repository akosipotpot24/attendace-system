<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;


    protected $fillable = [
        'firstname',
        'lastname',
        'stud_number',
        'email',
        'grade_level',
        'phone',
        'location'
    ];

}
