<?php

use App\Http\Controllers\DataAnakController;
use App\Http\Controllers\DataKeluargaController;
use App\Http\Controllers\DataOrganisasiController;
use App\Http\Controllers\DataPasanganController;
use App\Http\Controllers\DataTrainingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\NIPController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\TipePegawaiController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChartJSController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/profil', [ProfileController::class, 'view',])->name('User.viewprofil');
    Route::get('/profil/edit', [ProfileController::class, 'edit'])->name('User.editprofil');
    Route::put('/profil/update/{id}', [ProfileController::class, 'update'])->name('User.updateprofil');
});

//Route::post('/login', 'Auth\LoginController@login')->middleware('cekstatus');

// Route::group(['as' => 'Karyawan.', 'prefix' => 'Karyawan'], function () {
Route::resource('Karyawan', PegawaiController::class);
Route::group(
    [
        'prefix' => '/karyawan'
    ],
    function () {
        Route::post('/export', [PegawaiController::class, 'export'])->name('Karyawan.export');
        Route::post('/import', [PegawaiController::class, 'import'])->name('Karyawan.import');
    }
);

Route::get('getDataKaryawan', [PegawaiController::class, 'getDataKaryawan']);
// });
// Route::group(['prefix' => 'nip'], function () {
Route::resource('NIP', NIPController::class);
Route::group(
    [
        'prefix' => '/nip'
    ],
    function () {
        Route::post('/export', [NIPController::class, 'export'])->name('NIP.export');
    }
);
Route::group(
    [
        'prefix' => '/get'
    ],
    function () {
        Route::get('/getSK', [NIPController::class, 'getSK']);
        Route::get('/getNO/{id}/{sk}', [NIPController::class, 'getNoUrut']);
        Route::get('/getDataNip/{id_peg}/{no_sk}/{no_urut}', [NIPController::class, 'getDataNip']);
        Route::get('/ceknip/{id_peg}/{no_sk}/{no_urut}', [NIPController::class, 'cekNIP']);
        Route::get('/getUnitKerja/{nama}', [PegawaiController::class, 'getUnitKerja']);
    }
);

Route::resource('Keluarga', DataKeluargaController::class);
Route::group(
    [
        'prefix' => '/keluarga'
    ],
    function () {
        Route::get('/export', [DataKeluargaController::class, 'export'])->name('Keluarga.export');
        Route::get('/import', [DataKeluargaController::class, 'import'])->name('Keluarga.import');
        Route::post('/import', [DataKeluargaController::class, 'import'])->name('Keluarga.import');
    }
);

Route::resource('Pasangan', DataPasanganController::class);
Route::group(
    [
        'prefix' => '/Pasangan'
    ],
    function () {
        Route::get('/{Pasangan}/create', [DataPasanganController::class, 'buat'])->name('Pasangan.buat');
    }
);
Route::resource('Anak', DataAnakController::class);

Route::group(
    [
        'prefix' => '/Anak'
    ],
    function () {
        Route::get('/{id}/create', [DataAnakController::class, 'buat'])->name('Anak.buat');
        Route::get('/list/{idkeluarga}', [DataAnakController::class, 'list'])->name('Anak.list');
    }
);

Route::resource('tipePegawai', TipePegawaiController::class);
Route::resource('Training', DataTrainingController::class);
Route::group(
    [
        'prefix' => '/training'
    ],
    function () {
        Route::get('/{idpegawai}/list', [DataTrainingController::class, 'listtraining'])->name('Training.list');
        Route::DELETE('/{idpegawai}/deleteall', [DataTrainingController::class, 'destroyall'])->name('Training.deleteall');
        Route::get('/export', [DataTrainingController::class, 'export'])->name('Training.export');
        Route::post('/import', [DataTrainingController::class, 'import'])->name('Training.import');
    }
);

Route::get('train/detail', function () {
    return view('pages.DataTraining.detail');
});

Route::resource('Jabatan', JabatanController::class);

Route::resource('Organisasi', DataOrganisasiController::class);
Route::get('/export', [DataOrganisasiController::class, 'export'])->name('Organisasi.export');
Route::post('/import', [DataOrganisasiController::class, 'import'])->name('Organisasi.import');
Route::group(
    [
        'prefix' => '/Organisasi'
    ],
    function () {
    }
);
Route::group(
    ['middleware' => 'cekstatus:superadmin'],
    function () {
        Route::resource('admin', UsersController::class);
    }
);
