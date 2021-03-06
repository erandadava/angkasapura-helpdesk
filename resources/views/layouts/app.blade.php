<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>AP2-Helpdesk</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/skins/_all-skins.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">

    

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.6/css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />

    <!-- optionally if you need to use a theme, then include the theme CSS file as mentioned below -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.6/themes/krajee-svg/theme.css" media="all" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{asset('js/clockpicker/dist/bootstrap-clockpicker.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <style>
        .ck-editor__editable {
            min-height: 300px;
        }
        .notifications-menu .menu > li a p {
            white-space: normal;
        }
        .dataTables_length{
            margin-top:10px;
        }
        div.dataTables_wrapper div.dataTables_processing{
            z-index: 999;
            background-color: white;
        }

    </style>
    @yield('css')
</head>

<body class="skin-blue sidebar-mini">
@if (!Auth::guest())
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="#" class="logo">
                <b>AP2-Helpdesk</b>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="count_notif">
                        <i class="fa fa-bell-o"></i>
                        </a>
                        <ul class="dropdown-menu">
                        <li class="header" id="header_notif"></li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu" id="notif">

                            </ul>
                        </li>
                        <li class="footer"><a href="#" onclick="get_notif();">Segarkan</a></li>
                        </ul>
                    </li>
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="{{ asset('img/aplogosm.jpeg') }}"
                                     class="user-image" alt="User Image"/>
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">{!! Auth::user()->username !!}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="{{ asset('img/aplogosm.jpeg') }}"
                                         class="img-circle" alt="User Image"/>
                                    <p>
                                        {!! Auth::user()->username !!}
                                        <small>Member since {!! Auth::user()->created_at->format('M. Y') !!}</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                    <a href="/users/{{Auth::id()}}/edit" class="btn btn-default btn-flat">Profil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{!! url('/logout') !!}" class="btn btn-default btn-flat"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Sign out
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>

        <!-- Main Footer -->
        <footer class="main-footer" style="max-height: 100px;text-align: center;font-size:small;">
            <strong>Copyright © {{date('Y')}} PT.Angkasa Pura II, All rights reserved. Supported by Ayrio Starindo Mandiri. </strong>
        </footer>

    </div>
@else
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{!! url('/') !!}">
                    InfyOm Generator
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{!! url('/home') !!}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <li><a href="{!! url('/login') !!}">Login</a></li>
                    <li><a href="{!! url('/register') !!}">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- jQuery 3.1.1 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/js/adminlte.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.6.0/dist/chartjs-plugin-datalabels.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.6/js/star-rating.min.js" type="text/javascript"></script>

<!-- optionally if you need to use a theme, then include the theme JS file as mentioned below -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.6/themes/krajee-svg/theme.js"></script>


<script src="{{asset('js/jsignature-master/src/jSignature.js')}}"></script>

