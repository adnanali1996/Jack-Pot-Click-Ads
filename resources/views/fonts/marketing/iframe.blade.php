<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PTC | Advertise</title>
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/fontend_logo/icon.png')}}"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.0.1.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .progress{
            animation: fill {{$general->add_show}}s linear 1;
            background-color: #63e061;
            height: 20px !important;
            margin-top: 10px;
        }
        @keyframes fill {
            0% {
                width: 0%;
            }
            100% {
                width: 100%;
            }
        }
        .navbar-inverse {
            background-color: {{'#'.$general->theme}};
            border-color: {{'#'.$general->theme}};
        }
        input[type="text"], input[type=number]{
            width: 50px;
            padding: 5px;
            text-align: center;
        }
        @media only screen and (max-width: 767px) { 
            .pranto-responsive-form {
                text-align:  left !important;
            }
            
            .pranto-responsive-form .form-group {
                display: inline-block;
            }
        }
    </style>
</head>
<body oncontextmenu="return false">
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div id="err" class="text text-danger" style="margin-top: 10px; color: white;"></div>
            <div class="progress" id="progress-bar-pranto">
                <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"><span  style="font-size: 15px; font-weight: 600; color: #f00" class="count-text">{{$general->add_show}}</span><span style="font-size: 15px; font-weight: 600; color: #f00">'s</span></div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12 text-right pranto-responsive-form">

            <form class="form-inline">

                    <span id="pranto_roy" >
                        <div class="form-group">
                        <input  name="num1" id="cap_number_1"  value="1" type="hidden" readonly>
                    </div>
                    <div class="form-group"  style="display: none;">
                        <label for="exampleInputEmail2" style="color: #fff;"> + </label>
                        <input  name="num2" id="cap_number_2"  value="1" type="hidden"   readonly>
                    </div>
                    <div class="form-group"  style="display: none;">
                        <label for="exampleInputEmail2" style="color: #fff;">=</label>
                        <input name="result" type="number" id="cap_result" value="2"  required>
                    </div>
                    <div  class="form-group"  >
                        <div class="button-divgf">
                            <button type="button" class="btn btn-success navbar-btn cap_submit_btn" id="cap_submit_btn">Earn Money</button>
                        </div>
                    </div>

                    </span>
                <div  class="form-group">
                    <div class="button-div">
                        <button type="button" disabled class="btn btn-danger navbar-btn">Loading Add....</button>
                    </div>
                </div>
            </form>


        </div>
    </div>
</nav>

<div class="container" style="width: 100%; height: 100%">
    <div class="text-center">
        <iframe src="{{$add->link}}" width="100%" height="500px" seamless></iframe>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{url('/')}}/assets/process/jQuery.rcounter.js"></script>
<script src="{{url('/')}}/assets/process/waypoints.min.js"></script>
<script>
    $(document).ready(function(){

        $('#pranto_roy').hide();
        $('.progress').children().attr('id','progress-bar-pranto');

    var counternumber = $('.count-text');
        counternumber.counterUp({
            delay: 20,
            time: "{{$general->add_show * 1000}}"
        });
       var parntoTimeout =  setTimeout(function(){
            //$('.button-div').children('button').removeClass('btn-danger').addClass('btn-success').text('Earn Money');
            $('.button-div').children('button').removeClass('btn-danger').addClass('btn-success').text('Viewed');
            $('#pranto_roy').show();
        },"{{$general->add_show * 1000}}");
var clickPer = 0;
        $(document).on('click','#cap_submit_btn',function(){
            var numberOne = $('#cap_number_1').val();
            var numberTwo = $('#cap_number_2').val();
            var capResult = $('#cap_result').val();
            var sum  = parseInt(numberOne) + parseInt(numberTwo);
            if (capResult == sum ){
                $('#pranto_roy').css('display','none');
                 $('.button-div').css('display','none');
               if (clickPer == 0) {
                   var advertise = "{{$add->id}}";
                   var user_add = "{{$user_add->id}}";
                   var token = "{{csrf_token()}}";

                   $.ajax({
                       type: "POST",
                       url: "{{route('get.advertise.id')}}",
                       data: {
                           'advertise': advertise,
                           'user_add': user_add,
                           '_token': token
                       },
                       success: function (data) {
                       window.close();
                       localStorage.setItem("message", "Successfully earned money.");
                       window.location.href = "{{route('ptc.add.index')}}";
                       // console.log(data);
                       }
                   });
                   clickPer++;
               }
         
            }else{
                $('.button-div').children('button').removeClass('btn-success').addClass('btn-danger').text('Wrong Sum');
            }

        });
        var vis = (function(){
            var stateKey, eventKey, keys = {
                hidden: "visibilitychange",
                webkitHidden: "webkitvisibilitychange",
                mozHidden: "mozvisibilitychange",
                msHidden: "msvisibilitychange"
            };
            for (stateKey in keys) {
                if (stateKey in document) {
                    eventKey = keys[stateKey];
                    break;
                }
            }
            return function(c) {
                if (c) document.addEventListener(eventKey, c);
                return !document[stateKey];
            }
        })();



        vis(function(){
            $('#progress-bar-pranto').hide();
            $('#err').html("YOU SWITCHED THE TAB. RELOAD THE TAB AND WAIT");
            $('#pranto_roy').hide();
            clearTimeout(parntoTimeout);
            $('.button-div').children('button').removeClass('btn-success').addClass('btn-danger').text('Reload Page').attr('id','prnato_reload_page').prop('disabled',false);
        });

        $(document).on('click','#prnato_reload_page',function(){
            location.reload();
        });
  

    });
    document.onkeydown = function(e) {
        if(e.keyCode == 123) {
            return false;
        }
        if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
            return false;
        }
        if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
            return false;
        }
        if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
            return false;
        }

        if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)){
            return false;
        }
    };
</script>
</body>

</html>