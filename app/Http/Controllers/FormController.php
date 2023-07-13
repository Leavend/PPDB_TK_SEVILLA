<?php

namespace App\Http\Controllers;

use App\Models\ProfileUser;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function getForm()
    {
        $data['header_title'] = 'Formulir';
        $data['getRecord'] = ProfileUser::all();
        return view('student.form', $data);
    }
}
