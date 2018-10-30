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
                                        اسم الشركة: {{$order->f_name}} </p>
                                    <p class="text-grey" style="font-size:16px; font-weight:600;">
                                        اسم الصيدلية: {{$order->pharm_name}} </p>
                                    <p class="text-grey-600" style="font-size:16px; font-weight:600;"> نوع التعامل
                                        :{{ $order->title}}</p>
                                    <p class="text-grey" style="font-size:16px; font-weight:600;">التفاصيل
                                        :{{ $order->detils}}</p>
                                    @if(  $order->requst_pharm_status == 'panding')
                                        <p class="text-grey" style="font-size:16px; font-weight:600;">الحالة: انتظار</p>
                                    @elseif($order->requst_pharm_status =='accept')
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
