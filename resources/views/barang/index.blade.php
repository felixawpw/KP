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
        		<div class="row">
		          	<div class="table-responsive col-md-12">
          				<table class="table table-striped" data-toggle="table" data-pagination="true" data-search="true" data-url="{!! route('jsonbarang') !!}">
							<thead>
								<tr class="warning">
									<th data-sortable="true" data-field="tanggal">Tanggal</th>
									<th data-sortable="true" data-field="nama">Nama Barang</th>
									<th data-sortable="true" data-field="poin">Poin</th>
									<th data-field="id" data-formatter="ActionFormatter" data-width="11%">Action</th>
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
	function ActionFormatter(value, row, index) {
		var link = '/barang/' + row['id'];

		var edit = '<a href="' + link + '/edit" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i></a>';
		var del = '<button type="submit" class="btn btn-link btn-danger btn-just-icon remove" onclick="delete_confirmation(event, \'' + link + '\')"><i class="material-icons">close</i></button>';
		return edit + del;
	}

	$('#barang').addClass('active');
</script>
@endsection