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
                            <h6 class="panel-title">@if(isset($video))<i class="icon-pencil5"> </i> تعديل@else <i
                                        class="icon-cogs"> </i>
                                اضافة فئة
                                @endif
                            </h6>
                            <hr>
                        </div>
                        <div class="container-fluid">
                            <div class="content">
                                <form method="post" @if(isset($video)) action="{{url('/edit-video/'.$video->id)}}"
                                      @else action="{{url('/store-video')}}" @endif >
                                    {{ csrf_field() }}
                                    <div class=" col-md-6">

                                        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                            <label for="title"> العنوان *</label>
                                            <input type="text" id="title" name="title"
                                                   @if(isset($video)) value="{{$video->title}}"
                                                   @else value="{{ old('title') }}" @endif
                                                   class="form-control form-app">

                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                <small class="text-danger">{{ $errors->first('name') }}</small>
                                              </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                                            <label for="url"> اللينك*</label>
                                            <input type="url" id="url" name="url"
                                                   @if(isset($video)) value="{{$video->video_url}}"
                                                   @else value="{{ old('name') }}" @endif
                                                   class="form-control form-app">

                                            @if ($errors->has('url'))
                                                <span class="help-block">
                                                <small class="text-danger">{{ $errors->first('url') }}</small>
                                              </span>
                                            @endif
                                        </div>

                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-info">
                                                @if(isset($admins))
                                                    تعديل
                                                @else
                                                    تسجيل
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
        </div>
    </div>
    <!-- /main content -->
@stop
