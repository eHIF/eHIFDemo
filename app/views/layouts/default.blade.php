<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Ηλεκτρονικός Φάκελος - Κέντρο Υγείας Κισσάμου</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="{{URL::asset('bs-binary-admin/assets/css/bootstrap.css')}}" rel="stylesheet"/>
    <!-- FONTAWESOME STYLES-->
    <link href="{{URL::asset('bs-binary-admin/assets/css/font-awesome.css')}}" rel="stylesheet"/>
    <!-- CUSTOM STYLES-->
    <link href="{{URL::asset('bs-binary-admin/assets/css/custom.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('bower_resources/DataTables/media/css/jquery.dataTables.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('bower_resources/angular-datatables/dist/datatables.bootstrap.css')}}" rel="stylesheet"/>


    <link rel="stylesheet"
          href="{{URL::asset('bower_resources/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}"/>

    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
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
font-size: 16px;"><i>{{Auth::user()->roles()->first()->friendly}}</i> {{Auth::user()->name}} &nbsp; <a href="#"
                                                                                                       class="btn btn-danger square-btn-adjust">Αποσύνδεση</a>
            </div>
        @endif
    </nav>
    <!-- /. NAV TOP  -->
    @if(Auth::check())
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li class="text-center">
                        <h3 class="title">{{{Auth::user()->department->name}}}</h3>
                    </li>

                    <li>
                        <a class="{{ Request::is( 'processes*') ? 'active-menu' : '' }}"
                           href="{{URL::to('processes/list')}}"><i class="fa fa-tasks fa-3x"></i> Διαδικασίες <span
                                    class="pull-right label label-danger">@include('layouts/active_processes')</span></a>
                    </li>
                    <li>
                        <a class="{{ Request::is( 'visits*') ? 'active-menu' : '' }}" href="{{URL::to('visits')}}"><i
                                    class="fa fa-book fa-3x"></i>Επισκέψεις</a>
                    </li>
                    <li>
                        <a class="{{ Request::is( 'sessions*') ? 'active-menu' : '' }}"
                           href="{{URL::to("sessions")}}"><i class="fa fa-stethoscope fa-3x"></i> Συνεδρίες</a>
                    </li>
                    <li>
                        <a class="{{ Request::is( 'patients*') ? 'active-menu' : '' }}"
                           href="{{URL::to('patients')}}"><i class="fa fa-users fa-3x"></i> Ασθενείς</a>
                    </li>

                    <li>
                        <a class="{{ Request::is( 'appointments*') ? 'active-menu' : '' }}"
                           href="{{URL::to('appointments')}}"><i class="fa fa-calendar fa-3x"></i>Ραντεβού</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i> Προσωπικό <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Ιατροί</a>
                            </li>
                            <li>
                                <a href="#">Νοσηλευτές</a>
                            </li>
                            <li>
                                <a href="#">Διοικητικοί</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="blank.html"><i class="fa fa-bar-chart-o fa-3x"></i> Αναφορές </a>
                    </li>
                </ul>

            </div>

        </nav>
        @endif
                <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">

                @yield('breadcrumb')
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


<script type="text/javascript" src="{{URL::asset('bower_resources/moment/min/moment.min.js')}}"></script>
<script type="text/javascript"
        src="{{URL::asset('bower_resources/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
<script type="text/javascript"
        src="{{URL::asset('bower_resources/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>


<script src="{{ URL::asset('bower_resources/angular/angular.js')}}"></script>
<script src="{{ URL::asset('bower_resources/angular-resource/angular-resource.js')}}"></script>
<script src="{{ URL::asset('bower_resources/angular-route/angular-route.js')}}"></script>
<script src="{{ URL::asset('bower_resources/angular-datatables/dist/angular-datatables.js')}}"></script>
<script src="{{ URL::asset('scripts/application/app.js')}}"></script>
@yield('scripts')
</body>
</html>
