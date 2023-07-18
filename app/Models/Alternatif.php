<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_alternatif',
    ];

    protected $table = 'alternatif';
    protected $guarded = [];

    static public function getAlternatif()
    {
        $return = self::orderBy('nama_alternatif', 'ASC')->get();
        return $return;
    }
}
