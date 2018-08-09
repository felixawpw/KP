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
			          <h4 class="card-title ">Tabel Mahasiswa</h4>
			          <p class="card-category">Mahasiswa Baru Universitas Surabaya Fakultas Teknik 2018</p>

	        		</div>
	        		<div class="col-md-2">
		            	<a href="{{route('mahasiswa.create')}}">
		            		<i class="material-icons" style="font-size: 48px; color: lightblue;">add_circle</i>
		            	</a>
	        		</div>
	      		</div>
	        </div>
	        <div class="card-body">
        		<div class="row">
		          	<div class="table-responsive col-md-12">
          				<table class="table table-striped" data-toggle="table" data-pagination="true" data-search="true" data-url="{!! route('jsonmhs') !!}">
							<thead>
								<tr class="warning">
									<th data-sortable="true" data-field="nrp">NRP</th>
									<th data-sortable="true" data-field="nama">Nama Lengkap</th>
									<th data-sortable="true" data-field="nama_jurusan">Jurusan</th>
									<th data-sortable="true" data-field="angkatan">Angkatan</th>
									<th data-sortable="true" data-field="alfa">Alfa</th>
									<th data-sortable="true" data-field="beta">Beta</th>
									<th data-sortable="true" data-field="validasi">Validasi</th>
									<th data-sortable="true" data-field="penyakit">Penyakit</th>
									<th data-sortable="true" data-field="recup_1">Recup 1</th>
									<th data-sortable="true" data-field="recup_2">Recup 2</th>
									<th data-field="nrp" data-formatter="EditFormatter">Edit</th>
									<th data-field="nrp" data-formatter="DeleteFormatter">Delete</th>
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
		return '<a href="/mob/mahasiswa/'+ row['nrp']+ '/edit">Edit</a>'
	}

	function DeleteFormatter(value, row, index) {
		return '<form method="post" action="/mob/mahasiswa/'+ row['nrp'] + '">' +
				'{{csrf_field()}}' +
				'@method("DELETE")' +
					'<button type="submit" class="button_delete" onclick="confirm(' + "'Apakah anda yakin?'" +');">Delete</button>'+
			'</form>';
	}

	$('#list').addClass('active');
</script>
@endsection