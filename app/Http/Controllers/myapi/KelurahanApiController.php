<?php

namespace App\Http\Controllers\myapi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Kelurahan;
use DB;

class KelurahanApiController extends Controller
{
    //

    public function fetch_list_kelurahan_by_kecamatan(Request $request)
    {
        # code...
        $id_kecamatan = $request['id_kecamatan'];

        $query = $this->fetchListKelurahanByIdKecamatan($id_kecamatan);

        return response()->json($query);
    }

    public function fetch_list_kelurahan_by_arr(Request $request)
    {
    	# code...

    	$arr_id_kecamatan = $request['arr_id_kecamatan'];

    	// iterate over arr_id_kecamatan

    	$arr_query = array();

    	for($i=0;$i<count($arr_id_kecamatan);$i++){

    		$hasil = $this->fetchListKelurahanByIdKecamatan($arr_id_kecamatan[$i]);

    		foreach ($hasil as $item) {
    			# code...
    			array_push($arr_query, $item);
    		}

    		//array_push($arr_query, $hasil);
    	}

    	return response()->json($arr_query);


    }

    private function fetchListKelurahanByIdKecamatan($id_kecamatan){
    	$query = Kelurahan::where('kelurahan.id_kecamatan','=',$id_kecamatan)
    						->where('kelurahan.is_aktif','=',1)
    						->get();

    	return $query;
    }
}
