@extends('admin.layouts.app')

@section('title', 'Admin Panel')

@section('content-page')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Add School Image</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.slider-images.school-images') }}">School Images</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.slider-images.school-images-create') }}">Add School Image</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Add School Image</div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.slider-images.store') }}" id="createSchoolImageForm" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="image_type" value="school"/>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="imageUrl">School Image<span style="color: red">*</span></label>
                                            <input type="file" class="form-control" name="image_url" id="imageUrl" value="{{ old('image_url') }}" placeholder="Select School Image"/>
                                            @error('image_url')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-action">
                            <button class="btn btn-success" type="submit" form="createSchoolImageForm">Submit</button>
                            <a href="{{ route('admin.slider-images.school-images') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer-script')
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $.validator.addMethod('extension', function (value, element, param) {
                if (this.optional(element)) {
                    return true;
                }
                let fileName = element.value;
                let extension = fileName.split('.').pop().toLowerCase();
                return param.split('|').indexOf(extension) > -1;
            });
            $('#createSchoolImageForm').validate({
                rules: {
                    image_url: {
                        required: true,
                        extension: 'jpg|jpeg|png',
                    },
                },
                messages: {
                    image_url: {
                        required: 'Please select a banner image',
                        extension: 'Please select a banner image with only jpg, jpeg and png image type',
                    },
                },
                errorElement: 'span',
                errorClass: 'text-danger',
                highlight: function (element, errorClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endsection
