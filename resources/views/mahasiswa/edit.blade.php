@extends('layouts.master')

@section('content')
<div class="container-fluid">
  	<div class="row">
	    <div class="col-md-12">
	      <div class="card">
	        <div class="card-header card-header-primary">
	        	<div class="row">
	        		<div class="col-md-10">
			          <h4 class="card-title ">Edit Mahasiswa Baru</h4>
			          <p class="card-category">Mahasiswa Baru Universitas Surabaya Fakultas Teknik 2018</p>
	        		</div>
	      		</div>
	        </div>
	        <div class="card-body row">
	        	<div class="col-md-2"></div>
	        	<div class="col-md-8">
		        	<form method="post" action="{{route('mahasiswa.update', 1)}}" class="">
		        		@method('PUT')
		        		{{csrf_field()}}
		        		<div class="row">
	                      <div class="col-md-12">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">Nama Lengkap</label>
	                          <input type="text" class="form-control" name="nama_lengkap" value="Nama Lengkap">
	                        </div>
	                      </div>
		        		</div>
		        		<div class="row">
	                      <div class="col-md-12">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">NRP</label>
	                          <input type="text" class="form-control" name="nrp" value="NRP">
	                        </div>
	                      </div>
		        		</div>
		        		<div class="row">
	                      <div class="col-md-12">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">Jurusan</label>
	                          <select class="form-control" name="jurusan" id="comboJurusan">
	                          	<option>Teknik Informatika</option>
	                          </select>
	                        </div>
	                      </div>
		        		</div>
	        			<div class="row">
	                      <div class="col-md-6">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">Kelompok Alfa</label>
	                          <input type="number" name="kelompok_alfa" class="form-control" value="1">
	                        </div>
	                      </div>
	                      <div class="col-md-6">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">Kelompok Beta</label>
	                          <input type="number" name="kelompok_beta" class="form-control" value="2">
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

	$('#list').addClass('active');
</script>
@endsection