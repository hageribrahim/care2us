@extends('back.layout')

@section('script')
    {{Html::script('back/assets/js/plugins/forms/styling/uniform.min.js') }}
    {{Html::script('back/assets/js/plugins/notifications/pnotify.min.js') }}
    {{Html::script('back/assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}
    {{Html::script('back/assets/js/core/app.js') }}
    {{Html::script('back/assets/js/pages/form_multiselect.js') }}


    <script>
        $(document).ready(function () {
            $(document).on('change', '#country', function () {
                var Coun_id = $(this).val();
                var div = $(this).parent();
                var op = "";
                console.log(Coun_id);
                $.ajax({
                    type: 'get',
                    url: '{!! \Illuminate\Support\Facades\URL::to('getGovernate')!!}',
                    data: {'id': Coun_id},
                    success: function (data) {
                        /* console.log('success');
                         console.log(data);*/
                        op += '<option value="0" selected disabled>من فضلك اختر المحافظه</option>';
                        for (var i = 0; i < data.length; i++) {
                            op += '<option value="' + data[i].id + '">' + data[i].g_title + '</option>';
                        }
                        $('#city').html("");
                        $('#city').append(op);
                    },
                    error: function () {
                        console.log('error');
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $(document).on('change', '#city', function () {
                var gov_id = $(this).val();
                var div = $(this).parent();
                var op = "";
                //console.log(Coun_id);
                $.ajax({
                    type: 'get',
                    url: '{!! \Illuminate\Support\Facades\URL::to('getCity')!!}',
                    data: {'id': gov_id},
                    success: function (data) {
                        /* console.log('success');
                         console.log(data);*/
                        op += '<option value="0" selected disabled>من فضلك اختر المنطقه</option>';
                        for (var i = 0; i < data.length; i++) {
                            op += '<option value="' + data[i].id + '">' + data[i].c_title + '</option>';
                        }
                        $('#gov-city').html("");
                        $('#gov-city').append(op);
                    },
                    error: function () {
                        console.log('error');

                    }
                });
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
                            <h6 class="panel-title">@if(isset($abroad))<i class="icon-pencil5"> </i>  تعديل
                                المستشفى @else <i
                                        class="icon-cogs"> </i>
                                تسجيل المستشفى
                                @endif
                            </h6>
                            <hr>
                        </div>
                        <div class="container-fluid">
                            <div class="content">
                                <form method="post" enctype="multipart/form-data"  @if(isset($abroad))  action="{{url('/edit-treat-abroad/'.$abroad->id)}}" @else  action="{{url('/store-treat-abroad')}}" @endif>
                                    {{ csrf_field() }}
                                    <input type="hidden" name="u_type" value="6">
                                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                        <label for="username">اسم المستخدم *</label>
                                        <input type="text" name="username"
                                               @if(isset($abroad))
                                               value="{{ $abroad->username }}"
                                                       @else
                                               value="{{ old('username') }}"
                                                       @endif

                                               class="form-control form-app" required>
                                        @if ($errors->has('username'))
                                            <span class="help-block">
                                                <small>{{ $errors->first('username') }}</small>
                                             </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email">البريد الالكترونى للشخص المسئول *</label>
                                        <input type="email" name="email"
                                               @if(isset($abroad))
                                               value="{{ $abroad->email }}"
                                               @else
                                               value="{{ old('email') }}"
                                               @endif

                                               class="form-control form-app" required>
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
                                        <label for="name">اسم المستشفى *</label>
                                        <input type="text" name="name"
                                               @if(isset($abroad))
                                               value="{{ $abroad->hospital}}"
                                               @else
                                               value="{{ old('name') }}"
                                               @endif

                                               class="form-control form-app" required>
                                    </div>

                                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                        <label for="phone">رقم تليفون المستشفى *</label>
                                        <input type="text" name="phone"
                                               @if(isset($abroad))
                                               value="{{ $abroad->phone}}"
                                               @else
                                               value="{{ old('phone') }}"
                                               @endif

                                               class="form-control form-app" required>
                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                                <small>{{ $errors->first('phone') }}</small>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group ">
                                        <label for="mobile">االموبايل *</label>
                                        <input type="text" id="mobile" name="mobile"
                                               @if(isset($abroad))
                                               value="{{ $abroad->mobile}}"
                                               @else
                                               value="{{ old('mobile') }}"
                                               @endif

                                               class="form-control form-app" required="">
                                    </div>

                                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                        <label for="address">عنوان المستشفى *</label>
                                        <input type="text" name="address"
                                               @if(isset($abroad))
                                               value="{{ $abroad->u_address}}"
                                               @else
                                               value="{{ old('address') }}"
                                               @endif
                                               class="form-control form-app" required>
                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                                <small>{{ $errors->first('address') }}</small>
                                              </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="country">الدولة *</label>
                                        <select name="country" class="form-control" id="country">
                                            @if(isset($abroad))
                                                <option value="0">اختر الدولة *</option>
                                                @foreach($countries as $country)
                                                    <option value="{{$country->id}}" @if($abroad->u_country == $country->id) ?
                                                            {{'selected="selected"'}} : {{ null }} @endif >{{$country->country_title}}</option>
                                                @endforeach
                                            @else
                                                <option value="0">اختر الدولة *</option>
                                                @foreach($countries as $country)
                                                    <option value="{{$country->id}}" @if(old('country') == $country->id) ?
                                                            {{'selected="selected"'}} : {{ null }} @endif >{{$country->country_title}}</option>
                                                @endforeach
                                            @endif


                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="governorate">المحافظة *</label>
                                        <select name="governorate" class="form-control" id="city">
                                            @if(isset($abroad))
                                                <option value="0">اختر المحافظة *</option>
                                                @foreach($governorates as $governorate)
                                                    <option value="{{$governorate->id}}"  @if($abroad->u_governorate == $governorate->id) ? {{'selected="selected"'}} : {{ null }} @endif >{{$governorate->g_title}}</option>
                                                @endforeach
                                            @endif
                                            <option value="0">اختر المحافظة</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="city">المنطقة *</label>
                                        <select name="city" class="form-control" id="gov-city">
                                            @if(isset($abroad))
                                            <option value="0">اختر المنطقة</option>
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}"  @if($abroad->u_city == $city->id) ? {{ 'selected="selected"' }} : {{ null }} @endif >{{$city->c_title}}</option>
                                            @endforeach
                                            @endif
                                            <option value="0">اختر المنطقة</option>
                                        </select>
                                    </div>


                                    @if(!isset($abroad))
                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password">كلمة المرور *</label>
                                            <input type="password" name="password" class="form-control form-app" required>
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                              <small>{{ $errors->first('password') }}</small>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('password-confirm') ? ' has-error' : '' }}">
                                            <label for="password"> تاكيد كلمة المرور *</label>
                                            <input id="password-confirm" type="password" class="form-control"
                                                   name="password_confirmation" required>
                                            @if ($errors->has('password_confirmation'))
                                                <span class="help-block">
                                                <small>{{ $errors->first('password_confirmation') }}</small>
                                            </span>
                                            @endif
                                        </div>

                                    @endif



                                    @if(isset($abroad))
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-info">تعديل </button>
                                        </div>
                                        @else
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-info">تسجيل</button>
                                        </div>
                                        @endif

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
