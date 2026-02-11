{{--@extends('layouts.layout')--}}
{{--<!-- BANNER STRAT -->--}}
{{--@section('content')--}}
{{--<div class="banner">--}}
{{--    <div class="main-banner">--}}
{{--        <div class="banner-1"> <img src="{{asset('frontend/assets/images/event-banner-1.png')}}" alt="Atmiya">--}}
{{--            <div class="banner-detail">--}}
{{--                <div class="container">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-sm-12 col-xs-8">--}}
{{--                            <div class="banner-detail-inner">--}}
{{--                                <h1 class="banner-title">EVENTS</h1>--}}
{{--                                <!-- <img src="images/down-aarow.png" alt="Atmiya"> -->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- BANNER END -->--}}

{{--    <!-- CONTAIN START -->--}}

{{--    <section class="pb-95" id="sub-banner"  style="background-image: url({{asset('frontend/assets/images/bg.jpg')}});">--}}
{{--        <div class="our-c">--}}
{{--            <div class="ser-feature-block">--}}
{{--                <div class="container">--}}
{{--                    <div class="row m-0">--}}
{{--                        @foreach($events as $event)--}}
{{--                        <div class="col-lg-6 col-md-6 col-12 p-0 mb-xs-30 service-box">--}}
{{--                            <div class="blog-item">--}}
{{--                                <h2>{{$event->title}}</h2>--}}
{{--                                <h2>Upcoming Events</h2>--}}
{{--                                <ul>--}}
{{--                                    @forelse($upcomingEvents as $event)--}}
{{--                                        <li>{{ $event->title }} - {{ $event->event_date->format('d M Y H:i') }}</li>--}}
{{--                                    @empty--}}
{{--                                        <li>No upcoming events.</li>--}}
{{--                                    @endforelse--}}
{{--                                </ul>--}}

{{--                                <h2>Past Events</h2>--}}
{{--                                <ul>--}}
{{--                                    @forelse($pastEvents as $event)--}}
{{--                                        <li>{{ $event->title }} - {{ $event->event_date->format('d M Y H:i') }}</li>--}}
{{--                                        <div class="blog-media">--}}
{{--                                            @foreach(json_decode($event->event_images) as $image)--}}
{{--                                                <img src="{{ $image }}"  height="369px" width="320px"	alt="Event Image" />--}}
{{--                                            @endforeach--}}
{{--                                            <div class="blog-effect"></div>--}}
{{--                                        </div>--}}
{{--                                    @empty--}}
{{--                                        <li>No past events.</li>--}}
{{--                                    @endforelse--}}
{{--                                </ul>--}}


{{--                                <div class="blog-detail mt-20">--}}
{{--                                    <div class="blog-detail-inner">--}}
{{--                                        <div class="blog-contant">--}}
{{--                                            <div class="blog-desc">--}}
{{--                                                <div class=" ptb-30">--}}
{{--                                                    <div class="date">--}}
{{--                                                        <span>10<sup>th</sup></span>--}}
{{--                                                        <h5>{{ \Carbon\Carbon::parse($event->event_date)->format('j F Y') }}</h5>--}}
{{--                                                    </div>--}}

{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--</div>--}}

{{--@endsection--}}
@extends('layouts.layout')

@section('content')
    <!-- BANNER START -->
    <div class="banner">
        <div class="main-banner">
            <div class="banner-1">
                <img src="{{ asset('frontend/assets/images/event-banner-1.png') }}" alt="Atmiya">
                <div class="banner-detail">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-xs-8">
                                <div class="banner-detail-inner">
                                    <h1 class="banner-title">EVENTS</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CONTENT START -->
        <section class="pb-95" id="sub-banner" style="background-image: url({{ asset('frontend/assets/images/bg.jpg') }});">
            <div class="container">
                {{--                <!-- Upcoming Events -->--}}
                {{--                <h2 class="text-center mb-4">Upcoming Events</h2>--}}
                {{--                <div class="row">--}}
                {{--                    @forelse($upcomingEvents as $event)--}}
                {{--                        <div class="col-lg-6 col-md-6 col-12 mb-4">--}}
                {{--                            <div class="blog-item p-3 shadow rounded bg-white">--}}
                {{--                                <h4>{{ $event->title }}</h4>--}}
                {{--                                <div class="blog-media mb-2">--}}
                {{--                                    @foreach(json_decode($event->event_images, true) ?? [] as $image)--}}
                {{--                                        <img src="{{ $image }}" class="img-fluid rounded" alt="Event Image">--}}
                {{--                                    @endforeach--}}
                {{--                                </div>--}}

{{--                                <p class="text-muted">{{ $event->event_date->format('d M Y H:i') }}</p>--}}
{{--                                <p>{{ $event->description ?? '' }}</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @empty--}}
{{--                        <div class="col-12 text-center">--}}
{{--                            <p>No upcoming events.</p>--}}
{{--                        </div>--}}
{{--                    @endforelse--}}
{{--                </div>--}}
{{--                <!-- Past Events -->--}}
{{--                <h2 class="text-center mt-5 mb-4">Past Events</h2>--}}
{{--                <div class="row">--}}
{{--                    @forelse($pastEvents as $event)--}}
{{--                        <div class="col-lg-6 col-md-6 col-12 mb-4">--}}
{{--                            <div class="blog-item p-3 shadow rounded bg-white">--}}
{{--                                <h4>{{ $event->title }}</h4>--}}
{{--                                <p class="text-muted">{{ $event->event_date->format('d M Y H:i') }}</p>--}}
{{--                                <div class="blog-media mb-2">--}}
{{--                                    @foreach(json_decode($event->event_images, true) ?? [] as $image)--}}
{{--                                        <img src="{{ $image }}" class="img-fluid rounded" alt="Event Image">--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                                <p>{{ $event->description ?? '' }}</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @empty--}}
{{--                        <div class="col-12 text-center">--}}
{{--                            <p>No past events.</p>--}}
{{--                        </div>--}}
{{--                    @endforelse--}}
{{--                </div>--}}

                <h2 class="text-center mb-4">Upcoming Events</h2>
                <div class="row mb-4">
                    {{-- @dd($upcomingEvents) --}}
                    @forelse($upcomingEvents as $event)
                        <div class="col-lg-4 col-md-6 col-12 mb-4">
                            <div class="blog-item p-3 shadow rounded bg-white">
                                <div class="swiper clubSwiper">
                                    <div class="swiper-wrapper">
                                        @php
                                            $upcomingImages = [];
                                            foreach (json_decode($event->event_images, true, 512, JSON_THROW_ON_ERROR) ?? [] as $img) {
                                                $upcomingImages[] = $img;
                                            }
                                        @endphp
                                        @foreach($upcomingImages as $upcomingImage)
                                            <div class="swiper-slide">
                                                <img src="{{ asset($upcomingImage) }}" class="img-fluid rounded mb-2" alt="Event Image" style="height: 300px; width: 100%; object-fit: cover;">
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-button-next" style="color: #fff"></div>
                                    <div class="swiper-button-prev" style="color: #fff"></div>
                                    <div class="swiper-pagination" style="color: #fff"></div>
                                </div>
                                <h5>{{ $event->title }}</h5>
                                <p class="text-muted">{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y H:i') }}</p>
                                <p>{{ $event->description }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p>No upcoming events.</p>
                        </div>
                    @endforelse
                </div>

                <h2 class="text-center mt-5 mb-4">Past Events</h2>
                <div class="row mb-5">
                    @forelse($pastEvents as $event)
                        <div class="col-lg-4 col-md-6 col-12 mb-4">
                            <div class="blog-item p-3 shadow rounded bg-white">
                                <div class="swiper clubSwiper">
                                    <div class="swiper-wrapper">
                                        @php
                                            $pastImages = [];
                                            foreach (json_decode($event->event_images, true, 512, JSON_THROW_ON_ERROR) ?? [] as $img) {
                                                $pastImages[] = $img;
                                            }
                                        @endphp
                                        @foreach($pastImages as $pastImage)
                                            <div class="swiper-slide">
                                                <img src="{{ $pastImage }}" class="img-fluid rounded mb-2" alt="Event Image" style="height: 300px; width: 100%; object-fit: cover;">
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-button-next" style="color: #fff"></div>
                                    <div class="swiper-button-prev" style="color: #fff"></div>
                                    <div class="swiper-pagination" style="color: #fff"></div>
                                </div>
                                <h5>{{ $event->title }}</h5>
                                <p class="text-muted">{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y H:i') }}</p>
                                <p>{{ $event->description }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p>No past events.</p>
                        </div>
                    @endforelse
                </div>

            </div>
        </section>
    </div>
@endsection
