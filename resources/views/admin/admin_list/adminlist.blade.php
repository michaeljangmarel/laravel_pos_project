@extends('admin.layouts.app')
@section('title','Admin_List')
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
                                        <h2 class="title-1">Admin List</h2>

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
                                 <div class="container-fluid col-3">
                                  <form class="d-flex" role="search" action="{{ route('adminui_to') }}" method="GET">
                                    @csrf
                                    <input class="form-control me-2" type="search" value="{{ request('find') }}" name="find" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-info" type="submit">Search</button>
                                  </form>
                                </div>
                             <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>image</th>
                                            <th>name</th>
                                            <th>email</th>
                                            <th>phone number</th>
                                            <th>address</th>
                                            <th>role</th>
                                            <th>GENDER</th>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admin as  $ad )
                                        <tr class="tr-shadow">
                                            <td>
                                            @if ($ad->img == null && $ad->gender == 'Male')
                                            <img src="{{ asset('userph/istockphoto-1131164548-612x612.jpg') }}" width="400px" alt="">
                                            @elseif ($ad->img == null && $ad->gender == 'Female')
                                            <img width="400px"  src="{{ asset('usergirl/girl.jfif') }}" alt="">
                                            @else
                                            <img class="thumbnail" width="400px" src="{{ asset('storage/'.$ad->img) }}" alt="">
                                            @endif
                                            </td>
                                            <td>
                                                <span class="block-email">{{  $ad->name }}</span>
                                            </td>
                                            <td class="desc">{{ $ad->email }}</td>
                                            <td> {{ $ad->phone }} </td>
                                            <td>
                                                <span class="status--process">{{ $ad->address }}</span>
                                            </td>
                                            <td> {{ $ad->role }}</td>
                                            <td>{{  $ad->gender  }}</td>
                                             <td>
                                                <div class="table-data-feature">
                                                    {{-- <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                                        <i class="zmdi zmdi-mail-send"></i>
                                                    </button> --}}
                                                    <a href="@if (Auth::user()->id == $ad->id)
                                                        #
                                                    @else
                                                    {{ route('changerole',$ad->id) }}
                                                    @endif">
                                                     @if (Auth::user()->id == $ad->id)
                                                     @else
                                                     <button class="item" data-toggle="tooltip" data-placement="top" title="Edit Role">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </button>
                                                     @endif
                                                    </a>

                                                    <a href="@if (Auth::user()->id == $ad->id)
                                                        #
                                                    @else

                                                    {{ route('adminlist',$ad->id) }}
                                                    @endif">
                                                       @if (Auth::user()->id == $ad->id)
                                                       @else
                                                       <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>
                                                       @endif
                                                    </a>
                                                    {{-- <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                        <i class="zmdi zmdi-more"></i>
                                                    </button> --}}
                                                </div>
                                            </td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-3">
                              {{ $admin->appends(request()->query())->links() }}
                                </div>
                            </div>
                            <!-- END DATA TABLE -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->

@endsection


