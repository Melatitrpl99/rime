<!DOCTYPE html lang="en">
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ env('APP_NAME') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    @include('layouts.css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Main Header -->
        @include('layouts.header')

        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper h-auto">
            @yield('content')
        </div>

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright © 2014-2021 <a href="http://rimesyari.myskripsi.xyz">Rime Syari</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                AdminLTE 3
            </div>
        </footer>
    </div>
    @include('layouts.js')
</body>

</html>
