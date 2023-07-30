@extends('admin.layouts.app')

@section('content')


            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-3 offset-8">
                                <a href="{{ route('categoryadmin') }}"><button class="btn bg-dark text-white my-3">List</button></a>
                            </div>
                        </div>
                        <div class="col-lg-6 offset-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">UPDATE FORM </h3>
                                    </div>
                                    <hr>
                                    <form action="{{ route('updated') }}" method="post" novalidate="novalidate">
                                        @csrf
                                        <div class="">
                                            <input type="text" name="updatess" hidden value="{{ $pay['category_id'] }}">
                                        </div>
                                        <div class="form-group">
                                            <label  class="control-label mb-1">Name</label>
                                            <input  value="{{ $pay['name'] }}" name="updateitem" type="text" class="form-control @error('updateitem') is-invalid  @enderror" aria-required="true" aria-invalid="false" placeholder="Seafood...">
                                        </div>
                                        @error('updateitem')
                                        <small class="text-danger">   {{ $message }}  </small>
                                        @enderror

                                        <div>
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                <i class="fa-regular fa-pen-to-square"></i>  <span id="payment-button-amount">UPDATE</span>
                                                {{-- <span id="payment-button-sending" style="display:none;">Sending…</span> --}}
                                                <i class="fa-solid fa-circle-right"></i>
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
