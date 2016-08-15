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
              <li><a href="{{ url($survey2->id_Survey) }}">{{ $survey2 -> id_Survey }}</a></li>
              <li><a href="{{URL('/')}}">Input Progress {{ $tahapan -> nama_Tahapan}}</a>
            </ol>
            <div class="card">
                <div class="card-header">
                    <h2><img src="{{ asset('assets/img/input.png') }}"  width="40" height="40" > Input Progres {{ $tahapan -> nama_Tahapan}}</h2>
                    <br>
                    <div class="row">
                            <div class="col-sm-3 m-b-20">
                                <div class="form-group fg-line">
                                    <br>
                                    <label>Waktu</label>
                                    <input type="text" class="form-control input-mask" data-mask="00/00/0000" placeholder="DD/MM/YY">
                                </div>
                                <p class="f-500 m-b-15 c-black">Provinsi</p>
                                <select class="selectpicker">
                                    <option value="0">Pilih Provinsi</option>
                                    <option>Aceh</option>
                                    <option>Bali</option>
                                    <option>Bengkulu</option>
                                </select>
                            </div>

                            <div class="col-sm-3 m-b-20">
                                <br>
                                <p class="f-500 m-b-15 c-black">Kabupaten</p>
                                <select class="selectpicker">
                                    <option value="0">Pilih Kabupaten</option>
                                    <option>A</option>
                                    <option>B</option>
                                    <option>C</option>
                                </select>
                                <br><br>
                                 <p class="f-500 m-b-15 c-black">NKS</p>
                                <select class="selectpicker">
                                    <option value="0">Pilih NKS</option>
                                    <option>A12</option>
                                    <option>B21</option>
                                    <option>C31</option>
                                </select>
                                <br>
                                <br>    
                            </div>
                        
                    </div>
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
                    
                    <button class="btn btn-primary">Simpan</button>   
                   
                    
                    <span class="btn btn-primary btn-file m-r-10">
                        <span class="fileinput-new">Select file</span>
                    </span>
                    
                </div>
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