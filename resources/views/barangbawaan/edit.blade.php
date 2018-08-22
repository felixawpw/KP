@extends('layouts.master')

@section('content')
<?php $id = 1; ?>
<div class="container-fluid">
  	<div class="row">
	    <div class="col-md-12">
	      <div class="card">
	        <div class="card-header card-header-primary">
	        	<div class="row">
	        		<div class="col-md-10">
			          <h4 class="card-title ">Tambah Barang</h4>
			          <p class="card-category">Tambah barang yang harus dibawa oleh peserta</p>
	        		</div>
	      		</div>
	        </div>
	        <div class="card-body row">
	        	<div class="col-md-2"></div>
	        	<div class="col-md-8">
		        	<form method="post" action="{{route('barangbawaan.update', $id)}}" class="">
		        		@method('PUT')
		        		{{csrf_field()}}
		        		<div class="row">
	                      <div class="col-md-12">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">NRP Mahasiswa</label>
	                          <input type="text" class="form-control" name="nrp" value="{{$p->NRP_Mhs}}">
	                        </div>
	                      </div>
		        		</div>
	        			<div class="row">
	                      <div class="col-md-12">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">Panitia</label>
	                          <select class="form-control" name="panitia">
                          		<option value="{{$p->panitia->NRP}}">{{$p->panitia->Nama}}</option>
	                          </select>
	                        </div>
	                      </div>
		        		</div>
		        		<div class="row">
	                      <div class="col-md-12">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">Sesi</label>
	                          <select class="form-control" name="sesi">
	                          	<option value="{{$p->sesi->Id}}">{{$p->sesi->Nama}}</option>
	                          </select>
	                        </div>
	                      </div>
		        		</div>
		        		<div class="row">
	                      <div class="col-md-12">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">Barang</label>
	                          <select class="form-control" name="barang">
	                          	@foreach($barangs as $b)
	                          	<option value="{{$b->Id}}" @if($b->Id == $p->barang->Id) selected @endif>{{$b->Nama}}</option>
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