@extends('back.layout')
@section('script')
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

    <script>
        $(document).ready(function () {
            $(document).on('change', '#firm_type', function () {
                var Coun_id = $(this).val();
                var div = $(this).parent();
                var op = "";
                console.log(Coun_id);
                $.ajax({
                    type: 'get',
                    url: '{!! \Illuminate\Support\Facades\URL::to('/getFirms')!!}',
                    data: {'id': Coun_id},
                    success: function (data) {
                        console.log('success');
                        console.log(data);
                        op += '<option value="0" selected disabled>من فضلك اختر الشركة</option>';
                        for (var i = 0; i < data.length; i++) {
                            op += '<option value="' + data[i].user_id + '">' + data[i].f_name + '</option>';
                        }
                        $('#firm').html("");
                        $('#firm').append(op);
                    },
                    error: function () {
                        console.log('error');
                    }
                });
            });
        });
    </script>


    <script>
        $(document).ready(function () {
            $(document).on('change', '#firm', function () {
                var Coun_id = $(this).val();
                var div = $(this).parent();
                var op = "";
                console.log(Coun_id);
                $.ajax({
                    type: 'get',
                    url: '{!! \Illuminate\Support\Facades\URL::to('/getMedicine')!!}',
                    data: {'id': Coun_id},
                    success: function (data) {
                        console.log('success');
                        console.log(data);
                        op+='<?php $i = 0; ?>';
                        for (var i = 0; i < data.length; i++) {
                            op+='<tr><td>'+ i +'</td><td><div><input type="checkbox" class="styled checker border-primary text-primary"  name="medicine[]" value="'+data[i].id+'"></div> </td><td>'+data[i].medicine_name_en+'</td>  <td>'+data[i].price+'</td> <td>'+data[i].discount+' </td> <td><div> <input type="text" name="quantity[]" class="form-control form-app"></div></td></tr>';
                        }


                        $('#medicine').html("");
                        $('#medicine').append(op);
                    },
                    error: function () {
                        console.log('error');
                    }
                });
            });
        });
    </script>

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
                            <h6 class="panel-title">
                                @if(isset($request_firm_phrma))
                                    <i class="icon-pencil5"> </i>  تعديل طلب دواء </h6>
                            @else
                                <i class="icon-truck"> </i> أطلب دواء </h6>
                            @endif
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
                                <form method="post" action="{{url('/store-request-pharm-medicine')}}" >
                                    {{ csrf_field() }}
                                    <div class=" col-md-4">
                                        <div class="form-group">
                                            <label for="firm_type">نوع الشركة *</label>
                                            <select name="firm_type" class="form-control" id="firm_type"
                                                    onchange="select(this);">
                                                @if(isset($request_firm_phrma))
                                                    <option value="0" selected disabled>من فضلك اختر الشركة</option>
                                                    @foreach($f_types as $f_type)
                                                        <option value="{{$f_type->id}}"
                                                                @if($request_firm_phrma->firm_type_id == $f_type->id) ?
                                                                {{'selected="selected"' }}: {{  null }} @endif>{{$f_type->title}}</option>
                                                    @endforeach
                                                @else
                                                    <option value="0" selected disabled>من فضلك اختر الشركة</option>
                                                    @foreach($f_types as $f_type)
                                                        <option value="{{$f_type->id}}"
                                                                @if(old('firm_type') == $f_type->id) ?
                                                                {{'selected="selected"' }}: {{  null }} @endif>{{$f_type->title}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @if($errors->has('firm_type'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('firm_type') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" col-md-4">
                                        <div class="form-group">
                                            <label for="deal_type">نوع التعامل *</label>
                                            <select name="deal_type" class="form-control" onchange="treat(this);">
                                                <option value="0" selected disabled>من فضلك نوع التعامل</option>
                                                @if(isset($request_firm_phrma))
                                                    @foreach($deals_types as $deal_type)
                                                        <option value="{{$deal_type->id}}"
                                                                @if($request_firm_phrma->deal_type_id == $deal_type->id) ?
                                                                {{'selected="selected"' }}: {{  null }} @endif>{{$deal_type->title}}</option>
                                                    @endforeach
                                                @else
                                                    @foreach($deals_types as $deal_type)
                                                        <option value="{{$deal_type->id}}" {{ (old('deal_type') == $deal_type->id) ? 'selected="selected"' : null }} >{{$deal_type->title}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @if($errors->has('deal_type'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('deal_type') }}</small>
                                                </span>
                                            @endif
                                        </div>

                                    </div>

                                    <div class=" col-md-4">
                                        <div class="form-group">
                                            <label for="firm">اسم الشركة *</label>
                                            <select name="firm" id="firm" class="form-control">
                                                @if(isset($request_firm_phrma))
                                                    <option value="0"> من فضلك اختر الشركة</option>
                                                    @foreach($firms as $firm)
                                                        <option value="{{$firm->id}}"
                                                                @if($request_firm_phrma->firm_id == $firm->id) ?
                                                                {{'selected="selected"' }}: {{  null }} @endif>{{$firm->f_name}}</option>
                                                    @endforeach
                                                @else
                                                    <option value="0" selected disabled> من فضلك اختر الشركة</option>
                                                @endif
                                            </select>
                                            @if($errors->has('firm'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('firm') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" col-md-4">
                                        <div class="form-group" id="distrib" style="display: none;">
                                            <label for="distrib">اسم الشركة توزيع *</label>
                                            <select name="distrib" id="distrib" class="form-control">
                                                <option value="0"> من فضلك اختر الشركة توزيع</option>
                                                @foreach($distrubtes as $distrubte)
                                                    <option value="{{$distrubte->id}}"
                                                            @if(isset($request_firm_phrma)&& $request_firm_phrma->firm_id == $distrubte->id) ?
                                                            {{'selected="selected"' }}: {{  null }} @endif>{{$distrubte->f_name}}</option>
                                                @endforeach

                                            </select>
                                            @if($errors->has('distrib'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('distrib') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" col-md-4">
                                        <div class="form-group" id="expire" style="display: none;">
                                            <label for="expire">تاريخ الانتهاء *</label>
                                            <input type="date" id="expire" name="expire"
                                                   value="{{ old('expire') }}"
                                                   class="form-control form-app">
                                            @if($errors->has('expire'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('expire')}}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-12" style="border: 1px solid #263238"  >
                                        <table class="table datatable-basic">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th> اختر</th>
                                                <th>اسم الدواء</th>
                                                <th>سعر العبوة الواحدة</th>
                                                <th>الخصم</th>
                                                <th> الكمية المطلوبة</th>
                                            </tr>
                                            </thead>
                                            <tbody  id="medicine">



                                            </tbody>
                                        </table>
                                    </div>

                                    <br>

                                    <div class=" col-md-6" style="margin-top: 20px">
                                        <div class="form-group" id="expire">
                                            <label for="location">المكان *</label>
                                            <input type="url" id="location" name="location"
                                                   value="{{ old('location') }}"
                                                   class="form-control form-app" required="true">
                                            @if($errors->has('location'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('location')}}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" col-md-6" style="margin-top: 20px">
                                        <div class="form-group ">
                                            <label for="details">التفاصيل *</label>
                                            <textarea id="details" name="details" value="{{ old('details') }}"
                                                      class="form-control"
                                                      required="">  @if(isset($request_firm_phrma))
                                                    {{$request_firm_phrma->detils}}
                                                @endif </textarea>

                                            @if($errors->has('details'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('details') }}</small>
                                                </span>
                                            @endif

                                        </div>
                                    </div>
                                    <div class=" col-md-12">
                                        <div class="form-group text-center">
                                                <button type="submit" class="btn btn-info">اطلب</button>

                                        </div>
                                    </div>
                                </form>
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

    <script>
        function select(that) {
            if (that.value == 3) {
                // alert("3");
                document.getElementById("distrib").style.display = "none";
                $("#distrib").prop('required', false);
            } else {
                // alert("not select 3");
                document.getElementById("distrib").style.display = "block";
                $("#distrib").prop('required', true);
            }
        }
    </script>

    <script>
        function treat(that) {
            if (that.value == 2) {
                // alert("3");
                document.getElementById("expire").style.display = "block";
                $("#expire").prop('required', true);


            } else {
                // alert("not select 3");

                document.getElementById("expire").style.display = "none";
                $("#expire").prop('required', false);
            }
        }
    </script>


@stop
