<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kriteria',
        'attribut',
        'bobot',
    ];

    protected $table = 'kriterias';
    protected $guarded = [];

    public function crips()
    {
        return $this->hasMany(Crips::class);
    }

    static public function getKriteria()
    {
        $return = self::orderBy('nama_kriteria', 'ASC')->get();
        return $return;
    }
}
