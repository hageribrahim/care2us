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
                            <h6 class="panel-title"> التفاصيل 
                            </h6>
                            <hr>
                        </div>
                        <div class="container-fluid">
                            <div class="content">


                                <div class="row">
                                    <p class="text-grey" style="font-size:16px; font-weight:600;">
                                        الدوله: {{$request->country_title}} </p>
                                    <p class="text-grey" style="font-size:16px; font-weight:600;">
                                        المحافظه: {{$request->g_title}} </p>
                                    <p class="text-grey-600" style="font-size:16px; font-weight:600;">المنطقه
                                        :{{ $request->c_title}}</p>
                                    <p class="text-grey" style="font-size:16px; font-weight:600;">اسم الصيدليه
                                        :{{ $request->username}}</p>
                                    <p class="text-grey" style="font-size:16px; font-weight:600;">الادويه الموصوفه
                                        :{{ $request->medicin}}</p>
                                    <p class="text-grey" style="font-size:16px; font-weight:600;">التفاصيل العنوان
                                        :{{ $request->detils}}</p>
                                    <p class="text-grey" style="font-size:16px; font-weight:600;">الموقع
                                        :  <a href="{{url($request->location)}}" target="_blank">{{ $request->location}}</a> </p>

                                    @if(  $request->requst_client_status == 'pending')
                                        <p class="text-grey" style="font-size:16px; font-weight:600;">الحالة: انتظار</p>
                                    @elseif($request->requst_client_status =='accept')
                                        <p class="text-green" style="font-size:16px; font-weight:600;">الحالة: موافق</p>
                                    @else
                                        <p class="text-danger" style="font-size:16px; font-weight:600;">الحالة:غير موافق</p>
                                    @endif
                                    <hr class="center">

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
