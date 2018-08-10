@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if(!Auth::check() || Auth::user()->mahasiswa()->count() == 0)
                        Login Mahasiswa Baru MOB FT 2018
                    @else
                        Data Mahasiswa
                    @endif
                </div>

                <div class="card-body">
                    @if(!Auth::check() || Auth::user()->mahasiswa()->count() == 0)
					<form method="post" action="{{route('validasi.check')}}">
                        {{csrf_field()}}
						<div class="form-group">
                          	<label class="bmd-label-floating" for="nrp">sNRP Mahasiswa</label>
							<input type="text" class="form-control" id="nrp" name="nrp" onkeypress="return isNumber(event)" required>
						    <small id="nrpHelp" class="form-text text-muted">
						    	Contoh sNRP adalah s160415020 (Digit 1 & 2 adalah kode fakultas, digit 3 & 4 adalah kode jurusan, digit 5 & 6 adalah angkatan, digit 7&8&9 adalah kode unik mahasiswa).
						    </small>
						</div>
                        <div class="row">
                          <div class="col-md-12">
							<div class="form-group">
                              <label class="bmd-label-floating">Password</label>
								<input type="password" class="form-control" id="password" name="password" required>
							    <small id="nrpHelp" class="form-text text-muted">
							    	Password yang digunakan adalah password default dari akun sNRP mahasiswa.
							    </small>
							</div>
                          </div>
                        </div>
                        <div class="form-group">
                        <div class="g-recaptcha" data-sitekey="6Lf_CmgUAAAAAHMc1OriC0HorAANcoQPhQrT8-Sb"></div>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right col-md-12">Submit</button>
                        <div class="clearfix"></div>
                    </form>
                    @else
                    <form method="post" action="#">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">NRP Mahasiswa</label>
                                    <input type="text" class="form-control" disabled value="{!! Auth::user()->NRP !!}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Nama Mahasiswa</label>
                                    <input type="text" class="form-control" disabled value="{!! Auth::user()->Nama !!}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Jurusan</label>
                                    <input type="text" class="form-control" disabled 
                                    value="{!! Auth::user()->jurusan->Nama !!}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            @foreach($uls as $u)
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Nilai {!! $u->Keterangan !!}</label>
                                    <input type="text" class="form-control" disabled 
                                    @if (Auth::user()->mahasiswa->uls()->find($u->Id)['pivot']['Nilai'] == null)
                                    value="-"
                                    @else
                                    value="{!!Auth::user()->mahasiswa->uls()->find($u->Id)['pivot']['Nilai']!!}"
                                    @endif
                                    >
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="row">
                            <div class="col-md-6 text-center">
                                <div class="form-group">
                                    <label class="bmd-label-floating"><h2>Alfa : {!! Auth::user()->mahasiswa->kelompoks()->orderBy('Kelompok')->get()[0]->Kelompok!!}</h2></label>
                                </div>
                            </div>
                            <div class="col-md-6 text-center">
                                <div class="form-group">
                                    <label class="bmd-label-floating"><h2>Beta : {!! Auth::user()->mahasiswa->kelompoks()->orderBy('Kelompok')->get()[1]->Kelompok!!}</h2></label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <img src='{!! asset("img/".Auth::user()->NRP.".png") !!}' style="max-width: 100%;">
                            </div>
                        </div>
                    </form>
                    @endif
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
            if (charCode == 115 || (charCode <= 57 && charCode >= 48))
	            return true;
            return false;
	    }
	</script>

@endsection