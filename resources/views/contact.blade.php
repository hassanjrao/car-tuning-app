@extends("layouts.front")

@section("page-title", "Contact Us")


@section("content")

 <!-- Page Header Start -->
 <div class="container-fluid page-header">
    <h1 class="display-3 text-uppercase text-white mb-3">Contact</h1>
    <div class="d-inline-flex text-white">
        <h6 class="text-uppercase m-0"><a class="text-white" href="">Home</a></h6>
        <h6 class="text-body m-0 px-3">/</h6>
        <h6 class="text-uppercase text-body m-0">Contact</h6>
    </div>
</div>
<!-- Page Header Start -->


<!-- Contact Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <h1 class="display-4 text-uppercase text-center mb-5">Contact Us</h1>
        <x-contact-us />
    </div>
</div>
<!-- Contact End -->

@endsection
