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

    static public function getSingle($id)
    {
        return self::findOrFail($id);
    }

    static public function getKriteria()
    {
        $return = self::orderBy('nama_kriteria', 'ASC')->get();
        return $return;
    }
}
