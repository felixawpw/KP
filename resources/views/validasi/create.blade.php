@extends('layouts.app')

@section('title')
Validasi Data
@endsection

@section('content')
    <div class="container">
        <form action="{{route('validasi.store')}}" method="post" enctype="multipart/form-data" name="data" role="form">
            {{csrf_field()}}
            <div class="row justify-content-md-center">   
                <div class="col-md-8">          
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel-heading">
                                        <h3 class="text-center">Mohon cek data diri Anda dan mengisi data kelengkapan berikut dengan benar dan cermat.</h3>
                                    </div>
                                    <div class="panel-body">
                                        <p class="text-justify">Apabila terdapat kesalahan pada data diri Anda, <b>JANGAN LANJUTKAN</b> pengisian data ini, segera kontak <b><i>OFFICIAL ACCOUNT</i></b> Masa Orientasi Bersama Fakultas Teknik melalui sosial media yang ada dengan memberitahukan <b>NAMA LENGKAP, NRP, JURUSAN, Kelompok <i>Alpha</i> dan <i>Beta</i> yang BENAR</b>. Kami juga merekomendasikan Anda melakukan <i>screenshot</i> sebagai lampiran. Informasi mengenai <i>Official Account</i> dapat dilihat pada <a href="http://mob.ubaya.ac.id/category/teknik/">Website MOB Ubaya</a> <br><br> Tidak memastikan data diri Anda, dapat berakibat <b>ketidaklulusan diri Anda</b>.</p>
                                        <br>
                                        <div class="form-group">
                                            <label>NRP</label>
                                            <input type="text" class="form-control" disabled value="{!! Auth::user()->NRP !!}">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" disabled value="{!! Auth::user()->Nama !!}">
                                        </div>
                                        <div class="form-group">
                                            <label>Jurusan</label>
                                            <input type="text" class="form-control" disabled value="{!! Auth::user()->jurusan->Nama!!}">
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun</label>
                                            <input type="text" class="form-control" disabled value="{!! Auth::user()->Angkatan !!}">
                                        </div>
                                        <div class="form-group">
                                            <label>Kelompok (Alfa / Beta)</label>
                                            <input type="text" class="form-control" disabled value="{!! $a.' / '.$b!!}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Apakah Anda memiliki penyakit khusus?</label>
                                        <div class="radio" id="fillPenyakitY">
                                            <label>
                                                <input type="radio" name="penyakit" value="Y" id="opt-y">Ya
                                            </label>
                                        </div>
                                        <div class="radio"id="fillPenyakitT">
                                            <label>
                                                <input type="radio" name="penyakit" value="T" checked>Tidak
                                            </label>
                                        </div>
                                        <p class="help-block">Contoh penyakit khusus adalah Asma.</p>
                                        <p id="descr" class="help-block" hidden style="color: red;">* Deskripsi penyakit khusus wajib di-isi apabila Anda memilih memiliki penyakit khusus.</p>
                                    </div>    
                                    <div class="form-group" id="formPenyakit">
                                        <textarea name="penyakit_detail" class="form-control" rows="3" maxlength="500" id="fillPenyakit" disabled></textarea>                               
                                    </div>
                                    <div class="form-group">
                                        <label>Pilihan Bakat dan Minat prioritas pertama :</label>
                                        <select id="minat1" name="minat1" class="form-control" required style="height:4rem;">
                                                <option disabled selected value="">Pilih salah satu!</option>
                                            @foreach($recups as $r)
                                                <option value="{!! $r->Id !!}">{!! $r->Nama !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Pilihan Bakat dan Minat prioritas kedua :</label>
                                        <select id="minat2" name="minat2" class="form-control" required style="height: 4rem;">
                                            <option disabled selected value="">Pilih salah satu!</option>
                                            @foreach($recups as $r)
                                                <option value="{!! $r->Id !!}">{!! $r->Nama !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Upload bukti prestasi pada bidang tersebut (TIDAK WAJIB):</label>
                                        <input type="file" name="prestasi" accept="image/x-png,image/jpeg" id="fileToUpload"><br>
                                        <p class="help-block">File harus berupa gambar dengan format .jpg atau .png dengan ukuran maksimum 5 mb. Pastikan Anda mengunggah (<i>upload</i>) prestasi yang terbaik sesuai minat pertama Anda.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Persetujuan:</label>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="penyangkalan" value="1" required id="penyangkalan"> Dengan mencentang ini, Saya sudah yakin bahwa data yang saya masukan adalah <b>BENAR</b> adanya dan saya sudah memeriksa data diri saya dengan seksama. Segala ketidakbenaran data yang saya masukan merupakan tanggung jawab saya, dan akan berakibat pada <b>kelulusan MOB</b> saya<br>
                                            </label>
                                        </div>
                                    </div>
                                    <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                                    <button type="reset" class="btn btn-default" id="reset">Reset</button>
                                </div>
                            </div>                                            
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
<script type="text/javascript">
    var prevMinat1 = 9;
    var prevMinat2 = 1;
    $('#reset').click(function(){
        $('#fillPenyakit').attr('disabled', true);                
        $('#descr').attr('hidden', true);

    });
    $(document).ready(function(){
        $('input[name="penyakit"]').change(function(){
            if($('#opt-y').prop('checked')){
                $('#fillPenyakit').removeAttr('disabled');
                $('#fillPenyakit').attr('required', true);
                $('#descr').removeAttr('hidden');
            }else{
                $('#fillPenyakit').attr('disabled', true);

                $('#descr').attr('hidden', true);

                $('#fillPenyakit').removeAttr('required');
            }
        });

        $('#minat1').change(function(){
            $("#minat2 option[value='" + prevMinat1 + "']").removeAttr("hidden");
            prevMinat1 = this.value;
            $("#minat2 option[value='" + this.value + "']").attr("hidden", true);
        });
        $('#minat2').change(function(){
            $("#minat1 option[value='" + prevMinat2 + "']").removeAttr("hidden");
            prevMinat2 = this.value;
            $("#minat1 option[value='" + this.value + "']").attr("hidden", true);
        });
    });
</script>
@endsection