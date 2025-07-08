@extends('layouts.layout')

@section('content')
    <!-- BANNER STRAT -->
    <div class="banner">
        <div class="main-banner">
            <div class="banner-1"><img src="{{asset('frontend/assets/images/aboutus-b.png')}}" alt="Atmiya">
                <div class="banner-detail">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="banner-detail-inner align-center">
                                    <h1 class="banner-title">Documents and information</h1>
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
                            <th scope="col">Description</th>
                            <th scope="col">Download / View</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 0)
                        @forelse($documentInformation as $value)
                            @php($i++)
                            <tr>
                                <th scope="row">{{ $i }}</th>
                                <td>{{ $value->description }}</td>
                                <td>
                                    @foreach(json_decode($value->file, true, 512, JSON_THROW_ON_ERROR) as $index => $fileUrl)
                                        <a href="{{ route('documentsInformation.download', [$value->id, $index]) }}" target="_blank">
                                            Download File
                                        </a>
                                        <br>
                                    @endforeach
                                </td>
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
