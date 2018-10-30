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
                            <h6 class="panel-title">  تعديل   تفاعلات الادوية
                            </h6>
                            <hr>
                        </div>
                        <div class="container-fluid">
                            <div class="content">
                              <form method="post" action="{{url('/edit-reactive/'.$reactive->id)}}" >
                                  {{ csrf_field() }}
                                    <div class=" col-md-6 col-md-offset-3">

                                      <div class="form-group {{ $errors->has('medicen') ? ' has-error' : '' }}">
                                          <label for="medicen" >  اسم الدواء * </label>
                                          <input type="text" id="medicen" name="medicen"
                                              @if(isset($reactive)) value = "{{$reactive->medicen}}" @endif
                                                 class="form-control form-app" required="">

                                          @if ($errors->has('medicen'))
                                              <span class="help-block">
                                                <small class="text-danger">{{ $errors->first('medicen') }}</small>
                                              </span>
                                          @endif
                                          </div>
                                          <br>
                                      <div class="form-group {{ $errors->has('reactive') ? ' has-error' : '' }}">
                                          <label for="reactive" >  اسم الدواء المتفاعل معه* </label>
                                          <input type="text" id="reactive" name="reactive"
                                              @if(isset($reactive)) value = "{{$reactive->reactive}}" @endif
                                                 class="form-control form-app" required="">

                                          @if ($errors->has('reactive'))
                                              <span class="help-block">
                                                <small class="text-danger">{{ $errors->first('reactive')}}</small>
                                              </span>
                                          @endif
                                        </div>
                                          <br>
                                          <div class="form-group {{ $errors->has('result') ? ' has-error' : '' }}">
                                              <label for="result" >   النتيجة  * </label>
                                              <input type="text" id="result" name="result"
                                                  @if(isset($reactive)) value = "{{$reactive->result}}" @endif
                                                     class="form-control form-app" required="">

                                              @if ($errors->has('result'))
                                                  <span class="help-block">
                                                    <small class="text-danger">{{ $errors->first('result')}}</small>
                                                  </span>
                                              @endif

                                      </div>
                                      <div class="form-group text-center">
                                          <button type="submit" class="btn btn-info">

                                             تعديل


                                          </button>
                                      </div>
                                 </div>


                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- /main content -->
@stop
