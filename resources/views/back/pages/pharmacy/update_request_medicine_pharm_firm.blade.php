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
                        op += '<option value="0" selected disabled>من فضلك اختر الدواء</option>';
                        for (var i = 0; i < data.length; i++) {
                           op += '<option value="' + data[i].id + '">' + data[i].medicine_name_en + '</option>';
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

    <script>
        $(document).on('change', '#medicine', function () {
            var doctorName = $(this).val();
            var div = $(this).parent();
            var op = "";
            console.log(doctorName);
            $.ajax({
                type: 'get',
                url: '{!! \Illuminate\Support\Facades\URL::to('/get-price')!!}',
                data: {'id': doctorName},
                success: function (data) {
                    console.log('success');
                    console.log(data);
                    op += '<label> السعر  *</label>';
                    op += '<input type="text" name="price" value=" '+ data.price+' " class="form-control form-app" disabled="true">';
                    $('#price').html("");
                    $('#price').append(op);
                },
                error: function () {
                    console.log('error');

                }
            });
        });
        $(document).ready(function () {
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
                                    <i class="icon-pencil5"> </i>  تعديل طلب دواء </h6>
                            <hr>
                        </div>
                        <div class="container-fluid">
                            <div class="content">

                                <form method="post"
                                      action="{{url('/update-request-pharm-medicine/'.$request_firm_phrma->id)}}">
                                    {{ csrf_field() }}
                                    <div class=" col-md-4">
                                        <div class="form-group">
                                            <label for="firm_type">نوع الشركة *</label>
                                            <select name="firm_type" class="form-control" id="firm_type"
                                                    onchange="select(this);">
                                                <option value="0" selected disabled>من فضلك اختر الشركة</option>
                                                @foreach($f_types as $f_type)
                                                    <option value="{{$f_type->id}}"
                                                            @if($request_firm_phrma->firm_type_id == $f_type->id) ?
                                                            {{'selected="selected"' }}: {{  null }} @endif>{{$f_type->title}}</option>
                                                @endforeach

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
                                                    @foreach($deals_types as $deal_type)
                                                        <option value="{{$deal_type->id}}"
                                                                @if($request_firm_phrma->deal_type_id == $deal_type->id) ?
                                                                {{'selected="selected"' }}: {{  null }} @endif>{{$deal_type->title}}</option>
                                                    @endforeach

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
                                                    <option value="0"> من فضلك اختر الشركة</option>
                                                    @foreach($firms as $firm)
                                                        <option value="{{$firm->user_id}}"
                                                                @if($request_firm_phrma->firm_id == $firm->user_id) ?
                                                                {{'selected="selected"' }}: {{  null }} @endif>{{$firm->f_name}}</option>
                                                    @endforeach
                                            </select>

                                            @if($errors->has('firm'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('firm') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>


                                    @if(isset($request_firm_phrma->distribution_id))
                                        <div class=" col-md-4">
                                            <div class="form-group" id="distrib" style="display: none;">
                                                <label for="distrib">اسم الشركة توزيع *</label>
                                                <select name="distrib" id="distrib" class="form-control">
                                                    <option value="0"> من فضلك اختر الشركة توزيع</option>
                                                    @foreach($distrubtes as $distrubte)
                                                        <option value="{{$distrubte->id}}"
                                                                @if($request_firm_phrma->distribution_id == $distrubte->id) ?
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
                                        @endif



                                    @if($request_firm_phrma->deal_type_id ==2)
                                        <div class=" col-md-4">
                                            <div class="form-group" id="expire" style="display: none;">
                                                <label for="expire">تاريخ الانتهاء *</label>
                                                <input type="date" id="expire" name="expire"
                                                       value="{{ $request_firm_phrma->expire_date }}"
                                                       class="form-control form-app">
                                                @if($errors->has('expire'))
                                                    <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('expire')}}</small>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    @endif



                                    <div class="col-md-12">

                                        <div class="col-md-4">
                                            <label for="medicine">اسم الدواء *</label>
                                            <select name="medicine" id="medicine" class="form-control">
                                                <option value="0"> من فضلك اختر الدواء </option>
                                                @foreach($medicines as $medicine)
                                                    <option value="{{$medicine->id}}"
                                                            @if($request_firm_phrma->medicine_id == $medicine->id) ?
                                                            {{'selected="selected"' }}: {{  null }} @endif>{{$medicine->medicine_name_en}}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="col-md-4"  id="price">
                                            <label for="price"> السعر *</label>
                                            <input type="text" name="price" value="{{$price->price}}" class="form-control form-app" disabled="true">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="quantity"> الكمية المطلوبة *</label>
                                            <input type="number" name="quantity" value="{{$request_firm_phrma->quantity}}" class="form-control form-app">
                                        </div>

                                    </div>

                                    <br>

                                    <div class=" col-md-6" style="margin-top: 20px">
                                        <div class="form-group" id="expire">
                                            <label for="location">المكان *</label>
                                            <input type="url" id="location" name="location"
                                                   value="{{$request_firm_phrma->location }}"
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
                                            <textarea id="details" name="details"
                                                      class="form-control"
                                                      required="">
                                                    {{$request_firm_phrma->detils}}
                                                </textarea>

                                            @if($errors->has('details'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('details') }}</small>
                                                </span>
                                            @endif

                                        </div>
                                    </div>

                                    <div class=" col-md-12">
                                        <div class="form-group text-center">
                                                <button type="submit" class="btn btn-info">تعديل</button>
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
