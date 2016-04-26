@extends ('dkp.master.master')
@section ('content')


<div class="ui vertical stripe segment" style="margin-top:100px">
	<div class="ui middle aligned stackable grid container">
		<div>
	  	<div style="padding:3%; padding bottom:0px; padding-top:0px">
	      <h1 class="ui dividing header">
	        <i class="users icon"></i>
	        <div class="content">
	          List Pelanggan Lunas (Swasta)
	        </div>
	      </h1>
	    </div>
	    <!-- <div style="padding:3%;padding-top:0px"> -->
	    <form method="post" action="">
	    	<div class="ui stackable grid" style="padding:3%;padding-top:0px">
	    		<div class="five wide column">
			      <label>Tahun</label>
			      <select class="ui fluid dropdown" name="tahun">
			        @foreach ($tahun as $thn)
				        <option value="{{$thn->tahun}}">{{$thn->tahun}}</option>
				    @endforeach
			      </select>
	    		</div>
	    		<div class="five wide column">
			      <label>Bulan</label>
			      <select class="ui fluid dropdown" name="bulan">
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
	    		<div class="two wide column">
	    			<div style="padding-top:20px">
				      <button class="ui icon teal button" type="submit" style="width:135px">
				      <i class="filter icon"></i>
				      Filter Data
				      </button>
				    </div>
	    		</div>	
	    	</div>
	    	{{csrf_field()}}
	    </form>
	    <div style="padding:0%;padding-top:0px">
	      <div class="ui blue segment" style="height:80%">
	      <table class="ui celled table segment table-hover" id="nunggak">
	        <thead>
	          	<tr>
	            	<th width="3%">No.</th>
	            	<th width="10%">ID</th>
	            	<th width="20%">Nama</th>
	            	<th width="32%">Alamat</th>
	            	<th width="10%">Kode Tarif</th>
	            	<th width="10%">Retribusi</th>
	            	<th width="10%">Listrik</th>
	            	<th width="5%">Lebar Jalan</th>
	            	<th width="10%">Tanggal Lunas</th>
	        	</tr>
	        </thead>
	        <tbody>
	        	<?php
	        		if (isset($list)){ $i=0; ?>
	        			@foreach ($list as $l)
	        				<tr>
	        					<td>{{++$i}}</td>
	        					<td>{{$l->pelanggan_id}}</td>
	        					<td>{{$l->nama}}</td>
	        					<td>{{$l->jalan}} 
	        					<?php if (trim($l->gang) != ""){?>Gg {{$l->gang}} <?php } ?> 
	        					<?php if (trim($l->nomor) != ""){?>No {{$l->nomor}} <?php } ?>
	        					<td>{{$l->kd_tarif}}</td>
	        					<td>{{$l->retribusi}}</td>
	        					<td>{{$l->listrik}}</td>
	        					<td>{{$l->lbr_jalan}}</td>
	        					<td>{{$l->tgl_lunas}}</td>
	        				</tr>
	        			@endforeach
	        		<?php }?>
	        </tbody>
	      </table>
	      </div>
	    </div>
	  </div>
	</div>
</div>
<script> 
      $(function () {
        $("#nunggak").DataTable();
            });

       /* $('#timepicker1').timepicker();
        $('#timepicker2').timepicker();*/
    </script>
@endsection