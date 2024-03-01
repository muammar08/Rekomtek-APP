<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratAir extends Model
{
    use HasFactory;
    public $table = "suratair";

    protected $fillable=[
        'nomor_surat',
        'tgl_masehi',
        'surat_permohonan',
        'tgl_permohonan',
        'perihal_permohonan',
        'surat_permohonan2',
        'tgl_permohonan2',
        'perihal_permohonan2',
        'nama',
        'pekerjaan',
        'alamat',
        'nama_pt',
        'sumber_air',
        'wilayah_sungai',
        'desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'koordinat',
        'tujuan',
        'pengambilan',
        'pembuangan',
        'volume_ambil',
        'jangka_waktu',
        'nomor_izin_lama',
        'masa_izin_lama',
        'volume_izin',
        'no_berita_peninjauan',
        'tgl_berita_peninjauan',
        'no_berita_acara',
        'tgl_berita_acara',
        'type',
        'word',
        'pdf',
    ];
}
