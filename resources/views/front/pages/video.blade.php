@extends('front.layout')
@section('script')

    <!-- /theme JS files -->
@stop
@section('content')
    <!-- Main content -->
    <!-- Featured Title -->
    <div id="featured-title" class="text-center" style="background-image:url('{{url("front/assets/img/bg-page-title.jpg")}} ')">
        <div id="featured-title-inner" class="wprt-container">
            <div class="featured-title-inner-wrap">
                <div class="featured-title-heading-wrap">
                    <h1 class="featured-title-heading ">مكتبة الفيديو</h1>
                </div>
            </div>
        </div>
    </div><!-- /#featured-title -->
    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Content area -->
        <div class="content">
            <!-- Main charts -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-flat">
                        <div class="container-fluid">
                            <div class="content">

                                <div class="col-md-12">
                                    <p align="center" style="padding-top: 40px">
                                    <iframe width="600px" height="300px"src="{{url($video->video_url)}}?autoplay=0">
                                    </iframe>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /main content -->
@stop