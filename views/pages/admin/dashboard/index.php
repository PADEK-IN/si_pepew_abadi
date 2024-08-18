<div class="container">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Dashboard</h3>
                    <h6 class="op-7 mb-2">Hi, <?= $_SESSION['nama'] ?>. Senang melihat anda, semoga hari anda menyenangkan 😊.</h6>
                </div>
                <!-- <div class="ms-md-auto py-2 py-md-0">
                    <a href="#" class="btn btn-label-info btn-round me-2">Manage</a>
                    <a href="#" class="btn btn-primary btn-round">Add Customer</a>
                </div> -->
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-primary bubble-shadow-small">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Pelanggan</p>
                                        <h4 class="card-title">
                                            <?= $totalPelanggan ?>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- total admin -->
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-info bubble-shadow-small">
                                        <i class="fas fa-user-check"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Admin</p>
                                        <h4 class="card-title">
                                            <?= $totalAdmin ?>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- total income -->
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-success bubble-shadow-small">
                                        <i class="fas fa-luggage-cart"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Penjualan</p>
                                        <h4 class="card-title">
                                            Rp. <?= number_format($totalPembayaranLunas, 0, ',', '.') ?>    
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- total transasksi -->
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                        <i class="far fa-check-circle"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Transaksi</p>
                                        <h4 class="card-title">
                                            <?= $totalTransaksi ?>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card card-round">
                  <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Penjualan Statistics</div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="chart-container" style="min-height: 375px">
                      <canvas id="statisticsChart"></canvas>
                    </div>
                    <div id="myChartLegend"></div>
                  </div>
                </div>
              </div>
            </div>


        </div>
    </div>

<!-- Chart JS -->
<script src="/assets/admin/js/plugin/chart.js/chart.min.js"></script>

<script src="/assets/admin/js/plugin/chart.js/chart.min.js"></script>

<script>
    // Ambil data penjualan per bulan dari PHP
    let penjualanPerBulan = <?php echo json_encode($penjualanPerBulan); ?>;
    
    // Inisialisasi array data untuk penjualan per bulan
    let penjualanData = new Array(12).fill(0);

    // Loop melalui data penjualan dan masukkan ke array berdasarkan bulan
    penjualanPerBulan.forEach(function(item) {
        // Bulan pada database dimulai dari 1 (Januari), jadi kurangi 1 untuk indeks array
        penjualanData[item.bulan - 1] = item.total;
    });

    let ctx = document.getElementById('statisticsChart').getContext('2d');

    let statisticsChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Penjualan",
                borderColor: '#177dff',
                pointBackgroundColor: 'rgba(23, 125, 255, 0.6)',
                pointRadius: 0,
                backgroundColor: 'rgba(23, 125, 255, 0.4)',
                legendColor: '#177dff',
                fill: true,
                borderWidth: 2,
                data: penjualanData  // Gunakan data dari PHP
            }]
        },
        options: {
            responsive: true, 
            maintainAspectRatio: false,
            legend: {
                display: false
            },
            tooltips: {
                bodySpacing: 4,
                mode: "nearest",
                intersect: 0,
                position: "nearest",
                xPadding: 10,
                yPadding: 10,
                caretPadding: 10
            },
            layout: {
                padding: {left: 5, right: 5, top: 15, bottom: 15}
            },
            scales: {
                yAxes: [{
                    ticks: {
                        fontStyle: "500",
                        beginAtZero: true,
                        maxTicksLimit: 5,
                        padding: 10
                    },
                    gridLines: {
                        drawTicks: false,
                        display: false
                    }
                }],
                xAxes: [{
                    gridLines: {
                        zeroLineColor: "transparent"
                    },
                    ticks: {
                        padding: 10,
                        fontStyle: "500"
                    }
                }]
            },
            legendCallback: function(chart) { 
                let text = []; 
                text.push('<ul class="' + chart.id + '-legend html-legend">'); 
                for (var i = 0; i < chart.data.datasets.length; i++) { 
                    text.push('<li><span style="background-color:' + chart.data.datasets[i].legendColor + '"></span>'); 
                    if (chart.data.datasets[i].label) { 
                        text.push(chart.data.datasets[i].label); 
                    } 
                    text.push('</li>'); 
                } 
                text.push('</ul>'); 
                return text.join(''); 
            }  
        }
    });

    let myLegendContainer = document.getElementById("myChartLegend");

    // generate HTML legend
    myLegendContainer.innerHTML = statisticsChart.generateLegend();
</script>


