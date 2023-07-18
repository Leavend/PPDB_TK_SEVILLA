<?php

namespace App\Http\Controllers;

use App\Models\Crips;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class CripsController extends Controller
{
    public function insertCrips(Request $request)
    {
        request()->validate([
            'nama_crips' => 'required|string',
            'bobot' => 'required|numeric'
        ]);

        $crips = new Crips();
        $crips->kriteria_id = $request->kriteria_id;
        $crips->nama_crips = $request->nama_crips;
        $crips->bobot = $request->bobot;
        $crips->save();
        return redirect('admin/kriteria/list-kriteria')->with('success', 'Berhasil menambahkan data');
    }

    public function editCrips($id)
    {
        $data['crips'] = Crips::findOrFail($id);

        return view('admin.crips.edit', $data);
    }

    public function updateCrips(Request $request, $id)
    {
        $crips = Crips::findOrFail($id);
        $crips->update([
            'nama_crips' => $request->nama_crips,
            'bobot' => $request->bobot
        ]);
        return back()->with('success', 'Berhasil update Crips');
    }

    public function deleteCrips($id)
    {
        $crips = Crips::findOrFail($id);
        $crips->delete();
        return back()->with('success', 'Berhasil hapus Crips');
    }
}
