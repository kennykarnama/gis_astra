<?php

namespace App\Http\Controllers\master_data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\models\Kota;
use App\models\Kecamatan;
use App\models\Kelurahan;
use App\models\Peminjaman;
use App\models\Arho;


class DataCustomerController extends Controller
{
    //
    public function __construct()
    {
    	# code...
    	$this->middleware('auth:admin');
    }

    public function indexHome()
    {
    	# code...
        $customers = $this->fetchDataCustomer();

        $cities = $this->fetchCities();

        $list_kecamatan = $this->fetchKecamatan();

        $list_arho  = $this->fetchArho();


    	return view('pages.data_customer',
            ['customers'=>$customers,
              'cities'=>$cities,
              'list_kecamatan'=>$list_kecamatan,
              'list_arho'=>$list_arho
            ]);
    }

    public function create_peminjaman(Request $request)
    {
        # code...
        $no_agreement = $request['no_agreement'];

        $nama_peminjam = $request['nama_peminjam'];

        if($nama_peminjam===NULL){
            $nama_peminjam = "-";
        }

        $id_arho = $request['id_arho'];

        $id_kota = $request['id_kota'];

        $id_kecamatan = $request['id_kecamatan'];

        $id_kelurahan = $request['id_kelurahan'];

        $alamat = $request['alamat'];

        $kode_pos = $request['kode_pos'];

        $tgl_jatuh_tempo = $request['tgl_jatuh_tempo'];

         $time = strtotime($tgl_jatuh_tempo);

        $tgl_jatuh_tempo = date('Y-m-d',$time);

        $jumlah_angsuran = $request['jumlah_angsuran'];

        $nilai_angsuran = $request['nilai_angsuran'];

        $saldo = $request['saldo'];

        $is_aktif = 1;

        $peminjaman = new Peminjaman;

        $peminjaman->no_agreement = $no_agreement;

        $peminjaman->nama_peminjam = $nama_peminjam;

        $peminjaman->id_arho = $id_arho;

        $peminjaman->id_kota = $id_kota;

        $peminjaman->id_kecamatan = $id_kecamatan;

        $peminjaman->id_kelurahan = $id_kelurahan;

        $peminjaman->alamat = $alamat;

        $peminjaman->kode_pos = $kode_pos;

        $peminjaman->tgl_jatuh_tempo = $tgl_jatuh_tempo;

        $peminjaman->jumlah_angsuran = $jumlah_angsuran;

        $peminjaman->nilai_angsuran = $nilai_angsuran;

        $peminjaman->saldo = $saldo;

        $peminjaman->is_aktif = $is_aktif;

        $status = $peminjaman->save();

        if($status){
            return 1;
        }
        else{
            return 0;
        }


    }

    public function update_peminjaman(Request $request)
    {
        # code...
        $no_agreement = $request['no_agreement'];

        $id_peminjaman = $request['id_peminjaman'];

        $nama_peminjam = $request['nama_peminjam'];

        if($nama_peminjam===NULL){
            $nama_peminjam = "-";
        }

        $id_arho = $request['id_arho'];

        $id_kota = $request['id_kota'];

        $id_kecamatan = $request['id_kecamatan'];

        $id_kelurahan = $request['id_kelurahan'];

        $alamat = $request['alamat'];

        $kode_pos = $request['kode_pos'];

        $tgl_jatuh_tempo = $request['tgl_jatuh_tempo'];

         $time = strtotime($tgl_jatuh_tempo);

        $tgl_jatuh_tempo = date('Y-m-d',$time);

        $jumlah_angsuran = $request['jumlah_angsuran'];

        $nilai_angsuran = $request['nilai_angsuran'];

        $saldo = $request['saldo'];

        $is_aktif = 1;

        $peminjaman = Peminjaman::find($id_peminjaman);

        $peminjaman->no_agreement = $no_agreement;

        $peminjaman->nama_peminjam = $nama_peminjam;

        $peminjaman->id_arho = $id_arho;

        $peminjaman->id_kota = $id_kota;

        $peminjaman->id_kecamatan = $id_kecamatan;

        $peminjaman->id_kelurahan = $id_kelurahan;

        $peminjaman->alamat = $alamat;

        $peminjaman->kode_pos = $kode_pos;

        $peminjaman->tgl_jatuh_tempo = $tgl_jatuh_tempo;

        $peminjaman->jumlah_angsuran = $jumlah_angsuran;

        $peminjaman->nilai_angsuran = $nilai_angsuran;

        $peminjaman->saldo = $saldo;

        $peminjaman->is_aktif = $is_aktif;

        $status = $peminjaman->save();

        if($status){
            return 1;
        }
        else{
            return 0;
        }
    }

    public function fetch_peminjaman(Request $request)
    {
        # code...
        $no_agreement = $request['no_agreement'];

        $query = $this->fetchPeminjaman($no_agreement);

        return response()->json($query);
    }

    private function fetchDataCustomer()
    {
        # code...
        $query = DB::table('peminjaman')
            ->join('arho','arho.id_arho','=','peminjaman.id_arho')
            ->join('kota','kota.id_kota','=','peminjaman.id_kota')
            ->join('kecamatan','kecamatan.id_kecamatan','=','peminjaman.id_kecamatan')
            ->join('kelurahan','kelurahan.id_kelurahan','=','peminjaman.id_kelurahan')
            ->where('peminjaman.is_aktif','=',1)
            ->get();

        return $query;
    }

    private function fetchPeminjaman($no_agreement)
    {
        # code...
        $query = DB::table('peminjaman')
            ->join('arho','arho.id_arho','=','peminjaman.id_arho')
            ->join('kota','kota.id_kota','=','peminjaman.id_kota')
            ->join('kecamatan','kecamatan.id_kecamatan','=','peminjaman.id_kecamatan')
            ->join('kelurahan','kelurahan.id_kelurahan','=','peminjaman.id_kelurahan')
            ->where('peminjaman.is_aktif','=',1)
            ->where('peminjaman.no_agreement','=',$no_agreement)
            ->get();

        return $query;
    }

    private function fetchCities(){
        $query = Kota::where('kota.is_aktif','=',1)->get();

        return $query;
    }

    private function fetchKecamatan(){
        $query = Kecamatan::where('kecamatan.is_aktif','=',1)->get();

        return $query;
    }

    private function fetchArho(){
        $query = Arho::where('arho.is_aktif','=',1)->get();

        return $query;
    }
}
