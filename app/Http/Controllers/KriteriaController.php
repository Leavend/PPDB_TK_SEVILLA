<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
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

    public function insertKriteria(Request $request)
    {
        request()->validate([
            'nama_kriteria' => 'required|string',
            'attribut' => 'required|string',
            'bobot' => 'required|numeric'
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
        return view('admin.kriteria.edit', $data);
    }

    public function updateKriteria($id, Request $request)
    {
        request()->validate([
            'nama_kriteria' => 'required|string',
            'attribut' => 'required|string',
            'bobot' => 'required|numeric'
        ]);
        $kriteria = Kriteria::getSingle($id);
        $kriteria->nama_kriteria = $request->nama_kriteria;
        $kriteria->attribut = $request->attribut;
        $kriteria->bobot = $request->bobot;
        $kriteria->save();
        return redirect('admin/kriteria/list-kriteria')->with(['success', 'Admin berhasil ditambahkan']);
    }

    public function deleteKriteria($id)
    {
        $kriteria = Kriteria::getSingle($id);
        $kriteria->delete();
        return redirect('admin/kriteria/list-kriteria')->with(['success', 'Admin berhasil dihapuskan']);
    }
}
