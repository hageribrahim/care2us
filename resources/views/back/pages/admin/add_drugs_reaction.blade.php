@extends('back.layout')

@section('script')
{{Html::script('back/assets/js/plugins/forms/styling/uniform.min.js') }}
{{Html::script('back/assets/js/plugins/notifications/pnotify.min.js') }}
{{Html::script('back/assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}
{{Html::script('back/assets/js/core/app.js') }}
{{Html::script('back/assets/js/pages/form_multiselect.js') }}
@stop

@section('content')
    <!-- Main content -->

    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Content area -->
        <div class="content">
            <!-- Main charts -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h6 class="panel-title">@if(isset($reactive))<i class="icon-pencil5"> </i>  تعديل   تفاعلات الادوية @else <i
                                        class="icon-cogs"> </i>
                                  تفاعلات الادوية
                                @endif
                            </h6>
                            <hr>
                        </div>
                        <div class="container-fluid">
                            <div class="content">
                              <form method="post" action="{{url('/store-drug-reaction')}}" >
                                  {{ csrf_field() }}
                                    <div class=" col-md-6 ">

                                      <div class="form-group {{ $errors->has('medicen') ? ' has-error' : '' }}">
                                          <label for="medicen">اسم الدواء  *</label>
                                          <input type="text" id="medicen" name="medicen"
                                            value="{{ old('medicen') }}"
                                                 class="form-control form-app" >

                                          @if ($errors->has('medicen'))
                                              <span class="help-block">
                                                <small class="text-danger">{{ $errors->first('medicen') }}</small>
                                              </span>
                                          @endif
                                          </div>
                                          <br>

                                          <div class="form-group text-center">
                                              <button type="submit" class="btn btn-info">
                                                   تسجيل
                                              </button>
                                          </div>


                                          <div class="multi-field-wrapper">
                                              <div class="col-lg-4">
                                              <label> اسم الدواء المتفاعل معه* </label>
                                            </div>
                                            <div class="col-lg-7">
                                              <label > النتيجة  * </label>
                                            </div>
                                             <div class=" col-lg-1  add-field" >
                                                   <span class=" btn btn-success" style="margin-bottom:15px;"><i class=" icon-add"></i></span>
                                           </div>

                                            <div class="multi-fields">
                                              <div class="multi-field ">
                                                <div class="col-lg-4">
                                                  <div class="form-group {{ $errors->has('reactives.*') ? ' has-error' : '' }}">
                                                  <input type="text" name="reactives[]" class="form-control form-app"  value="{{ old('reactive') }}" placeholder="ا سم الدواء المتفاعل معه " >

                                                @if($errors->has('reactives.*'))
                                                      <span class="help-block">
                                                        <small class="text-danger">{{$errors->first('reactives.*')}}</small>
                                                      </span>
                                                  @endif

                                                  </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="form-group {{ $errors->has('results.*') ? ' has-error' : '' }}">
                                                  <input type="text" name="results[]" class="form-control form-app"  value="{{ old('result') }}" placeholder=" النتيجة " >

                                                  @if ($errors->has('results.*'))
                                                      <span class="help-block">
                                                        <small class="text-danger">{{$errors->first('results.*')}}</small>
                                                      </span>
                                                  @endif

                                              </div>
                                                </div>
                                                <div class="col-lg-1 remove-field">
                                                  <span class="btn btn-danger"><i class="icon-trash"></i></span>
                                                </div>
                                            </div>
                                          </div>
                                 </div>
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /main content -->
    <script>
        $('.multi-field-wrapper').each(function() {
        var $wrapper = $('.multi-fields', this);
        $(".add-field", $(this)).click(function(e) {
            $('.multi-field:first-child', $wrapper).clone(true).appendTo($wrapper).find('input').val('').focus();
        });
        $('.multi-field .remove-field', $wrapper).click(function() {
            if ($('.multi-field', $wrapper).length > 1)
                $(this).parent('.multi-field').remove();
        });
      });
    </script>
@stop
