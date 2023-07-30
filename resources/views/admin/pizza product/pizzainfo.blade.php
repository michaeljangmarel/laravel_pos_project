@extends('admin.layouts.app')

@section('title','Details ')
@section('content')


            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid mt-3">
                        <div class="col-lg-10 offset-1">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <a href="{{ route('productname',$str->id) }}">
                                            <button type="submit">
                                      <h5 class="float-start"><i class="fa-solid fa-arrow-left" ></i> BACK</h5>
                                            </button>
                                        </a>
                                        <div class="">
                                            <h3 class="text-center title-2"> Pizza Detail   </h3>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="row">
                                        <div class="col-md-7 p-3 mt-3">
                                            <div class="image">
                                                <img  width="400px" src="{{ asset('storage/'.$str->image) }}" alt="">
                                         </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="">
                                                <h3 class="text-secondary my-3" ><i class="fa-solid fa-pizza-slice"></i>  {{ $str->name }} </h3>
                                                <h3 class="text-secondary my-3" ><i class="fa-solid fa-list-ul"></i>     {{ $str->category_name }} </h3>
                                                <h3 class="text-secondary mt-3 my-3 " ><i class="fa-solid fa-hand-holding-dollar"></i>  {{ $str->price }} Kyats </h3>
                                                <h3 class="text-secondary mt-3 my-3 " ><i class="fa-solid fa-stopwatch"></i>   {{ $str->waiting_time }} mins </h3>
                                               <h3 class="text-secondary mt-3 my-3" ><i class="fa-regular fa-calendar"></i> {{ $str->created_at->format('D-M-Y | h:i')}}</h3>
                                               <h3><i class="fa-solid fa-eye text-muted"></i>   {{ $str->view_count }}</h3>
                                               {{-- <h3 class="text-secondary mt-3 my-3" ><i class="fa-regular fa-calendar-check"></i>  </h3>
                                               <h3 class="text-secondary mt-3 my-3 " ><i class="fa-solid fa-venus-mars"></i>        </h3> --}}
                                               <div class="mt-3">
                                                <h4 class=" text-secondary">PRODUCED BY HAWARI <small>COLLECTION</small> </h4>
                                                <h5 class="text-muted mt-1">  {{  $str->description }}</h5>
                                               </div>
                                                </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->

@endsection

