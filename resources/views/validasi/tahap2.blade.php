@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
                <div class="row">
                    <div class="col-md-10">
                      <h4 class="card-title ">Validasi Data Tahap 2</h4>
                      <p class="card-category text-justify">Pengisian form hanya dapat dilakukan 1 kali, oleh sebab itu, berhati-hatilah dalam megisi form.</p>
                    </div>
                </div>
            </div>
            <div class="card-body row">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <form action="{{route('validasi2.store')}}" method="post" enctype="multipart/form-data" name="data" role="form">
                        {{csrf_field()}}

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Organisasi Mahasiswa pilihan 1 :</label>
                                    <select class="form-control" required id="minat1" name="minat1">
                                        <option value="" disabled selected>...</option>
                                        @foreach($ormawas as $o)
                                            <option value="{!! $o->Id!!}">{!! $o->Nama !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Organisasi Mahasiswa pilihan 2 :</label>
                                    <select class="form-control" required id="minat2" name="minat2">
                                        <option value="" disabled selected>...</option>
                                        @foreach($ormawas as $o)
                                            <option value="{!! $o->Id!!}">{!! $o->Nama !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Nomor HP :</label>
                                    <input type="text" name="nomorhp" class="form-control" onkeypress="return isNumber(event)" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Line :</label>
                                    <input type="text" name="idline" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Persetujuan:</label>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="penyangkalan" value="1" required id="penyangkalan"> Dengan mencentang ini, Saya sudah yakin bahwa data yang saya masukan adalah <b>BENAR</b> adanya dan saya sudah memeriksa data diri saya dengan seksama. Segala ketidakbenaran data yang saya masukan merupakan tanggung jawab saya, dan akan berakibat pada <b>kelulusan MOB</b> saya<br>
                                        </label>
                                    </div>
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

    $('#validasi_oho').addClass('active');
</script>

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

<script type="text/javascript">
    var prevMinat1 = 9;
    var prevMinat2 = 1;

    var desc = {!! $ormawas !!}
    $('#reset').click(function(){
        $('#fillPenyakit').attr('hidden', true);                
        $('#descr').attr('hidden', true);

    });
    $(document).ready(function(){
        $('#minat1').change(function(){
            $("#minat2 option[value='" + prevMinat1 + "']").removeAttr("hidden");
            prevMinat1 = this.value;
            $("#minat2 option[value='" + this.value + "']").attr("hidden", true);
            $('#cabang1').html(getDeskripsi(this.value));
        });
        $('#minat2').change(function(){
            $("#minat1 option[value='" + prevMinat2 + "']").removeAttr("hidden");
            prevMinat2 = this.value;
            $("#minat1 option[value='" + this.value + "']").attr("hidden", true);
            $('#cabang2').html(getDeskripsi(this.value));
        });
    });

    function getDeskripsi(id)
    {
        var deskripsi = "";
        desc.forEach(function(entry) {
            if (entry['Id'] == id)
                deskripsi = entry['Deskripsi'];
        });
        return deskripsi;
    }
</script>
@endsection
