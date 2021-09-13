<!DOCTYPE html lang="en">
<html>

<head>
    <meta charset="UTF-8">
    <title>{{ env('APP_NAME') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    @include('layouts.css')
</head>

<body>
    <div class="wrapper">
        <section class="invoice p-5">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="page-header">
                        Rime Syar'i
                    </h2>
                    <h6>Laporan Laba Rugi</h6>
                    <!-- TODO: ganti range ke variabel yang ditetapkan -->
                    <h6>Periode {{ now()->subMonth(1)->monthName }} - {{ now()->monthName }} {{ now()->format('Y') }}</h6>
                </div>
            </div>

            <div class="row invoice-info mb-3">
                <div class="col-6 invoice-col">
                    Tanggal: {{ now()->format('d/m/Y') }}
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum, natus!</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit voluptates, quidem quas iusto, quasi earum placeat ea laborum fugiat possimus ullam, reprehenderit recusandae nihil quos delectus vero facere tempore. Et mollitia exercitationem beatae facilis illo perspiciatis error, nulla distinctio atque! Excepturi ut recusandae, aspernatur natus, a voluptate harum dolorem pariatur, sed totam ad repellendus tempora aliquam sit accusamus commodi maiores.</p>
                    <p>Pariatur rerum repudiandae aliquam deleniti dolores. Nostrum perspiciatis quas sapiente consequatur ratione nihil aut qui cum quibusdam, facilis voluptate quaerat numquam ad ea? Reiciendis ipsa voluptatibus voluptatum sed doloribus consectetur adipisci eligendi similique ducimus optio quidem illum illo nostrum fugiat, eum obcaecati quae repudiandae voluptas sint. Pariatur asperiores aut dolores cumque minima, odio a culpa, voluptatum laudantium minus nisi debitis?</p>
                </div>
            </div>

            <!-- content -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Keterangan</th>
                                <th>Laba</th>
                                <th>Rugi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="3">
                                    <b>Pendapatan</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="pl-5">Total pendapatan dari penjualan</span>
                                </td>
                                <td>{{ rp($pemasukan) }}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <b>Pengeluaran / Harga pokok penjualan</b>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="pl-5">Total Pengeluaran</span>
                                </td>
                                <td>{{ rp($pengeluaran) }}</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="pl-5">Laba Kotor</span>
                                </td>
                                <td colspan="2">{{ rp($pemasukan - $pengeluaran) }}</td>

                            </tr>
                            <tr><td colspan="3">&nbsp;</td></tr>
                            <tr>
                                <td><b>Pendapatan Bersih</b></td>
                                <td colspan="2"><b>{{ rp($pemasukan - $pengeluaran) }}</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti cupiditate maiores necessitatibus tenetur quaerat eum aperiam velit, impedit ipsa, sequi praesentium odit, iure ullam nobis incidunt quo porro non est? Inventore accusantium quo nesciunt magni praesentium, tempore esse! Atque sapiente, eius accusantium quidem hic neque delectus illo molestias nihil rem.</p>
                </div>
                <div class="col-3 offset-9 text-right">
                    Samarinda, {{ now()->format('d F Y') }}
                </div>
                <div class="col-3 offset-9 py-5">

                </div>
                <div class="col-3 offset-9 text-right">
                    <b>John Doe, S.Pd., M.Pd.</b>
                </div>
            </div>
        </section>
    </div>
</body>

</html>
