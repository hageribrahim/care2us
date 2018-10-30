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
                            <h6 class="panel-title"><i class="icon-cogs"> </i>امراض الشائعة</h6>
                            <hr>
                        </div>
                        <div class="container-fluid">
                            <div class="content">
                                <form method="post" action="{{url('/edit-subject/'.$subjectDisease->id)}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class=" col-md-6 ">

                                        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                            <label for="title">الموضوع *</label>
                                            <input type="text" id="title" name="title" @if(isset($subjectDisease)) value="{{ $subjectDisease->title}}" @else value="{{ old('title') }}"  @endif  class="form-control form-app">
                                            @if ($errors->has('title'))
                                                <span class="help-block">
                                                <small class="text-danger">{{ $errors->first('title') }}</small>
                                              </span>
                                            @endif
                                        </div>
                                        <br>
                                        <div class="form-group {{ $errors->has('category') ? ' has-error' : '' }}">
                                            <label for="category">الصنف *</label>
                                            <select name="category" class="form-control">
                                                <option value=""> من فضلك اختار النوع</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}"
                                                    @if(isset($subjectDisease) && $subjectDisease->category_id == $category->id)
                                                        {{'selected="selected"' }}  @endif > {{$category->name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('category'))
                                                <span class="help-block">
                                                <small class="text-danger">{{ $errors->first('category') }}</small>
                                              </span>
                                            @endif
                                        </div>
                                        <br>
                                        <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                                            <label for="discount">صورة *</label>
                                            <div class="form-group has-feedback has-feedback-left">
                                                <input type="file" id="img1" accept="file_extension|image/*"accept="image/*" name="image"class="file-styled" onchange="readURL(this);"/>
                                                <img id="first"
                                                     @if(isset($subjectDisease) &&$subjectDisease->image !=null )  src="{{url('images/medicines/'.$subjectDisease->image)}}"
                                                     @else src="http://placehold.it/180" @endif alt="your image"
                                                     width="180" height="180"/>
                                            </div>
                                            @if ($errors->has('image '))
                                                <span class="help-block">
                                                    <small>{{ $errors->first('image') }}</small>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-info">تعديل
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
