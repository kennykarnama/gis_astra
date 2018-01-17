<?php

namespace App\Http\Controllers\master_data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Kecamatan;
use App\models\Kelurahan;
use DB;


class KelurahanController extends Controller
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
    	$list_kecamatan = $this->fetchListKecamatan();

    	$list_kelurahan = $this->fetchListKelurahan();

    	return view('pages/list_kelurahan',

    			[
    				'list_kelurahan'=>$list_kelurahan,
    				'list_kecamatan'=>$list_kecamatan
    			]
    		);

    }

    public function create_kelurahan(Request $request)
    {
    	# code...
    	$id_kecamatan = $request['id_kecamatan'];

    	$nama_kelurahan = $request['nama_kelurahan'];

    	$lat = $request['lat'];

    	$lng = $request['lng'];


    	$kelurahan = new Kelurahan;

    	$kelurahan->id_kecamatan = $id_kecamatan;

    	$kelurahan->nama_kelurahan = $nama_kelurahan;

    	$kelurahan->lat = $lat;

    	$kelurahan->lng = $lng;

    	$status = $kelurahan->save();

    	if($status)
    		return 1;
    	else
    		return 0;
    }

    public function update_kelurahan(Request $request)
    {
    	# code...
    	$id_kelurahan = $request['id_kelurahan'];

    	$id_kecamatan = $request['id_kecamatan'];

    	$nama_kelurahan = $request['nama_kelurahan'];

    	$lat = $request['lat'];

    	$lng = $request['lng'];

    	$kelurahan = Kelurahan::find($id_kelurahan);

    	$kelurahan->id_kecamatan = $id_kecamatan;

    	$kelurahan->nama_kelurahan = $nama_kelurahan;

    	$kelurahan->lat = $lat;

    	$kelurahan->lng = $lng;

    	$status = $kelurahan->save();

    	if($status){
    		return 1;
    	}

    	else{
    		return 0;
    	}
    }

    public function softdelete_kelurahan(Request $request)
    {
    	# code...
    	$id_kelurahan = $request['id_kelurahan'];

    	$kelurahan = Kelurahan::find($id_kelurahan);

    	$kelurahan->is_aktif = 0;

    	$status = $kelurahan->save();

    	if($status){
    		return 1;
    	}
    	else{
    		return 0;
    	}
    }

    public function fetch_kelurahan_by_id_kelurahan(Request $request)
    {
    	# code...
    	$id_kelurahan = $request['id_kelurahan'];

    	$query = Kelurahan::find($id_kelurahan);

    	return response()->json($query);
    }

    private function fetchListKecamatan(){
    	$query = Kecamatan::where('kecamatan.is_aktif','=',1)->get();

    	return $query;
    }

    private function fetchListKelurahan(){
    	$query = DB::table('kelurahan')
                     ->select('kelurahan.id_kelurahan','kelurahan.lat','kelurahan.lng',
                        'kelurahan.nama_kelurahan','kecamatan.nama_kecamatan')
    				 ->join('kecamatan','kecamatan.id_kecamatan','=','kelurahan.id_kecamatan')
    				 ->where('kelurahan.is_aktif','=',1)
                     ->paginate(25);

    	return $query;
    }
}
