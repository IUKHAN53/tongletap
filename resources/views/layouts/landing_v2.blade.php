<!DOCTYPE html>
<html lang="en-US">
@include('partials.landing.header')
<body>
@php
function getLandingLink(){
    return 'https://api.whatsapp.com/send?phone=6582658237';
}
@endphp
<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

        <h1 class="logo me-auto">
            <a href="{{route('home')}}">
                <img width="380" height="380" src="{{asset('assets/landing/img/new_logo.png')}}" alt="">
            </a>
        </h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/landing/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li>
                    <a class="custom-header-btn getstarted scrollto" href="{{route('login')}}">
                        <span>
                            Login
                        </span>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19"
                                 fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M3.80643 13.7032V7.61286H2.28386V13.7032C2.28386 15.3849 3.64722 16.7483 5.32901 16.7483H12.9419C14.6237 16.7483 15.987 15.3849 15.987 13.7032V7.61286H14.4644V13.7032C14.4644 14.5441 13.7828 15.2257 12.9419 15.2257H11.4193V12.9419C11.4193 11.6805 10.3968 10.658 9.13544 10.658C7.8741 10.658 6.85158 11.6805 6.85158 12.9419V15.2257H5.32901C4.48811 15.2257 3.80643 14.5441 3.80643 13.7032ZM8.37415 15.2257H9.89672V12.9419C9.89672 12.5214 9.55588 12.1806 9.13544 12.1806C8.71499 12.1806 8.37415 12.5214 8.37415 12.9419V15.2257Z"
                                      fill="#002332"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M5.79001 1.52257C4.53143 1.52257 3.29104 2.14977 2.60906 3.31176C2.3906 3.68397 2.14364 4.12891 1.94661 4.55405C1.84827 4.76622 1.75131 4.99704 1.67633 5.22688C1.60905 5.43309 1.52258 5.74655 1.52258 6.09029C1.52258 6.69715 1.67134 7.46715 2.20854 8.11179C2.78645 8.80528 3.63061 9.13544 4.56772 9.13544C5.45736 9.13544 6.14679 8.72059 6.58925 8.35022C6.74013 8.22393 6.96303 8.22393 7.11391 8.35022C7.55637 8.72059 8.2458 9.13544 9.13544 9.13544C10.0251 9.13544 10.7145 8.72059 11.157 8.35022C11.3078 8.22393 11.5308 8.22393 11.6816 8.35022C12.1241 8.72059 12.8135 9.13544 13.7032 9.13544C14.6403 9.13544 15.4844 8.80528 16.0623 8.11179C16.5995 7.46715 16.7483 6.69715 16.7483 6.09029C16.7483 5.74655 16.6618 5.43309 16.5946 5.22688C16.5196 4.99704 16.4226 4.76622 16.3243 4.55405C16.1272 4.12891 15.8803 3.68397 15.6618 3.31176C14.9798 2.14977 13.7395 1.52257 12.4809 1.52257H5.79001ZM5.79001 3.04515C5.02639 3.04515 4.30869 3.42388 3.92218 4.08244C3.50716 4.78957 3.04515 5.67093 3.04515 6.09029C3.04515 6.85158 3.42579 7.61286 4.56772 7.61286C5.36838 7.61286 5.98192 6.86436 6.27712 6.41697C6.4056 6.22225 6.6183 6.09029 6.85158 6.09029C7.08486 6.09029 7.29756 6.22225 7.42604 6.41697C7.72125 6.86436 8.33478 7.61286 9.13544 7.61286C9.9361 7.61286 10.5496 6.86436 10.8448 6.41697C10.9733 6.22225 11.186 6.09029 11.4193 6.09029C11.6526 6.09029 11.8653 6.22225 11.9938 6.41697C12.289 6.86436 12.9025 7.61286 13.7032 7.61286C14.8451 7.61286 15.2257 6.85158 15.2257 6.09029C15.2257 5.67093 14.7637 4.78957 14.3487 4.08244C13.9622 3.42388 13.2445 3.04515 12.4809 3.04515H5.79001Z"
                                      fill="#002332"></path>
                            </svg>
                        </span>
                    </a>
                </li>
                <li>
                    <a class="custom-header-btn getstarted scrollto" href="{{getLandingLink()}}">
                        <span>
                            Request Customization
                        </span>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19"
                                 fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M3.80643 13.7032V7.61286H2.28386V13.7032C2.28386 15.3849 3.64722 16.7483 5.32901 16.7483H12.9419C14.6237 16.7483 15.987 15.3849 15.987 13.7032V7.61286H14.4644V13.7032C14.4644 14.5441 13.7828 15.2257 12.9419 15.2257H11.4193V12.9419C11.4193 11.6805 10.3968 10.658 9.13544 10.658C7.8741 10.658 6.85158 11.6805 6.85158 12.9419V15.2257H5.32901C4.48811 15.2257 3.80643 14.5441 3.80643 13.7032ZM8.37415 15.2257H9.89672V12.9419C9.89672 12.5214 9.55588 12.1806 9.13544 12.1806C8.71499 12.1806 8.37415 12.5214 8.37415 12.9419V15.2257Z"
                                      fill="#002332"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M5.79001 1.52257C4.53143 1.52257 3.29104 2.14977 2.60906 3.31176C2.3906 3.68397 2.14364 4.12891 1.94661 4.55405C1.84827 4.76622 1.75131 4.99704 1.67633 5.22688C1.60905 5.43309 1.52258 5.74655 1.52258 6.09029C1.52258 6.69715 1.67134 7.46715 2.20854 8.11179C2.78645 8.80528 3.63061 9.13544 4.56772 9.13544C5.45736 9.13544 6.14679 8.72059 6.58925 8.35022C6.74013 8.22393 6.96303 8.22393 7.11391 8.35022C7.55637 8.72059 8.2458 9.13544 9.13544 9.13544C10.0251 9.13544 10.7145 8.72059 11.157 8.35022C11.3078 8.22393 11.5308 8.22393 11.6816 8.35022C12.1241 8.72059 12.8135 9.13544 13.7032 9.13544C14.6403 9.13544 15.4844 8.80528 16.0623 8.11179C16.5995 7.46715 16.7483 6.69715 16.7483 6.09029C16.7483 5.74655 16.6618 5.43309 16.5946 5.22688C16.5196 4.99704 16.4226 4.76622 16.3243 4.55405C16.1272 4.12891 15.8803 3.68397 15.6618 3.31176C14.9798 2.14977 13.7395 1.52257 12.4809 1.52257H5.79001ZM5.79001 3.04515C5.02639 3.04515 4.30869 3.42388 3.92218 4.08244C3.50716 4.78957 3.04515 5.67093 3.04515 6.09029C3.04515 6.85158 3.42579 7.61286 4.56772 7.61286C5.36838 7.61286 5.98192 6.86436 6.27712 6.41697C6.4056 6.22225 6.6183 6.09029 6.85158 6.09029C7.08486 6.09029 7.29756 6.22225 7.42604 6.41697C7.72125 6.86436 8.33478 7.61286 9.13544 7.61286C9.9361 7.61286 10.5496 6.86436 10.8448 6.41697C10.9733 6.22225 11.186 6.09029 11.4193 6.09029C11.6526 6.09029 11.8653 6.22225 11.9938 6.41697C12.289 6.86436 12.9025 7.61286 13.7032 7.61286C14.8451 7.61286 15.2257 6.85158 15.2257 6.09029C15.2257 5.67093 14.7637 4.78957 14.3487 4.08244C13.9622 3.42388 13.2445 3.04515 12.4809 3.04515H5.79001Z"
                                      fill="#002332"></path>
                            </svg>
                        </span>
                    </a>
                </li>
                <li>
                    <a class="custom-header-btn getstarted scrollto" href="{{getLandingLink()}}">
                        <span>
                            Go to Shop
                        </span>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19"
                                 fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M3.80643 13.7032V7.61286H2.28386V13.7032C2.28386 15.3849 3.64722 16.7483 5.32901 16.7483H12.9419C14.6237 16.7483 15.987 15.3849 15.987 13.7032V7.61286H14.4644V13.7032C14.4644 14.5441 13.7828 15.2257 12.9419 15.2257H11.4193V12.9419C11.4193 11.6805 10.3968 10.658 9.13544 10.658C7.8741 10.658 6.85158 11.6805 6.85158 12.9419V15.2257H5.32901C4.48811 15.2257 3.80643 14.5441 3.80643 13.7032ZM8.37415 15.2257H9.89672V12.9419C9.89672 12.5214 9.55588 12.1806 9.13544 12.1806C8.71499 12.1806 8.37415 12.5214 8.37415 12.9419V15.2257Z"
                                      fill="#002332"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M5.79001 1.52257C4.53143 1.52257 3.29104 2.14977 2.60906 3.31176C2.3906 3.68397 2.14364 4.12891 1.94661 4.55405C1.84827 4.76622 1.75131 4.99704 1.67633 5.22688C1.60905 5.43309 1.52258 5.74655 1.52258 6.09029C1.52258 6.69715 1.67134 7.46715 2.20854 8.11179C2.78645 8.80528 3.63061 9.13544 4.56772 9.13544C5.45736 9.13544 6.14679 8.72059 6.58925 8.35022C6.74013 8.22393 6.96303 8.22393 7.11391 8.35022C7.55637 8.72059 8.2458 9.13544 9.13544 9.13544C10.0251 9.13544 10.7145 8.72059 11.157 8.35022C11.3078 8.22393 11.5308 8.22393 11.6816 8.35022C12.1241 8.72059 12.8135 9.13544 13.7032 9.13544C14.6403 9.13544 15.4844 8.80528 16.0623 8.11179C16.5995 7.46715 16.7483 6.69715 16.7483 6.09029C16.7483 5.74655 16.6618 5.43309 16.5946 5.22688C16.5196 4.99704 16.4226 4.76622 16.3243 4.55405C16.1272 4.12891 15.8803 3.68397 15.6618 3.31176C14.9798 2.14977 13.7395 1.52257 12.4809 1.52257H5.79001ZM5.79001 3.04515C5.02639 3.04515 4.30869 3.42388 3.92218 4.08244C3.50716 4.78957 3.04515 5.67093 3.04515 6.09029C3.04515 6.85158 3.42579 7.61286 4.56772 7.61286C5.36838 7.61286 5.98192 6.86436 6.27712 6.41697C6.4056 6.22225 6.6183 6.09029 6.85158 6.09029C7.08486 6.09029 7.29756 6.22225 7.42604 6.41697C7.72125 6.86436 8.33478 7.61286 9.13544 7.61286C9.9361 7.61286 10.5496 6.86436 10.8448 6.41697C10.9733 6.22225 11.186 6.09029 11.4193 6.09029C11.6526 6.09029 11.8653 6.22225 11.9938 6.41697C12.289 6.86436 12.9025 7.61286 13.7032 7.61286C14.8451 7.61286 15.2257 6.85158 15.2257 6.09029C15.2257 5.67093 14.7637 4.78957 14.3487 4.08244C13.9622 3.42388 13.2445 3.04515 12.4809 3.04515H5.79001Z"
                                      fill="#002332"></path>
                            </svg>
                        </span>
                    </a>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                 data-aos="fade-up" data-aos-delay="200">
                <h1 class="fw-bold">EAPWellness - THE ONLY TOOL YOU NEED TO <br> <span style="color: #ffa12c">MANAGE
                        YOUR WHOLE BUSINESS.</span></h1>
                <h3 class="text-white">
                    Love the idea of having all your business operations in one place? No problem! EAPWellness is the
                    only tool you need to manage your company’s entire workflow from anywhere, at any time!
                </h3>
                <div class="d-flex justify-content-center justify-content-lg-start mt-3">
                    <a href="{{getLandingLink()}}" class="custom-header-btn getstarted scrollto me-5">Get Started</a>
                    <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="custom-header-btn getstarted">
                        View Demo for free
                    </a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                <div class="ratio ratio-16x9">
                    <iframe width="978" height="550" src="https://www.youtube.com/embed/dVwpi1RvIeA"
                            title="Tongle Employee Assistance Programme (EAP) Software" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

