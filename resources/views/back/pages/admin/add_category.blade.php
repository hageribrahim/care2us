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
                            <h6 class="panel-title">@if(isset($category))<i class="icon-pencil5"> </i> تعديل@else <i
                                        class="icon-cogs"> </i>
                                اضافة فئة
                                @endif
                            </h6>
                            <hr>
                        </div>
                        <div class="container-fluid">
                            <div class="content">
                                <form method="post" @if(isset($category)) action="{{url('/edit-category/'.$category->id)}}"
                                      @else action="{{url('/store-category')}}" @endif >
                                    {{ csrf_field() }}
                                    <div class=" col-md-6">

                                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name"> اسم الفئة *</label>
                                            <input type="text" id="name" name="name"
                                                   @if(isset($category)) value="{{$category->name}}"
                                                   @else value="{{ old('name') }}" @endif
                                                   class="form-control form-app">

                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                <small class="text-danger">{{ $errors->first('name') }}</small>
                                              </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                            <label for="type">نوع *</label>
                                            <select name="type" class="form-control">
                                                @if(isset($category))
                                                   @if($category->type=="commondiseases" )
                                                        <option value=""> من فضلك اختار النوع</option>
                                                        <option value="commondiseases" selected> الامراض الشائعة</option>
                                                        <option value="veterinarymedicine"> الطب البيطرى</option>
                                                       @else
                                                        <option value=""> من فضلك اختار النوع</option>
                                                        <option value="commondiseases"> الامراض الشائعة</option>
                                                        <option value="veterinarymedicine" selected> الطب البيطرى</option>
                                                       @endif
                                                    @else
                                                    <option value=""> من فضلك اختار النوع</option>
                                                    <option value="commondiseases"> الامراض الشائعة</option>
                                                    <option value="veterinarymedicine"> الطب البيطرى</option>
                                                    @endif

                                            </select>
                                            @if ($errors->has('type'))
                                                <span class="help-block">
                                                <small class="text-danger">{{ $errors->first('type') }}</small>
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
