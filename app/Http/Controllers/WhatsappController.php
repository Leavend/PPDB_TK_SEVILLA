<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Whatsapp;
use App\Models\Pengumuman;
use App\Models\Pendaftaran;

class WhatsappController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('whatsapp.wa');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dump = $request->data;
        $data = json_decode($dump, true);

        $target = [];
        foreach($data as $d){
            $target[] = whatsapp::where('nama', $d)->get();

            $daftar = Pendaftaran::where('nama_lengkap', $d);
            $daftar->update(['status_pendaftaran' => 'Selesai']);
        }

        $data_target = '';
        foreach ($target as $tr => $value) {
            foreach ($value as $item => $val) {
                if (count($target)<=1){
                    $data_target .= $val->no_hp . '|' . $val->nama;
                }
                else{
                    $data_target .= $val->no_hp . '|' . $val->nama . ',';
                }
            }
        }

        // $data_target = '';
        // foreach ($target as $item) {
        //     if (count($target)<=1){
        //         $data_target .= $item->no_hp . '|' . $item->nama;
        //     }else{
        //         $data_target .= $item->no_hp . '|' . $item->nama . ',';
        //     }
        // }

        // dd($data_target);

        $token = 'c7jTKijQQ_Epfxzqwk5h';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
            'target' => $data_target,
            'message' => 'Assalamualaikum Ayah Bunda!
Insyaallah kami membawa kabar baik.

Selamat Ananda Tiara Andini *diterima* sebagai siswa TK Islam Sevilla Al Fatah Balikpapan, silahkan melakukan pembayaran yang telah dikirim melalui email


🤍 TK ISLAM SEVILLA AL FATAH',
            'delay' => '5-10'
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization:'.$token
            ),
        ));

        $response = curl_exec($curl);

        // Cek apakah request berhasil
        if ($response === false) {
            // Handle error jika request gagal
            $error = curl_error($curl);
            // ...
        } else {
            // Mengubah response JSON menjadi array PHP
            $responseData = json_decode($response, true);

            // Cek apakah data berhasil di-decode dari JSON
            if (is_array($responseData)) {
                if($responseData['status'] == True){
                    return redirect('/admin/data-pendaftaran')->with('success','Penilaian Sudah Diumumkan');
                }else{
                    return redirect('/admin/data-pendaftaran')->with('error','Gagal Mengumumkan Penilaian');
                }
            } else {
                return redirect('/admin/data-pendaftaran')->with('error','Tidak dapat Mengumumkan Penilaian');
            }
        }

        curl_close($curl);

        // return redirect('/admin/data-pendaftaran')->with('success','Penilaian Sudah Diumumkan');

        echo $response;

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
