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
                                          <th>الصلاحبات</th>
                                          <th class="text-center"> نعديل </th>
                                          <th class="text-center">الحالة </th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                      <?php $i = 0; ?>
                                      @foreach($admins as $admin)
                                          <tr>
                                              <td>{{ ++$i }}</td>
                                              <td>{{$admin->username}}</td>
                                              <td>{{$admin->email}}</td>
                                              <td>{{$admin->mobile}}</td>
                                              <td>
                                                @if($admin->super_admin==1)
                                                super admin
                                                @endif
                                               @if($admin->ads_admin==1)
                                               advertising Admin
                                               @endif
                                               @if($admin->websites_admin==1)
                                               website Admin
                                               @endif
                                              </td>
                                                <td><a href="{{url('/update-admin/'.$admin->id)}}"><i class="icon-pencil5"> </i> </a></td>
                                              <td>
                                                  @if($admin->status==1)
                                                    <a href="{{url('/deactivate-admin/'.$admin->id)}}" class="btn btn-danger">Deactivate </a>
                                                  @else
                                                    <a href="{{url('/activate-admin/'.$admin->id)}}" class="btn btn-success"> Activate</a>
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
