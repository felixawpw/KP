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
			          <h4 class="card-title ">Tabel Pelanggar</h4>
			          <p class="card-category">Tabel pelanggar MOB FT 2018</p>

	        		</div>
	        		<div class="col-md-2">
		            	<a href="{{route('pelanggar.create')}}">
		            		<i class="material-icons" style="font-size: 48px; color: lightblue;">add_circle</i>
		            	</a>
	        		</div>
	      		</div>
	        </div>
	        <div class="card-body">
	        	<form method="get" action="#">
		        	<div class="row">
		        		<div class="col-md-10">
		        			<input type="text" name="search" class="form-control" placeholder="NRP/Nama/Jurusan. Ex: 160415052 . ATAU . Felix Aditya Wijaya . ATAU . Teknik Informatika">
		        		</div>
		        		<div class="col-md-2">
		        			<a href="#" id="search"><i class="material-icons">search</i></a>
		        		</div>
		        	</div>
	        	</form>
        		<div class="row">
		          	<div class="table-responsive col-md-12">
          				<table class="table table-striped" data-toggle="table" data-pagination="true" data-search="true" data-url="/table/json/pelanggar">
							<thead>
								<tr class="warning">
									<th data-sortable="true" data-field="nrp">NRP</th>
									<th data-sortable="true" data-field="mhs">Nama Lengkap</th>
									<!--<th data-sortable="true" data-field="jurusan">Jurusan</th>-->
									<th data-sortable="true" data-field="sesi">Sesi</th>
									<th data-sortable="true" data-field="waktu">Waktu</th>
									<th data-sortable="true" data-field="panitia">Panitia</th>
									<th data-sortable="true" data-field="pelanggaran">Nama Pelanggaran</th>
									<th data-field="id" data-formatter="EditFormatter">Edit</th>
									<th data-field="id" data-formatter="DeleteFormatter">Delete</th>
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
		return '<a href="/pelanggar/'+ row['id']+ '/edit">Edit</a>'
	}

	function DeleteFormatter(value, row, index) {
		return '<form method="post" action="/pelanggar/'+ row['id'] + '">' +
				'{{csrf_field()}}' +
				'@method("DELETE")' +
					'<button type="submit" class="button_delete" onclick="confirm(' + "'Apakah anda yakin?'" +');">Delete</button>'+
			'</form>';
	}


	$('#pelanggar').addClass('active');
</script>
@endsection