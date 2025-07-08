@extends('layouts.layout')

@section('content')
    <!-- BANNER START -->
    <div class="banner">
        <div class="main-banner">
            <div class="banner-1"><img src="{{ asset('frontend/assets/images/aboutus-b.png') }}" alt="General Information">
                <div class="banner-detail">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="banner-detail-inner align-center">
                                    <h1 class="banner-title">General Information</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BANNER END -->

    <!-- CONTAIN START -->
    <!-- Site Services Features Block End -->
    <section class="pb-95 pb-180" id="sub-banner">
        <div class="ser-feature-block">
            <div class="container">
                <div class="row">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Sr No</th>
                            <th scope="col">Information</th>
                            <th scope="col">Details</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 0)
                        @forelse($generalInformation as $value)
                            @php($i++)
                            <tr>
                                <th scope="row">{{ $i }}</th>
                                <td>{{ $value->information }}</td>
                                <td>{{ $value->details }}</td>
                            </tr>
                        @empty
                            <tr>
                                <th scope="row" colspan="3" class="text-center">No Records Found!</th>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- CONTAIN END -->
@endsection
