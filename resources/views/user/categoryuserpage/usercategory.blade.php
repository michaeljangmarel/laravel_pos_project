@extends('user.layout.master')
@section('title' , 'Product page')
@section('lala')


    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">
                <!-- Price Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by price</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>

                        <div class="d-flex align-items-center justify-content-between mb-3">
                              Categories <span class="badge text-bg-secondary">{{ count($catpro) }}</span>
                                                </div>
                                                <div class="mb-2">
                                                    <a href="{{ route('userui') }}">
                                                    <h6>All</h6>
                                                    </a>
                                                </div>
                            @if (count($catpro) != 0 )
                            @foreach ($catpro as $pro )
                        <div class="d-flex align-items-center justify-content-between mb-3 text-dark">
                       <a href="{{ route('haha',$pro->category_id) }}">
                        <h6 class="text-dark text-decoration-none @if (url()->current() == route('haha',$pro->category_id))
                            text-info
                        @endif" for="price-1"> {{ $pro->name }}</h6>
                       </a>
                        </div>
                        @endforeach
                           @else
                           <h4>THERE IS NO CATEGORY </h4>
                            @endif

                    </form>
                    <a href="{{ route('historyss') }}">
                        <button type="button"  class="btn btn-warning col-12"> Order List</button>
                    </a>
                </div>
                <!-- Price End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div>
                               <a href="{{ route('fullcart') }}">
                                <button type="button" class="btn btn-primary position-relative">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        {{ count($ccs) }}
                                     </span>
                                  </button>
                                </a>

                                <a href="{{ route('historyss') }}">
                                    <button type="button" class="btn btn-primary position-relative ms-3">
                                        <i class="fa-solid fa-clock-rotate-left"></i><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                            {{ count($order) }}
                                         </span>
                                      </button>
                                </a>
                            </div>

                        </div>
                    </div>
                   <span class="row" id="notify">
                    @foreach ($pizzapro as $products )
                    <div class="col-lg-4 col-md-6 col-sm-6 pb-1" >
                     <div class="product-item bg-light mb-4" id="usform">
                         <div class="product-img position-relative overflow-hidden">
                             <img    class="img-fluid w-100" height="220px" src="{{ asset('storage/'.$products->image) }}" alt="">
                              <div class="product-action">

                                 <a class="btn btn-outline-dark btn-square" href="{{ route('pizza_fullspace',$products->id) }}"><i class="fa fa-shopping-cart"></i></a>

                             </div>
                         </div>
                         <div class="text-center py-4">
                             <a class="h6 text-decoration-none text-truncate" href="">{{ $products->name }}</a>
                             <div class="d-flex align-items-center justify-content-center mt-2">
                                 <h5>{{ $products->price }} Kyats</h5><h6 class="text-muted ml-2"> </h6>
                             </div>
                         </div>
                     </div>
                 </div>
                    @endforeach
                   </span>
                 </div>

            </div>
            <!-- Shop Product End -->
        </div>
    </div>

    <!-- Shop End -->

@endsectionး

@section('jalink')
<script  src="{{ asset('js/user_category.js') }}">
</script>
@endsection
