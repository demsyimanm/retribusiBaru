@extends ('dkp.master.master')
@section ('content')


<?php if(isset($_GET['status']) && $_GET['status'] == 'success'){
        echo '<script language="javascript">';
            echo 'swal("Berhasil!", "Data berhasil ditambahkan!", "success");';
            echo '</script>';
      }
?>
<div class="ui container segment very padded middle aligned" style="margin-top:75px;">
	<h2 class="ui header">
	    <i class="plus icon"></i>
	    <div class="content">
			Insert Data Tunggakan (Swasta)
    	</div>
	</h2>
	<br>

	<div class=" ui stackable grid container ">
		<div class="eight wide column">

			<form id="form" class="ui form" action="" method="post" enctype="multipart/form-data">
			  <div class="field">
			  	<label>Periode Tunggakan</label>
			  	<br>
			  	<div class="ui stackable grid">
			  		<div class="five wide column">
			  			<select class="ui fluid dropdown" name="bulan">
					      	@for ($i=1; $i<=12; $i++)
					      		<?php
					      			$temp;
						      		if ($i == 1) $temp = 'Januari';
						      		else if ($i == 2) $temp = 'Februari';
						      		else if ($i == 3) $temp = 'Maret';
						      		else if ($i == 4) $temp = 'April';
						      		else if ($i == 5) $temp = 'Mei';
						      		else if ($i == 6) $temp = 'Juni';
						      		else if ($i == 7) $temp = 'Juli';
						      		else if ($i == 8) $temp = 'Agustus';
						      		else if ($i == 9) $temp = 'September';
						      		else if ($i == 10) $temp = 'Oktober';
						      		else if ($i == 11) $temp = 'November';
						      		else if ($i == 12) $temp = 'Desember';
					      		?>
						        <option value="{{$i}}">{{$temp}}</option>
						    @endfor
			    		</select>
			  		</div>
			  		<div class="five wide column">
			  			<select class="ui fluid dropdown" name="tahun">
					      	@for ($i=-3; $i<=3; $i++)
					      		@if ($i==0) <option selected value="{{date("Y")+$i}}">{{date("Y")+$i}}</option>
					      		@else <option value="{{date("Y")+$i}}">{{date("Y")+$i}}</option>
					      		@endif
						    @endfor
			    		</select>
			  		</div>
			  	</div>
			  	
			    <br>
			    <label>File Tunggakan Swasta</label>
			    <br>
			    <input id="fileInput" type="file" name="swasta" />
			  </div>
			  <br>
			  {{csrf_field()}}
			  <div class="ui button"  id="btn_submit">Upload</div>
			</form>
		</div>
		<div class="eight wide column" style="margin-top:-7%;">
			<label>History Upload Data Tunggakan Swasta :</label>
			<table class="ui celled table segment table-hover" id="data">
	        <thead>
	          	<tr>
	            	<th width="3%">No.</th>
	            	<th width="5%">Bulan</th>
	            	<th width="25%">Tahun</th>
	            	<th width="40%">Tanggal Upload</th>
	            	<th width="20%">Status</th>
	        	</tr>
	        </thead>
	        <tbody>
	        	<?php
	        		if (isset($data)){ $i=0; ?>
	        			@foreach ($data as $l)
	        				<tr>
	        					<td>{{++$i}}</td>
	        					<?php 
	        						$temp;
		        					if ($l->bulan == 1) $temp = 'Januari';
						      		else if ($l->bulan == 2) $temp = 'Februari';
						      		else if ($l->bulan == 3) $temp = 'Maret';
						      		else if ($l->bulan == 4) $temp = 'April';
						      		else if ($l->bulan == 5) $temp = 'Mei';
						      		else if ($l->bulan == 6) $temp = 'Juni';
						      		else if ($l->bulan == 7) $temp = 'Juli';
						      		else if ($l->bulan == 8) $temp = 'Agustus';
						      		else if ($l->bulan == 9) $temp = 'September';
						      		else if ($l->bulan == 10) $temp = 'Oktober';
						      		else if ($l->bulan == 11) $temp = 'November';
						      		else if ($l->bulan == 12) $temp = 'Desember';
					      		?>
	        					<td>{{$temp}}</td>
	        					<td>{{$l->tahun}}</td>
	        					<td>{{$l->tgl_unggah}}</td>
	        					<td>{{$l->status}}</td>
	        				</tr>
	        			@endforeach
	        		<?php }?>
	        </tbody>
		</div>
	</div>
</div>

<script type="text/javascript">

	function sendData(){
		swal({
			title: "Data Sedang Diproses",   
			text: "Mohon tidak menutup halam ini.",   
			imageUrl: "{{URL::to('assets/image/loading.gif')}}",
			showConfirmButton: false
		});

		$( "#form" ).submit();
	}

	$( "#btn_submit" ).click(function() {
		swal({   
			title: "Apakah Anda Yakin ?",   
			text: "Pastikan data yang diunggah sesuai dengan periodenya",   
			type: "warning",   showCancelButton: true,   
			confirmButtonColor: "#6BDD55",   
			confirmButtonText: "Yes",   
			closeOnConfirm: false }, 
			function(){   
				sendData();
			});
	});

	$(function () {
		$('#data').DataTable();
	});

</script>

@endsection