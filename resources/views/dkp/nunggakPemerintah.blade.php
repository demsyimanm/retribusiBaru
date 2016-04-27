@extends ('dkp.master.master')
@section ('content')


<div class="ui vertical stripe segment" style="margin-top:100px">
	<div class="ui middle aligned stackable grid container">
		<div>
	  	<div style="padding:3%; padding bottom:0px; padding-top:0px">
	      <h1 class="ui dividing header">
	        <i class="users icon"></i>
	        <div class="content">
	          List Pelanggan Menunggak (Pemerintah)
	        </div>
	      </h1>
	    </div>
	    <!-- <div style="padding:3%;padding-top:0px"> -->
    	<div class="ui stackable grid" style="padding:3%;padding-top:0px">
    		<div class="four wide column">
		      <label>Tahun</label>
		      <select class="ui fluid dropdown" name="tahun" id="tahun">
		        @foreach ($tahun as $thn)
			        <option value="{{$thn->tahun}}">{{$thn->tahun}}</option>
			    @endforeach
		      </select>
    		</div>
    		<div class="four wide column">
		      <label>Bulan</label>
		      <select class="ui fluid dropdown" name="bulan" id="bulan">
		      	@foreach ($bulan as $bln)
		      		<?php
		      			$temp;
			      		if ($bln->bulan == 1) $temp = 'Januari';
			      		else if ($bln->bulan == 2) $temp = 'Februari';
			      		else if ($bln->bulan == 3) $temp = 'Maret';
			      		else if ($bln->bulan == 4) $temp = 'April';
			      		else if ($bln->bulan == 5) $temp = 'Mei';
			      		else if ($bln->bulan == 6) $temp = 'Juni';
			      		else if ($bln->bulan == 7) $temp = 'Juli';
			      		else if ($bln->bulan == 8) $temp = 'Agustus';
			      		else if ($bln->bulan == 9) $temp = 'September';
			      		else if ($bln->bulan == 10) $temp = 'Oktober';
			      		else if ($bln->bulan == 11) $temp = 'November';
			      		else if ($bln->bulan == 12) $temp = 'Desember';
		      		?>
			        <option value="{{$bln->bulan}}">{{$temp}}</option>
			    @endforeach
		      </select>
    		</div>
    		<div class="three wide column">
    			<label>Halaman</label>
			      <select class="ui fluid dropdown" name="page" id="page">
			       <!--  @foreach ($tahun as $thn) -->
				        <option value="1">1</option>
				        <option value="2">2</option>
				        <option value="3">3</option>
				        <option value="4">4</option>
				        <option value="5">5</option>
				    <!-- @endforeach -->
		      </select>
    		</div>	
    		<div class="two wide column">
    			<div style="padding-top:20px">
			      <button id="filterBtn" class="ui icon teal button" style="width:125px">
			      <i class="filter icon"></i>
			      Filter Data
			      </button>
			    </div>
    		</div>
    		<div class="two wide column">
    			<div style="padding-top:20px">
			      <button id="exportBtn" class="ui icon teal button" style="width:125px">
			      <i class="print icon"></i>
			      	Export Data
			      </button>
			    </div>
    		</div>
    	</div>
	 
	    <div style="padding:3%;padding-top:0px">
	      <div class="ui blue segment" style="height:80%">
	      <table class="ui celled table segment table-hover" id="nunggak">
	        <thead>
	          	<tr>
	            	<th width="3%">No.</th>
	            	<th width="10%">ID</th>
	            	<th width="20%">Nama</th>
	            	<th width="37%">Alamat</th>
	            	<th width="10%">Retribusi</th>
	            	<th width="10%">Listrik</th>
	            	<th width="10%">Lebar Jalan</th>
	        	</tr>
	        </thead>
	        <tbody id="result">
	        	
	        </tbody>
	      </table>
	      </div>
	    </div>
	  </div>
	</div>
</div>
<script> 
   	$(function () {

        $("#result").empty();
		var bulan = $("#bulan").val();
		var tahun = $("#tahun").val();
		var page = $("#page").val();
		var string_url = "{{url('api/nunggak/pemerintah/')}}"
		string_url += "/"+tahun+"/"+bulan+"/"+page;

		$('#nunggak').DataTable( {
		    "paging":   false,
        	"info":     false,
		    ajax: {
		        url: string_url,
		        dataSrc: ''
		    },
		    columns: [ 
		    	{ data: 'no' },
		        { data: 'pelanggan_id' },
		        { data: 'nama' },
		        { data: 'jalan' },
		        { data: 'retribusi' },
		        { data: 'listrik' },
		        { data: 'lbr_jalan' }
		    ]
		} );
    });

	$("#filterBtn").click(function(){
		var table = $('#nunggak').DataTable();
		var bulan = $("#bulan").val();
		var tahun = $("#tahun").val();
		var page = $("#page").val();
		var string_url = "{{url('api/nunggak/pemerintah/')}}"
		string_url += "/"+tahun+"/"+bulan+"/"+page;
		table.ajax.url(string_url).load();
	});

       /* $('#timepicker1').timepicker();
        $('#timepicker2').timepicker();*/
    </script>
@endsection