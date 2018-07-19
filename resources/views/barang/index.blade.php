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
			          <h4 class="card-title ">Tabel Barang</h4>
			          <p class="card-category">Daftar barang yang harus dibawa peserta MOB</p>

	        		</div>
	        		<div class="col-md-2">
		            	<a href="{{route('barang.create')}}">
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
			                  		<th>No</th>
			                  		<th>Tanggal</th>
			                  		<th class="text-center">Nama Barang</th>
			                  		<th class="text-center">Poin</th>
			                  		<th class="text-center" colspan="2">Aksi</th>
			                  	</tr>
		                  	</thead>
		                    <tbody>
		                    	<tr>
		                    		<td>1</td>
		                    		<td>07-20-2018</td>
		                    		<td class="text-center">Laptop</td>
		                    		<td class="text-center">1</td>
		                    		<td class="text-center"><a href="{{ route('barang.edit', 1) }}">Edit</a></td>
		                    		<td class="text-center">
		                    			<form method="post" action="{{ route('barang.destroy', 1) }}">
		                    				{{csrf_field()}}
		                    				@method('DELETE')
		               						<button type="submit" class="button_delete">Delete</button>
		                    			</form>
		                    		</td>
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
	$('#barang').addClass('active');
</script>
@endsection