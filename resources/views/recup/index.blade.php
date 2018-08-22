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
			          <h4 class="card-title ">Tabel Cabang Rektor Cup</h4>
			          <p class="card-category">Cabang rektor cup serta deskripsi</p>
	        		</div>
	        		<div class="col-md-2">
		            	<a href="{{route('recup.create')}}">
		            		<i class="material-icons" style="font-size: 48px; color: lightblue;">add_circle</i>
		            	</a>
	        		</div>
	      		</div>
	        </div>
	        <div class="card-body">
        		<div class="row">
		          	<div class="table-responsive col-md-12">
          				<table class="table table-striped" data-toggle="table" data-pagination="true" data-search="true" data-url="{!! route('jsonrecup') !!}">
							<thead>
								<tr class="warning">
									<th data-sortable="true" data-field="Nama">Nama Cabang</th>
									<th data-sortable="true" data-field="Deskripsi">Deskripsi</th>
									<th data-field="Id" data-formatter="ActionFormatter">Action</th>
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
	function ActionFormatter(value, row, index) 
	{
		var link = '/recup/' + row['Id'];
		var show = '<a href="' + link + '" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">favorite</i></a>';
		var edit = '<a href="' + link + '/edit" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i></a>';
		var del = '<button type="submit" class="btn btn-link btn-danger btn-just-icon remove" onclick="delete_confirmation(event, \'' + link + '\')"><i class="material-icons">close</i></button>';
		return show + edit + del;
	}

	function ShowFormatter(value, row, index){
		return '<a href="/mob/recup/'+ row['Id'] + '">Show</a>'
	}

	$('#recup').addClass('active');
</script>
@endsection