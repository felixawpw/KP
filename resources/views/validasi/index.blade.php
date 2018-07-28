@extends('layouts.app')

@section('title')
Validasi Data
@endsection

@section('content')
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-md-8">
				<h1 class="text-center">Data Kelengkapan Mahasiswa Baru</h1>
			</div>
		</div>
		<div class="row justify-content-md-center">
			<div class="col-md-8">
				<h1 class="text-center">Masa Orientasi Bersama Fakultas Teknik 2018</h1>
			</div>
		</div>
		<div class="row justify-content-md-center">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-body">
						<form method="post" action="{{route('validasi.check')}}">
							{{csrf_field()}}
							<div class="form-group">
								<label for="nrp">NRP :</label>
								<input type="text" class="form-control" id="nrp" name="nrp" placeholder="160118999" onkeypress="return isNumber(event)" required>
							    <small id="nrpHelp" class="form-text text-muted">
							    	Contoh NRP adalah 160118999 (Digit 1 & 2 adalah kode fakultas, digit 3 & 4 adalah kode jurusan, digit 5 & 6 adalah angkatan, digit 7&8&9 adalah kode unik mahasiswa).
							    </small>
							</div>
							<div class="form-group">
								<label for="password">Password :</label>
								<input type="password" class="form-control" id="password" name="password" onkeypress="return isNumber(event)" required>
							    <small id="nrpHelp" class="form-text text-muted">
							    	Password yang digunakan adalah password default dari akun sNRP mahasiswa.
							    </small>
							</div>
							<div class="form-group">
      							<div class="g-recaptcha" data-sitekey="6LcQ4GYUAAAAADLvcAlcvkhdCuIOy1c03WKYDFL-"></div>
							</div>
							<button class="btn btn-primary col-md-12">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript">     
		function isNumber(evt) 
		{
	        evt = (evt) ? evt : window.event;
	        var charCode = (evt.which) ? evt.which : evt.keyCode;
	        if ( (charCode > 31 && charCode < 48) || charCode > 57) {
	            return false;
	        }
	        return true;
	    }
	</script>
@endsection