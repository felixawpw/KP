@extends('layouts.master')

@section('content')
<div class="container-fluid">
  	<div class="row">
	    <div class="col-md-12">
	      <div class="card">
	        <div class="card-header card-header-primary">
	        	<div class="row">
	        		<div class="col-md-10">
			          <h4 class="card-title ">Tambah Sesi</h4>
			          <p class="card-category">Tambah Jadwal Hari H MOB FT 2018</p>
	        		</div>
	      		</div>
	        </div>
	        <div class="card-body row">
	        	<div class="col-md-2"></div>
	        	<div class="col-md-8">
		        	<form method="post" action="{{route('jadwal.update', $sesi->Id)}}" class="">
		        		@method('PUT')
		        		{{csrf_field()}}
		        		<div class="row">
	                      <div class="col-md-12">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">Nama Sesi</label>
  	                          <input type="text" class="form-control" name="nama" value="{{$sesi->Nama}}">
	                        </div>
	                      </div>
		        		</div>
		        		<div class="row">
	                      <div class="col-md-12">
	                        <div class="form-group">
	                          <label>Mulai</label>
  	                          <input type="datetime-local" class="form-control" name="mulai" 
  	                          value="{{str_replace(' ', 'T', explode('.', $sesi->Mulai)[0])}}">
	                        </div>
	                      </div>
		        		</div>
		        		<div class="row">
	                      <div class="col-md-12">
	                        <div class="form-group">
	                          <label>Akhir</label>
  	                          <input type="datetime-local" class="form-control" name="akhir" 
  	                          value="{{str_replace(' ', 'T', explode('.', $sesi->Akhir)[0])}}">
	                        </div>
	                      </div>
		        		</div>
		        		<div class="row">
	                      <div class="col-md-12">
	                        <div class="form-group">
	                          <label class="bmd-label">Kelompok</label>
  	                          <input type="text" class="form-control" name="kelompok" value="{{$sesi->Kelompok}}">
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
	$('#jadwal').addClass('active');
</script>
@endsection