@extends('admin.layouts.app')

@section('title','Pizza Create')
@section('content')

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-3 offset-8">
                                <a href="{{ route('productname') }}"><button class="btn bg-dark text-white my-3">List</button></a>
                            </div>
                        </div>
                        <div class="col-lg-6 offset-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Pizza Create Form</h3>
                                    </div>
                                    <hr>
                                    <form action="{{ route('notify') }}" method="post" enctype="multipart/form-data" novalidate="novalidate">
                                        @csrf
                                        <div class="form-group">
                                            <label  class="control-label mb-1">Name</label>
                                            <input  value="{{ old('crep') }}" name="crep" type="text" class="form-control @error('crep') is-invalid  @enderror" aria-required="true" aria-invalid="false" placeholder="Pizza...">
                                             @error('crep')
                                             <small class="text-danger">   {{ $message }}  </small>
                                             @enderror
                                        </div>

                                        <div class="form-group">
                                            <label  class="control-label mb-1">Category</label>
                                            <select name="opt" class="form-control @error('opt') is-invalid @enderror">
                                                <option value="">Choose your favourite</option>
                                                @foreach ($gogo as $go )
                                                <option value="{{ $go->category_id }}">{{ $go->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('opt')
                                            <small class="text-danger">   {{ $message }}  </small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label  class="control-label mb-1">Description</label>
                                            <textarea name="info" class="form-control @error('info') is-invalid @enderror"  cols="30" rows="10"> {{ old('info') }} </textarea>
                                            @error('info')
                                            <small class="text-danger">   {{ $message }}  </small>
                                            @enderror
                                        </div>
                                         <div class="form-group">
                                            <label  class="control-label mb-1">Image</label>
                                            <input type="file" name="pizimg"  class="form-control @error('pizimg')
                                            is-invalid

                                            @enderror">
                                            @error('pizimg')
                                            <small class="text-danger">   {{ $message }}  </small>
                                            @enderror

                                        </div>
                                        <div class="form-group">
                                            <label  class="control-label mb-1">Waiting Time </label>
                                            <input  value="{{ old('waiting') }}" name="waiting" type="number" class="form-control @error('waiting') is-invalid  @enderror" aria-required="true" aria-invalid="false" placeholder="Waiting time...">
                                            @error('waiting')
                                            <small class="text-danger">   {{ $message }}  </small>
                                            @enderror
                                        </div>
                                          <div class="form-group">
                                            <label  class="control-label mb-1">Price</label>
                                            <input  value="{{ old('pri') }}" name="pri" type="number" class="form-control @error('pri') is-invalid  @enderror" aria-required="true" aria-invalid="false" placeholder="Price">
                                            @error('pri')
                                            <small class="text-danger">   {{ $message }}  </small>
                                            @enderror
                                        </div>


                                        <div>
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                <i class="fa-solid fa-plus"></i>   <span id="payment-button-amount">Create</span>
                                                {{-- <span id="payment-button-sending" style="display:none;">Sending…</span> --}}
                                                <i class="fa-solid fa-circle-right"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>




@endsection


