<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme">
  <head>
    <!-- Required meta tags -->
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<!-- Favicon icon-->
<link
  rel="shortcut icon"
  type="image/png"
  href="{{ asset('assets/images/logos/favicon.png')}}"
/>

<!-- Core Css -->
<link rel="stylesheet" href="{{ asset('assets/css/styles.css')}}" />

    <title>Nền tảng đánh giá nhân viên Thor Review</title>
    <!-- Owl Carousel  -->
    <link
      rel="stylesheet"
      href="{{ asset('assets/libs/owl.carousel/dist/assets/owl.carousel.min.css')}}"
    />
    <link rel="stylesheet" href="{{ asset('assets/libs/aos/dist/aos.css')}}" />
  </head>

  <body>
    <!-- Preloader -->
    <div class="preloader">
      <img
        src="{{ asset('assets/images/logos/favicon.png')}}"
        alt="loader"
        class="lds-ripple img-fluid"
      />
    </div>
    <div id="main-wrapper flex-column">
      <header class="header">
        <nav class="navbar navbar-expand-lg py-0">
          <div class="container">
            <a class="navbar-brand me-0 py-0" href="javascript:void(0)">
                <img
                    src="{{ asset('assets/images/logos/logo_new.png') }}"
                    class="dark-logo"
                    alt="Logo-Dark"
                />
                <span style="font-size: 23px;margin-top: -6px;font-weight: bold;margin-left: 5px;position: relative;top: 4px;">Thor Review</span>
            </a>
            <button
              class="navbar-toggler d-none"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <i class="ti ti-menu-2 fs-9"></i>
            </button>
            <button
              class="navbar-toggler border-0 p-0 shadow-none"
              type="button"
              data-bs-toggle="offcanvas"
              data-bs-target="#offcanvasNavbar"
              aria-controls="offcanvasNavbar"
            >
              <i class="ti ti-menu-2 fs-9"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav align-items-center mb-2 mb-lg-0 ms-auto">
                  <li class="nav-item">
                      <a
                          class="nav-link active"
                          aria-current="page"
                          href="javascript:void(0)"
                          target="_blank"
                      >Bảng giá</a
                      >
                  </li>
                <li class="nav-item">
                  <a
                    class="nav-link active"
                    aria-current="page"
                    href="javascript:void(0)"
                    target="_blank"
                    >Tài liệu</a
                  >
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link active"
                    aria-current="page"
                    href="javascript:void(0)"
                    target="_blank"
                    >Hỗ trợ</a
                  >
                </li>
                <li class="nav-item ms-2">
                  <a
                    class="btn btn-primary fs-3 rounded btn-hover-shadow px-3 py-2"
                    href="{{ route('login') }}"
                    >Login</a
                  >
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="body-wrapper overflow-hidden pt-0">
        <section
          class="hero-section position-relative overflow-hidden mb-0 mb-lg-5"
        >
          <div class="container">
            <div class="row align-items-center">
              <div class="col-xl-6">
                <div class="hero-content my-5 my-xl-0">
                  <h6
                    class="d-flex align-items-center gap-2 fs-4 fw-semibold mb-3"
                    data-aos="fade-up"
                    data-aos-delay="200"
                    data-aos-duration="1000"
                  >
                    <i class="ti ti-rocket text-secondary fs-6"></i>Thay đổi, phát triển, thành công
                  </h6>
                  <h1
                    class="fw-bolder mb-7 fs-13"
                    data-aos="fade-up"
                    data-aos-delay="400"
                    data-aos-duration="1000"
                  >
                   Đánh giá khách quan
                    <span class="text-primary"> Hiệu quả Công bằng</span>
                  </h1>
                  <p
                    class="fs-5 mb-5 text-dark fw-normal"
                    data-aos="fade-up"
                    data-aos-delay="600"
                    data-aos-duration="1000"
                  >
                      Nền tảng quản lý nguồn nhân lực giúp bạn tận dụng tối đa nhân viên của mình
                  </p>
                  <div
                    class="d-sm-flex align-items-center gap-3"
                    data-aos="fade-up"
                    data-aos-delay="800"
                    data-aos-duration="1000"
                  >
                    <a
                      class="btn btn-primary px-5 py-6 btn-hover-shadow d-block mb-3 mb-sm-0"
                      href="{{ route('login') }}"
                      >Login</a
                    >
                    <a
                      class="btn btn-outline-primary d-block scroll-link px-7 py-6"
                      href="javascript:void(0)"
                      >Đăng ký trải nghiệm ngay</a
                    >
                  </div>
                </div>
              </div>
              <div class="col-xl-6 d-none d-xl-block">
                <div
                  class="hero-img-slide position-relative bg-primary-subtle p-4 rounded"
                >
                  <div class="d-flex flex-row">
                    <div class="">
                      <div class="banner-img-1 slideup">
                        <img
                          src="{{ asset('assets/images/hero-img/bannerimg1.svg')}}"
                          alt=""
                          class="img-fluid"
                        />
                      </div>
                      <div class="banner-img-1 slideup">
                        <img
                          src="{{ asset('assets/images/hero-img/bannerimg1.svg')}}"
                          alt=""
                          class="img-fluid"
                        />
                      </div>
                    </div>
                    <div class="">
                      <div class="banner-img-2 slideDown">
                        <img
                          src="{{ asset('assets/images/hero-img/bannerimg2.svg')}}"
                          alt=""
                          class="img-fluid"
                        />
                      </div>
                      <div class="banner-img-2 slideDown">
                        <img
                          src="{{ asset('assets/images/hero-img/bannerimg2.svg')}}"
                          alt=""
                          class="img-fluid"
                        />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="production pb-5 pb-md-5 mb-5" id="production-template">
          <div class="container">
            <div class="row justify-content-center">
              <div
                class="col-lg-8"
                data-aos="fade-up"
                data-aos-delay="200"
                data-aos-duration="1000"
              >
                <div
                  class="d-sm-flex align-items-center text-center gap-2 justify-content-center mb-7"
                >
                  <ul
                    class="list-unstyled d-flex align-items-center justify-content-center justify-content-sm-start mb-2 mb-sm-0"
                  >
                    <li class="">
                      <a class="d-block" href="javascript:void(0)">
                        <img
                          src="{{ asset('assets/images/profile/user-1.jpg')}}"
                          alt=""
                          class="img-fluid border border-2 rounded-circle border-white"
                          width="32"
                          height="32"
                        />
                      </a>
                    </li>
                    <li class="ms-n2">
                      <a class="d-block" href="javascript:void(0)">
                        <img
                          src="{{ asset('assets/images/profile/user-2.jpg')}}"
                          alt=""
                          class="img-fluid border border-2 rounded-circle border-white"
                          width="32"
                          height="32"
                        />
                      </a>
                    </li>
                    <li class="ms-n2">
                      <a class="d-block" href="javascript:void(0)">
                        <img
                          src="{{ asset('assets/images/profile/user-3.jpg')}}"
                          alt=""
                          class="img-fluid border border-2 rounded-circle border-white"
                          width="32"
                          height="32"
                        />
                      </a>
                    </li>
                  </ul>
                  <p class="mb-0 fw-semibold fs-4 text-dark">
                    <span> 30+</span> khách hàng đang sử dụng nền tảng đánh giá
                  </p>
                </div>
                <h2 class="text-center mb-0 fs-9 fw-bolder">
                  Giao diện thân thiện, tối ưu và dễ dàng sử dụng
                </h2>
              </div>
            </div>
            <div class="domo-contect position-relative">
              <div class="demos-view mt-5 pt-lg-5">
                <div class="row justify-content-center">
                  <div class="col-sm-6 col-lg-4 mb-7">
                    <div
                      class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden"
                    >
                      <img
                        src="{{ asset('assets/images/demos/Home.png')}}"
                        alt="" style="height: 300px"
                        class="img-fluid"
                      />
                      <a
                        target="_blank"
                        href="#"
                        class="btn btn-primary lp-demos-btn fs-3 px-7 py-1 rounded position-absolute top-50 start-50 translate-middle"
                        >Live Preview</a
                      >
                    </div>
                    <h6 class="mb-0 text-center fs-3">Dashboard</h6>
                  </div>
                  <div class="col-sm-6 col-lg-4 mb-7">
                    <div
                      class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden"
                    >
                      <img
                        src="{{ asset('assets/images/demos/user.png')}}" style="height: 300px"
                        alt=""
                        class="img-fluid"
                      />
                      <a
                        target="_blank"
                        href="#"
                        class="btn btn-primary lp-demos-btn fs-3 px-7 py-1 rounded position-absolute top-50 start-50 translate-middle"
                        >Live Preview</a
                      >
                    </div>
                    <h6 class="mb-0 text-center fs-3">Nhân viên</h6>
                  </div>
                  <div class="col-sm-6 col-lg-4 mb-7">
                    <div
                      class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden"
                    >
                      <img
                        src="{{ asset('assets/images/demos/ky_danh_gia.png')}}" style="height: 300px"
                        alt=""
                        class="img-fluid"
                      />
                      <a
                        target="_blank"
                        href="../horizontal/index.html"
                        class="btn btn-primary lp-demos-btn fs-3 px-7 py-1 rounded position-absolute top-50 start-50 translate-middle"
                        >Live Preview</a
                      >
                    </div>
                    <h6 class="mb-0 text-center fs-3">Kỳ đánh giá</h6>
                  </div>
                  <div class="col-sm-6 col-lg-4 mb-7">
                    <div
                      class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden"
                    >
                      <img
                        src="{{ asset('assets/images/demos/danh_gia.png')}}" style="height: 300px"
                        alt=""
                        class="img-fluid"
                      />
                      <a
                        target="_blank"
                        href="../minisidebar/index.html"
                        class="btn btn-primary lp-demos-btn fs-3 px-7 py-1 rounded position-absolute top-50 start-50 translate-middle"
                        >Live Preview</a
                      >
                    </div>
                    <h6 class="mb-0 text-center fs-3">Đánh giá</h6>
                  </div>
                  <div class="col-sm-6 col-lg-4 mb-7">
                    <div
                      class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden"
                    >
                      <img
                        src="{{ asset('assets/images/demos/demo-rtl.jpg')}}"
                        alt=""
                        class="img-fluid"
                      />
                      <a
                        target="_blank"
                        href="../rtl/index.html"
                        class="btn btn-primary lp-demos-btn fs-3 px-7 py-1 rounded position-absolute top-50 start-50 translate-middle"
                        >Live Preview</a
                      >
                    </div>
                    <h6 class="mb-0 text-center fs-3">Báo cáo</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
          <section class="features-section py-5">
              <div class="container">
                  <div class="row justify-content-center">
                      <div class="col-lg-6">
                          <div
                              class="text-center"
                              data-aos="fade-up"
                              data-aos-delay="600"
                              data-aos-duration="1000"
                          >
                              <small class="text-primary fw-bold mb-2 d-block fs-3"
                              >ALMOST COVERED EVERYTHING</small
                              >
                              <h2 class="fs-9 text-center mb-4 mb-lg-5 fw-bolder">
                                  Các tính năng tuyệt vời và tính linh hoạt khác được cung cấp
                              </h2>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div
                          class="col-sm-6 col-md-4 col-lg-3"
                          data-aos="fade-up"
                          data-aos-delay="800"
                          data-aos-duration="1000"
                      >
                          <div class="text-center mb-5">
                              <i class="d-block ti ti-wand text-primary fs-10"></i>
                              <h5 class="fs-5 fw-semibold mt-8">Chức danh</h5>
                              <p class="mb-0 text-dark">
                                  Thiết lập linh hoạt, import nhanh chóng,
                                  kết nối Hrm
                              </p>
                          </div>
                      </div>
                      <div
                          class="col-sm-6 col-md-4 col-lg-3"
                          data-aos="fade-up"
                          data-aos-delay="800"
                          data-aos-duration="1000"
                      >
                          <div class="text-center mb-5">
                              <i
                                  class="d-block ti ti-layout-sidebar text-primary fs-10"
                              ></i>
                              <h5 class="fs-5 fw-semibold mt-8">Phòng ban</h5>
                              <p class="mb-0 text-dark">
                                  Thiết lập linh hoạt, import nhanh chóng,
                                  kết nối Hrm
                              </p>
                          </div>
                      </div>
                      <div
                          class="col-sm-6 col-md-4 col-lg-3"
                          data-aos="fade-up"
                          data-aos-delay="800"
                          data-aos-duration="1000"
                      >
                          <div class="text-center mb-5">
                              <i class="d-block ti ti-user text-primary fs-10"></i>
                              <h5 class="fs-5 fw-semibold mt-8">User</h5>
                              <p class="mb-0 text-dark">
                                  Thiết lập linh hoạt, import nhanh chóng,
                                  kết nối Hrm
                              </p>
                          </div>
                      </div>
                      <div
                          class="col-sm-6 col-md-4 col-lg-3"
                          data-aos="fade-up"
                          data-aos-delay="800"
                          data-aos-duration="1000"
                      >
                          <div class="text-center mb-5">
                              <i class="d-block ti ti-calendar text-primary fs-10"></i>
                              <h5 class="fs-5 fw-semibold mt-8">Lịch đánh giá</h5>
                              <p class="mb-0 text-dark">
                                  Nhắc lịch đánh giá, tạo lịch và noti thông báo
                              </p>
                          </div>
                      </div>
                      <div
                          class="col-sm-6 col-md-4 col-lg-3"
                          data-aos="fade-up"
                          data-aos-delay="1000"
                          data-aos-duration="1000"
                      >
                          <div class="text-center mb-5">
                              <i class="d-block ti ti-tag text-primary fs-10"></i>
                              <h5 class="fs-5 fw-semibold mt-8">Nhóm tiêu chí đánh giá</h5>
                              <p class="mb-0 text-dark">
                                  Phân loại các tiêu chí đánh giá thành các nhóm theo các tiêu chí khác nhau
                              </p>
                          </div>
                      </div>
                      <div
                          class="col-sm-6 col-md-4 col-lg-3"
                          data-aos="fade-up"
                          data-aos-delay="1000"
                          data-aos-duration="1000"
                      >
                          <div class="text-center mb-5">
                              <i class="d-block ti ti-diamond text-primary fs-10"></i>
                              <h5 class="fs-5 fw-semibold mt-8">Tiêu chí đánh giá</h5>
                              <p class="mb-0 text-dark">
                                  Thiết lập đa dạng các tiêu chí đánh giá
                              </p>
                          </div>
                      </div>
                      <div
                          class="col-sm-6 col-md-4 col-lg-3"
                          data-aos="fade-up"
                          data-aos-delay="1000"
                          data-aos-duration="1000"
                      >
                          <div class="text-center mb-5">
                              <i
                                  class="d-block ti ti-device-desktop text-primary fs-10"
                              ></i>
                              <h5 class="fs-5 fw-semibold mt-8">Mẫu đánh giá</h5>
                              <p class="mb-0 text-dark">
                                  Dễ dàng tùy biến mẫu đánh giá năng lực từ đó cho cái nhìn tổng quan về nhân sự
                              </p>
                          </div>
                      </div>
                      <div
                          class="col-sm-6 col-md-4 col-lg-3"
                          data-aos="fade-up"
                          data-aos-delay="1000"
                          data-aos-duration="1000"
                      >
                          <div class="text-center mb-5">
                              <i class="d-block ti ti-database text-primary fs-10"></i>
                              <h5 class="fs-5 fw-semibold mt-8">Kỳ đánh giá</h5>
                              <p class="mb-0 text-dark">
                                  Our Css is written Sass Base to make your life easier.
                              </p>
                          </div>
                      </div>
                      <div
                          class="col-sm-6 col-md-4 col-lg-3"
                          data-aos="fade-up"
                          data-aos-delay="1200"
                          data-aos-duration="1000"
                      >
                          <div class="text-center mb-5">
                              <i
                                  class="d-block ti ti-arrows-shuffle text-primary fs-10"
                              ></i>
                              <h5 class="fs-5 fw-semibold mt-8">Đánh giá nhân viên</h5>
                              <p class="mb-0 text-dark">
                                  Tự động tổng hợp kết quả đánh giá, tính điểm xếp hạng dựa trên các tiêu chí, hệ số đánh giá
                              </p>
                          </div>
                      </div>
                      <div
                          class="col-sm-6 col-md-4 col-lg-3"
                          data-aos="fade-up"
                          data-aos-delay="1200"
                          data-aos-duration="1000"
                      >
                          <div class="text-center mb-5 disabled">
                              <i class="d-block ti ti-chart-pie text-primary fs-10"></i>
                              <h5 class="fs-5 fw-semibold mt-8">Phát triển nhân viên</h5>
                              <p class="mb-0 text-dark">
                                  Phân tích năng lực giúp xác định điểm mạnh, điểm yếu của nhân viên để lên kế hoạch đào tạo, phát triển
                              </p>
                          </div>
                      </div>
                      <div
                          class="col-sm-6 col-md-4 col-lg-3"
                          data-aos="fade-up"
                          data-aos-delay="1200"
                          data-aos-duration="1000"
                      >
                          <div class="text-center mb-5">
                              <i
                                  class="d-block ti ti-layers-intersect text-primary fs-10"
                              ></i>
                              <h5 class="fs-5 fw-semibold mt-8">Báo cáo đánh giá</h5>
                              <p class="mb-0 text-dark">
                                  Báo cáo tổng hợp đánh giá theo năng lực làm cơ sở quy hoạch, tổ chức đội nhóm nhân sự hợp lý
                              </p>
                          </div>
                      </div>
                      <div
                          class="col-sm-6 col-md-4 col-lg-3"
                          data-aos="fade-up"
                          data-aos-delay="1200"
                          data-aos-duration="1000"
                      >
                          <div class="text-center mb-5">
                              <i class="d-block ti ti-refresh text-primary fs-10"></i>
                              <h5 class="fs-5 fw-semibold mt-8">Khóa học</h5>
                              <p class="mb-0 text-dark">
                                  Coming soon
                              </p>
                          </div>
                      </div>
                      <div
                          class="col-sm-6 col-md-4 col-lg-3"
                          data-aos="fade-up"
                          data-aos-delay="1400"
                          data-aos-duration="1000"
                      >
                          <div class="text-center mb-5">
                              <i class="d-block ti ti-book text-primary fs-10"></i>
                              <h5 class="fs-5 fw-semibold mt-8">Lộ trình học</h5>
                              <p class="mb-0 text-dark">
                                  Coming soon
                              </p>
                          </div>
                      </div>
                      <div
                          class="col-sm-6 col-md-4 col-lg-3"
                          data-aos="fade-up"
                          data-aos-delay="1400"
                          data-aos-duration="1000"
                      >
                          <div class="text-center mb-5">
                              <i class="d-block ti ti-question-mark text-primary fs-10"></i>
                              <h5 class="fs-5 fw-semibold mt-8">Thư viện câu hỏi</h5>
                              <p class="mb-0 text-dark">
                                  Coming soon
                              </p>
                          </div>
                      </div>
                      <div
                          class="col-sm-6 col-md-4 col-lg-3"
                          data-aos="fade-up"
                          data-aos-delay="1400"
                          data-aos-duration="1000"
                      >
                          <div class="text-center mb-5">
                              <i class="d-block ti ti-calendar text-primary fs-10"></i>
                              <h5 class="fs-5 fw-semibold mt-8">Bài kiểm tra</h5>
                              <p class="mb-0 text-dark">
                                  Coming soon
                              </p>
                          </div>
                      </div>
                      <div
                          class="col-sm-6 col-md-4 col-lg-3"
                          data-aos="fade-up"
                          data-aos-delay="1400"
                          data-aos-duration="1000"
                      >
                          <div class="text-center mb-5">
                              <i class="d-block ti ti-chart-area text-primary fs-10"></i>
                              <h5 class="fs-5 fw-semibold mt-8">Khảo sát</h5>
                              <p class="mb-0 text-dark">
                                  Coming soon
                              </p>
                          </div>
                      </div>
                      <div
                          class="col-sm-6 col-md-4 col-lg-3"
                          data-aos="fade-up"
                          data-aos-delay="1400"
                          data-aos-duration="1000"
                      >
                          <div class="text-center mb-5">
                              <i class="d-block ti ti-lambda text-primary fs-10"></i>
                              <h5 class="fs-5 fw-semibold mt-8">Ai learning</h5>
                              <p class="mb-0 text-dark">
                                  Coming soon
                              </p>
                          </div>
                      </div>
                      <div
                          class="col-sm-6 col-md-4 col-lg-3"
                          data-aos="fade-up"
                          data-aos-delay="1400"
                          data-aos-duration="1000"
                      >
                          <div class="text-center mb-5">
                              <i class="d-block ti ti-bluetooth-connected text-primary fs-10"></i>
                              <h5 class="fs-5 fw-semibold mt-8">Kết nối Hrm</h5>
                              <p class="mb-0 text-dark">
                                  Coming soon
                              </p>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
        <section class="py-md-5 mb-5" style="background: #fafafa">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-7">
                         <img src="{{ asset('assets/images/demos/tieuchidg.png')}}" class="img-thumbnail" style="width: 100%">
                      </div>
                      <div class="col-lg-5">
                          <h2>Thiết lập đa dạng các tiêu chí đánh giá và mẫu đánh giá năng lực nhân sự</h2>
                          <ul class="check-lists">
                              <li>
                                  <i class="ti ti-checkbox" style="font-size: 30px;color: #625dff"></i> Xây dựng bộ tiêu chí đánh giá cho doanh nghiệp
                              </li>
                              <li>
                                  <i class="ti ti-checkbox" style="font-size: 30px;color: #625dff"></i> Tùy chỉnh linh hoạt khung đánh giá năng lực cho từng vị trí, bộ phận phòng ban
                              </li>
                              <li>
                                  <i class="ti ti-checkbox" style="font-size: 30px;color: #625dff"></i> Dễ dàng tùy biến mẫu đánh giá năng lực từ đó cho cái nhìn tổng quan về nhân sự
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
          </section>
        <section class="py-md-5 mb-5">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-5">
                          <h2> Tạo kỳ đánh giá một cách linh hoạt, tự động điều chỉnh tối ưu</h2>
                          <ul class="check-lists">
                              <li>
                                  <i class="ti ti-checkbox" style="font-size: 30px;color: #625dff"></i> Tạo chu kỳ theo tháng, quý phù hợp với tình hình phát triển của công ty
                              </li>
                              <li>
                                  <i class="ti ti-checkbox" style="font-size: 30px;color: #625dff"></i> Tùy chỉnh nhân viên đánh giá
                              </li>
                              <li>
                                  <i class="ti ti-checkbox" style="font-size: 30px;color: #625dff"></i> Dễ dàng thiết lập người đánh giá kèm trọng số cho từng người
                              </li>
                          </ul>
                      </div>
                      <div class="col-lg-7">
                          <img src="{{ asset('assets/images/demos/ky_danh_gia.png')}}" class="img-thumbnail" style="width: 100%">
                      </div>
                  </div>
              </div>
          </section>
        <section class="py-md-5 mb-5" style="background: #fafafa">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-7">
                          <img src="{{ asset('assets/images/demos/danh_gia.png')}}" class="img-thumbnail" style="width: 100%">
                      </div>
                      <div class="col-lg-5">
                          <h2>Đánh giá chi tiết, trực quan năng lực nhân sự</h2>
                          <ul class="check-lists">
                              <li>
                                  <i class="ti ti-checkbox" style="font-size: 30px;color: #625dff"></i> Thiết lập quy trình đánh giá linh hoạt: tự đánh giá, quản lý đánh giá, đánh giá 360 độ
                              </li>
                              <li>
                                  <i class="ti ti-checkbox" style="font-size: 30px;color: #625dff"></i> Tự động tổng hợp kết quả đánh giá, tính điểm xếp hạng dựa trên các tiêu chí, hệ số đánh giá
                              </li>
                              <li>
                                  <i class="ti ti-checkbox" style="font-size: 30px;color: #625dff"></i> Giúp đánh giá năng lực nhân viên một cách toàn diện và khách quan
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
          </section>
          <section class="py-md-5 mb-5">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-5">
                          <h2>Thống kê, báo cáo kết quả đánh giá năng lực</h2>
                          <ul class="check-lists">
                              <li>
                                  <i class="ti ti-checkbox" style="font-size: 30px;color: #625dff"></i> Thống kê kết quả đánh giá nhân viên theo các tiêu chí đánh giá, theo bộ phận, theo chức vụ, theo thời gian
                              </li>
                              <li>
                                  <i class="ti ti-checkbox" style="font-size: 30px;color: #625dff"></i> Phân tích kết quả đánh giá nhân viên, từ đó phát hiện các vấn đề cần cải thiện trong công tác đánh giá nhân viên.
                              </li>
                              <li>
                                  <i class="ti ti-checkbox" style="font-size: 30px;color: #625dff"></i> Giúp doanh nghiệp đưa ra các quyết định phù hợp về phát triển nhân sự
                              </li>
                          </ul>
                      </div>
                      <div class="col-lg-7">
                          <img src="{{ asset('assets/images/demos/danh_gia.png')}}" class="img-thumbnail" style="width: 100%">
                      </div>
                  </div>
              </div>
          </section>
          <section class="py-md-5 mb-5" style="background: #fafafa">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-7">
                          <img src="{{ asset('assets/images/demos/demo-minisidebar.jpg')}}" class="img-thumbnail" style="width: 100%">
                      </div>
                      <div class="col-lg-5">
                          <h2>AI learning</h2>
                          <ul class="check-lists">
                              <li>
                                  <i class="ti ti-checkbox" style="font-size: 30px;color: #625dff"></i> Phân tích dữ liệu về người học xác định strengths, weaknesses, phong cách học tập và preferences của từng người học.
                              </li>
                              <li>
                                  <i class="ti ti-checkbox" style="font-size: 30px;color: #625dff"></i> Hệ thống có thể điều chỉnh chương trình học tập phù hợp với nhu cầu của từng người học, giúp họ học tập hiệu quả
                              </li>
                              <li>
                                  <i class="ti ti-checkbox" style="font-size: 30px;color: #625dff"></i> Hệ thống có thể thay đổi chương trình học tập một cách tự động dựa trên performance của người học
                              </li>
                              <li>
                                  <i class="ti ti-checkbox" style="font-size: 30px;color: #625dff"></i> Giúp tiết kiệm thời gian và chi phí cho các tổ chức giáo dục bằng cách tự động hóa các tác vụ
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
          </section>
        <section class="py-md-5 mb-5">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-6">
                <div
                  class="card c2a-box"
                  data-aos="fade-up"
                  data-aos-delay="1600"
                  data-aos-duration="1000"
                >
                  <div class="card-body text-center p-4 pt-7">
                    <h3 class="fs-7 fw-semibold pt-6">
                        Bạn chưa tìm thấy câu trả lời cho câu hỏi của mình?
                    </h3>
                    <p class="mb-7 pb-2 text-dark">
                      Liên hệ ngay với chúng tôi
                    </p>
                    <div
                      class="d-sm-flex align-items-center justify-content-center gap-3 mb-4"
                    >
                      <a
                        href="#"
                        target="_blank"
                        class="btn btn-primary d-block mb-3 mb-sm-0 btn-hover-shadow px-7 py-6"
                        type="button"
                        >Liên hệ ngay</a
                      >
                      <a
                        href="#"
                        target="_blank"
                        class="btn btn-outline-secondary d-block px-7 py-6"
                        type="button"
                        >Đăng ký ngay</a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="bg-primary pt-5 pb-8">
          <div class="container">
            <div class="row justify-content-between">
              <div class="col-lg-7 col-xl-5 pt-lg-5 mb-5 mb-lg-0">
                <h2
                  class="fs-9 text-white text-center text-lg-start fw-bolder mb-7"
                >
                    Hãy để Thor Review
                    giúp doanh nghiệp đánh giá nhân viên, xây dựng đội ngũ
                </h2>
                <div
                  class="d-sm-flex align-items-center justify-content-center justify-content-lg-start gap-3"
                >
                  <a
                    href="{{ route('login') }}"
                    class="btn bg-white text-primary fw-semibold d-block mb-3 mb-sm-0 btn-hover-shadow px-7 py-6"
                    >Login</a
                  >
                  <a
                    href="#"
                    class="btn border-white text-white fw-semibold btn-hover-white d-block px-7 py-6"
                    >Đăng ký ngay</a
                  >
                </div>
              </div>
              <div class="col-lg-5 col-xl-5">
                <div class="text-center text-lg-end">
                  <img
                    src="{{ asset('assets/images/backgrounds/business-woman-checking-her-mail.png')}}"
                    alt=""
                    class="img-fluid"
                  />
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <footer class="footer-part pt-7 pb-5">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4">
              <div class="text-center">
                <a href="index-new.html">
                  <img
                    src="{{ asset('assets/images/logos/favicon.ico')}}"
                    alt=""
                    class="img-fluid pb-3"
                  />
                </a>
                <p class="mb-0 text-dark">
                  All rights reserved by Thor Review. Designed & Developed by
                  <a
                    class="text-dark text-hover-primary border-bottom border-primary"
                    href="#"
                    >Biet doi code dao</a
                  >
                </p>
              </div>
            </div>
          </div>
        </div>
      </footer>
      <div
        class="offcanvas offcanvas-start modernize-lp-offcanvas"
        tabindex="-1"
        id="offcanvasNavbar"
        aria-labelledby="offcanvasNavbarLabel"
      >
        <div class="offcanvas-header p-4">
          <img
            src="{{ asset('assets/images/logos/dark-logo.svg')}}"
            alt=""
            class="img-fluid"
            width="150"
          />
        </div>
        <div class="offcanvas-body p-4">
          <ul class="navbar-nav justify-content-end flex-grow-1">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle d-flex align-items-center justify-content-between fs-3 text-dark"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Demos <i class="ti ti-chevron-down fs-14"></i
              ></a>
              <ul class="dropdown-menu ps-2">
                <li>
                  <a class="dropdown-item text-dark" href="./index.html"
                    >Dark</a
                  >
                </li>
                <li>
                  <a class="dropdown-item text-dark" href="./index.html"
                    >Horizontal</a
                  >
                </li>
                <li>
                  <a class="dropdown-item text-dark" href="./index.html">LTR</a>
                </li>
                <li>
                  <a class="dropdown-item text-dark" href="./index.html"
                    >Minisidebar</a
                  >
                </li>
                <li>
                  <a class="dropdown-item text-dark" href="./index.html">RTL</a>
                </li>
              </ul>
            </li>
            <li class="nav-item mt-3 dropdown">
              <a
                class="nav-link dropdown-toggle d-flex align-items-center justify-content-between fs-3 text-dark"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Pages <i class="ti ti-chevron-down fs-14"></i
              ></a>
              <div class="dropdown-menu mt-3 ps-1">
                <!-- apps -->
                <div class="row">
                  <div class="col-12">
                    <div class="position-relative">
                      <a
                        href="#"
                        class="d-flex align-items-center pb-9 position-relative lh-base"
                      >
                        <div
                          class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center"
                        >
                          <img
                            src="{{ asset('assets/images/svgs/icon-dd-chat.svg')}}"
                            alt=""
                            class="img-fluid"
                            width="24"
                            height="24"
                          />
                        </div>
                        <div class="d-inline-block">
                          <h6 class="mb-1 fw-semibold text-hover-primary">
                            Chat Application
                          </h6>
                          <span class="fs-2 d-block fw-normal text-muted"
                            >New messages arrived</span
                          >
                        </div>
                      </a>
                      <a
                        href="#"
                        class="d-flex align-items-center pb-9 position-relative lh-base"
                      >
                        <div
                          class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center"
                        >
                          <img
                            src="{{ asset('assets/images/svgs/icon-dd-invoice.svg')}}"
                            alt=""
                            class="img-fluid"
                            width="24"
                            height="24"
                          />
                        </div>
                        <div class="d-inline-block">
                          <h6 class="mb-1 fw-semibold text-hover-primary">
                            Invoice App
                          </h6>
                          <span class="fs-2 d-block fw-normal text-muted"
                            >Get latest invoice</span
                          >
                        </div>
                      </a>
                      <a
                        href="#"
                        class="d-flex align-items-center pb-9 position-relative lh-base"
                      >
                        <div
                          class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center"
                        >
                          <img
                            src="{{ asset('assets/images/svgs/icon-dd-mobile.svg')}}"
                            alt=""
                            class="img-fluid"
                            width="24"
                            height="24"
                          />
                        </div>
                        <div class="d-inline-block">
                          <h6 class="mb-1 fw-semibold text-hover-primary">
                            Contact Application
                          </h6>
                          <span class="fs-2 d-block fw-normal text-muted"
                            >2 Unsaved Contacts</span
                          >
                        </div>
                      </a>
                      <a
                        href="#"
                        class="d-flex align-items-center pb-9 position-relative lh-base"
                      >
                        <div
                          class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center"
                        >
                          <img
                            src="{{ asset('assets/images/svgs/icon-dd-message-box.svg')}}"
                            alt=""
                            class="img-fluid"
                            width="24"
                            height="24"
                          />
                        </div>
                        <div class="d-inline-block">
                          <h6 class="mb-1 fw-semibold text-hover-primary">
                            Email App
                          </h6>
                          <span class="fs-2 d-block fw-normal text-muted"
                            >Get new emails</span
                          >
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="position-relative">
                      <a
                        href="#"
                        class="d-flex align-items-center pb-9 position-relative lh-base"
                      >
                        <div
                          class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center"
                        >
                          <img
                            src="{{ asset('assets/images/svgs/icon-dd-cart.svg')}}"
                            alt=""
                            class="img-fluid"
                            width="24"
                            height="24"
                          />
                        </div>
                        <div class="d-inline-block">
                          <h6 class="mb-1 fw-semibold text-hover-primary">
                            User Profile
                          </h6>
                          <span class="fs-2 d-block fw-normal text-muted"
                            >learn more information</span
                          >
                        </div>
                      </a>
                      <a
                        href="#"
                        class="d-flex align-items-center pb-9 position-relative lh-base"
                      >
                        <div
                          class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center"
                        >
                          <img
                            src="{{ asset('assets/images/svgs/icon-dd-date.svg')}}"
                            alt=""
                            class="img-fluid"
                            width="24"
                            height="24"
                          />
                        </div>
                        <div class="d-inline-block">
                          <h6 class="mb-1 fw-semibold text-hover-primary">
                            Calendar App
                          </h6>
                          <span class="fs-2 d-block fw-normal text-muted"
                            >Get dates</span
                          >
                        </div>
                      </a>
                      <a
                        href="#"
                        class="d-flex align-items-center pb-9 position-relative lh-base"
                      >
                        <div
                          class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center"
                        >
                          <img
                            src="{{ asset('assets/images/svgs/icon-dd-lifebuoy.svg')}}"
                            alt=""
                            class="img-fluid"
                            width="24"
                            height="24"
                          />
                        </div>
                        <div class="d-inline-block">
                          <h6 class="mb-1 fw-semibold text-hover-primary">
                            Contact List Table
                          </h6>
                          <span class="fs-2 d-block fw-normal text-muted"
                            >Add new contact</span
                          >
                        </div>
                      </a>
                      <a
                        href="#"
                        class="d-flex align-items-center pb-9 position-relative lh-base"
                      >
                        <div
                          class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center"
                        >
                          <img
                            src="{{ asset('assets/images/svgs/icon-dd-application.svg')}}"
                            alt=""
                            class="img-fluid"
                            width="24"
                            height="24"
                          />
                        </div>
                        <div class="d-inline-block">
                          <h6 class="mb-1 fw-semibold text-hover-primary">
                            Notes Application
                          </h6>
                          <span class="fs-2 d-block fw-normal text-muted"
                            >To-do and Daily tasks</span
                          >
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="col-12">
                    <!-- quick links -->
                    <h5 class="fs-5 mb-7 fw-semibold">Quick Links</h5>
                    <ul class="list-unstyled px-1">
                      <li class="mb-3">
                        <a
                          class="fw-semibold text-dark text-hover-primary"
                          href="#"
                          >Pricing Page</a
                        >
                      </li>
                      <li class="mb-3">
                        <a
                          class="fw-semibold text-dark text-hover-primary"
                          href="#"
                          >Authentication Design</a
                        >
                      </li>
                      <li class="mb-3">
                        <a
                          class="fw-semibold text-dark text-hover-primary"
                          href="#"
                          >Register Now</a
                        >
                      </li>
                      <li class="mb-3">
                        <a
                          class="fw-semibold text-dark text-hover-primary"
                          href="#"
                          >404 Error Page</a
                        >
                      </li>
                      <li class="mb-3">
                        <a
                          class="fw-semibold text-dark text-hover-primary"
                          href="#"
                          >Notes App</a
                        >
                      </li>
                      <li class="mb-3">
                        <a
                          class="fw-semibold text-dark text-hover-primary"
                          href="#"
                          >User Application</a
                        >
                      </li>
                      <li class="mb-3">
                        <a
                          class="fw-semibold text-dark text-hover-primary"
                          href="#"
                          >Account Settings</a
                        >
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item mt-3">
              <a
                class="nav-link fs-3 text-dark active"
                aria-current="page"
                href="../docs/index.html"
                >Documentation</a
              >
            </li>
            <li class="nav-item mt-3">
              <a class="nav-link fs-3 text-dark" href="#">Pages</a>
            </li>
          </ul>
          <form class="d-flex mt-3" role="search">
            <a
              href="{{ route('login') }}"
              class="btn btn-primary w-100 py-2"
              >Login</a
            >
          </form>
        </div>
      </div>
    </div>
    <div class="dark-transparent sidebartoggler"></div>
    <!-- Import Js Files -->

<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ asset('assets/js/app.min.js')}}"></script>
<script src="{{ asset('assets/js/app.init.js')}}"></script>
<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js')}}"></script>

<script src="{{ asset('assets/js/sidebarmenu.js')}}"></script>
<script src="{{ asset('assets/js/theme.js')}}"></script>

    <script src="{{ asset('assets/libs/owl.carousel/dist/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('assets/libs/aos/dist/aos.js')}}"></script>
    <script src="{{ asset('assets/js/landingpage/landingpage.js')}}"></script>
  </body>
</html>
