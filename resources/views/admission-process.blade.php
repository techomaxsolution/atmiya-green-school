@extends('layouts.layout')

@section('content')
    <!-- BANNER START -->
    <div class="banner">
        <div class="main-banner">
            <div class="banner-1"><img src="{{asset('frontend/assets/images/admi_banner.png')}}" class="w-100" alt="Atmiya">
                <div class="banner-detail">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="banner-detail-inner align-center">
                                    <h1 class="banner-title">ADMISSION PROCESS</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BANNER END -->

    <section class="ptb-80 pb-180">
        <div class="container">
            <div class="product-detail-tab">
                <div class="row justify-content-md-center">
                    <div class="col-lg-10">
                        <div class="banner-detail-inner align-center">
                            <h2>Admission Process</h2>
                            <p class="heding-detail">
                                The admission procedure at Atmiya is made simple and straight forward in order to ensure that all prospective students and their parents enjoy a stress free experience.
                            </p>
                            <p>
                                @php
                                    $admissionProcessFile = isset($admissionProcess->file) ? json_decode($admissionProcess->file, false, 512, JSON_THROW_ON_ERROR) : 'frontend/assets/cbseinfo/documentsandInformation/Addmission.pdf';
                                @endphp
                                <a target="_blank" href="{{ asset($admissionProcessFile) }}">Download admission Process Documents</a>
                            </p>
                        </div>
                        <div class="addmision-process pt-30">
                            <div id="items">
                                <p>
                                    The parents are required to visit the School Admission Office, get full inquiry about the fees and curriculum, Student needs to appear entrance test, obtain the application form on non-refundable payment , fill out the application form and submit the same along with the required documents on or before the stipulated date.
                                </p>
                                {{-- of Rs. 300/- --}}
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
