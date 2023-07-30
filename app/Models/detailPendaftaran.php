<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailPendaftaran extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $fillable = ["id_pendaftaran","foto_ayah","foto_ibu","akte","kk"];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }
}
