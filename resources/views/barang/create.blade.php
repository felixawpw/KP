@extends('layouts.master')

@section('content')
<div class="container-fluid">
  	<div class="row">
	    <div class="col-md-12">
	      <div class="card">
	        <div class="card-header card-header-primary">
	        	<div class="row">
	        		<div class="col-md-10">
			          <h4 class="card-title ">Tambah Barang</h4>
			          <p class="card-category">Tambah barang yang harus dibawa oleh peserta</p>
	        		</div>
	      		</div>
	        </div>
	        <div class="card-body row">
	        	<div class="col-md-2"></div>
	        	<div class="col-md-8">
		        	<form method="post" action="{{route('barang.store')}}" class="">
		        		{{csrf_field()}}
		        		<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="bmd-label-floating">Tanggal</label>
									<input type="text" class="form-control datepicker" name="tanggal" id="tanggal" value="01/01/1970">
								</div>
							</div>
		        		</div>
		        		<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class="bmd-label-floating">Nama Barang</label>
												<input type="text" class="form-control" name="nama_barang">
										</div>
									</div>
		        		</div>
		        		<div class="row">
	                      <div class="col-md-12">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">Poin</label>
	                          <input type="number" class="form-control" name="poin">
	                        </div>
	                      </div>
		        		</div>
	                    <button type="submit" class="btn btn-primary pull-right col-md-4">Submit</button>
	                    <div class="clearfix"></div>
		        	</form>
	        	</div>
		    </div>
		  </div>
		</div>
	</div>
</div>
@endsection


@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
			var now = new Date;			
			var day = ("0" + now.getDate()).slice(-2);
			var month = ("0" + (now.getMonth() + 1)).slice(-2);
			var today = month + "/" + day + "/" + now.getFullYear();

			$('#tanggal').val(today);
			md.initFormExtendedDatetimepickers();
			$('#barang').addClass('active');
		});
</script>
@endsection