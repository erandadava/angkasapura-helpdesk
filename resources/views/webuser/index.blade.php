<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  	<title>AP-HELPDESK</title>
    <meta charset="utf-8">
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
    </style>
  </head>
  
   <body>
    @yield('content')
    <script src="{{asset('js/sweetalert/dist/sweetalert.min.js')}}"></script>

    <!-- Include this after the sweet alert js file -->
    @include('sweet::alert')

  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
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
                            $('.count_notif').append("<span class='notification number_notif animated heartBeat'>"+data.data.count_notif+"</span>");
                        });
                        
                    }
                    if(data.data.data_notif.length == 0){
                      $("#notif").html('');
                      $("#notif").append("<a class='dropdown-item' href='#'>Tidak Ada Notifikasi</a>");
                    }      
                }
                
            });
        }
        
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
