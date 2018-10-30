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
                    <h1 class="featured-title-heading ">خطوط العلاج </h1>
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
                            <a href="{{url('/client-request-medicine')}}">

                            </a>
                            <hr>
                        </div>
                        <div class="container-fluid">
                            <div class="content">
                                @if(session()->has('success'))
                                    <div calss="col-md-6 col-md-offset-3">
                                        <div class="alert alert-success text-center">
                                            {{ session()->get('success') }}
                                        </div>
                                    </div>
                                @endif
                                <div class="panel panel-flat">
                                    <table class="table datatable-basic container">
                                        <thead>
                                        <tr>
                                            <th> اسم الدواء</th>
                                            <th> الشركة</th>
                                            <th>المجموهة التابع لها</th>
                                            <th>نوع</th>
                                            <th>المادة الفعالة</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($medicines))
                                            @foreach($medicines as $medicine )
                                                <tr>
                                                    <th> {{$medicine->medicine_name_ar}}</th>
                                                    <th> {{$medicine->f_name}}</th>
                                                    <th> {{$medicine->active_substance_en}}</th>
                                                    <th> {{$medicine->title}}</th>
                                                    <th> {{$medicine->active_substance}}</th>
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