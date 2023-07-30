@extends('admin.layouts.app')

@section('title','Account Info ')
@section('content')


            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid mt-3">
                        <div class="col-lg-10 offset-1">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2"> ACCOUNT INFO  </h3>
                                    </div>
                                    @if (session('su'))
                                    <div class="col-5 offset-7">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{ session('su') }}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                          </div>
                                    </div>

                                    @endif
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="image">
                                                @if ( Auth::user()->img == null && Auth::user()->gender == 'Male')
                                                <img src="{{ asset('userph/istockphoto-1131164548-612x612.jpg') }}" alt="John Doe" />
                                                @elseif (Auth::user()->img == null && Auth::user()->gender == 'Female')
                                                <img  width="400px"  src="{{ asset('usergirl/girl.jfif') }}" alt="">
                                                @else
                                                <img  width="400px" src="{{  asset('storage/'.Auth::user()->img) }}" alt="John Doe" />
                                                @endif
                                         </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="my-3 ">
                                                <h3 class="text-secondary my-3" >  <i class="fa-regular fa-user"></i>         {{ Auth::user()->name }} </h3>
                                                <h3 class="text-secondary mt-3 my-3 " ><i class="fa-regular fa-envelope"></i>  {{ Auth::user()->email }} </h3>
                                                <h3 class="text-secondary mt-3 my-3 " ><i class="fa-solid fa-mobile"></i>      {{ Auth::user()->phone }} </h3>
                                               <h3 class="text-secondary mt-3 my-3" ><i class="fa-solid fa-location-dot"></i> {{ Auth::user()->address }} </h3>
                                               <h3 class="text-secondary mt-3 my-3" ><i class="fa-regular fa-calendar-check"></i> {{ Auth::user()->created_at->format('D-M-Y') }} </h3>
                                               <h3 class="text-secondary mt-3 my-3 " ><i class="fa-solid fa-venus-mars"></i>      {{ Auth::user()->gender }} </h3>
                                               <div class="mt-3">
                                               <a href="{{ route('editname') }}">
                                                <button class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i>   <small>EDIT</small></button>
                                               </a>
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


