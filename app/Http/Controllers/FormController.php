<?php

namespace App\Http\Controllers;

use App\Models\ProfileUser;
use App\Models\User;
use App\Models\Pendaftaran;
use App\Models\Pembayaran;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    public function list()
    {
        $data['getRecord'] = Pendaftaran::all();
        $dataTitle['header_title'] = 'Pendaftaran';
        $dataUser['getRecordUser'] = ProfileUser::all();
        $dataPembayaran['getRecordPayment'] = Pembayaran::all();
        return view('pendaftaran.data-pendaftaran-list', $dataTitle, ['viewDataPembayaran' => $dataPembayaran, 'viewDataUser' => $dataUser, 'viewData' => $data]);
    }

    public function getForm()
    {
        $data['header_title'] = 'Formulir';
        $data['getRecord'] = ProfileUser::all();
        return view('student.form', $data);
    }

    public function insertRegistration(Request $request)
    {
        $kodependaftaran = Pendaftaran::id();

        $file = $request->file('foto');
        $nama_file = "Pasfoto" . time() . "-" . $file->getClientOriginalName();
        $namaFolder = 'data pendaftar/' . $kodependaftaran;
        $file->move($namaFolder, $nama_file);
        $pathFoto = $namaFolder . "/" . $nama_file;

        // $fileftberkas_ortu = $request->file('ftberkas_ortu');
        // $nama_fileftberkas_ortu = "BerkasOrtu" . time() . "-" . $fileftberkas_ortu->getClientOriginalName();
        // $namaFolderftgaji = 'data pendaftar/' . $kodependaftaran;
        // $fileftberkas_ortu->move($namaFolderftgaji, $nama_fileftberkas_ortu);
        // $pathOrtu = $namaFolderftgaji . "/" . $nama_fileftberkas_ortu;

        Pendaftaran::create([

            // data calon siswa
            'id_pendaftaran' => $kodependaftaran,
            'user_id' => Auth::user()->id,
            'nama_panggilan' => $request->nama_panggilan,
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'anak_ke' => $request->anak_ke,
            'agama' => $request->agama,
            'jumlah_saudara' => $request->jumlah_saudara,
            'tinggal_bersama' => $request->tinggal_bersama,
            'pas_foto' => $pathFoto,

            'email' => $request->email,
            'no_hp_ayah' => $request->no_hp_ayah,
            'no_hp_ibu' => $request->no_hp_ibu,

            'alamat' => $request->alamat,


            // data wali / ortu calon siswa
            // nama ayah ibu
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            //pendidikan
            'pendidikan_ayah' => $request->pendidikan_ayah,
            'pendidikan_ibu' => $request->pendidikan_ibu,
            // penghasilan
            'penghasilan_ayah' => $request->penghasilan_ayah,
            'penghasilan_ibu' => $request->penghasilan_ibu,
            // 'berkas_ortu' =>  $pathOrtu,

            // data kesehatan calon siswa
            'penyakit_anak' => $request->penyakit_anak,
            'makanan_bayi' => $request->makanan_bayi,
            'penyakit_kambuh' => $request->penyakit_kambuh,
            'obat' => $request->obat,

            'status_pendaftaran' => 'Belum Terverifikasi',
            'tgl_pendaftaran' => now(),
            'created_at' => now()
        ]);

        $pendaftaranbaru = Pendaftaran::orderBy('id', 'DESC')->first();
        $id_pendaftaran = $pendaftaranbaru->id;

        //tambah insert
        $kodepembayaran = Pembayaran::id();
        echo $kodepembayaran;
        Pembayaran::create([
            'id_pembayaran' => $kodepembayaran,
            //'bukti_pembayaran' => "NULL",
            'status' => "Belum Bayar",
            'verifikasi' => false,
            'jatuh_tempo'  => now()->addDays(2)->format('Y-m-d'),
            'tanggal_pembayaran' => now(),
            'total_bayar'  => 3000000,
            'id_pendaftaran' => $id_pendaftaran,
            'created_at' => now()
        ]);

        $kodepengumuman = Pengumuman::id();
        Pengumuman::create([
            'id_pengumuman' => $kodepengumuman,
            'id_pendaftaran' => $id_pendaftaran,
            'hasil_seleksi' => "Belum Seleksi",
            'status' => false,
        ]);

        return redirect('/siswa/profile')->with('success', 'Data Tersimpan!!');
    }

    public function editRegistration($id_pendaftaran)
    {
        $dataUser = ProfileUser::all();
        $data = Pendaftaran::where("id_pendaftaran", $id_pendaftaran)->first();
        return view('pendaftaran.data-pendaftaran-edit-admin', ['viewDataUser' => $dataUser, 'viewData' => $data]);
    }
}
