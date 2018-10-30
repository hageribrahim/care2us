@extends('front.layout')

@section('title')
    تسجيل شركة أدوية
@stop

@section('content')
    <style>
        img {
            height: auto;
            max-width: 40% !important;
            width: 80% !important;
            vertical-align: top;
            -ms-interpolation-mode: bicubic;
        }
    </style>

    <!-- Featured Title -->
    <div id="featured-title" class="text-center" style="background-image:url('{{url("front/assets/img/bg-page-title.jpg")}} ')">
        <div id="featured-title-inner" class="wprt-container">
            <div class="featured-title-inner-wrap">
                <div class="featured-title-heading-wrap">
                    <h1 class="featured-title-heading ">تسجيل شركة أدوية</h1>
                </div>
            </div>
        </div>
    </div><!-- /#featured-title -->
    <!-- Main Content -->
    <main id="main-content">
        <div id="content-wrap">
            <div id="site-content" class="site-content clearfix">
                <div id="inner-content" class="inner-content-wrap">
                    <div class="page-content">

                        <!-- Welcome -->
                        <div class="row-welcome">
                            <div class="wprt-container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="wprt-content-box clearfix move-into-slider-home-2">
                                            <div class="inner">

                                                <div class="bg-white col-md-12">
                                                    <div class="inner ">
                                                        <div class="col-md-6 col-xs-12 col-md-offset-3">
                                                            <div class="wprt-spacer clearfix" data-desktop="30" data-mobi="30" data-smobi="15"></div>
                                                            <form method="post" action="{{url('/firm-store')}}" enctype="multipart/form-data">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="u_type" value="5">
                                                                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                                                    <label for="username"> اسم المستخدم  *</label>
                                                                    <input type="text" name="username" value="{{ old('username') }}" class="form-control form-app" required >
                                                                    @if ($errors->has('username'))
                                                                    <span class="help-block">
                                                                        <small>{{ $errors->first('username') }}</small>
                                                                    </span>
                                                                    @endif
                                                                </div>

                                                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                                    <label for="email">البريد الالكترونى للشخص المسئول *</label>
                                                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control form-app" required >
                                                                    @if ($errors->has('email'))
                                                                    <span class="help-block">
                                                                        <small>{{ $errors->first('email') }}</small>
                                                                    </span>
                                                                    @endif
                                                                </div>



                                                                {{----------------img-------------------}}

                                                                <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                                                                    <label for="discount">صورة *</label>
                                                                    <div class="form-group has-feedback has-feedback-left">
                                                                        <input type="file" id="img1"accept="image/*" name="image" class="file-styled" required
                                                                               onchange="readURL(this);"/>
                                                                        <img id="first" src="http://placehold.it/80"
                                                                             alt="your image" width="80" height="80"/>
                                                                    </div>
                                                                    @if ($errors->has('image'))
                                                                        <span class="help-block">
                                                                       <small>{{ $errors->first('image') }}</small>
                                                                              </span>
                                                                    @endif
                                                                </div>
                                                                {{----------------img-------------------}}

                                                                <div class="form-group">
                                                                    <label for="name">اسم الشركة *</label>
                                                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control form-app" required >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="firm_type">نوع الشركة  *</label>
                                                                    <select name="firm_type" class="form-control">
                                                                        @foreach($f_types as $f_type)
                                                                            <option value="{{$f_type->id}}"  @if(old('firm_type') == $f_type->id) ? {{'selected="selected"' }}: {{  null }} @endif>{{$f_type->title}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                                                    <label for="phone">رقم تليفون الشركة *</label>
                                                                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control form-app" required >
                                                                    @if ($errors->has('phone'))
                                                                    <span class="help-block">
                                                                        <small>{{ $errors->first('phone') }}</small>
                                                                    </span>
                                                                    @endif
                                                                </div>

                                                                <div class="form-group ">
                                                                    <label for="mobile">موبايل الشخص المسئول *</label>
                                                                    <input type="text" id="mobile" name="mobile" value="{{ old('mobile') }}" class="form-control form-app" required="">
                                                                </div>

                                                                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                                                    <label for="address"> عنوان الشركة *</label>
                                                                    <input type="text" name="address" value="{{ old('address') }}" class="form-control form-app" required >
                                                                    @if ($errors->has('address'))
                                                                        <span class="help-block">
                                                                        <small>{{ $errors->first('address') }}</small>
                                                                    </span>
                                                                    @endif
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="country">الدولة *</label>
                                                                    <select name="country" class="form-control">
                                                                        <option value="0">اختر الدولة</option>
                                                                        @foreach($countries as $country)
                                                                            <option value="{{$country->id}}"  @if(old('country') == $country->id) ? {{'selected="selected"'}} : {{ null }} @endif >{{$country->country_title}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="governorate">المحافظة *</label>
                                                                    <select name="governorate" class="form-control">
                                                                        <option value="0">اختر المحافظة</option>
                                                                        @foreach($governorates as $governorate)
                                                                            <option value="{{$governorate->id}}"  @if(old('governorate') == $governorate->id) ? {{'selected="selected"'}} : {{ null }} @endif  >{{$governorate->g_title}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="city">المنطقة *</label>
                                                                    <select name="city" class="form-control">
                                                                        <option value="0">اختر المنطقة</option>
                                                                        @foreach($cities as $city)
                                                                            <option value="{{$city->id}}" @if(old('city') == $city->id) ? {{ 'selected="selected"' }} : {{ null }} @endif >{{$city->c_title}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                                    <label for="password">كلمة المرور *</label>
                                                                    <input type="password" name="password" class="form-control form-app"  required>
                                                                    @if ($errors->has('password'))
                                                                    <span class="help-block">
                                                                        <small>{{ $errors->first('password') }}</small>
                                                                    </span>
                                                                    @endif
                                                                </div>

                                                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                                                    <label for="password"> تاكيد كلمة المرور *</label>
                                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                                    @if ($errors->has('password_confirmation'))
                                                                    <span class="help-block">
                                                                        <small>{{ $errors->first('password_confirmation') }}</small>
                                                                    </span>
                                                                    @endif
                                                                </div>

                                                                <div class="form-group text-center">
                                                                    <button type="submit" class="btn btn-info">تسجيل</button>
                                                                </div>
                                                            </form>
                                                            <br>
                                                        </div>
                                                    </div>
                                                </div><!-- /.wprt-content-box -->
                                            </div>
                                        </div><!-- /.wprt-content-box -->

                                        <div class="wprt-spacer clearfix" data-desktop="82" data-mobi="60" data-smobi="60"></div>
                                    </div>
                                </div><!-- .row -->
                            </div><!-- /.wprt-container -->
                        </div><!-- /.row-welcome -->

                    </div><!-- /.page-content -->
                </div><!-- /#inner-content -->
            </div><!-- /#site-content -->
        </div><!-- /#content-wrap -->
    </main> <!-- /#main-content -->


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