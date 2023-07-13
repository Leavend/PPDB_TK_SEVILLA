<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileUser extends Model
{
    use HasFactory;
    protected $table = "profile_user";
    protected $fillable = ["user_id", "nama", "email", "foto", "tempat_lahir", "tanggal_lahir", "jenis_kelamin", "no_hp"];
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = "id";

    static public function getSingle($id)
    {
        return self::find($id);
    }

    public static function id()
    {
        $kode = self::table('profile_user')->max('user_id');
        $addNol = '';
        $kode = str_replace("USR", "", $kode);
        $kode = (int) $kode + 1;
        $incrementKode = $kode;

        if (strlen($kode) == 1) {
            $addNol = "00000";
        } elseif (strlen($kode) == 2) {
            $addNol = "0000";
        } elseif (strlen($kode) == 3) {
            $addNol = "000";
        } elseif (strlen($kode) == 4) {
            $addNol = "00";
        } elseif (strlen($kode) == 5) {
            $addNol = "0";
        }
        $kodeBaru = "USR" . $addNol . $incrementKode;
        return $kodeBaru;
    }

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }
}
