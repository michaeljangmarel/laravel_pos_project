@extends('user.layout.master')
@section('title' , 'Cart_list')
@section('lala')

    <!-- Cart Start -->

    <div class="container-fluid">
        <a href="{{ route('userui') }}">
            <i class="fa-solid fa-arrow-left fs-4 text-dark"></i>
        </a>
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0" id="tabless">
                    <thead class="thead-dark">
                        <thead>
                            <th class="bg-warning">IMAGE</th>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Amount</th>
                            <th>Remove</th>
                        </thead>
                    </thead>
                    <tbody class="align-middle" id="data">
                       @foreach ($autos as $auto )
                       <tr>

                         <td><img width="150px" src="{{ asset('storage/'.$auto->image) }}" alt=""></td>
                        <td class="align-middle"><img src="img/product-1.jpg" alt="" style="width: 50px;"> {{ $auto->name }}  <input type="text" hidden value="{{ $auto->product_id }}" id="proid"> </td>
                        <td class="align-middle" id="price">{{ $auto->price }} <input type="text"  hidden  value="{{ $auto->user_id }}" id="usidss"></td>

                        <td class="align-middle">

                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-minus" >
                                    <i class="fa fa-minus"></i>
                                    </button>

                                </div>
                                <input min="1" type="text" id="total_piz" disabled class="form-control form-control-sm bg-secondary border-0 text-center" value="{{ $auto->amount }}">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-plus">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle" id="final_total"> {{ $auto->price * $auto->amount }} Kyats </td>
                        <td class="align-middle">
                            <a href="{{ route('mm',$auto->id) }}">
                                <button class="btn btn-sm btn-danger" id="remove"><i class="fa fa-times"></i></button>
                            </a>
                         </td>

                    </tr>

                       @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Total</h6>
                            <h6 id="toss">{{ $normal }} Kyats</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Delivery</h6>
                            <h6 class="font-weight-medium">3000 Kyats</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5 id="deli">{{$normal + 3000}} Kyats</h5>
                        </div>
                        <button id="orderbtn" class="btn btn-block btn-primary font-weight-bold my-3 py-3"> Order now </button>
                        <button id="orderbtn" class="btn btn-block btn-danger font-weight-bold my-3 py-3 dele"> Delect </button>

                    </div>
                </div>
            </div>
            <input type="text"  hidden  class="currentid" value="{{ Auth::user()->id }}">
        </div>
    </div>
    <!-- Cart End -->

@endsection

@section('jalink')
<script src="{{  asset('total_and_order_ajax/order_total.js') }}"></script>
@endsection
