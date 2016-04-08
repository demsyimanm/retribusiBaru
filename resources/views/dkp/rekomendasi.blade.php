@extends ('dkp.master.master')
@section ('content')


<div class="ui vertical stripe segment" style="margin:100px">
	<div class="ui middle aligned stackable grid container">
		<div>
	  	<div style="padding:3%; padding bottom:0px; padding-top:0px">
	      <h1 class="ui dividing header">
	        <i class="users icon"></i>
	        <div class="content">
	          List Rekomendasi Survey
	        </div>
	      </h1>
	    </div>
	    <!-- <div style="padding:3%;padding-top:0px"> -->
	    <div class="ui stackable grid" style="padding:3%;padding-top:0px">
		    <div class="five wide column">
		      <label>Bulan</label>
		      <select class="ui fluid dropdown">
		        <option value="1">Januari</option>
		        <option value="2">Februari</option>
		        <option value="3">Maret</option>
		        <option value="4">April</option>
		        <option value="5">Mei</option>
		        <option value="6">Juni</option>
		        <option value="7">Juli</option>
		        <option value="8">Agustus</option>
		        <option value="9">September</option>
		        <option value="10">Oktober</option>
		        <option value="11">November</option>
		        <option value="12">Desember</option>
		      </select>
    		</div>
    		<div class="five wide column">
		      <label>Tahun</label>
		      <select class="ui fluid dropdown">
		        <option value="2005">2005</option>
		        <option value="2006">2006</option>
		        <option value="2007">2007</option>
		        <option value="2008">2008</option>
		        <option value="2009">2009</option>
		        <option value="2010">2010</option>
		        <option value="2011">2011</option>
		        <option value="2012">2012</option>
		        <option value="2013">2013</option>
		        <option value="2014">2014</option>
		        <option value="2015">2015</option>
		        <option value="2016">2016</option>
		      </select>
    		</div>
    		<div class="centered two wide column">
    			<div style="padding-top:20px">
			      <a class="ui icon teal button" href="#" style="width:135px">
			      <i class="filter icon"></i>
			      Filter Data
			      </a>
			    </div>
    		</div>
    		<div class="centered two wide column">
    			<div style="padding-top:20px">
			      <a class="ui icon teal button" href="#" style="width:135px">
			      <i class="print icon"></i>
			      Cetak
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