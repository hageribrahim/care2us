@extends('front.layout')


@section('script')

    <!-- /theme JS files -->
    <!-- /theme JS files -->
@stop
@section('content')
    <!-- Featured Title -->
    <div id="featured-title" class="text-center"
         style="background-image:url('{{url("front/assets/img/bg-page-title.jpg")}} ')">
        <div id="featured-title-inner" class="wprt-container">
            <div class="featured-title-inner-wrap">
                <div class="featured-title-heading-wrap">
                    <h1 class="featured-title-heading "> تفاعلات الادوية</h1>
                </div>
            </div>
        </div>
    </div><!-- /#featured-title -->
    <!-- Main Content -->
    <main id="main-content">
        <div id="content-wrap">
            <div id="site-content" class="site-content clearfix">
                <div id="inner-content" class="inner-content-wrap">
                    <div class="page-content">
                        <div class="wprt-container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="wprt-spacer clearfix" data-desktop="70" data-mobi="60"
                                         data-smobi="60"></div>
                                </div><!-- /.col-md-12 -->

                                {{--<div class="col-md-12">--}}


                                    <div class="container">

                                        <div class="col-md-6" >
                                            <img src="{{url("front/assets/img/foodanddrugs.jpg")}}" style="width: 300px; height: 300px;" >
                                            <p style="font-size: large; color: black; ">
                                                <a href="{{url('/drugs-food')}}">  تفاعلات الادوية مع الطعام </a></p>
                                        </div>
                                        <div class="col-md-6">
                                            <img src="{{url("front/assets/img/drugs.jpg")}}"  style="width: 300px; height: 300px;">
                                            <p style="font-size: large; color: black; ">
                                                <a href="{{url('/drugs')}}"> تفاعلات الادوية مع بعضها </a>  </p>
                                        </div>

                                    </div>

                                {{--</div><!-- /.col-md-9 -->--}}

                                <div class="col-md-12">
                                    <div class="wprt-spacer clearfix" data-desktop="50" data-mobi="60"
                                         data-smobi="60"></div>
                                </div><!-- /.col-md-12 -->

                            </div>
                        </div>
                    </div>
                </div><!-- /.page-content -->
            </div><!-- /#inner-content -->
        </div><!-- /#site-content -->
        </div><!-- /#content-wrap -->
    </main> <!-- /#main-content -->

@stop
