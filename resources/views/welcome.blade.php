@extends('layouts.main')

@section('content')
    <main class="page-wrapper ">
        @auth
            @if (Auth::user()->role !==  0)
            
                <section class="bg-dark pb-md-2 pb-lg-5 " style="height: 100vh">
                    <div class="d-none d-lg-block" style="padding-top: 60px;"></div>
                    <div class="container pb-4 pt-5">
                        <h2 class="h1 text-center mb-lg-4 pt-1 pt-md-4 text-white">
                            REPORT AND REQUEST SYSTEM
                        </h2>
                        <div class="row align-items-center pb-5 mb-lg-2">
                            <div class="d-flex">
                                <div class="col-md-2"></div>
                                <div class="col-md-8 text-center">
                                    <p class="fs-lg text-muted mb-md-0">
                                        "Streamlining Communication and Issue Resolution for a Seamless Workplace.
                                        Your Bridge to Effortless Communication and Swift Issue Resolution, Enhancing Workplace Harmony and Efficiency.
                                        "
                                    </p>
                                </div>
                                <div class="col-md-2"></div>

                            </div>
                            
                        </div>
                        
                        <!-- Item -->
                        <div class="col-6 py-4 my-2 my-sm-3">
                            <a href="complain" class="card card-hover h-100 border-0 shadow-sm text-decoration-none pt-5 px-sm-3 px-md-0 px-lg-3 pb-sm-3 pb-md-0 pb-lg-3 me-xl-2">
                                
                                <div class="card-body pt-3">
                                <div class="d-inline-block bg-primary shadow-primary rounded-3 position-absolute top-0 translate-middle-y p-3">
                                    {{-- <img src="assets/img/services/icons/file.svg" class="d-block m-1" width="40" alt="Icon"> --}}
                                    <img src="assets/img/services/icons/file.svg" class="d-block m-1" width="40" alt="Icon" style="filter: invert(100%);">

                                    
                                </div>
                                <h2 class="h4 d-inline-flex align-items-center">
                                    View All Complains
                                    <i class="bx bx-right-arrow-circle text-primary fs-3 ms-2"></i>
                                </h2>
                                <p class="fs-xl text-body mb-0">
                                    View all complaints, update the status of resolution, provide feedback, and present evidence of resolution.
                                </p>
                                </div>
                            </a>
                        </div>
                    
                    </div>
                </section>  
            @else
                <section class="bg-dark pb-md-2 pb-lg-5 " style="height: 100vh">
                    <div class="d-none d-lg-block" style="padding-top: 60px;"></div>
                    <div class="container pb-4 pt-5">
                    <h2 class="h1 text-center mb-lg-4 pt-1 pt-md-4 text-white">
                        REPORT AND REQUEST SYSTEM
                    </h2>
                    <div class="row align-items-center pb-5 mb-lg-2">
                        <div class="d-flex">
                            <div class="col-md-2"></div>
                            <div class="col-md-8 text-center">
                                <p class="fs-lg text-muted mb-md-0">
                                    "Streamlining Communication and Issue Resolution for a Seamless Workplace.
                                    Your Bridge to Effortless Communication and Swift Issue Resolution, Enhancing Workplace Harmony and Efficiency.
                                    "
                                </p>
                            </div>
                            <div class="col-md-2"></div>

                        </div>
                        
                    </div>
                    <div class="row row-cols-1 row-cols-md-2">

                        <!-- Item -->
                        <div class="col py-4 my-2 my-sm-3">
                        <a href="complain" class="card card-hover h-100 border-0 shadow-sm text-decoration-none pt-5 px-sm-3 px-md-0 px-lg-3 pb-sm-3 pb-md-0 pb-lg-3 me-xl-2">
                            <div class="card-body pt-3">
                            <div class="d-inline-block bg-primary shadow-primary rounded-3 position-absolute top-0 translate-middle-y p-3">
                                {{-- <img src="assets/img/services/icons/file.svg" class="d-block m-1" width="40" alt="Icon"> --}}
                                <img src="assets/img/services/icons/edit.svg" class="d-block m-1" width="40" alt="Icon" style="filter: invert(100%);">

                                
                            </div>
                            <h2 class="h4 d-inline-flex align-items-center">
                                New Complain
                                <i class="bx bx-right-arrow-circle text-primary fs-3 ms-2"></i>
                            </h2>
                            <p class="fs-xl text-body mb-0">
                                Lodge a new complaint to the Human Resource, Facilities & Services, or Information Technology Department
                            </p>
                            </div>
                        </a>
                        </div>

                        <!-- Item -->
                        <div class="col py-4 my-2 my-sm-3">
                        <a href="complain/create" class="card card-hover h-100 border-0 shadow-sm text-decoration-none pt-5 px-sm-3 px-md-0 px-lg-3 pb-sm-3 pb-md-0 pb-lg-3 ms-xl-2">
                            <div class="card-body pt-3">
                            <div class="d-inline-block bg-primary shadow-primary rounded-3 position-absolute top-0 translate-middle-y p-3">
                                <img src="assets/img/services/icons/list.svg" class="d-block m-1" width="40" alt="Icon" style="filter: invert(100%);">
                            </div>
                            <h2 class="h4 d-inline-flex align-items-center">
                                Complain History
                                <i class="bx bx-right-arrow-circle text-primary fs-3 ms-2"></i>
                            </h2>
                            <p class="fs-xl text-body mb-0">
                                Manage your existing or ongoing complaints with the ability to view, edit, or approve them as needed.
                            </p>
                            </div>
                        </a>
                        </div>
                        
                    </div>
                    </div>
                </section>  
            @endif
              
        @endauth

        @guest
            <!-- Hero slider + BG parallax -->
            <section class="jarallax dark-mode bg-dark py-xxl-5" data-jarallax data-speed="0.4">
                <span class="position-absolute top-0 start-0 w-100 h-100 bg-gradient-dark-translucent"></span>
                <div class="jarallax-img" style="background-image: url(assets/img/landing/software-agency-1/hero-bg.jpg);"></div>
                <div class="position-relative text-center zindex-5 overflow-hidden pt-4 ">

                <!-- Slider -->
                <div class="container text-center py-5">
                    <div class="row justify-content-center ">
                    <div class="col-xl-8 col-lg-9 col-md-10 col-11">
                        <div class="swiper pt-5 pb-3 py-md-5" data-swiper-options='{
                            "effect": "fade",
                            "speed": 500,
                            "autoplay": {
                                "delay": 5500,
                                "disableOnInteraction": false
                            },
                            "pagination": {
                                "el": ".swiper-pagination",
                                "clickable": true
                            },
                            "navigation": {
                            
                            }
                        }'>
                        <div class="swiper-wrapper">

                            <!-- Item -->
                            <div class="swiper-slide">
                                <h2 class="display-3 from-start mb-lg-3 pt-5">REPORT AND <br>REQUEST SYSTEM</h2>
                                <div class="from-end">
                                    <p class="fs-xl text-light opacity-70 pb-2 ">
                                        PricewaterhouseCoopers (PwC) Malaysia<br>Kuala Lumpur Sentral, Kuala Lumpur
                                    </p>
                                </div>
                                <div class="scale-up delay-1 d-grid justify-content-center">
                                    <a href="/login" class="btn btn-primary shadow-primary btn-lg">Login Now</a>
                                    <a  href="/register" class="btn btn-link  btn-lg">Does not have an account?</a>
                                </div>

                            </div>

                        </div>

                    </div>
                    </div>
                </div>
                </div>
                
            </section> 
        @endguest
        
    </main>
@endsection
