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
    	
    }

    public function pasangBaru(){
    	return view('dkp.pasangbaru');	
    }

}
