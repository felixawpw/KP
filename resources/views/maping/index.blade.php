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
			          <h4 class="card-title ">Tabel Mahasiswa Pendamping</h4>
			          <p class="card-category">List Mahasiswa Pendamping MOB FT 2018</p>
	        		</div>
	        		<div class="col-md-2">
		            	<a href="{{route('kelompok.create')}}">
		            		<i class="material-icons" style="font-size: 48px; color: lightblue;">add_circle</i>
		            	</a>
	        		</div>
	      		</div>
	        </div>
	        <div class="card-body">
        		<div class="row">
		          	<div class="table-responsive col-md-12">
          				<table class="table table-striped" data-toggle="table" data-pagination="true" data-search="true" data-url="{!! route('jsonmaping') !!}">
							<thead>
								<tr class="warning">
									<th data-sortable="true" data-field="nrp">NRP</th>
									<th data-sortable="true" data-field="nama">Nama Lengkap</th>
									<th data-sortable="true" data-field="nama_jurusan">Jurusan</th>
									<th data-sortable="true" data-field="alfa">Alfa</th>
									<th data-sortable="true" data-field="beta">Beta</th>
									<!--<th data-field="id">Edit</th>
									<th data-formatter="LinkFormatter">Delete</th>-->
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
		return '<a href="/mob/maping/'+ row['id']+ '/edit">Edit</a>'
	}

	function DeleteFormatter(value, row, index) {
		return '<form method="post" action="/mob/panitia/'+ row['nrp'] + '">' +
				'{{csrf_field()}}' +
				'@method("DELETE")' +
					'<button type="submit" class="button_delete" onclick="confirm(' + "'Apakah anda yakin?'" +');">Delete</button>'+
			'</form>';
	}

	$('#maping').addClass('active');
</script>
@endsection