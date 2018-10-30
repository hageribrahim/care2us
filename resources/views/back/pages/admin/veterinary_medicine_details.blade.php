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
                            <a href="{{url('/add-question-veterinary/'.$subject->id)}}">
                                <span class="pull-right">
                                    <p class="btn btn-info btn-xs"><i class="icon-plus-circle2"></i> اضف سوال </p>
                                </span>
                            </a>
                            <h6 class="panel-title"> {{$subject->title}}
                            </h6>
                            <hr>
                        </div>
                        <div class="container-fluid">
                            <div class="content">
                                @if(session()->has('success'))
                                    <div calss="col-md-6 col-md-offset-3">
                                        <div class="alert alert-success text-center">
                                            {{ session()->get('success') }}
                                        </div>
                                    </div>
                                @endif
                                <div class="col-md-offset-3">
                                    <img src="{{url('images/medicines/'.$subject->image)}}" width="300px"
                                         height="300px">
                                </div>
                                @foreach($details as $detail)
                                    <div class="row">
                                        <p class="text-grey"
                                           style="font-size:16px; font-weight:600;"> {{$detail->question}} </p>
                                        <p class="text-grey-600">{{ $detail->answer }}</p>


                                        <div class="col-md-6">
                                            <form method="post" action="{{url('/delete-question-veterinary/'.$detail->id)}}">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="subject" value="{{$subject->id}}">
                                                <button type="submit" class="btn btn-danger"onclick="return confirm('هل تريد حذف هذا الموضوع بالاسئلة ؟');">
                                                    <i class="icon-trash"></i></button>

                                                <a href="{{url('/update-question-veterinary/'.$detail->id)}}"
                                                   class="btn btn-success"><i
                                                            class="icon-pencil5"> </i></a>
                                            </form>


                                            <hr class="center">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /main content -->
@stop
