<?php

namespace App\Http\Controllers\master_data;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\Controller;
use App\models\Kecamatan;


class KecamatanController extends Controller
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
    	$list_kecamatan = $this->fetch_list_kecamatan();

    	return view('pages/list_kecamatan',
    		[
    			'list_kecamatan'=>$list_kecamatan
    		]
    		);

    }

    public function create_kecamatan(Request $request)
    {
    	# code...

    	
    	$nama_kecamatan = $request['nama_kecamatan'];

        $luas_wilayah_km2 = $request['luas_wilayah_km2'];

    	$lat = $request['lat'];

    	$lng  = $request['lng'];

    	$kecamatan = new Kecamatan;


    	$kecamatan->nama_kecamatan = $nama_kecamatan;

        $kecamatan->luas_wilayah_km2 = $luas_wilayah_km2;

    	$kecamatan->lat = $lat;

    	$kecamatan->lng = $lng;

    	$kecamatan->is_aktif = 1;


    	$status = $kecamatan->save();

    	if($status){
    		return 1;
    	}
    	else{
    		return 0;
    	}



    }

    public function fetch_kecamatan_by_id_kecamatan(Request $request)
    {
    	# code...
    	$id_kecamatan = $request['id_kecamatan'];

    	$kecamatan = Kecamatan::find($id_kecamatan);

    	return response()->json($kecamatan);
    
    }

     public function update_kecamatan(Request $request)
    {
    	# code...

    	$id_kecamatan = $request['id_kecamatan'];

    	
    	$nama_kecamatan = $request['nama_kecamatan'];

        $luas_wilayah_km2 = $request['luas_wilayah_km2'];

    	$lat = $request['lat'];

    	$lng  = $request['lng'];

    	$kecamatan = Kecamatan::find($id_kecamatan);

    	$kecamatan->nama_kecamatan = $nama_kecamatan;

        $kecamatan->luas_wilayah_km2 = $luas_wilayah_km2;

    	$kecamatan->lat = $lat;

    	$kecamatan->lng = $lng;

    	$status = $kecamatan->save();

    	if($status){
    		return 1;
    	}
    	else{
    		return 0;
    	}



    }

    public function softdelete_kecamatan(Request $request)
    {
    	# code...

    	$kecamatan = Kecamatan::find($request['id_kecamatan']);

    	$kecamatan->is_aktif = 0;

    	$status = $kecamatan->save();

    	if($status){
    		return 1;
    	}
    	else{
    		return 0;
    	}
    }

    private function fetch_list_kecamatan(){
    	$query = Kecamatan::where('kecamatan.is_aktif','=',1)->paginate(25);

    	return $query;
    }
}
