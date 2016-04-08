<?php

namespace App\Http\Controllers;
use Request;
use Input;
use File;
use App\Grader;
use App\Retribusi;
use DB;
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
    	set_time_limit(108000);
		
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
            $k = 0;
			$header = array();
			while(! feof($file)){
				$tmp = fgetcsv($file,0,"~");
				if($tmp != null){
					if ($k==0){
						for($j=0;$j<sizeof($tmp);$j++){
							if($j==0)
								array_push($header, "id");
							else
								array_push($header, $tmp[$j]);
						}
						array_push($header, "KATEGORI");
						array_push($header, "STATUS_AKTIF");
					}
					else{
						$data = $tmp;
						array_push($data, "non_rumah_tangga");
						array_push($data, "1");

						$header_string ="";
						for($i=0;$i<sizeof($header);$i++){
							$header[$i] = str_replace('"','\"',$header[$i]);
							$header[$i] = str_replace("'","\'",$header[$i]);
							if ($i!=0){
								$header_string.=", ";
							}
							$header_string.= ($header[$i]);
						}

						$data_string ="";
						for($i=0;$i<sizeof($data);$i++){
							$data[$i] = str_replace('"','\"',$data[$i]);
							$data[$i] = str_replace("'","\'",$data[$i]);
							if ($i!=0){
								$data_string.=", ";
							}
							$data_string.= '"'.($data[$i]).'"';
						}

						$update_string = "";
						for($i=1;$i<sizeof($data);$i++){
							if ($i!=1){
								$update_string.=", ";
							}
							$update_string.= $header[$i].'="'.$data[$i].'"';
						}

						$SQL = "INSERT INTO pelanggan (".$header_string.") VALUES (".$data_string.") ON DUPLICATE KEY UPDATE ". $update_string;
						DB::unprepared($SQL);
						// print_r($SQL);
						// echo "<br>";
					}
				}
				$k++;
			}

			$file_rumah_tangga = array_get($input,'rumah_tangga');
            $fileName_rumah_tangga = $file_rumah_tangga->getClientOriginalName();
            $upload_success = $file_rumah_tangga->move("upload", $fileName_rumah_tangga);

            $file = fopen(public_path("upload\\".$fileName_rumah_tangga), "r");
            $k = 0;
			$header = array();
			while(! feof($file)){
				$tmp = fgetcsv($file,0,"~");
				if($tmp != null){
					if ($k==0){
						for($j=0;$j<sizeof($tmp);$j++){
							if($j==0)
								array_push($header, "id");
							else
								array_push($header, $tmp[$j]);
						}
						array_push($header, "KATEGORI");
						array_push($header, "STATUS_AKTIF");
					}
					else{
						$data = $tmp;
						array_push($data, "non_rumah_tangga");
						array_push($data, "1");

						$header_string ="";
						for($i=0;$i<sizeof($header);$i++){
							$header[$i] = str_replace('"','\"',$header[$i]);
							$header[$i] = str_replace("'","\'",$header[$i]);
							if ($i!=0){
								$header_string.=", ";
							}
							$header_string.= ($header[$i]);
						}

						$data_string ="";
						for($i=0;$i<sizeof($data);$i++){
							$data[$i] = str_replace('"','\"',$data[$i]);
							$data[$i] = str_replace("'","\'",$data[$i]);
							if ($i!=0){
								$data_string.=", ";
							}
							$data_string.= '"'.($data[$i]).'"';
						}

						$update_string = "";
						for($i=1;$i<sizeof($data);$i++){
							if ($i!=1){
								$update_string.=", ";
							}
							$update_string.= $header[$i].'="'.$data[$i].'"';
						}

						$SQL = "INSERT INTO pelanggan (".$header_string.") VALUES (".$data_string.") ON DUPLICATE KEY UPDATE ". $update_string;
						DB::unprepared($SQL);
						// print_r($SQL);
						// echo "<br>";
					}
				}
				$k++;
			}
			print_r($k);
		}
    }

    public function retribusi(){

    	return view('dkp.retribusi');
    }

    public function insertRetribusi(){
    	ini_set("upload_max_filesize","300M");
    	ini_set("post_max_size","300M");
    	set_time_limit(108000);
		
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
            $k = 0;
			$header = array();
			while(! feof($file)){
				$tmp = fgetcsv($file,0,"~");
				if($tmp != null){
					if ($k==0){
						
						array_push($header, "PELANGGAN_ID");
						array_push($header, "KD_TARIF");
						array_push($header, "RETRIBUSI");
						array_push($header, "TGL_LUNAS");
						array_push($header, "BLN_RETRIBUSI");
						array_push($header, "THN_RETRIBUSI");
						array_push($header, "STATUS_CEK");

					}
					else{
						$data = array();
						array_push($data, $tmp[0]);
						array_push($data, $tmp[7]);
						array_push($data, $tmp[8]);
						array_push($data, $tmp[9]);
						array_push($data, "OKTOBER");
						array_push($data, "2016");
						array_push($data, "0");

						$header_string ="";
						for($i=0;$i<sizeof($header);$i++){
							$header[$i] = str_replace('"','\"',$header[$i]);
							$header[$i] = str_replace("'","\'",$header[$i]);
							if ($i!=0){
								$header_string.=", ";
							}
							$header_string.= ($header[$i]);
						}

						$data_string ="";
						for($i=0;$i<sizeof($data);$i++){
							$data[$i] = str_replace('"','\"',$data[$i]);
							$data[$i] = str_replace("'","\'",$data[$i]);
							if ($i!=0){
								$data_string.=", ";
							}
							if ($i==3) {
								$data_string.="STR_TO_DATE('".$data[$i]."', '%d/%m/%Y')";
							}
							else
								$data_string.= '"'.($data[$i]).'"';
						}

						$SQL = "INSERT INTO retribusi (".$header_string.") VALUES (".$data_string.")";
						DB::unprepared($SQL);
						// print_r($SQL);
						// echo "<br>";
					}
				}
				$k++;
			}
			print_r($k);

			$file_rumah_tangga = array_get($input,'rumah_tangga');
            $fileName_rumah_tangga = $file_rumah_tangga->getClientOriginalName();
            $upload_success = $file_rumah_tangga->move("upload", $fileName_rumah_tangga);

            $file = fopen(public_path("upload\\".$fileName_rumah_tangga), "r");
            $k = 0;
			$header = array();
			while(! feof($file)){
				$tmp = fgetcsv($file,0,"~");
				if($tmp != null){
					if ($k==0){
						
						array_push($header, "PELANGGAN_ID");
						array_push($header, "KD_TARIF");
						array_push($header, "RETRIBUSI");
						array_push($header, "TGL_LUNAS");
						array_push($header, "BLN_RETRIBUSI");
						array_push($header, "THN_RETRIBUSI");
						array_push($header, "STATUS_CEK");

					}
					else{
						$data = array();
						array_push($data, $tmp[0]);
						array_push($data, $tmp[7]);
						array_push($data, $tmp[8]);
						array_push($data, $tmp[9]);
						array_push($data, "OKTOBER");
						array_push($data, "2016");
						array_push($data, "0");

						$header_string ="";
						for($i=0;$i<sizeof($header);$i++){
							$header[$i] = str_replace('"','\"',$header[$i]);
							$header[$i] = str_replace("'","\'",$header[$i]);
							if ($i!=0){
								$header_string.=", ";
							}
							$header_string.= ($header[$i]);
						}

						$data_string ="";
						for($i=0;$i<sizeof($data);$i++){
							$data[$i] = str_replace('"','\"',$data[$i]);
							$data[$i] = str_replace("'","\'",$data[$i]);
							if ($i!=0){
								$data_string.=", ";
							}
							if ($i==3) {
								$data_string.="STR_TO_DATE('".$data[$i]."', '%d/%m/%Y')";
							}
							else
								$data_string.= '"'.($data[$i]).'"';
						}

						$SQL = "INSERT INTO retribusi (".$header_string.") VALUES (".$data_string.")";
						DB::unprepared($SQL);
						// print_r($SQL);
						// echo "<br>";
					}
				}
				$k++;
			}
			print_r($k);
		}

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
