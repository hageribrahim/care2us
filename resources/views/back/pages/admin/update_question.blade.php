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
                            <h6 class="panel-title">  تعديل  السوال
                            </h6>
                            <hr>
                        </div>
                        <div class="container-fluid">
                            <div class="content">
                                <form method="post" action="{{url('/edit-question/'.$disease->id)}}" >
                                    {{csrf_field()}}
                                    <div class=" col-md-6 ">

                                        <div class="form-group {{ $errors->has('question') ? ' has-error' : '' }}">
                                            <label for="question" > السوال  * </label>
                                            <textarea id="question" name="question" class="form-control form-app" required="true">
                                                {{$disease->question}}
                                            </textarea>

                                            @if ($errors->has('question'))
                                                <span class="help-block">
                                                <small class="text-danger">{{ $errors->first('question')}}</small>
                                              </span>
                                            @endif
                                        </div>

                                        <br>

                                        <div class="form-group {{ $errors->has('answer') ? ' has-error' : '' }}">
                                            <label for="disease" >  الجواب * </label>
                                            <textarea id="answer" name="answer"class="form-control form-app" required="true">
                                                {{$disease->answer}}
                                            </textarea>

                                            @if ($errors->has('answer'))
                                                <span class="help-block">
                                                <small class="text-danger">{{ $errors->first('answer')}}</small>
                                              </span>
                                            @endif
                                        </div>
                                        <br>
          
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
