@extends('layouts.app')

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
			          <h4 class="card-title ">Daftar Barang yang Tidak Dibawa Mahasiswa</h4>
	        		</div>
	      		</div>
	        </div>
	        <div class="card-body">
        		<div class="row">
		          	<div class="table-responsive col-md-12">
          				<table class="table table-striped" data-toggle="table" data-pagination="true" data-search="true" data-url="{!! route('mhs_barang') !!}">
							<thead>
								<tr class="warning">
									<th data-sortable="true" data-field="panitia">Nama Panitia</th>
									<th data-sortable="true" data-field="barang">Nama Barang</th>
									<th data-sortable="true" data-field="sesi">Sesi</th>
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
	$('#pelanggar').addClass('active');
</script>
@endsection