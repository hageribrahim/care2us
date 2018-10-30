@extends('back.layout')
@section('script')
<!-- Theme JS files -->
{{Html::script('back/assets/js/plugins/visualization/d3/d3.min.js') }}
{{Html::script('back/assets/js/plugins/visualization/d3/d3_tooltip.js') }}
{{Html::script('back/assets/js/plugins/forms/styling/switchery.min.js') }}
{{Html::script('back/assets/js/plugins/forms/styling/uniform.min.js') }}
{{Html::script('back/assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}
{{Html::script('back/assets/js/plugins/ui/moment/moment.min.js') }}
{{Html::script('back/assets/js/plugins/pickers/daterangepicker.js') }}
{{Html::script('back/assets/js/plugins/tables/datatables/datatables.min.js') }}
{{Html::script('back/assets/js/plugins/forms/selects/select2.min.js') }}
{{Html::script('back/assets/js/core/app.js') }}
{{Html::script('back/assets/js/pages/datatables_basic.js') }}
{{Html::script('back/assets/js/plugins/ui/ripple.min.js') }}
{{Html::script('back/assets/js/pages/dashboard.js') }}
@stop
@section('content')
<div class="content-wrapper">
    <!-- Content area -->
    <div class="content">
        <!-- Main charts -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h6 class="panel-title"><i class="icon-eye"> </i> تفاصيل عن الدواء</h6>
                    </div>
                    <div class="container-fluid">
                        <div class="content">
                            <div class="col-md-6">
                                <h3 style="font-size: 18px"> اسم:
                                    <span> {{ $orders->username}} </span></h3>
                                <h3 style="font-size: 18px"> اسم الصيدلية:
                                    <span> {{ $orders->pharm_name}} </span></h3>
                                <h3 style="font-size: 18px"> تليفون:
                                    <span> {{ $orders->mobile}}</span></h3>
                                <h3 style="font-size: 18px"> الايميل:
                                    <span> {{ $orders->email}}</span></h3>
                                <h3 style="font-size:18px">أسم الدواء:
                                    <span> {{ $orders->medicine_name_en}}</span></h3>
                                <h3 style="font-size:18px">الكمية:
                                    <span> {{ $orders->quantity}}</span></h3>

                            </div>
                            <div class="col-md-6">
                                <h3 style="font-size:18px">نوع التعامل:
                                    <span> {{ $orders->title}}</span></h3>
                                @if($orders->deal_type_id==2)
                                <h3 style="font-size:18px">تاريخ الانتهاء:
                                    <span> {{ $orders->expire_date}}</span></h3>
                                @endif
                                <h3 style="font-size:18px">العنوان:
                                    <span> {{ $orders->location}}</span></h3>
                                <h3 style="font-size: 18px"> التفاصيل :
                                    <span> {{ $orders->detils}}</span>
                                </h3>
                                <h3 style="font-size: 18px"> الحالة :
                                    @if($orders->requst_pharm_status=="panding")
                                    <div class="btn btn-warning">  {{$orders->requst_pharm_status}} </div>
                                    @elseif($orders->requst_pharm_status=="accept")
                                    <div class="btn btn-success">  {{$orders->requst_pharm_status}} </div>
                                    @else
                                    <div class="btn btn-danger">  {{$orders->requst_pharm_status}} </div>
                                    @endif
                                </h3>
                                @if($orders->requst_pharm_status=="panding")
                                    <a href="{{url('/accept-request/'.$orders->id)}}" class="btn bg-success"><i class="icon-checkmark3"></i> موافق</a>
                                    <a href="{{url('/reject-request/'.$orders->id)}}" class="btn bg-danger"><i class="icon-cross3"></i>  غير موافق </a>
                                @elseif($orders->requst_pharm_status=="accept")
                                    <div class="btn btn-success">  {{$orders->requst_pharm_status}} </div>
                                @else
                                    <div class="btn btn-danger">  {{$orders->requst_pharm_status}} </div>
                                @endif

                                {{--<form method="post" action="{{url('/update-status-request-medicine/'.$orders->id)}}">--}}
                                    {{--{{ csrf_field() }}--}}

                                    {{--<label for="status"  style="font-size:18px">الحالة:</label>--}}

                                    {{--<select name="status"class="form-control form-app" style="width: 50%">--}}

                                        {{--@if( $orders->requst_pharm_status=="pending")--}}
                                        {{--<option name="status" value="{{$orders->requst_pharm_status}}"--}}
                                                    {{--selected="selected"> {{$orders->requst_pharm_status}}</option>--}}
                                        {{--<option name="status" value="accept"--}}
                                                    {{--style="margin-right: 39px;">accept--}}
                                            {{--</option>--}}
                                        {{--<option name="status" value="rejected"--}}
                                                    {{--style="margin-right: 39px;">rejected--}}
                                            {{--</option>--}}
                                        {{--@elseif($orders->requst_pharm_status=="accept")--}}
                                        {{--<option name="status" value="pending">pending</option>--}}
                                        {{--<option name="status"--}}
                                                    {{--value="{{$orders->requst_pharm_status}}"--}}
                                                    {{--selected="selected">{{$orders->requst_pharm_status}}</option>--}}
                                        {{--<option type="radio" name="status" value="rejected">rejected--}}
                                            {{--</option>--}}
                                        {{--@else($orders->requst_client_status =="rejected")--}}
                                        {{--<option name="status" value="pending"> pending</option>--}}
                                        {{--<option name="status" value="accept"> accept</option>--}}
                                        {{--<option name="status" value="{{$orders->requst_pharm_status}}"--}}
                                                    {{--selected="selected">{{$orders->requst_pharm_status}}</option>--}}
                                        {{--@endif--}}
                                        {{--</select>--}}
                                    {{--</form>--}}

                                {{--</div>--}}
                            {{--<div class=" col-md-12">--}}
                                {{--<div class="form-group text-center">--}}
                                    {{--<button type="submit" class="btn btn-info">--}}

                                        {{--تعديل--}}

                                        {{--</button>--}}
                                    {{--</div>--}}
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

