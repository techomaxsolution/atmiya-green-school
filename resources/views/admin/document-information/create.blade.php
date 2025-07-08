@extends('admin.layouts.app')

@section('title', 'Admin Panel - Add Document Information')

@section('content-page')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Document Information</h3>
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
                        <a href="{{ route('admin.document-information.index') }}">Document Information</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.document-information.create') }}">Add Document Information</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Add Document Information</div>
                        </div>
                        <form method="POST" action="{{ route('admin.document-information.store') }}" id="documentInformationForm" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="description">Description<span style="color: red">*</span></label>
                                            <input type="text" class="form-control" name="description" id="description" placeholder="Enter Description" value="{{ old('description') }}"/>
                                            @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="files">File<span style="color: red">*</span></label>
                                            <input type="file" class="form-control" name="files[]" id="files" placeholder="Select File" value="" multiple/>
                                            @error('files[]')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <button class="btn btn-success" type="submit">Submit</button>
                                <a href="{{ route('admin.document-information.index') }}" class="btn btn-danger">Cancel</a>
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
            $.validator.addMethod('extension', function (value, element, param) {
                if (this.optional(element)) {
                    return true;
                }
                var fileName = element.value;
                var extension = fileName.split('.').pop().toLowerCase();
                return param.split('|').indexOf(extension) > -1;
            });

            $('#documentInformationForm').validate({
                rules: {
                    description: {
                        required: true,
                    },
                    'files[]': {
                        required: true,
                        extension: 'pdf|doc|docx',
                    },
                },
                messages: {
                    description: {
                        required: 'Please enter a Description.',
                    },
                    'files[]': {
                        required: 'Please upload a file.',
                        extension: 'Only pdf,doc and docx files are allowed.'
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
