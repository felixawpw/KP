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
			          <h4 class="card-title ">Tabel Panitia</h4>
			          <p class="card-category">Tabel panitia Universitas Surabaya Fakultas Teknik 2018</p>

	        		</div>
	        		<div class="col-md-2">
		            	<a href="{{route('panitia.create')}}">
		            		<i class="material-icons" style="font-size: 48px; color: lightblue;">add_circle</i>
		            	</a>
	        		</div>
	      		</div>
	        </div>
	        <div class="card-body">
	        	<form method="get" action="#">
		        	<div class="row">
		        		<div class="col-md-10">
		        			<input type="text" name="search" class="form-control" placeholder="NRP/Nama/Jurusan. Ex: 160415052 . ATAU . Felix Aditya Wijaya . ATAU . Teknik Informatika">
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
			                  		<th class="text-center">Jurusan</th>
			                  		<th class="text-center">Divisi</th>
			                  		<th class="text-center" colspan="2">Aksi</th>
			                  	</tr>
		                  	</thead>
		                    <tbody>
		                    	<tr>
		                    		<td>160415052</td>
		                    		<td>Felix Aditya Wijaya Pujo Wibowo</td>
		                    		<td class="text-center">Informatika</td>
		                    		<td class="text-center">ITD</td>
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

	$('#list').addClass('active');
</script>
@endsection