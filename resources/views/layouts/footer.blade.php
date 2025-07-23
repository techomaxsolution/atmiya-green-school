<div class="footer" id="sub-banner">

    <div class="container">
        <div class="footer-inner">
            <div class="footer-middle">

                <div class="row mt_60">
                    <div class="col-lg-4 col-md-4 paddind-0 s-address">
                        <div class="row">
                            <div class="col-12">
                                <h3>Address</h3>
                            </div>
                        </div>
                        <div class=" ptb-30">
                            <div class="add-icon">
                                <img src="{{asset('frontend/assets/images/addrs-icon.png')}}" alt="">
                            </div>
                            <div class="add-detail">
                                <div class="ser-title">"Maniba Campus"</div>
                                <div class="ser-subtitle">NH NO.8, Nr.Cable Bridge, Zadeshwar, Bhruch-392011</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 paddind-0 s-call">
                        <div class="row">
                            <div class="col-12">
                                <h3>Phone</h3>
                            </div>
                        </div>
                        <div class=" ptb-30">
                            <div class="call-icon">
                                <img src="{{asset('frontend/assets/images/call.png')}}" alt="">
                            </div>
                            <div class="call-detail">
                                <div class="ser-title">+91 97149 94545</div>
                                <div class="ser-subtitle">atmiyagreenschool.com</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4  col-md-4 paddind-0 s-time">
                        <div class="row">
                            <div class="col-12">
                                <h3>Time</h3>
                            </div>
                        </div>
                        <div class=" ptb-30">
                            <div class="time-icon">
                                <img src="{{asset('frontend/assets/images/time.png')}}" alt="">
                            </div>
                            <div class="time-detail">
                                <div class="ser-title">Monday – Saturday</div>
                                <div class="ser-title"></div>
                                <div class="ser-subtitle">8:00 AM – Open </div>
                                <div class="ser-subtitle">2:00 PM – Close</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 f-col ">
                    <div class="f-logo">
                        <a href="{{route('home')}}" class="">
                            <img src="{{asset('frontend/assets/images/logo.png')}}" alt="Atmiya">
                        </a>

                    </div>

                    <div class="footer-static-block">
                        <ul>
                            <li>
                                <p>"Success comes to those who work hard and stays with those, who don't rest on the laurels of the
                                    past"</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 footer-middle-right">
                    <div class="row">
                        <div class="col-lg-12 f-col">
                            <div class="footer-static-block"> <span class="opener plus"></span>
                                <h3 class="title">About Us</h3>
                                <ul class="footer-block-contant link">
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li><a href="{{ route('frontend.about') }}">Curriculum</a></li>
                                    {{--<li><a href="{{  route('frontend.event') }}">Upcoming Events</a></li>--}}
                                    <li><a href="{{ route('frontend.contact') }}">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                        {{--<div class="col-lg-4 f-col">--}}
                        {{--    <div class="footer-static-block"> <span class="opener plus"></span>--}}
                        {{--        <h3 class="title">About Our</h3>--}}
                        {{--        <ul class="footer-block-contant link">--}}
                        {{--            <li><a href="{{route('frontend.event')}}"> History</a></li>--}}
                        {{--            <li><a href="{{route('frontend.about')}}"> Vision and Mission</a></li>--}}
                        {{--            <li><a href="#"> Goal and Objective</a></li>--}}
                        {{--            <li><a href="{{route('frontend.staff')}}"> Our Staff</a></li>--}}
                        {{--        </ul>--}}
                        {{--    </div>--}}
                        {{--</div>--}}
                        {{--<div class="col-lg-4 f-col news">--}}
                        {{--    <div class="footer-static-block">--}}
                        {{--        <h3 class="title">Subscribe Newsletter</h3>--}}
                        {{--        <div class="newsletter-inner center-sm">--}}
                        {{--            <form>--}}
                        {{--                <div class="newsletter-box">--}}
                        {{--                    <input type="text" placeholder="Name">--}}
                        {{--                    <input type="email" placeholder="Email">--}}
                        {{--                    <button title="Subscribe" class="btn-color">Subscribe</button>--}}
                        {{--                </div>--}}
                        {{--            </form>--}}
                        {{--        </div>--}}
                        {{--    </div>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="footer-bottom ">
            <div class="row">
                <div class="col-lg-7 col-12 mb-30">
                    <div class="copy-right">
                        Copyright © 2019 to {{ \Carbon\Carbon::now()->format('Y') }} <a href="https://www.atmiyagreenschool.com">Atmiya Green School</a>, All Rights Reserved | Designed and Developed by <a href="https://www.techomaxsolution.com">Techomax Solution</a>
                    </div>
                </div>
                <div class="col-lg-5 col-12 mb-30">
                    <div class="footer_social center-sm">
                        <style>
                            .social-icon {
                                list-style: none;
                                padding: 0;
                                display: flex;
                                gap: 10px;
                            }

                            .social-icon li a {
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                width: 40px;
                                height: 40px;
                                background-color: #000;
                                border-radius: 50%;
                                border: 1px solid #fff;
                                overflow: hidden;
                                text-decoration: none;
                            }

                            .social-icon li a i {
                                color: #fff;
                                font-size: 20px;
                            }

                            .social-icon li a.threads-icon img {
                                width: 20px;
                                height: 20px;
                                object-fit: contain;
                            }
                        </style>
                        <ul class="social-icon">
                            <li>
                                <a title="Facebook" class="facebook" href="https://www.facebook.com/atmiya.nursery" target="_blank">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a title="Instagram" class="instagram" href="https://www.instagram.com/atmiyagreenschool" target="_blank">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a title="Threads" class="threads threads-icon" href="https://www.threads.com/@atmiyagreenschool" target="_blank">
                                    <img src="{{ asset('frontend/assets/images/threads-icon.png') }}" alt="Threads" class="threads-img">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{--</div>--}}
{{--</div>--}}
