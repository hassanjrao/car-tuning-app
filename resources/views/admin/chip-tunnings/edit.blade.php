@extends('layouts.backend')
@section('content')
    @php
        $brands = \App\Models\Brand::all();
        $models = \App\Models\CarModel::all();
        $types = \App\Models\Type::all();
        $engines = \App\Models\Engine::all();

        $selected = '';

        // @dd($_GET)

    @endphp


    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit Chip Tunning</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.chip-tunnings.update', $chip->id) }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="row push justify-content-center">

                        <div class="col-lg-12 ">

                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="label">Name</label>
                                    <input required type="text" value="{{ $chip->name }}" class="form-control"
                                        id="name" name="name">
                                </div>

                            </div>


                            <div class="row mb-4">
                                <div class="col-6">
                                    <label class="form-label" for="label">Brand</label>
                                    <br>
                                    <select required class="form-control select2" style="width: 100% !important"
                                        name="brand_id">

                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}"
                                                {{ $brand->id == $chip->brand_id ? 'selected' : '' }}>{{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-6">
                                    <label class="form-label" for="label">Model</label>
                                    <br>
                                    <select required class="form-control select2" style="width: 100% !important"
                                        name="model_id">

                                        @foreach ($models as $model)
                                            <option value="{{ $model->id }}"
                                                {{ $model->id == $chip->model_id ? 'selected' : '' }}>{{ $model->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>



                            <div class="row mb-4">
                                <div class="col-6">
                                    <label class="form-label" for="label">Type</label>
                                    <br>
                                    <select required class="form-control select2 w-100" style="width: 100% !important"
                                        name="type_id">

                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}"
                                                {{ $type->id == $chip->type_id ? 'selected' : '' }}>{{ $type->type }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-6">
                                    <label class="form-label" for="label">Engine</label>
                                    <br>
                                    <select required class="form-control select2 w-100" style="width: 100% !important"
                                        name="engine_id">

                                        @foreach ($engines as $engine)
                                            <option value="{{ $engine->id }}"
                                                {{ $engine->id == $chip->engine_id ? 'selected' : '' }}>
                                                {{ $engine->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>




                            <div class="row mb-4">
                                <div class="col-4">
                                    <label class="form-label" for="label">Asset Original</label>
                                    <input required type="text" value="{{ $chip->asset_original }}" class="form-control"
                                        id="asset_original" name="asset_original">
                                </div>

                                <div class="col-4">
                                    <label class="form-label" for="label">Asset After Tunning</label>
                                    <input required type="text" value="{{ $chip->asset_after_tuning }}"
                                        class="form-control" id="asset_after_tuning" name="asset_after_tuning">
                                </div>

                                <div class="col-4">
                                    <label class="form-label" for="label">Asset Result</label>
                                    <input required type="text" value="{{ $chip->asset_result }}" class="form-control"
                                        id="asset_result" name="asset_result">
                                </div>

                            </div>





                            <div class="row mb-4">
                                <div class="col-4">
                                    <label class="form-label" for="label">Couple Original</label>
                                    <input required type="text" value="{{ $chip->couple_original }}"
                                        class="form-control" id="couple_original" name="couple_original">
                                </div>

                                <div class="col-4">
                                    <label class="form-label" for="label">Couple After Tunning</label>
                                    <input required type="text" class="form-control"
                                        value={{ $chip->couple_after_tuning }} id="couple_after_tuning"
                                        name="couple_after_tuning">
                                </div>

                                <div class="col-4">
                                    <label class="form-label" for="label">Couple Result</label>
                                    <input required type="text" class="form-control" value="{{ $chip->couple_result }}"
                                        id="couple_result" name="couple_result">
                                </div>

                            </div>




                        </div>
                    </div>


                    <div class="text-right">

                        <button type="submit" class="btn btn-primary push">Update</button>

                    </div>

                </form>
            </div>
        </div>





    </div>
    <!-- END Page Content -->
@endsection


@section('js_after')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection
