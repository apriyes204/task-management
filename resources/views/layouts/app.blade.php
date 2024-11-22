<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

<head>
    <meta charset="utf-8">

    <title>
        Task Management
    </title><!--begin::Primary Meta Tags-->

    <link rel="icon" type="{{url('backend\assets\img\logo.png')}}" href="logo.png">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Task Management ">
    <meta name="author" content="apriyes">
    <meta name="description" content="Task Management with Laravel.">
    <meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, laravel, admin dashboard"><!--end::Primary Meta Tags--><!--begin::Fonts-->
    @include('includes.style')
</head> <!--end::Head--> <!--begin::Body-->

    <body class="layout-fixed sidebar-expand-lg bg-body-tertiary"> <!--begin::App Wrapper-->
        <div class="app-wrapper"> <!--begin::Header-->
            @include('includes.navbar')
            <main class="app-main"> <!--begin::App Content Header-->
                @yield('content') <!--end::App Content-->
            </main> <!--end::App Main--> <!--begin::Footer-->
            @include('includes.footer') <!--end::Footer-->
        </div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->

        @include('includes.script')
        <!--end::Script-->
    </body><!--end::Body-->
</html>
