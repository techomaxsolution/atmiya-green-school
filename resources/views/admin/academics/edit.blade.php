@extends('admin.layouts.app')

@section('title', 'Admin Panel - Edit Academics')

@section('content-page')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Academics</h3>
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
                        <a href="{{ route('admin.academics.index') }}">Academics</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.academics.edit', $academic->id) }}">Edit Academics</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Academics</div>
                        </div>
                        <form method="POST" action="{{ route('admin.academics.update', $academic->id) }}" id="academicForm" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="description">Description<span style="color: red">*</span></label>
                                            <input type="text" class="form-control" name="description" id="description" value="{{ $academic->description }}" placeholder="Enter Information" required/>
                                            @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="files">File<span style="color: red">*</span></label>
                                            <input type="file" class="form-control" name="files[]" id="files" placeholder="Select File" accept=".pdf,.doc,.docx" multiple/>
                                            @if($academic->files)
                                                @foreach(json_decode($academic->files, false, 512, JSON_THROW_ON_ERROR) as $file)
                                                    @php
                                                        $extension = pathinfo($file, PATHINFO_EXTENSION);
                                                    @endphp
                                                    @if(in_array($extension, ['pdf', 'doc', 'docx']))
                                                        <a href="{{ asset($file) }}" target="_blank" class="d-block mt-2">
                                                            View File ({{ strtoupper($extension) }})
                                                        </a>
                                                    @endif
                                                @endforeach
                                            @endif
                                            @error('files[]')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <button class="btn btn-success" type="submit">Submit</button>
                                <a href="{{ route('admin.academics.index') }}" class="btn btn-danger">Cancel</a>
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

            $('#academicForm').validate({
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
