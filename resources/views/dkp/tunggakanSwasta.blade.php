@extends ('dkp.master.master')
@section ('content')


<?php if(isset($_GET['status']) && $_GET['status'] == 'success'){
        echo '<script language="javascript">';
            echo 'swal("Berhasil!", "Data berhasil ditambahkan!", "success");';
            echo '</script>';
      }
?>
<div class="ui container segment very padded middle aligned" style="margin-top:75px;">
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
	    <label>Input Data Tunggakan Swasta</label>
	    <br>
	    <input id="fileInput" type="file" name="swasta" />
	  </div>
	  <br>
	  {{csrf_field()}}
	  <div class="ui button"  id="btn_submit">Upload</div>
	</form>
</div>

<script type="text/javascript">
	$( "#btn_submit" ).click(function() {
		swal({
			title: "Data Sedang Diproses",   
			text: "Mohon tidak menutup halam ini.",   
			imageUrl: "{{URL::to('assets/image/loading.gif')}}",
			showConfirmButton: false
		});

		$( "#form" ).submit();
	});

</script>

@endsection