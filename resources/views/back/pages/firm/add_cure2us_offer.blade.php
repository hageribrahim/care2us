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
                                @if(isset($offer))
                                    تعديل العرض
                                @else
                                    اضافة العرض
                                @endif
                            </h6>
                            <hr>
                        </div>
                        <div class="container-fluid">
                            <div class="content">

                                <form method="post" @if(isset($offer))  action="{{url('/update-cur2es-offer/'.$offer->id)}}"
                                      @else action="{{url('/store-cure2us-offer')}}"@endif >
                                    {{ csrf_field() }}


                                    <div class="col-md-4">
                                        <label>تاريخ انتهاء العرض </label>
                                        <div class="form-group  {{ $errors->has('expire_date') ? ' has-error' : '' }}">
                                            <div class="input-group">
                                                <input type="date" name="expire_date"
                                                       class="form-control"
                                                       @if(isset($offer)) value="{{ $offer->expire_data }}"@endif >
                                                <span class="input-group-addon"><i class="icon-calendar52"></i></span>
                                            </div>
                                            @if ($errors->has('expire_date'))
                                                <span class="help-block">
                                                    <small>{{ $errors->first('expire_date') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <!--  editor -->
                                            <div class="form-group">
                                                <span>التفاصيل </span>
                                                <small class="text-danger">{{ $errors->first('description') }}</small>
                                                <textarea name="description" cols="18" rows="4"
                                                          class="wysihtml5 wysihtml5-min form-control"
                                                          placeholder="اكتب الوصف">  @if(isset($offer))
                                                        {{ $offer->description }}
                                                    @else{{ old('description') }} @endif  </textarea>
                                            </div>
                                            <!-- / editor -->
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class=" col-md-12">
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-info">
                                                @if(isset($offer))
                                                    تعديل
                                                @else
                                                    اضف
                                                @endif
                                            </button>
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