@extends('admin.layouts.app')
@section('title','Category')
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
                                        <h2 class="title-1">Category  List  Total - {{ $categorydatatoui->total()}} </h2>
                                    </div>
                                </div>
                                <div class="table-data__tool-right">
                                    <a href="{{ route('createCategory') }}">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>add category
                                        </button>
                                    </a>
                                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                        CSV download
                                    </button>
                                </div>
                            </div>
                            <form  method="GET" action="{{ route('categoryadmin') }}">
                                @csrf
                                <div class="col-6 offset-3 d-flex">
                                    <div class="">
                                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name='find' value="{{ request('find') }}">
                                    </div>
                                    <div class="">
                                        <button class="btn btn-outline-success" type="submit">Search</button>

                                    </div>
                                </div>
                              </form>

                            @if (session('categorysuccess'))
                            <div class="col-5 offset-7">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ session('categorysuccess') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>
                            </div>

                            @endif
                            @if (session('updatesuccess'))
                            <div class="col-5 offset-7">
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    <strong>{{ session('updatesuccess') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>
                            </div>
                            @endif
                            @if (session('categorydelect'))
                            <div class="col-5 offset-7">
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>{{ session('categorydelect') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>
                            </div>

                            @endif
                            @if (count($categorydatatoui) != 0)
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>ITEM NAME</th>
                                            <th>CREATE DATE</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ( $categorydatatoui as $c )
                                       <tr class="tr-shadow mb-4">
                                        <td> {{  $c->category_id }} </td>
                                        <td>
                                            <span class="block-email">{{$c->name }}</span>
                                        </td>
                                        <td class="desc">{{ $c->created_at->format(' h:i A | D-M-Y ') }}</td>
                                        <td> <div class="table-data-feature">
                                          <a href="{{ route('edit',$c->category_id) }}">

                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </button>
                                          </a>

                                            <a href="{{ route('delect',$c->category_id) }}">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </a>

                                            {{-- <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                <i class="zmdi zmdi-more"></i>
                                            </button> --}}
                                        </div></td>
                                    </tr>

                                       @endforeach

                                    </tbody>
                                </table>

                                <div class="mt-5">
                                    {{ $categorydatatoui->appends(request()->query())->links() }}
                                </div>

                            </div>

                            @else

                            <h3 class="text-secondary text-center">THERE IS EMPTY CATEGORY ! </h3>

                            @endif


                            <!-- END DATA TABLE -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->


@endsection


