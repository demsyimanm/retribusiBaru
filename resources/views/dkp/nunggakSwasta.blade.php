@extends ('dkp.master.master')
@section ('content')


<div class="ui vertical stripe segment" style="margin-top:100px">
	<div class="ui middle aligned stackable grid container">
		<div>
	  	<div style="padding:3%; padding bottom:0px; padding-top:0px">
	      <h1 class="ui dividing header">
	        <i class="users icon"></i>
	        <div class="content">
	          List Pelanggan Menunggak (Swasta)
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
		      	<!-- @foreach ($bulan as $bln)
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
			    @endforeach -->
		      </select>
    		</div>
    		<div class="three wide column">
    			<label>Halaman</label>
			      <select class="ui fluid dropdown" name="page" id="page">
			       <!--  @foreach ($tahun as $thn) -->
				       <!--  <option value="1">1</option>
				        <option value="2">2</option>
				        <option value="3">3</option>
				        <option value="4">4</option>
				        <option value="5">5</option> -->
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
	            	<th width="5%">ID</th>
	            	<th width="25%">Nama</th>
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
   		getBulan();
   		
        $("#result").empty();
		var bulan = $("#bulan").val();
		var tahun = $("#tahun").val();
		var page = $("#page").val();
		var string_url = "{{url('api/nunggak/swasta/')}}"
		string_url += "/"+tahun+"/"+bulan+"/"+page;

		$('#nunggak').DataTable( {
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
		var string_url = "{{url('api/nunggak/swasta/')}}"
		string_url += "/"+tahun+"/"+bulan+"/"+page;
		table.ajax.url(string_url).load();
	});

	$("#tahun").change(function(){
		getBulan();
	});

	$("#bulan").change(function(){
		getPage();
	});

	function getBulan(){
		$("#bulan").empty();
		var tahun = $("#tahun").val();
		var string_url = "{{url('/api/getBulan/tunggakan/swasta')}}"
		string_url += "/"+tahun;
		$.ajax({
			url: string_url,
		  context: document.body
		}).done(function(res) {
			res = JSON.parse(res);
			string_res = "";
			for(var i = 0; i < res.length; i++){
				var temp = "";
				if (res[i]["bulan"] == 1) temp = 'Januari';
	      		else if (res[i]["bulan"] == 2) temp = 'Februari';
	      		else if (res[i]["bulan"] == 3) temp = 'Maret';
	      		else if (res[i]["bulan"] == 4) temp = 'April';
	      		else if (res[i]["bulan"] == 5) temp = 'Mei';
	      		else if (res[i]["bulan"] == 6) temp = 'Juni';
	      		else if (res[i]["bulan"] == 7) temp = 'Juli';
	      		else if (res[i]["bulan"] == 8) temp = 'Agustus';
	      		else if (res[i]["bulan"] == 9) temp = 'September';
	      		else if (res[i]["bulan"] == 10) temp = 'Oktober';
	      		else if (res[i]["bulan"] == 11) temp = 'November';
	      		else if (res[i]["bulan"] == 12) temp = 'Desember';

				string_res += "<option value="+res[i]["bulan"]+">"+temp+"</option>";
			}
			$("#bulan").append(string_res);
			getPage();
		});
	}

	function getPage(){
		$("#page").empty();
		var tahun = $("#tahun").val();
		var bulan = $("#bulan").val();
		var string_url = "{{url('/api/getPage/tunggakan/swasta')}}"
		string_url += "/"+tahun+"/"+bulan;
		$.ajax({
			url: string_url,
		  context: document.body
		}).done(function(res) {
			string_res = "";
			for(var i = 1; i <= res; i++){
				string_res += "<option value="+i+">"+i+"</option>";
			}
			$("#page").append(string_res);
		});
	}

	$("#exportBtn").click(function(){
		var bulan = $("#bulan").val();
		var tahun = $("#tahun").val();
		var page = $("#page").val();
		var string_url = "{{url('export/tunggakan/swasta/')}}"
		string_url += "/"+bulan+"/"+tahun+"/"+page;
		window.location.href = string_url;
	});

       /* $('#timepicker1').timepicker();
        $('#timepicker2').timepicker();*/
    </script>
@endsection