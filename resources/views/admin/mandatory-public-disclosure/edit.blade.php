@extends('admin.layouts.app')

@section('title', 'Admin Panel - Edit Mandatory Public Disclosure')

@section('content-page')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Mandatory Public Disclosure</h3>
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
                        <a href="{{ route('admin.mandatory-public-disclosure.edit') }}">Edit Mandatory Public Disclosure</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Mandatory Public Disclosure</div>
                        </div>
                        <form method="POST" action="{{ route('admin.mandatory-public-disclosure.update') }}" id="mandatoryPublicDisclosureForm" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="mandatory_public_disclosure_id" value="{{ $mandatoryPublicDisclosure->id ?? null }}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="file">File<span style="color: red">*</span></label>
                                            <input type="file" class="form-control" name="file" id="file" placeholder="Select File" accept=".pdf,.doc,.docx" multiple/>
                                            @isset($mandatoryPublicDisclosure->file)
                                                @php
                                                    $file = json_decode($mandatoryPublicDisclosure->file, false, 512, JSON_THROW_ON_ERROR);
                                                    $extension = pathinfo($file, PATHINFO_EXTENSION);
                                                @endphp
                                                @if(in_array($extension, ['pdf', 'doc', 'docx']))
                                                    <a href="{{ asset($file) }}" target="_blank" class="d-block mt-2">
                                                        View File ({{ strtoupper($extension) }})
                                                    </a>
                                                @endif
                                            @endisset
                                            @error('file')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <button class="btn btn-success" type="submit">Submit</button>
                                <a href="{{ route('admin.mandatory-public-disclosure.edit') }}" class="btn btn-danger">Cancel</a>
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

            $('#mandatoryPublicDisclosureForm').validate({
                rules: {
                    file: {
                        required: true,
                        extension: 'pdf|doc|docx',
                    },
                },
                messages: {
                    file: {
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
