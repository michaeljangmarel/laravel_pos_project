 @extends('user.layout.master')

 @section('lala')
    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <a href="{{ route('userui') }}" class="text-dark">
                <i class="fa-solid fa-arrow-left fs-3"></i>
            </a>
            <div class="col-lg-5 mb-30">
                <div id="product-carousel"   data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="{{ asset('storage/'.$all->image) }}" alt="Image">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3>Product Name Goes Here</h3>
                    <div class="d-flex mb-3">
                        {{-- <div class="text-primary mr-2">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star-half-alt"></small>
                            <small class="far fa-star"></small>
                        </div> --}}
                        <small class="pt-1"> {{ $all->view_count }} View Count <i class="fa-regular fa-eye"></i></small>
                    </div>
                    <div class="">
                        <h5> {{ $all->name }}</h5>
                        <input type="hidden" id="currentid" value="{{ Auth::user()->id }}" >
                        <input type="hidden" id="productid" value="{{ $all->id }}"  >
                    </div>
                    <h3 class="font-weight-semi-bold mb-4">{{ $all->price }} Kyats</h3>
                    <p class="mb-4">
                        {{ $all->description }}
                    </p>
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-minus">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>

                            <input type="text" id="totalpiz" class="form-control bg-secondary border-0 text-center" value="1">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-plus">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                         <button type="button" id="start" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To
                            Cart</button>
                     </div>
                    <div class="d-flex pt-2">
                        <strong class="text-dark mr-2">Share on:</strong>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Products Start -->
    <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">You May Also Like</span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                   @foreach ($alls as $p )
                   <div class="product-item bg-light">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid"  src="{{ asset('storage/'.$p->image) }}" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href="{{ route('pizza_fullspace',$p->id) }}"><i class="fa-solid fa-info"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes Here</a>
                        <div>
                            <h4>{{ $p->name }}</h4>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>{{ $p->price}} Kyats</h5>
                        </div>
                        <h6>PRODUCED BY HAWARI </h6> <span>collection</span>

                    </div>
                </div>

                   @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->
 @endsection

 @section('jalink')
<script src="{{ asset('js/addcart.js') }}">

</script>
 @endsection

