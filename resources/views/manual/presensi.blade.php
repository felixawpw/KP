@extends('layouts.master')

@section('content')
<div class="container-fluid">
  	<div class="row">
	    <div class="col-md-12">
	      <div class="card">
	        <div class="card-header card-header-primary">
	        	<div class="row">
	        		<div class="col-md-10">
			          <h4 class="card-title ">Presensi Mahasiswa </h4>
			          <p class="card-category">Presensi ini untuk sesi {!! $sesi->Nama !!} </p>
	        		</div>
	      		</div>
	        </div>
	        <div class="card-body row">
	        	<div class="col-md-2"></div>
	        	<div class="col-md-8">
		        	<form method="post" action="{{route('maping.store_presensi')}}" class="">
		        		{{csrf_field()}}
						<div class="row">
							<div class="col-md-12">
			                  <div class="table-responsive">
			                    <table class="table table-striped">
			                      <thead>
			                        <tr>
			                          <th class="text-center">#</th>
			                          <th>NRP Mahasiswa</th>
			                          <th>Nama Mahasiswa</th>
			                          <th>Masuk</th>
			                        </tr>
			                      </thead>
			                      <tbody>
			                      	@php
			                      		$i = 1;
			                      	@endphp
		                        	@foreach($mahasiswas as $mhs)
		                        	<tr>
			                        	<td>{!! $i++ !!}</td>
			                        	<td>{!! $mhs->user->NRP !!}</td>
			                        	<td>{!! $mhs->user->Nama !!}</td>
				                            <td><div class="form-check">
				                              <label class="form-check-label">
				                                <input class="form-check-input" type="checkbox" name="{!! $mhs->user->NRP !!}" value="hadir">
				                                <span class="form-check-sign">
				                                  <span class="check"></span>
				                                </span>
				                              </label>
				                            </div>
			                        	</td>
			                        </tr>
		                        	@endforeach
			                      </tbody>
			                    </table>
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
	$(document).ready(function(){
		$('#presensi').addClass('active');
		md.initFormExtendedDatetimepickers();

	});
</script>
@endsection