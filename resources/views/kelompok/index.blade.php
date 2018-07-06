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
			          <h4 class="card-title ">Kelompok Mahasiswa</h4>
			          <p class="card-category">Daftar kelompok alfa dan beta mahasiswa</p>
	        		</div>
	        		<div class="col-md-2">
		            	<a href="{{route('kelompok.create')}}">
		            		<i class="material-icons" style="font-size: 48px; color: lightblue;">add_circle</i>
		            	</a>
	        		</div>

	      		</div>
	        </div>
	        <div class="card-body">
	        	<form method="get" action="#">
		        	<div class="row">
		        		<div class="col-md-4"></div>
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
			                  		<th>Kelompok</th>
			                  		<th>Maping</th>
			                  		<th class="text-center" colspan="2">Aksi</th>
			                  	</tr>
		                  	</thead>
		                    <tbody>
		                    	<tr>
		                    		<td>Alfa 1</td>
		                    		<td>Felix Aditya Wijaya Pujo Wibowo</td>
		                    		<td class="text-center"><a href="#">Edit</a></td>
		                    		<td class="text-center">Delete</td>
		                    	</tr>
		                    	<tr>
		                    		<td>Alfa 1</td>
		                    		<td>Felix Aditya Wijaya Pujo Wibowo</td>
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

	$('#kelompok').addClass('active');
</script>
@endsection