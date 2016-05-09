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
use Excel;

class DataRetribusiController extends Controller
{
    public function index(){

    }

    public function tunggakanPemerintah(){
    	$data = HistoryUpload::where('tipe','pemerintah')->where('keterangan','tunggakan')->get();
    	return view('dkp.tunggakanPemerintah', compact('data'));
    } 

    public function insertTunggakanPemerintah(){
    	ini_set("upload_max_filesize","300M");
    	ini_set("post_max_size","300M");
    	set_time_limit(108000);
		
    	$input = Input::all();

		if ($_FILES["pemerintah"]["error"] > 0){
		  echo "Error: " . $_FILES["pemerintah"]["error"] . "<br />";
		}
		if ($_FILES["pemerintah"]["error"] > 0){
		  echo "Error: " . $_FILES["pemerintah"]["error"] . "<br />";
		}
		else{

			$file_pemerintah = array_get($input,'pemerintah');
            $fileName_pemerintah = $file_pemerintah->getClientOriginalName();
            $upload_success = $file_pemerintah->move("upload", $fileName_pemerintah);

            $file = fopen(public_path("upload\\".$fileName_pemerintah), "r");
            $k = 0;
			$header = array();
			while(! feof($file)){
				$tmp = fgetcsv($file,0,"~");
				if($tmp != null){
					if ($k==0){
						for($j=0;$j<sizeof($tmp);$j++){
							if($j==0)
								array_push($header, "PELANGGAN_ID");
							else
								array_push($header, $tmp[$j]);
						}
						array_push($header, "BULAN");
						array_push($header, "TAHUN");
					}
					else{
						$data = $tmp;
						array_push($data, $_POST['bulan']);
						array_push($data, $_POST['tahun']);

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
							$data[$i] = trim($data[$i]);
							if ($i!=0){
								$data_string.=", ";
							}
							$data_string.= '"'.($data[$i]).'"';
						}

						$SQL = "INSERT INTO tunggakanpemerintah (".$header_string.") VALUES (".$data_string.")";
						DB::unprepared($SQL);
						// print_r($SQL);
						// echo "<br>";
					}
				}
				$k++;
			}

			HistoryUpload::insertGetId(array(
				'keterangan' =>  "tunggakan",
				'tipe' =>  "pemerintah",
				'bulan' =>  $_POST["bulan"],
				'tahun' =>  $_POST["tahun"],
				'status' => "berhasil"
			));

			$SQL = "DELETE t1 FROM tunggakanpemerintah t1, tunggakanpemerintah t2 WHERE t1.bulan = ".$_POST['bulan']." AND t1.tahun = ".$_POST['tahun']." AND t1.pelanggan_id = t2.pelanggan_id AND t1.bulan = t2.bulan AND t1.tahun = t2.tahun AND t1.id > t2.id";
			DB::unprepared($SQL);
			return redirect('retribusi/tunggakanPemerintah?status=success');
		}
    }

    public function tunggakanSwasta(){
    	$data = HistoryUpload::where('tipe','swasta')->where('keterangan','tunggakan')->get();
    	return view('dkp.tunggakanSwasta', compact('data'));
    }

    public function insertTunggakanSwasta(){
    	ini_set("upload_max_filesize","300M");
    	ini_set("post_max_size","300M");
    	set_time_limit(108000);
		
    	$input = Input::all();

		if ($_FILES["swasta"]["error"] > 0){
		  echo "Error: " . $_FILES["swasta"]["error"] . "<br />";
		}
		if ($_FILES["swasta"]["error"] > 0){
		  echo "Error: " . $_FILES["swasta"]["error"] . "<br />";
		}
		else{

			$file_swasta = array_get($input,'swasta');
            $fileName_swasta = $file_swasta->getClientOriginalName();
            $upload_success = $file_swasta->move("upload", $fileName_swasta);

            $file = fopen(public_path("upload\\".$fileName_swasta), "r");
            $k = 0;
			$header = array();
			while(! feof($file)){
				$tmp = fgetcsv($file,0,"~");
				if($tmp != null){
					if ($k==0){
						for($j=0;$j<sizeof($tmp);$j++){
							if($j==0)
								array_push($header, "PELANGGAN_ID");
							else
								array_push($header, $tmp[$j]);
						}
						array_push($header, "BULAN");
						array_push($header, "TAHUN");
					}
					else{
						$data = $tmp;
						array_push($data, $_POST['bulan']);
						array_push($data, $_POST['tahun']);

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
							$data[$i] = trim($data[$i]);
							if ($i!=0){
								$data_string.=", ";
							}
							$data_string.= '"'.($data[$i]).'"';
						}

						$SQL = "INSERT INTO tunggakanswasta (".$header_string.") VALUES (".$data_string.")";
						DB::unprepared($SQL);
						// print_r($SQL);
						// echo "<br>";
					}
				}
				$k++;
			}

			HistoryUpload::insertGetId(array(
				'keterangan' =>  "tunggakan",
				'tipe' =>  "swasta",
				'bulan' =>  $_POST["bulan"],
				'tahun' =>  $_POST["tahun"],
				'status' => "berhasil"
			));

			$SQL = "DELETE t1 FROM tunggakanswasta t1, tunggakanswasta t2 WHERE t1.bulan = ".$_POST['bulan']." AND t1.tahun = ".$_POST['tahun']." AND t1.pelanggan_id = t2.pelanggan_id AND t1.bulan = t2.bulan AND t1.tahun = t2.tahun AND t1.id > t2.id";
			DB::unprepared($SQL);
			return redirect('retribusi/tunggakanSwasta?status=success');
		}
    }

    public function retribusiPemerintah(){
    	$data = HistoryUpload::where('tipe','pemerintah')->where('keterangan','retribusi')->get();
    	return view('dkp.retribusiPemerintah', compact('data'));
    }

    public function insertRetribusiPemerintah(){
    	ini_set("upload_max_filesize","300M");
    	ini_set("post_max_size","300M");
    	set_time_limit(108000);
		
    	$SQL = "TRUNCATE retribusipemerintah";
		DB::unprepared($SQL);

    	$input = Input::all();

		if ($_FILES["pemerintah"]["error"] > 0){
		  echo "Error: " . $_FILES["pemerintah"]["error"] . "<br />";
		}
		if ($_FILES["pemerintah"]["error"] > 0){
		  echo "Error: " . $_FILES["pemerintah"]["error"] . "<br />";
		}
		else{

			$file_pemerintah = array_get($input,'pemerintah');
            $fileName_pemerintah = $file_pemerintah->getClientOriginalName();
            $upload_success = $file_pemerintah->move("upload", $fileName_pemerintah);

            $file = fopen(public_path("upload\\".$fileName_pemerintah), "r");
            $k = 0;
			$header = array();
			while(! feof($file)){
				$tmp = fgetcsv($file,0,"~");
				if($tmp != null){
					if ($k==0){
						for($j=0;$j<sizeof($tmp);$j++){
							if($j==0)
								array_push($header, "PELANGGAN_ID");
							else
								array_push($header, $tmp[$j]);
						}
						array_push($header, "BULAN");
						array_push($header, "TAHUN");
					}
					else{
						$data = $tmp;
						array_push($data, $_POST['bulan']);
						array_push($data, $_POST['tahun']);

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
							$data[$i] = trim($data[$i]);
							if ($i!=0){
								$data_string.=", ";
							}
							if ($i==9)
								$data_string.="STR_TO_DATE('".$data[$i]."', '%d/%m/%Y')";
							else 
								$data_string.= '"'.($data[$i]).'"';
						}

						$SQL = "INSERT INTO retribusipemerintah (".$header_string.") VALUES (".$data_string.")";
						DB::unprepared($SQL);
						// print_r($SQL);
						// echo "<br>";
					}
				}
				$k++;
			}

			HistoryUpload::insertGetId(array(
				'keterangan' =>  "retribusi",
				'tipe' =>  "pemerintah",
				'bulan' =>  $_POST["bulan"],
				'tahun' =>  $_POST["tahun"],
				'status' => "berhasil"
			));

			return redirect('retribusi/retribusiPemerintah?status=success');
		}
    }

    public function retribusiSwasta(){
    	$data = HistoryUpload::where('tipe','swasta')->where('keterangan','retribusi')->get();
    	return view('dkp.retribusiSwasta', compact('data'));
    }

    public function insertRetribusiSwasta(){
    	ini_set("upload_max_filesize","300M");
    	ini_set("post_max_size","300M");
    	set_time_limit(108000);
		
    	$SQL = "TRUNCATE retribusiswasta";
		DB::unprepared($SQL);

    	$input = Input::all();

		if ($_FILES["swasta"]["error"] > 0){
		  echo "Error: " . $_FILES["swasta"]["error"] . "<br />";
		}
		if ($_FILES["swasta"]["error"] > 0){
		  echo "Error: " . $_FILES["swasta"]["error"] . "<br />";
		}
		else{

			$file_swasta = array_get($input,'swasta');
            $fileName_swasta = $file_swasta->getClientOriginalName();
            $upload_success = $file_swasta->move("upload", $fileName_swasta);

            $file = fopen(public_path("upload\\".$fileName_swasta), "r");
            $k = 0;
			$header = array();
			while(! feof($file)){
				$tmp = fgetcsv($file,0,"~");
				if($tmp != null){
					if ($k==0){
						for($j=0;$j<sizeof($tmp);$j++){
							if($j==0)
								array_push($header, "PELANGGAN_ID");
							else
								array_push($header, $tmp[$j]);
						}
						array_push($header, "BULAN");
						array_push($header, "TAHUN");
					}
					else{
						$data = $tmp;
						array_push($data, $_POST['bulan']);
						array_push($data, $_POST['tahun']);

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
							$data[$i] = trim($data[$i]);
							if ($i!=0){
								$data_string.=", ";
							}
							if ($i==9)
								$data_string.="STR_TO_DATE('".$data[$i]."', '%d/%m/%Y')";
							else 
								$data_string.= '"'.($data[$i]).'"';
						}

						$SQL = "INSERT INTO retribusiswasta (".$header_string.") VALUES (".$data_string.")";
						DB::unprepared($SQL);
						// print_r($SQL);
						// echo "<br>";
					}
				}
				$k++;
			}

			HistoryUpload::insertGetId(array(
				'keterangan' =>  "retribusi",
				'tipe' =>  "swasta",
				'bulan' =>  $_POST["bulan"],
				'tahun' =>  $_POST["tahun"],
				'status' => "berhasil"
			));

			return redirect('retribusi/retribusiSwasta?status=success');
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
		$tahun = TunggakanPemerintah::select('tahun')->distinct()->orderBy('tahun','ASC')->get();
		$bulan = TunggakanPemerintah::select('bulan')->distinct()->orderBy('bulan','ASC')->get();
		return view("dkp.nunggakPemerintah", compact('tahun','bulan'));	
    }

    public function nunggakSwasta(){
		$tahun = TunggakanSwasta::select('tahun')->distinct()->orderBy('tahun','ASC')->get();
		$bulan = TunggakanSwasta::select('bulan')->distinct()->orderBy('bulan','ASC')->get();
		return view("dkp.nunggakSwasta", compact('tahun','bulan'));	
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

    public function exportData($jenis, $tipe, $bulan, $tahun, $page){
    	set_time_limit(108000);
    	ini_set("post_max_size","300M");
    	$temp;
  		if ($bulan == 1) $temp = 'Januari';
  		else if ($bulan == 2) $temp = 'Februari';
  		else if ($bulan == 3) $temp = 'Maret';
  		else if ($bulan == 4) $temp = 'April';
  		else if ($bulan == 5) $temp = 'Mei';
  		else if ($bulan == 6) $temp = 'Juni';
  		else if ($bulan == 7) $temp = 'Juli';
  		else if ($bulan == 8) $temp = 'Agustus';
  		else if ($bulan == 9) $temp = 'September';
  		else if ($bulan == 10) $temp = 'Oktober';
  		else if ($bulan == 11) $temp = 'November';
  		else if ($bulan == 12) $temp = 'Desember';

  		$list;
  		if ($jenis == "tunggakan"){
  			if ($tipe == "pemerintah"){
  				$offset = ($page - 1) * 5000;
    			$list = TunggakanPemerintah::where('tahun',$tahun)->where('bulan',$bulan)->skip($offset)->take(5000)->get();
  			}
  			else{
  				$offset = ($page - 1) * 5000;
    			$list = TunggakanSwasta::where('tahun',$tahun)->where('bulan',$bulan)->skip($offset)->take(5000)->get();
  			}
  		}
  		else{
  			if ($tipe == "pemerintah"){
  				$offset = ($page - 1) * 5000;
    			$list = LunasPemerintah::where('tahun',$tahun)->where('bulan',$bulan)->skip($offset)->take(5000)->get();
  			}
  			else{
  				$offset = ($page - 1) * 5000;
    			$list = LunasPemerintah::where('tahun',$tahun)->where('bulan',$bulan)->skip($offset)->take(5000)->get();
  			}
  		}

  		// dd($list);

  		$result = array();
  		$header = array();
  		array_push($header, "ID PELANGGAN");
		array_push($header, "NAMA");
		array_push($header, "JALAN");
		array_push($header, "GANG");
		array_push($header, "NOMOR");
		array_push($header, "NOTAMB");
		array_push($header, "DA");
		array_push($header, "KODE TARIF");
		array_push($header, "RETRIBUSI");
		array_push($header, "LISTRIK");
		array_push($header, "LEBAR JALAN");
		array_push($header, "PERIODE TAGIH");
		array_push($header, "KET STATUS");
		if ($jenis=="lunas")
			array_push($header, "TGL LUNAS (YYYY-MM-DD)");
		array_push($result, $header);

  		for ($i=0; $i<count($list);$i++){
			$data = array();
			array_push($data, $list[$i]->pelanggan_id);
			array_push($data, $list[$i]->nama);
			array_push($data, $list[$i]->jalan);
			array_push($data, $list[$i]->gang);
			array_push($data, $list[$i]->nomor);
			array_push($data, $list[$i]->notamb);
			array_push($data, $list[$i]->da);
			array_push($data, $list[$i]->kd_tarif);
			array_push($data, $list[$i]->retribusi);
			array_push($data, $list[$i]->listrik);
			array_push($data, $list[$i]->lbr_jalan);
			array_push($data, $list[$i]->periode_tagih);
			array_push($data, $list[$i]->ket_status);
			if ($jenis=="lunas")
				array_push($data, $list[$i]->tgl_lunas);
			array_push($result, $data);
		}

  		// dd($result);

    	Excel::create('Data rekap '.$jenis.' '.$tipe.' '.$temp.' '.$tahun.' page '. $page, function($excel) use($result) {

		    $excel->sheet('Sheet 1', function($sheet) use($result) {

		        $sheet->fromArray($result, null,'A1', false, false);

		    });

		})->download('xls');
    }

}
