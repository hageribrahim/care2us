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
                            <a href="{{url('/add-treat-abroad')}}">
                                <span class="pull-right">
                                    <p class="btn btn-info btn-xs"><i class="icon-plus-circle2"></i> اضف  العلاج بالخارج </p>
                                </span>
                            </a>
                            <h6 class="panel-title"><i class="icon-backspace"> </i>  العلاج بالخارج </h6>
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
                                          <th> اسم المستشفى </th>
                                          <th> البلد </th>
                                          <th> المحافظة </th>
                                          <th> تعديل </th>
                                          <th > حذف </th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php $i = 0; ?>
                                        @foreach($abroads as $abroad)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{$abroad->username}}</td>
                                                <td>{{$abroad->hospital}}</td>
                                                <td>{{$abroad->country_title}}</td>
                                                <td>{{$abroad->g_title}}</td>
                                                <td><a href="{{url('/update-treat-abroad/'.$abroad->id)}}"><i
                                                                class="icon-pencil5"> </i> تعديل </a></td>
                                                <td><a href="{{url('/delete-treat-abroad/'.$abroad->id)}}"
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
