@extends('layouts.master')

@section('content')
<div class="container-fluid">
  	<div class="row">
	    <div class="col-md-12">
	      <div class="card">
	        <div class="card-header card-header-primary">
	        	<div class="row">
	        		<div class="col-md-10">
			          <h4 class="card-title ">Tambah Panitia Baru</h4>
			          <p class="card-category">Panitia Baru Universitas Surabaya Fakultas Teknik 2018</p>
	        		</div>
	      		</div>
	        </div>
	        <div class="card-body row">
	        	<div class="col-md-2"></div>
	        	<div class="col-md-8">
		        	<form method="post" action="{{route('panitia.store')}}" class="">
		        		{{csrf_field()}}
		        		<div class="row">
	                      <div class="col-md-12">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">Nama Lengkap</label>
	                          <input type="text" class="form-control" name="nama_lengkap">
	                        </div>
	                      </div>
		        		</div>
		        		<div class="row">
	                      <div class="col-md-12">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">NRP</label>
	                          <input type="text" class="form-control" name="nrp">
	                        </div>
	                      </div>
		        		</div>
		        		<div class="row">
	                      <div class="col-md-12">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">Jurusan</label>
	                          <select class="form-control" name="jurusan" id="comboJurusan">
	                          	<option>Kimia</option>
	                          	<option>Elektro</option>
	                          	<option selected>Informatika</option>
	                          </select>
	                        </div>
	                      </div>
		        		</div>
	        			<div class="row">
	                      <div class="col-md-6">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">Divisi</label>
	                          <select class="form-control">
	                          	<option>Divisi 1</option>
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

	$('#list').addClass('active');
</script>
@endsection