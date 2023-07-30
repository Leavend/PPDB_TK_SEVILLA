<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Crips;
use App\Models\Penilaian;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenilaianController extends Controller
{
    public function list()
    {
        // $alternatif = Alternatif::with('penilaian.crips')->get();
        // $alternatif = Alternatif::with('pendaftaran')->get();

        $alternatif = Alternatif::whereHas('pendaftaran', function ($query) {
            $query->where('status_pendaftaran', 'Terverifikasi');
        })->get();

        $header_title = 'List Penilaian';
        $kriteria = Kriteria::with('crips')->orderBy('nama_kriteria', 'ASC')->get();
        $crips = Crips::all();

        $nama = [];
        $hasil = [];
        foreach ($kriteria as $ktr) {
            // Mengganti spasi dengan '_'
            $nama_kriteria = str_replace(' ', '_', $ktr->nama_kriteria);

            // Mengubah semua huruf menjadi huruf kecil
            $nama_kriteria = strtolower($nama_kriteria);

            $nama[] = $nama_kriteria;
        }

        // ambil nilai pendaftaran sesuai kriteria
        foreach($alternatif as $alt){
            $hasil[$alt->id][0] = $alt->id;
            $hasil[$alt->id][1] = $alt->pendaftaran->nama_lengkap;
            foreach($nama as $n){
                foreach($crips as $c){
                    if($alt->pendaftaran->$n == $c->id){
                        $hasil[$alt->id][] = $c->id;
                    }
                }
            }
        }

        // dd($hasil);

        return view('admin.penilaian.list', compact('crips', 'kriteria', 'header_title', 'hasil'));
    }

    public function insertPenilaian(Request $request)
    {
        DB::select("TRUNCATE penilaian");
        foreach ($request->crips_id as $key => $value) {
            foreach ($value as $key_1 => $value_1) {
                Penilaian::create([
                    'alternatif_id' => $key,
                    'crips_id' => $value_1
                ]);
            }
        }
        return redirect('admin/penilaian/list-penilaian')->with('success', 'Berhasil menyimpan Data');
    }
}
