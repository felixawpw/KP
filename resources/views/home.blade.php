@extends('layouts.master')

@section('content')
@if(!Auth::check() || Auth::user()->panitia()->count() == 0)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login</div>

                <div class="card-body">
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
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card text-center">
        <div class="card-header card-header-primary">
          <div class="row">
            <div class="col-md-12">
              <h4 class="card-title ">Rata-rata Nilai ULS (Kerja : {!! $kerjaULS !!} | {!! round(($kerjaULS / $totalMHS)*100,2) !!}%)</h4>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="wizard-container">
              <div class="wizard-navigation">
                <ul class="nav nav-pills">
                  <li class="nav-item">
                    <a class="nav-link active" onclick="" href="#uls" data-toggle="tab" role="tab">
                      Rata-Rata
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#uls_prosentase" data-toggle="tab" role="tab">
                      Prosentase ULS
                    </a>
                  </li>
                </ul>
              </div>
              <div class="tab-content">
                <div class="tab-pane active" id="uls">
                  <div id="chart_uls"></div>
                </div>
                <div class="tab-pane active" id="uls_prosentase">
                  <div id="chart_uls1"></div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card text-center">
        <div class="card-header card-header-primary">
          <div class="row">
            <div class="col-md-12">
              <h4 class="card-title ">Pelanggar per Pelanggaran</h4>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="wizard-container">
              <div class="wizard-navigation">
                  <ul class="nav nav-pills">
                    <li class="nav-item">
                      <a class="nav-link active" onclick="" href="#pelanggar_total" data-toggle="tab" role="tab">
                        Total
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#pelanggar_d1" data-toggle="tab" role="tab">
                        Day 1
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#pelanggar_d2" data-toggle="tab" role="tab">
                        Day 2
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#pelanggar_d3" data-toggle="tab" role="tab">
                        Day 3
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#pelanggar_d4" data-toggle="tab" role="tab">
                        RC1
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#pelanggar_d5" data-toggle="tab" role="tab">
                        RC2
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#pelanggar_d6" data-toggle="tab" role="tab">
                        RC3
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#pelanggar_d7" data-toggle="tab" role="tab">
                        RC4
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#pelanggar_rekap" data-toggle="tab" role="tab">
                        Statistik Pelanggar Harian
                      </a>
                    </li>
                  </ul>
              </div>
              <div class="tab-content">
                <div class="tab-pane active" id="pelanggar_total">
                  <div id="chart_pelanggar"></div>
                </div>
                <div class="tab-pane" id="pelanggar_d1">
                  <div id="chart_pelanggar_d1"></div>
                </div>
                <div class="tab-pane" id="pelanggar_d2">
                  <div id="chart_pelanggar_d2"></div>
                </div>
                <div class="tab-pane" id="pelanggar_d3">
                  <div id="chart_pelanggar_d3"></div>
                </div>
                <div class="tab-pane" id="pelanggar_d4">
                  <div id="chart_pelanggar_d4"></div>
                </div>
                <div class="tab-pane" id="pelanggar_d5">
                  <div id="chart_pelanggar_d5"></div>
                </div>
                <div class="tab-pane" id="pelanggar_d6">
                  <div id="chart_pelanggar_d6"></div>
                </div>
                <div class="tab-pane" id="pelanggar_d7">
                  <div id="chart_pelanggar_d7"></div>
                </div>
                <div class="tab-pane active" id="pelanggar_rekap">
                  <div id="chart_pelanggar_rekap"></div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Prosentase Presensi Harian -->
  <div class="row">
    <div class="col-md-12">
      <div class="card text-center">
        <div class="card-header card-header-primary">
          <div class="row">
            <div class="col-md-12">
              <h4 class="card-title ">Prosentase Presensi Harian</h4>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div id="chart_presensi"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- Open House Ormawa -->
  <div class="row">
    <div class="col-md-12">
      <div class="card text-center">
        <div class="card-header card-header-primary">
          <div class="row">
            <div class="col-md-12">
                <h4 class="card-title ">
                    Open House Ormawa
                </h4>
            </div>
          </div>
        </div>
        <div class="card-body">
            <div class="wizard-container">
                <div class="wizard-navigation">
                    <ul class="nav nav-pills">
                      <li class="nav-item">
                        <a class="nav-link active" onclick="" href="#oho_total" data-toggle="tab" role="tab">
                          Total
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#oho_p1" data-toggle="tab" role="tab">
                          Prioritas 1
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#oho_p2" data-toggle="tab" role="tab">
                          Prioritas 2
                        </a>
                      </li>
                    </ul>
                </div>
                <div class="tab-content">
                  <div class="tab-pane active" id="oho_total">
                    <div id="chart_oho"></div>
                  </div>
                  <div class="tab-pane active" id="oho_p1">
                    <div id="chart_oho1"></div>
                  </div>
                  <div class="tab-pane active" id="oho_p2">
                    <div id="chart_oho2"></div>
                  </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Barang Bawaan Harian -->
  <div class="row">
    <div class="col-md-12">
      <div class="card text-center">
        <div class="card-header card-header-primary">
          <div class="row">
            <div class="col-md-12">
              <h4 class="card-title ">Barang Bawaan Harian</h4>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div id="chart_barangbawaan"></div>
        </div>
      </div>
    </div>
  </div>

  <!-- Rektor Cup-->
  <div class="row">
    <div class="col-md-12">
      <div class="card text-center">
        <div class="card-header card-header-primary">
          <div class="row">
            <div class="col-md-12">
                <h4 class="card-title ">
                    Rektor Cup
                </h4>
            </div>
          </div>
        </div>
        <div class="card-body">
            <div class="wizard-container">
                <div class="wizard-navigation">
                    <ul class="nav nav-pills">
                      <li class="nav-item">
                        <a class="nav-link active" onclick="" href="#recup_total" data-toggle="tab" role="tab">
                          Total
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#recup_p1" data-toggle="tab" role="tab">
                          Prioritas 1
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#recup_p2" data-toggle="tab" role="tab">
                          Prioritas 2
                        </a>
                      </li>
                    </ul>
                </div>
                <div class="tab-content">
                  <div class="tab-pane active" id="recup_total">
                    <div id="chart_recup"></div>
                  </div>
                  <div class="tab-pane active" id="recup_p1">
                    <div id="chart_recup1"></div>
                  </div>
                  <div class="tab-pane active" id="recup_p2">
                    <div id="chart_recup2"></div>
                  </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $i = 0; ?>
