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
            labels: ["S", "M", "T", "W", "T", "F", "S"],
            datasets: [{
                label: 'Berita Positif',
                data: [589, 283, 183, 503, 689, 492, 634],
                backgroundColor: 'transparent',
                borderColor: colors[0],
                pointBackgroundColor: colors[0]
            },
            {   
                label: 'Berita Negatif',
                data: [339, 465, 493, 278, 389, 632, 374],
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
                data: [589, 283, 183, 503, 689, 492, 634],
                backgroundColor: 'transparent',
                borderColor: colors[0],
                pointBackgroundColor: colors[0]
            },
            {   
                label: 'Berita Negatif',
                data: [339, 465, 493, 278, 389, 632, 374],
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
            labels: ["S", "M", "T", "W", "T", "F", "S"],
            datasets: [{
                label: 'Berita Positif',
                data: [589, 283, 183, 503, 689, 492, 634],
                backgroundColor: 'transparent',
                borderColor: colors[0],
                pointBackgroundColor: colors[0]
            },
            {   
                label: 'Berita Negatif',
                data: [339, 465, 493, 278, 389, 632, 374],
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