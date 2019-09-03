<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  	<title>AP-HELPDESK</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css">
    <!-- BOOTSTRAP 4.1.3 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.5/css/uikit.min.css" />

    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('css/material-dashboard.css')}}">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<!-- UIKIT JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.5/js/uikit.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.5/js/uikit-icons.min.js"></script>
  {{-- <script type="text/javascript" src="{{asset('js/StarRating.js')}}"></script> --}}
  <script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

  <style>
        .ck-editor__editable {
            min-height: 300px;
        }
    .select2-container--default .select2-selection--single{
        max-width: 100%;
        width: 100%;
        border: 0 none;
        padding: 0 10px;
        border-radius: 0px;
        background: #fff;
        color: #666;
        border: 1px solid #e5e5e5;
        transition: .2s ease-in-out;
        transition-property: color,background-color,border;
    }
    .main-panel>.content {
        margin-top: 25px;
    }
    .logo > img{
            width: 100%;
        }
    @media only screen and (max-width: 600px) {
        body {
            background-color: lightblue;
        }
        .logo > img{
            width: 70%;
        }
        .logo{
            text-align: center;
        }
        .navbar .navbar-nav .nav-item .nav-link {
    position: relative;
    color: inherit;
    padding: 0.9375rem;
    font-weight: 400;
    font-size: 12px;
    text-transform: uppercase;
    border-radius: 3px;
    line-height: 20px;
    width: 50px;
}
.navbar .dropdown.show .dropdown-menu, .navbar .dropdown .dropdown-menu {
    background-color: white;
    border: 0;
    padding-bottom: 15px;
    transition: none;
    -webkit-box-shadow: none;
    box-shadow: none;
    transform: none !important;
    width: 90%;
    margin-bottom: 15px;
    padding-top: 0;
    height: auto;
    animation: none;
    opacity: 1;
    overflow-y: scroll;
}
.navbar .dropdown-menu .dropdown-item {
    margin-top: 0.5rem;
    margin-bottom: 0.5rem;
}
.dropdown-menu .dropdown-item, .dropdown-menu li>a {
    width: 100%;
}
        
    }

    </style>
  </head>
  
   <body>
    @yield('content')
    <script src="{{asset('js/sweetalert/dist/sweetalert.min.js')}}"></script>

    <!-- Include this after the sweet alert js file -->
    @include('sweet::alert')

  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
  <script>
      try {
      $('select').select2();
    } catch (e) {

    }
    //For notification
    var previous_notif = 0 ;
        function get_notif(){
            $.ajax({
                dataType: "json",
                url: "/notif",
                success: function (data) {
                    if(data.data.data_notif.length != previous_notif){
                        $("#notif").html('');
                        $(".number_notif").remove();
                        previous_notif = data.data.data_notif.length;

                        $.each(data.data.data_notif, function( key, element ) {
                            $("#notif").append("<a class='dropdown-item' href='"+element.link_id+"'>"+element.pesan+"</a>");
                            $('.count_notif').append("<span class='uk-badge uk-text-top notification number_notif animated heartBeat'>"+data.data.count_notif+"</span>");
                        });
                        
                    }
                    if(data.data.data_notif.length == 0){
                      $("#notif").html('');
                      $("#notif").append("<a class='dropdown-item' href='#'>Tidak Ada Notifikasi</a>");
                    }      
                }
                
            });
        }
        $('.select-kategori').on("select2:selecting", function(e) { 
            var teks = e.params.args.data.text.toLowerCase();
            if(teks == "cpu (pc)" || teks == "cpu(pc)" || teks == "cpu"){
                $('.select-sernum').prop('disabled', false);
            }else{
                $('.select-sernum').prop('disabled', true);
            }
        });
        $('.select-sernum').prop('disabled', true);
        get_notif();
        setInterval(function(){
            get_notif();
        },60000);

                        ClassicEditor
                                .create( document.querySelector( '#editor' ),{
                                    resize: {
                                        minHeight: 300,
                                        maxHeight: 800
                                    }
                                } )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
  </script>
</html>
