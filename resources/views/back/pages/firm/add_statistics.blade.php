@extends('back.layout')
@section('script')
    <!-- text Editor   -->
    {{Html::script('back/assets/js/plugins/forms/styling/uniform.min.js') }}
    {{Html::script('back/assets/js/plugins/editors/wysihtml5/wysihtml5.min.js') }}
    {{Html::script('back/assets/js/plugins/editors/wysihtml5/toolbar.js') }}
    {{Html::script('back/assets/js/plugins/editors/wysihtml5/parsers.js') }}
    {{Html::script('back/assets/js/plugins/editors/wysihtml5/locales/bootstrap-wysihtml5.ua-UA.js') }}

    <!-- datepicker   -->
    {{Html::script('back/assets/js/plugins/ui/moment/moment.min.js') }}
    {{Html::script('back/assets/js/plugins/pickers/daterangepicker.js') }}
    {{Html::script('back/assets/js/plugins/pickers/anytime.min.js') }}
    {{Html::script('back/assets/js/plugins/pickers/pickadate/picker.js') }}
    {{Html::script('back/assets/js/plugins/pickers/pickadate/picker.date.js') }}
    {{Html::script('back/assets/js/plugins/pickers/pickadate/picker.time.js') }}
    {{Html::script('back/assets/js/plugins/pickers/pickadate/legacy.js') }}

    <!-- Checkbox -->
    {{Html::script('back/assets/js/plugins/forms/styling/switchery.min.js') }}
    {{Html::script('back/assets/js/plugins/forms/styling/switch.min.js') }}
    {{Html::script('back/assets/js/plugins/forms/inputs/touchspin.min.js') }}

    {{Html::script('back/assets/js/plugins/notifications/jgrowl.min.js') }}
    {{Html::script('back/assets/js/core/app.js') }}
    {{Html::script('back/assets/js/pages/editor_wysihtml5.js') }}
    {{Html::script('back/assets/js/pages/form_inputs.js') }}
    {{Html::script('back/assets/js/pages/form_input_groups.js') }}

    {{Html::script('back/assets/js/pages/picker_date.js') }}
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
                            <h6 class="panel-title">
                                @if(isset($request_firm_phrma))
                                    <i class="icon-pencil5"> </i>  تعديل احصائية </h6>
                            @else
                                <i class="icon-stats-growth"> </i>  اضافة احصائية
                              </h6>
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
                                <form method="post"
                                      @if(isset($statistics))
                                      action="{{url('/update-statistics/'.$statistics->id)}}"
                                      @else
                                      action="{{url('/store-statistics')}}"
                                        @endif
                                >
                                    {{ csrf_field() }}
                                    <div class=" col-md-6">
                                        <div class="form-group {{ $errors->has('medicine_name') ? ' has-error' : '' }}">
                                            <label for="medicine_name">اسم الدواء *</label>
                                            <select name="medicine_name" class="form-control" id="medicine_name">

                                                    <option value="0" selected disabled>من فضلك اختر الدواء</option>

                                                    @foreach($medicines as $medicine)
                                                        <option value="{{$medicine->id}}"
                                                                @if( isset($statistics) && $statistics->medicine_id == $medicine->id) ?
                                                                {{'selected="selected"' }}: {{  null }} @endif>{{$medicine->medicine_name_en}}</option>
                                                    @endforeach
                                                {{--@foreach($medicines as $medicine)--}}
                                                    {{--<option value="{{$medicine->id}}" >{{$medicine->medicine_name_en}}</option>--}}
                                                {{--@endforeach--}}

                                            </select>
                                            @if($errors->has('medicine_name'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('medicine_name') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" col-md-6">
                                        <div class="form-group {{ $errors->has('quantity_sold') ? ' has-error' : '' }}">
                                            <label for="quantity_sold">كمية المباعة *</label>
                                            <input type="number" id="quantity_sold" name="quantity_sold"
                                                   @if(isset($statistics))
                                                   value="{{$statistics->quantity_sold}}"
                                                   @else
                                                   value="{{ old('quantity_sold') }}"
                                                   @endif
                                                   class="form-control form-app"
                                                   required="">

                                            @if ($errors->has('quantity_sold'))
                                                <span class="help-block">
                                                    <small>{{ $errors->first('quantity_sold')}}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                          
                                    <div class=" col-md-12">
                                        <div class="form-group text-center">
                                            @if(isset($statistics))
                                                <button type="submit" class="btn btn-info">تعديل</button>
                                            @else
                                                <button type="submit" class="btn btn-info">اطلب</button>
                                            @endif

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
@stop
