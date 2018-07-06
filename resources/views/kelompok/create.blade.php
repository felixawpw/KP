@extends('layouts.master')

@section('content')
<div class="container-fluid">
  	<div class="row">
	    <div class="col-md-12">
	      <div class="card">
	        <div class="card-header card-header-primary">
	        	<div class="row">
	        		<div class="col-md-10">
			          <h4 class="card-title ">Kelompok Mahasiswa</h4>
			          <p class="card-category">Tambah kelompok mahasiswa</p>
	        		</div>
	      		</div>
	        </div>
	        <div class="card-body row">
	        	<div class="col-md-2"></div>
	        	<div class="col-md-8">
		        	<form method="post" action="{{route('kelompok.store')}}" class="">
		        		{{csrf_field()}}
		        		<div class="row">
	                      <div class="col-md-12">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">Kelompok</label>
	                          <select class="form-control">
	                          	<option value="alfa">Alfa</option>
	                          	<option value="beta">Beta</option>
	                          </select>
	                        </div>
	                      </div>
		        		</div>
		        		<div class="row">
	                      <div class="col-md-12">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">Nomor Kelompok</label>
  	                          <input type="number" class="form-control" name="nama_barang">
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
	$('#barang').addClass('active');
	document.getElementById('tanggal').value = new Date().toDateInputValue();
</script>
@endsection