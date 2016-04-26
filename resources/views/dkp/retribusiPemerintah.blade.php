@extends ('dkp.master.master')
@section ('content')


<div class="ui raised very padded text container segment" style="margin-top:75px;">
	<form id="form" class="ui form" action="" method="post" enctype="multipart/form-data">
	  <div class="field">
	    <label>Input Data Retribusi Pemerintah</label>
	    <br>
	    <input type="file" name="pemerintah" />
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