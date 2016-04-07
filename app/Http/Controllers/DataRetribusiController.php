<?php

namespace App\Http\Controllers;
use Request;
use Input;
use File;
use App\Grader;
use App\Retribusi;
class DataRetribusiController extends Controller
{
    public function index(){

    }

    public function potensi(){

    	return view('dkp.potensi');
    }

    public function insertPotensi(){
    	ini_set("upload_max_filesize","300M");
    	ini_set("post_max_size","300M");
		
    	$input = Input::all();

		if ($_FILES["non_rumah_tangga"]["error"] > 0){
		  echo "Error: " . $_FILES["non_rumah_tangga"]["error"] . "<br />";
		}
		if ($_FILES["rumah_tangga"]["error"] > 0){
		  echo "Error: " . $_FILES["rumah_tangga"]["error"] . "<br />";
		}
		else{

			$file_non_rumah_tangga = array_get($input,'non_rumah_tangga');
            $fileName_non_rumah_tangga = $file_non_rumah_tangga->getClientOriginalName();
            $upload_success = $file_non_rumah_tangga->move("upload", $fileName_non_rumah_tangga);

            $file = fopen(public_path("upload\\".$fileName_non_rumah_tangga), "r");
            $i = 0;
			$header = array();
			while(! feof($file)){
				$tmp = fgetcsv($file,0,"~");
				if($tmp != null){
					if ($i==0){
						for($j=0;$j<sizeof($tmp);$j++){
							array_push($header, $tmp[$j]);
						}
						array_push($header, "KATEGORI");
						array_push($header, "STATUS_AKTIF");
					}
					else{
						$data = $tmp;
						array_push($data, "non_rumah_tangga");
						array_push($data, "1");
						//$this->pelanggan->insertOnDuplicate($header,$data);
					}
				}	
				$i++;
			}
			print_r($i);
			echo "<br>";

			$file_rumah_tangga = array_get($input,'rumah_tangga');
            $fileName_rumah_tangga = $file_rumah_tangga->getClientOriginalName();
            $upload_success = $file_rumah_tangga->move("upload", $fileName_rumah_tangga);

            $file = fopen(public_path("upload\\".$fileName_rumah_tangga), "r");
            $i = 0;
			$header = array();
			while(! feof($file)){
				$tmp = fgetcsv($file,0,"~");
				if($tmp != null){
					if ($i==0){
						for($j=0;$j<sizeof($tmp);$j++){
							array_push($header, $tmp[$j]);
						}
						array_push($header, "KATEGORI");
						array_push($header, "STATUS_AKTIF");
					}
					else{
						$data = $tmp;
						array_push($data, "rumah_tangga");
						array_push($data, "1");
						//$this->pelanggan->insertOnDuplicate($header,$data);
					}
				}	
				$i++;
			}
			print_r($i);
		}
    }

    public function retribusi(){

    	return view('dkp.home');
    }

    public function banding(){
    	$grader = Grader::first();
    	$sumof0 = Retribusi::where('status_cek','=',0)->count();
    	return view('dkp.bandingkan',compact('grader','sumof0'));
    }

    public function start(){
    	Grader::where('status',0)->update(array(
			'status' => '1'
		));
    	return redirect("http://localhost:3000/start");
    }

    public function stop(){
    	Grader::where('status',1)->update(array(
			'status' => '0'
		));
    	return redirect("http://localhost:3000/stop");
    }

}
