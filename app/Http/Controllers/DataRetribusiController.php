<?php

namespace App\Http\Controllers;
use Request;
use Input;
use File;
use App\Grader;
use App\RetribusiPemerintah;
use App\RetribusiSwasta;
use DB;
use App\LunasSwasta;
use App\LunasPemerintah;
use App\TunggakanSwasta;
use App\TunggakanPemerintah;
use Hash;

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
    	$grader 			= Grader::first();
    	$sumof0Pemerintah 	= RetribusiPemerintah::where('status_cek','=',0)->count();
    	$sumof0Swasta	 	= RetribusiSwasta::where('status_cek','=',0)->count();
    	return view('dkp.bandingkan',compact('grader','sumof0Pemerintah','sumof0Swasta'));
    }

    public function startPemerintah(){
    	Grader::where('statusPemerintah',0)->update(array(
			'statusPemerintah' => '1'
		));
    	return redirect("http://localhost:3000/startPemerintah");
    }

    public function stopPemerintah(){
    	Grader::where('statusPemerintah',1)->update(array(
			'statusPemerintah' => '0'
		));
    	return redirect("http://localhost:3000/stopPemerintah");
    }

    public function startSwasta(){
    	Grader::where('statusSwasta',0)->update(array(
			'statusSwasta' => '1'
		));
    	return redirect("http://localhost:3000/startSwasta");
    }

    public function stopSwasta(){
    	Grader::where('statusSwasta',1)->update(array(
			'statusSwasta' => '0'
		));
    	return redirect("http://localhost:3000/stopSwasta");
    }

    public function nunggakPemerintah(){
    	if (Request::isMethod('get'))
    	{
    		$tahun = TunggakanPemerintah::select('tahun')->distinct()->orderBy('tahun','ASC')->get();
    		$bulan = TunggakanPemerintah::select('bulan')->distinct()->orderBy('bulan','ASC')->get();
    		return view("dkp.nunggakPemerintah", compact('tahun','bulan'));	
    	}
    	else
    	{
    		$data = Input::all();
    		$curTahun = $data['tahun'];
    		$curBulan = $data['bulan'];
    		$tahun = TunggakanPemerintah::select('tahun')->distinct()->orderBy('tahun','ASC')->get();
    		$bulan = TunggakanPemerintah::select('bulan')->distinct()->orderBy('bulan','ASC')->get();
    		$list = TunggakanPemerintah::where('tahun',$data['tahun'])->where('bulan',$data['bulan'])->get();
    		return view("dkp.nunggakPemerintah", compact('tahun','bulan','list','curTahun','curBulan'));	
    	}
    	
    }

    public function nunggakSwasta(){
    	if (Request::isMethod('get'))
    	{
    		$tahun = TunggakanSwasta::select('tahun')->distinct()->orderBy('tahun','ASC')->get();
    		$bulan = TunggakanSwasta::select('bulan')->distinct()->orderBy('bulan','ASC')->get();
    		return view("dkp.nunggakSwasta", compact('tahun','bulan'));	
    	}
    	else
    	{
    		$data = Input::all();
    		$curTahun = $data['tahun'];
    		$curBulan = $data['bulan'];
    		$tahun = TunggakanSwasta::select('tahun')->distinct()->orderBy('tahun','ASC')->get();
    		$bulan = TunggakanSwasta::select('bulan')->distinct()->orderBy('bulan','ASC')->get();
    		$list = TunggakanSwasta::where('tahun',$data['tahun'])->where('bulan',$data['bulan'])->get();
    		return view("dkp.nunggakSwasta", compact('tahun','bulan','list','curTahun','curBulan'));	
    	}
    }

    public function lunasPemerintah(){
    	if (Request::isMethod('get'))
    	{
    		$tahun = LunasPemerintah::select('tahun')->distinct()->orderBy('tahun','ASC')->get();
    		$bulan = LunasPemerintah::select('bulan')->distinct()->orderBy('bulan','ASC')->get();
    		return view("dkp.lunasPemerintah", compact('tahun','bulan'));	
    	}
    	else
    	{
    		$data = Input::all();
    		$curTahun = $data['tahun'];
    		$curBulan = $data['bulan'];
    		$tahun = LunasPemerintah::select('tahun')->distinct()->orderBy('tahun','ASC')->get();
    		$bulan = LunasPemerintah::select('bulan')->distinct()->orderBy('bulan','ASC')->get();
    		$list = LunasPemerintah::where('tahun',$data['tahun'])->where('bulan',$data['bulan'])->get();
    		return view("dkp.lunasPemerintah", compact('tahun','bulan','list','curTahun','curBulan'));	
    	}
    }

    public function lunasSwasta(){
    	if (Request::isMethod('get'))
    	{
    		$tahun = LunasSwasta::select('tahun')->distinct()->orderBy('tahun','ASC')->get();
    		$bulan = LunasSwasta::select('bulan')->distinct()->orderBy('bulan','ASC')->get();
    		return view("dkp.lunasSwasta", compact('tahun','bulan'));	
    	}
    	else
    	{
    		$data = Input::all();
    		$curTahun = $data['tahun'];
    		$curBulan = $data['bulan'];
    		$tahun = LunasSwasta::select('tahun')->distinct()->orderBy('tahun','ASC')->get();
    		$bulan = LunasSwasta::select('bulan')->distinct()->orderBy('bulan','ASC')->get();
    		$list = LunasSwasta::where('tahun',$data['tahun'])->where('bulan',$data['bulan'])->get();
    		return view("dkp.lunasSwasta", compact('tahun','bulan','list','curTahun','curBulan'));	
    	}
    }

}
