@extends('layouts.master')

@section('content')
<div class="container-fluid">
  	<div class="row">
	    <div class="col-md-12">
	      <div class="card">
	        <div class="card-header card-header-primary">
	        	<div class="row">
	        		<div class="col-md-10">
			          <h4 class="card-title ">Tambah Pelanggar</h4>
			          <p class="card-category">Tambah pelanggar</p>
	        		</div>
	      		</div>
	        </div>
	        <div class="card-body row">
	        	<div class="col-md-2"></div>
	        	<div class="col-md-8">
		        	<form method="post" action="{{route('pelanggar.store')}}" class="">
		        		{{csrf_field()}}
		        		<div class="row">
	                      <div class="col-md-12">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">NRP Pelanggar</label>
	                          <input type="text" class="form-control" name="nrp">
	                        </div>
	                      </div>
		        		</div>
		        		<div class="row">
	                      <div class="col-md-12">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">Pelanggaran</label>
	                          <select class="form-control" name="pelanggaran">
	                          	@foreach($pelanggarans as $p)
	                          		<option value="{{$p->Id}}">{{$p->Nama}}</option>
	                          	@endforeach
	                          </select>
	                        </div>
	                      </div>
		        		</div>
		        		<div class="row">
	                      <div class="col-md-12">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">Panitia</label>
	                          <select class="form-control" name="panitia">
	                          	@foreach($panitias as $p)
	                          		<option value="{{$p->NRP}}">{{$p->Nama}}</option>
	                          	@endforeach
	                          </select>
	                        </div>
	                      </div>
		        		</div>
		        		<div class="row">
	                      <div class="col-md-12">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">Sesi</label>
	                          <select class="form-control" name="sesi">
	                          	@foreach($sesis as $p)
	                          		<option value="{{$p->Id}}">{{$p->Nama}}</option>
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