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
			          <h4 class="card-title ">Tabel Pendaftar Cabang Rektor Cup {{$recup->Nama}}</h4>
			          <p class="card-category">Daftar mahasiswa yang mendaftarkan diri sebagai peserta Recup</p>
	        		</div>
	      		</div>
	        </div>
	        <div class="card-body">
        		<div class="row">
		          	<div class="table-responsive col-md-12">
          				<table class="table table-striped" data-toggle="table" data-pagination="true" data-search="true" data-url='{!! route("jsonpeserta", $recup->Id) !!}'>
							<thead>
								<tr class="warning">
									<th data-sortable="true" data-field="nrp">NRP</th>
									<th data-sortable="true" data-field="nama">Nama</th>
									<th data-sortable="true" data-field="prioritas">Prioritas</th>
									<th data-sortable="true" data-field="penerimaan">Status Penerimaan</th>
									<th data-field="bukti" data-formatter="EditFormatter">Bukti Prestasi</th>
									<th data-formatter="DeleteFormatter">Terima</th>
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
		return '<a href="#" onclick="showBukti(' +"'" + row['bukti'] + "'" +')">Show</a>'
	}

	function DeleteFormatter(value, row, index) {
		if (row['penerimaan'] == 'Tidak Diterima')
			return '<a href="#" onclick="terima(' +"'" + row['nrp'] + "'" +')">Terima</a>'
		return '<a href="#" onclick="terima(' +"'" + row['nrp'] + "'" +')">Tidak Diterima</a>'

	}

	function showBukti(bukti)
	{
		$('#modHeader').html("Foto Bukti Prestasi");
        $.ajax({
            type: "GET",
            url: "/convert/to/php",
            data: { data: bukti},
            dataType: 'json',
            success: function (data) {
                alert(data);
            },
            error: function (data) {
            	console.log(data['responseText']);
				$('#modBody').html("<img id='myImage'></img>");
				document.getElementById("myImage").src = data;
        		$('#modalWarning').modal('show');
            }
        });
	}

	function terima(nrp)
	{
		alert(nrp);
	}
	$('#recup').addClass('active');
</script>
@endsection