@extends('frontend.master_frontend')

@section('page_header')
    All Portfolio
@endsection



@section('content')
    <!-- main-area -->
    <main>

        <!-- breadcrumb-area -->
        <section class="breadcrumb__wrap">
            <div class="container custom-container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class="breadcrumb__wrap__content">
                            <h2 class="title">All Portfolio</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Portfolio</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumb__wrap__icon">
                <ul>
                    <li><img src="assets/img/icons/breadcrumb_icon01.png" alt=""></li>
                    <li><img src="assets/img/icons/breadcrumb_icon02.png" alt=""></li>
                    <li><img src="assets/img/icons/breadcrumb_icon03.png" alt=""></li>
                    <li><img src="assets/img/icons/breadcrumb_icon04.png" alt=""></li>
                    <li><img src="assets/img/icons/breadcrumb_icon05.png" alt=""></li>
                    <li><img src="assets/img/icons/breadcrumb_icon06.png" alt=""></li>
                </ul>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- portfolio-area -->
        <section class="portfolio__inner">
            <div class="container">

                <div class="portfolio__inner__active">

                  @foreach ($portfolios as $item)
                      <div class="portfolio__inner__item grid-item cat-two cat-three">
                          <div class="row gx-0 align-items-center">
                              <div class="col-lg-6 col-md-10">
                                  <div class="portfolio__inner__thumb">
                                      <a href="{{ route('portfolio_detail', $item->id) }}">
                                          <img src="{{ asset('uploads/portfolio') }}/{{ $item->portfolio_image }}" alt="">
                                      </a>
                                  </div>
                              </div>
                              <div class="col-lg-6 col-md-10">
                                  <div class="portfolio__inner__content">
                                      <h2 class="title"><a href="{{ route('portfolio_detail', $item->id) }}">{{ $item->portfolio_title }}</a></h2>
                                      <p>
                                        {!! Str::limit($item->portfolio_description, 200) !!}
                                      </p>


                                      <a href="{{ route('portfolio_detail', $item->id) }}" class="link">View Case Study</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  @endforeach


                </div>
                <div class="pagination-wrap">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#"><i
                                        class="far fa-long-arrow-left"></i></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i
                                        class="far fa-long-arrow-right"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </section>
        <!-- portfolio-area-end -->


        <!-- contact-area -->
        <section class="homeContact homeContact__style__two">
            <div class="container">
                <div class="homeContact__wrap">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="section__title">
                                <span class="sub-title">07 - Say hello</span>
                                <h2 class="title">Any questions? Feel free <br> to contact</h2>
                            </div>
                            <div class="homeContact__content">
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration in some form</p>
                                <h2 class="mail"><a
                                        href="/cdn-cgi/l/email-protection#256c4b434a6552404748444c490b464a48"><span
                                            class="__cf_email__"
                                            data-cfemail="0e476068614e796b6c636f6762206d6163">[email&#160;protected]</span></a>
                                </h2>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="homeContact__form">
                                <form action="#">
                                    <input type="text" placeholder="Enter name*">
                                    <input type="email" placeholder="Enter mail*">
                                    <input type="number" placeholder="Enter number*">
                                    <textarea name="message" placeholder="Enter Massage*"></textarea>
                                    <button type="submit">Send Message</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-area-end -->

    </main>
    <!-- main-area-end -->
@endsection
