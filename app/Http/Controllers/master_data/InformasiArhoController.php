<?php

namespace App\Http\Controllers\master_data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\models\Arho;
use App\models\Kecamatan;
use App\models\Kelurahan;
use App\models\PenugasanArho;
use DB;

class InformasiArhoController extends Controller
{
    //

    public function __construct(){
    	$this->middleware('auth:admin');
    }

    public function indexHome()
    {
    	# code...
    	$list_arho = $this->fetchListArho();

        $susunan_penugasan = $this->fetchSusunanPenugasan();

        $list_kecamatan = $this->fetchKecamatan();

        $list_kelurahan = $this->fetchKelurahan();

        $list_kelurahan_kecamatan = $this->fetchJoinedKelurahan();

    //    dd($list_kelurahan_kecamatan);

    	return view('pages/informasi_arho',
    		[
    			'list_arho'=>$list_arho,
                'susunan_penugasan'=>$susunan_penugasan,
                'list_kelurahan'=>$list_kelurahan,
                'list_kecamatan'=>$list_kecamatan,
                'list_kelurahan_kecamatan'=>$list_kelurahan_kecamatan
    		]
    		);
    }

    public function update_penugasan_arho(Request $request)
    {
        # code...
        $id_kelurahan = $request['id_kelurahan'];

        $tgl_input = $request['tgl_input'];

        $arho = $request['arho'];

        DB::beginTransaction();

        try {
            
            DB::table('penugasan_arho')->where('penugasan_arho.id_kelurahan','=',$id_kelurahan)
                                        ->where('penugasan_arho.is_aktif','=',1)
                                        ->where('penugasan_arho.tgl_input','=',$tgl_input)
                                        ->delete();

            $time = strtotime($tgl_input);

             $newformat = date('Y-m-d',$time);

            $hitung = 0;

            for($i=0;$i < count($arho);$i++){
            $penugasan_arho = new PenugasanArho;

            $penugasan_arho->tgl_input = $newformat;

            $penugasan_arho->id_arho = $arho[$i];

            $penugasan_arho->id_kelurahan = $id_kelurahan;

              $query = $penugasan_arho->save();

              if($query){
                $hitung++;
              }
            }



            DB::commit();

            // all good

            return 1;
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            //throw $e;

            return 0;
        }
    
    }

    public function create_penugasan_arho(Request $request)
    {
        # code...
        $tgl_input = $request['tgl_input'];

        $id_arho = $request['id_arho'];

        $kecamatan = $request['kecamatan'];

        $kelurahan = $request['kelurahan'];

        // $arr_kelurahan = explode(",", $kelurahan);

        $time = strtotime($tgl_input);

        $newformat = date('Y-m-d',$time);

        $hitung = 0;

        for($i=0;$i < count($kelurahan);$i++){
        $penugasan_arho = new PenugasanArho;

        $penugasan_arho->tgl_input = $newformat;

        $penugasan_arho->id_arho = $id_arho;

        $penugasan_arho->id_kelurahan = $kelurahan[$i];

          $query = $penugasan_arho->save();

          if($query){
            $hitung++;
          }
        }

        

      

        if($hitung==count($kelurahan)){
            return 1;
        }
        else{
            return 0;
        }
    }

    public function create_arho(Request $request)
    {
        # code...

         $nama_lengkap = $request['nama_lengkap'];

         $avatar_path = $request['avatar_path'];

        
        DB::beginTransaction();

        try {
           
           // insert ke tabel arho terlebih dahulu

              $arho = new Arho;

              $arho->nama_lengkap = $nama_lengkap;

               if(is_null($avatar_path)){
                 $avatar_path = "";
            }

              $arho->avatar = $avatar_path;

              $query = $arho->save();

            // insert ke tabel penugasan

        $tgl_input = $request['tgl_input'];

        $id_arho = $arho->id_arho;

       $arr_kelurahan = $request['arr_kelurahan'];

       if(!isset($arr_kelurahan)){
        $arr_kelurahan = array();
       }

        // $arr_kelurahan = explode(",", $kelurahan);

        $time = strtotime($tgl_input);

        $newformat = date('Y-m-d',$time);

        $hitung = 0;

        for($i=0;$i < count($arr_kelurahan);$i++){
        $penugasan_arho = new PenugasanArho;

        $penugasan_arho->tgl_input = $newformat;

        $penugasan_arho->id_arho = $id_arho;

        $penugasan_arho->id_kelurahan = $arr_kelurahan[$i];

          $query = $penugasan_arho->save();

          if($query){
            $hitung++;
          }
        }

      

            DB::commit();

            return 1;
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
            return 0;
            // something went wrong
        }

       

       

      

      
    }

    public function softdelete_arho(Request $request)
    {
        # code...

         $id_arho = $request['id_arho'];

        DB::beginTransaction();

        try {
           
            
        Arho::where('arho.id_arho','=',$id_arho)
                       ->update(['arho.is_aktif'=>0]);


        PenugasanArho::where('penugasan_arho.id_arho','=',$id_arho)
                       ->where('penugasan_arho.is_aktif','=',1)
                        ->update(['penugasan_arho.is_aktif'=>0]);             

            DB::commit();

            return 1;
            // all good
        } catch (\Exception $e) {
            DB::rollback();

            return 0;
            // something went wrong
        }

       

    }

