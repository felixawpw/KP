@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
                <div class="row">
                    <div class="col-md-10">
                      <h4 class="card-title ">Validasi Data Tahap 1</h4>
                      <p class="card-category"><p class="text-justify">Pengisian form hanya dapat dilakukan 1 kali, oleh sebab itu, berhati-hatilah dalam megisi form.</p>
                    </div>
                </div>
            </div>
            <div class="card-body row">
                <div class="row">
                    <div class="col-md-2">
                            
                    </div>
                    <div class="col-md-8">
                       <h3 class="text-center"> Mohon cek data diri Anda dan mengisi data kelengkapan berikut dengan benar dan cermat.</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                            
                    </div>
                    <div class="col-md-8">
                        <p class="text-justify">Apabila terdapat kesalahan pada data diri Anda, <b>JANGAN LANJUTKAN</b> pengisian data ini, segera kontak <b><i>OFFICIAL ACCOUNT</i></b> Masa Orientasi Bersama Fakultas Teknik melalui sosial media yang ada dengan memberitahukan <b>NAMA LENGKAP, NRP, JURUSAN, Kelompok <i>Alpha</i> dan <i>Beta</i> yang BENAR</b>. Kami juga merekomendasikan Anda melakukan <i>screenshot</i> sebagai lampiran. Informasi mengenai <i>Official Account</i> dapat dilihat pada <a href="http://mob.ubaya.ac.id/category/teknik/">Website MOB Ubaya</a> <br><br> Tidak memastikan data diri Anda, dapat berakibat <b>KETIDAKLULUSAN DIRI ANDA</b>.</p>
                    </div>
                </div>

                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <form action="{{route('validasi1.store')}}" method="post" enctype="multipart/form-data" name="data" role="form">
                        {{csrf_field()}}

                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="bmd-label-floating">NRP</label>
                                <input type="text" class="form-control" disabled value="{!! Auth::user()->NRP !!}">
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
                          <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Jurusan</label>
                                <input type="text" class="form-control" disabled value="{!! Auth::user()->jurusan->Nama!!}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Tahun</label>
                                <input type="text" class="form-control" disabled value="{!! Auth::user()->Angkatan !!}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Kelompok (Alfa / Beta)</label>
                                <input type="text" class="form-control" disabled value="{!! $a.' / '.$b!!}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="text-center"><b>Apabila data diatas sudah benar, Anda dapat mengisi form berikut. Pengisian form hanya dapat dilakukan 1 kali, oleh sebab itu, berhati-hatilah dalam megisi form!</b></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="bmd-label-floating">Apakah Anda memiliki penyakit khusus? (Contoh penyakit khusus adalah Asma.)</label>

                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="penyakit" value="Y" id="opt-y">Ya
                                        <span class="circle">
                                            <span class="check"></span>
                                        </span>
                                    </label>

                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="penyakit" value="T" id="opt-y">Tidak
                                        <span class="circle">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>    
                            </div>
                        </div>
                        <div class="row">                            
                            <div class="col-md-12">
                                <div class="form-group" id="formPenyakit">
                                    <label class="bmd-label-floating"><p id="descr" class="help-block" hidden style="color: red;">* Deskripsi penyakit khusus wajib di-isi apabila Anda memilih memiliki penyakit khusus.</p>
                                    </label>
                                    <textarea name="penyakit_detail" class="form-control" rows="3" maxlength="500" id="fillPenyakit" hidden></textarea>                               
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Pilihan Bakat dan Minat prioritas pertama :</label>
                                    <select id="minat1" name="minat1" class="form-control" required>
                                        <option disabled selected value="">Pilih salah satu!</option>
                                        @foreach($recups as $r)
                                            <option value="{!! $r->Id !!}">{!! $r->Nama !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Jangan lupa membawa barang berikut untuk pilihan pertama :</label>
                                    <textarea class="form-control" rows="4" maxlength="500" id="cabang1" disabled >
                                        
                                    </textarea>                               
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating"><p><b>Catatan :</b> Pilihan kedua tidak boleh sama dengan pilihan pertama<br>Pilihan Bakat dan Minat prioritas kedua:</p></label>
                                    <select id="minat2" name="minat2" class="form-control" required>
                                        <option disabled selected value="">Pilih salah satu!</option>
                                        @foreach($recups as $r)
                                            <option value="{!! $r->Id !!}">{!! $r->Nama !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Jangan lupa membawa barang berikut untuk pilihan kedua :</label>
                                    <textarea class="form-control" rows="4" maxlength="500" id="cabang2" disabled >
                                        
                                    </textarea>                               
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label class="bmd-label-floating">Upload bukti prestasi pada bidang tersebut (TIDAK WAJIB):</label>
                                <p class="help-block">File harus berupa gambar dengan format .jpg atau .png dengan ukuran maksimum 5 mb. Pastikan Anda mengunggah (<i>upload</i>) prestasi yang terbaik sesuai minat pertama Anda.</p>

                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <input type="file" class="form-control" name="prestasi" accept="image/x-png,image/jpeg" id="fileToUpload"><br>
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

    $('#list').addClass('active');
</script>

<script type="text/javascript">
    var prevMinat1 = 9;
    var prevMinat2 = 1;

    var desc = {!! $recups !!}
    $('#reset').click(function(){
        $('#fillPenyakit').attr('hidden', true);                
        $('#descr').attr('hidden', true);

    });
    $(document).ready(function(){
        $('input[name="penyakit"]').change(function(){
            if($('#opt-y').prop('checked')){
                $('#fillPenyakit').removeAttr('hidden');
                $('#fillPenyakit').attr('required', true);
                $('#descr').removeAttr('hidden');
            }else{
                $('#fillPenyakit').attr('hidden', true);

                $('#descr').attr('hidden', true);

                $('#fillPenyakit').removeAttr('required');
            }
        });

        $('#minat1').change(function(){
            $("#minat2 option[value='" + prevMinat1 + "']").removeAttr("hidden");
            prevMinat1 = this.value;
            $("#minat2 option[value='" + this.value + "']").attr("hidden", true);
            $('#cabang1').html(getDeskripsi(this.value));
            if($('#cabang1').html() == "")
                $('#cabang1').html("Tidak ada barang yang perlu dibawa");
        });
        $('#minat2').change(function(){
            $("#minat1 option[value='" + prevMinat2 + "']").removeAttr("hidden");
            prevMinat2 = this.value;
            $("#minat1 option[value='" + this.value + "']").attr("hidden", true);
            $('#cabang2').html(getDeskripsi(this.value));
            if($('#cabang2').html() == "")
                $('#cabang2').html("Tidak ada barang yang perlu dibawa");
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
