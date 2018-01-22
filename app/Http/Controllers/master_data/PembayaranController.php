<?php

namespace App\Http\Controllers\master_data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use auth;
use App\transaksi\Transaksi;

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
