@extends('user.layout.master')
@section('title' , 'Password change')
@section('lala')
<div class="row">
    <div class="col-6 offset-3">
        <div class="card p-3">
            <form action="{{ route('chprocess') }}" method="POST">
                @csrf
                <a href="{{ route('userui') }}"><i class="fa-solid fa-arrow-left-long text-dark"></i></a>
                <h2 class="text-center text-muted"> CHANGE PASSWORD</h2>

                <hr>
                @if (session('pasu'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>  {{ session('pasu') }} </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>

                @endif
                <div class="">
                    <label class="text-muted">OLD PASSWORD</label>
                    <input type="password" name="oldpass" class="form-control @error('oldpass')
                        is-invalid
                    @enderror" placeholder="PLEASE HOLD YOUR OLD PASSWORD">
                    @error('oldpass')

                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="">
                    <label  class="text-muted">NEW PASSWORD</label>
                    <input type="password" name="newpass"  class="form-control  @error('newpass')
                    is-invalid
                    @enderror" placeholder="PLASE HOLD YOUR NEW PASSWORD">
                    @error('oldpass')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="">
                    <label  class="text-muted" >CONFRIM PASSWORD</label>
                    <input type="password" name="conpass" style="" class="form-control @error('conpass')
                    is-invalid

                    @enderror" placeholder="CONFRIM PASSWORD">
                    @error('conpass')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mt-3">
                    <button class="btn btn-dark text-white">
                        <i class="fa-solid fa-wrench"></i> SUBMIT
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
