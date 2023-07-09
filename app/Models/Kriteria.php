<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getKriteria()
    {
        $return = self::orderBy('nama_kriteria', 'ASC')->get();
        return $return;
    }
}
