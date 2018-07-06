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
			          <h4 class="card-title ">Tabel Barang Bawaan</h4>
			          <p class="card-category">Daftar peserta MOB yang tidak bawa barang</p>

	        		</div>
	        		<div class="col-md-2">
		            	<a href="{{route('barangbawaan.create')}}">
		            		<i class="material-icons" style="font-size: 48px; color: lightblue;">add_circle</i>
		            	</a>
	        		</div>
	      		</div>
	        </div>
	        <div class="card-body">
	        	<form method="get" action="#">
		        	<div class="row">
		        		<div class="col-md-10">
		        			<input type="date" name="search" class="form-control">
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
			                  		<th>NRP Mahasiswa</th>
			                  		<th>Nama Barang</th>
			                  		<th class="text-center">Sesi</th>
			                  		<th class="text-center">Panitia</th>
			                  		<th class="text-center" colspan="2">Aksi</th>
			                  	</tr>
		                  	</thead>
		                    <tbody>
		                    	<tr>
		                    		<td>160415052</td>
		                    		<td>HALO</td>
		                    		<td class="text-center">1</td>
		                    		<td class="text-center">Felix Aditya</td>
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
	$('#barangbawaan').addClass('active');
</script>
@endsection