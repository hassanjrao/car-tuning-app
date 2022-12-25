@extends('layouts.backend')
@section('page-title', 'Chip Tunnings - Admin')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Chip Tunnings
                </h3>



                <button type="button" class="btn btn-primary push" data-bs-toggle="modal"
                    data-bs-target="#modal-block-popin">Add</button>

            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Type</th>
                                <th>Engine</th>
                                <th>Asset Original</th>
                                <th>Asset After Tunning</th>
                                <th>Asset Result</th>
                                <th>Couple Original</th>
                                <th>Couple After Tunning</th>
                                <th>Couple Result</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody>
                            @foreach ($chipTunnings as $ind => $chip)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>
                                    <td>{{ $chip->name }}</td>
                                    <td>{{ $chip->brand ? $chip->brand->name : '' }}</td>
                                    <td>{{ $chip->model ? $chip->model->name : '' }}</td>
                                    <td>{{ $chip->type ? $chip->type->type : '' }}</td>
                                    <td>{{ $chip->engine ? $chip->engine->name : '' }}</td>
                                    <td>{{ $chip->asset_original }}</td>
                                    <td>{{ $chip->asset_after_tuning }}</td>
                                    <td>{{ $chip->asset_result }}</td>
                                    <td>{{ $chip->couple_original }}</td>
                                    <td>{{ $chip->couple_after_tuning }}</td>
                                    <td>{{ $chip->couple_result }}</td>
                                    <td>{{ $chip->created_at }}</td>
                                    <td>{{ $chip->updated_at }}</td>

                                    <td>
                                        <div class="btn-group" role="group" aria-label="Horizontal Primary">

                                            <a href="{{ route('admin.chip-tunnings.edit', $chip->id) }}"
                                                class="btn btn-sm btn-alt-primary">Edit</a>
                                            <form id="form-{{ $chip->id }}"
                                                action="{{ route('admin.chip-tunnings.destroy', $chip->id) }}" method="POST">
                                                @method("DELETE")
                                                @csrf
                                                <input type="button" onclick="confirmDelete({{ $chip->id }})"
                                                    class="btn btn-sm btn-alt-danger" value="Delete">

                                            </form>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>


    @php
        $brands = \App\Models\Brand::all();
        $models = \App\Models\CarModel::all();
        $types = \App\Models\Type::all();
        $engines = \App\Models\Engine::all();

        $selected = '';

        // @dd($_GET)

    @endphp



    <div class="modal fade" id="modal-block-popin" role="dialog" aria-labelledby="modal-block-popin" aria-hidden="true">
        <div class="modal-dialog modal-dialog-popin modal-lg" role="document">
            <div class="modal-content">

                <form action="{{ route('admin.chip-tunnings.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="block block-rounded block-transparent mb-0">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Add</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content fs-sm">
                            <div class="block block-rounded">

                                <div class="block-content">

                                    <div class="row push justify-content-center">

                                        <div class="col-lg-12 ">

                                            <div class="row mb-4">
                                                <div class="col-12">
                                                    <label class="form-label" for="label">Name</label>
                                                    <input required type="text" class="form-control" id="name"
                                                        name="name">
                                                </div>

                                            </div>


                                            <div class="row mb-4">
                                                <div class="col-6">
                                                    <label class="form-label" for="label">Brand</label>
                                                    <br>
                                                    <select required class="form-control select2" style="width: 100% !important" name="brand_id">

                                                        @foreach ($brands as $brand)
                                                            <option value="{{ $brand->id }}">{{ $brand->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-6">
                                                    <label class="form-label" for="label">Model</label>
                                                    <br>
                                                    <select required class="form-control select2" style="width: 100% !important" name="model_id">

                                                        @foreach ($models as $model)
                                                            <option value="{{ $model->id }}">{{ $model->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>



                                            <div class="row mb-4">
                                                <div class="col-6">
                                                    <label class="form-label" for="label">Type</label>
                                                    <br>
                                                    <select required class="form-control select2 w-100" style="width: 100% !important" name="type_id">

                                                        @foreach ($types as $type)
                                                            <option value="{{ $type->id }}">{{ $type->type }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-6">
                                                    <label class="form-label" for="label">Engine</label>
                                                    <br>
                                                    <select required class="form-control select2 w-100" style="width: 100% !important" name="engine_id">

                                                        @foreach ($engines as $engine)
                                                            <option value="{{ $engine->id }}">{{ $engine->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>




                                            <div class="row mb-4">
                                                <div class="col-4">
                                                    <label class="form-label" for="label">Asset Original</label>
                                                    <input required type="text" class="form-control" id="asset_original"
                                                        name="asset_original">
                                                </div>

                                                <div class="col-4">
                                                    <label class="form-label" for="label">Asset After Tunning</label>
                                                    <input required type="text" class="form-control" id="asset_after_tuning"
                                                        name="asset_after_tuning">
                                                </div>

                                                <div class="col-4">
                                                    <label class="form-label" for="label">Asset Result</label>
                                                    <input required type="text" class="form-control" id="asset_result"
                                                        name="asset_result">
                                                </div>

                                            </div>





                                            <div class="row mb-4">
                                                <div class="col-4">
                                                    <label class="form-label" for="label">Couple Original</label>
                                                    <input required type="text" class="form-control" id="couple_original"
                                                        name="couple_original">
                                                </div>

                                                <div class="col-4">
                                                    <label class="form-label" for="label">Couple After Tunning</label>
                                                    <input required type="text" class="form-control" id="couple_after_tuning"
                                                        name="couple_after_tuning">
                                                </div>

                                                <div class="col-4">
                                                    <label class="form-label" for="label">Couple Result</label>
                                                    <input required type="text" class="form-control" id="couple_result"
                                                        name="couple_result">
                                                </div>

                                            </div>




                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-full text-end bg-body">
                            <button type="button" class="btn btn-sm btn-alt-secondary me-1"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>





    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')

<script>

        $(document).ready(function() {
            $(".select2").select2({
                dropdownParent: $(".modal")
            });
        });
</script>

@endsection
