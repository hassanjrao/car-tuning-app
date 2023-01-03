<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>@yield('page-title') - Ed-Cartuning</title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap"
        rel="stylesheet">
        @include('sweetalert::alert')

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('front-assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front-assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('front-assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('front-assets/css/style.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark py-3 px-lg-5 d-none d-lg-block">
        <div class="row">
            <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <a class="text-body pr-3" href=""><i class="fa fa-phone-alt mr-2"></i>+012 345 6789</a>
                    <span class="text-body">|</span>
                    <a class="text-body px-3" href=""><i class="fa fa-envelope mr-2"></i>info@example.com</a>
                </div>
            </div>
            <div class="col-md-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-body px-3" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-body px-3" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-body px-3" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-body px-3" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-body pl-3" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="position-relative px-lg-5" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="{{ route('home') }}" class="navbar-brand">
                    {{-- <h1 class="text-uppercase text-primary mb-1">Ed-Cartuning --}}

                        <img src="{{ asset("media/logo.svg") }}" class="img-fluid" width="200px" height="200px" alt="Site logo">
                    {{-- </h1> --}}
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
                        {{-- <a href="{{ route('about') }}" class="nav-item nav-link">About</a> --}}

                        <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    @php
        $brands = \App\Models\Brand::all();
        $models = \App\Models\CarModel::all();
        $types = \App\Models\Type::all();
        $engines = \App\Models\Engine::all();

        $selected = '';

        // @dd($_GET)

    @endphp


    <!-- Search Start -->
    <div class="container-fluid bg-white pt-3 px-lg-5">

        <form action="{{ route('chip-tunning') }}" method="GET">
            {{-- @csrf --}}
            <div class="row mx-n2 justify-content-between">
                <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                    <select required class="custom-select px-4 mb-3 select2 " name="brand" style="height: 50px;">

                        @if (!isset($_GET['brand']))
                            <option selected value="">Select Brand</option>
                        @endif
                        @foreach ($brands as $brand)
                            @if (isset($_GET['brand']) && $_GET['brand'] == $brand->id)
                                <option value="{{ $brand->id }}" selected>{{ $brand->name }}</option>
                            @else
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                    <select required class="custom-select px-4 mb-3 select2" name="model" style="height: 50px;">

                        @if (!isset($_GET['model']))
                            <option selected value="">Select Model</option>
                        @endif

                        @foreach ($models as $model)
                            @if (isset($_GET['model']) && $_GET['model'] == $model->id)
                                <option value="{{ $model->id }}" selected>{{ $model->name }}</option>
                            @else
                                <option value="{{ $model->id }}">{{ $model->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                    <select required class="custom-select px-4 mb-3 select2" name="type" style="height: 50px;">

                        @if (!isset($_GET['type']))
                            <option selected value="">Select Type</option>
                        @endif


                        @foreach ($types as $type)
                            @if (isset($_GET['type']) && $_GET['type'] == $type->id)
                                <option value="{{ $type->id }}" selected>{{ $type->type }}</option>
                            @else
                                <option value="{{ $type->id }}">{{ $type->type }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>


                <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                    <select required class="custom-select  px-4 mb-3 select2" name="engine" style="height: 50px;">


                        @if (!isset($_GET['engine']))
                            <option selected value="">Select Engine</option>
                        @endif

                        @foreach ($engines as $engine)
                            @if (isset($_GET['engine']) && $_GET['engine'] == $engine->id)
                                <option value="{{ $engine->id }}" selected>{{ $engine->name }}</option>
                            @else
                                <option value="{{ $engine->id }}">{{ $engine->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                    <button class="btn btn-primary btn-block mb-3" type="submit"
                        style="height: 50px;">Search</button>
                </div>
            </div>
        </form>
    </div>
    <!-- Search End -->




    @yield('content')

    <!-- Footer Start -->
    <div class="container-fluid bg-secondary py-5 px-sm-3 px-md-5" style="margin-top: 90px;">
        <div class="row pt-5 justify-content-between">
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-uppercase text-light mb-4">Get In Touch</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-white mr-3"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-phone-alt text-white mr-3"></i>+012 345 67890</p>
                <p><i class="fa fa-envelope text-white mr-3"></i>info@example.com</p>

            </div>

            <div class="col-lg-3 col-md-6 mb-5">

                <h6 class="text-uppercase text-white py-2">Follow Us</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-dark btn-lg-square mr-2" href="#"><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-dark btn-lg-square mr-2" href="#"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-dark btn-lg-square mr-2" href="#"><i
                            class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-dark btn-lg-square" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            {{-- <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-uppercase text-light mb-4">Usefull Links</h4>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Private
                        Policy</a>
                    <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Term &
                        Conditions</a>
                    <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>New
                        Member Registration</a>
                    <a class="text-body mb-2" href="#"><i
                            class="fa fa-angle-right text-white mr-2"></i>Affiliate Programme</a>
                    <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Return
                        & Refund</a>
                    <a class="text-body" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Help &
                        FQAs</a>
                </div>
            </div> --}}

            {{-- <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-uppercase text-light mb-4">Newsletter</h4>
                <p class="mb-4">Volup amet magna clita tempor. Tempor sea eos vero ipsum. Lorem lorem sit sed elitr
                    sed kasd et</p>
                <div class="w-100 mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control bg-dark border-dark" style="padding: 25px;"
                            placeholder="Your Email">
                        <div class="input-group-append">
                            <button class="btn btn-primary text-uppercase px-3">Sign Up</button>
                        </div>
                    </div>
                </div>
                <i>Lorem sit sed elitr sed kasd et</i>
            </div> --}}
        </div>
    </div>
    <div class="container-fluid bg-dark py-4 px-sm-3 px-md-5">
        <p class="mb-2 text-center text-body">&copy; <a href="#">Ed-Cartuning</a>. All Rights Reserved.</p>

    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i
            class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('front-assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('front-assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('front-assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front-assets/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('front-assets/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('front-assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Template Javascript -->
    <script src="{{ asset('front-assets/js/main.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>

</body>

</html>
