<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crips extends Model
{
    use HasFactory;
    protected $fillable = [
        'kriteria_id',
        'nama_crips',
        'bobot',
    ];

    protected $table = 'crips';
    protected $guarded = [];

    static public function getCrips()
    {
        $return = self::orderBy('nama_crips', 'ASC')->get();
        return $return;
    }
}
