<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students
{
    // use HasFactory;
    private static $students = [
 
    ];

    public static function all()
    {
        return self::$students;
    }
}