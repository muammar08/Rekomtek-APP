<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimRekom extends Model
{
    use HasFactory;

    public $table = "tim_rekomtek";

    protected $fillable=[ 
        'nama',
        'nip',
        'jabatan_dalam_tim',
    ];
}
