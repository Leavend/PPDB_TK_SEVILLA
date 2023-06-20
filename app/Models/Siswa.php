<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        "nik",
        "nama_lengkap",
        "nama_panggilan",
        "tinggal_bersama",
        "tahun_ajar",
        "jenjang",
        "jumlah_saudara",
        "tempat_lahir",
        "tanggal_lahir",
        "anak_ke",
        "jenis_kelamin",
        "agama",
    ];
}
