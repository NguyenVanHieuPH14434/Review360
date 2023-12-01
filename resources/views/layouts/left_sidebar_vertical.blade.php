<aside class="left-sidebar with-vertical">
    <div><!-- ---------------------------------- -->
        <!-- Start Vertical Layout Sidebar -->
        <!-- ---------------------------------- -->
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="../main/index.html" class="text-nowrap logo-img">
                <img
                    src="{{ asset('assets/images/logos/logo_new.png') }}"
                    class="dark-logo"
                    alt="Logo-Dark"
                />
                <span style="font-size: 23px;margin-top: -6px;font-weight: bold;margin-left: 5px;position: relative;top: 4px;">Thor Review</span>
                <img
                    src="{{ asset('assets/images/logos/light-logo.svg') }}"
                    class="light-logo"
                    alt="Logo-light"
                />
            </a>
            <a
                href="javascript:void(0)"
                class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none"
            >
                <i class="ti ti-x"></i>
            </a>
        </div>


        <nav class="sidebar-nav scroll-sidebar" data-simplebar>
            <ul id="sidebarnav">
                <!-- ---------------------------------- -->
                <!-- Home -->
                <!-- ---------------------------------- -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Công ty</span>
                </li>
                <!-- ---------------------------------- -->
                <!-- Dashboard -->
                <!-- ---------------------------------- -->
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('jobTitle.list') }}" aria-expanded="false">
        <span>
          <i class="ti ti-aperture"></i>
        </span>
                        <span class="hide-menu">Chức danh</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('department.list') }}" aria-expanded="false">
        <span>
          <i class="ti ti-briefcase"></i>
        </span>
                        <span class="hide-menu">Phòng ban</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('user.list') }}" aria-expanded="false">
        <span>
          <i class="ti ti-user"></i>
        </span>
                        <span class="hide-menu">Users</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('calendar')}}" aria-expanded="false">
        <span>
          <i class="ti ti-calendar"></i>
        </span>
                        <span class="hide-menu">Lịch đánh giá</span>
                    </a>
                </li>
                <!-- ---------------------------------- -->
                <!-- Apps -->
                <!-- ---------------------------------- -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Đánh giá</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link " href="{{ route('categoryCriteria.list') }}" aria-expanded="false">
        <span>
          <i class="ti ti-calendar"></i>
        </span>
                        <span class="hide-menu">Nhóm tiêu chí</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('evaluationCriteria.list') }}" aria-expanded="false">
        <span>
          <i class="ti ti-layout-kanban"></i>
        </span>
                        <span class="hide-menu">Tiêu chí đánh giá</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('evalForm.list')}}" aria-expanded="false">
        <span>
          <i class="ti ti-notes"></i>
        </span>
                        <span class="hide-menu">Mẫu đánh giá</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('assessmentPeriod.list')}}" aria-expanded="false">
        <span>
          <i class="ti ti-message-dots"></i>
        </span>
                        <span class="hide-menu">Kỳ đánh giá</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('employeeReview.list') }}" aria-expanded="false">
        <span>
          <i class="ti ti-award"></i>
        </span>
                        <span class="hide-menu">Đánh giá nhân viên</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link link-disabled" href="#disabled" aria-expanded="false">
                        <span class="d-flex">
                          <i class="ti ti-ban"></i>
                        </span>
                        <span class="hide-menu">Phát triển nhân viên</span>
                    </a>
                </li>
                <!-- ---------------------------------- -->
                <!-- PAGES -->
                <!-- ---------------------------------- -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Báo cáo</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="../main/page-pricing.html" aria-expanded="false">
        <span>
          <i class="ti ti-chart-pie"></i>
        </span>
                        <span class="hide-menu">Đánh giá qua các kỳ</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="../main/page-pricing.html" aria-expanded="false">
        <span>
          <i class="ti ti-chart-pie-2"></i>
        </span>
                        <span class="hide-menu">Đánh giá performance qua kỳ</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="../main/page-faq.html" aria-expanded="false">
        <span>
          <i class="ti ti-chart-pie-3"></i>
        </span>
                        <span class="hide-menu">Đánh giá nhân viên mới</span>
                    </a>
                </li>

                <!-- ---------------------------------- -->
                <!-- PAGES -->
                <!-- ---------------------------------- -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Setting</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="../main/page-pricing.html" aria-expanded="false">
        <span>
          <i class="ti ti-settings"></i>
        </span>
                        <span class="hide-menu">Thiết lập điểm đánh giá</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="../main/page-faq.html" aria-expanded="false">
        <span>
          <i class="ti ti-help"></i>
        </span>
                        <span class="hide-menu">Hướng dẫn sử dụng</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div
            class="fixed-profile p-3 mx-4 mb-2 bg-secondary-subtle rounded sidebar-ad mt-3"
        >
            <div class="hstack gap-3">
                <div class="john-img">
                    <img
                        src="{{ asset('assets/images/profile/user-1.jpg') }}"
                        class="rounded-circle"
                        width="40"
                        height="40"
                        alt=""
                    />
                </div>
                <div class="john-title">
                    <h6 class="mb-0 fs-4 fw-semibold">{{$user->name}}</h6>
                    <span class="fs-2">{{$user->getJobTitle->title}}</span>
                </div>
                <button
                    class="border-0 bg-transparent text-primary ms-auto"
                    tabindex="0"
                    type="button"
                    aria-label="logout"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    data-bs-title="logout"
                >
                    <i class="ti ti-power fs-6"></i>
                </button>
            </div>
        </div>

        <!-- ---------------------------------- -->
        <!-- Start Vertical Layout Sidebar -->
        <!-- ---------------------------------- -->
    </div>
</aside>
