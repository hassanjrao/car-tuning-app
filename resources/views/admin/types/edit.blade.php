@extends('layouts.backend')

@section('page-title', 'Edit Type - Admin')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit Type</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.types.update', $type->id) }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="row push justify-content-center">

                        <div class="col-lg-12 ">

                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="label">Name</label>
                                    <input required type="text" value="{{ $type->type }}" class="form-control"
                                        id="type" name="type">
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
