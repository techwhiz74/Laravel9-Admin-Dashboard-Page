@include('dashboard.common.header')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('dashboard.common.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                @include('dashboard.common.topBar', ['data' => $data])
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('content')
                    @include('dashboard.common.footer')