    public function update_arho(Request $request)
    {
        # code...
        $id_arho = $request['id_arho'];

        $nama_lengkap = $request['nama_lengkap'];

      
        $avatar_path = $request['avatar_path'];

        $tgl_input = $request['tgl_input'];

        $time = strtotime($tgl_input);

         $newformat = date('Y-m-d',$time);

        $arr_kelurahan = $request['arr_kelurahan'];

        if(is_null($avatar_path)){
            $avatar_path = "";
        }

        DB::beginTransaction();

        try {
            
            $query = Arho::where('arho.id_arho','=',$id_arho)
                       ->update(

                        [
                            'nama_lengkap'=>$nama_lengkap,
                            'avatar'=>$avatar_path
                        ]
                        );

            // insert sesuai dengan arr kelurahan

            for($i = 0; $i < count($arr_kelurahan); $i++){
                
                $penugasan_arho = new PenugasanArho;

                $penugasan_arho->id_arho = $id_arho;

                $penugasan_arho->id_kelurahan = $arr_kelurahan[$i];

                $penugasan_arho->tgl_input = $newformat;

                $penugasan_arho->is_aktif = 1;

                $penugasan_arho->save();

            }

            DB::commit();

            return 1;
            // all good
        } catch (\Exception $e) {
            DB::rollback();

            return 0;
            // something went wrong
        }

        

        
    }

    public function get_arho_by_id(Request $request)
    {
        # code...
        $id_arho = $request['id_arho'];

        $query = Arho::where('arho.id_arho','=',$id_arho)->get();

        $query_penugasan = $this->fetchPenugasanArhoByIdArho($id_arho);

        $resp = array(
            'arho'=>$query,
            'penugasan_arho'=>$query_penugasan
            );

        return response()->json($resp);
    }

    public function get_kelurahan_by_kecamatan(Request $request)
    {
        # code...
        $id_kecamatan = $request['id_kecamatan'];

        $query = Kelurahan::where('kelurahan.id_kecamatan','=',$id_kecamatan)->get();

        return response()->json($query);
    }

    public function get_info_penugasan_by_id_kelurahan(Request $request)
    {
        # code...
        $id_kelurahan = $request['id_kelurahan'];

        $query = $this->fetchPenugasanArhoByIdKelurahan($id_kelurahan);

        return response()->json($query);


    }

    private function fetchSusunanPenugasan(){
        $list_kecamatan = $this->fetchKecamatan();

        $list_kelurahan = $this->fetchKelurahan();

        $list_penugasan = $this->fetchPenugasanArho();

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

    private function fetchJoinedKelurahan(){
      
      $list_kelurahan = $this->fetchKelurahan();

      $list_kecamatan = $this->fetchKecamatan();

        $final_array = array();

        foreach ($list_kecamatan as $kecamatan) {
            # code...

            $tmp_kecamatan = array(
                    'id_kecamatan'=>$kecamatan->id_kecamatan,
                    'nama_kecamatan'=>$kecamatan->nama_kecamatan
                );

            $arr_kelurahan_per_kecamatan = array();

            foreach ($list_kelurahan as $kelurahan) {
                # code...
                if($kelurahan->id_kecamatan == $kecamatan->id_kecamatan){
                    $tmp_kelurahan = array(
                        'id_kelurahan'=>$kelurahan->id_kelurahan,
                        'nama_kelurahan'=>$kelurahan->nama_kelurahan
                        );

                    array_push($arr_kelurahan_per_kecamatan, $tmp_kelurahan);
                }
            }

            $tmp_kecamatan['kelurahan'] = $arr_kelurahan_per_kecamatan;

            array_push($final_array, $tmp_kecamatan);
        }

        return $final_array;
    }

    private function fetchKelurahan(){
        $query = Kelurahan::where('kelurahan.is_aktif','=',1)->get();

        return $query;
    }

    private function fetchKecamatan(){
        $query = Kecamatan::where('kecamatan.is_aktif','=',1)->get();

        return $query;
    }

    private function fetchListArho(){
    	
    	$query = Arho::where('arho.is_aktif','=',1)->paginate(1000);

    	return $query;
    }

    private function fetchPenugasanArho(){
       $query = DB::table('penugasan_arho')
                    ->join('arho','arho.id_arho','=','penugasan_arho.id_arho')
                    ->join('kelurahan','kelurahan.id_kelurahan','=','penugasan_arho.id_kelurahan')
                    ->join('kecamatan','kecamatan.id_kecamatan','=','kelurahan.id_kecamatan')
                    ->where('penugasan_arho.is_aktif','=',1)
                    ->get();

        return $query;
    }

    private function fetchPenugasanArhoByIdArho($id_arho){
        $query = DB::table('penugasan_arho')
                    ->join('arho','arho.id_arho','=','penugasan_arho.id_arho')
                    ->join('kelurahan','kelurahan.id_kelurahan','=','penugasan_arho.id_kelurahan')
                    ->join('kecamatan','kecamatan.id_kecamatan','=','kelurahan.id_kecamatan')
                    ->where('penugasan_arho.is_aktif','=',1)
                    ->where('penugasan_arho.id_arho','=',$id_arho)
                    ->get();

        return $query;
    }

    private function fetchPenugasanArhoByIdKelurahan($id_kelurahan){
        $query = DB::table('penugasan_arho')
                    ->join('arho','arho.id_arho','=','penugasan_arho.id_arho')
                    ->join('kelurahan','kelurahan.id_kelurahan','=','penugasan_arho.id_kelurahan')
                    ->join('kecamatan','kecamatan.id_kecamatan','=','kelurahan.id_kecamatan')
                    ->where('penugasan_arho.is_aktif','=',1)
                    ->where('penugasan_arho.id_kelurahan','=',$id_kelurahan)
                    ->get();

        return $query;
    }
}
