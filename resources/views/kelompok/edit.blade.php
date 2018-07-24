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
			          <h4 class="card-title ">Kelompok Mahasiswa</h4>
			          <p class="card-category">Edit kelompok mahasiswa</p>
	        		</div>
	      		</div>
	        </div>
	        <div class="card-body row">
	        	<div class="col-md-2"></div>
	        	<div class="col-md-8">
		        	<form method="post" action="{{route('kelompok.update', $kelompok->Kelompok)}}" class="">
		        		@method('PUT')
		        		{{csrf_field()}}
		        		<div class="row">
	                      <div class="col-md-12">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">Kelompok</label>
  	                          <input type="text" class="form-control" name="kelompok" value="{{$kelompok->Kelompok}}">
	                        </div>
	                      </div>
		        		</div>
		        		<div class="row">
	                      <div class="col-md-12">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">Mahasiswa Pendamping</label>
	                          <select name="maping" class="form-control">
	                          	@foreach($panitias as $p)
	                          		<option value="{{$p->NRP}}" @if($p->NRP == $kelompok->NRP) selected @endif>{{$p->Nama}}</option>
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
	$('#kelompok').addClass('active');
</script>
@endsection