<script src="{{asset('js/clockpicker/dist/bootstrap-clockpicker.min.js')}}"></script>
<script src="{{asset('js/html2canvas.js')}}"></script>
    <script>
    $(document).ready(function(){
      $.fn.dataTable.ext.errMode = 'none';
    });

    //For notification
        var previous_notif = 0 ;
        function get_notif(){
            $.ajax({
                dataType: "json",
                url: "/notif",
                success: function (data) {
                    $('#header_notif').html('');
                    $('#header_notif').html("Anda memiliki "+data.data.data_notif.length+" notifikasi");
                    if(data.data.data_notif.length != previous_notif){
                        $("#notif").html('');
                        $(".number_notif").remove();
                        previous_notif = data.data.data_notif.length;
                        $.each(data.data.data_notif, function( key, element ) {
                            var date = new Date(element.created_at);
                            var dt = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear() + " | " + date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds();
                            $("#notif").append("<li><a href='"+element.link_id+"'>"+element.pesan+"<p><small>"+dt+"</small></p></a></li>");
                            $('#count_notif').append("<span class='label label-danger number_notif animated heartBeat'>"+data.data.count_notif+"</span>");
                        });
                    }      
                }
            });
        }
        
        get_notif();
        setInterval(function(){
            get_notif();
        },60000);

    try {
      $('select').select2();
      $('.clockpicker').clockpicker();
      $('#tgl-range-bulan').datetimepicker({
            format: 'Y-MM',
            useCurrent: true
        });
    } catch (e) {

    }

    try {
      $('select').select2();
      $('.clockpicker').clockpicker();
      $('#tgl-range').datetimepicker({
            format: 'Y-MM-DD',
            useCurrent: true
        });
    } catch (e) {

    }
                        ClassicEditor
                                .create( document.querySelector( '#editor' ),{
                                    resize: {
                                        minHeight: 300,
                                        maxHeight: 800
                                    }
                                } )
                                .then( editor => {
                                        //console.log( editor );
                                } )
                                .catch( error => {
                                        //console.error( error );
                                } );
                                ClassicEditor
                                .create( document.querySelector( '#editor2' ),{
                                    resize: {
                                        minHeight: 300,
                                        maxHeight: 800
                                    }
                                } )
                                .then( editor => {
                                        //console.log( editor );
                                } )
                                .catch( error => {
                                        //console.error( error );
                                } );
                                ClassicEditor
                                .create( document.querySelector( '#editor3' ),{
                                    resize: {
                                        minHeight: 300,
                                        maxHeight: 800
                                    }
                                } )
                                .then( editor => {
                                        //console.log( editor );
                                } )
                                .catch( error => {
                                        //console.error( error );
                                } );
                                $(document).ready(function(){
                                    var status_klik = false;
                                    $('.print-btn-detail').click(function(){
                                        if (status_klik == false) {
                                            $(".print-btn-detail").attr("disabled", "disabled");
                                            status_klik = true;
                                            html2canvas($(".content-wrapper").get(0)).then(canvas => {  
                                                var dataURL = canvas.toDataURL();
                                                var width = canvas.width;
                                                var printWindow = window.open("");
                                                $(printWindow.document.body)
                                                .html("<img id='Image' src=" + dataURL + " style='" + width + "'></img>")
                                                .ready(function() {
                                                    $(".print-btn-detail").removeAttr("disabled");
                                                    status_klik = false;
                                                    printWindow.focus();
                                                    printWindow.print();
                                                });
                                                
                                            });
                                        }
                                    });
                                });
    </script>
    @hasrole('IT Administrator|IT Support')
        <script>
        //For time alert 
            function createCookie(name,value,days) {
                if (days) {
                    var end = new Date().toLocaleString("en-US", {hour12: false,timeZone: "Asia/Jakarta"});
                    end = new Date(end);
                    end.setHours(23,59,59,9999);
                    var expires = "; expires="+end.toGMTString();
                }
                else var expires = "";
                document.cookie = name+"="+value+expires+"; path=/";
            }

            function readCookie(name) {
                var nameEQ = name + "=";
                var ca = document.cookie.split(';');
                for(var i=0;i < ca.length;i++) {
                    var c = ca[i];
                    while (c.charAt(0)==' ') c = c.substring(1,c.length);
                    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
                }
                return null;
            }

            t= setInterval(function () {
                check_time()
            }, 1000);

            function check_time(){
                var today = new Date().toLocaleString("en-US", {hour12: false,timeZone: "Asia/Jakarta"}),
                today = new Date(today),
                h = today.getHours(),
                m = today.getMinutes(),
                s = today.getSeconds();
                var lebih = new Date(today.getFullYear(), today.getMonth(), today.getDate(), 16, 30, 0);
                var kurang = new Date(today.getFullYear(), today.getMonth(), today.getDate(), 23, 59, 59);
                var alert_delegasi = readCookie('alertdelegasi');
                if(alert_delegasi == null){
                    if((today.getTime() >= lebih.getTime() && today.getTime() <= kurang.getTime()) || (today.getDay() == 6 || today.getDay() == 0))
                    {
                        clearInterval(t);
                        if(!alert('Waktunya delegasi IT Administrator  diberikan ke IT Support. \nTekan OK untuk memperbarui hak akses')){
                            createCookie('alertdelegasi','true',1);
                            window.location.reload();
                        }
                    } 
                }
                
            }
        </script>
    @endhasrole
    @yield('scripts')
</body>
</html>
