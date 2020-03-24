@if(Session::has('msg'))
    <script>
        $(document).ready(function(){
            swal("{{Session::get('msg')}}","", "success");
        });
    </script>
@endif
@if(Session::has('delmsg'))
    <script>
        $(document).ready(function(){
            swal("{{Session::get('delmsg')}}","", "warning");
        });

    </script>
@endif