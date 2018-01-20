<?php

namespace App\Http\Controllers\master_data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class PembayaranController extends Controller
{
    //
    public function __construct()
    {
    	# code...
    	$this->middleware('auth:admin');

    }
    
    public function IndexHome()
    {
    	# code...
    	return view("pages.pembayaran", []);
    }
}
