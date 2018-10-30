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
    <style>
        p {
            width: 120px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
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
                            @if(Auth::user()->u_type == 5)
                                <a href="{{url('/add-cure2us-offer')}}">
                                <span class="pull-right">
                                    <p class="btn btn-info btn-xs"> <i
                                                class="icon-plus-circle2"></i>  اضف العرض جديدة</p>
                                </span>
                                </a>
                                <a href="{{url('/your-cure2us-offer')}}">
                                <span class="pull-right">
                                    <p class="btn btn-info btn-xs" style="margin-left: 20px"> <i class="icon-list"></i> عروضك </p>
                                </span>
                                </a>

                            @endif
                            <h6 class="panel-title"><i class="icon-trophy4"> </i> عروض Cure2Us </h6>
                            <hr>
                        </div>
                        <div class="container-fluid">


                            <table class="table datatable-basic">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>اسم الشركة</th>
                                    <th>تاريخ الانتهاء</th>
                                    <th>التفاصيل</th>
                                    <th> قراة المزيد</th>
                                    <th style="display: none">#</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0; ?>
                                @foreach($offers as $offer)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <th style="display: none">#</th>
                                        <td>{{$offer->f_name}}</td>
                                        <td>{{$offer->expire_data}}</td>
                                        <td><p>{{$offer->description}} </p></td>
                                        <td>
                                            <a href="{{url('/details-cure2us-offers/'.$offer->id)}}"><i class="icon-eye2"></i> المزيد </a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

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