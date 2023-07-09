<?php

namespace App\Http\Controllers;

use app\Models\Kriteria;
use Exception;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function list()
    {
        $data['getRecord'] = Kriteria::getKriteria();
        $data['header_title'] = 'List Kriteria';
        return view('admin.kriteria.list', $data);
    }

    public function addKriteria()
    {
        $data['header_title'] = 'Tambah Kriteria';
        return view('admin.kriteria.add', $data);
    }

    public function insertKriteria(Request $request)
    {
        request()->validate([
            'nama_kriteria' => 'required|string',
            'attribut' => 'required|string',
            'bobot' => 'required|number'
        ]);

        $kriteria = new Kriteria();
        $kriteria->nama_kriteria = $request->nama_kriteria;
        $kriteria->attribut = $request->attribut;
        $kriteria->bobot = $request->bobot;
        $kriteria->save();
        return redirect('admin/kriteria/list-kriteria')->with(['success', 'Berhasil Menambahkan Data']);
    }
    public function editKriteria($id)
    {
        $data['getRecord'] = Kriteria::getSingle($id);
        return view();
    }
}
