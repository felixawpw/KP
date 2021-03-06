@extends('layouts.master')

@section('content')
<div class="container-fluid">
  	<div class="row">
	    <div class="col-md-12">
	      <div class="card">
	        <div class="card-header card-header-primary">
	        	<div class="row">
	        		<div class="col-md-10">
			          <h4 class="card-title ">Edit Pelanggar</h4>
			          <p class="card-category">Edit pelanggar</p>
	        		</div>
	      		</div>
	        </div>
	        <div class="card-body row">
	        	<div class="col-md-2"></div>
	        	<div class="col-md-8">
		        	<form method="post" action="{{route('updatepelanggar', [ $p['nrp'],$p['id_panitia'],$p['id_sesi'],$p['id_pelanggaran'] ])}}" class="">
		        		{{csrf_field()}}
                      	<input type="hidden" class="form-control" name="nrp" value="{{$p['nrp']}}">

		        		<div class="row">
	                      <div class="col-md-12">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">NRP Pelanggar</label>
	                          <input type="text" class="form-control" name="nrp" value="{{$p['nrp']}}" disabled>
	                        </div>
	                      </div>
		        		</div>
		        		<div class="row">
	                      <div class="col-md-12">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">Panitia</label>
	                          <select class="form-control" name="panitia">
                          		<option value="{{$p['id_panitia']}}">{{$p['panitia']}}</option>
	                          </select>
	                        </div>
	                      </div>
		        		</div>
		        		<div class="row">
	                      <div class="col-md-12">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">Waktu</label>
	                          <select class="form-control" name="waktu" disable>
	                          	<option value="{{$p['id_sesi']}}">{{$p['sesi']}}</option>
	                          </select>
	                        </div>
	                      </div>
		        		</div>
		        		<div class="row">
	                      <div class="col-md-12">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">Pelanggaran</label>
	                          <select class="form-control" name="pelanggaran">
	                          	@foreach($pelanggarans as $pel)
	                          	<option value="{{$pel->Id}}" @if($pel->Id == $p['id_pelanggaran']) selected @endif>{{$pel->Nama}}</option>
	                          	@endforeach
	                          </select>
	                        </div>
	                      </div>
		        		</div>
	                    <button type="submit" class="btn btn-primary pull-right col-md-4">Submit</button>
	                    <div class="clearfix"></div>
		        	</form>
	        	</div>
		    </div>
		  </div>
		</div>
	</div>
</div>
@endsection


@section('scripts')
<script type="text/javascript">

	$('#maharu').addClass('active');
	$('#pelanggar').addClass('active');
</script>
@endsection