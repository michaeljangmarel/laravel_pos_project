@extends('admin.layouts.app')

@section('title' , 'Order_management')
@section('content')


            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="col-md-12">
                            <!-- DATA TABLE -->
                            <div class="table-data__tool">
                                <div class="table-data__tool-left">
                                    <div class="overview-wrap">
                                        <h2 class="title-1">Order Total - {{ count($lalaorder) }}</h2>

                                    </div>
                                </div>

                            </div>
                            <label for="">Order Status</label>
                            <form action="{{ route('jjj') }}" method="GET">
                                @csrf
                                <div class="d-flex">
                                    <select id="state"  name="py"  class="form-control col-2">
                                        <option value="" >All</option>
                                        <option value="0"  @if (request('py')=='0')
                                        selected

                                        @endif >Pending</option>
                                        <option value="1" @if (request('py')=='1')
                                        selected

                                        @endif >SUCCESS</option>
                                        <option value="2"  @if (request('py')=='2')
                                        selected

                                        @endif>REJECT</option>
                                    </select>
                                    <input type="submit" value="Search" class="btn btn-primary">
                                 </div>
                            </form>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>USER ID</th>
                                            <th>User NAME</th>
                                            <th>order code</th>
                                            <th>total</th>
                                            <th>status</th>
                                            <th>DATE</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tb" id="ts">

                                        @foreach ($lalaorder as $or )
                                        <tr class="tr-shadow">
                                            <td>{{ $or->user_id  }}</td>
                                            <td>
                                                <span class="block-email">{{  $or->user_name }}</span>
                                            </td>
                                            <td class="desc"> <a href="{{ route('ordercode',$or->order_code) }}"> {{ $or->order_code }}</a></td>
                                            <td class="amount">{{ $or->final_amount }} Kyats

                                            </td>
                                            <td>
                                                <input type="hidden" id="idss" value="{{ $or->id }}">
                                                <span class="status--process">
                                                    <select  id="chch" class="form-control chchs">
                                                        <option value="0" @if ($or->status == 0)    selected     @endif>Pending</option>
                                                        <option value="1" @if ($or->status == 1)    selected     @endif >Success</option>
                                                        <option value="2" @if ($or->status == 2)    selected     @endif >Reject</option>
                                                    </select>
                                                </span>
                                            </td>
                                            <td> {{ $or->created_at->format('M-d-Y') }}</td>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- END DATA TABLE -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
@endsection

@section('jq')

<script>



    // $('#state').change(function(){


    //     $lala = $('#state').val();

    //         $.ajax({
    //             type : 'get' ,
    //             dataType : 'json',
    //             url : 'http://127.0.0.1:8000/do' ,
    //             data :{'status' : $lala },
    //             success : function(response){
    //                 $getin = '';


    //                 for($i = 0 ; $i<response.length ; $i++){

    //                     $month = ['January' , 'Febaury' , 'March' , 'April' , 'May' , 'June' , 'July' , 'August' , 'September' , 'October' , 'November' , 'December' ];


    //                 $time = new Date(response[$i].created_at);

    //                     $cu = $month[$time.getMonth()]+'-'+$time.getDate()+'-'+$time.getFullYear();
    //                           if(response[$i].status == 0){
    //                             $st =  ` <span class="status--process">
    //                                                 <select name="" id="" class="form-control chchs">
    //                                                     <option value="0"  selected >Pending</option>
    //                                                     <option value="1"  >Success</option>
    //                                                     <option value="2  >Reject</option>
    //                                                 </select>
    //                                             </span>` ;

    //                     }else if(response[$i].status == 1){
    //                            $st = ` <span class="status--process">
    //                                                 <select name="" id="" class="form-control chchs">
    //                                                     <option value="0"  >Pending</option>
    //                                                     <option value="1" selected >Success</option>
    //                                                     <option value="2">Reject</option>
    //                                                 </select>
    //                                             </span>` ;
    //                     }else if(response[$i].status == 2){
    //                            $st =  ` <span class="status--process">
    //                                                  <select name="" id="" class="form-control chchs">
    //                                                     <option value="0" >Pending</option>
    //                                                     <option value="1">Success</option>
    //                                                     <option value="2" selected >Reject</option>
    //                                                 </select>
    //                                             </span>` ;
    //                     }

    //                       $getin += `<tr class="tr-shadow">
    //                                      <input type="hidden" id="idss" value="${response[$i].id}">
    //                                         <td>${response[$i].user_id}</td>
    //                                         <td>
    //                                             <span class="block-email">${response[$i].user_name}</span>
    //                                         </td>
    //                                         <td class="desc"> ${response[$i].order_code}</td>
    //                                         <td class="amount">${response[$i].total} Kyats

    //                                         </td>
    //                                         <td>${$st}</td>
    //                                         <td> ${$cu}</td>

    //                                              </tr>`;
    //                      }

    //                  $('.tb').html($getin);



    //             }
    //         })

    //  });


     $('.chchs').change(function(){


        $node = $(this).parents('tr');
         $id = $node.find('#idss').val();
         $v = $node.find('.chchs').val();


         $.ajax({
            type : 'get' ,
            dataType : 'json' ,
            url : '/nana' ,
            data : {'oneid' : $id  , 'valuess' : $v} ,


         })


        });


</script>

@endsection


