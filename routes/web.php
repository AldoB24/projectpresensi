<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login\LoginController;   
use App\Http\Controllers\Login\RegisterController;   
use App\Http\Controllers\Login\ForgotPasswordController;
use App\Http\Controllers\Login\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\API\AttendanceController;
use App\Http\Controllers\RekapController;



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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/homelogin', function () {
    return view('homelogin');
});
Auth::routes();

// Route::get('/home', [HomeController::class, 'index']);

Route::post('/login', [LoginController::class, 'login']); //route post untuk login
Route::get('/login', [LoginController::class, 'index'])->name('login'); 
Route::get('/logout', [LogoutController::class, 'logout']);
Route::post('/registrasi', [RegisterController::class, 'register'])->name('register.coba');
Route::get('/registrasi', [RegisterController::class, 'index'])->name('register.halaman');

Route::middleware('auth')->group(function () {
//route beranda
Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/data_karyawan', [DashboardController::class, 'jumlah']);
Route::get('/tepat_waktu', [DashboardController::class, 'tepatwaktu'])->name('tepatwaktu');
Route::get('/tepatwaktu/filter', [DashboardController::class, 'tepatwaktu'])->name('tepatwaktu.filter');
Route::get('/jampulang', [DashboardController::class, 'pulang']);
Route::get('/pulang', [DashboardController::class, 'pulang'])->name('pulang');
Route::get('/terlambat', [DashboardController::class, 'terlambat'])->name('terlambat');
Route::get('/izin', [DashboardController::class, 'izin'])->name('izin');
Route::get('/rekap_absen', [DashboardController::class, 'rekap']);
Route::get('/laporan', [DashboardController::class, 'laporan'])->name('laporan-karyawan');

Route::get('/settings', [DashboardController::class, 'setting']);
Route::get('/data-pegawai', [DashboardController::class, 'getPegawai']);

//Route Ekspor
Route::post('/presensi/export/pdf', [ExportController::class, 'exportToPdf']);
Route::post('/presensi/export/excel', [ExportController::class, 'exportToExcel']);
Route::get('/exportjk', [ExportController::class, 'exportjk'])->name('exportjk');
Route::get('/exceljk', [ExportController::class, 'exceljk'])->name('exceljk');
Route::get('/excel_lap', [ExportController::class, 'excellap'])->name('excel-lap');
Route::get('/export-excel/{userId}/{bulan}/{tahun}', [ExportController::class, 'pegawaiExcel'])->name('pegawai-excel');

// web.php

Route::get('/data-profil', [PegawaiController::class, 'data'])->name('pegawai.index');
// Menampilkan form tambah pegawai
Route::get('/pegawai/tambah', [PegawaiController::class, 'tambah'])->name('pegawai.tambah');
// Menyimpan data pegawai baru
Route::post('/pegawai/store', [PegawaiController::class, 'store'])->name('pegawai.store');
// Menampilkan detail pegawai
Route::get('/pegawai/{id}', [PegawaiController::class, 'show'])->name('pegawai.show');
// Menampilkan form edit pegawai
Route::get('/pegawai/{id}/edit', [PegawaiController::class, 'edit'])->name('pegawai.edit');
// Menyimpan perubahan data pegawai
Route::put('/pegawai/{id}/update', [PegawaiController::class, 'update'])->name('pegawai.update');
// Menghapus data pegawai
Route::delete('/pegawai/{id}', [PegawaiController::class, 'hapus'])->name('pegawai.hapus');


Route::get('/lihat-rekap/{userId}', [RekapController::class, 'lihatRekap'])->name('lihat-rekap');
Route::get('/generate-pdf/{bulan}/{tahun}', [ExportController::class, 'exportlap'])->name('generate-pdf');
Route::get('/cetak-laporan/{bulan}/{tahun}', [ExportController::class, 'cetaklap'])->name('cetak-laporan');

Route::get('/cetak-pegawai/{userId}/{bulan}/{tahun}', [ExportController::class, 'cetakPegawai'])->name('cetak-pegawai');
Route::get('/laporan-pegawai-pdf/{userId}/{bulan}/{tahun}', [ExportController::class, 'pegawaiPDF'])->name('pegawai-pdf');

Route::post('save-attendance', [AttendanceController::class, 'saveAttendance']);
});







