@extends('layouts.master')

@section('content')
<div class="container-fluid">
  	<div class="row">
	    <div class="col-md-12">
	      <div class="card">
	        <div class="card-header card-header-primary">
	        	<div class="row">
	        		<div class="col-md-10">
			          <h4 class="card-title ">Edit Absensi</h4>
			          <p class="card-category">Edit absensi mahasiswa : Felix Aditya Wijaya (160415052) pada tanggal (x)</p>
	        		</div>
	      		</div>
	        </div>
	        <div class="card-body row">
	        	<div class="col-md-2"></div>
	        	<div class="col-md-8">
		        	<form method="post" action="{{route('presensi.update', 1)}}" class="">
		        		@method('PUT')
		        		{{csrf_field()}}
		        		<div class="row">
	                      <div class="col-md-12">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">Sesi 1</label>
	                          <select class="form-control" name="sesi_1">
	                          	<option value="1">Hadir</option>
	                          	<option value="-1">Tidak Hadir</option>
	                          </select>
	                        </div>
	                      </div>
		        		</div>
		        		<div class="row">
	                      <div class="col-md-12">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">Sesi 2</label>
	                          <select class="form-control" name="sesi_2">
	                          	<option value="1">Hadir</option>
	                          	<option value="-1">Tidak Hadir</option>
	                          </select>
	                        </div>
	                      </div>
		        		</div>
		        		<div class="row">
	                      <div class="col-md-12">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">Sesi 3</label>
	                          <select class="form-control" name="sesi_3">
	                          	<option value="1">Hadir</option>
	                          	<option value="-1">Tidak Hadir</option>
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

	$('#absensi').addClass('active');
</script>
@endsection