@extends ('dkp.master.master')
@section ('content')


<div class="ui raised very padded text container segment" style="margin-top:75px;">	
  <div class="field">
  	<center>
	    <label>Bandingkan Data Retribusi Pemerintah</label>
	    <br>
	    <br>
	    @if($grader->statusPemerintah==0)
	    <a class="massive ui circular linkedin icon button" href="{{URL::to('grader/start/pemerintah')}}">
		  Start
		</a>
		@elseif($grader->statusPemerintah==1 && $sumof0Pemerintah>0)
	    <a class="massive ui circular linkedin icon button disabled" href="#">
		  Data masih dibandingkan
		</a>
		@elseif($grader->statusPemerintah==1)
	    <a class="massive ui circular google plus icon button" href="{{URL::to('grader/stop/pemerintah')}}">
		  Stop
		</a>
		@endif
	</center>
  </div>
 </div>
 <div class="ui raised very padded text container segment" style="margin-top:75px;">	
  <div class="field">
  	<center>
	    <label>Bandingkan Data Retribusi Swasta</label>
	    <br>
	    <br>
	    @if($grader->statusSwasta==0)
	    <a class="massive ui circular linkedin icon button" href="{{URL::to('grader/start/swasta')}}">
		  Start
		</a>
		@elseif($grader->statusSwasta==1 && $sumof0Swasta>0)
	    <a class="massive ui circular linkedin icon button disabled" href="#">
		  Data masih dibandingkan
		</a>
		@elseif($grader->statusSwasta==1)
	    <a class="massive ui circular google plus icon button" href="{{URL::to('grader/stop/swasta')}}">
		  Stop
		</a>
		@endif
	</center>
  </div>
</div>

@endsection