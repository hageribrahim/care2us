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
                                @if(session()->has('success'))
                                    <div calss="col-md-6 col-md-offset-3">
                                        <div class="alert alert-success text-center">
                                            {{ session()->get('success') }}
                                        </div>
                                    </div>
                                @endif
                            <?php $i=0; ?>
                                <div class="panel panel-flat">
                                    <table class="table datatable-basic container">
                                        <thead>
                                        <tr>
                                            <th> #</th>
                                            <th>الموضوع</th>
                                            <th>التفاصيل</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($videos))
                                            @foreach($videos as $video )
                                                <tr>
                                                    <th> {{++$i }}</th>
                                                    <th> {{$video->title}}</th>
                                                    <th> <a href="{{url('/video/'.$video->id)}}"><i class="icon-eye"></i> تفاصيل</a></th>


                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <p>no data</p>
                                            </tr>

                                        @endif
                                        </tbody>
                                    </table>
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