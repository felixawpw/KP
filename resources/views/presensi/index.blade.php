@extends('layouts.master')

@section('title')
@endsection

@section('content')
<div class="container-fluid">
  	<div class="row">
	    <div class="col-md-12">
	      <div class="card">
	        <div class="card-header card-header-primary">
	        	<div class="row">
	        		<div class="col-md-10">
			          <h4 class="card-title ">Presensi Mahasiswa</h4>
			          <p class="card-category">Mahasiswa Baru Universitas Surabaya Fakultas Teknik 2018</p>
	        		</div>
	      		</div>
	        </div>
	        <div class="card-body">
	        	<form method="get" action="#">
		        	<div class="row">
		        		<div class="col-md-3"></div>
		        		<div class="col-md-2">
		        			<input type="date" name="tanggal" class="form-control">
		        		</div>
		        		<div class="col-md-1">
		        			<select class="form-control" name="kelompok">
		        				<option value="1">Alfa</option>
		        				<option value="2">Beta</option>
		        			</select>
		        		</div>
		        		<div class="col-md-1">
		        			<select class="form-control" name="nomor">
		        				<option value="1">1</option>
		        			</select>
		        		</div>
		        		<div class="col-md-2">
		        			<a href="#" id="search"><i class="material-icons">search</i></a>
		        		</div>
		        	</div>
	        	</form>
        		<div class="row">
		          	<div class="table-responsive col-md-12">
		                <table class="table">
		                  	<thead class=" text-primary">
		                  		<tr>
			                  		<th>NRP</th>
			                  		<th>Nama Lengkap</th>
			                  		<th class="text-center">Sesi 1</th>
			                  		<th class="text-center">Sesi 2</th>
			                  		<th class="text-center">Sesi 3</th>
			                  		<th class="text-center" colspan="2">Aksi</th>
			                  	</tr>
		                  	</thead>
		                    <tbody>
		                    	<tr>
		                    		<td>160415052</td>
		                    		<td>Felix Aditya Wijaya Pujo Wibowo</td>
		                    		<td class="text-center">H</td>
		                    		<td class="text-center">H</td>
		                    		<td class="text-center">H</td>
		                    		<td class="text-center"><a href="#">Edit</a></td>
		                    		<td class="text-center">Delete</td>
		                    	</tr>
		                    </tbody>
		              	</table>
					</div>
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