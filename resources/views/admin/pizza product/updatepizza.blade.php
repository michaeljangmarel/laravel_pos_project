@extends('admin.layouts.app')

@section('title','Pizzaui')
@section('content')


            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid mt-3">
                        <div class="col-lg-10 offset-1">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <a href="{{ route('pizzainfo0',$lala->id) }}">
                                            <i class="fa-solid fa-arrow-left text-dark"></i>
                                        </a>
                                        <h3 class="text-center title-2">   UPDATE PIZZA NAME  </h3>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-6">
                                                <img  class="text-center mt-4" src="{{ asset('storage/'.$lala->image) }}" width="500px">
                                    </div>
                                    <div class="col-6">
                                        <div class="">
                                            <form action="{{ route('upreal') }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                                @csrf
                                                <div class="">
                                                    <input type="file" name="photo" class="form-control @error('photo')
                                                    is-invalid
                                                    @enderror">
                                                    @error('photo')
                                                        <small class="text-danger"> {{ $message }} </small>
                                                    @enderror
                                                </div>

                                                <input  hidden name="idss" type="text" value="{{ $lala->id }}">
                                                <div class="form-group">
                                                    <label  class="control-label mb-1">NAME </label>
                                                    <input  name="upname" type="text" class="form-control @error('upname') is-invalid  @enderror"  value="{{ $lala->name}}" aria-required="true" aria-invalid="false" placeholder="ENTER YOUR NEW NAME" >
                                                    @error('upname')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label  class="control-label mb-1">PRICE</label>
                                                    <input  name="upprice" type="number" value="{{ $lala->price }}" class="form-control @error('upprice') is-invalid  @enderror" aria-required="true" aria-invalid="false" placeholder="Price "  >
                                                    @error('upprice')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                    @enderror
                                                </div>
                                                <label  class="control-label mb-1">CATEGORY</label>
                                                <select class="form-control @error('cate')
                                                    is-invalid
                                                @enderror" name="cate"  >
                                                    <option value="">Choose your product...</option>
                                                    @foreach ($lalas as $one )
                                                    <option @if ($lala->category_id == $one->category_id)
                                                        selected
                                                    @endif value="{{ $one->category_id }}"> {{ $one->name}}</option>

                                                    @endforeach
                                                    @error('cate')
                                                        <small class="text-danger">{{$message }}</small>
                                                    @enderror
                                                </select>
                                                <div class="form-group">
                                                    <label  class="control-label mb-1">DESCRIPTION </label>
                                                    <input type="text" name="updesc" value="{{ $lala->description }}"  placeholder="Description" class="form-control @error('updesc') is-invalid  @enderror">
                                                    @error('updesc')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label  class="control-label mb-1">TIME</label>
                                                    <input  name="uptime" type="number" value="{{ $lala->waiting_time }}" class="form-control @error('uptime') is-invalid  @enderror" aria-required="true" aria-invalid="false" placeholder=" HOUR / MINUTES"  >
                                                    @error('uptime')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                    @enderror
                                                </div>

                                                <div><input type="text" disabled  name="form-control" value="{{ $lala->created_at->format('D-M-Y | h:i') }}"></div>
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


