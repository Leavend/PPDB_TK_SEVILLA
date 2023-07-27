<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function list()
    {
        $data['getRecord'] = Alternatif::getAlternatif();
        $data['getRecordPendaftaran'] = Pendaftaran::all();
        $data['header_title'] = 'List Alternatif';
        return view('admin.Alternatif.list', $data);
    }

    public function insertAlternatif(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_alternatif' => 'required|string',
        ]);

        // Membuat data alternatif
        $alternatif = new Alternatif();
        $alternatif->nama_alternatif = $request->nama_alternatif;
        $alternatif->save();

        // Mengambil data pendaftaran berdasarkan nama pendaftaran
        $pendaftaran = Pendaftaran::where('nama_lengkap', $request->nama_alternatif)->first();

        // Jika data pendaftaran ditemukan, tambahkan id pendaftaran ke kolom pendaftaran_id di tabel alternatif
        if ($pendaftaran) {
            $alternatif->pendaftaran_id = $pendaftaran->id;
            $alternatif->save();
        }

        return redirect('admin/alternatif/list-alternatif')->with('success', 'Berhasil menambahkan data');
    }


    public function editAlternatif($id)
    {
        $data['getRecord'] = Alternatif::findOrFail($id);
        return view('admin.Alternatif.edit', $data);
    }

    public function updateAlternatif($id, Request $request)
    {
        request()->validate([
            'nama_alternatif' => 'required|string',
        ]);
        $Alternatif = Alternatif::findOrFail($id);
        $Alternatif->update([
            'nama_alternatif' => $request->nama_alternatif,
        ]);
        return redirect('admin/alternatif/list-alternatif')->with('success', 'Alternatif berhasil diupdate');
    }

    public function deleteAlternatif($id)
    {
        $Alternatif = Alternatif::findOrFail($id);
        $Alternatif->delete();
        return redirect('admin/alternatif/list-alternatif')->with('success', 'Alternatif berhasil dihapuskan');
    }
}
