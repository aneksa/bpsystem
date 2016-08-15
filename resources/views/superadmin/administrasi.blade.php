@extends('layouts.master')
    @section('title')
        Administrasi | Superadmin
    @endsection
    
    @section('css')
        <link href="{{ asset('assets/vendors/bower_components/animate.css/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendors/bower_components/google-material-color/dist/palette.css') }}" rel="stylesheet">


        <link href="{{ asset('assets/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendors/bower_components/nouislider/distribute/jquery.nouislider.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendors/farbtastic/farbtastic.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendors/bower_components/chosen/chosen.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendors/summernote/dist/summernote.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendors/vendors/bootgrid/jquery.bootgrid.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendors/vendors/bower_components/google-material-color/dist/palette.css') }}" rel="stylesheet">

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
                    <li class="sub-menu">
                        <a  href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-format-underlined"></i>Input Data {{$survey2->id_Survey}}</a>
                        <ul>
                                @foreach($tahapanSurvey2 as $tahapan)
                                <li>
                                    <?php
                                        $survei2 = DB::table('survey') -> where('id_Survey', $tahapan -> id_Survey) -> first();
                                    ?>
                                    <a href="{{ url($survei2->id_Survey.'/'.$tahapan->id_Tahapan.'/inputprogress') }}">{{ $tahapan -> nama_Tahapan }}</a>
                                </li>
                                @endforeach
                        </ul>
                    </li>
                    <li @yield('administration')>
                        <a href="{{ url($survei2->id_Survey.'/administrasi') }}"><i class="zmdi zmdi-swap-alt"></i> Administration</a>
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
                  <li><a href="{{URL('/administrasi')}}">Administrasi</a></li>
                  <li><a class="active"></a></li>
                </ol>
                
                <div class="card">
                    <div class="card-header">
                        <h2>Remember :<small>
                        1. Define your survey's name <br>
                        2. Assign a number of phase <br>
                        3. Determine an admin of survey Extend form controls by adding text or buttons before, after, or on both sides of any text-based inputs.</small></h2>
                        <br>
                        <div class="dropdown">
                            <a id="dLabel" role="button" data-toggle="dropdown" class="btn btn-primary" data-target="#" href="/page.html">
                                Survey <span class="caret"></span> 
                            </a>
                            <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                              <li class="dropdown-submenu">
                                <a tabindex="-1" href="#">Survey 1</a>
                              </li>
                              <li class="divider"></li>
                              <li class="dropdown-submenu">
                                <a tabindex="-1" href="#">Survey 2</a>
                              </li>
                              <li class="divider"></li>
                              <li class="dropdown-submenu">
                                <a tabindex="-1" href="#">Survey 3</a>
                              </li>
                              <li class="divider"></li>
                              <li class="dropdown-submenu">
                                <a tabindex="-1" href="#">Survey 4</a>
                              </li>
                              <li class="divider"></li>
                              <li class="dropdown-submenu">
                                <a tabindex="-1" href="#">Survey 5</a>
                              </li>
                              <li class="divider"></li>
                              <li class="dropdown-submenu">
                                <a tabindex="-1" href="#">Survey 6</a>
                              </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                    <!-- Form 1 -->
                    <div class="card">
                        <div class="card-header cw-header palette-Blue-400 bg">
                            <h2><font color="white">Daftar Pengguna</font></h2>
                            <a  href="{{ url('/administrasi/tambahpengguna') }}" class="btn palette-Red bg btn-float waves-effect waves-circle waves-float"><i class="zmdi zmdi-plus"></i></a>
                        </div>
                        <br>
                        <br>
                        <div class="card-body card-padding">
                                <p class="f-500 m-b-15 c-black">Propinsi :</p>
                                <div class="form-group fg-float m-b-30">
                                    <div class="fg-line">
                                        <select class="selectpicker" data-live-search="true">
                                            <option>Mustard</option>
                                            <option>Ketchup</option>
                                            <option>Relish</option>
                                            <option>Tent</option>
                                            <option>Flashlight</option>
                                            <option>Toilet Paper</option>
                                        </select>
                                    </div>
                                </div>

                                <p class="f-500 m-b-15 c-black">Kabupaten :</p>
                                <div class="form-group fg-float m-b-30">
                                    <div class="fg-line">
                                        <select class="selectpicker" data-live-search="true">
                                            <option>Mustard</option>
                                            <option>Ketchup</option>
                                            <option>Relish</option>
                                            <option>Tent</option>
                                            <option>Flashlight</option>
                                            <option>Toilet Paper</option>
                                        </select>
                                    </div>
                                </div>                

                                <div class="clearfix"></div>

                                <div class="m-t-20">
                                    <button class="btn btn-info">Submit</button>
                                    <button class="btn btn-danger">Cancel</button>
                                </div>
                            </div>
                    </div>       
               
                <!-- Tabel Data Pengguna -->
                <div class="card">
                         <div class="card-header cw-header palette-Indigo-400 bg">
                            <h2><font color="white">Tabel Daftar Pengguna {{$survey2->id_Survey}}</font></h2>
                        </div>
                        <br>
                        <table id="data-table" class="table table-striped table-vmiddle">
                            <thead>
                                <tr>
                                    <th data-column-id="id" data-type="numeric">ID</th>
                                    <th data-column-id="sender">Name</th>
                                    <th data-column-id="received" data-order="desc">Username</th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>                         
                                @foreach($daftarHakAkses as $users) 
                                
                                <?php
                                
                                $user = DB::table('users')
                                    ->where('id_User',$users -> id_User)
                                    ->first();
                                ?>       
                                
                                <tr>
                                    <td>{{ $user -> id_User }}</td>
                                    <td>{{ $user -> name }}</td>
                                    <td>{{ $user -> email }}</td>
                                    <td>
                                        <a href="{{ url('administrasi/editpengguna') }}" type="button" class="btn  palette-Indigo bg">Edit</a>
                                        
                                        <a href="{{ url('administrasi/delete/'.$user -> id_User ) }}" type="button" class="btn  palette-Red bg">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
                
        </section>
