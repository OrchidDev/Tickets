<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>سیستم پشتیبانی</title>

    @include('livewire.support.admin.style')
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('livewire.support.admin.navbar')

        @include('livewire.support.admin.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            <div class="content">
                <div class="p-5">
                    @yield('content')
                </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('livewire.support.admin.footer')
    </div>
    @include('livewire.support.admin.javascript')
</body>
</html>
