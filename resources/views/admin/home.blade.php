@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total User</span>
                            <span class="info-box-number">{{ numerify($totalUser) }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-user-check"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Reseller</span>
                            <span class="info-box-number">{{ numerify($totalReseller) }}</span>
                        </div>
                    </div>
                </div>
                <div class="clearfix hidden-md-up"></div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-gradient-success elevation-1"><i class="fas fa-shopping-bag"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Produk terjual</span>
                            <span class="info-box-number">{{ numerify($totalProdukTerjual) }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-gradient-info elevation-1"><i class="fas fa-money-bill"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Saldo</span>
                            <span class="info-box-number">{{ rp(105037000) }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Penjualan bulan ini</h5>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool my-auto" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <p class="text-center">
                                        <strong>Penjualan: {{ now()->startOfMonth()->format('d F Y') }} - {{ now()->endOfMonth()->format('d F Y') }}</strong>
                                    </p>
                                    <div class="chart">
                                        <div class="chartjs-size-monitor">
                                            <div class="chartjs-size-monitor-expand">
                                                <div class=""></div>
                                            </div>
                                            <div class="chartjs-size-monitor-shrink">
                                                <div class=""></div>
                                            </div>
                                        </div>
                                        <canvas id="salesChart" height="180" style="height: 180px; display: block; width: 680px;" width="680" class="chartjs-render-monitor"></canvas>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <p class="text-center"><strong>Target produk terjual</strong></p>
                                    <div class="progress-group">
                                        <span class="progress-text">Khimar</span>
                                        <span class="float-right"><b>100</b>/150</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-primary" style="width: 66%"></div>
                                        </div>
                                    </div>
                                    <div class="progress-group">
                                        <span class="progress-text">Gamis</span>
                                        <span class="float-right"><b>72</b>/100</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-success" style="width: 72%"></div>
                                        </div>
                                    </div>
                                    <div class="progress-group">
                                        <span class="progress-text">Masker</span>
                                        <span class="float-right"><b>144</b>/300</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-info" style="width: 48%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <div class="description-block border-right">
                                        <span class="d-none d-sm-inline description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                                        <h5 class="description-header">{{ rp(12078500) }}</h5>
                                        <span class="description-text">Pemasukan</span>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="description-block border-right">
                                        <span class="d-none d-sm-inline description-percentage text-warning"><i class="fas fa-caret-up"></i> 1%</span>
                                        <h5 class="description-header">{{ rp(5675000) }}</h5>
                                        <span class="description-text">Pengeluaran</span>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="description-block border-right">
                                        <span class="d-none d-sm-inline description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                                        <h5 class="description-header">{{ rp(12078500 - 567500) }}</h5>
                                        <span class="description-text">Profit</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Order masuk terbaru
                            </div>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool my-auto" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0 table-responsive" style="max-height: 200px">
                            <table class="table table-hover table-striped table-borderless">
                                <thead>
                                    <tr>
                                        <th>Order no.</th>
                                        <th>Tgl</th>
                                        <th colspan="2">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < 10; $i++)
                                        <tr>
                                            <td>#{{ Str::random(6) }}</td>
                                            <td>{{ now()->format('Y-m-d H:m') }}</td>
                                            <td>Sedang diproses</td>
                                            <td><a href="#">Detail</a></td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-center justify-content-md-between align-items-center">
                                <span class="d-none d-md-none d-sm-block my-auto text-secondary mr-auto">
                                    Menampilkan 8 dari 155 order
                                </span>
                                <a href="{{ route('admin.orders.index') }}" class="btn btn-primary btn-sm my-auto">
                                    <i class="fas fa-envelope mr-1"></i>
                                    <span>Lihat semua</span>
                                    <span class="badge badge-light ml-1">65</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Link cepat
                            </div>
                            <div class="card-tools">
                                <button class="btn btn-tool" type="button" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button class="btn btn-tool" type="button" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" style="max-height: 200px">
                            <a href="#" class="btn btn-primary btn-sm btn-block text-left">
                                <i class="fas fa-plus mr-1"></i>
                                <span>Buat laporan baru</span>
                            </a>
                            <a href="{{ route('admin.laba_rugi.index') }}" class="btn btn-primary btn-sm btn-block text-left">
                                <i class="fas fa-file-invoice mr-1"></i>
                                <span>Laporan Laba Rugi</span>
                            </a>
                            <a href="{{ route('admin.spendings.index') }}" class="btn btn-primary btn-sm btn-block text-left">
                                <i class="fas fa-file-invoice mr-1"></i>
                                <span>Laporan Pengeluaran</span>
                            </a>
                            <a href="{{ route('admin.order_transactions.index') }}" class="btn btn-primary btn-sm btn-block text-left">
                                <i class="fas fa-file-invoice mr-1"></i>
                                <span>Laporan Pemasukan</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@include('layouts.plugins.chartjs')
@push('scripts')
    <script>
        var salesChartCanvas = $('#salesChart').get(0).getContext('2d')

        var salesChartData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                    label: 'Digital Goods',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [28, 48, 40, 19, 86, 27, 90]
                },
                {
                    label: 'Electronics',
                    backgroundColor: 'rgba(210, 214, 222, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [65, 59, 80, 81, 56, 55, 40]
                }
            ]
        }

        var salesChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false
                    }
                }]
            }
        }
        var salesChart = new Chart(salesChartCanvas, {
            type: 'line',
            data: salesChartData,
            options: salesChartOptions
        });
    </script>
@endpush
