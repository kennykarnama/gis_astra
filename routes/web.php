<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });




Route::get('/admin/login', ['uses' => 'Auth\AdminLoginController@showLoginForm'])->name('admin.login');

Route::post('/admin/login', ['uses' => 'Auth\AdminLoginController@login'])->name('admin.login.submit');

Route::get('/', ['uses' => 'master_data\DashboardController@indexHome'])->name('admin.dashboard');

Route::get('/akun_pengguna', ['uses' => 'master_data\AkunPenggunaController@indexHome'])->name('admin.akun_pengguna');

Route::post('/akun_pengguna/simpan', ['uses' => 'master_data\AkunPenggunaController@create_akun'])->name('admin.akun_pengguna.simpan');

Route::post('/akun_pengguna/hapus', ['uses' => 'master_data\AkunPenggunaController@softdelete_akun'])->name('admin.akun_pengguna.hapus');

Route::post('/akun_pengguna/update', ['uses' => 'master_data\AkunPenggunaController@update_akun'])->name('admin.akun_pengguna.update');


Route::post('/akun_pengguna/ganti_sandi', ['uses' => 'master_data\AkunPenggunaController@change_password'])->name('admin.akun_pengguna.ganti_sandi');

Route::post('/akun_pengguna/get_user_by_id', ['uses' => 'master_data\AkunPenggunaController@get_user_by_id'])->name('admin.akun_pengguna.get_user_by_id');

Route::get('/informasi_arho', ['uses' => 'master_data\InformasiArhoController@indexHome'])->name('admin.informasi_arho');

Route::post('/informasi_arho/simpan', ['uses' => 'master_data\InformasiArhoController@create_arho'])->name('admin.informasi_arho.simpan');

Route::post('/informasi_arho/update', ['uses' => 'master_data\InformasiArhoController@update_arho'])->name('admin.informasi_arho.update');

Route::post('/informasi_arho/hapus', ['uses' => 'master_data\InformasiArhoController@softdelete_arho'])->name('admin.informasi_arho.hapus');

Route::post('/informasi_arho/get_arho_by_id', ['uses' => 'master_data\InformasiArhoController@get_arho_by_id'])->name('admin.informasi_arho.get_arho_by_id');

Route::post('/informasi_arho/get_kelurahan_by_kecamatan', ['uses' => 'master_data\InformasiArhoController@get_kelurahan_by_kecamatan'])->name('admin.informasi_arho.get_kelurahan_by_kecamatan');

Route::post('/informasi_arho/fetch_kelurahan', ['uses' => 'myapi\KelurahanApiController@fetch_list_kelurahan_by_arr'])->name('admin.informasi_arho.fetch_kelurahan');

Route::post('/informasi_arho/simpan_penugasan', ['uses' => 'master_data\InformasiArhoController@create_penugasan_arho'])->name('admin.informasi_arho.simpan_penugasan');

Route::post('/informasi_arho/get_info_penugasan', ['uses' => 'master_data\InformasiArhoController@get_info_penugasan_by_id_kelurahan'])->name('admin.informasi_arho.get_info_penugasan');

Route::post('/arho/fetch_list_arho', ['uses' => 'myapi\ArhoController@fetch_list_arho'])->name('admin.informasi_arho.fetch_list_arho');

Route::post('/informasi_arho/hapus_penugasan', ['uses' => 'myapi\PenugasanArhoApiController@hapus_penugasan_arho'])->name('admin.informasi_arho.hapus_penugasan');

Route::post('/informasi_arho/update_penugasan', ['uses' => 'master_data\InformasiArhoController@update_penugasan_arho'])->name('admin.informasi_arho.update_penugasan_arho');

Route::get('/list_kecamatan', ['uses' => 'master_data\KecamatanController@indexHome'])->name('admin.list_kecamatan');

Route::post('/list_kecamatan/simpan', ['uses' => 'master_data\KecamatanController@create_kecamatan'])->name('admin.list_kecamatan.simpan');

Route::post('/list_kecamatan/update', ['uses' => 'master_data\KecamatanController@update_kecamatan'])->name('admin.list_kecamatan.update');

Route::post('/list_kecamatan/fetch', ['uses' => 'master_data\KecamatanController@fetch_kecamatan_by_id_kecamatan'])->name('admin.list_kecamatan.fetch');

Route::post('/list_kecamatan/hapus', ['uses' => 'master_data\KecamatanController@softdelete_kecamatan'])->name('admin.list_kecamatan.hapus');

Route::post('/kecamatan/get', ['uses' => 'myapi\KecamatanApiController@getKecamatan'])->name('admin.kecamatan.get');


Route::get('/list_kelurahan', ['uses' => 'master_data\KelurahanController@indexHome'])->name('admin.list_kelurahan');

Route::post('/list_kelurahan/simpan', ['uses' => 'master_data\KelurahanController@create_kelurahan'])->name('admin.list_kelurahan.simpan');

Route::post('/list_kelurahan/hapus', ['uses' => 'master_data\KelurahanController@softdelete_kelurahan'])->name('admin.list_kelurahan.hapus');

Route::post('/list_kelurahan/fetch', ['uses' => 'master_data\KelurahanController@fetch_kelurahan_by_id_kelurahan'])->name('admin.list_kelurahan.fetch');

Route::post('/list_kelurahan/update', ['uses' => 'master_data\KelurahanController@update_kelurahan'])->name('admin.list_kelurahan.update');

Route::get('/detail_arho/{pilihan}/{id_arho}', ['uses' => 'master_data\DetailArhoController@view_detail'])->name('admin.detail_arho');

Route::get('/data_customer', ['uses' => 'master_data\DataCustomerController@indexHome'])->name('admin.data_customer');

Route::get('/pembayaran', ['uses' => 'master_data\PembayaranController@indexHome'])->name('admin.pembayaran');

Route::post('/list_kelurahan/fetch_by_kecamatan', ['uses' => 'myapi\KelurahanApiController@fetch_list_kelurahan_by_kecamatan'])->name('admin.list_kelurahan.fetch_by_kecamatan');

Route::post('/peminjaman/simpan', ['uses' => 'master_data\DataCustomerController@create_peminjaman'])->name('admin.peminjaman.simpan');

Route::post('/peminjaman/fetch', ['uses' => 'master_data\DataCustomerController@fetch_peminjaman'])->name('admin.peminjaman.fetch');

Route::post('/peminjaman/update', ['uses' => 'master_data\DataCustomerController@update_peminjaman'])->name('admin.peminjaman.update');

Route::get('/upload_file', ['uses' => 'UploadFileController@indexHome'])->name('admin.upload_file');

Route::post('/upload_file/import', ['uses' => 'UploadFileController@import_excel'])->name('admin.upload_file.import');

Auth::routes();


//Route::get('/home', 'HomeController@index')->name('home');
