@extends('back.layout')
@section('script')
    <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous"></script>
    <!-- /theme JS files -->
    <script>
        $(document).ready(function () {
            $(document).on('change', '#country', function () {
                var Coun_id = $(this).val();
                var div = $(this).parent();
                var op = "";
                //console.log(Coun_id);
                $.ajax({
                    type: 'get',
                    url: '{!! \Illuminate\Support\Facades\URL::to('getpackages')!!}',
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
                console.log(gov_id);
                $.ajax({
                    type: 'get',
                    url: '{!! \Illuminate\Support\Facades\URL::to('getcity')!!}',
                    data: {'id': gov_id },
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

    <script>
        $(document).on('change', '#gov-city', function () {
            var city_id = $(this).val();
            var div = $(this).parent();
            var op = "";
            //console.log(city_id);
            $.ajax({
                type: 'get',
                url: '{!! \Illuminate\Support\Facades\URL::to('/get-doctor-type')!!}',
                data: {'id': city_id},
                success: function (data) {
                    // console.log('success');
                    // console.log(data);
                    op += '<option value="0" selected disabled>من فضلك اختر التخصص </option>';
                    for (var i = 0; i < data.length; i++) {
                        op += '<option value="' + data[i].id + '">' + data[i].doc_type + '</option>';
                    }
                    $('#doc_type').html("");
                    $('#doc_type').append(op);
                },
                error: function () {
                    console.log('error');

                }
            });
        });
        $(document).ready(function () {
        });
    </script>
{{----------------------------------------------------------------------------------------------------------------------------}}
    <script>
        $(document).on('change', '#doc_type', function () {
            var doc_type = $(this).val();
            var city_id_sec = $('#gov-city').val();
            if (doc_type != 3) {
                var div = $(this).parent();
                var op = "";
/*
                                console.log(doc_type);
*/
                                // console.log(city_id_sec);
                $.ajax({
                    type: 'get',
                    url: '{!! \Illuminate\Support\Facades\URL::to('/gethomedoc/')!!}',
                    data: {'doc_type': doc_type,'city_id':city_id_sec},
                    success: function (data) {
                        /* console.log('success');
                         console.log(data);*/
                        op += '<option value="0" selected disabled>من فضلك اختر الطبيب</option>';
                        for (var i = 0; i < data.length; i++) {
                            op += '<option value="' + data[i].user_id + '">' + data[i].c_fname + " " + data[i].c_lname + '</option>';
                        }
                        $('#doctor').html("");
                        $('#doctor').append(op);
                    },
                    error: function () {
                                                // console.log('error');
                    }
                });
            }
            else {
                var div = $(this).parent();
                var op = "";
                /*
                                console.log(doc_type);
                */
                $.ajax({
                    type: 'get',
                    url: '{!! \Illuminate\Support\Facades\URL::to('/gethomename/')!!}',
                    data: {'id': doc_type},
                    success: function (data) {
                        /* console.log('success');
                         console.log(data);*/
                        op += '<option value="0" selected disabled>من فضلك اختر تخصص  الطبيب</option>';
                        for (var i = 0; i < data.length; i++) {
                            op += '<option value="' + data[i].id + '">' + data[i].doc_type + '</option>';
                        }
                        $('#doctype').html("");
                        $('#doctype').append(op);
                    },
                    error: function () {
                        /*
                                                console.log('error');
                        */

                    }
                });
            }

        });
        $(document).ready(function () {
        });
    </script>

    <script>
        $(document).on('change', '#doctype', function () {
            var doctype = $(this).val();
            var div = $(this).parent();
            var op = "";
            /*
                        console.log(doctype);
            */
            $.ajax({
                type: 'get',
                url: '{!! \Illuminate\Support\Facades\URL::to('/gethomedocscp/')!!}',
                data: {'id': doctype},
                success: function (data) {
                    /*console.log('success');
                    console.log(data);*/
                    op += '<option value="0" selected disabled>من فضلك اختر الطبيب</option>';
                    for (var i = 0; i < data.length; i++) {
                        op += '<option value="' + data[i].user_id + '">' + data[i].c_fname + " " + data[i].c_lname + '</option>';
                    }
                    $('#doctor').html("");
                    $('#doctor').append(op);
                },
                error: function () {
                    /*
                                        console.log('error');
                    */

                }
            });
        });
        $(document).ready(function () {
        });
    </script>

    <script>
        $(document).on('change', '#doctor', function () {
            var doctorName = $(this).val();
            var div = $(this).parent();
            var op = "";
            /*
                        console.log(doctorName);
            */
            $.ajax({
                type: 'get',
                url: '{!! \Illuminate\Support\Facades\URL::to('/getcvdoc/')!!}',
                data: {'id': doctorName},
                success: function (data) {
                    /*    console.log('success');
                        console.log(data);*/
                    op += '<label>السيره الذاتيه اذا وجدت  *</label>';

                    for (var i = 0; i < data.length; i++) {
                        if (data[i].cv == null || '') {
                            op += '<textarea  class="form-group form-control disabled" disabled name="cv" > لا يوجد بيانات</textarea>';
                        } else {
                            op += '<textarea  class="form-group form-control disabled" disabled name="cv" >' + data[i].cv + "" + data[i].id + '</textarea>';
                        }
                    }
                    $('#cv').html("");
                    $('#cv').append(op);
                },
                error: function () {
                    /*
                                        console.log('error');
                    */

                }
            });
        });
        $(document).ready(function () {
        });
    </script>

    <script>
        $(document).on('change', '#doctor', function () {
            var doctorName = $(this).val();
            var div = $(this).parent();
            var op = "";
            console.log(doctorName);
            $.ajax({
                type: 'get',
                url: '{!! \Illuminate\Support\Facades\URL::to('/getDRImage')!!}',
                data: {'id': doctorName},
                success: function (data) {
                    console.log('success');
                    console.log(data);
                    op += '<label> صورة  *</label>';
                    op += '<img id="image" src="images/profile/' + data.image + '" alt="your image" width="100" height="100"/>';
                    $('#image').html("");
                    $('#image').append(op);
                },
                error: function () {
                    console.log('error');

                }
            });
        });
        $(document).ready(function () {
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
                            <a href="{{url('/all-home-clinic')}}">
                                <span class="pull-right">
                                    <p class="btn btn-info btn-xs"><i class="icon-plus-circle2"></i>عرض الأسئله</p>
                                </span>
                            </a>
                            <h6 class="panel-title"><i class="icon-cogs"> </i> طلب هوم كلينك</h6>
                            <hr>
                        </div>
                        <div class="container-fluid">
                            <div class="content">
                                <form method="post" action="{{url('/store-home-clinic/')}}">
                                    {{ csrf_field() }}
                                    <div class=" col-md-6">
                                        <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                                            <label for="phone">رقم الموبيل *</label>
                                            <input type="text" id="phone" name="phone"
                                                   value="{{ old('phone') }}" class="form-control form-app"
                                                   required="">
                                            @if ($errors->has('phone'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('phone') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" col-md-6">
                                        <div class="form-group">
                                            <label for="country">الدولة *</label>
                                            <select name="country" id="country" class="form-control" required>
                                                <option value="0">من فضلك اختر الدولة</option>
                                                @foreach($countries as $country)
                                                    <option value="{{$country->id}}">{{$country->country_title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class=" col-md-6">
                                        <div class="form-group">
                                            <label for="governorate">المحافظة *</label>
                                            <select name="governorate" class="form-control" id="city" required>
                                                    <option value="">اختر المحافظه</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class=" col-md-6">
                                        <div class="form-group">
                                            <label for="city">المنطقة *</label>
                                            <select name="city" class="form-control" id="gov-city" required>
                                                    <option value="">من فضلك اختر المنطقة</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class=" col-md-6">
                                        <div class="form-group {{ $errors->has('location') ? ' has-error' : '' }}">
                                            <label for="location"> شير موقعك على خريطة </label>
                                            <input type="url" id="location" name="location"
                                                   value="{{ old('location') }}"
                                                   class="form-control form-app">
                                            @if($errors->has('location'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('location') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" col-md-6">
                                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email">العنوان *</label>
                                            <input type="text" id="address" name="address" value="{{ old('address') }}"
                                                   class="form-control form-app" required="">
                                            @if($errors->has('address'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('address') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" col-md-6">
                                        <div class="form-group {{ $errors->has('doc_type') ? ' has-error' : '' }}">
                                            <label for="doc_type">إختر التخصص *</label>
                                            <select name="doc_type" class="form-control" id="doc_type"
                                                    onchange="select(this);">
                                                <option value="{{ old('doc_type') }}">من فضلك اختر التخصص</option>
                                            </select>
                                            @if($errors->has('doctor'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('doctor') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" col-md-6" id="doc" style="display: none;">
                                        <div class="form-group {{ $errors->has('doctor') ? ' has-error' : '' }}">
                                            <label for="Doctor_types">إختر تخصص الطبيب *</label>
                                            <select name="doctor" class="form-control" id="doctype">
                                                <option value="0"> من فضلك اختر الطبيب</option>

                                            </select>
                                            @if($errors->has('doctor'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('doctor') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class=" col-md-6">
                                        <div class="form-group {{ $errors->has('doctor') ? ' has-error' : '' }}">
                                            <label for="Doctor_types">إختر الاسم *</label>
                                            <select name="doctorName" class="form-control" id="doctor">
                                                <option value="{{ old('doctor') }}"> من فضلك اختر الطبيب</option>

                                            </select>
                                            @if($errors->has('doctor'))
                                                <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('doctor') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    {{--<div class=" col-md-12">--}}

                                        <div class="col-md-6">
                                            <div id="image" class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                                                <label for="discount">صورة *</label>
                                                <div class="form-group has-feedback has-feedback-left">
                                                    <img id="image" src="http://placehold.it/180" alt="your image"
                                                         width="180" height="180"/>
                                                </div>
                                                @if ($errors->has('image'))
                                                    <span class="help-block">
                                                      <small>{{ $errors->first('image') }}</small>
                                                     </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div id="cv" class="form-group {{ $errors->has('cv') ? ' has-error' : '' }}">
                                                <label for="cv">السيره الذاتيه اذا وجدت *</label>
                                                <textarea class="form-group form-control disabled" disabled
                                                          name="cv">السيره الذاتيه اذا وجدت </textarea>

                                                @if($errors->has('cv'))
                                                    <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('cv') }}</small>
                                                </span>
                                                @endif
                                            </div>
                                        </div>


                                    {{--</div>--}}


                                    <div class=" col-md-12">
                                        <div class="form-group">

                                            <input id="submit" name="submit" type="submit"
                                                   class="form-control btn btn-primary"/>
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
        function select(that) {
            if (that.value == 3) {
                //   alert("check");
                document.getElementById("doc").style.display = "block";
                $("#home_clinc").prop('required', true);
            } else if (that.value != 3) {
                //   alert("check");
                document.getElementById("doc").style.display = "none";
                $("#home_clinc").prop('required', false);

            } else {
                document.getElementById("doc").style.display = "none";
                $("#home_clinc").prop('required', false);
            }
        }
    </script>
@stop
