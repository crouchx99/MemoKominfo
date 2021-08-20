@extends('layouts.admin')
@section('content')
<style>
    body {
        height: 100%;
        background-color: #F3F8FF;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }
</style>

<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <h5>Kategori</h5>
                        <div class="dropdown">
                            <select class="form-control input-sm" id="kategori_berita" name="kategori_berita" style="background-color: #F3F8FF">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div>
                    <input type="date" name="tanggal" id="tanggal">
                </div>
            </div>
            <div class="col-lg-7">
                <div>
                    <h3 class="font-weight-bold" id="date"></h3>
                </div><br>
                <div>
                    <h5 class="text-left font-weight-300">Grafik Hari Ini 
                        <span class="float-right fs-2"><a href="{{ route('user.rekapitulasi.index')}}/view">Lihat detail</a></span></h5>
                </div>
                <div class="card">
                    <div class="card-body">                        
                        <canvas id="chLine" width="50px " height="13px"></canvas>
                    </div>
                </div>
                <div>
                    <h5 class="text-left font-weight-300">Grafik Minggu Ini
                </div>
                <div class="card">
                    <div class="card-body">                        
                        <canvas id="chLine1" width="50px " height="13px"></canvas>
                    </div>
                </div>
                <div>
                    <h5 class="text-left font-weight-300">Grafik Bulan Ini
                </div>
                <div class="card">
                    <div class="card-body">                        
                        <canvas id="chLine2" width="50px " height="13px"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
    var dt = new Date();
    const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
    document.getElementById("date").innerHTML = (days[dt.getDay()]) +","+ "  "+ (("0"+dt.getDate()).slice(-2)) +"."+ (("0"+(dt.getMonth()+1)).slice(-2)) +"."+ (dt.getFullYear());
</script>

<script>
    var colors = ['#007bff','#28a745','#333333','#c3e6cb','#dc3545','#6c757d'];
    var chartData = {
            labels: ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24"],
            datasets: [{
                label: 'Berita Positif',
                data: [{{$harian_positif[0]}}, {{$harian_positif[1]}}, {{$harian_positif[2]}}, {{$harian_positif[3]}}, {{$harian_positif[4]}}, {{$harian_positif[5]}}, {{$harian_positif[6]}}, {{$harian_positif[7]}}, {{$harian_positif[8]}}, {{$harian_positif[9]}}, {{$harian_positif[10]}}, {{$harian_positif[11]}}, {{$harian_positif[12]}}, {{$harian_positif[13]}},{{$harian_positif[14]}}, {{$harian_positif[15]}}, {{$harian_positif[16]}}, {{$harian_positif[17]}}, {{$harian_positif[18]}}, {{$harian_positif[19]}}, {{$harian_positif[20]}},{{$harian_positif[21]}}, {{$harian_positif[22]}}, {{$harian_positif[23]}}],
                backgroundColor: 'transparent',
                borderColor: colors[0],
                pointBackgroundColor: colors[0]
            },
            {   
                label: 'Berita Negatif',
                data: [{{$harian_negatif[0]}}, {{$harian_negatif[1]}}, {{$harian_negatif[2]}}, {{$harian_negatif[3]}}, {{$harian_negatif[4]}}, {{$harian_negatif[5]}}, {{$harian_negatif[6]}}, {{$harian_negatif[7]}}, {{$harian_negatif[8]}}, {{$harian_negatif[9]}}, {{$harian_negatif[10]}}, {{$harian_negatif[11]}}, {{$harian_negatif[12]}}, {{$harian_negatif[13]}},{{$harian_negatif[14]}}, {{$harian_negatif[15]}}, {{$harian_negatif[16]}}, {{$harian_negatif[17]}}, {{$harian_negatif[18]}}, {{$harian_negatif[19]}}, {{$harian_negatif[20]}},{{$harian_negatif[21]}}, {{$harian_negatif[22]}}, {{$harian_negatif[23]}}],
                backgroundColor: 'transparent',
                borderColor: colors[2],
                pointBackgroundColor: colors[2]
            }]
    };
    var chLine = document.getElementById("chLine");
    if (chLine) {
        new Chart(chLine, {
        type: 'line',
        data: chartData,
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: false
                    }
                }]
            },
            legend: {
                display: true,
                position:'bottom'
            }
        }
        });
    }
</script>
<script>
    var colors = ['#007bff','#28a745','#333333','#c3e6cb','#dc3545','#6c757d'];
    var chartData = {
            labels: ["S", "M", "T", "W", "T", "F", "S"],
            datasets: [{
                label: 'Berita Positif',
                data: [{{$mingguan_positif[0]}}, {{$mingguan_positif[1]}}, {{$mingguan_positif[2]}}, {{$mingguan_positif[3]}}, {{$mingguan_positif[4]}}, {{$mingguan_positif[5]}}, {{$mingguan_positif[6]}}],
                backgroundColor: 'transparent',
                borderColor: colors[0],
                pointBackgroundColor: colors[0]
            },
            {   
                label: 'Berita Negatif',
                data: [{{$mingguan_negatif[0]}}, {{$mingguan_negatif[1]}}, {{$mingguan_negatif[2]}}, {{$mingguan_negatif[3]}}, {{$mingguan_negatif[4]}}, {{$mingguan_negatif[5]}}, {{$mingguan_negatif[6]}}],
                backgroundColor: 'transparent',
                borderColor: colors[2],
                pointBackgroundColor: colors[2]
            }]
    };
    var chLine = document.getElementById("chLine1");
    if (chLine1) {
        new Chart(chLine1, {
        type: 'line',
        data: chartData,
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: false
                    }
                }]
            },
            legend: {
                display: true,
                position:'bottom'
            }
        }
        });
    }
</script>

<script>
    var colors = ['#007bff','#28a745','#333333','#c3e6cb','#dc3545','#6c757d'];
    var chartData = {
            labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
            datasets: [{
                label: 'Berita Positif',
                data: [{{$bulanan_positif[0]}}, {{$bulanan_positif[1]}}, {{$bulanan_positif[2]}}, {{$bulanan_positif[3]}}, {{$bulanan_positif[4]}}, {{$bulanan_positif[5]}}, {{$bulanan_positif[6]}}, {{$bulanan_positif[7]}}, {{$bulanan_positif[8]}}, {{$bulanan_positif[9]}}, {{$bulanan_positif[10]}}, {{$bulanan_positif[11]}}],
                backgroundColor: 'transparent',
                borderColor: colors[0],
                pointBackgroundColor: colors[0]
            },
            {   
                label: 'Berita Negatif',
                data: [{{$bulanan_negatif[0]}}, {{$bulanan_negatif[1]}}, {{$bulanan_negatif[2]}}, {{$bulanan_negatif[3]}}, {{$bulanan_negatif[4]}}, {{$bulanan_negatif[5]}}, {{$bulanan_negatif[6]}}, {{$bulanan_negatif[7]}}, {{$bulanan_negatif[8]}}, {{$bulanan_negatif[9]}}, {{$bulanan_negatif[10]}}, {{$bulanan_negatif[11]}}],
                backgroundColor: 'transparent',
                borderColor: colors[2],
                pointBackgroundColor: colors[2]
            }]
    };
    var chLine = document.getElementById("chLine2");
    if (chLine2) {
        new Chart(chLine2, {
        type: 'line',
        data: chartData,
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: false
                    }
                }]
            },
            legend: {
                display: true,
                position:'bottom'
            }
        }
        });
    }
</script>
@endsection