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
			          <h4 class="card-title ">Tabel Jenis Pelanggaran</h4>
			          <p class="card-category">Jenis dan nama pelanggaran serta poin tiap pelanggaran</p>

	        		</div>
	        		<div class="col-md-2">
		            	<a href="{{route('pelanggaran.create')}}">
		            		<i class="material-icons" style="font-size: 48px; color: lightblue;">add_circle</i>
		            	</a>
	        		</div>
	      		</div>
	        </div>
	        <div class="card-body">
	        	<form method="get" action="#">
		        	<div class="row">
		        		<div class="col-md-10">
		        			<input type="text" name="search" class="form-control" placeholder="Search berdasarkan : Nama/Kategori. Ex: Merokok . ATAU . Berat">
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
			                  		<th>Nama Pelanggaran</th>
			                  		<th class="text-center">Kategori</th>
			                  		<th class="text-center">Poin</th>
			                  		<th class="text-center" colspan="2">Aksi</th>
			                  	</tr>
		                  	</thead>
		                    <tbody>
		                    	<tr>
		                    		<td>1</td>
		                    		<td>Merokok</td>
		                    		<td class="text-center">Berat</td>
		                    		<td class="text-center">10</td>
		                    		<td class="text-center"><a href="{{ route('pelanggaran.edit', 1) }}">Edit</a></td>
		                    		<td class="text-center">
		                    			<form method="post" action="{{ route('pelanggaran.destroy', 1) }}">
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

	$('#pelanggaran').addClass('active');
</script>
@endsection