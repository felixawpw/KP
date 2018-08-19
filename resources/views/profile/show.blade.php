@extends('layouts.master')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-icon card-header-rose">
          <div class="card-icon">
            <i class="material-icons">perm_identity</i>
          </div>
          <h4 class="card-title">Data Diri -
            <small class="category">Pastikan data berikut sudah benar!</small>
          </h4>
        </div>
        <div class="card-body">
          <form>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="bmd-label-floating">NRP</label>
                  <input type="text" class="form-control" disabled value="{!! Auth::user()->NRP !!}">
                </div>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <label class="bmd-label-floating">Email address</label>
                  <input type="email" class="form-control" disabled value="s{!! Auth::user()->NRP !!}@student.ubaya.ac.id">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="bmd-label-floating">Nama Lengkap</label>
                  <input type="text" class="form-control" disabled value="{!! Auth::user()->Nama !!}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="bmd-label-floating">Fakultas</label>
                  <input type="text" class="form-control" disabled value="{!! Auth::user()->jurusan->fakultas->Nama !!}">
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <label class="bmd-label-floating">Jurusan</label>
                  <input type="text" class="form-control" disabled value="{!! Auth::user()->jurusan->Nama !!}">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label class="bmd-label-floating">Angkatan</label>
                  <input type="text" class="form-control" disabled value="{!! Auth::user()->Angkatan !!}">
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
          </form>
        </div>
      </div>
    </div>
  </div>

  @if(Auth::user()->mahasiswa != null || Auth::user()->mahasiswa != "")
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-icon card-header-rose">
          <div class="card-icon">
            <i class="material-icons">perm_identity</i>
          </div>
          <h4 class="card-title">Data Kepanitiaan -
            <small class="category">Berikut data anda dalam kepanitiaan MOB.</small>
          </h4>
        </div>
        <div class="card-body">
          <form>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="bmd-label-floating">NRP</label>
                  <input type="text" class="form-control" disabled value="{!! Auth::user()->NRP !!}">
                </div>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <label class="bmd-label-floating">Email address</label>
                  <input type="email" class="form-control" disabled value="s{!! Auth::user()->NRP !!}@student.ubaya.ac.id">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="bmd-label-floating">Nama Lengkap</label>
                  <input type="text" class="form-control" disabled value="{!! Auth::user()->Nama !!}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="bmd-label-floating">Fakultas</label>
                  <input type="text" class="form-control" disabled value="{!! Auth::user()->jurusan->fakultas->Nama !!}">
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <label class="bmd-label-floating">Jurusan</label>
                  <input type="text" class="form-control" disabled value="{!! Auth::user()->jurusan->Nama !!}">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label class="bmd-label-floating">Angkatan</label>
                  <input type="text" class="form-control" disabled value="{!! Auth::user()->Angkatan !!}">
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endif
</div>
@endsection
