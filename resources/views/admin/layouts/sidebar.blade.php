<body>

<div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
                <a href="{{ route('admin.dashboard') }}" class="logo" style="display: block; text-align: center; width: fit-content; margin: 20px auto 0;">
                    <img
                        src="{{ asset('backend/assets/img/atmiyalogo.webp') }}"
                        alt="navbar brand"
                        class="navbar-brand"
                        height="60"
                    />
                </a>

                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="gg-menu-right"></i>
                    </button>
                    <button class="btn btn-toggle sidenav-toggler">
                        <i class="gg-menu-left"></i>
                    </button>
                </div>
                <button class="topbar-toggler more">
                    <i class="gg-more-vertical-alt"></i>
                </button>
            </div>
            <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
            <div class="sidebar-content">
                <ul class="nav nav-secondary">
                    <li class="nav-item">
                        <a
                            href="{{  route('admin.dashboard') }}"
                            class="collapsed"
                        >
                            <i class="fas fa-home"></i>
                            <p>Dashboard</p>

                        </a>

                    </li>
                    <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                        <h4 class="text-section">Modules</h4>
                    </li>

                    <li class="nav-item ">
                        <a data-bs-toggle="collapse" href="#masters">
                            <i class="fas fa-table"></i>
                            <p>Masters</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="masters">
                            <ul class="nav nav-collapse">

                                <li class="nav-item">
                                    <a href="{{ route('admin.department.index') }}">
                                        <i class="fas fa-wallet"></i>
                                        <p>Department</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.faculty.index') }}">
                                        <i class="fas fa-chalkboard-teacher"></i>
                                        <p>Faculty</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.activityCategory.index') }}">
                                        <i class="fas fa-clipboard-list"></i>
                                        <p>Activity Category</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#slider-image">
                            <i class="fas fa-images"></i>
                            <p>Slider Images</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="slider-image">
                            <ul class="nav nav-collapse">
                                <li class="nav-item">
                                    <a href="{{ route('admin.slider-images.banner-images') }}">
                                        <i class="fas fa-image"></i>
                                        <p>Banner Images</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.slider-images.school-images') }}">
                                        <i class="fas fa-image"></i>
                                        <p>School Images</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.testimonial.index') }}">
                            <i class="fas fa-user-check"></i>
                            <p>Testimonial</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.event.index') }}">
                            <i class="fas fa-file-alt"></i>
                            <p>Events</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.general-information.index') }}">
                            <i class="fas fa-file-pdf"></i>
                            <p>General Information</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.document-information.index') }}">
                            <i class="fas fa-file-pdf"></i>
                            <p>Document Information</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.academics.index') }}">
                            <i class="fas fa-file-pdf"></i>
                            <p>Academics</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.circular.index') }}">
                            <i class="fas fa-file-pdf"></i>
                            <p>Circular</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.teaching-staff.index') }}">
                            <i class="fas fa-file-pdf"></i>
                            <p>Teaching Staff</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.school-infrastructure.index') }}">
                            <i class="fas fa-file-pdf"></i>
                            <p>School Infrastructure</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.mandatory-public-disclosure.edit') }}">
                            <i class="fas fa-file-pdf"></i>
                            <p>Mandatory Public Disclosure</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.magazine.index') }}">
                            <i class="fas fa-book"></i>
                            <p>Magazines</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.contact.index') }}">
                            <i class="fab fa-wpforms"></i>
                            <p>Contacts</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.enquiry.index') }}">
                            <i class="fas fa-list-alt"></i>
                            <p>Enquiry</p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{ route('admin.activity.index') }}">
                            <i class="fas fa-users"></i>
                            <p>Activity</p>
                        </a>
                    </li>
                    {{--                    <li class="nav-item">--}}
                    {{--                        <a href="{{ route('admin.setting.index') }}">--}}
                    {{--                            <i class="fas fa-users"></i>--}}
                    {{--                            <p>Settings</p>--}}
                    {{--                        </a>--}}
                    {{--                    </li>--}}

                    <li class="nav-item">
                        <a href="{{ route('admin.admission-process.edit') }}">
                            <i class="fas fa-file-pdf"></i>
                            <p>Admission Process</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.model-banner.edit') }}">
                            <i class="fas fa-file-pdf"></i>
                            <p>Model Banner</p>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
