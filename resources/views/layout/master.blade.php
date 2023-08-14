<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{$title ?? ''}} - {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{asset('css/icons.min.css')}}" rel="stylesheet" type="text/css">
{{--    <link href="{{asset('css/app-creative.min.css')}}" rel="stylesheet" type="text/css" id="light-style">--}}
    <link href="{{asset('css/app-creative-dark.min.css')}}" rel="stylesheet" type="text/css">
    @stack('css')
</head>

<body class="" data-layout-config="{&quot;leftSideBarTheme&quot;:&quot;dark&quot;,&quot;layoutBoxed&quot;:false, &quot;leftSidebarCondensed&quot;:false, &quot;leftSidebarScrollable&quot;:false,&quot;darkMode&quot;:false, &quot;showRightSidebarOnStart&quot;: true}" data-leftbar-theme="dark">

<div class="wrapper mm-active">

    <!-- LeftBar Start -->
    @include('layout.sidebar')
    <!-- LeftBar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">
            <!-- TopBar Start -->
            @include('layout.topbar')
            <!-- end TopBar -->

            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h2 class="page-title font-22">{{$title ?? ''}}</h2>
                        </div>
                    </div>
                </div>
            @yield('content')
            </div>
            <!-- End Content -->

        </div>

        <!-- Footer Start -->
        @include('layout.footer')
        <!-- Footer End-->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- Right Sidebar -->
<!-- /Right-bar -->

<!-- bundle -->
<script src="{{asset('js/vendor.min.js')}}"></script>
<script src="{{asset('js/app.min.js')}}"></script>
<script src="{{asset('js/helper.js')}}"></script>

@stack('js')

</body>
</html>