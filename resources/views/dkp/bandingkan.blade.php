@extends ('dkp.master.master')
@section ('content')


<div class="ui raised very padded text container segment" style="margin-top:75px;">	
  <div class="field">
  	<center>
	    <label>Bandingkan Data Retribusi</label>
	    <br>
	    <br>
	    @if($grader->status==0)
	    <a class="massive ui circular linkedin icon button" href="{{URL::to('grader/start')}}">
		  Start
		</a>
		@elseif($grader->status==1 && $sumof0>0)
	    <a class="massive ui circular linkedin icon button disabled" href="#">
		  Data masih dibandingkan
		</a>
		@elseif($grader->status==1)
	    <a class="massive ui circular google plus icon button" href="{{URL::to('grader/stop')}}">
		  Stop
		</a>
		@endif
	</center>
  </div>
</div>

@endsection