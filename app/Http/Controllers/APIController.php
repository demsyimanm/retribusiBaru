<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\RetribusiPemerintah;
use App\RetribusiSwasta;
use DB;
use App\LunasSwasta;
use App\LunasPemerintah;
use App\TunggakanSwasta;
use App\TunggakanPemerintah;
use App\HistoryUpload;
use Hash;

class APIController extends Controller
{
    public function getTunggakanPemerintah($tahun, $bulan, $page=1){
    	$offset = ($page - 1) * 5000;
    	$list = TunggakanPemerintah::where('tahun',$tahun)->where('bulan',$bulan)->skip($offset)->take(5000)->get();
    	for ($i=0; $i<count($list);$i++){
    		$list[$i]->no = $i+1;
    		if (trim($list[$i]->gang) != "") $list[$i]->jalan .= ", Gg ". trim($list[$i]->gang);
			if (trim($list[$i]->nomor) != "") $list[$i]->jalan .= ", No ". trim($list[$i]->nomor);
    	}
		//dd($list);
		return json_encode($list);
    }

    public function getTunggakanSwasta($tahun, $bulan, $page=1){
    	$offset = ($page - 1) * 5000;
    	$list = TunggakanSwasta::where('tahun',$tahun)->where('bulan',$bulan)->skip($offset)->take(5000)->get();
    	for ($i=0; $i<count($list);$i++){
    		$list[$i]->no = $i+1;
    		if (trim($list[$i]->gang) != "") $list[$i]->jalan .= ", Gg ". trim($list[$i]->gang);
			if (trim($list[$i]->nomor) != "") $list[$i]->jalan .= ", No ". trim($list[$i]->nomor);
    	}
		//dd($list);
		return json_encode($list);
    }

     public function getLunasPemerintah($tahun, $bulan, $page=1){
        $offset = ($page - 1) * 5000;
        $list = LunasPemerintah::where('tahun',$tahun)->where('bulan',$bulan)->skip($offset)->take(5000)->get();
        for ($i=0; $i<count($list);$i++){
            $list[$i]->no = $i+1;
            if (trim($list[$i]->gang) != "") $list[$i]->jalan .= ", Gg ". trim($list[$i]->gang);
            if (trim($list[$i]->nomor) != "") $list[$i]->jalan .= ", No ". trim($list[$i]->nomor);
        }
        //dd($list);
        return json_encode($list);
    }

    public function getLunasSwasta($tahun, $bulan, $page=1){
        $offset = ($page - 1) * 5000;
        $list = LunasSwasta::where('tahun',$tahun)->where('bulan',$bulan)->skip($offset)->take(5000)->get();
        for ($i=0; $i<count($list);$i++){
            $list[$i]->no = $i+1;
            if (trim($list[$i]->gang) != "") $list[$i]->jalan .= ", Gg ". trim($list[$i]->gang);
            if (trim($list[$i]->nomor) != "") $list[$i]->jalan .= ", No ". trim($list[$i]->nomor);
        }
        //dd($list);
        return json_encode($list);
    }

    public function getBulan($jenis, $tipe, $tahun){
    	$data = [];
    	if ($jenis == "tunggakan"){
    		if ($tipe == "pemerintah"){
	    		$data = TunggakanPemerintah::select('bulan')->distinct()->orderBy('bulan','ASC')->where('tahun',$tahun)->get();
	    	}
	    	else if ($tipe == "swasta"){
	    		$data = TunggakanSwasta::select('bulan')->distinct()->orderBy('bulan','ASC')->where('tahun',$tahun)->get();
	    	}
    	}
    	else{
    		if ($tipe == "pemerintah"){
    			$data = LunasPemerintah::select('bulan')->distinct()->orderBy('bulan','ASC')->where('tahun',$tahun)->get();
			}
			else if ($tipe == "swasta"){
				$data = LunasSwasta::select('bulan')->distinct()->orderBy('bulan','ASC')->where('tahun',$tahun)->get();
			}
    	}
    	
		return json_encode($data);
    }

    public function getPage($jenis, $tipe, $tahun, $bulan){
    	$data = [];
    	if ($jenis == "tunggakan"){
    		if ($tipe == "pemerintah"){
	    		$data = TunggakanPemerintah::where('bulan',$bulan)->where('tahun',$tahun)->count();
	    	}
	    	else if ($tipe == "swasta"){
	    		$data = TunggakanSwasta::where('bulan',$bulan)->where('tahun',$tahun)->count();;
	    	}
    	}
    	else{
    		if ($tipe == "pemerintah"){
	    		$data = LunasPemerintah::where('bulan',$bulan)->where('tahun',$tahun)->count();
	    	}
	    	else if ($tipe == "swasta"){
	    		$data = LunasSwasta::where('bulan',$bulan)->where('tahun',$tahun)->count();;
	    	}
    	}
    	
		return json_encode(ceil($data/5000));
    }
}