<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use App\Http\Controllers\WhatsappController;

class PerhitunganCOntroller extends Controller
{
    protected $whatsappController;

    public function __construct(WhatsappController $whatsappController)
    {
        $this->whatsappController = $whatsappController;
    }

    public function list()
    {
        $alternatif = Alternatif::with('penilaian.crips')->get();
        $kriteria = Kriteria::with('crips')->orderBy('nama_kriteria', 'ASC')->get();
        $penilaian = Penilaian::with('crips', 'alternatif')->get();
        $header_title = 'Perhitungan';

        if (count($penilaian) == 0) {
            return redirect('/admin/penilaian/list-penilaian');
        }

        // mencari min max tahap normalisasi
        $nilai = [];
        $nilai2 = [];
        foreach ($kriteria as $key => $value) {
            foreach ($penilaian as $key_1 => $value_1) {
                if ($value->id == $value_1->crips->kriteria_id) {
                    if ($value->attribut == 'Benefit') {
                        $minMax[$value->id][] = $value_1->crips->bobot;
                    } elseif ($value->attribut == 'Cost') {
                        $minMax[$value->id][] = $value_1->crips->bobot;
                    }
                }
            }
        }
        // dd($minMax);

        // normalisasi
        foreach ($penilaian as $key_1 => $value_1) {
            foreach ($kriteria as $key => $value) {
                if ($value->id == $value_1->crips->kriteria_id) {
                    if ($value->attribut == 'Benefit') {
                        $normalisasi[$value_1->alternatif->nama_alternatif][$value->id] = $value_1->crips->bobot / max($minMax[$value->id]);
                    } elseif ($value->attribut == 'Cost') {
                        $normalisasi[$value_1->alternatif->nama_alternatif][$value->id] = min($minMax[$value->id]) / $value_1->crips->bobot;
                    }
                }
            }
        }

        // dd($normalisasi);


        // perangkingan
        foreach ($normalisasi as $key => $value) {
            foreach ($kriteria as $key_1 => $value_1) {
                $rank[$key][] = $value[$value_1->id] * $value_1->bobot;
            }
        }
        $ranking = $normalisasi;
        foreach ($normalisasi as $key => $value) {
            $ranking[$key][] = array_sum($rank[$key]);
        }


        foreach ($ranking as $key => $row) {
            $index[$key]  = $row[6];
        }

        // Sort the data with attack descending
        array_multisort($index, SORT_DESC, $ranking);


        // pengumuman dan notifikasi
        $siswaLolos = array_slice($ranking,0,2);
        $siswaTidakLolos = array_slice($ranking,2);
        $names = array_keys($siswaLolos);
        $names2 = array_keys($siswaTidakLolos);

        // $this->whatsappController->store($names);


        return view('admin.perhitungan.list', compact('alternatif', 'kriteria', 'normalisasi', 'ranking', 'header_title', 'names','names2'));
    }

    public function announchement()
    {
        dd($names);
    }
}
