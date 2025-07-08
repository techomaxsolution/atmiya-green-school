@extends('admin.layouts.app')

@section('title', 'Admin Panel - Edit General Information')

@section('content-page')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">General Information</h3>
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
                        <a href="{{ route('admin.general-information.index') }}">General Information</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.general-information.edit', $generalInformation->id) }}">Edit General Information</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit General Information</div>
                        </div>
                        <form method="POST" action="{{ route('admin.general-information.update', $generalInformation->id ) }}" id="generalInformationForm">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="information">Information<span style="color: red">*</span></label>
                                            <input type="text" class="form-control" name="information" id="information" value="{{ $generalInformation->information }}" placeholder="Enter Information" required/>
                                            @error('information')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="details">Details<span style="color: red">*</span></label>
                                            <input type="text" class="form-control" name="details" id="details" value="{{ $generalInformation->details }}" placeholder="Select Details" required/>
                                            @error('details')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <button class="btn btn-success" type="submit">Submit</button>
                                <a href="{{ route('admin.general-information.index') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </form>
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
            $('#generalInformationForm').validate({
                rules: {
                    information: {
                        required: true,
                    },
                    details: {
                        required: true,
                    }
                },
                messages: {
                    information: {
                        required: "Please enter a Information",

                    },
                    details: {
                        required: "Please Select a Details",
                    }
                },
                errorElement: 'span',
                errorClass: 'text-danger',
                highlight: function (element, errorClass) {
                    $(element).addClass("is-invalid");
                },
                unhighlight: function (element, errorClass) {
                    $(element).removeClass("is-invalid");
                }
            });
        });
    </script>
@endsection
