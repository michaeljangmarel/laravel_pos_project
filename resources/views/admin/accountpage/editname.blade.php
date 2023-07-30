@extends('admin.layouts.app')

@section('title','Update name')
@section('content')


            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid mt-3">
                        <div class="col-lg-10 offset-1">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">  UPDATE NAME  </h3>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="image">
                                                @if ( Auth::user()->img == null && Auth::user()->gender == 'Male')
                                            <img width="400px" src="{{ asset('userph/istockphoto-1131164548-612x612.jpg') }}" alt="John Doe" />
                                            @elseif (Auth::user()->img == null && Auth::user()->gender == 'Female')
                                            <img  width="400px" src="{{ asset('usergirl/girl.jfif') }}" alt="">
                                            @else
                                            <img  width="400px" src="{{  asset('storage/'.Auth::user()->img) }}" alt="John Doe" />
                                            @endif
                                         </div>

                                    </div>
                                    <div class="col-6">
                                        <div class="">
                                            <form action="{{ route('updateprofile') }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                                @csrf
                                                <div class="">
                                                    <input type="file" name="photo" class="form-control @error('photo')
                                                    is-invalid
                                                    @enderror">
                                                    @error('photo')
                                                    <small class="text-danger">   {{ $message }}  </small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label  class="control-label mb-1">NAME </label>
                                                    <input  name="upname" type="text" class="form-control @error('upname') is-invalid  @enderror" aria-required="true" aria-invalid="false" placeholder="ENTER YOUR NEW NAME"  value="{{ old('upname',Auth::user()->name ) }}">
                                                    @error('upname')
                                                    <small class="text-danger">   {{ $message }}  </small>
                                                    @enderror

                                                </div>

                                                <input type="text" name="cuid" hidden value="{{ Auth::user()->id }}">
                                                <div class="form-group">
                                                    <label  class="control-label mb-1">EMAIL</label>
                                                    <input  name="upemail" type="text" class="form-control @error('upemail') is-invalid  @enderror" aria-required="true" aria-invalid="false" placeholder="ENTER YOUR NEW EMAIL " value="{{ Auth::user()->email }}">
                                                    @error('upemail')
                                                    <small class="text-danger">   {{ $message }}  </small>
                                                    @enderror

                                                </div>
                                                <div class="form-group">
                                                    <label  class="control-label mb-1">ADDRESS </label>
                                                    <input  name="upaddress" type="text" class="form-control @error('upaddress') is-invalid  @enderror" aria-required="true" aria-invalid="false" placeholder="ENTER YOUR NEW ADDRESS "  value="{{ Auth::user()->address }}">
                                                    @error('upaddress')
                                                    <small class="text-danger">   {{ $message }}  </small>
                                                    @enderror

                                                </div>
                                                <div class="form-group">
                                                    <label  class="control-label mb-1">PHONE</label>
                                                    <input  name="upphone" type="number" class="form-control @error('upphone') is-invalid  @enderror" aria-required="true" aria-invalid="false" placeholder="ENTER YOUR CONFRIM NEW PHONE NUMBER " value="{{ Auth::user()->phone }}" >
                                                    @error('upphone')
                                                    <small class="text-danger">   {{ $message }}  </small>
                                                    @enderror

                                                </div>
                                                @error('createItem')
                                                <small class="text-danger">   {{ $message }}  </small>
                                                @enderror

                                                <div class="">
                                                   <label > Gender</label>
                                                   <select name="upgender" class="form-control">
                                                    <option value="Male" @if (Auth::user()->gender== 'Male' )
                                                        selected

                                                    @endif >Male</option>
                                                    <option value="Female" @if (Auth::user()->gender== 'Female' )
                                                        selected @endif>Female</option>
                                                </select>
                                                </div>

                                                <div  class="mt-3">
                                                    <button id="payment-button" type="submit" class="btn btn-info float-center ">
                                                        <i class="fa-solid fa-wrench"></i>  <span id="payment-button-amount">CHANGE</span>
                                                        {{-- <span id="payment-button-sending" style="display:none;">Sending…</span> --}}
                                                        {{-- <i class="fa-solid fa-circle-right"></i> --}}
                                                    </button>
                                                </div>
                                            </form>

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


