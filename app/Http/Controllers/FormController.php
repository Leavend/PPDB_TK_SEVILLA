<?php

namespace App\Http\Controllers;

use App\Models\ProfileUser;
use App\Models\User;
use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FormController extends Controller
{
    public function getForm()
    {
        $data['header_title'] = 'Formulir';
        $data['getRecord'] = ProfileUser::all();
        return view('student.form', $data);
    }
}
