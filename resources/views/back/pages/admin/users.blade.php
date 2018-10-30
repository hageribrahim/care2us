@extends('back.layout')
@section('script')
    <!-- Theme JS files -->
    {{Html::script('back/assets/js/plugins/tables/datatables/datatables.min.js') }}
    {{Html::script('back/assets/js/plugins/forms/selects/select2.min.js') }}
    {{Html::script('back/assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js') }}
    {{Html::script('back/assets/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js') }}
    {{Html::script('back/assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js') }}
    {{Html::script('back/assets/js/plugins/tables/datatables/extensions/buttons.min.js') }}
    {{Html::script('back/assets/js/core/app.js') }}
    {{Html::script('back/assets/js/pages/datatables_extension_buttons_html5.js') }}
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
                            <a href="{{url('/add-admin')}}">
                                <span class="pull-right">
                                    <p class="btn btn-info btn-xs"><i class="icon-plus-circle2"></i> اضف ادمن</p>
                                </span>
                            </a>
                            <h6 class="panel-title"><i class="icon-users"> </i>ادمن</h6>
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
                                    <table class="table datatable-button-html5-basic">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>اسم</th>
                                            <th>الايميل</th>
                                            <th>تليفون</th>
                                            <th class="text-center"> الدفع </th>
                                            <th class="text-center">الحالة </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{$user->username}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->mobile}}</td>
                                                <td>
                                                    @if($user->paid == 1)
                                                        <a href="{{url('/unpaid/'.$user->id)}}" class="btn bg-danger"><i class="icon-cross3"></i>  غير موافق </a>

                                                    @else
                                                        <a href="{{url('/paid/'.$user->id)}}" class="btn bg-success"><i class="icon-checkmark3"></i>  موافق</a>
                                                    @endif
                                                </td>

                                                <td>
                                                    @if($user->status==1)
                                                        <a href="{{url('/deactivate-user/'.$user->id)}}" class="btn btn-danger">Deactivate </a>
                                                    @else
                                                        <a href="{{url('/activate-user/'.$user->id)}}" class="btn btn-success"> Activate</a>
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