@endif
@endsection

@section('scripts')
<script type="text/javascript">
  $('#dashboard').addClass('active');
</script>

@if(Auth::check() && Auth::user()->panitia()->count() > 0)
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

  // Load the Visualization API and the corechart package.
  google.charts.load('current', {'packages':['corechart', 'table']});

  // Set a callback to run when the Google Visualization API is loaded.
  google.charts.setOnLoadCallback(drawChartPelanggaran);
  google.charts.setOnLoadCallback(drawChartULS);
  google.charts.setOnLoadCallback(drawChartPresensi);
  google.charts.setOnLoadCallback(drawChartOHO);
  google.charts.setOnLoadCallback(drawChartBawaan);
  google.charts.setOnLoadCallback(drawChartRecup);

  // Callback that creates and populates a data table,
  // instantiates the pie chart, passes in the data and
  // draws it.
  function drawChartPelanggaran() {
    // Untuk Tabel Pelanggaran.
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Nama Pelanggaran');
    data.addColumn('number', 'Jumlah Pelanggar');
    data.addColumn('number', 'Prosentase (%)');
    <?php $pelTotal = 0; ?>
    @foreach ($pelanggarans as $p)
      @php
        $pelTotal += $p->mahasiswas_count;
      @endphp
    @endforeach

    data.addRows([
      @foreach ($pelanggarans as $p)
        <?php $tempPercent = round($p->mahasiswas_count / $pelTotal * 100, 2); ?>
        [ {!! "'$p->Nama',".$p->mahasiswas_count.",$tempPercent" !!} ],
      @endforeach
    ]);

    var options = {'title':'Data pelanggaran',
                   'width':'100%',
                   'height':400};
    var chart = new google.visualization.Table(document.getElementById('chart_pelanggar'));
    chart.draw(data, options);
    @php
      $iP = 1;
    @endphp

    //Data pelanggaran setiap harinya
    @foreach($pelanggaranByDay as $pBD)
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Nama Pelanggaran');
        data.addColumn('number', 'Jumlah Pelanggar');
        data.addColumn('number', 'Prosentase (%)');
        <?php $pelTotal = 0; ?>

        data.addRows([
          @foreach ($pBD as $p)
          <?php $tempPercent = round($p->total / $pBD->sum('total') * 100, 2); ?>            
          [ {!! "'".$p->pelanggaran->Nama."',".$p->total.",$tempPercent" !!} ],
          @endforeach
        ]);

        var options = {'title':'Data pelanggaran',
                       'width':'100%',
                       'height':400};
        var chart = new google.visualization.Table(document.getElementById('chart_pelanggar_d{!! $iP !!}'));
        chart.draw(data, options);
      @php
        $iP++;
      @endphp
    @endforeach


    //Data Rekap Harian Pelanggaran

    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Hari');
    data.addColumn('number', 'Jumlah');
    @php
      $iP = 1;
    @endphp
    data.addRows([
      @foreach ($pelanggaranByDay as $pBD)
        [ {!! "'Day $iP',".$pBD->sum('total') !!} ],
        <?php $iP++; ?>
      @endforeach
    ]);

    var options = {'title':'Jumlah Pelanggar Perhari',
                   'width':'100%',
                   'height':400};
    var chart = new google.visualization.ColumnChart(document.getElementById('chart_pelanggar_rekap'));
    chart.draw(data, options);
    $('#pelanggar_rekap').removeClass('active');
  }

  function drawChartULS() {
    // Untuk Tabel Pelanggaran.
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Nama Sesi');
    data.addColumn('number', 'Rata-rata');
    data.addRows([
      @foreach ($uls as $u)
        [ {!! "'$u->Keterangan',".$u->rata !!} ],
      @endforeach
    ]);

    var data1 = new google.visualization.DataTable();
    data1.addColumn('string', 'Nama Sesi');
    data1.addColumn('number', 'Prosentase Kerja ULS (%)');
    data1.addRows([
      @foreach ($uls as $u)
        [ {!! "'$u->Keterangan',".$u->prosentaseKerja !!} ],
      @endforeach
    ]);


    var options = {'title':'Rata-rata Nilai ULS',
                   'width':'100%',
                   'height':400};
    var chart = new google.visualization.ColumnChart(document.getElementById('chart_uls'));
    chart.draw(data, options);

    var options1 = {'title':'Prosentase Mahasiswa Kerja ULS',
                   'width':'100%',
                   'height':400};
    var chart1 = new google.visualization.ColumnChart(document.getElementById('chart_uls1'));
    chart1.draw(data1, options1);
    $('#uls_prosentase').removeClass('active');
  }

  function drawChartPresensi() {
    // Untuk Tabel Pelanggaran.
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Presensi Hari Ke');
    data.addColumn('number', 'Mahasiswa');
    data.addColumn('string', 'Prosentase');
    
    data.addRows([
    @foreach($ses as $s)
        <?php $pr = round($s['total'] / $totalMHS * 100, 2); ?>
      [ {!! "'Day ".$i++."'".",".$s['total'].","."'$pr%'" !!} ],
    @endforeach
    ]);

    var options = {'title':'Data Presensi Harian',
                   'width':'100%',
                   'height':400};
    var chart = new google.visualization.Table(document.getElementById('chart_presensi'));
    chart.draw(data, options);
  }

  function drawChartOHO() {
        // Untuk Tabel Pelanggaran.
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Nama Ormawa');
    data.addColumn('number', 'Jumlah');
    data.addRows([
      @foreach ($ormawas->sortByDesc('total') as $o)
        [ {!! "'$o->Nama',".$o->total !!} ],
      @endforeach
    ]);

    var data1 = new google.visualization.DataTable();
    data1.addColumn('string', 'Nama Ormawa');
    data1.addColumn('number', 'Jumlah');
    data1.addRows([
      @foreach ($ormawas->sortByDesc('p1') as $o)
        [ {!! "'$o->Nama',".$o->p1 !!} ],
      @endforeach
    ]);

    var data2 = new google.visualization.DataTable();
    data2.addColumn('string', 'Nama Ormawa');
    data2.addColumn('number', 'Jumlah');
    data2.addRows([
      @foreach ($ormawas->sortByDesc('p2') as $o)
        [ {!! "'$o->Nama',".$o->p2 !!} ],
      @endforeach
    ]);

    var options = {'title':'Data OHO Total',
                   'width':'100%',
                   'height':400};
    var options1 = {'title':'Data OHO Prioritas 1',
                   'width':'100%',
                   'height':400};
    var options2 = {'title':'Data OHO Prioritas 2',
                   'width':'100%',
                   'height':400};

    var chart = new google.visualization.PieChart(document.getElementById('chart_oho'));
    chart.draw(data, options);

    var chart1 = new google.visualization.PieChart(document.getElementById('chart_oho1'));
    chart1.draw(data1, options1);
    $('#oho_p1').removeClass('active');

    var chart2 = new google.visualization.PieChart(document.getElementById('chart_oho2'));
    chart2.draw(data2, options2);
    $('#oho_p2').removeClass('active');

  }

  function drawChartBawaan() {
    // Untuk Tabel Barang bawaan.
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Barang Bawaan');
    data.addColumn('number', 'Jumlah Tidak Bawa');
    data.addColumn('number', 'Prosentase (%)');

    data.addRows([
      @foreach ($bawaans as $p)
        <?php $tempPercent = round($p->mahasiswas_count / $totalMHS * 100, 2); ?>
        [ {!! "'$p->Nama',".$p->mahasiswas_count.",$tempPercent" !!} ],
      @endforeach
    ]);

    var options = {'title':'Data pelanggaran',
                   'width':'100%',
                   'height':400};
    var chart = new google.visualization.Table(document.getElementById('chart_barangbawaan'));
    chart.draw(data, options);
  }

  function drawChartRecup() {
        // Untuk Tabel Pelanggaran.

    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Nama Cabang Rektor Cup');
    data.addColumn('number', 'Jumlah');
    data.addRows([
      @foreach ($recups->sortByDesc('total') as $o)
        [ {!! "'$o->Nama',".$o->total !!} ],
      @endforeach
    ]);

    var data1 = new google.visualization.DataTable();
    data1.addColumn('string', 'Nama Cabang Rektor Cup');
    data1.addColumn('number', 'Jumlah');
    data1.addRows([
      @foreach ($recups->sortByDesc('p1') as $o)
        [ {!! "'$o->Nama',".$o->p1 !!} ],
      @endforeach
    ]);

    var data2 = new google.visualization.DataTable();
    data2.addColumn('string', 'Nama Cabang Rektor Cup');
    data2.addColumn('number', 'Jumlah');
    data2.addRows([
      @foreach ($recups->sortByDesc('p2') as $o)
        [ {!! "'$o->Nama',".$o->p2 !!} ],
      @endforeach
    ]);

    var options = {'title':'Data Recup Total',
                   'width':'100%',
                   'height':400};
    var options1 = {'title':'Data Recup Prioritas 1',
                   'width':'100%',
                   'height':400};
    var options2 = {'title':'Data Recup Prioritas 2',
                   'width':'100%',
                   'height':400};

    var chart = new google.visualization.PieChart(document.getElementById('chart_recup'));
    chart.draw(data, options);

    var chart1 = new google.visualization.PieChart(document.getElementById('chart_recup1'));
    chart1.draw(data1, options1);
    $('#recup_p1').removeClass('active');

    var chart2 = new google.visualization.PieChart(document.getElementById('chart_recup2'));
    chart2.draw(data2, options2);
    $('#recup_p2').removeClass('active');
  }

</script>
@endif
@endsection
