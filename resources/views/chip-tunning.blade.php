@extends('layouts.front')

@section('page-title', $chipTunning ? $chipTunning->name : 'No Result')


@section('content')

 <!-- Page Header Start -->
 <div class="container-fluid page-header">
    <h2 class=" text-uppercase text-white mb-3">{{ $chipTunning ? $chipTunning->name : 'No Result' }}</h2>
    <div class="d-inline-flex text-white">
        @if($chipTunning)
        <h6 class="text-uppercase m-0"><a class="text-white" href=""> Tailor-made chip tuning for your {{ $chipTunning ? $chipTunning->name : 'No Result' }}</a></h6>
@endif
    </div>
</div>
<!-- Page Header Start -->


    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">

            <div class="row">

                @if ($chipTunning)

                    <div class="col-lg-12">

                        <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                    role="tab" aria-controls="pills-home" aria-selected="true">Stage 1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                    role="tab" aria-controls="pills-profile" aria-selected="false">Extra Options</a>
                            </li>

                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">


                                <div class="service-item active d-flex flex-column justify-content-center px-4 mb-4">

                                    <h6 class="text-white ">For the {{ $chipTunning->name }} we have the following options:
                                    </h6>
                                    <br>
                                    <table class="table text-white">
                                        <tbody>
                                            <tr>
                                                <th>&nbsp;</th>
                                                <th>Original</th>
                                                <th>After tuning</th>
                                                <th>Result</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Assets:
                                                </td>
                                                <td>
                                                    {{ $chipTunning->asset_original }}
                                                    {{-- <span>hp</span> --}}
                                                </td>
                                                <td>
                                                    {{ $chipTunning->asset_after_tuning }}
                                                    {{-- <span>hp</span> --}}

                                                </td>
                                                <td>
                                                    <span class="text-danger">{{ $chipTunning->asset_result }}</span>
                                                    {{-- <span>hp</span> --}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Couple:
                                                </td>
                                                <td>
                                                    {{ $chipTunning->couple_original }}
                                                    {{-- <span>Nm</span> --}}
                                                    {{-- <span>Nm</span> --}}
                                                </td>
                                                <td>
                                                    {{ $chipTunning->couple_after_tuning }}
                                                    {{-- <span>Nm</span> --}}
                                                    {{-- <span>Nm</span> --}}
                                                </td>
                                                <td>
                                                    <span class="text-danger">{{ $chipTunning->couple_result }}</span>
                                                    {{-- <span>Nm</span> --}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>


                                </div>


                            </div>
                            {{-- <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis adipisci rerum accusamus
                                ut
                                nobis cumque aspernatur eaque, atque optio quis dolorem eius saepe, laborum perspiciatis
                                ducimus
                                veniam eligendi provident sint?
                            </div> --}}

                        </div>

                    </div>
                @else
                    <div class="col-lg-12">
                        <div class="service-item active d-flex flex-column justify-content-center px-4 mb-4">

                            <h2 class="text-white">No Result Found</h2>
                        </div>

                    </div>

                @endif

            </div>

        </div>

    </div>

@endsection
