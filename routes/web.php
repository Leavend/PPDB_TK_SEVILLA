<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KriteriaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


// Route AuthController
Route::get('/login', [AuthController::class, 'login']);
Route::get('/registrasi', [AuthController::class, 'register']);
Route::post('masuk', [AuthController::class, 'authLogin']);
Route::post('register', [AuthController::class, 'authRegister']);
Route::get('keluar', [AuthController::class, 'logout']);
Route::get('/lupa-password', [AuthController::class, 'forgetPassword']);
Route::post('lupa-password', [AuthController::class, 'postForgetPassword']);
Route::get('/reset/{token}', [AuthController::class, 'resetPassword']);
Route::post('reset/{token}', [AuthController::class, 'postReset']);



// Route Page PPDB
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/jadwal-pendaftaran', function () {
    return view('pendaftaran.jadwalPendaftaran');
});
Route::get('/alur-pendaftaran', function () {
    return view('pendaftaran.alurPendaftaran');
});


// Route Middleware
Route::group(['middleware' => 'admin'], function () {

    // Route Dashboard
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);

    // Route List Admin
    Route::get('admin/admin/list-admin', [AdminController::class, 'list']);

    // Route List Siswa
    Route::get('admin/siswa/list-siswa', [SiswaController::class, 'list']);

    // Route List Kriteria
    Route::get('admin/kriteria/list-kriteria', [KriteriaController::class, 'list']);

    // Route Akun Admin
    Route::get('admin/admin/tambah-admin', [AdminController::class, 'addAdmin']);
    Route::post('admin/admin/insertAdmin', [AdminController::class, 'insertAdmin']);
    Route::get('admin/admin/edit-admin/{id}', [AdminController::class, 'editAdmin']);
    Route::post('admin/admin/edit-admin/{id}', [AdminController::class, 'updateAdmin']);
    Route::get('admin/admin/delete-admin/{id}', [AdminController::class, 'deleteAdmin']);

    // Route Kriteria
    Route::get('admin/kriteria/tambah-kriteria', [KriteriaController::class, 'addKriteria']);
    Route::post('admin/kriteria/insertKriteria', [KriteriaController::class, 'insertKriteria']);
    Route::get('admin/kriteria/edit-kriteria/{id}', [KriteriaController::class, 'editKriteria']);
    Route::post('admin/kriteria/edit-kriteria/{id}', [KriteriaController::class, 'updateKriteria']);
    Route::get('admin/kriteria/delete-kriteria/{id}', [KriteriaController::class, 'deleteKriteria']);
});

Route::group(['middleware' => 'student'], function () {

    // Route Profile
    Route::get('siswa/profile', [ProfileController::class, 'getProfile']);
    Route::post('siswa/edit-profile', [ProfileController::class, 'getProfile']);

    // Route Formulir
    Route::get('siswa/formulir', [FormController::class, 'getForm']);
});
