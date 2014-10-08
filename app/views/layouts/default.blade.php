<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ηλεκτρονικός Φάκελος - Κέντρο Υγείας Κισσάμου</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="{{URL::asset('bs-binary-admin/assets/css/bootstrap.css')}}" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="{{URL::asset('bs-binary-admin/assets/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="{{URL::asset('bs-binary-admin/assets/css/custom.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('bower_resources/datatables/media/css/jquery.dataTables.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('bower_resources/angular-datatables/dist/datatables.bootstrap.css')}}" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body ng-app="eHIFDemo">
<div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="{{URL::to('/')}}">Κ.Υ. Κισσάμου</a>
        </div>
        @if(Auth::check())
        <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> {{Auth::user()->name}} &nbsp; <a href="#" class="btn btn-danger square-btn-adjust">Αποσύνδεση</a> </div>
    @endif
    </nav>
    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                @if(Auth::check())
                <li class="text-center">
                    <h3 style="color: orange" class="title">{{{Auth::user()->department->name}}}</h3>
                </li>
                @endif

                <li>
                    <a  href="index.html"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                </li>
                <li>
                    <a  href="ui.html"><i class="fa fa-desktop fa-3x"></i> UI Elements</a>
                </li>
                <li>
                    <a  href="tab-panel.html"><i class="fa fa-qrcode fa-3x"></i> Tabs & Panels</a>
                </li>
                <li  >
                    <a  href="chart.html"><i class="fa fa-bar-chart-o fa-3x"></i> Morris Charts</a>
                </li>
                <li  >
                    <a  href="table.html"><i class="fa fa-table fa-3x"></i> Table Examples</a>
                </li>
                <li  >
                    <a  href="form.html"><i class="fa fa-edit fa-3x"></i> Forms </a>
                </li>


                <li>
                    <a href="#"><i class="fa fa-sitemap fa-3x"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="#">Second Level Link</a>
                        </li>
                        <li>
                            <a href="#">Second Level Link</a>
                        </li>
                        <li>
                            <a href="#">Second Level Link<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="#">Third Level Link</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Link</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Link</a>
                                </li>

                            </ul>

                        </li>
                    </ul>
                </li>
                <li  >
                    <a class="active-menu"  href="blank.html"><i class="fa fa-square-o fa-3x"></i> Blank Page</a>
                </li>
            </ul>

        </div>

    </nav>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title">
                        <h2>@yield('pagetitle')</h2>
                    </div>
                    <hr/>
                   @yield('content')

                </div>
            </div>
            <!-- /. ROW  -->


        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>

<script>
    baseURL = "{{URL::to('/')}}";
</script>

<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="{{URL::asset('bs-binary-admin/assets/js/jquery-1.10.2.js')}}"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="{{URL::asset('bs-binary-admin/assets/js/bootstrap.min.js')}}"></script>
<!-- METISMENU SCRIPTS -->
<script src="{{URL::asset('bs-binary-admin/assets/js/jquery.metisMenu.js')}}"></script>
<!-- CUSTOM SCRIPTS -->
<script src="{{URL::asset('bs-binary-admin/assets/js/custom.js')}}"></script>

<script src="{{ URL::asset('bower_resources/DataTables/media/js/jquery.dataTables.js')}}"></script>

<script src="{{ URL::asset('bower_resources/angular/angular.js')}}"></script>
<script src="{{ URL::asset('bower_resources/angular-resource/angular-resource.js')}}"></script>
<script src="{{ URL::asset('bower_resources/angular-route/angular-route.js')}}"></script>
<script src="{{ URL::asset('bower_resources/angular-datatables/dist/angular-datatables.js')}}"></script>
<script src="{{ URL::asset('scripts/application/app.js')}}"></script>
@yield('scripts')
</body>
</html>
