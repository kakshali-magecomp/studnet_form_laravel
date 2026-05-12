<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'age',
        'gender',
        'course',
        'hobbies',
        'skills',
        'terms',
    ];

    protected $casts = [
        'hobbies' => 'array',
        'terms' => 'boolean',
    ];
}