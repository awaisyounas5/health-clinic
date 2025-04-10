@extends('layouts.landing')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@include('partial.toastr')
    <section class="google-map py-0">
        <iframe frameborder="0" height="500" width="100%"
            src="https://maps.google.com/maps?q=Suite%20100%20San%20Francisco%2C%20LA%2094107%20United%20States&amp;t=m&amp;z=10&amp;output=embed&amp;iwloc=near"></iframe>
    </section>

    <section class="contact-layout1 pt-0 mt--100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contact-panel d-flex flex-wrap">
                        <form class="contact-panel__form" method="post" action="{{route('contact_us.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4 class="contact-panel__title">How Can We Help? </h4>
                                    <p class="contact-panel__desc mb-30">Please feel welcome to contact our friendly
                                        reception staff with any general or medical enquiry. Our doctors will receive or
                                        return any urgent calls.
                                    </p>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <i class="icon-user form-group-icon"></i>
                                        <input type="text" class="form-control" placeholder="Name" id="contact-name"
                                            name="name" required>
                                    </div>
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <i class="icon-email form-group-icon"></i>
                                        <input type="email" class="form-control" placeholder="Email" id="contact-email"
                                            name="email" required>
                                    </div>
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <i class="icon-phone form-group-icon"></i>
                                        <input type="text" class="form-control" placeholder="Phone" id="contact-Phone"
                                            name="phone" required>
                                    </div>
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <i class="icon-news form-group-icon"></i>
                                        <select class="form-control" name="subject">
                                            <option value="Subject">Subject</option>
                                            <option value="Subject 1">Subject 1</option>
                                            <option value="Subject 2">Subject 1</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <i class="icon-alert form-group-icon"></i>
                                        <textarea class="form-control" placeholder="Message" id="contact-message" name="message"></textarea>
                                    </div>
                                    <button type="submit"
                                        class="btn btn__secondary btn__rounded btn__block btn__xhight mt-10">
                                        <span>Submit Request</span> <i class="icon-arrow-right"></i>
                                    </button>
                                    <div class="contact-result"></div>
                                </div>
                                <!-- /.col-lg-12 -->
                            </div>
                            <!-- /.row -->
                        </form>
                        <div
                            class="contact-panel__info d-flex flex-column justify-content-between bg-overlay bg-overlay-primary-gradient">
                            <div class="bg-img"><img src="assets/images/banners/1.jpg" alt="banner"></div>
                            <div>
                                <h4 class="contact-panel__title color-white">Quick Contacts</h4>
                                <p class="contact-panel__desc font-weight-bold color-white mb-30">Please feel free to
                                    contact our friendly staff with any medical enquiry.
                                </p>
                            </div>
                            <div>
                                <ul class="contact__list list-unstyled mb-30">
                                    <li>
                                        <i class="icon-phone"></i><a href="tel:+5565454117">Emergency Line: (002)
                                            01061245741</a>
                                    </li>
                                    <li>
                                        <i class="icon-location"></i><a href="#">Location: Brooklyn, New York</a>
                                    </li>
                                    <li>
                                        <i class="icon-clock"></i><a href="contact-us.html">Mon - Fri: 8:00 am - 7:00 pm</a>
                                    </li>
                                </ul>
                                <a href="#" class="btn btn__white btn__rounded btn__outlined">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.contact layout 1 -->

    <!-- =========================
    Testimonials layout 2
    =========================  -->
    <section class="testimonials-layout2 pt-40 pb-40">
        <div class="container">
            <div class="testimonials-wrapper">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-5">
                        <div class="heading-layout2">
                            <h3 class="heading__title">Inspiring Stories!</h3>
                        </div>
                        <!-- /.heading -->
                    </div>
                    <!-- /.col-lg-5 -->
                    <div class="col-sm-12 col-md-12 col-lg-7">
                        <div class="slider-with-navs">
                            <!-- Testimonial #1 -->
                            <div class="testimonial-item">
                                <h3 class="testimonial__title">“Their doctors include highly qualified practitioners who
                                    come from a range of backgrounds and bring with them a diversity of skills and special
                                    interests. They also have registered nurses on staff who are available
                                    to triage any urgent matters, and the administration and support staff all have
                                    exceptional people skills”
                                </h3>
                            </div>
                            <!-- /. testimonial-item -->
                            <!-- Testimonial #2 -->
                            <div class="testimonial-item">
                                <h3 class="testimonial__title">“Their doctors include highly qualified practitioners who
                                    come from a range of backgrounds and bring with them a diversity of skills and special
                                    interests. They also have registered nurses on staff who are available
                                    to triage any urgent matters, and the administration and support staff all have
                                    exceptional people skills”
                                </h3>
                            </div>
                            <!-- /. testimonial-item -->
                            <!-- Testimonial #3 -->
                            <div class="testimonial-item">
                                <h3 class="testimonial__title">“Their doctors include highly qualified practitioners who
                                    come from a range of backgrounds and bring with them a diversity of skills and special
                                    interests. They also have registered nurses on staff who are available
                                    to triage any urgent matters, and the administration and support staff all have
                                    exceptional people skills”
                                </h3>
                            </div>
                            <!-- /. testimonial-item -->
                        </div>
                        <!-- /.slick-carousel -->
                        <div class="slider-nav mb-60">
                            <div class="testimonial__meta">
                                <div class="testimonial__thmb">
                                    <img src="assets/images/testimonials/thumbs/1.png" alt="author thumb">
                                </div>
                                <!-- /.testimonial-thumb -->
                                <div>
                                    <h4 class="testimonial__meta-title">Sami Wade</h4>
                                    <p class="testimonial__meta-desc">7oroof Inc</p>
                                </div>
                            </div>
                            <!-- /.testimonial-meta -->
                            <div class="testimonial__meta">
                                <div class="testimonial__thmb">
                                    <img src="assets/images/testimonials/thumbs/2.png" alt="author thumb">
                                </div>
                                <!-- /.testimonial-thumb -->
                                <div>
                                    <h4 class="testimonial__meta-title">Ahmed</h4>
                                    <p class="testimonial__meta-desc">Web Inc</p>
                                </div>
                            </div>
                            <!-- /.testimonial-meta -->
                            <div class="testimonial__meta">
                                <div class="testimonial__thmb">
                                    <img src="assets/images/testimonials/thumbs/3.png" alt="author thumb">
                                </div>
                                <!-- /.testimonial-thumb -->
                                <div>
                                    <h4 class="testimonial__meta-title">Sonia Blake</h4>
                                    <p class="testimonial__meta-desc">Web Inc</p>
                                </div>
                            </div>
                            <!-- /.testimonial-meta -->
                        </div>
                        <!-- /.slider-nav -->
                    </div>
                    <!-- /.col-lg-7 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.testimonials-wrapper -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.testimonials layout 2 -->

    <!-- ========================
    gallery
    =========================== -->
    <section class="gallery pt-0 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="slick-carousel"
                        data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "autoplay": true, "arrows": true, "dots": false, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 2}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
                        <a class="popup-gallery-item" href="assets/images/gallery/1.jpg">
                            <img src="assets/images/gallery/1.jpg" alt="gallery img">
                        </a>
                        <a class="popup-gallery-item" href="assets/images/gallery/2.jpg">
                            <img src="assets/images/gallery/2.jpg" alt="gallery img">
                        </a>
                        <a class="popup-gallery-item" href="assets/images/gallery/3.jpg">
                            <img src="assets/images/gallery/3.jpg" alt="gallery img">
                        </a>
                        <a class="popup-gallery-item" href="assets/images/gallery/4.jpg">
                            <img src="assets/images/gallery/4.jpg" alt="gallery img">
                        </a>
                        <a class="popup-gallery-item" href="assets/images/gallery/5.jpg">
                            <img src="assets/images/gallery/5.jpg" alt="gallery img">
                        </a>
                        <a class="popup-gallery-item" href="assets/images/gallery/6.jpg">
                            <img src="assets/images/gallery/6.jpg" alt="gallery img">
                        </a>
                    </div>
                    <!-- /.gallery-images-wrapper -->
                </div>
                <!-- /.col-xl-5 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
@endsection
