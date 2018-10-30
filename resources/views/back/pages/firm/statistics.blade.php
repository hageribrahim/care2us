@extends('back.layout')
@section('script')
 <!-- Theme JS files -->

    <!-- /theme JS files -->

 <script>
     $(document).ready(function () {
         $(document).on('change', '#medicine', function () {
             var Coun_id = $(this).val();
             var div = $(this).parent();
             var op = "";
             var name="";
             // console.log(Coun_id);
             $.ajax({
                 type: 'get',
                 url: '{!! \Illuminate\Support\Facades\URL::to('/get-precentage')!!}',
                 data: {'id': Coun_id},
                 success: function (data) {
                     // console.log('success');
                     // console.log(data);
                     var height = data.quantity_sold + '%';
                     var top = 100 - data.quantity_sold + '%';
                     op += '<span>'+ data.quantity_sold +'%</span>';
                     name+='<th>'+data.medicine_name_en+'</th>';
                     $('#precentage').css("height", height);
                     $('#precentage').css("top", top);
                     $('#precentage').html("");
                     $('#precentage').append(op);
                     $('#name').html("");
                     $('#name').append(name);
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
    <div class="content-wrapper">
        <!-- Content area -->
        <div class="content">
            <!-- Main charts -->
            <div class="row">
                <div class="col-md-12">
                    <!-- Traffic sources -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h6 class="panel-title">compare</h6>
                        </div>

                        <div class="container-fluid">

                            <div class="row">
                                <div class=" col-md-6">
                                    <div class="form-group">
                                        <label for="medicine">اسم  الدواء *</label>
                                        <select name="medicine" id="medicine" class="form-control" required>
                                            <option value="0">من فضلك اختر الدواء</option>
                                            @foreach($medicines as $med)
                                                <option value="{{$med->id}}">{{$med->medicine_name_en}} {{$med->f_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="vertical rounded">

                                   <table style="border-width: 0px">
                                       <thead>
                                       <tr>
                                           <th style="padding-right:25px">{{$medicine->medicine_name_en}}</th>
                                           <th  style="padding-right:25px" id="name"></th>
                                       </tr>
                                       </thead>
                                       <tbody>
                                           <tr>
                                               <td>
                                                   <div class="progress-bar">
                                                       <div class="progress-track">
                                                           <div class="progress-fill">
                                                               <span>{{$medicine->quantity_sold}}%</span>
                                                           </div>
                                                       </div>
                                                   </div>
                                               </td>


                                               <td>

                                                   <div class="progress-bar">
                                                       <div class="progress-track">
                                                           <div class="progress-fill"  id="precentage">
                                                               <span class="span fill">0%</span>
                                                           </div>

                                                       </div>
                                                   </div>
                                               </td>

                                           </tr>
                                   </table>




                                </div>
                            </div>




                        </div>

                    </div>
                    <!-- /traffic sources -->

                </div>


            </div>
            <!-- /main charts -->

        </div>
        <!-- /content area -->

    </div>
    <!-- /main content -->
    <style>
        *, *:before, *:after {
            -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;
        }

        /* Vertical */

        .vertical .progress-bar {
            float: right;
            height: 300px;
            width: 40px;
            margin-right: 25px;
        }

        .vertical .progress-track {
            position: relative;
            width: 40px;
            height: 100%;
            background: #ebebeb;
        }

        .vertical .progress-fill {
            position: relative;
            background: #825;
            height: 50%;
            width: 40px;
            color: #fff;
            text-align: center;
            font-family: "Lato","Verdana",sans-serif;
            font-size: 12px;
            line-height: 20px;
        }

        .rounded .progress-track,
        .rounded .progress-fill {
            box-shadow: inset 0 0 5px rgba(0,0,0,.2);
            border-radius: 3px;
        }
        p
        {
            margin-right: 20px;
        }
    </style>

    <script>
        $('.horizontal .progress-fill span').each(function(){
            var percent = $(this).html();
            $(this).parent().css('width', percent);
        });


        $('.vertical .progress-fill span').each(function(){
            var percent = $(this).html();
            var pTop = 100 - ( percent.slice(0, percent.length - 1) ) + "%";
            $(this).parent().css({
                'height' : percent,
                'top' : pTop
            });
        });
    </script>
@stop

