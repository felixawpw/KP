@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login</div>

                <div class="card-body">
                    @if(!Auth::check() || Auth::user()->panitia()->count() == 0)
                    <form method="post" action="{{route('doLogin')}}" class="">
                        {{csrf_field()}}
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="bmd-label-floating">NRP Panitia</label>
                              <input type="text" class="form-control" name="nrp">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="bmd-label-floating">Password</label>
                              <input type="password" class="form-control" name="password">
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
                                    <label class="bmd-label-floating">NRP Panitia</label>
                                    <input type="text" class="form-control" disabled value="{!! Auth::user()->NRP !!}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Nama Panitia</label>
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
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
