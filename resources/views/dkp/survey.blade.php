@extends ('dkp.master.master')
@section ('content')


<div class="ui vertical stripe segment" style="margin:100px">
	<div class="ui middle aligned stackable grid container">
		<div>
	  	<div style="padding:3%; padding bottom:0px; padding-top:0px">
	      <h1 class="ui dividing header">
	        <i class="users icon"></i>
	        <div class="content">
	          Survey Baru
	        </div>
	      </h1>
	    </div>
	    <!-- <div style="padding:3%;padding-top:0px"> -->
	    <div class="ui stackable grid" style="padding:3%;padding-top:0px">
		    <div class="five wide column">
		      <select class="ui fluid dropdown">
		      	<option value="">Wilayah Survey</option>
		        <option value="1">Pusat</option>
		        <option value="2">Utara</option>
		        <option value="3">Timur</option>
		        <option value="4">Selatan</option>
		        <option value="5">Barat</option>
		      </select>
    		</div>
    		<div class="five wide column">
		      <select class="ui fluid dropdown">
		      	<option value="">Kecamatan</option>
		        <option value="2005">Kecamatan A</option>
		        <option value="2005">Kecamatan B</option>
		        <option value="2005">Kecamatan C</option>
		      </select>
    		</div>
    		<div class="five wide column">
		      <select class="ui fluid dropdown">
		      	<option value="">Kelurahan</option>
		        <option value="2005">Kelurahan 1</option>
		        <option value="2005">Kelurahan 2</option>
		        <option value="2005">Kelurahan 3</option>
		      </select>
    		</div>
    		<div class="ten wide column">
    			<div class="ui fluid input">
				  <input type="text" placeholder="Nama Surveyor">
				</div>
			</div>
    		<div class="ten wide column">
    			<div>
			      <a class="ui icon teal button" href="#" style="width:135px">
			      <i class="print icon"></i>
			      Cetak Surat
			      </a>
			    </div>
    		</div>
	    </div>
	    <div style="padding:3%;padding-top:0px">
	      <div class="ui blue segment" style="height:80%">
	      <table class="ui celled table segment table-hover" id="penyediajasa">
	        <thead>
	          <tr>
	            <th width="3%">No.</th>
	            <th width="8%">ID Pelanggan</th>
	            <th width="13%">Nama Pelanggan</th>
	            <th width="13%">Alamat</th>
	            <th width="7%">Kode Tarif</th>
	            <th width="10%">Tarif Retirbusi</th>
	            <th width="7%">Listrik</th>
	            <th width="8%">Lebar Jalan</th>
	            <th width="10%">Keterangan</th>
	        	</tr>
	        </thead>
	        <tbody>
	          
	        </tbody>
	      </table>
	      </div>
	    </div>
	  </div>
	</div>
</div>

@endsection