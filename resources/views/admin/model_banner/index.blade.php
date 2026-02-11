@extends('admin.layouts.app')
{{-- @if(Auth::guard('admin')->check()) --}}
@section('title','Modal Banner')

{{-- @endif --}}

@section('content-page')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Modal Banner</h3>
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
                        <a href="{{ route('admin.model-banner.edit')}}">Modal Banner</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit Modal Banner</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Modal Banner</div>
                        </div>
                        <form method="POST" action="{{ route('admin.model-banner.update' ) }}" id="model_banner_form" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $data->id ?? null }}" name="id">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="image">Image<span style="color: red">*</span></label>
                                            <input type="file" class="form-control" name="image"  id="Image" placeholder="Enter Department Name" />
                                            @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status">Status<span style="color: red">*</span></label>
                                            <select name="status" id="status" class="form-select form-control">
                                                <option value="">Select Status</option>
                                                <option {{ optional($data)->status == '1' || optional($data)->status == 1  ? 'selected' : '' }} value="1">Active</option>
                                                <option {{ optional($data)->status == '0' || optional($data)->status == 0  ? 'selected' : '' }} value="0">Inactive</option>
                                            </select>
                                            @error('status')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    @if(!empty($data->image))
                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Preview Iamge</label>
                                            <img src="{{ asset('uploads/model_banner/'.$data->image ?? null ) }}" alt="Preview Image" height="200px" width="200px">
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="card-action">
                                <button class="btn btn-success" type="submit">Submit</button>
                                <a href="{{ route('admin.department.index') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer-script')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

<script>
    $(document).ready(function () {
         $.validator.addMethod("extension", function(value, element, param) {
            if (this.optional(element)) {
                return true;
            }
            var fileName = element.value;
            var extension = fileName.split('.').pop().toLowerCase();
            return param.split('|').indexOf(extension) > -1;
        });
        $("#model_banner_form").validate({
            onfocusout: function (element) {
                this.element(element); // Validate the field on blur
            },
            onkeyup: false, // Optional: Disable validation on keyup for performance
            rules: {
                image: {
                    extension: "jpg|jpeg|png|gif"
                },
                status:{
                    required: true,
                }

            },
            messages: {
                image: {
                    extension: "Only JPG, JPEG, PNG and GIF files are allowed. "
                },
                status:{
                    required: "Please Select Status",
                }
            },
            errorClass: "text-danger",
            errorElement: "span",
            highlight: function (element) {
                $(element).addClass("is-invalid");
            },
            unhighlight: function (element) {
                $(element).removeClass("is-invalid");
            },
            submitHandler: function (form) {
                // Handle successful validation here
                form.submit();
            }
        });
    });
</script>
@endsection
