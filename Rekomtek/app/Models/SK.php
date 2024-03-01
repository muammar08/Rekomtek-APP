<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SK extends Model
{
    use HasFactory;

    public $table = "sk";

    protected $fillable=[ 'sk_kepala_dinas' ];
}
