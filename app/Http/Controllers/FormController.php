<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function getForm()
    {
        $data['header_title'] = 'Formulir';
        return view('student.form', $data);
    }
}
