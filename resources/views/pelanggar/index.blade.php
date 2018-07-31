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
          				<table class="table table-striped" data-toggle="table" data-pagination="true" data-search="true" data-url="{!! route('jsonpelanggar') !!}">
							<thead>
								<tr class="warning">
									<th data-sortable="true" data-field="nrp">NRP</th>
									<th data-sortable="true" data-field="mhs">Nama Lengkap</th>						
									<th data-sortable="true" data-field="panitia">Panitia</th>
									<th data-sortable="true" data-field="pelanggaran">Nama Pelanggaran</th>
									<!--<th data-sortable="true" data-field="jurusan">Jurusan</th>-->
									<th data-sortable="true" data-field="sesi">Sesi</th>
									<th data-sortable="true" data-field="waktu">Waktu</th>
									<th data-field="id_panitia" data-formatter="EditFormatter">Edit</th>
									<th data-field="id_sesi" data-formatter="DeleteFormatter">Delete</th>
									<th data-field="id_pelanggaran" data-visible=false>Pelanggaran</th>
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
		return '<a href="/pelanggar/edit/' + row["nrp"] +'/' + row['id_panitia']+ '/'+ row['id_sesi'] +'/'+ row['id_pelanggaran']+'">Edit</a>'
	}

	function DeleteFormatter(value, row, index) {
		return '<a href="/pelanggar/delete/' + row["nrp"] +'/' + row['id_panitia']+ '/'+ row['id_sesi'] +'/'+row['id_pelanggaran']+'">Delete</a>'
	}


	$('#pelanggar').addClass('active');
</script>
@endsection