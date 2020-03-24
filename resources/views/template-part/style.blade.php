
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{url('/')}}/assets/admin_assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('/')}}/assets/admin_assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('/')}}/assets/admin_assets/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{url('/')}}/assets/admin_assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('/')}}/assets/admin_assets/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('/')}}/assets/admin_assets/css/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{url('/')}}/assets/admin_assets/css/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('/')}}/assets/admin_assets/css/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="{{url('/')}}/assets/admin_assets/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css" />
    <link href="{{url('/')}}/assets/admin_assets/css/bootstrap-modal.css" rel="stylesheet" type="text/css" />
    <link href="{{url('/')}}/assets/admin_assets/css/sweetalert.css" rel="stylesheet">
    <link href="{{url('/')}}/assets/admin_assets/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <link href="{{url('/')}}/assets/admin_assets/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="{{url('/')}}/assets/admin_assets/js/sweetalert.js"></script>
    <link rel="stylesheet" href="{{url('/')}}/assets/admin_assets/css/sweetalert.css">
    <link rel="stylesheet" href="{{url('/')}}/assets/font_awesome/css/fontawesome-iconpicker.css">
    <link rel="stylesheet" href="{{url('/')}}/assets/font_awesome/css/fontawesome-iconpicker.min.css">

    <script src="{{url('/')}}/assets/admin_assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="{{url('/')}}/assets/admin_assets/sweetalert.min.js" type="text/javascript"></script>
    <script src="{{url('/')}}/assets/admin_assets/new.fontawesome.js " type="text/javascript"></script>
    <script src="{{url('/')}}/assets/admin_assets/js/bootstrap-datepicker.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <style>
        .page-header.navbar {
            background-color: #257db9;
        }
    </style>
    <style>
        .preloader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: #fff;
            z-index: 99;
            display: table; }

        .preloader-wrapper {
            display: table-cell;
            vertical-align: middle;
            text-align: center; }

        .preloader-img {
            position: relative;
            display: inline-block;
            padding: 20px;
            border-radius: 50%; }

        .preloader-img:before {
            position: absolute;
            left: 0%;
            top: 0%;
            width: 100%;
            height: 100%;
            content: '';
            /*animation: rotating 2s linear infinite; */
        }

        .preloader-img img {
            /*animation: rotatingTWo 2s linear infinite; */
        }

        @keyframes rotating {
            0% {
                transform: rotate(0deg); }
            100% {
                transform: rotate(360deg); } }
        @keyframes rotatingTWo {
            0% {
                transform: rotatey(360deg); }
            100% {
                transform: rotatey(0deg); } }
    </style>
<style>
    .icon-picker-list {
        display: flex;
        flex-flow: row wrap;
        list-style: none;
        padding-left: 0;
    }

    .icon-picker-list li {
        display: flex;
        flex: 0 0 20%;
        float: left;
        width: 20%;
    }

    .icon-picker-list a {
        background-color: #f9f9f9;
        border: 1px solid #fff;
        color: black;
        display: block;
        flex: 1 1 auto;
        font-size: 12px;
        line-height: 1.4;
        min-height: 100px;
        padding: 10px;
        text-align: center;
        user-select: none;
    }

    .icon-picker-list a:hover,
    .icon-picker-list a.active{
        background-color: #009E49;
        color: #fff;
        cursor: pointer;
        text-decoration: none;
    }

    .icon-picker-list .fa {
        font-size: 24px;
        margin-bottom: 10px;
        margin-top: 5px;
    }

    .icon-picker-list .name-class {
        display: block;
        text-align: center;
        word-wrap: break-word;
    }
    li span.title {
        font-weight: 550;
    }
</style>
    <style>
        .page-header.navbar {
            background-color: #9b59b6;
            background-color: #516193;
        }
        .page-sidebar .page-sidebar-menu>li.active.open>a, .page-sidebar .page-sidebar-menu>li.active>a, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu>li.active.open>a, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu>li.active>a
        ,.page-sidebar:hover .page-sidebar-menu>li.active>a:hover,
        .page-sidebar .page-sidebar-menu>li.open>a, .page-sidebar .page-sidebar-menu>li:hover>a, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu>li.open>a, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu>li:hover>a
        {
            background-color: #9b59b6;
            background-color: #516193;

        }
        .page-sidebar.navbar-collapse.collapse,
        body{
            background: #191616;
            background: #516193;
        }

        /*
         * Shine
         */

        .nav-item.active > a {
            position: relative;
            overflow: hidden;
            display: inline-block;
            margin: 25px 0 25px 25px;
        }

        .nav-item.active > a:after {
            animation: shine 4s ease-in-out  infinite;
            animation-fill-mode: forwards;
            content: "";
            position: absolute;
            top: -210%;
            left: -410%;
            width: 500%;
            height: 240%;
            opacity: 0;
            transform: rotate(30deg);

            background: rgba(255, 255, 255, 0.13);
            background: linear-gradient(
                    to right,
                    rgba(255, 255, 255, 0.13) 0%,
                    rgba(255, 255, 255, 0.13) 77%,
                    rgba(230, 248, 255, 0.5) 92%,
                    rgba(255, 255, 255, 0.0) 100%
            );
        }
        /* Active state */
        .nav-item.active > a:after {
            opacity: 0;
        }
        @keyframes shine{
            10% {
                opacity: 1;
                top: -30%;
                left: -30%;
                transition-property: left, top, opacity;
                transition-duration: 0.9s, 0.9s, 0.15s;
                transition-timing-function: ease;
            }
            100% {
                opacity: 0;
                top: -30%;
                left: -30%;
                transition-property: left, top, opacity;
            }
        }
    </style>



