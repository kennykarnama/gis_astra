<?php

namespace App\Http\Controllers\master_data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    	return view('pages.data_customer');
    }
}
