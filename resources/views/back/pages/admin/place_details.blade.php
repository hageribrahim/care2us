@extends('back.layout')

@section('script')
    {{Html::script('back/assets/js/plugins/forms/styling/uniform.min.js') }}
    {{Html::script('back/assets/js/plugins/notifications/pnotify.min.js') }}
    {{Html::script('back/assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}
    {{Html::script('back/assets/js/core/app.js') }}
    {{Html::script('back/assets/js/pages/form_multiselect.js') }}
@stop

@section('content')
    <!-- Main content -->

    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Content area -->
        <div class="content">
            <!-- Main charts -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h6 class="panel-title"> التفاصيل المكان
                            </h6>
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


                                <div class="row">
                                    <p class="text-grey" style="font-size:16px; font-weight:600;">
                                        الاسم: {{$place->username}} </p>
                                    <p class="text-grey" style="font-size:16px; font-weight:600;"> الاسم
                                        المكان: {{$place->place_name}} </p>
                                    <p class="text-grey-600" style="font-size:16px; font-weight:600;"> العنوان
                                        :{{ $place->place_address}}</p>
                                    <p class="text-grey" style="font-size:16px; font-weight:600;">تاريخ النشر
                                        :{{ $place->publish_date}}</p>
                                    <p class="text-grey" style="font-size:16px; font-weight:600;">
                                                 نوع المكان : {{$place->title}}

                                    </p>

                                        @if( $place->status == 0 )
                                        <p class="text-grey" style="font-size:16px; font-weight:600;">الحالة: انتظار</p>
                                            @elseif($place->status ==1)
                                        <p class="text-green" style="font-size:16px; font-weight:600;">الحالة: موافق</p>
                                            @else
                                        <p class="text-danger" style="font-size:16px; font-weight:600;">الحالة:غير موافق</p>
                                            @endif

                                    <div class="col-md-6">
                                        <a href="{{url('/accept-sell-place/'.$place->id)}}"
                                           class="btn btn-success">
                                            <i class="icon-checkmark2"> </i>موافق   </a>
                                        <a href="{{url('/reject-sell-place/'.$place->id)}}"
                                           class="btn btn-danger">
                                            <i class="icon-cross2"> </i>غير موافق </a>

                                        <hr class="center">
                                    </div>
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
