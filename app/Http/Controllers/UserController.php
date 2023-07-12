<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\ProfileUser;
use File;
use Alert;

class UserController extends Controller
{
    //data user
    public function datauser()
    {
        $dataUser = User::all();
        $kode = ProfileUser::id();
        return view('user.data-user-admin', compact('dataUser', 'kode'));
    }

    public function simpanuser(Request $request)
    {
        //dd('Regist Berhasil');
        //return redirect('/data-user')->with('berhasil','data berhasil disimpanI');
        try {
            $request->merge(['password' => Hash::make($request->input('password'))]);
            $checkuser = User::where('email', $request->email)->first();
            if ($checkuser) {
                return redirect()->back()->with('warning', 'Email Telah Terdaftar!');
            }
            User::create([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->level,
                'created_at' => now()
            ]);
            $usersid  = User::orderBy('id', 'DESC')->first();
            $file = $request->file('foto');
            if (file_exists($file)) {
                $nama_file = time() . "-" . $file->getClientOriginalName();
                $namaFolder = 'foto profil';
                $file->move($namaFolder, $nama_file);
                $pathFoto = $namaFolder . "/" . $nama_file;

                ProfileUser::create([
                    'user_id' => $usersid->id,
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'tanggal_lahir' => "2000-01-01",
                    'gender' => $request->gender,
                    'no_hp' => $request->nohp,
                    'foto' => $pathFoto
                ]);
            } else {
                ProfileUser::create([
                    'user_id' => $usersid->id,
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'tanggal_lahir' => "2000-01-01",
                    'gender' => $request->gender,
                    'no_hp' => $request->nohp,
                ]);
            }
            return redirect('/data-user')->with('success', 'Data Tersimpan!');
        } catch (\Exception $e) {
            //echo $e;
            return redirect()->back()->with('error', 'Data Tidak Tersimpan, Periksa kembali inputan ada!');
        }
    }

    public function edituser($user_id)
    {
        $dataUser = ProfileUser::all();
        $dataUserbyId = ProfileUser::find($user_id);
        return view('user.data-user-detail', ['viewDataUser' => $dataUser, 'viewData' => $dataUserbyId]);
    }


    public function updateuser($id, Request $request)
    {
        try {
            $dataUser = ProfileUser::all();
            $message = [
                'tempat.required' => 'Tempat lahir tidak boleh kosong',
                'tanggal.required' => 'Tanggal lahir tidak boleh kosong',
                'jk.required' => 'Jenis Kelamin harus dipilih',
                'hp.required' => 'Family card cannot be empty',
                'alamat.required' => 'School name must be filled',
                'ig.required' => 'Major must be filled',
            ];

            $cekValidasi = $request->validate([
                'tempat' => 'required',
                'tanggal' => 'required',
                'jk' => 'required',
                'hp' => 'required',
                'alamat' => 'required',
                'ig' => 'required'
            ], $message);

            $file = $request->file('foto');
            if (file_exists($file)) {
                $nama_file = time() . "-" . $file->getClientOriginalName();
                $namaFolder = 'foto profil';
                $file->move($namaFolder, $nama_file);
                $pathFoto = $namaFolder . "/" . $nama_file;
            } else {
                $pathFoto = $request->pathFoto;
            }

            ProfileUser::where("id", $id)->update([
                'foto' => $pathFoto,
                'tempat_lahir' => $request->tempat,
                'tanggal_lahir' => $request->tanggal,
                'gender' => $request->jk,
                'no_hp' => $request->hp,
                'alamat' => $request->alamat,
                'instagram' => $request->ig
            ]);
            return redirect('/data-user')->with("success", 'Data Berhasil Diubah');
        } catch (\Exception $e) {
            echo $e;
            //return redirect()->back()->with('error', 'Data Tidak Berhasil Diubah!');
        }
    }

    public function hapususer($user_id)
    {
        //$dataUser = ProfileUser::all();
        try {
            $dataProfileUsers = ProfileUser::find($user_id);
            $id = $dataProfileUsers['Email'];
            $dataUser = User::find($user_id);
            $dataProfileUsers->delete();
            $dataUser->delete();
            return redirect('/data-user')->with("success", 'Data Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Tidak Berhasil Dihapus!');
        }
    }


    public function insertRegis(Request $request)
    {
        try {
            $checkuser = User::where('email', $request->email)->first();
            if ($checkuser) {
                return redirect()->back()->with('warning', 'Email Telah Terdaftar!');
            }
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->level,
                'created_at' => now()
            ]);
            $usersid  = User::orderBy('id', 'DESC')->first();
            ProfileUser::create([
                'user_id' => $usersid->id,
                'nama' => $request->name,
                'email' => $request->email,
                'created_at' => now()
            ]);
            return redirect('/')->with('success', 'Berhasil Register!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Tidak Tersimpan!');
        }
    }
}
