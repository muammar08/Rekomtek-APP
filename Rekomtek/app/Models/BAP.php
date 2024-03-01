<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BAP extends Model
{
    use HasFactory;

    public $table = "bap";

    protected $fillable=[ 'no_berita_acara', 'tgl_berita_acara', 'nama_pt', 'type', 'word_bap', 'pdf_bap' ];
}
