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
			          <h4 class="card-title ">Tabel Sesi</h4>
			          <p class="card-category">List Acara Hari H MOB FT 2018</p>
	        		</div>
	        		<div class="col-md-2">
		            	<a href="{{route('jadwal.create')}}">
		            		<i class="material-icons" style="font-size: 48px; color: lightblue;">add_circle</i>
		            	</a>
	        		</div>
	      		</div>
	        </div>
	        <div class="card-body">
        		<div class="row">
		          	<div class="table-responsive col-md-12">
          				<table class="table table-striped" data-toggle="table" data-pagination="true" data-search="true" data-url="/table/json/sesi">
							<thead>
								<tr class="warning">
									<th data-sortable="true" data-field="nama">Nama</th>
									<th data-sortable="true" data-field="mulai">Mulai</th>
									<th data-sortable="true" data-field="akhir">Akhir</th>
									<th data-sortable="true" data-field="kelompok">Kelompok</th>
									<th data-field="id" data-formatter="EditFormatter">Edit</th>
									<th data-formatter="DeleteFormatter">Delete</th>
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
	function EditFormatter(value, row, index){
		return '<a href="/jadwal/'+ row['id']+ '/edit">Edit</a>'
	}

	function DeleteFormatter(value, row, index) {
		return '<form method="post" action="/jadwal/'+ row['id'] + '">' +
				'{{csrf_field()}}' +
				'@method("DELETE")' +
					'<button type="submit" class="button_delete" onclick="confirm(' + "'Apakah anda yakin?'" +');">Delete</button>'+
			'</form>';
	}


	$('#jadwal').addClass('active');
</script>
@endsection