@extends ('dkp.master.master')
@section ('content')


<div class="ui raised very padded text container segment" style="margin-top:75px;">
	<form class="ui form" action="" method="post" enctype="multipart/form-data">
	  <div class="field">
	    <label>Input Data Potensi Non-Rumah Tangga</label>
	    <br>
	    <input type="file" name="non_rumah_tangga" />
	  </div>
	  <br>
	  <div class="field">
	    <label>Input Data Potensi Rumah Tangga</label>
	    <br>
	    <input type="file" name="rumah_tangga" />
	  </div>
	  <br>
	  {{csrf_field()}}
	  <button class="ui button" type="submit">Upload</button>
	</form>
</div>

@endsection