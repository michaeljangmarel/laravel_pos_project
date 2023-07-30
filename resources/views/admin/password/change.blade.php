@extends('admin.layouts.app')

@section('title','Change Password')
@section('content')


            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid mt-3">
                        <div class="col-lg-6 offset-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">CHANGE PASSWORD </h3>
                                    </div>
                                    <hr>
                                    @if (session('chs'))
                                    <div class="col-12">
                                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                            <i class="fa-solid fa-check"></i>    <strong>{{ session('chs') }}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                          </div>
                                    </div>
                                    @endif
                                    <form action="{{ route('newpassword') }}" method="post" novalidate="novalidate">
                                        @csrf
                                        <div class="form-group">
                                            <label  class="control-label mb-1">Old Password </label>
                                            <input  name="oldpass" type="password" class="form-control @error('oldpass') is-invalid  @enderror" aria-required="true" aria-invalid="false" placeholder="ENTER YOUR  OLD PASSWORDD ">
                                            @error('oldpass')
                                            <small class="text-danger">   {{ $message }}  </small>
                                            @enderror

                                        </div>
                                        <div class="form-group">
                                            <label  class="control-label mb-1">New Password </label>
                                            <input  name="newpass" type="password" class="form-control @error('newpass') is-invalid  @enderror" aria-required="true" aria-invalid="false" placeholder="ENTER YOUR NEW PASSWORDD ">
                                            @error('newpass')
                                            <small class="text-danger">   {{ $message }}  </small>
                                            @enderror

                                        </div>
                                        <div class="form-group">
                                            <label  class="control-label mb-1">Confrim Password  </label>
                                            <input  name="conpass" type="password" class="form-control @error('conpass') is-invalid  @enderror" aria-required="true" aria-invalid="false" placeholder="ENTER YOUR CONFRIM PASSWORDD ">
                                            @error('conpass')
                                            <small class="text-danger">   {{ $message }}  </small>
                                            @enderror

                                        </div>
                                        @error('createItem')
                                        <small class="text-danger">   {{ $message }}  </small>
                                        @enderror

                                        <div>
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                <i class="fa-solid fa-lock"></i>  <span id="payment-button-amount">CHANGE</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->

@endsection


