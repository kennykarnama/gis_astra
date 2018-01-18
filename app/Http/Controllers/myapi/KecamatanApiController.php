<?php

namespace App\Http\Controllers\myapi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Kecamatan;

class KecamatanApiController extends Controller
{
    //
    public function getKecamatan(Request $request)
    {
    	# code...
    	$id_kecamatan = $request['id_kecamatan'];

    	$kecamatan = Kecamatan::find($id_kecamatan);

    	return response()->json($kecamatan);
    }
}
