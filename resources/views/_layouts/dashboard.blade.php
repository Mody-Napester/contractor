<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="{{ url('assets/images/favicon.ico') }}">

        <title>{{ config('app.name') }} @yield('title')</title>

        @yield('pre_css')

        <!--Morris Chart CSS -->
        <link href="{{ url('assets/plugins/morris/morris.css') }}" rel="stylesheet">
        <link href="{{ url('assets/plugins/bootstrap-sweetalert/sweet-alert.css') }}" rel="stylesheet" type="text/css">

        <!-- DataTables -->
        <link href="{{ url('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="{{ url('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Multi Item Selection examples -->
        <link href="{{ url('assets/plugins/datatables/select.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ url('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/css/alerts.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />

        <script src="{{ url('assets/js/modernizr.min.js') }}"></script>
        <script src="{{ url('assets/ckeditor/ckeditor.js') }}"></script>

        @yield('head')

        @if(lang() == 'ar')
            <link href="https://fonts.googleapis.com/css?family=Tajawal:400,500,700,800&display=swap" rel="stylesheet">

            <style>
                body,.wm-contact-tab .nav-tabs li a,body h1,body h2,body h3,body h4,body h5,body h6,.wm-team-info h5{font-family: 'Tajawal', sans-serif;}
            </style>
        @endif

        @yield('post_css')
    </head>

    <body class="fixed-left">
        <!-- Alert -->
        <div class="float-alert">
            @if(session('message'))
                <div class="row alert-div alert alert-{{ session('message')['type'] }} clearfix">
                    <div class="col-md-10 p-0 m-0">{{ session('message')['text'] }}</div>
                    <div class="col-md-2 p-0 m-0 text-right">
                        <i class="alert-close fa fa-fw fa-close"></i>
                    </div>
                </div>
            @endif
        </div>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="{{ url('/') }}" class="logo">
                            <i class="icon-magnet icon-c-logo"></i><span>{{ config('app.name') }}</span>
                        </a>
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <nav class="navbar-custom">

                    <ul class="list-inline float-right mb-0">

                        @foreach(auth()->user()->roles as $role)
                            <span class="label {{ $role->class }}">{{ $role->name }}</span>
                        @endforeach

                        <li class="list-inline-item notification-list">
                            <a class="nav-link waves-light waves-effect" href="#" id="btn-fullscreen">
                                <i class="dripicons-expand noti-icon"></i>
                            </a>
                        </li>

                        <li onclick="location.reload();" class="list-inline-item notification-list">
                            <a class="nav-link waves-light waves-effect" href="#" >
                                <i class="dripicons-clockwise noti-icon"></i>
                            </a>
                        </li>

                        <li class="list-inline-item dropdown notification-list" style="background-color: #4d5a67;">
                            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <span class="pr-0">{{ auth()->user()->name }} <i class="fa fa-fw fa-angle-down"></i></span>
                                {{--<img src="{{ url('assets/images/users/avatar-1.jpg') }}" alt="user" class="rounded-circle">--}}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">


                                <!-- item-->
                                <a href="{{ route('users.showUserProfile') }}" class="dropdown-item notify-item">
                                    <i class="md md-account-circle"></i> <span>Profile</span>
                                </a>

                            <!-- item-->
                                <a href="{{ route('logout') }}"
                                   class="dropdown-item notify-item"
                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <i class="md md-settings-power"></i> <span>Logout</span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-light waves-effect">
                                <i class="dripicons-menu"></i>
                            </button>
                        </li>
                        {{--<li class="hide-phone app-search">--}}
                            {{--<form role="search" class="">--}}
                                {{--<input type="text" placeholder="Search..." class="form-control">--}}
                                {{--<a href=""><i class="fa fa-search"></i></a>--}}
                            {{--</form>--}}
                        {{--</li>--}}
                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            @include('_partials.sidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                        @yield('content')
                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    {{ config('app.name') }} &copy; {{ date('Y') }}. All rights reserved.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <!-- Update Modal -->
        @include('_modals.update')
        <!-- Delete Modal -->
        @include('_modals.delete')

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{ url('assets/js/jquery.min.js') }}"></script>
        <script src="{{ url('assets/js/popper.min.js') }}"></script><!-- Popper for Bootstrap -->
        <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ url('assets/js/detect.js') }}"></script>
        <script src="{{ url('assets/js/fastclick.js') }}"></script>
        <script src="{{ url('assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ url('assets/js/jquery.blockUI.js') }}"></script>
        <script src="{{ url('assets/js/waves.js') }}"></script>
        <script src="{{ url('assets/js/wow.min.js') }}"></script>
        <script src="{{ url('assets/js/jquery.nicescroll.js') }}"></script>
        <script src="{{ url('assets/js/jquery.scrollTo.min.js') }}"></script>
        <script src="{{ url('assets/js/script.js') }}"></script>

        <!-- jQuery  -->
        <script src="{{ url('assets/plugins/moment/moment.js') }}"></script>

        <script src="{{ url('assets/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script>

{{--        <script src="{{ url('assets/pages/jquery.form-advanced.init.js') }}"></script>--}}

        <!-- Required datatable js -->
        {{--<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>--}}
        <script src="{{ url('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ url('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Buttons examples -->
        <script src="{{ url('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
        <script src="{{ url('assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ url('assets/plugins/datatables/jszip.min.js') }}"></script>
        <script src="{{ url('assets/plugins/datatables/pdfmake.min.js') }}"></script>
        <script src="{{ url('assets/plugins/datatables/vfs_fonts.js') }}"></script>
        <script src="{{ url('assets/plugins/datatables/buttons.html5.min.js') }}"></script>
        <script src="{{ url('assets/plugins/datatables/buttons.print.min.js') }}"></script>

        <!-- Key Tables -->
        <script src="{{ url('assets/plugins/datatables/dataTables.keyTable.min.js') }}"></script>

        <!-- Responsive examples -->
        <script src="{{ url('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{ url('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

        <script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>

        <!-- Selection table -->
        <script src="{{ url('assets/plugins/datatables/dataTables.select.min.js') }}"></script>

        <script src="{{ url('assets/plugins/bootstrap-sweetalert/sweet-alert.min.js') }}"></script>

        <script src="{{ url('assets/plugins/peity/jquery.peity.min.js') }}"></script>

        <script src="{{ url('assets/js/jquery.core.js') }}"></script>
        <script src="{{ url('assets/js/jquery.app.js') }}"></script>

        <!-- parsleyjs  -->
        <script src="{{ url('assets/plugins/parsleyjs/parsley.min.js') }}"></script>

        <script src="{{ url('assets/js/loader.js') }}"></script>
        <script src="{{ url('assets/js/alerts.js') }}"></script>

        <script type="text/javascript">
            $(document).ready(function() {

                // Default Datatable
                $('#datatable').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf']
                });

                // Key Tables

                $('#key-table').DataTable({
                    keys: true
                });

                // Responsive Datatable
                $('#responsive-datatable').DataTable();

                // Multi Selection Datatable
                $('#selection-datatable').DataTable({
                    select: {
                        style: 'multi'
                    }
                });

                table.buttons().container()
                    .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('form').parsley();
            });
        </script>

        @yield('scripts')

        // Alerts
        @if($errors->all())
            @foreach($errors->all() as $error)
                addAlert('danger', '{{$error}}', 1);
            @endforeach
        @endif

    </body>
</html>