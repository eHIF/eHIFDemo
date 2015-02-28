<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    @yield("meta")
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


    <link href="{{URL::asset('bower_resources/datatables-responsive/css/dataTables.responsive.css')}}" rel="stylesheet"/>

    <link href="{{URL::asset('bower_resources/angular-datatables/dist/datatables.bootstrap.css')}}" rel="stylesheet"/>


    <link rel="apple-touch-icon" sizes="57x57" href="{{URL::asset('bs-binary-admin/assets/img/favicon/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{URL::asset('bs-binary-admin/assets/img/favicon/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{URL::asset('bs-binary-admin/assets/img/favicon/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{URL::asset('bs-binary-admin/assets/img/favicon/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{URL::asset('bs-binary-admin/assets/img/favicon/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{URL::asset('bs-binary-admin/assets/img/favicon/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{URL::asset('bs-binary-admin/assets/img/favicon/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{URL::asset('bs-binary-admin/assets/img/favicon/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{URL::asset('bs-binary-admin/assets/img/favicon/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{URL::asset('bs-binary-admin/assets/img/favicon/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{URL::asset('bs-binary-admin/assets/img/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{URL::asset('bs-binary-admin/assets/img/favicon/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::asset('bs-binary-admin/assets/img/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{URL::asset('bs-binary-admin/assets/img/favicon/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{URL::asset('bs-binary-admin/assets/img/favicon/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">





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
            <small style="text-align: center; margin: 0 auto;"><a style="text-align: center; color:rgb(245, 237, 215)" href="http://www.hc-crete.gr/ky-kissamos" class="col-sm-12">www.hc-crete.gr/ky-kissamos</a> </small>
        </div>
        @if(Auth::check())
            <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"><i>{{Auth::user()->roles()->first()->friendly}}</i> {{Auth::user()->name}} &nbsp; <a href="{{URL::to('users/logout')}}"
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
                           href="{{URL::to('processes/list')}}"><i class="fa fa-tasks fa-3x"></i> Διαδικασίες eHIF<span
                                    class="pull-right label label-danger">@include('layouts/active_processes')</span></a>
                    </li>
                    <li>
                        <a class="{{ Request::is( 'visits*') ? 'active-menu' : '' }}" href="{{URL::to('visits')}}"><i
                                    class="fa fa-book fa-3x"></i>Επισκέψεις στο Κ.Υ.</a>
                    </li>
                    <li>
                        <a class="{{ Request::is( 'sessions*') ? 'active-menu' : '' }}"
                           href="{{URL::to("sessions")}}"><i class="fa fa-stethoscope fa-3x"></i> Συνεδρίες με τον Ιατρό</a>
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
                                <a href="{{URL::to('users/list/doctor')}}">Ιατροί</a>
                            </li>
                            <li>
                                <a href="{{URL::to('users/list/nurse')}}">Νοσηλευτές</a>
                            </li>
                            <li>
                                <a href="{{URL::to('users/list/administration')}}">Διοικητικοί</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="{{URL::to("/")}}"><i class="fa fa-bar-chart-o fa-3x"></i> Αναφορές </a>
                    </li>
                    <li>
                        <a class="{{ Request::is( 'ehif*') ? 'active-menu' : '' }}"
                           href="{{URL::to('ehif')}}"><i class="fa fa-share fa-3x"></i> eHIF</a>
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
                        <div @if (array_key_exists('context', View::getSections()))class="col-md-9"@else class="col-md-12" @endif>
                            @yield('content')
                        </div>
                        @if (array_key_exists('context', View::getSections()))
                            <div class="col-md-3">
                                @yield('context')
                            </div>
                        @endif


                    </div>
                </div>
                <!-- /. ROW  -->
                <hr/>
                <footer class="row footer">
                    <div class="">
                        <div style=" background:rgba(52, 70, 79, 0.88)">
                            <div class="col-sm-2"><img  style="margin-top: 50px; display: block; margin: 0 auto;  max-width: 80px" src="{{URL::asset('bs-binary-admin/assets/img/ehif.png')}}" alt=""/></div>
                            <div class="text-muted col-sm-8">   <div>Πιλοτική εφαρμογή του προγράμματος <a target="_blank" href="http://medlab.cc.uoi.gr/ehif">eHIF</a> (e-Health Interoperability Framework) - Δικτύωση Μονάδων Πρωτοβάθμιας Φροντίδας. Με τη συγχρηματοδότηση του Υπουργείου Υγείας και του ΕΣΠΑ </div></div>
                        <div class="col-sm-2">
                            <img style="max-width: 100px" src="{{URL::asset('bs-binary-admin/assets/img/espa-logo-medium-small.jpg')}}" alt=""/>
                        </div>

                        </div>


                    </div>
                </footer>

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
<script src="{{ URL::asset('bower_resources/datatables-responsive/js/dataTables.responsive.js')}}"></script>

<script src="{{URL::asset('bower_resources/angular-chosen-localytics/chosen.js')}}"></script>
<script src="{{URL::asset('bower_resources/angular-bootstrap-datetimepicker/src/js/datetimepicker.js')}}"></script>
<script>
    $(document).ready(function(){
        $('body').tooltip({
            selector: '[data-toggle="tooltip"]',
            container: "body"
        });
    });

</script>

<script src="{{ URL::asset('scripts/application/app.js')}}"></script>
@yield('scripts')
</body>
</html>
