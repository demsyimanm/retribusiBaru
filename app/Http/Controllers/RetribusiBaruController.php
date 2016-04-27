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
use App\HistoryUpload;
use Hash;

class RetribusiBaruController extends Controller
{
    public function index(){

    }

    public function insertPasangBaru(){
    	ini_set("upload_max_filesize","300M");
    	ini_set("post_max_size","300M");
    	set_time_limit(108000);
		
    	$input = Input::all();

		if ($_FILES["pasang_baru"]["error"] > 0){
		  echo "Error: " . $_FILES["pasang_baru"]["error"] . "<br />";
		}
		if ($_FILES["pasang_baru"]["error"] > 0){
		  echo "Error: " . $_FILES["pasang_baru"]["error"] . "<br />";
		}
		else{

			$file_pasang_baru = array_get($input,'pasang_baru');
            $fileName_pasang_baru = $file_pasang_baru->getClientOriginalName();
            $upload_success = $file_pasang_baru->move("upload", $fileName_pasang_baru);

            $file = fopen(public_path("upload\\".$fileName_pasang_baru), "r");
            $k = 0;
			$header = array();
			echo "<table border=\"1\" style=\"text-align: center;\">";
			while(! feof($file)){
				//var_dump($k);
				$tmp = fgetcsv($file,0,"~");
				//var_dump($tmp);
				if($tmp != null){
					echo "<tr>";
					if ($k==0){
						for($j=0;$j<sizeof($tmp);$j++){
							/*if($j==0)
								array_push($header, "PELANGGAN_ID");
							else*/
								array_push($header, $tmp[$j]);
								echo "<td>".$tmp[$j]."</td>";
						}
						array_push($header, "KATEGORI");
						echo "<td>KATEGORI</td>";
						//var_dump($header);
					}
					else{
						$data = $tmp;
						array_push($data, '-');
						//var_dump($data);
						//die();

						for($j=0;$j<sizeof($tmp);$j++){
							/*if($j==0)
								array_push($header, "PELANGGAN_ID");
							else*/
								echo "<td>".$tmp[$j]."</td>";
						}
						echo "<td>-</td>";

						/*$header_string ="";
						for($i=0;$i<sizeof($header);$i++){
							$header[$i] = str_replace('"','\"',$header[$i]);
							$header[$i] = str_replace("'","\'",$header[$i]);
							if ($i!=0){
								$header_string.=", ";
							}
							$header_string.= ($header[$i]);
						}*/

						/*$data_string ="";
						for($i=0;$i<sizeof($data);$i++){
							$data[$i] = str_replace('"','\"',$data[$i]);
							$data[$i] = str_replace("'","\'",$data[$i]);
							$data[$i] = trim($data[$i]);
							if ($i!=0){
								$data_string.=", ";
							}
							$data_string.= '"'.($data[$i]).'"';
						}*/

						/*$SQL = "INSERT INTO tunggakanpemerintah (".$header_string.") VALUES (".$data_string.")";
						DB::unprepared($SQL);*/
						// print_r($SQL);
						// echo "<br>";
					}
					echo "</tr>";
				}
				$k++;
			}
			echo "</table>";

			/*HistoryUpload::insertGetId(array(
				'keterangan' =>  "tunggakan",
				'tipe' =>  "pemerintah",
				'bulan' =>  $_POST["bulan"],
				'tahun' =>  $_POST["tahun"],
				'status' => "berhasil"
			));

			$SQL = "DELETE t1 FROM tunggakanpemerintah t1, tunggakanpemerintah t2 WHERE t1.bulan = ".$_POST['bulan']." AND t1.tahun = ".$_POST['tahun']." AND t1.pelanggan_id = t2.pelanggan_id AND t1.bulan = t2.bulan AND t1.tahun = t2.tahun AND t1.id > t2.id";
			DB::unprepared($SQL);
			return redirect('retribusi/tunggakanPemerintah?status=success');*/
		}
    }

    public function pasangBaru(){
    	return view('dkp.pasangbaru');	
    }

}
