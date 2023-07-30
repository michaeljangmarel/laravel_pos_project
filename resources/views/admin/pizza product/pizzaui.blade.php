
@extends('admin.layouts.app')
@section('title' , 'Products')
@section('content')

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="col-md-12">
                            <!-- DATA TABLE -->
                            <div class="table-data__tool">
                                <div class="table-data__tool-left">

{{--
                            <div class="col-5 offset-7">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ session('noti') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>
                            </div> --}}
                                    <div class="overview-wrap">
                                        <h2 class="title-1">TOTAL - {{ $pros->total() }}</h2>

                                    </div>
                                </div>
                                <div class="table-data__tool-right">
                                    <a href="{{ route('CreatePizza') }}">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>add pizza
                                        </button>
                                    </a>
                                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                        CSV download
                                    </button>
                                </div>
                            </div>

                            <div class="container-fluid col-3">
                                <form class="d-flex" role="search" action="{{ route('productname') }}" method="GET">
                                    @csrf
                                  <input class="form-control me-2" name="finds" value="{{ request('finds') }}" type="search" placeholder="Search" aria-label="Search">
                                  <button class="btn btn-primary" type="submit">Search</button>
                                </form>
                              </div>
                            <div class="table-responsive table-responsive-data2">
                                @if (count($pros) != 0)
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Category</th>
                                            <th>View COUNT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pros as $pro )
                                        <tr class="tr-shadow">
                                            <td><img src="{{ asset('storage/'.$pro->image) }}"  ></td>
                                            <td>
                                                <span class="block-email"> {{ $pro->name }} </span>
                                            </td>
                                            <td class="desc">{{ $pro->price }} kYATS</td>
                                            <td> {{ $pro->category_name }} </td>
                                            <td>{{ $pro->view_count }}</td>
                                            <td>
                                                <div class="table-data-feature d-flex justify-content-around">
                                                    <a href="{{ route('pizzainfo0',$pro->id) }}">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="View">
                                                            <i class="fa-solid fa-info"></i>
                                                        </button>
                                                    </a>
                                                    <a href="{{ route('pizzaupui', $pro->id) }}">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                    </a>
                                                    <a href="{{ route('pizzadelete',$pro->id) }}">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
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
                                @else

                                <div class="mt-3  ">
                                    <h3 class="text-secondary text-center">THERE IS NO PRODUCT </h3>
                                </div>
                                @endif

                                <div class="mt-5">
                                    {{ $pros->appends(request()->query())->links() }}
                                </div>
                            </div>
                            <!-- END DATA TABLE -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->

@endsection
