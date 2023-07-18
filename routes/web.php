<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\CripsController;
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

// Route Pembayaran
Route::get('/data-payment', [PembayaranController::class, 'list'])->name('data-pembayaran');
Route::post('/save-payment', [PembayaranController::class, 'simpanpembayaran']);
Route::post('/update-payment/{id_pembayaran}', [PembayaranController::class, 'updatepembayaran']);
Route::get('/delete-payment/{id_pembayaran}', [PembayaranController::class, 'hapuspembayaran']);

Route::post('/upload-payment', [PembayaranController::class, 'updatebuktipembayaran'])->name('upload-payment');
Route::get('/paid-payment/{id_pembayaran}', [PembayaranController::class, 'verifikasipembayaran']);
Route::get('/unpaid-payment/{id_pembayaran}', [PembayaranController::class, 'belumbayar']);
Route::get('/invalid-payment/{id_pembayaran}', [PembayaranController::class, 'invalidbayar']);


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

    // Route List Alternatif
    Route::get('admin/alternatif/list-alternatif', [AlternatifController::class, 'list']);

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

    // Route Crips
    Route::get('admin/kriteria/show-crips/{id}', [KriteriaController::class, 'showCrips']);
    Route::post('admin/kriteria/insertCrips', [CripsController::class, 'insertCrips'])->name('insertCrips');
    Route::get('admin/kriteria/edit-crips/{id}', [CripsController::class, 'editCrips']);;
    Route::post('admin/kriteria/edit-crips/{id}', [CripsController::class, 'updateCrips']);;
    Route::get('admin/kriteria/delete-crips/{id}', [CripsController::class, 'deleteCrips']);;


    // Route Alternatif
    Route::get('admin/alternatif/tambah-alternatif', [AlternatifController::class, 'addAlternatif']);
    Route::post('admin/alternatif/insertAlternatif', [AlternatifController::class, 'insertAlternatif']);
    Route::get('admin/alternatif/edit-alternatif/{id}', [AlternatifController::class, 'editAlternatif']);
    Route::post('admin/alternatif/edit-alternatif/{id}', [AlternatifController::class, 'updateAlternatif']);
    Route::get('admin/alternatif/delete-alternatif/{id}', [AlternatifController::class, 'deleteAlternatif']);



    // Route Pengumuman

});

Route::group(['middleware' => 'student'], function () {

    // Route Profile
    Route::get('/siswa/profile', [ProfileController::class, 'getProfile'])->name("profile");
    // Route Update Profile
    Route::post('/update-user/{user_id}', [UserController::class, 'updateUser'])->name('update-user');

    // Route Pendaftaran
    Route::get('/siswa/data-pendaftaran', [FormController::class, 'list']);
    // Route Formulir
    Route::get('siswa/formulir-pendaftaran', [FormController::class, 'getForm']);
    Route::post('/save-registration', [FormController::class, 'insertRegistration'])->name('save-registration');
    Route::get('siswa/edit-pendaftaran/{id_pendaftaran}', [FormController::class, 'editRegistration']);
    Route::post('siswa/edit-pendaftaran/{id_pendaftaran}', [FormController::class, 'updateRegistration']);
    Route::get('siswa/delete-pendaftaran/{id_pendaftaran}', [FormController::class, 'deleteRegistration']);
    Route::get('siswa/detail-pendaftaran/{id_pendaftaran}', [FormController::class, 'detailRegistration']);
    Route::get('siswa/kartu-pendaftaran/{id_pendaftaran}', [FormController::class, 'cardRegistration']);

    Route::get('/verified-registration/{id_pendaftaran}', [FormController::class, 'verifikasiStatusRegistration']);
    Route::get('/notverified-registration/{id_pendaftaran}', [FormController::class, 'notVerifikasiStatusRegistration']);
    Route::get('/invalid-registration/{id_pendaftaran}', [FormController::class, 'invalidStatusRegistration']);
    Route::get('/finish-registration/{id_pendaftaran}', [FormController::class, 'finishStatusRegistration']);














    // Route 

    // Route::post('/edit-pw', [ProfileController::class, 'editakun']);

    // Route User
    // Route::get('/siswa/data-user', [UserController::class, 'datauser'])->name('data-user');
    // Route::post('/siswa/save-user', [UserController::class, 'simpanuser']);
    // Route::get('/siswa/profile/edit-user/{user_id}', [UserController::class, 'edituser'])->name('edit-user');
    // Route::post('/siswa/profile/edit-user/{user_id}', [UserController::class, 'updateUser'])->name('update-user');
    // Route::get('/delete-user/{user_id}', [UserController::class, 'hapususer'])->name('delete-user');

});
