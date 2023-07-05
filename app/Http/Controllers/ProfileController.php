<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function getProfile()
    {
        $data['header_title'] = 'Profile Siswa';
        return view('student.profile', $data);
    }
}
