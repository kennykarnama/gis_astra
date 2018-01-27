<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Support\Facades\Input;
use Excel;
use Session;
use Alerts;

class UploadFileController extends Controller
{
    //
    public function __construct()
    {
    	# code...
    	set_time_limit ( 0 );

    	$this->middleware('auth:admin');
    }

    public function indexHome()
    {
    	# code...
    	return view('pages.upload_file',[]);
    }

    public function import_excel()
    {
    	# code...
    	if(Input::hasFile('import_file')){

    		
			$path = Input::file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {
				
			})->get();

			$line0 = $data[0];

			$headers = $line0->keys();

			$headers = $headers->all();

			$prepared_data = array();
			//$headers = $headers['items'];

			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {

					$tmp = array();

					for($i=0; $i < count($headers); $i++){
						
						$nama_kolom = $headers[$i];

						$tmp[$nama_kolom] = $value->$nama_kolom;
					}

					array_push($prepared_data, $tmp);

					//$insert[] = ['nama' => $value->nama, 'years' => $value->years];
				}
				if(!empty($prepared_data)){

					//dd($prepared_data);
					
					$status = $this->insert_data_to_db_one_by_one('report',$prepared_data);

					if($status==1){
						$message = "Data berhasil diimport";
					}

					else{
						$message = "Data tidak berhasil diimport";
					}


					 
					
				}

				else{
					$message = "Terjadi error ";
				}


			}
		}

		Session::flash('pesan_import',$message);


		return back();
    }

    private  function insert_data_to_db_one_by_one($table_name,$data)
    {
    	# code...
    	

    		DB::beginTransaction();



		try {
		   
		   	DB::table($table_name)->truncate();

		   for($i = 0; $i < count($data); $i++){
		   		DB::table($table_name)->insert($data[$i]);


		   }

		    DB::commit();

		    return 1;
		    // all good
			} catch (\Exception $e) {
		    DB::rollback();

		    dd($e);

		    return 0;
		    
		    // something went wrong
			}
    	
    }

    private function insert_data_to_db($table_name,$data)
    {
    	# code...
    	DB::beginTransaction();

		try {
		   
		   	DB::table($table_name)->truncate();

		   	DB::table($table_name)->insert($data);

		    DB::commit();

		    return 1;
		    // all good
			} catch (\Exception $e) {
		    DB::rollback();

		    dd($e);

		    return 0;
		    
		    // something went wrong
			}

}


}

