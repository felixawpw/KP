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
		        	<form method="post" action="{{route('mahasiswa.update', $mahasiswa->NRP)}}" class="">
		        		@method('PUT')
		        		{{csrf_field()}}
		        		<div class="row">
	                      <div class="col-md-12">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">Nama Lengkap</label>
	                          <input type="text" class="form-control" name="nama" value="{{$mahasiswa->Nama}}">
	                        </div>
	                      </div>
		        		</div>
		        		<div class="row">
	                      <div class="col-md-12">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">NRP</label>
	                          <input type="text" class="form-control" name="nrp" value="{{$mahasiswa->NRP}}">
	                        </div>
	                      </div>
		        		</div>
		        		<div class="row">
	                      <div class="col-md-12">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">Jurusan</label>
	                          <select class="form-control" name="jurusan" id="comboJurusan">
	                          	@foreach($jurusans as $j)
	                          		<option value="{{$j->Id}}" @if($j->Nama == $mahasiswa->jurusan->Nama) selected @endif>
	                          			{{$j->Nama}}
	                          		</option>
	                          	@endforeach
	                          </select>
	                        </div>
	                      </div>
		        		</div>
	        			<div class="row">
	                      <div class="col-md-12">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">Angkatan</label>
	                          <input type="text" class="form-control" name="angkatan" value="{{$mahasiswa->Angkatan}}">
	                        </div>
	                      </div>
		        		</div>

	        			<div class="row">
	                      <div class="col-md-6">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">Kelompok Alfa</label>
	                          <input type="number" name="kelompok_alfa" class="form-control" value="10">
	                        </div>
	                      </div>
	                      <div class="col-md-6">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">Kelompok Beta</label>
	                          <input type="number" name="kelompok_beta" class="form-control" value="21">
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
	console.log({!! json_encode($mahasiswa) !!});
	$('#list').addClass('active');
</script>
@endsection