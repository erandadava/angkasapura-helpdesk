<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Angkasa Pura II - IT Helpdesk</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Bootstrap 4.0 -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/skins/_all-skins.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<style type="text/css">
    body {
    font-family: "Lato", sans-serif;
    background-color: #276bb6;
}

.main-head{
    height: 150px;
    background: #FFF;
   
}

.sidenav {
    height: 100%;
    background: rgb(87,135,189);
    background: radial-gradient(circle, rgba(87,135,189,1) 0%, rgba(39,107,183,1) 48%);
    overflow-x: hidden;
    padding-top: 20px;
}


.main {
    padding: 0px 0px;
}

.logo-hr{
    width: 35%;
}
input{
    margin-top: 1%;
}
.form-control {
    border-radius: 10px;
}
.div-teks{
    color: white;
    font-weight: bold;
    margin-top: 5%;
}
.login-main-text img{
        height: auto;
        width: auto;
}
#main1{
        display: none;
}
#main2{
        display: block;
        margin-right: 10%;
}
@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
}

@media screen and (max-width: 450px) {
    .login-form{
        margin-top: 10%;
    }

    .register-form{
        margin-top: 10%;
    }

}

@media screen and (min-width: 768px){
    .main{
        margin-left: 40%; 
    }

    .sidenav{
        width: 40%;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
    }

    .login-form{
        margin-top: 50%;
    }

    .register-form{
        margin-top: 20%;
    }
    .login-main-text img{
    height: 100vh;

}
    #main2{
        display: none;
    }
    #main1{
        display: block;
    }
}


.login-main-text{
    padding-left: 60px;
    color: #005593;
}

.login-main-text h2{
    font-weight: 300;
}


.btn-green{
    background-color: #1c993d !important;
    color: #fff;
    font-size: medium;
    font-weight: bold;
    padding-left: 20px;
    padding-right: 20px;
}
</style>

<div class="main" id="main2">
        <div class="login-main-text">
            <img src="{{asset('img/background_kiri.png')}}" style="width: 100%;">
        </div>
</div>
<div class="sidenav">
        <div class="col-md-offset-2 col-md-8 col-sm-12">
                <div class="login-form">
                    <form method="post" action="{{ url('/login') }}">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <center>
                                    <img src="{{asset('img/logo_rubi.png')}}" alt="logo" class="logo-hr" srcset="">
                            </center>
                        </div>
                        <div class="form-group has-feedback {{ $errors->has('username') ? ' has-error' : '' }} ">
                            {{-- <label style="color: #fff;">username</label> --}}
                            <input style="font-size:medium;" type="username" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username">
                            <i class="glyphicon glyphicon-user form-control-feedback"></i>
                            @if ($errors->has('username'))
                                <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
        
                        <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                            {{-- <label style="color: #fff;">Password</label> --}}
                            <input style="font-size:medium;" type="password" class="form-control" placeholder="Password" name="password">
                            <i class="glyphicon glyphicon-lock form-control-feedback"></i>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        <button type="submit" class="btn btn-green">Log In</button>
                       <!--  <button type="submit" class="btn btn-secondary">Register</button> -->
                    
                    </form>
                </div>
            </div>
            <div class="col-md-offset-2 col-md-8 col-sm-12 div-teks">
                <center>
                        <p>Soekarno-Hatta Airport RUBI&copy;V.1 2019</p>
                </center>
            </div>
    
</div>
<div class="main" id="main1">
<div class="login-main-text">
    <img src="{{asset('img/background_kiri.png')}}" style="width: 100%;">
</div>
</div>

<!-- /.login-box -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/js/adminlte.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</html>
