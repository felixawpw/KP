@extends('layouts.master')

@section('content')
<div class="container-fluid">
  	<div class="row">
	    <div class="col-md-12">
	      <div class="card">
	        <div class="card-header card-header-primary">
	        	<div class="row">
	        		<div class="col-md-10">
			          <h4 class="card-title ">Tambah Barang Bawaan</h4>
			          <p class="card-category">Tambah peserta MOB yang tidak bawa barang</p>
	        		</div>
	      		</div>
	        </div>
	        <div class="card-body row">
	        	<div class="col-md-2"></div>
	        	<div class="col-md-8">
		        	<form method="post" action="{{route('barangbawaan.store')}}" class="">
		        		{{csrf_field()}}
		        		<div class="row">
	                      <div class="col-md-12">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">NRP Mahasiswa</label>
	                          <input type="text" class="form-control" name="nrp" id="nrp">
	                        </div>
	                      </div>
		        		</div>
		        		<div class="row">
	                      <div class="col-md-12">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">Barang</label>
	                          <select class="form-control" name="barang" id="">
	                          	@foreach($barangs as $b)
	                          		<option value="{{$b->Id}}">{{$b->Nama}}</option>
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
	                          	@foreach($sesis as $s)
	                          		<option value="{{$s->Id}}">{{$s->Nama}}</option>
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
	$('#barangbawaan').addClass('active');
</script>
@endsection