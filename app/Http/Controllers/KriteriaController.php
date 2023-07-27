<?php

namespace App\Http\Controllers;

use App\Models\Crips;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function list()
    {
        // Cek apakah data kriteria sudah ada atau belum
        $kriteriaExist = Kriteria::first();

        // Jika data kriteria belum ada, buat data kriteria
        if (!$kriteriaExist) {
            // Membuat data kriteria berdasarkan kolom pada tabel pendaftaran
            $kriteriaData = [
                [
                    'nama_kriteria' => 'Penghasilan Ayah',
                    'attribut' => 'Benefit',
                    'bobot' => 30,
                ],
                [
                    'nama_kriteria' => 'Jumlah Saudara',
                    'attribut' => 'Benefit',
                    'bobot' => 25,
                ],
                [
                    'nama_kriteria' => 'Perkembangan Moral',
                    'attribut' => 'Benefit',
                    'bobot' => 20,
                ],
                [
                    'nama_kriteria' => 'Perkembangan Motorik',
                    'attribut' => 'Benefit',
                    'bobot' => 15,
                ],
                [
                    'nama_kriteria' => 'Perkembangan Bahasa',
                    'attribut' => 'Benefit',
                    'bobot' => 10,
                ],
            ];

            // Loop untuk membuat data kriteria
            foreach ($kriteriaData as $kriteria) {
                Kriteria::create([
                    'nama_kriteria' => $kriteria['nama_kriteria'],
                    'attribut' => $kriteria['attribut'],
                    'bobot' => $kriteria['bobot'],
                ]);
            }
        }

        // Mengambil data kriteria dari database untuk ditampilkan di view
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
        return redirect('admin/kriteria/list-kriteria')->with('success', 'Berhasil menambahkan data');
    }

    public function editKriteria($id)
    {
        $data['getRecord'] = Kriteria::findOrFail($id);
        return view('admin.kriteria.edit', $data);
    }

    public function updateKriteria($id, Request $request)
    {
        request()->validate([
            'nama_kriteria' => 'required|string',
            'attribut' => 'required|string',
            'bobot' => 'required|numeric'
        ]);
        $kriteria = Kriteria::findOrFail($id);
        $kriteria->update([
            'nama_kriteria' => $request->nama_kriteria,
            'attribut' => $request->attribut,
            'bobot' => $request->bobot
        ]);
        return redirect('admin/kriteria/list-kriteria')->with('success', 'Kriteria berhasil diupdate');
    }

    public function deleteKriteria($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        $kriteria->delete();
        return redirect('admin/kriteria/list-kriteria')->with('success', 'Kriteria berhasil dihapuskan');
    }

    public function showCrips($id)
    {
        // Cek apakah data kriteria sudah ada atau belum
        $cripsExist = Crips::first();

        // Jika data kriteria belum ada, buat data kriteria
        if (!$cripsExist) {
            // Membuat data kriteria berdasarkan kolom pada tabel pendaftaran
            $cripsData = [
                [
                    'nama_crips' => '<= 1.500.000',
                    'kriteria_id' => '1',
                    'bobot' => 1,
                ],
                [
                    'nama_crips' => 'Rp1.500.000 - <= Rp 2.500.000',
                    'kriteria_id' => '1',
                    'bobot' => 2,
                ],
                [
                    'nama_crips' => 'Rp2.500.000 - <= Rp 3.500.000',
                    'kriteria_id' => '1',
                    'bobot' => 3,
                ],
                [
                    'nama_crips' => 'Rp3.500.000 - <= Rp 4.500.000',
                    'kriteria_id' => '1',
                    'bobot' => 4,
                ],
                [
                    'nama_crips' => '=> Rp4.500.000',
                    'kriteria_id' => '1',
                    'bobot' => 5,
                ],
                [
                    'nama_crips' => '1 Anak',
                    'kriteria_id' => '2',
                    'bobot' => 5,
                ],
                [
                    'nama_crips' => '2 Anak',
                    'kriteria_id' => '2',
                    'bobot' => 4,
                ],
                [
                    'nama_crips' => '3 Anak',
                    'kriteria_id' => '2',
                    'bobot' => 3,
                ],
                [
                    'nama_crips' => '4 Anak',
                    'kriteria_id' => '2',
                    'bobot' => 2,
                ],
                [
                    'nama_crips' => '>=5 Anak',
                    'kriteria_id' => '2',
                    'bobot' => 1,
                ],
                [
                    'nama_crips' => 'level 1',
                    'kriteria_id' => '3',
                    'bobot' => 1,
                ],
                [
                    'nama_crips' => 'level 2',
                    'kriteria_id' => '3',
                    'bobot' => 2,
                ],
                [
                    'nama_crips' => 'level 3',
                    'kriteria_id' => '3',
                    'bobot' => 3,
                ],
                [
                    'nama_crips' => 'level 4',
                    'kriteria_id' => '3',
                    'bobot' => 4,
                ],
                [
                    'nama_crips' => 'level 1',
                    'kriteria_id' => '4',
                    'bobot' => 1,
                ],
                [
                    'nama_crips' => 'level 2',
                    'kriteria_id' => '4',
                    'bobot' => 2,
                ],
                [
                    'nama_crips' => 'level 1',
                    'kriteria_id' => '5',
                    'bobot' => 1,
                ],
                [
                    'nama_crips' => 'level 2',
                    'kriteria_id' => '5',
                    'bobot' => 2,
                ],
            ];

            // Loop untuk membuat data kriteria
            foreach ($cripsData as $crips) {
                Crips::create([
                    'nama_crips' => $crips['nama_crips'],
                    'kriteria_id' => $crips['kriteria_id'],
                    'bobot' => $crips['bobot'],
                ]);
            }
        }

        $data['header_title'] = 'Crips';
        $data['kriteria'] = Kriteria::findOrFail($id);
        $data['crips'] = Crips::where('kriteria_id', $id)->get();
        return view('admin.kriteria.show', $data);
    }
}
