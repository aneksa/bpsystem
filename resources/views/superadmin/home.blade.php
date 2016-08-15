@extends('layouts.master')
    @section('title')
        Dashboard
    @endsection

    @section('css')
        <link href="{{ asset('assets/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendors/bower_components/animate.css/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendors/bower_components/google-material-color/dist/palette.css') }}" rel="stylesheet">
    @endsection

    @section('leftNavbar')
        <aside id="s-main-menu" class="sidebar">
                <div class="smm-header">
                    <i class="zmdi zmdi-long-arrow-left" data-ma-action="sidebar-close"></i>
                </div>

                <ul class="smm-alerts">
                    <li data-user-alert="sua-messages" data-ma-action="sidebar-open" data-ma-target="user-alerts">
                        <i class="zmdi zmdi-email"></i>
                    </li>
                    <li data-user-alert="sua-notifications" data-ma-action="sidebar-open" data-ma-target="user-alerts">
                        <i class="zmdi zmdi-notifications"></i>
                    </li>
                    <li data-user-alert="sua-tasks" data-ma-action="sidebar-open" data-ma-target="user-alerts">
                        <i class="zmdi zmdi-view-list-alt"></i>
                    </li>
                </ul>

                <ul class="main-menu">
                    <li>
                        <a href="{{ url('/home') }}"><i class="zmdi zmdi-home"></i> Home</a>
                    </li>

                    <li class="sub-menu">
                        <a  href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-format-underlined"></i> Monitoring & Survey</a>
                        <ul>
                            <li>
                                <a href="{{ url('/createsurvey') }}"> Create new</a>
                            </li>
                            @foreach($survey as $survei)
                                <li><a href="{{ url($survei->id_Survey) }}">{{$survei->id_Survey}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li @yield('administration')>
                        <a href="{{ url('/administrasi') }}"><i class="zmdi zmdi-swap-alt"></i> Administration</a>
                    </li>
                    <li @yield('privilege')>
                        <a href="{{ url('/privilege') }}"><i class="zmdi zmdi-collection-text"></i> Pusat Data</a>
                    </li>
                    <li class="sub-menu">
                        <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-trending-up"></i> History</a>
                        <ul>
                            <li class="sub-menu">
                                <a href="" data-ma-action="submenu-toggle">SUKERNAS</a>
                                <ul>
                                    <li><a href="alternative-header.html">Pemutakhiran</a></li>
                                    <li><a href="colored-header.html">Pencacahan</a></li>
                                </ul>
                            </li>
                            <li class="sub-menu">
                                <a href="" data-ma-action="submenu-toggle">SUSENAS</a>
                                <ul>
                                    <li><a href="alternative-header.html">Pemutakhiran</a></li>
                                    <li><a href="colored-header.html">Pencacahan</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </aside>
    @endsection

@section('content')

<section id="content">
            <div class="container">
                <ol class="breadcrumb" style="margin-bottom: 5px;">
                  <li><a href="{{URL('/')}}">Home</a></li>
                </ol>
                <div class="card">
                   <div class="card-header">
                        <h2>Dashboard <h3>Sistem Monitoring Survei dan Sensus</3></h2>

                        <ul class="actions">
                            <li>
                                <a href="">
                                    <i class="zmdi zmdi-check-all"></i>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="zmdi zmdi-trending-up"></i>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="" data-toggle="dropdown">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a href="">Change Date Range</a>
                                    </li>
                                    <li>
                                        <a href="">Change Graph Type</a>
                                    </li>
                                    <li>
                                        <a href="">Other Settings</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="chart-edge">
                            <div id="curved-line-chart" class="flot-chart "></div>
                        </div>
                    </div>
                </div>

                <div id="c-grid" class="clearfix" data-columns>

                    <div class="card">
                        <div class="card-header ch-img" style="background-image: url({{ asset('assets/img/home1.jpg') }}); height: 250px;"></div>
                        <div class="card-header">
                            <h2>
                                Monitoring Data
                            </h2>
                        </div>
                        <div class="card-body card-padding">
                            <p>Sistem monitoring bertujuan untuk Sistem monitoring bertujuan untuk Sistem monitoring bertujuan untuk Sistem monitoring bertujuan untuk Sistem monitoring bertujuan untuk Sistem monitoring bertujuan untuk Sistem monitoring bertujuan untuk Sistem monitoring bertujuan untuk Sistem monitoring bertujuan untuk Sistem monitoring bertujuan untuk</p>
<!--

                            <a href="" class="view-more"><i class="zmdi zmdi-long-arrow-right"></i> View Article...</a>
-->
                        </div>
                    </div>

                        <div class="card">
                            <div class="card-header">
                                <h2>Recent Activities <small>log activities</small></h2>
                            </div>

                            <div class="list-group lg-alt">
                                <a href="" class="list-group-item media">
                                    <div class="pull-left">
                                        <img class="avatar-img mCS_img_loaded" src="{{ asset('assets/img/users/alvian.jpg') }}" alt="">
                                    </div>

                                    <div class="media-body">
                                        <div class="lgi-heading">Muhammad Alvian Supriadi</div>
                                        <b><font color="blue">P2TIK</font></b>
                                        <h5><div class="lgi-heading">2 second ago</div></h5>
                                    </div>
                                </a>
                                <a href="" class="list-group-item media">
                                    <div class="pull-left">
                                        <img class="avatar-img mCS_img_loaded" src="{{ asset('assets/img/users/andy.jpg') }}" alt="">
                                    </div>

                                    <div class="media-body">
                                        <div class="lgi-heading">Andy Eka Saputra</div>
                                        <b><font color="blue">P2TIK</font></b>
                                        <h5><div class="lgi-heading">30 second ago</div></h5>
                                    </div>
                                </a>
                                <a href="" class="list-group-item media">
                                    <div class="pull-left">
                                        <img class="avatar-img mCS_img_loaded" src="{{ asset('assets/img/users/kamal.jpg') }}" alt="">
                                    </div>

                                    <div class="media-body">
                                        <div class="lgi-heading">Muhammad Kamal Hidayatullah</div>
                                        <b><font color="blue">P2TIK</font></b>
                                        <h5><div class="lgi-heading">45 second ago</div></h5>
                                    </div>
                                </a>
                                <a href="" class="list-group-item media">
                                    <div class="pull-left">
                                        <img class="avatar-img mCS_img_loaded" src="{{ asset('assets/img/users/hengky.jpg') }}" alt="">
                                    </div>

                                    <div class="media-body">
                                        <div class="lgi-heading">Hengky Rachmadani</div>
                                        <b><font color="blue">P2TIK</font></b>
                                        <h5><div class="lgi-heading">56 second ago</div></h5>
                                    </div>
                                </a>
                            </div>

                            <a href="" class="list-group-item view-more">
                                <i class="zmdi zmdi-long-arrow-right"></i> View all
                            </a>
                        </div>

                </div>

                <div id="c-grid" class="clearfix" data-columns>

                </div>
            </div>
</section>

@endsection

@section('js')
        <!-- Javascript Libraries -->
        <script src="{{ asset('assets/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/bower_components/Waves/dist/waves.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/bootstrap-growl/bootstrap-growl.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/bower_components/moment/min/moment.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/bower_components/fullcalendar/dist/fullcalendar.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/bower_components/salvattore/dist/salvattore.min.js') }}"></script>

        <script src="{{ asset('assets/vendors/bower_components/flot/jquery.flot.js') }}"></script>
        <script src="{{ asset('assets/vendors/bower_components/flot/jquery.flot.resize.js') }}"></script>
        <script src="{{ asset('assets/vendors/bower_components/flot.curvedlines/curvedLines.js') }}"></script>
        <script src="{{ asset('assets/vendors/sparklines/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js') }}"></script>
        <script src="{{ asset('assets/js/flot-charts/curved-line-chart.js') }}"></script>
        <script src="{{ asset('assets/js/flot-charts/line-chart.js') }}"></script>
@endsection
