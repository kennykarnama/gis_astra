<?php

namespace App\Http\Controllers\master_data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Arho;
use App\models\Kecamatan;
use App\models\Kelurahan;
use App\models\PenugasanArho;
use DB;

class DetailArhoController extends Controller
{
    //
    public function __construct()
    {
    	# code...
    	$this->middleware('auth:admin');
    }



    public function view_detail(Request $request, $pilihan_detail,$id_arho)
    {
    	# code...
    	

    	
    	

    	$data = $this->fetchDetailArho($pilihan_detail,$id_arho);
    	$arho = $this->getArho($id_arho);

    	//dd($arho);

    	// dd($id_arho);

    	if($pilihan_detail == 2){
    		return view('pages.detail_arho_wilayah',[
    			'data'=>$data,
    			'arho'=>$arho
    			]);
    	}

    	else{
    		return view('pages.detail_arho_customer',[
    			'data'=>$data
    			]);
    	}

    	

    }

    /**
    	$pilihan_detail = > 
				
				1 untuk customer
				
				2 untuk wilayah

    **/



    private function fetchDetailArho($pilihan_detail,$id_arho){
    		
    	$data = array();


    	if($pilihan_detail==2){
    		$data = $this->fetchSusunanPenugasan($id_arho);
    	}

    	return $data;

    }

    private function fetchSusunanPenugasan($id_arho){
        $list_kecamatan = $this->fetchKecamatan();

        $list_kelurahan = $this->fetchKelurahan();

        $list_penugasan = $this->fetchPenugasanArho($id_arho);

        $susunan_penugasan = array();

        foreach ($list_kecamatan as $kecamatan) {
            # code...
            
            $root = array(
                'id_kecamatan'=>$kecamatan->id_kecamatan,
                'nama_kecamatan'=>$kecamatan->nama_kecamatan
                );

            $child = array();

            foreach ($list_kelurahan as $kelurahan) {
                # code...
                if($kelurahan->id_kecamatan == $kecamatan->id_kecamatan){

                      $child_child = array();

                    foreach ($list_penugasan as $penugasan) {
                        # code...

                      

                        if($penugasan->id_kelurahan == $kelurahan->id_kelurahan){

                            $tmp_child = array(
                                    'id_penugasan_arho'=>$penugasan->id_penugasan_arho,
                                    'id_arho'=>$penugasan->id_arho,
                                    'nama_arho'=>$penugasan->nama_lengkap

                                );

                            array_push($child_child, $tmp_child);

                        }
                    }
                    
                    $tmp = array(
                        'id_kelurahan'=>$kelurahan->id_kelurahan,
                        'nama_kelurahan'=>$kelurahan->nama_kelurahan
                        );

                    if(count($child_child)>0){
                        
                        $tmp['penugasan'] = $child_child;
                        
                        array_push($child, $tmp);    

                    }

                    
                
                }
            }

            if(count($child)>0){
                $root['kelurahan'] = $child; 

                array_push($susunan_penugasan, $root);
            }

        }

        return $susunan_penugasan;
    }

      private function fetchKelurahan(){
        $query = Kelurahan::where('kelurahan.is_aktif','=',1)->get();

        return $query;
    }

    private function fetchKecamatan(){
        $query = Kecamatan::where('kecamatan.is_aktif','=',1)->get();

        return $query;
    }
 private function fetchPenugasanArho($id_arho){
       $query = DB::table('penugasan_arho')
                    ->join('arho','arho.id_arho','=','penugasan_arho.id_arho')
                    ->join('kelurahan','kelurahan.id_kelurahan','=','penugasan_arho.id_kelurahan')
                    ->join('kecamatan','kecamatan.id_kecamatan','=','kelurahan.id_kecamatan')
                    ->where('penugasan_arho.is_aktif','=',1)
                    ->where('arho.id_arho','=',$id_arho)
                    ->get();

        return $query;
    }

    private function getArho($id_arho){
    	$arho = Arho::find($id_arho);

    	return $arho;

    }



}
