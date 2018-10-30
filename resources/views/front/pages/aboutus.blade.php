@extends('front.layout')
@section('content')
    <!-- Featured Title -->
    <div id="featured-title" class="text-center"
         style="background-image:url('{{url("front/assets/img/bg-page-title.jpg")}} ')">
        <div id="featured-title-inner" class="wprt-container">
            <div class="featured-title-inner-wrap">
                <div class="featured-title-heading-wrap">
                    <h1 class="featured-title-heading ">About Us</h1>
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

                                <div class="col-md-12">
                                    <div class="wprt-spacer clearfix" data-desktop="0" data-mobi="30"
                                         data-smobi="30"></div>

                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="wprt-headings clearfix">
                                                <h2 class="heading">Who we are</h2>
                                            </div>


                                            @foreach($about as $aboutpage)
                                                <?php
                                                echo $aboutpage->about_text;
                                                ?>
                                            @endforeach

{{--
                                            <div class="wprt-spacer clearfix" data-desktop="40" data-mobi="40"
                                                 data-smobi="40"></div>--}}

                                        </div><!-- /.col-md-12 -->
                                    </div><!-- /.row -->

                                </div><!-- /.col-md-9 -->

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
