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
    <!-- /theme JS files -->
@stop
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Content area -->
        <div class="content">
            <!-- Main charts -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                        
                            <h6 class="panel-title"><i class="icon-gift"> </i> الادوية المطلوبه </h6>
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
                                    <table class="table datatable-basic">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th> اسم الصيدلية</th>
                                            <th>اسم الدواء</th>
                                            <th>نوع التعامل</th>
                                            {{--<th>الايميل</th>--}}
                                            <th> الموبيل</th>
                                            <th>العنوان</th>
                                            <th >التفاصيل</th>
                                            <th class="text-center">الحالة</th>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @foreach($request_firm_phrma as $request)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{$request->pharm_name}}</td>
                                                <td>{{$request->medicine_name_en}}</td>
                                                <td>{{$request->title}}</td>
                                                    {{--<td>{{$request->email}}</td>--}}
                                                <td>{{$request->mobile}}</td>
                                                <td>{{$request->u_address}}</td>
                                                <td><a href="{{url('/details-request-medicine-pharm/'.$request->id)}}"><i
                                                                class="icon-eye"> </i> التفاصيل</a></td>

                                                <td>
                                                    @if($request->requst_pharm_status=="panding")
                                                        <div class="btn btn-warning">  {{$request->requst_pharm_status}} </div>
                                                    @elseif($request->requst_pharm_status=="accept")
                                                        <div class="btn btn-success">  {{$request->requst_pharm_status}} </div>
                                                    @else
                                                        <div class="btn btn-danger">  {{$request->requst_pharm_status}} </div>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /main charts -->
        </div>
        <!-- /content area -->

    </div>
    <!-- /main content -->
@stop
