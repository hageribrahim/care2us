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
                            <a href="{{url('/add-common-dieases')}}">

                            </a>
                            <h6 class="panel-title"><i class="icon-user-tie"> </i> وظائف خالية </h6>
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
                                            <th> اسم الناشر</th>
                                            <th>اسم الوطيفة</th>
                                            <th>نوع</th>
                                            <th>الحالة</th>
                                            <th> التفاصيل</th>
                                            <th> حذف</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @foreach($jobs as $job)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{$job->username}}</td>
                                                <td>{{$job->job_title}}</td>
                                                <td>{{$job->title}}</td>
                                                <td> @if( $job->status == 0 )
                                                        <p class="text-grey" style="font-size:16px; font-weight:600;">
                                                            انتظار</p>
                                                    @elseif($job->status ==1)
                                                        <p class="text-green" style="font-size:16px; font-weight:600;">
                                                            موافق</p>
                                                    @else
                                                        <p class="text-danger" style="font-size:16px; font-weight:600;">
                                                            غير موافق</p>
                                                    @endif</td>
                                                <td><a href="{{url('/details-jobs-fair/'.$job->id)}}"><i
                                                                class="icon-eye2"> </i> التفاصيل </a></td>
                                                <td><a href="{{url('/delete-job-fair/'.$job->id)}}"
                                                       onclick="return confirm('هل تريد حذف هذا العرض ؟');"><i
                                                                class="icon-trash"></i> حذف</a></td>
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
