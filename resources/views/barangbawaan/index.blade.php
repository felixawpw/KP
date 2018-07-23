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
        		<div class="row">
		          	<div class="table-responsive col-md-12">
          				<table class="table table-striped" data-toggle="table" data-pagination="true" data-search="true" data-url="/table/json/barangbawaan">
							<thead>
								<tr class="warning">
									<th data-sortable="true" data-field="nrp">NRP</th>
									<th data-sortable="true" data-field="sesi">Sesi</th>
									<th data-sortable="true" data-field="panitia">Panitia</th>
									<th data-sortable="true" data-field="barang">Nama Barang</th>
									<th data-field="id_sesi" data-formatter="DeleteFormatter">Delete</th>
								</tr>
							</thead>
							<tbody>

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
	function DeleteFormatter(value, row, index) {
		return '<a href="/barangbawaan/delete/' + row["nrp"] +'/' + row['id_panitia']+ '/'+ row['id_sesi'] +'">Delete</a>'
	}


	$('#barangbawaan').addClass('active');
</script>
@endsection