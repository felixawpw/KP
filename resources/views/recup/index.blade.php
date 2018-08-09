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
									<th data-field="Id" data-formatter="ShowFormatter">Show Pendaftar</th>
									<th data-field="Id" data-formatter="EditFormatter">Edit</th>
									<th data-field="Id" data-formatter="DeleteFormatter">Delete</th>
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
	function ShowFormatter(value, row, index){
		return '<a href="/mob/recup/'+ row['Id'] + '">Show</a>'
	}

	function EditFormatter(value, row, index){
		return '<a href="/mob/recup/'+ row['Id']+ '/edit">Edit</a>'
	}

	function DeleteFormatter(value, row, index) {
		return '<form method="post" action="/mob/recup/'+ row['Id'] + '">' +
				'{{csrf_field()}}' +
				'@method("DELETE")' +
					'<button type="submit" class="button_delete" onclick="confirm(' + "'Apakah anda yakin?'" +');">Delete</button>'+
			'</form>';
	}

	$('#recup').addClass('active');
</script>
@endsection