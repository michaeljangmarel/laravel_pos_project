@extends('admin.layouts.app')

@section('content')
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="col-md-12">
                            <div class="col-4 card">
                                <div class="row p-3">
                                    <div class="col-6  ">
                                        <div class=""><i class="fa-solid fa-address-card fs-4"></i> Order Id : </div>
                                        <div class="">
                                            <i class="fa-regular fa-user fs-4" ></i> User Name :
                                       </div>
                                       <div>
                                        <i class="fa-solid fa-hashtag fs-4"> </i> Order Code:
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="">{{ $realorder[0]->id }}</div>
                                        <div class="">{{ strtoupper($realorder[0]->user_name) }}</div>
                                        <div class="">
                                               {{  $realorder[0]->order_code }}
                                        </div>
                                    </div>
                                 </div>
                            </div>
                            <!-- DATA TABLE -->
                            <div class="table-data__tool">
                                <div class="table-data__tool-left">
                                    <div class="overview-wrap">
                                        <a href="{{ route('orderuilistss') }}">
                                            <i class="fa-solid fa-arrow-left fs-4 text-dark"></i>
                                        </a>
                                        <h2 class="title-1">Order List</h2>

                                    </div>
                                </div>

                            </div>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>User Id </th>
                                             <th>Product image</th>
                                            <th>PRODUCT NAME</th>
                                             <th>date</th>
                                            <th>qty</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                         </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($realorder as $two )
                                    <tr class="tr-shadow">
                                        <td>{{ $two->user_id }}</td>
                                         <td>
                                            <img src="{{ asset('storage/'.$two->img) }}" width="120px" alt="">
                                        </td>
                                        <td class="desc">{{ $two->pro_name }} </td>
                                        <td>{{ $two->created_at->format('D-m-Y h:i') }}</td>
                                        <td>
                                            <span class="status--process">{{ $two->qty }}</span>
                                        </td>
                                        <td> {{  $two->price }} Kyats</td>
                                        <td>{{ $two->qty * $two->price }} Kyats</td>

                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                             </div>
                            <!-- END DATA TABLE -->

                            <div class="col-5 card mt-3 p-3">
                                <h5 class="text-center">TOTAL STATUS</h5>
                              <div>
                                TOTAL <input type="text" disabled class="form-control" value="{{ $subtotal }} Kyats">
                              </div>
                              <div>
                                DELIVERY FEES <input type="text" disabled class="form-control" value="3000 Kyats">
                              </div>
                              <div>
                                PAYMENT AMOUNT <input type="text" disabled class="form-control" value="{{ $fin }} Kyats">
                              </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->

@endsection
