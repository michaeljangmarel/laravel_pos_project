@extends('admin.layouts.app')
@section('title' , 'Change role')
@section('content')

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            {{-- <div class="col-3 offset-8">
                                <a href="category_list.html"><button class="btn bg-dark text-white my-3">List</button></a>
                            </div> --}}
                        </div>
                        <div class="col-lg-6 offset-3">
                            <div class="card">
                                <div class="card-body">
                                    <a href="{{ route('adminlist',$success->id) }}">
                                        <i class="fa-solid fa-arrow-left"></i>
                                    </a>
                                    <div class="card-title">
                                        <h3 class="text-center title-2">CHANGE ROLE</h3>
                                    </div>
                                    <hr>
                                     <div class="row">
                                      <div class="col-6 offset-3">
                                        @if ($success->img == null && $success->gender == 'Male')
                                        <img src="{{ asset('userph/istockphoto-1131164548-612x612.jpg') }}" width="350px" alt="">
                                        @elseif ($success->img == null && $success->gender == 'Female')
                                        <img width="350px"  src="{{ asset('usergirl/girl.jfif') }}" alt="">
                                        @else
                                        <img class="thumbnail" width="350px" src="{{ asset('storage/'.$success->img) }}" alt="">
                                        @endif
                                      </div>
                                      </div>
                                    <form action="{{ route('rolechpro') }}"  method="POST"   novalidate="novalidate">
                                        @csrf
                                        <input type="text" value="{{ $success->id }}" hidden name="no" >
                                        <div>
                                            <label  class="control-label mb-1">NAME</label>
                                            <input disabled type="text" class="form-control" value="{{  $success->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label  class="control-label mb-1">Role</label>
                                         <select name="role_ch" class="form-control @error('role_ch')
                                             is-invalid
                                         @enderror"  >
                                            <option value="">ROLE</option>
                                             <option @if ($success->role == 'admin')
                                                 selected
                                             @endif value="admin">ADMIN</option>
                                             <option @if ($success->role == 'user')
                                                 selected
                                             @endif value="user">USER</option>

                                         </select>
                                         @error('role_ch')
                                         <small class="text-danger">{{ $message }}</small>
                                     @enderror
                                        </div>

                                        <div>
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                <span id="payment-button-amount"><i class="fa-solid fa-wrench"></i>   Change</span>
                                                {{-- <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                <i class="fa-solid fa-circle-right"></i> --}}
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
