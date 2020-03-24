@extends('fonts.layouts.user')
@section('site')
    | Binary | Summery
@endsection
@section('style')
    <style>
        /*Now the CSS*/
        div,ul,li {margin: 0; padding: 0;}

        .tree ul
        {
            padding-top: 20px;
            position: relative;
            transition: all 0.5s;
        }

        .tree li
        {
            float: left;
            text-align: center;
            list-style-type: none;
            position: relative;
            padding: 20px 5px 0 5px;
            transition: all 0.5s;
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
        }
        .tree li::before, .tree li::after
        {
            content: '';
            position: absolute;
            top: 0;
            right: 50%;
            border-top: 1px solid #ccc;
            width: 50%; height: 20px;
        }
        .tree li::after
        {
            right: auto; left: 50%;
            border-left: 1px solid #ccc;
        }
        .tree li:only-child::after, .tree li:only-child::before {
            display: none;
        }
        .tree li:only-child{ padding-top: 0;}
        .tree li:first-child::before, .tree li:last-child::after{
            border: 0 none;
        }
        .tree li:last-child::before{
            border-right: 1px solid #ccc;
            border-radius: 0 5px 0 0;
            -webkit-border-radius: 0 5px 0 0;
            -moz-border-radius: 0 5px 0 0;
        }
        .tree li:first-child::after{
            border-radius: 5px 0 0 0;
            -webkit-border-radius: 5px 0 0 0;
            -moz-border-radius: 5px 0 0 0;
        }

        /*Time to add downward connectors from parents*/
        .tree ul ul::before{
            content: '';
            position: absolute; top: 0; left: 50%;
            border-left: 1px solid #ccc;
            width: 0; height: 20px;
        }

        .tree li a{
            border: 1px solid #ccc;
            padding: 2px 30px;
            text-decoration: none;
            color: #666;
            font-family: verdana, tahoma;
            font-size: 20px;
            display: inline-block;
            border-radius: 5px;
            transition: all 0.5s;
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
        }
        .tree li a:hover, .tree li a:hover+ul li a {
            background: #c8e4f8; color: #000; border: 1px solid #94a0b4;
        }
        /*Connector styles on hover*/
        .tree li a:hover+ul li::after,
        .tree li a:hover+ul li::before,
        .tree li a:hover+ul::before,
        .tree li a:hover+ul ul::before{
            border-color:  #94a0b4;
        }

        /*responsive for user dashboard*/
        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .tree li {
                padding: 22px 36px 0 36px !important;
            }
        }

    </style>
@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="bold">Binary Summary</h3>
            <div class="row">

                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-body">

                            <div class="col-md-6 col-sm-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"> <h4 class="bold"  style="color:#fff;">Your Current BV</h4></div>
                                    <div class="panel-body">
                                        <div class="tree">
                                            <ul>
                                                <li>
                                                    <a href="#">{{Auth::user()->username}}</a>
                                                    <ul>
                                                        <li>
                                                            <a href="#"><b>LEFT SIDE</b> :{{$cbv->left_bv}}</a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><b>RIGHT SIDE</b> :{{$cbv->right_bv}}</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6 col-sm-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"> <h4  class="bold"  style="color:#fff"> PAID Member On Your Tree</h4></div>
                                    <div class="panel-body">
                                        <div class="tree">
                                            <ul>
                                                <li>
                                                    <a href="#">{{Auth::user()->username}}</a>
                                                    <ul>
                                                        <li>
                                                            <a href="#"><b>LEFT SIDE</b> :{{$cbv->left_paid}}</a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><b>RIGHT SIDE</b> :{{$cbv->right_paid}}</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-8 col-md-offset-2 col-sm-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"> <h4 class="bold" style="color:#fff;"> FREE Member On Your Tree</h4></div>
                                    <div class="panel-body">
                                        <div class="tree">
                                            <ul>
                                                <li>
                                                    <a href="#">{{Auth::user()->username}}</a>
                                                    <ul>
                                                        <li>
                                                            <a href="#"><b>LEFT SIDE</b> :{{$cbv->left_free}}</a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><b>RIGHT SIDE</b> :{{$cbv->right_free}}</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
@endsection