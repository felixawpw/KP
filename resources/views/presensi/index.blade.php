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
			          <h4 class="card-title ">Presensi Mahasiswa</h4>
			          <p class="card-category">Mahasiswa Baru Universitas Surabaya Fakultas Teknik 2018</p>
	        		</div>
	        		<div class="col-md-2">
		            	<a href="{{route('presensi.create')}}">
		            		<i class="material-icons" style="font-size: 48px; color: lightblue;">add_circle</i>
		            	</a>
	        		</div>
	      		</div>
	        </div>
	        <div class="card-body">
		        	<div class="row">
		        		<div class="col-md-4"></div>
		        		<div class="col-md-4">	                          
		        			<select class="form-control" id="comboSesi">
		        				@foreach($sesis as $sesi)
		        				<option value="{{$sesi->Nama}}">{{$sesi->Nama}}</option>
		        				@endforeach
		        			</select>
		        		</div>
		        		<div class="col-md-2">
		        			<button class="btn btn-primary col-md-12" onclick="search()">Search</button>
		        		</div>
		        		<div class="col-md-2">
		        			<button class="btn btn-primary col-md-12" onclick="showAll()">Show All</button>
		        		</div>
		        	</div>
	        	</form>
        		<div class="row">
		          	<div class="table-responsive col-md-12">
          				<table class="table table-striped" data-toggle="table" data-pagination="true" data-search="true" data-url="{!! route('jsonabsensi') !!}" id="tableAbsensi">
							<thead>
								<tr class="warning">
									<th data-sortable="true" data-field="nrp">NRP</th>
									<th data-sortable="true" data-field="nama">Nama Lengkap</th>
									<th data-sortable="true" data-field="panitia">Nama Panitia</th>
									<th data-sortable="true" data-field="sesi">Sesi</th>
									<th data-field="id_sesi" data-formatter="DeleteFormatter">Aksi</th>
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
		return '<a href="/presensi/delete/' + row["nrp"] +'/' + row['id_sesi'] + '">Delete</a>';
	}

	function search()
	{
		var text = $('#comboSesi').val();
		$('#tableAbsensi').bootstrapTable('resetSearch', text);
	}

	function showAll()
	{
		var text = $('#comboSesi').val();
		$('#tableAbsensi').bootstrapTable('resetSearch', "");
	}

	$('#absensi').addClass('active');
</script>
@endsection