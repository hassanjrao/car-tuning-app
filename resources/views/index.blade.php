@extends("layouts.front")

@section("page-title", "Home")


@section("content")

    <!-- Carousel Start -->
    <div class="container-fluid p-0" style="margin-bottom: 90px;">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset("front-assets/img/carousel-1.jpg")}}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Rent A Car</h4>
                            <h1 class="display-1 text-white mb-md-4">Best Rental Cars In Your Location</h1>
                            {{-- <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">Reserve Now</a> --}}
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Rent A Car</h4>
                            <h1 class="display-1 text-white mb-md-4">Quality Cars with Unlimited Miles</h1>
                            {{-- <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">Reserve Now</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            {{-- <h1 class="display-1 text-primary text-center">01</h1> --}}
            <h1 class="display-4 text-uppercase text-center mb-5">Chip tuning and programming</span></h1>
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    {{-- <img class="w-75 mb-4" src="{{ asset("front-assets/img/about.png") }}" alt=""> --}}
                    <p>Whether you want to have your exclusive sports car tuned or want to give your loyal diesel extra power, at Ecu-Soft we have the knowledge and technology to improve the performance of your car. Optimizing the performance of your car so that you experience more driving pleasure, that makes us very happy. You will receive honest advice from us about the expected result. We love cars and don't do anything that will damage their reliability or technology.

                        More power and save on fuel? Discover the possibilities for your car at Ecu-Soft.</p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-4 mb-2">
                    <div class="d-flex align-items-center bg-light p-4 mb-4" style="height: 150px;">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary ml-n4 mr-4"
                            style="width: 100px; height: 100px;">
                            <i class="fa fa-2x fa-headset text-secondary"></i>
                        </div>
                        <h4 class="text-uppercase m-0">Find Your Car</h4>
                    </div>
                </div>
                <div class="col-lg-4 mb-2">
                    <div class="d-flex align-items-center bg-secondary p-4 mb-4" style="height: 150px;">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary ml-n4 mr-4"
                            style="width: 100px; height: 100px;">
                            <i class="fa fa-2x fa-car text-secondary"></i>
                        </div>
                        <h4 class="text-light text-uppercase m-0">Custom Chip Tunning</h4>
                    </div>
                </div>
                <div class="col-lg-4 mb-2">
                    <div class="d-flex align-items-center bg-light p-4 mb-4" style="height: 150px;">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary ml-n4 mr-4"
                            style="width: 100px; height: 100px;">
                            <i class="fa fa-2x fa-map-marker-alt text-secondary"></i>
                        </div>
                        <h4 class="text-uppercase m-0">Our Test Branch</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->





    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            {{-- <h1 class="display-1 text-primary text-center">06</h1> --}}
            <h1 class="display-4 text-uppercase text-center mb-5">Contact Us</h1>
            <x-contact-us />
        </div>
    </div>
    <!-- Contact End -->






@endsection
