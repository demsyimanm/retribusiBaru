<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ReportBedaController extends Controller
{
    function index(){
    	return view('dkp.rekomendasi');
    }
}
