@extends('user.layout.master')
@section('title' , 'contact')

@section('lala')

<div class="row">
    <div class="col-6 offset-3 card p-3 ">
         <form action="{{ route('go_to_process') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div>
                        <label>Name</label>
                        <input type="text" name="name" class="form-control  @error('name')
                        is-invalid
                        @enderror" value="{{ old('name') }}"  > @error('name')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div>
                        <label>Email</label>
                        <input type="email" name="email" class="form-control @error('email')
                        is-invalid
                        @enderror" value="{{ old('email') }}"  > @error('email')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
             </div>
             <div>
                <label> Description </label>
                <textarea name="script"  value="{{ old('script') }}"  class="form-control @error('script')
                is-invalid
                @enderror" cols="30" rows="10"></textarea> @error('script')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
             </div>

             <div class="mt-3">
                <input type="submit" value="Submit" class="btn btn-warning">
             </div>

         </form>
    </div>
</div>
@endsection
