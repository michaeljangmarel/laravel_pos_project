@extends('admin.layouts.app')
@section('title' , 'User_lists')

@section('content')

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="col-md-12">
                            <!-- DATA TABLE -->
                            <div class="table-data__tool">
                                <div class="table-data__tool-left">
                                    <div class="overview-wrap">
                                        <h2 class="title-1">User  Lists - {{ count($uslist) }}</h2>

                                    </div>
                                </div>
                                <div class="table-data__tool-right">
                                    <a href="category.html">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>add item
                                        </button>
                                    </a>
                                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                        CSV download
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>IMAGE</th>
                                            <th>name</th>
                                            <th>email</th>
                                            <th> address</th>
                                            <th>role</th>
                                            <th>Gender</th>
                                            <th>PHONE NUMBER</th>
                                            <th></th>
                                         </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($uslist as $us )
                                       <tr class="tr-shadow">
                                        <input  type="hidden" class="usid"  value="{{ $us->id }}">
                                        <td>
                                            @if ( $us->img == null && $us->gender == 'Male')
                                            <img src="{{ asset('userph/istockphoto-1131164548-612x612.jpg') }}" width="400px" alt="John Doe" />
                                            @elseif ($us->img == null && $us->gender == 'Female')
                                            <img width="400px" src="{{ asset('usergirl/girl.jfif') }}" alt="">
                                            @else
                                            <img width="400px" src="{{  asset('storage/'.$us->img) }}" alt="John Doe" />
                                            @endif
                                        </td>
                                        <td>{{ $us->name }}</td>
                                        <td>
                                            <span class="block-email">{{ $us->email }}</span>
                                        </td>
                                        <td class="desc">{{ $us->address }}</td>
                                        <td>
                                            <select class="rolech" >
                                                 <option value="user"  @if ($us->role == 'user')
                                                    selected
                                                @endif>User</option>
                                                <option value="admin" @if ($us->role == 'user')

                                                @endif>Admin</option>
                                            </select>
                                        </td>
                                        <td>
                                            <span class="status--process">{{ $us->gender }}</span>
                                        </td>
                                        <td>{{$us->phone}}</td>
                                        <td>
                                            <div class="table-data-feature">

                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                              <a href="{{ route('is',$us->id) }}">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                              </a>

                                            </div>
                                        </td>

                                    </tr>

                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- END DATA TABLE -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
@endsection

@section('jq')
    <script src="{{ asset('userto_admin_ajax/user.js') }}"></script>
@endsection