@endsection

@section('js')
        <script src="{{ asset('assets/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.js') }}"></script>
        <script src="{{ asset('assets/vendors/bower_components/nouislider/distribute/jquery.nouislider.all.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/bower_components/typeahead.js/dist/typeahead.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/summernote/dist/summernote-updated.min.js') }}"></script>

        <script src="{{ asset('assets/vendors/bower_components/fullcalendar/dist/fullcalendar.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/bower_components/autosize/dist/autosize.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/bower_components/salvattore/dist/salvattore.min.js') }}"></script>

        <script src="{{ asset('assets/vendors/input-mask/input-mask.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/bower_components/chosen/chosen.jquery.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/farbtastic/farbtastic.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/fileinput/fileinput.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/bootgrid/jquery.bootgrid.updated.min.js') }}"></script>

        <!-- Data Table -->
        <script type="text/javascript">
            $(document).ready(function(){
                //Basic Example
                $("#data-table-basic").bootgrid({
                    css: {
                        icon: 'zmdi icon',
                        iconColumns: 'zmdi-view-module',
                        iconDown: 'zmdi-expand-more',
                        iconRefresh: 'zmdi-refresh',
                        iconUp: 'zmdi-expand-less'
                    },
                });
                
                //Selection
                $("#data-table-selection").bootgrid({
                    css: {
                        icon: 'zmdi icon',
                        iconColumns: 'zmdi-view-module',
                        iconDown: 'zmdi-expand-more',
                        iconRefresh: 'zmdi-refresh',
                        iconUp: 'zmdi-expand-less'
                    },
                    selection: true,
                    multiSelect: true,
                    rowSelect: true,
                    keepSelection: true
                });
                
                //Command Buttons
                $("#data-table-command").bootgrid({
                    css: {
                        icon: 'zmdi icon',
                        iconColumns: 'zmdi-view-module',
                        iconDown: 'zmdi-expand-more',
                        iconRefresh: 'zmdi-refresh',
                        iconUp: 'zmdi-expand-less'
                    },
                    formatters: {
                        "commands": function(column, row) {
                            return "<button type=\"button\" class=\"btn btn-icon command-edit waves-effect waves-circle\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-edit\"></span></button> " + 
                            "<button type=\"button\" class=\"btn btn-icon command-delete waves-effect waves-circle\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-delete\"></span></button>";
                        }
                    }
                });
            });
        </script>
        <script>
        $(document).ready(function(){
          $('.dropdown-submenu a.test').on("click", function(e){
            $(this).next('ul').toggle();
            e.stopPropagation();
            e.preventDefault();
          });
        });
        </script>
@endsection