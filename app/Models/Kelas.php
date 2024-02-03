<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'no',
        'kelas'
    ];

    public static function rules()
    {
        return [
            'no' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
        ];
    }
}