</section><!-- End Hero -->

<main id="main">
    <!-- ======= About Us Section ======= -->
    <section id="about" class="about my-5">
        <div class="container" data-aos="fade-up">

            <div class="">
                <h2>
                    SPEND <span style="color: #ffa12c">LESS TIME</span> ON ADMINISTRATIVE TASKS, AND <span
                            style="color: #ffa12c">MORE TIME</span> ON WHAT YOU'RE GOOD AT, USING <span
                            style="color: #ffa12c">EAPWELLNESS</span> ,AN ALL-IN-ONE BUSINESS SYSTEM.
                </h2>
            </div>

            <div class="row content mt-5">
                <div class="col-lg-4 mb-5">
                    <div class="card" style="min-height: 350px">
                        <img src="{{asset('assets/landing/img/image-removebg-preview.png')}}" class="card-top-img" alt="">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center gap-3 mt-3">
                            <h5>Accounting and Billing Management</h5>
                            <p class="text-center">
                                Get all the tools to control your business accounting and inventory in one place. Use
                                convenient dashboards to set financial goals, invoice clients, manage taxation, and see
                                where your money is going.
                            </p>
                            <a href="{{getLandingLink()}}" class="btn btn-success btn-sm px-3 py-2 rounded-5">Show More</a>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 mb-5">
                    <div class="card" style="min-height: 350px">
                        <img src="{{asset('assets/landing/img/image-removebg-preview-1.png')}}" class="card-top-img" alt="">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center gap-3 mt-3">
                            <h5>Manage HR - Business Greatest Assets</h5>
                            <p class="text-center">
                                Gain easy access to the personal details of your staff. Edit staff information, assign
                                roles, and gain control over access. Handle all facets of your HR – from attendance
                                records to salary payments – all without lifting a finger.
                            </p>
                            <a href="{{getLandingLink()}}" class="btn btn-dark btn-sm px-3 py-2 rounded-5">Show More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 pt-4 pt-lg-0">
                    <div class="card" style="min-height: 350px">
                        <img src="{{asset('assets/landing/img/image-removebg-preview-2.png')}}" class="card-top-img" alt="">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center gap-3 mt-3">
                            <h5>Manage Leads & Deals</h5>
                            <p class="text-center">
                                Easily keep in touch with clients and users. Streamline the contract process for a more
                                efficient business. Generate new estimates quickly and easily. Crush deadlines by
                                managing estimates – all in one place, in a matter of minutes.
                            </p>
                            <a href="{{getLandingLink()}}" class="btn btn-warning text-white btn-sm px-3 py-2 rounded-5">Show More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center my-5">
                <a href="{{getLandingLink()}}" class="btn custom-header-btn rounded-5 fw-light text-uppercase py-3">View Demo For Free</a>
            </div>
        </div>
    </section>

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
        <div class="container" data-aos="fade-up">
            <div>
                <h3 class="text-white">STREAMLINE YOUR WORK</h3>
                <h1 class="text-white"><span style="color: #ffa12c">STREAMLINE YOUR WORK</span> NEXT LEVEL.</h1>
            </div>
            <div class="row">
                <div class="col-lg-5 img flex-column d-flex justify-content-center align-items-start gap-3">
                    <a href="{{getLandingLink()}}" class="btn custom-header-btn rounded-5 fw-light text-uppercase py-3">Live Preview</a>
                    <img src="{{asset('assets/landing/img/Laptop-1.png')}}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">
                    <div class="content">
                        <h3 style="color: #ffa12c">EAPWellness is designed for businesses of all sizes.</h3>
                        <p class="text-white">
                            EAPWellness makes managing your business easier than ever.
                            It takes the hassle out of using multiple tools and puts everything you
                            need in one place.
                        </p>
                    </div>
                    <div class="d-flex justify-content-end align-items-center flex-column flex-sm-row my-5 gap-2 fw-bold">
                        <span class="text-white">Fully Verified Ratings <br> Trusted by Hundreds of Happy Users.</span>
                        <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 m-0">
                            <li><i class="bx bxs-star" style="color: #ffa12c"></i></li>
                            <li><i class="bx bxs-star" style="color: #ffa12c"></i></li>
                            <li><i class="bx bxs-star" style="color: #ffa12c"></i></li>
                            <li><i class="bx bxs-star" style="color: #ffa12c"></i></li>
                            <li><i class="bx bxs-star" style="color: #ffa12c"></i></li>
                        </ul>
                    </div>
                    <div class="d-flex justify-content-end align-items-center me-5">
                        <a href="{{getLandingLink()}}" class="btn custom-header-btn rounded-5 fw-light text-uppercase py-3">
                            <span class="fw-bold">Buy now</span>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 style="height: 18px;width: 18px;margin: 0;"
                                 fill="#000000" height="800px" width="800px" id="Capa_1" viewBox="0 0 483.1 483.1"
                                 xml:space="preserve">
                            <g>
                                <path d="M434.55,418.7l-27.8-313.3c-0.5-6.2-5.7-10.9-12-10.9h-58.6c-0.1-52.1-42.5-94.5-94.6-94.5s-94.5,42.4-94.6,94.5h-58.6  c-6.2,0-11.4,4.7-12,10.9l-27.8,313.3c0,0.4,0,0.7,0,1.1c0,34.9,32.1,63.3,71.5,63.3h243c39.4,0,71.5-28.4,71.5-63.3  C434.55,419.4,434.55,419.1,434.55,418.7z M241.55,24c38.9,0,70.5,31.6,70.6,70.5h-141.2C171.05,55.6,202.65,24,241.55,24z   M363.05,459h-243c-26,0-47.2-17.3-47.5-38.8l26.8-301.7h47.6v42.1c0,6.6,5.4,12,12,12s12-5.4,12-12v-42.1h141.2v42.1  c0,6.6,5.4,12,12,12s12-5.4,12-12v-42.1h47.6l26.8,301.8C410.25,441.7,389.05,459,363.05,459z"></path>
                            </g>
                        </svg>
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="text-center">
                            <h1 style="color: #002332">What Our Customers Say
                                <br>
                                About <span style="color:#FFA12C;">Our Solutions</span></h1>
                        </div>
                        <div class="col-md-12 my-5">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <!-- Slide 1 -->
                                    <div class="swiper-slide">
                                        <div class="quote-card">
                                            <img src="{{asset('assets/landing/img/quotes.png')}}" class="card-quotes-img" alt="">
                                            <div class="d-flex justify-content-between align-items-center my-3">
                                                <h2 class="review-slide-title">Fantastic</h2>
                                                <div class="d-flex justify-content-start">
                                                    <i class="bx bxs-star" style="color: #ffa12c"></i>
                                                    <i class="bx bxs-star" style="color: #ffa12c"></i>
                                                    <i class="bx bxs-star" style="color: #ffa12c"></i>
                                                    <i class="bx bxs-star" style="color: #ffa12c"></i>
                                                    <i class="bx bxs-star" style="color: #ffa12c"></i>
                                                </div>
                                            </div>
                                            <div class="review-text">
                                                This is actually a complete EAP system with a very stunning look
                                                and VERY FAST SUPPORT
                                            </div>
                                            <div class="d-flex flex-column mt-4 justify-content-start review-user">
                                                <span><strong>@ Dawnysuccess</strong></span>
                                                <span>from codecanyon</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Slide 2 -->
                                    <div class="swiper-slide">
                                        <div class="quote-card">
                                            <img src="{{asset('assets/landing/img/quotes.png')}}" class="card-quotes-img" alt="">
                                            <div class="d-flex justify-content-between align-items-center my-3">
                                                <h2 class="review-slide-title">Fantastic</h2>
                                                <div class="d-flex justify-content-start">
                                                    <i class="bx bxs-star" style="color: #ffa12c"></i>
                                                    <i class="bx bxs-star" style="color: #ffa12c"></i>
                                                    <i class="bx bxs-star" style="color: #ffa12c"></i>
                                                    <i class="bx bxs-star" style="color: #ffa12c"></i>
                                                    <i class="bx bxs-star" style="color: #ffa12c"></i>
                                                </div>
                                            </div>
                                            <div class="review-text">
                                                Thanks for Great Customer Support and Good Quality Code.
                                            </div>
                                            <div class="d-flex flex-column mt-4 justify-content-start review-user">
                                                <span><strong>@ zamipl</strong></span>
                                                <span>from codecanyon</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Slide 3 -->
                                    <div class="swiper-slide">
                                        <div class="quote-card">
                                            <img src="{{asset('assets/landing/img/quotes.png')}}" class="card-quotes-img" alt="">
                                            <div class="d-flex justify-content-between align-items-center my-3">
                                                <h2 class="review-slide-title">Fantastic</h2>
                                                <div class="d-flex justify-content-start">
                                                    <i class="bx bxs-star" style="color: #ffa12c"></i>
                                                    <i class="bx bxs-star" style="color: #ffa12c"></i>
                                                    <i class="bx bxs-star" style="color: #ffa12c"></i>
                                                    <i class="bx bxs-star" style="color: #ffa12c"></i>
                                                    <i class="bx bxs-star" style="color: #ffa12c"></i>
                                                </div>
                                            </div>
                                            <div class="review-text">
                                                Excellent support and amazing EAP
                                            </div>
                                            <div class="d-flex flex-column mt-4 justify-content-start review-user">
                                                <span><strong>@ mrblue9876</strong></span>
                                                <span>from codecanyon</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Slide 4 -->
                                    <div class="swiper-slide">
                                        <div class="quote-card">
                                            <img src="{{asset('assets/landing/img/quotes.png')}}" class="card-quotes-img" alt="">
                                            <div class="d-flex justify-content-between align-items-center my-3">
                                                <h2 class="review-slide-title">Fantastic</h2>
                                                <div class="d-flex justify-content-start">
                                                    <i class="bx bxs-star" style="color: #ffa12c"></i>
                                                    <i class="bx bxs-star" style="color: #ffa12c"></i>
                                                    <i class="bx bxs-star" style="color: #ffa12c"></i>
                                                    <i class="bx bxs-star" style="color: #ffa12c"></i>
                                                    <i class="bx bxs-star" style="color: #ffa12c"></i>
                                                </div>
                                            </div>
                                            <div class="review-text">
                                                Support and Code 100%
                                            </div>
                                            <div class="d-flex flex-column mt-4 justify-content-start review-user">
                                                <span><strong>@ fatecmais 2</strong></span>
                                                <span>from codecanyon</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Slide 5 -->
                                    <div class="swiper-slide">
                                        <div class="quote-card">
                                            <img src="{{asset('assets/landing/img/quotes.png')}}" class="card-quotes-img" alt="">
                                            <div class="d-flex justify-content-between align-items-center my-3">
                                                <h2 class="review-slide-title">Fantastic</h2>
                                                <div class="d-flex justify-content-start">
                                                    <i class="bx bxs-star" style="color: #ffa12c"></i>
                                                    <i class="bx bxs-star" style="color: #ffa12c"></i>
                                                    <i class="bx bxs-star" style="color: #ffa12c"></i>
                                                    <i class="bx bxs-star" style="color: #ffa12c"></i>
                                                    <i class="bx bxs-star" style="color: #ffa12c"></i>
                                                </div>
                                            </div>
                                            <div class="review-text">
                                                Brilliant and well-thought CRM/PRM/HRM! A real value for money!…
                                            </div>
                                            <div class="d-flex flex-column mt-4 justify-content-start review-user">
                                                <span><strong>@ attunist</strong></span>
                                                <span>from codecanyon</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Add more slides as needed -->
                                </div>
                                <!-- Pagination -->
                                <div class="swiper-pagination"></div>
                                <!-- Navigation -->
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>

                        </div>

                    </div>
                    <div class="d-flex justify-content-center align-items-center my-5">
                        <a href="{{getLandingLink()}}" class="btn custom-header-btn text-uppercase py-3">Check Our Reviews</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Skills Section-->


    <!-- ======= What Our Customers Say About Our Solutions ======= -->
    <section id="services" class="services section-bg">

        <div class="container" data-aos="fade-up">
            <div class="col-md-12 my-5">
                <div class="featured-carousel owl-carousel">
                    <div class="item">
                        <div>
                            <h3 class="text-yellow">LOOKING FOR A SIDE HUSTLE?</h3>
                            <h2 class="text-white">OWN YOUR
                                <span class="text-yellow">SaaS</span>
                                AND SCALE
                                <br>
                                YOUR BUSINESS!</h2>
                            <h2 class="text-white">EAP<span class="text-yellow">Wellness </span>
                            </h2>
                            <p class="text-white fw-bold">
                                Buy Your Extended License Now, and Start Growing The Number of Your Paying Customers.
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 img flex-column d-flex justify-content-center align-items-start gap-3">
                                <a href="{{getLandingLink()}}" class="btn custom-header-btn rounded-5 fw-light text-uppercase py-3">
                                    <span class="fw-bold">Buy Regular License Now</span>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                         style="height: 18px;width: 18px;margin: 0;"
                                         fill="#000000" height="800px" width="800px" id="Capa_1"
                                         viewBox="0 0 483.1 483.1"
                                         xml:space="preserve">
                                            <g>
                                                <path d="M434.55,418.7l-27.8-313.3c-0.5-6.2-5.7-10.9-12-10.9h-58.6c-0.1-52.1-42.5-94.5-94.6-94.5s-94.5,42.4-94.6,94.5h-58.6  c-6.2,0-11.4,4.7-12,10.9l-27.8,313.3c0,0.4,0,0.7,0,1.1c0,34.9,32.1,63.3,71.5,63.3h243c39.4,0,71.5-28.4,71.5-63.3  C434.55,419.4,434.55,419.1,434.55,418.7z M241.55,24c38.9,0,70.5,31.6,70.6,70.5h-141.2C171.05,55.6,202.65,24,241.55,24z   M363.05,459h-243c-26,0-47.2-17.3-47.5-38.8l26.8-301.7h47.6v42.1c0,6.6,5.4,12,12,12s12-5.4,12-12v-42.1h141.2v42.1  c0,6.6,5.4,12,12,12s12-5.4,12-12v-42.1h47.6l26.8,301.8C410.25,441.7,389.05,459,363.05,459z"></path>
                                            </g>
                                    </svg>
                                </a>
                                <a href="{{getLandingLink()}}" class="btn custom-header-btn rounded-5 fw-light text-uppercase py-3">
                                    <span class="fw-bold">Buy Extended License Now</span>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                         style="height: 18px;width: 18px;margin: 0;"
                                         fill="#000000" height="800px" width="800px" id="Capa_1"
                                         viewBox="0 0 483.1 483.1"
                                         xml:space="preserve">
                                            <g>
                                                <path d="M434.55,418.7l-27.8-313.3c-0.5-6.2-5.7-10.9-12-10.9h-58.6c-0.1-52.1-42.5-94.5-94.6-94.5s-94.5,42.4-94.6,94.5h-58.6  c-6.2,0-11.4,4.7-12,10.9l-27.8,313.3c0,0.4,0,0.7,0,1.1c0,34.9,32.1,63.3,71.5,63.3h243c39.4,0,71.5-28.4,71.5-63.3  C434.55,419.4,434.55,419.1,434.55,418.7z M241.55,24c38.9,0,70.5,31.6,70.6,70.5h-141.2C171.05,55.6,202.65,24,241.55,24z   M363.05,459h-243c-26,0-47.2-17.3-47.5-38.8l26.8-301.7h47.6v42.1c0,6.6,5.4,12,12,12s12-5.4,12-12v-42.1h141.2v42.1  c0,6.6,5.4,12,12,12s12-5.4,12-12v-42.1h47.6l26.8,301.8C410.25,441.7,389.05,459,363.05,459z"></path>
                                            </g>
                                    </svg>
                                </a>
                            </div>
                            <div class="col-lg-7 d-flex flex-column justify-content-center gap-3 align-items-stretch  order-2 order-lg-1">
                                <div class="content">
                                    <h3 class="text-white">EAPWellness</h3>
                                    <p class="text-white">
                                        EAPWellness SaaS is the ultimate all-in-one tool. Whether you’re looking to
                                        streamline your own business processes or sell subscriptions to third
                                        parties, EAPWellness SaaS is the perfect solution for you.
                                    </p>
                                </div>
                                <div class="d-flex flex-column flex-sm-row justify-content-start align-items-center gap-2 fw-bold">
                                    <span class="text-white">Fully Verified Ratings</span>
                                    <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 m-0">
                                        <li><i class="bx bxs-star" style="color: #ffa12c"></i></li>
                                        <li><i class="bx bxs-star" style="color: #ffa12c"></i></li>
                                        <li><i class="bx bxs-star" style="color: #ffa12c"></i></li>
                                        <li><i class="bx bxs-star" style="color: #ffa12c"></i></li>
                                        <li><i class="bx bxs-star" style="color: #ffa12c"></i></li>
                                    </ul>
                                    <span class="text-white">Trusted by Hundreds of Happy Users.</span>
                                </div>
                                <div class="d-flex justify-content-start align-items-center gap-3 me-2 charged-for">
                                    <div class="italic-separator mt-5"></div>
                                    <div class="small text-white fst-italic">
                                        “Use, by you or one client, in a single end product which end users are
                                        <br> not charged for. The total price includes the item price and a buyer
                                        <br> fee.”
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="item">
                        <div>
                            <h3 class="text-yellow">STOP WASTING TIME AND MONEY ON MULTIPLE TOOLS</h3>
                            <h2 class="text-white">MANAGE ALL ASPECTS OF YOUR BUSINESS WITH ONE POWERFUL TOOL</h2>
                            <h2 class="text-white">EAP<span class="text-yellow">Wellness </span>
                            </h2>
                            <p class="text-white fw-bold">
                                Buy Your Regular License Now, Start Managing Your Team, and Grow Your Business.
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 img flex-column d-flex justify-content-center align-items-start gap-3">
                                <a href="{{getLandingLink()}}" class="btn custom-header-btn rounded-5 fw-light text-uppercase py-3">
                                    <span class="fw-bold">Buy Regular License Now</span>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                         style="height: 18px;width: 18px;margin: 0;"
                                         fill="#000000" height="800px" width="800px" id="Capa_1"
                                         viewBox="0 0 483.1 483.1"
                                         xml:space="preserve">
                                            <g>
                                                <path d="M434.55,418.7l-27.8-313.3c-0.5-6.2-5.7-10.9-12-10.9h-58.6c-0.1-52.1-42.5-94.5-94.6-94.5s-94.5,42.4-94.6,94.5h-58.6  c-6.2,0-11.4,4.7-12,10.9l-27.8,313.3c0,0.4,0,0.7,0,1.1c0,34.9,32.1,63.3,71.5,63.3h243c39.4,0,71.5-28.4,71.5-63.3  C434.55,419.4,434.55,419.1,434.55,418.7z M241.55,24c38.9,0,70.5,31.6,70.6,70.5h-141.2C171.05,55.6,202.65,24,241.55,24z   M363.05,459h-243c-26,0-47.2-17.3-47.5-38.8l26.8-301.7h47.6v42.1c0,6.6,5.4,12,12,12s12-5.4,12-12v-42.1h141.2v42.1  c0,6.6,5.4,12,12,12s12-5.4,12-12v-42.1h47.6l26.8,301.8C410.25,441.7,389.05,459,363.05,459z"></path>
                                            </g>
                                    </svg>
                                </a>
                                <a href="{{getLandingLink()}}" class="btn custom-header-btn rounded-5 fw-light text-uppercase py-3">
                                    <span class="fw-bold">Buy Extended License Now</span>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                         style="height: 18px;width: 18px;margin: 0;"
                                         fill="#000000" height="800px" width="800px" id="Capa_1"
                                         viewBox="0 0 483.1 483.1"
                                         xml:space="preserve">
                                            <g>
                                                <path d="M434.55,418.7l-27.8-313.3c-0.5-6.2-5.7-10.9-12-10.9h-58.6c-0.1-52.1-42.5-94.5-94.6-94.5s-94.5,42.4-94.6,94.5h-58.6  c-6.2,0-11.4,4.7-12,10.9l-27.8,313.3c0,0.4,0,0.7,0,1.1c0,34.9,32.1,63.3,71.5,63.3h243c39.4,0,71.5-28.4,71.5-63.3  C434.55,419.4,434.55,419.1,434.55,418.7z M241.55,24c38.9,0,70.5,31.6,70.6,70.5h-141.2C171.05,55.6,202.65,24,241.55,24z   M363.05,459h-243c-26,0-47.2-17.3-47.5-38.8l26.8-301.7h47.6v42.1c0,6.6,5.4,12,12,12s12-5.4,12-12v-42.1h141.2v42.1  c0,6.6,5.4,12,12,12s12-5.4,12-12v-42.1h47.6l26.8,301.8C410.25,441.7,389.05,459,363.05,459z"></path>
                                            </g>
                                    </svg>
                                </a>
                            </div>
                            <div class="col-lg-7 d-flex flex-column justify-content-center gap-3 align-items-stretch  order-2 order-lg-1">
                                <div class="content">
                                    <h3 class="text-white">EAPWellness</h3>
                                    <p class="text-white">
                                        EAPWellness SaaS is the ultimate all-in-one tool. Whether you’re looking to
                                        streamline your own business processes or sell subscriptions to third
                                        parties, EAPWellness SaaS is the perfect solution for you.
                                    </p>
                                </div>
                                <div class="d-flex flex-column flex-sm-row justify-content-start align-items-center gap-2 fw-bold">
                                    <span class="text-white">Fully Verified Ratings</span>
                                    <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 m-0">
                                        <li><i class="bx bxs-star" style="color: #ffa12c"></i></li>
                                        <li><i class="bx bxs-star" style="color: #ffa12c"></i></li>
                                        <li><i class="bx bxs-star" style="color: #ffa12c"></i></li>
                                        <li><i class="bx bxs-star" style="color: #ffa12c"></i></li>
                                        <li><i class="bx bxs-star" style="color: #ffa12c"></i></li>
                                    </ul>
                                    <span class="text-white">Trusted by Hundreds of Happy Users.</span>
                                </div>
                                <div class="d-flex justify-content-start align-items-center gap-3 me-2 charged-for">
                                    <div class="italic-separator mt-5"></div>
                                    <div class="small text-white fst-italic">
                                        “Use, by you or one client, in a single end product which end users are
                                        <br> not charged for. The total price includes the item price and a buyer
                                        <br> fee.”
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ======= MANAGE & ORGANIZE YOUR ENTEAPRISE USING THE #1 END-TO-END CONSOLIDATED SYSTEM ======= -->
    <section id="portfolio" class="portfolio" style="background-color: #F6F7F9">
        <div class="container" data-aos="fade-up">

            <div class="text-center my-4">
                <h1>MANAGE &amp; ORGANIZE
                    YOUR ENTEAPRISE USING
                    <br>
                    <span style="color:#FFA12C">THE #1 </span>
                    END-TO-END
                    <span style="color:#FFA12C">CONSOLIDATED SYSTEM</span>
                </h1>
            </div>

            <div class="row my-5 mx-3">
                <div class="col-lg-5 d-flex flex-column justify-content-center align-items-start gap-4">
                    <h1>
                        <span style="color:#FFA12C">EAPWellness</span>
                        All-In-One Business System
                    </h1>
                    <p>
                        Always looking for better ways to do things, innovate and help people achieve their goals.
                        EAPWellness covers the full spectrum of managing Human Resources, Accounting systems, Leads
                        Management, Sales, Invoicing, Customer Support, and much more
                    </p>
                    <div class="d-flex justify-content-start align-items-center my-5">
                        <a href="{{getLandingLink()}}" class="btn custom-header-btn rounded-5 fw-light text-uppercase py-3">View Demo For
                            Free</a>
                    </div>
                </div>
                <div class="col-lg-7 d-flex flex-column gap-4">
                    <div class="d-flex align-items-start">
                        <div class="card col-md-10 px-3"
                             style="border: none; background-color: transparent;background-image: linear-gradient(90deg, #FE612C 15%, #FFA12C 100%);">
                            <img src="{{asset('assets/landing/img/image-removebg-preview-3.png')}}" class="card-left-img" alt="">
                            <div class="card-body py-4 px-5">

                                <h5 class="mb-3">
                                    More than<span style="color:#fff"> 250 Customization
                                        requests </span> by the trusted customers around the
                                    global.
                                </h5>
                                <p class="text-white small">
                                    EAPWellness has the most flexible system and features to be customized based on your
                                    exact business needs. Our creative and experienced developers are ready to make all
                                    the changes that you need for your business. EAPWellness customization options have
                                    made business owners’ lives easier, from every detail in the functionalities and the
                                    system design.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end align-items-end">
                        <div class="card col-md-10 px-3"
                             style="border: none; background-color: #ffa12c;">
                            <img src="{{asset('assets/landing/img/image-removebg-preview-4.png')}}" class="card-left-img" alt="">
                            <div class="card-body py-4 px-5">
                                <h5 class="mb-3">
                                    Trusted by more than <span style="color:#fff">500 customers</span> who purchased
                                    <span style="color:#fff">EAPWellness</span>
                                    for their companies around the globe.
                                </h5>
                                <p class="small">
                                    EAPWellness has the most comprehensive dashboard with all the essential details
                                    under one system. EAPWellness Dashboards have made business owners’ lives easier,
                                    from every detail like total Clients, Users, Invoices, Projects, and estimations to
                                    Leads, Deals, and items, where you can get quantitative data in the most simple
                                    layout.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <!-- ======= Accounting and Billing Management ======= -->
    <section id="team" class="team">
        <div class="container" data-aos="fade-up">

            <div class="text-center my-5">
                <h1>Accounting and Billing Management</h1>
            </div>

            <div class="row content mt-5">
                <div class="col-lg-4 mb-5">
                    <div class="card" style="min-height: 350px">
                        <img src="{{asset('assets/landing/img/image-removebg-preview.png')}}" class="card-top-img" alt="">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center gap-3 mt-3">
                            <h5>Stay compliant and report your finances accurately</h5>
                            <p class="text-center">
                                EAPWellness enables you to stay compliant and report your finances accurately, including
                                Chart of Accounts, Journal Entry, Balance Sheet, and General Ledger.
                            </p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 mb-5">
                    <div class="card" style="min-height: 350px">
                        <img src="{{asset('assets/landing/img/image-removebg-preview-1.png')}}" class="card-top-img" alt="">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center gap-3 mt-3">
                            <h5>Choose the right sales tax automation software</h5>
                            <p class="text-center">
                                Automate tax calculation by creating different tax rates and easily manage your
                                inventory by adding products and categorizing them, assigning SKUs, and set sales and
                                purchase prices.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 pt-4 pt-lg-0">
                    <div class="card" style="min-height: 350px">
                        <img src="{{asset('assets/landing/img/image-removebg-preview-2.png')}}" class="card-top-img" alt="">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center gap-3 mt-3">
                            <h5>Transform your business into a sales machine</h5>
                            <p class="text-center">
                                Use the multi-user accounting tool to assign roles and permissions to each staff member.
                                Manage staff permissions and take control over access.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ======= GET ALL THE CRITICAL TOOLS TO MANAGE BUSINESS FINANCES ======= -->
    <section id="pricing" class="pricing section-bg">
        <div class="container" data-aos="fade-up">
            <h2 style="color: #ffa12c">
                GET ALL THE CRITICAL TOOLS TO <span class="text-white">MANAGE BUSINESS FINANCES</span>
            </h2>
            <div class="col-md-12 my-5">
                <div class="featured-carousel owl-carousel">
                    <div class="item">
                        <div class="d-flex flex-column flex-sm-row justify-content-center align-items-center gap-5 p-5">
                            <div class="w-100">
                                <img src="{{asset('assets/landing/img/Laptop-4.png')}}" style="max-width: 100%" alt="">
                            </div>
                            <div class="vertical-separator-orange"></div>
                            <div class="w-100">
                                <h3 class="text-yellow fst-italic">Automate Your Accounting And Billing:</h3>
                                <ul class="text-white small" style="padding-left: 20px; margin: 0 !important;">
                                    <li>Get your product inventory updated automatically any time you generate an
                                        invoice/bill.
                                    </li>
                                    <li>Set financial goals and get them automatically tracked based on the financial
                                        activities you record.
                                    </li>
                                    <li>Automate tax calculation by creating different tax rates and adding taxation
                                        information to products in your inventory.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="d-flex flex-column flex-sm-row justify-content-center align-items-center gap-5 p-5">
                            <div class="w-100">
                                <img src="{{asset('assets/landing/img/Laptop-4.png')}}" style="max-width: 100%" alt="">
                            </div>
                            <div class="vertical-separator-orange"></div>
                            <div class="w-100">
                                <h3 class="text-yellow fst-italic">Make Smart, Informed Decisions:</h3>
                                <ul class="text-white" style="padding: 0 20px;margin:0 !important">
                                    <li>Easily create multiple financial reports including income, expense, tax,and
                                        transaction summaries.
                                    </li>
                                    <li>Enjoy instant access to your current financial situation data. Get more control
                                        over your money and see where it’s going.
                                    </li>
                                    <li>Create monthly, quarterly, or yearly budgets. Get more control over your
                                        finances and improve your asset management.
                                    </li>
                                    <li>Set annual or periodic financial goals and then use dashboards to track your
                                        financial performance against them.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="d-flex flex-column flex-sm-row justify-content-center align-items-center gap-5 p-5">
                            <div class="w-100">
                                <img src="{{asset('assets/landing/img/Laptop-4.png')}}" style="max-width: 100%" alt="">
                            </div>
                            <div class="vertical-separator-orange"></div>
                            <div class="w-100">
                                <h3 class="text-yellow fst-italic">Take Your Project From Proposal To A Payment:</h3>
                                <ul class="text-white" style="padding: 0 20px; margin: 0 !important;">
                                    <li>Create proposal templates for different services and pitch your future
                                        clients in seconds.
                                    </li>
                                    <li>Turn your accepted proposals into payable invoices in one click.</li>
                                    <li>Add different products and services right inside EAPGo and easily generate
                                        invoices using one of the elegant, editable templates.
                                    </li>
                                    <li>Send reminders and accept payments using leading payment methods such as Stripe
                                        and PayPal.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="d-flex flex-column flex-sm-row justify-content-center align-items-center gap-5 p-5">
                            <div class="w-100">
                                <img src="{{asset('assets/landing/img/Laptop-4.png')}}" style="max-width: 100%" alt="">
                            </div>
                            <div class="vertical-separator"></div>
                            <div class="w-100">
                                <h3 class="text-yellow fst-italic">Get All The Critical Tools To Manage Business
                                    Finances:</h3>
                                <ul class="text-white" style="padding: 0 20px; margin: 0 !important;">
                                    <li>Get everything you need to stay compliant and report your finances
                                        accurately,including Chart of Accounts, Journal Entry, Balance Sheet, Trial
                                        Balance, and General Ledger.
                                    </li>
                                    <li>Add team members or invite vendors and cooperate with others on growing your
                                        business and managing your finances.
                                    </li>
                                    <li>Easily manage your inventory. Add products, categorize them, assign SKUs, and
                                        set sales and purchase prices.
                                    </li>
                                    <li>Control invoices and send payment reminders. Add bank accounts and record
                                        payments, transfers and expenses.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= Manage Leads & Deals ======= -->
    <section id="team" class="team">
        <div class="container" data-aos="fade-up">

            <div class="text-center my-5">
                <h1>Manage HR - Business Greatest Assets</h1>
            </div>

            <div class="row content mt-5">
                <div class="col-lg-4 mb-5">
                    <div class="card" style="min-height: 350px">
                        <img src="{{asset('assets/landing/img/image-removebg-preview.png')}}" class="card-top-img" alt="">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center gap-3 mt-3">
                            <h5>Manage all employee matters with EAPWellness</h5>
                            <p class="text-center">
                                Whether you employ 5, 50, or 500 people, with EAPWellness, you can manage all employee
                                matters. From hiring to performance and salaries – everything is under one roof.
                            </p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 mb-5">
                    <div class="card" style="min-height: 350px">
                        <img src="{{asset('assets/landing/img/image-removebg-preview-1.png')}}" class="card-top-img" alt="">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center gap-3 mt-3">
                            <h5>Customize your easy-to-use HRM system</h5>
                            <p class="text-center">
                                Customizable, versatile, and easy-to-use complete HRM system. You can also manage the
                                Attendance, Bulk Attendance, Holidays, Leaves, Meetings, Assets, Documents, and Company
                                Policies. Create, Edit and Filter as per your convenience.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 pt-4 pt-lg-0">
                    <div class="card" style="min-height: 350px">
                        <img src="{{asset('assets/landing/img/image-removebg-preview-2.png')}}" class="card-top-img" alt="">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center gap-3 mt-3">
                            <h5>Get A Detailed Understanding Of Each Aspect Of The Employee</h5>
                            <p class="text-center">
                                Get a calendar view for every deal detail. In short, managing deals has never been
                                easier with the EAPWellness 360 degrees of deals visibility in the system.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ======= HANDLE ALL FACETS OF YOUR HR MANAGE BUSINESS FINANCES ======= -->
    <section id="faq" class="faq"
             style="background-color: transparent;background-image: linear-gradient(90deg, #fe612c 5%, #ffa12c 33%);">
        <div class="container" data-aos="fade-up">
            <h1 class="header-text">
                HANDLE ALL FACETS OF YOUR HR <span style="color:#fff">MANAGE BUSINESS FINANCES</span>
            </h1>
            <div class="col-md-12 my-5">
                <div class="featured-carousel owl-carousel">
                    <div class="item">
                        <div class="d-flex flex-column flex-sm-row justify-content-center align-items-center gap-5 p-5">
                            <div class="w-100">
                                <img src="{{asset('assets/landing/img/Laptop-2-3.png')}}" style="max-width: 100%" alt="">
                            </div>
                            <div class="vertical-separator"></div>
                            <div class="w-100">
                                <h3 class="header-text fst-italic">Manage Key Employee Matters Easily:</h3>
                                <ul style="padding: 0 20px; margin: 0 !important;">
                                    <li>Create a profile for every employee and track their key information,including
                                        position, salary, and career progress. Update and change theirinformation in
                                        just a few clicks.
                                    </li>
                                    <li>Track employee contract status. Transfer them to different departments,and
                                        branches, or terminate the contract if needed.
                                    </li>
                                    <li>Collect and analyze feedback about their work, including warnings and complaints
                                        issued by their managers or other employees.
                                    </li>
                                    <li>Keep an eye on employee availability. Track their trips, holidays, and sick
                                        leaves and help managers reschedule or reassign their work.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="d-flex flex-column flex-sm-row justify-content-center align-items-center gap-5 p-5">
                            <div class="w-100">
                                <img src="{{asset('assets/landing/img/Laptop-2-3.png')}}" style="max-width: 100%" alt="">
                            </div>
                            <div class="vertical-separator"></div>
                            <div class="w-100">
                                <h3 class="header-text fst-italic">Recruit New Candidates and Grow Your Team:</h3>
                                <ul style="padding: 0 20px; margin: 0 !important;">
                                    <li>Speed up your hiring process. Use built-in hiring features to create and manage
                                        new job openings and fill your open positions faster.
                                    </li>
                                    <li>Collect and manage applications from start to finish. Easily compare candidates
                                        and pick the best one for the job.
                                    </li>
                                    <li>Create a candidate pipeline. Get a clear view of all the potential candidates
                                        and the recruitment stages they’re in.
                                    </li>
                                    <li>Schedule interviews, create interview questions, and assign interviewers in just
                                        a few clicks.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="d-flex flex-column flex-sm-row justify-content-center align-items-center gap-5 p-5">
                            <div class="w-100">
                                <img src="{{asset('assets/landing/img/Laptop-2-3.png')}}" style="max-width: 100%" alt="">
                            </div>
                            <div class="vertical-separator"></div>
                            <div class="w-100">
                                <h3 class="header-text fst-italic">Help Your Employees Become More Productive:</h3>
                                <ul style="padding: 0 20px; margin: 0 !important;">
                                    <li>Empower employee growth. Schedule skills training, track expenses and watch your
                                        employees become better at their work.
                                    </li>
                                    <li>Boost employee productivity with custom KPIs. Track employee performance, share
                                        feedback and help them reach company targets.
                                    </li>
                                    <li>Set individual goals for your employees. Every employee has a unique role to
                                        fill – goals give them direction and focus.
                                    </li>
                                    <li>Set benchmarks and grade your employee performance. Find top performers and
                                        reward them for their hard work and improvement.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="d-flex flex-column flex-sm-row justify-content-center align-items-center gap-5 p-5">
                            <div>
                                <img src="{{asset('assets/landing/img/Laptop-2-3.png')}}" style="max-width: 100%" alt="">
                            </div>
                            <div class="vertical-separator"></div>
                            <div class="w-100">
                                <h3 class="header-text fst-italic">Help Your Employees Become More Productive:</h3>
                                <ul style="padding: 0 20px; margin: 0 !important;">
                                    <li>Empower employee growth. Schedule skills training, track expenses and watch your
                                        employees become better at their work.
                                    </li>
                                    <li>Boost employee productivity with custom KPIs. Track employee performance, share
                                        feedback and help them reach company targets.
                                    </li>
                                    <li>Set individual goals for your employees. Every employee has a unique role to
                                        fill – goals give them direction and focus.
                                    </li>
                                    <li>Set benchmarks and grade your employee performance. Find top performers and
                                        reward them for their hard work and improvement.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="d-flex flex-column flex-sm-row justify-content-center align-items-center gap-5 p-5">
                            <div class="w-100">
                                <img src="{{asset('assets/landing/img/Laptop-5.png')}}" style="max-width: 100%" alt="">
                            </div>
                            <div class="vertical-separator"></div>
                            <div class="w-100">
                                <h3 class="header-text fst-italic">
                                    Accounting and Billing
                                    Management</h3>
                                <p class="fw-light fs-5">

                                    Get all the tools to control your
                                    business accounting and inventory in
                                    one place. Use convenient dashboards
                                    to set financial goals, invoice
                                    clients, manage taxation, and see
                                    where your money is going.

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="d-flex flex-column flex-sm-row justify-content-center align-items-center gap-5 p-5">
                            <div class="w-100">
                                <img src="{{asset('assets/landing/img/Laptop-5.png')}}" style="max-width: 100%" alt="">
                            </div>
                            <div class="vertical-separator"></div>
                            <div class="w-100">
                                <h3 class="header-text fst-italic">
                                    Manage HR - Business Greatest
                                    Assets</h3>
                                <p class="fw-light fs-5">

                                    Gain easy access to the personal
                                    details of your staff. Edit staff
                                    information, assign roles, and gain
                                    control over access. Handle all
                                    facets of your HR – from attendance
                                    records to salary payments – all
                                    without lifting a finger.

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="d-flex flex-column flex-sm-row justify-content-center align-items-center gap-5 p-5">
                            <div class="w-100">
                                <img src="{{asset('assets/landing/img/Laptop-5.png')}}" style="max-width: 100%" alt="">
                            </div>
                            <div class="vertical-separator"></div>
                            <div class="w-100">
                                <h3 class="header-text fst-italic">
                                    Manage Leads & Deals</h3>
                                <p class="fw-light fs-5">

                                    Easily keep in touch with clients
                                    and users. Streamline the contract
                                    process for a more efficient
                                    business. Generate new estimates
                                    quickly and easily. Crush deadlines
                                    by managing estimates – all in one
                                    place, in a matter of minutes.

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ======= Manage Leads & Deals ======= -->
    <section id="team" class="team">
        <div class="container" data-aos="fade-up">

            <div class="text-center my-5">
                <h1>Manage Leads & Deals</h1>
            </div>

            <div class="row content mt-5">
                <div class="col-lg-4 mb-5">
                    <div class="card" style="min-height: 350px">
                        <img src="{{asset('assets/landing/img/image-removebg-preview.png')}}" class="card-top-img" alt="">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center gap-3 mt-3">
                            <h5>Assign Projects, Manage Leads, and Sign Deals</h5>
                            <p class="text-center">
                                Assign projects, deal with accounting, and collaborate with your team. Manage leads,
                                turn them into clients, and close deals. Get an overview of deals in a week, month, and
                                deals in the last 30 days.
                            </p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 mb-5">
                    <div class="card" style="min-height: 350px">
                        <img src="{{asset('assets/landing/img/image-removebg-preview-1.png')}}" class="card-top-img" alt="">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center gap-3 mt-3">
                            <h5>Manage Every Aspects of Your Business</h5>
                            <p class="text-center">
                                Assign Tasks, Products, Files, and team members for each deal, manage discussions and
                                notes, where you can manage every aspect of your business using one convenient
                                dashboard.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 pt-4 pt-lg-0">
                    <div class="card" style="min-height: 350px">
                        <img src="{{asset('assets/landing/img/image-removebg-preview-2.png')}}" class="card-top-img" alt="">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center gap-3 mt-3">
                            <h5>360 Degrees of Deals Visibility in the System.</h5>
                            <p class="text-center">
                                Get a calendar view for every deal detail. In short, managing deals has never been
                                easier with the EAPWELLNESS 360 degrees of deals visibility in the system.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ======= MAXIMIZE YOUR RESOURCES ======= -->
    <section id="faq" class="faq section-bg">
        <div class="container" data-aos="fade-up">
            <h2 style="color: #ffa12c">
                MAXIMIZE YOUR RESOURCES, CONNECT WITH YOUR CUSTOMERS, AND BE MORE PRODUCTIVE
                OUR SERVICES, <span class="text-white">AND BE MORE PRODUCTIVE</span>
            </h2>
            <div class="col-md-12 my-5">
                <div class="featured-carousel owl-carousel">
                    <div class="item">
                        <div class="d-flex flex-column flex-sm-row justify-content-center align-items-center gap-5 p-5">
                            <div class="w-100">
                                <img src="{{asset('assets/landing/img/Laptop-4.png')}}" style="max-width: 100%" alt="">
                            </div>
                            <div class="vertical-separator-orange"></div>
                            <div class="w-100">
                                <h3 class="text-yellow fst-italic">Achieve More in Less Time:</h3>
                                <ul class="text-white small" style="padding: 0 20px; margin: 0 !important;">
                                    <li>Create projects and assign them to your team members. Split them into more
                                        manageable tasks to help your team become more productive.
                                    </li>
                                    <li>Set KPIs and track employee performance. Track their warnings,complaints, and
                                        awards. Manage all key employee information including leaves, holidays, or
                                        training schedules.
                                    </li>
                                    <li>Track time spent doing work and view timesheet to see how well your team members
                                        are dealing with the tasks assigned.
                                    </li>
                                    <li>Invite your team members to discuss individual tasks right in the dashboard or
                                        communicate with them via built-in messenger in real-time.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="d-flex flex-column flex-sm-row justify-content-center align-items-center gap-5 p-5">
                            <div class="w-100">
                                <img src="{{asset('assets/landing/img/Laptop-4.png')}}" style="max-width: 100%" alt="">
                            </div>
                            <div class="vertical-separator-orange"></div>
                            <div class="w-100">
                                <h3 class="text-yellow fst-italic">Set Budgets and Control Your Business Finances:</h3>
                                <ul class="text-white" style="padding: 0 20px;margin:0 !important">
                                    <li>Use key accounting features like Chart of Accounts, Journal Entry,Balance Sheet,
                                        Trial Balance, and General Ledger to track your revenue and expenses accurately.
                                    </li>
                                    <li>Set future financial goals and track your progress. Work on exceeding your
                                        goals, improve your business processes, and boost your income.
                                    </li>
                                    <li>Create budgets to better understand where your money is going and get more
                                        control over your income and expenses.
                                    </li>
                                    <li>Generate invoices, manage taxation and add different payment methods to collect
                                        payments easily.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="d-flex flex-column flex-sm-row justify-content-center align-items-center gap-5 p-5">
                            <div class="w-100">
                                <img src="{{asset('assets/landing/img/Laptop-4.png')}}" style="max-width: 100%" alt="">
                            </div>
                            <div class="vertical-separator-orange"></div>
                            <div class="w-100">
                                <h3 class="text-yellow fst-italic">Invoice Your Clients and Manage Your Leads:</h3>
                                <ul class="text-white" style="padding: 0 20px; margin: 0 !important;">
                                    <li>Add contracts for each client that you onboard to keep track of all work on your
                                        plate and never miss a deadline.
                                    </li>
                                    <li>Use a built-in form builder to create opt-ins and get your leads’ data added
                                        right inside EAPWELLNESS.
                                    </li>
                                    <li>Create a sales pipeline to track your progress with each lead and turn more of
                                        them into clients.
                                    </li>
                                    <li>Never miss a single piece of feedback. Invite clients to communicate with you
                                        and discuss your projects right inside the tool.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="d-flex flex-column flex-sm-row justify-content-center align-items-center gap-5 p-5">
                            <div class="w-100">
                                <img src="{{asset('assets/landing/img/Laptop-4.png')}}" style="max-width: 100%" alt="">
                            </div>
                            <div class="vertical-separator"></div>
                            <div class="w-100">
                                <h3 class="text-yellow fst-italic">Get a Bird’s Eye View of Your Business:</h3>
                                <ul class="text-white" style="padding: 0 20px; margin: 0 !important;">
                                    <li>Make faster and smarter decisions. Use a clear dashboard to get all the critical
                                        data about your company right after you log in.
                                    </li>
                                    <li>Save massive amounts of time and navigate between different parts of your
                                        business – from Project Management to HR – in just a few clicks.
                                    </li>
                                    <li>Generate reports on all the key areas of your company – from staff productivity
                                        to company income or per client revenue.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ======= MANAGING YOUR BUSINESS EFFECTIVELY ======= -->
    <section id="faq" class="faq">
        <div class="container" data-aos="fade-up">
            <div class="col-md-12 my-5">
                <div class="featured-carousel owl-carousel">
                    <!--First Slide-->
                    <div class="item w-100">
                        <div class="all-divs">
                            <div class="card" style="border-color: #ffa12c">
                                <div class="card-body">
                                    <h2 class="custom-card-header">Staff<br>Management</h2>
                                    <div class="card-body-text">
                                        Keep track of employee information easily and conveniently. Search for staff
                                        through simple filter options, and edit and manage their information as you
                                        please.
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="border-color: #6fd943">
                                <div class="card-body">
                                    <h2 class="custom-card-header">Reports<br>Management</h2>
                                    <div class="card-body-text">
                                        Get detailed, real-time reports to help you keep track of your business
                                        performance. Use graphs and other visuals to make data easy to understand and
                                        act on.
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="border-color: #002332">
                                <div class="card-body">
                                    <h2 class="custom-card-header">Estimates<br>Management</h2>
                                    <div class="card-body-text">
                                        Generate new estimates for your projects quickly and easily. Manage estimates
                                        with ease by assigning clients, status, and expiry dates to each estimate.
                                    </div>
                                </div>
                            </div>

                            <div class="card" style="border-color: #ffa12c">
                                <div class="card-body">
                                    <h2 class="custom-card-header">HR<br>Management</h2>
                                    <div class="card-body-text">
                                        Manage all aspects of your HR with a simple interface. Get instant access to key
                                        information about each employee - from attendance history to training and
                                        performance.
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="border-color: #6fd943">
                                <div class="card-body">
                                    <h2 class="custom-card-header">Goals and<br>Notes</h2>
                                    <div class="card-body-text">
                                        Got goals in mind? Just set them up and the system will automatically track your
                                        progress, so you can just sit back and enjoy the ride.
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="border-color: #002332">
                                <div class="card-body">
                                    <h2 class="custom-card-header">Contract<br>Module</h2>
                                    <div class="card-body-text">
                                        Create legally binding contracts in seconds and keep all your contracts
                                        organized in one place. Also get real-time updates on the status of your
                                        contracts, and automatically record contract changes.
                                    </div>
                                </div>
                            </div>

                            <div class="card" style="border-color: #ffa12c">
                                <div class="card-body">
                                    <h2 class="custom-card-header">Assigning<br>Roles</h2>
                                    <div class="card-body-text">
                                        Use the multi-user accounting tool to assign roles and permissions to each staff
                                        member. Manage staff permissions and take control over access.
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="border-color: #6fd943">
                                <div class="card-body">
                                    <h2 class="custom-card-header">Events and<br>Notice Board</h2>
                                    <div class="card-body-text">
                                        prepared for events. Create event reminders, add descriptions to them, and
                                        assign employees to each of them. You can also issue notices to users, clients,
                                        or employees.
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="border-color: #002332">
                                <div class="card-body">
                                    <h2 class="custom-card-header">Chat<br>Module</h2>
                                    <div class="card-body-text">
                                        Connect directly with your users and clients with a convenient chat module. This
                                        enables you to increase customer satisfaction, improve response time, and land
                                        more sales.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Second Slide-->
                    <div class="item w-100">
                        <div class="all-divs">
                            <div class="card" style="border-color: #ffa12c">
                                <div class="card-body">
                                    <h2 class="custom-card-header">Payroll<br>Management </h2>
                                    <div class="card-body-text">
                                        Streamline your payroll tasks. Keep your employees happy with accurate and
                                        timely payslips. Generate bulk payments quickly and easily.
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="border-color: #ffa12c">
                                <div class="card-body">
                                    <h2 class="custom-card-header">Indicator<br>Appraisal </h2>
                                    <div class="card-body-text">
                                        Get a clear overview of the performance of your departments. Identify areas of
                                        improvement in real-time, and streamline processes for better performance.
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="border-color: #ffa12c">
                                <div class="card-body">
                                    <h2 class="custom-card-header">Budget<br>Planner </h2>
                                    <div class="card-body-text">
                                        Stay in control of your finances! Set your budget and get real-time updates on
                                        how well you're sticking to it. Edit and update the budget as often as needed.
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="border-color: #ffa12c">
                                <div class="card-body">
                                    <h2 class="custom-card-header">Projects<br>Management </h2>
                                    <div class="card-body-text">
                                        Get an overview of your project status, budget, and due date. Assign and manage
                                        priority tasks with a kanban board, and get work done on time and on budget.
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="border-color: #ffa12c">
                                <div class="card-body">
                                    <h2 class="custom-card-header">Leads<br>Management </h2>
                                    <div class="card-body-text">
                                        Get real-time updates on leads generated through your marketing campaigns. View
                                        leads in Kanban or List view. Assign pipelines and stages for better lead
                                        management
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="border-color: #ffa12c">
                                <div class="card-body">
                                    <h2 class="custom-card-header">Form<br>Builder </h2>
                                    <div class="card-body-text">
                                        Reduce time spent on form creation and streamline your business processes with
                                        easy-to-use, customizable forms. Easily create and manage various form fields as
                                        per your business needs.
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="border-color: #ffa12c">
                                <div class="card-body">
                                    <h2 class="custom-card-header">Tasks<br>Management </h2>
                                    <div class="card-body-text">
                                        Filter tasks by priority, due date, and type. Add a checklist to track your
                                        progress, and take control of your projects!
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="border-color: #ffa12c">
                                <div class="card-body">
                                    <h2 class="custom-card-header">Deal<br>Management </h2>
                                    <div class="card-body-text">
                                        Get a complete overview of all your deals in seconds. Assign tasks, products,
                                        and users to each deal for better organization
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="border-color: #ffa12c">
                                <div class="card-body">
                                    <h2 class="custom-card-header">Customer<br>Statement Report </h2>
                                    <div class="card-body-text">
                                        Eliminate the hassle of tracking customer statements manually. Get an
                                        at-a-glance report of all orders, payments, and transactions with a customer or
                                        vendor.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Third Slide-->
                    <div class="item w-100">
                        <div class="all-divs">
                            <div class="card" style="border-color: #ffa12c">
                                <div class="card-body">
                                    <h2 class="custom-card-header">Project<br>Timesheet</h2>
                                    <div class="card-body-text">
                                        Create a timesheet to stay on top of deadlines. Keep track of the time spent on
                                        each project, and get an overview of how much time is left.
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="border-color: #6fd943">
                                <div class="card-body">
                                    <h2 class="custom-card-header">Projects<br>Tracking</h2>
                                    <div class="card-body-text">
                                        Use the project tracker application to track the time spent on each
                                        project/task. The app takes screenshots as proof of how much time you spent on a
                                        particular project/task.
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="border-color: #002332">
                                <div class="card-body">
                                    <h2 class="custom-card-header">Goal<br>Tracking</h2>
                                    <div class="card-body-text">
                                        Set your goals and keep track of your journey. Manually edit or update your
                                        progress as you go – Stay in control and achieve your goals quickly and easily!
                                    </div>
                                </div>
                            </div>

                            <div class="card" style="border-color: #ffa12c">
                                <div class="card-body">
                                    <h2 class="custom-card-header">Sales<br>Management</h2>
                                    <div class="card-body-text">
                                        Keep your sales process organized. Easily edit and manage invoices, payments,
                                        expenses, and credit notes.
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="border-color: #6fd943">
                                <div class="card-body">
                                    <h2 class="custom-card-header">Inventory<br>Management</h2>
                                    <div class="card-body-text">
                                        Effortlessly keep track of your inventory. Monitor your stock levels in real
                                        time, get notified when inventory levels are low, and make changes when
                                        necessary.
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="border-color: #002332">
                                <div class="card-body">
                                    <h2 class="custom-card-header">Item<br>Management</h2>
                                    <div class="card-body-text">
                                        Keep an eye on all your items. Add items and assign them categories, sales
                                        prices, purchases, taxes, units, and product types. You’ll be able to stay
                                        organized for years!
                                    </div>
                                </div>
                            </div>

                            <div class="card" style="border-color: #ffa12c">
                                <div class="card-body">
                                    <h2 class="custom-card-header">Stack<br>Integration</h2>
                                    <div class="card-body-text">
                                        Get real-time notifications of company activities in your Slack channels.
                                        Schedule messages for the future and receive alerts on important updates – all
                                        from one easy to use interface!
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="border-color: #6fd943">
                                <div class="card-body">
                                    <h2 class="custom-card-header">Zoom<br>Integration</h2>
                                    <div class="card-body-text">
                                        Eliminate the need to use multiple platforms for virtual meetings. Easily
                                        schedule Zoom meetings and sync meeting details and attendees with your calendar
                                        – For a smooth conferencing experience.
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="border-color: #002332">
                                <div class="card-body">
                                    <h2 class="custom-card-header">Telegram<br>Integration</h2>
                                    <div class="card-body-text">
                                        Never miss important notifications again! Get project notifications sent
                                        directly to your Telegram application in real-time. Collaborate better with team
                                        members, and stay up-to-date with your projects.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ======= OUR SERVICES ======= -->
    <section id="faq" class="faq"
             style="background-color: transparent;background-image: linear-gradient(90deg, #fe612c 5%, #ffa12c 33%);">
        <div class="container" data-aos="fade-up">
            <h1 class="header-text">
                OUR SERVICES <span style="color:#fff">MENTAL HEALTH SERVICES</span>
            </h1>
            <div class="col-md-12 my-5">
                <div class="featured-carousel owl-carousel">
                    <div class="item">
                        <div class="d-flex flex-column flex-sm-row justify-content-center align-items-center gap-5 p-5">
                            <div class="w-100">
                                <img src="{{asset('assets/landing/img/Laptop-5.png')}}" style="max-width: 100%" alt="">
                            </div>
                            <div class="vertical-separator"></div>
                            <div class="w-100">
                                <h3 class="header-text fst-italic">Counselling Request / Appointment</h3>
                                <p class="fw-light small">
                                    Employees can schedule for online or
                                    face-to-face counseling and
                                    psychological services conducted by
                                    counselors and clinical
                                    psychologists.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="d-flex flex-column flex-sm-row justify-content-center align-items-center gap-5 p-5">
                            <div class="w-100">
                                <img src="{{asset('assets/landing/img/Laptop-5.png')}}" style="max-width: 100%" alt="">
                            </div>
                            <div class="vertical-separator"></div>
                            <div class="w-100">
                                <h3 class="header-text fst-italic">Counselling Hours Package / Credit System </h3>
                                <p class="fw-light small">
                                    Employees can schedule for online or
                                    face-to-face counseling and
                                    psychological services conducted by
                                    counselors and clinical
                                    psychologists.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="d-flex flex-column flex-sm-row justify-content-center align-items-center gap-5 p-5">
                            <div class="w-100">
                                <img src="{{asset('assets/landing/img/Laptop-5.png')}}" style="max-width: 100%" alt="">
                            </div>
                            <div class="vertical-separator"></div>
                            <div class="w-100">
                                <h3 class="header-text fst-italic">Wellness Journey</h3>
                                <p class="fw-light small">
                                    Employees can record and track their
                                    health behaviors and aspects
                                    including exercise, weight, sleep,
                                    medication consumption, blood
                                    glucose level, and blood pressure
                                    level.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="d-flex flex-column flex-sm-row justify-content-center align-items-center gap-5 p-5">
                            <div>
                                <img src="{{asset('assets/landing/img/Laptop-5.png')}}" style="max-width: 100%" alt="">
                            </div>
                            <div class="vertical-separator"></div>
                            <div class="w-100">
                                <h3 class="header-text fst-italic">
                                    Wellness Data / Data
                                    Insights</h3>
                                <div class="fw-light small">
                                    The compilation and analysis of
                                    employee wellness data provides
                                    insights for employers to make
                                    strategic decisions in enhancing
                                    workplace and employee
                                    wellness.Organisations will get a
                                    wealth of data that can be used to
                                    help improve employee well-being.
                                    There are a number of ways to track
                                    your organisation’s progress
                                    by analyzing collected data. You may
                                    choose to:
                                    <ul>
                                        <li>Monitor level of mental
                                            wellness of employee for
                                            specific department.
                                        </li>
                                        <li>Compare level of mental
                                            wellness of employee between
                                            department.
                                        </li>
                                    </ul>
                                    All reports and data will remain
                                    private and confidential. You will
                                    have higher participation rates and
                                    more genuine feedback if you
                                    maintain confidentiality and
                                    consistently demonstrate respect for
                                    employee’s privacy.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="d-flex flex-column flex-sm-row justify-content-center align-items-center gap-5 p-5">
                            <div class="w-100">
                                <img src="{{asset('assets/landing/img/Laptop-5.png')}}" style="max-width: 100%" alt="">
                            </div>
                            <div class="vertical-separator"></div>
                            <div class="w-100">
                                <h3 class="header-text fst-italic">
                                    Accounting and Billing
                                    Management</h3>
                                <p class="fw-light fs-5">

                                    Get all the tools to control your
                                    business accounting and inventory in
                                    one place. Use convenient dashboards
                                    to set financial goals, invoice
                                    clients, manage taxation, and see
                                    where your money is going.

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="d-flex flex-column flex-sm-row justify-content-center align-items-center gap-5 p-5">
                            <div class="w-100">
                                <img src="{{asset('assets/landing/img/Laptop-5.png')}}" style="max-width: 100%" alt="">
                            </div>
                            <div class="vertical-separator"></div>
                            <div class="w-100">
                                <h3 class="header-text fst-italic">
                                    Manage HR - Business Greatest
                                    Assets</h3>
                                <p class="fw-light fs-5">

                                    Gain easy access to the personal
                                    details of your staff. Edit staff
                                    information, assign roles, and gain
                                    control over access. Handle all
                                    facets of your HR – from attendance
                                    records to salary payments – all
                                    without lifting a finger.

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="d-flex flex-column flex-sm-row justify-content-center align-items-center gap-5 p-5">
                            <div class="w-100">
                                <img src="{{asset('assets/landing/img/Laptop-5.png')}}" style="max-width: 100%" alt="">
                            </div>
                            <div class="vertical-separator"></div>
                            <div class="w-100">
                                <h3 class="header-text fst-italic">
                                    Manage Leads & Deals</h3>
                                <p class="fw-light fs-5">

                                    Easily keep in touch with clients
                                    and users. Streamline the contract
                                    process for a more efficient
                                    business. Generate new estimates
                                    quickly and easily. Crush deadlines
                                    by managing estimates – all in one
                                    place, in a matter of minutes.

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="team" class="team section-bg">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-md-6 d-flex flex-column gap-5">
                    <h1 class="text-white">SELECT <span class="text-yellow">DEVELOPMENT</span> REQUEST</h1>
                    <span class="small text-yellow">
                        In less than 24 hours you will be contacted by one of our software experts and receive a
                        detailed evaluation of your project, a presentation and suggestion of what can be done. Full
                        confidentiality is guaranteed
                    </span>
                    <span class="small text-white">
                        We build modern web tools to help you jump-start your daily business work. We build modern web
                        tools to help you jump-start your daily business work. We build modern web tools to help you
                        jump-start your daily business work.
                    </span>
                    <span class="text-white">
                        Select service for you:
                    </span>
                    <div class="d-flex gap-4">
                        <div class="position-relative">
                            <img src="{{asset('assets/landing/img/category_label.png')}}" style="width: 75px;height: 65px;" alt="">
                            <div class="rotated-text position-absolute">Select</div>
                        </div>
                        <div class="d-flex flex-column gap-4">
                            <div class="card px-3"
                                 style="border: none; background-color: transparent;background-image: linear-gradient(90deg, #FE612C 15%, #FFA12C 100%);">
                                <img src="{{asset('assets/landing/img/1.jpg')}}" class="card-left-center-img" alt="">
                                <div class="card-body py-4 px-5">
                                    <h2 class="header-text"><span style="color:#fff">Product</span>
                                        customization
                                        <br>
                                        Request
                                    </h2>
                                    <p class="small" style="font-size: 12px;font-weight: 600;line-height: 20px;">
                                        Trusted by more than 500 customers who purchased EAPWellness for their companies
                                        around the global EAPWellness has the most comprehensive dashboard with all the
                                        essential details under one system. EAPWellness Dashboards have made business
                                        owners’ lives easier, from every detail like total Clients, Users, Invoices,
                                        Projects, and estimations to Leads, Deals, and items, where you can get
                                        quantitative data in the most simple layout.
                                    </p>
                                </div>
                            </div>
                            <div class="card px-3"
                                 style="border: none; background-color: #ffa12c;">
                                <img src="{{asset('assets/landing/img/2.jpg')}}" class="card-left-center-img" alt="">
                                <div class="card-body py-4 px-5">
                                    <h2 class="header-text"><span style="color:#fff">New </span>
                                        development
                                        <br>
                                        Request
                                    </h2>
                                    <p class="small" style="font-size: 12px;font-weight: 600;line-height: 20px;">
                                        More than 250 Customization requests by the trusted customers around the global
                                        EAPWellness has the most flexible system and features to be customized based on
                                        your exact business needs. Our creative and experienced developers are ready to
                                        make all the changes that you need for your business. EAPWellness customization
                                        options have made business owners’ lives easier, from every detail in the
                                        functionalities and the system design.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h2 class="fw-bold text-white">New Development Request</h2>
                    <form action="" class="mt-3" id="developmentRequestForm">
                        <div class="form-group mb-5">
                            <label for="full_name" class="small form-label text-white">Full Name</label>
                            <input type="text" class="form-control bg-transparent" id="full_name"
                                   placeholder="Full Name">
                        </div>
                        <div class="row mb-5">
                            <div class="form-group col-md-6">
                                <label for="email_address" class="small form-label text-white">Email address</label>
                                <input type="email" class="form-control bg-transparent" id="email_address"
                                       placeholder="Type your email address">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone" class="small form-label text-white">Phone Number</label>
                                <input type="text" class="form-control bg-transparent" id="phone"
                                       placeholder="000-111-222">
                            </div>

                        </div>
                        <div class="form-group mb-5">
                            <label for="project_brief" class="small form-label text-white">Project Brief</label>
                            <textarea rows="5" class="form-control bg-transparent" id="project_brief"
                                      placeholder="Description"></textarea>
                        </div>
                        <div class="mb-5">
                            <input class="form-control bg-transparent" type="file" id="customFile">
                        </div>
                        <div class="form-group mb-5">
                            <label for="other_comment" class="small form-label text-white">Other
                                Comment/Request</label>
                            <textarea rows="5" class="form-control bg-transparent" id="other_comment"
                                      placeholder="Description"></textarea>
                        </div>
                        <button type="submit" style="color: #002332"
                                class="btn custom-header-btn btn-lg w-100 text-center py-3 d-flex justify-content-center fs-6">
                            <span>Submit</span>
                            <i aria-hidden="true" class="bx bx-send" style="transform: rotate(-40deg)"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact"
             style="background-color: transparent;background-image: linear-gradient(90deg, #fe612c 5%, #ffa12c 33%);">
        <div class="container text-white" data-aos="fade-up">

            <div class="section-title">
                <h1>Contact Us</h1>
                <p>We give a helping hand to make sure you start with the right foot.</p>
            </div>

            <form action="forms/contact.php" method="post" role="form" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" class="form-control bg-transparent" id="first_name"
                               placeholder="First Name" required>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control bg-transparent" name="last_name" id="last_name"
                               placeholder="Last Name" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control bg-transparent"
                               placeholder="Type your email address" id="email" required>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" class="form-control bg-transparent" placeholder="000-111-222"
                               name="phone_number" id="phone_number">
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="upload_file">File</label>
                    <input type="file" class="form-control bg-transparent" name="upload_file" id="upload_file">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control bg-transparent" name="message" rows="10" id="message"
                              placeholder="Message"></textarea>
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-light rounded-5 py-3 px-4 fw-bold">Submit</button>
                </div>
            </form>

        </div>
    </section>

</main><!-- End #main -->


@include('partials.landing.footer')
<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 2, // Display two slides at a time
        speed: 400,
        autoplay: true,
        spaceBetween: 20,
        // Enable pagination
        pagination: {
            el: '.swiper-pagination',
            clickable: true, // Make pagination bullets clickable
            type: 'custom', // Use custom pagination rendering
            renderCustom: function (swiper, current, total) {
                return `<span class="text-yellow">${current}</span>/<span>${total}</span>`; // Display current slide number and total
            },
        },

        // Enable navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>
</body>

</html>

<!--Generated by Endurance Page Cache-->