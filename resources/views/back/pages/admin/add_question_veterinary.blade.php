@extends('back.layout')

@section('script')
{{Html::script('back/assets/js/plugins/forms/styling/uniform.min.js') }}
{{Html::script('back/assets/js/plugins/notifications/pnotify.min.js') }}
{{Html::script('back/assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}
{{Html::script('back/assets/js/core/app.js') }}
{{Html::script('back/assets/js/pages/form_multiselect.js') }}

{{Html::script('https://code.jquery.com/jquery-3.3.1.min.js') }}
<script>
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(input).next('img').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(function () {
        $(".first").change(function () { //set up a common class
            readURL(this);
        });
    });
</script>

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
                        <h6 class="panel-title"><i class="icon-cogs"> </i>طب بيطرى</h6>
                        <hr>
                    </div>
                    <div class="container-fluid">
                        <div class="content">
                            <form method="post" action="{{url('/store-question-veterinary/'.$id)}}" >
                                {{ csrf_field() }}


                                <div class="multi-field-wrapper col-lg-12">
                                    <div class="col-lg-4">
                                        <label> سوال * </label>
                                    </div>
                                    <div class="col-lg-7">
                                        <label> الجواب * </label>
                                    </div>

                                    <div class=" col-lg-1  add-field">
                                            <span class=" btn btn-success" style="margin-bottom:15px;">
                                                <i class=" icon-add"></i></span>
                                    </div>

                                    <div class="multi-fields">
                                        <div class="multi-field ">
                                            <div class="col-md-5">
                                                <div class="form-group {{ $errors->has('questions.*') ? ' has-error' : '' }}">
                                                        <textarea name="questions[]" class="form-control form-app"
                                                                  placeholder=" سوال  ">
                                                        </textarea>
                                                    @if($errors->has('questions.*'))
                                                    <span class="help-block">
                                                        <small class="text-danger">{{$errors->first('questions.*')}}</small>
                                                      </span>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group {{ $errors->has('answers.*') ? ' has-error' : '' }}">
                                                        <textarea name="answers[]" class="form-control form-app"
                                                                  value="{{ old('result') }}" placeholder=" الجواب ">
                                                        </textarea>
                                                    @if ($errors->has('answers.*'))
                                                    <span class="help-block">
                                                        <small class="text-danger">{{$errors->first('answers.*')}}</small>
                                                      </span>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="col-md-1 remove-field">
                                                <span class="btn btn-danger"><i class="icon-trash"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center">



                                </div>
                                <button type="submit" class="btn btn-info">

                                    تعديل


                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /main content -->
<script>
    $('.multi-field-wrapper').each(function () {
        var $wrapper = $('.multi-fields', this);
        $(".add-field", $(this)).click(function (e) {
            $('.multi-field:first-child', $wrapper).clone(true).appendTo($wrapper).find('textarea').val('').focus();
        });
        $('.multi-field .remove-field', $wrapper).click(function () {
            if ($('.multi-field', $wrapper).length > 1)
                $(this).parent('.multi-field').remove();
        });
    });
</script>
@stop
