@extends('layouts.master')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header card-header-primary">
          <div class="row">
            <div class="col-md-10">
              <h4 class="card-title ">Rata-rata ULS (Kerja : {!! $kerjaULS !!} | {!! round(($kerjaULS / $totalMHS)*100,2) !!}%)</h4>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div id="chart_uls"></div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header card-header-primary">
          <div class="row">
            <div class="col-md-10">
              <h4 class="card-title ">Pelanggar per Pelanggaran</h4>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div id="chart_div"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header card-header-primary">
          <div class="row">
            <div class="col-md-10">
              <h4 class="card-title ">Prosentase Presensi Harian</h4>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div id="chart_presensi"></div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header card-header-primary">
          <div class="row">
            <div class="col-md-10">
              <h4 class="card-title "></h4>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div id="chart_"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $i = 0; ?>
@endsection

@section('scripts')

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

  // Load the Visualization API and the corechart package.
  google.charts.load('current', {'packages':['corechart']});

  // Set a callback to run when the Google Visualization API is loaded.
  google.charts.setOnLoadCallback(drawChartPelanggaran);
  google.charts.setOnLoadCallback(drawChartULS);
  google.charts.setOnLoadCallback(drawChartPresensi);

  // Callback that creates and populates a data table,
  // instantiates the pie chart, passes in the data and
  // draws it.
  function drawChartPelanggaran() {

    // Untuk Tabel Pelanggaran.
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Nama Pelanggaran');
    data.addColumn('number', 'Jumlah');
    data.addRows([
      @foreach ($pelanggarans as $p)
        [ {!! "'$p->Nama',".$p->mahasiswas_count !!} ],
      @endforeach
    ]);

    var options = {'title':'Data pelanggaran',
                   'width':450,
                   'height':300};
    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
    chart.draw(data, options);
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

    var options = {'title':'Data Rata-rata ULS',
                   'width':450,
                   'height':300};
    var chart = new google.visualization.ColumnChart(document.getElementById('chart_uls'));
    chart.draw(data, options);
  }

  function drawChartPresensi()
  {
    var data = new google.visualization.DataTable();
      data.addColumn('number', 'Presensi Harian');
      data.addColumn('number', 'Mahasiswa');

      data.addRows([
        @foreach($ses as $s)
          [ {!! $i++.",".$s['total'] !!} ],
        @endforeach
      ]);

    var options = {'title':'Data Prosentase Presensi Harian',
                   'width':450,
                   'height':300,
      hAxis: {
        title: 'Hari'
      },
      vAxis: {
        title: 'Jumlah'
      },
      backgroundColor: '#f1f8e9'
    };
    var chart = new google.visualization.LineChart(document.getElementById('chart_presensi'));
    chart.draw(data, options);
  }
</script>

@endsection