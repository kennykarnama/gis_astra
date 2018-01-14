<?php

namespace App\Http\Controllers\myapi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\PenugasanArho;
use DB;

class PenugasanArhoApiController extends Controller
{
    //

    public function hapus_penugasan_arho(Request $request)
    {
    	# code...
    	$id_arho = $request['id_arho'];

    	$id_kelurahan = $request['id_kelurahan'];

    	$query = PenugasanArho::where('penugasan_arho.id_arho','=',$id_arho)
    							->where('penugasan_arho.id_kelurahan','=',$id_kelurahan)
    							->where('penugasan_arho.is_aktif','=',1)
    							->update(['penugasan_arho.is_aktif'=>0]);

    	if($query){
    		return 1;
    	}
    	else{
    		return 0;
    	}
    }
}
