@extends('front.layout')
@section('script')

@stop
@section('content')
    <!-- Main content -->
    <!-- Featured Title -->
    <div id="featured-title" class="text-center" style="background-image:url('{{url("front/assets/img/bg-page-title.jpg")}} ')">
        <div id="featured-title-inner" class="wprt-container">
            <div class="featured-title-inner-wrap">
                <div class="featured-title-heading-wrap">
                    <h1 class="featured-title-heading "> تفاعلات الادوية مع الطعام</h1>
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
                        <div class="panel-heading">
                            <hr>
                        </div>
                        <div class="container-fluid">
                            <div class="content">
                                <div class="panel panel-flat">
                                    <table class="table datatable-basic container">
                                        <thead>
                                        <tr>
                                            <th> اسم الدواء</th>
                                            <th>الطعام المتفاعل معه</th>
                                            <th>النتيجة</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($drugs))

                                            @foreach($drugs as $drug )
                                                <tr>
                                                    <th> {{$drug->medcine}}</th>
                                                    <th> {{$drug->food}}</th>
                                                    <th> {{$drug->result}}</th>
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