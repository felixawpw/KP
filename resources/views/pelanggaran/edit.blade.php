@extends('layouts.master')

@section('content')
<div class="container-fluid">
  	<div class="row">
	    <div class="col-md-12">
	      <div class="card">
	        <div class="card-header card-header-primary">
	        	<div class="row">
	        		<div class="col-md-10">
			          <h4 class="card-title ">Edit Pelanggaran</h4>
			          <p class="card-category">Edit pelanggaran</p>
	        		</div>
	      		</div>
	        </div>
	        <div class="card-body row">
	        	<div class="col-md-2"></div>
	        	<div class="col-md-8">
		        	<form method="post" action="{{route('pelanggaran.update', $pelanggaran->Id)}}" class="">
		        		@method('PUT')
		        		{{csrf_field()}}
		        		<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="bmd-label-floating">Nama Pelanggaran</label>
									<input required type="text" class="form-control" name="nama" value="{{$pelanggaran->Nama}}">
								</div>
							</div>
		        		</div>
		        		<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="bmd-label-floating">Kategori Pelanggaran</label>
									<select required required class="form-control selectpicker" data-style="select-with-transition" title="Pilih Kategori" data-size="7" name="kategori" id="comboKategori">
										@foreach($kategories as $k)
											<option value="{{$k->Id}}" @if($k->Id == $pelanggaran->Id_Kategori) selected @endif>
												{{$k->Nama}}
											</option>
										@endforeach
									</select>
								</div>
							</div>
		        		</div>
		        		<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class="bmd-label-floating">Poin Timpa</label>
											<input required type="text" class="form-control" name="poin" value="{{$pelanggaran->Poin_Timpa}}">
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

	$('#pelanggaran').addClass('active');
</script>
@endsection