@extends('layouts.landing')
@section('content')
<section class="page-title page-title-layout1 bg-overlay">
    <div class="bg-img"><img src="assets/images/page-titles/1.jpg" alt="background"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5">
                <h1 class="pagetitle__heading">Caring For The Health & Well Being Of Family.</h1>
                <p class="pagetitle__desc">Medcity has been present in Europe since 1990, offering innovative solutions, specializing in medical services for treatment of medical infrastructure.
                </p>
                <div class="d-flex flex-wrap align-items-center">
                    <a href="appointment.html" class="btn btn__primary btn__rounded mr-30">
        <span>Find A Doctor</span>
        <i class="icon-arrow-right"></i>
      </a>
                    <a href="services.html" class="btn btn__white btn__rounded">
        <span>Our Services</span>
        <i class="icon-arrow-right"></i>
      </a>
                </div>
            </div>
            <!-- /.col-xl-5 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /.page-title -->

<!-- ========================
About Layout 1
=========================== -->
<section class="about-layout1 pb-0">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="heading-layout2">
                    <h3 class="heading__title mb-40">Improving The Quality Of Your Life Through Better Health.</h3>
                </div>
                <!-- /heading -->
            </div>
            <!-- /.col-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="about__Text">
                    <p class="mb-30">Our goal is to deliver quality of care in a courteous, respectful, and compassionate manner. We hope you will allow us to care for you and to be the first and best choice for healthcare.
                    </p>
                    <p class="mb-30">We will work with you to develop individualised care plans, including management of chronic diseases. We are committed to being the region’s premier healthcare network providing patient centered care that inspires clinical
                        and service excellence.</p>
                    <div class="d-flex align-items-center mb-30">
                        <a href="doctors-grid.html" class="btn btn__primary btn__outlined btn__rounded mr-30">
          Meet Our Doctors</a>
                        <img src="assets/images/about/singnture.png" alt="singnture">
                    </div>
                </div>
            </div>
            <!-- /.col-lg-6 -->
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="video-banner">
                    <img src="assets/images/about/1.jpg" alt="about">
                    <a class="video__btn video__btn-white popup-video" href="https://www.youtube.com/watch?v=nrJtHemSPW4">
                        <div class="video__player">
                            <i class="fa fa-play"></i>
                        </div>
                    </a>
                </div>
                <!-- /.video-banner -->
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /.About Layout 1 -->

<!-- ======================
Features Layout 1
========================= -->
<section class="features-layout1 pt-130 pb-50 mt--90">
    <div class="bg-img"><img src="assets/images/backgrounds/1.jpg" alt="background"></div>
    <div class="container">
        <div class="row mb-40">
            <div class="col-sm-12 col-md-12 col-lg-5">
                <div class="heading__layout2">
                    <h3 class="heading__title">Providing Care for The Sickest In Community.</h3>
                </div>
            </div>
            <!-- /col-lg-5 -->
            <div class="col-sm-12 col-md-12 col-lg-5 offset-lg-1">
                <p class="heading__desc font-weight-bold">Medcity has been present in Europe since 1990, offering innovative solutions, specializing in medical services for treatment of medical infrastructure. With over 100 professionals actively participates in numerous initiatives aimed
                    at creating sustainable change for patients!
                </p>
                <div class="d-flex flex-wrap align-items-center mt-40 mb-30">
                    <a href="appointment.html" class="btn btn__primary btn__rounded mr-30">
        <span>Make Appointment</span>
        <i class="icon-arrow-right"></i>
      </a>
                    <a href="#" class="btn btn__secondary btn__link">
        <i class="icon-arrow-right icon-filled"></i>
        <span>Our Core Values</span>
      </a>
                </div>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <!-- Feature item #1 -->
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="feature-item">
                    <div class="feature__content">
                        <div class="feature__icon">
                            <i class="icon-heart"></i>
                            <i class="icon-heart feature__overlay-icon"></i>
                        </div>
                        <h4 class="feature__title">Medical Advices & Check Ups</h4>
                    </div>
                    <!-- /.feature__content -->
                    <a href="#" class="btn__link">
        <i class="icon-arrow-right icon-outlined"></i>
      </a>
                </div>
                <!-- /.feature-item -->
            </div>
            <!-- /.col-lg-3 -->
            <!-- Feature item #2 -->
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="feature-item">
                    <div class="feature__content">
                        <div class="feature__icon">
                            <i class="icon-doctor"></i>
                            <i class="icon-doctor feature__overlay-icon"></i>
                        </div>
                        <h4 class="feature__title">Trusted Medical Treatment </h4>
                    </div>
                    <!-- /.feature__content -->
                    <a href="#" class="btn__link">
        <i class="icon-arrow-right icon-outlined"></i>
      </a>
                </div>
                <!-- /.feature-item -->
            </div>
            <!-- /.col-lg-3 -->
            <!-- Feature item #3 -->
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="feature-item">
                    <div class="feature__content">
                        <div class="feature__icon">
                            <i class="icon-ambulance"></i>
                            <i class="icon-ambulance feature__overlay-icon"></i>
                        </div>
                        <h4 class="feature__title">Emergency Help Available 24/7</h4>
                    </div>
                    <!-- /.feature__content -->
                    <a href="#" class="btn__link">
        <i class="icon-arrow-right icon-outlined"></i>
      </a>
                </div>
                <!-- /.feature-item -->
            </div>
            <!-- /.col-lg-3 -->
            <!-- Feature item #4 -->
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="feature-item">
                    <div class="feature__content">
                        <div class="feature__icon">
                            <i class="icon-drugs"></i>
                            <i class="icon-drugs feature__overlay-icon"></i>
                        </div>
                        <h4 class="feature__title">Medical Research Professionals </h4>
                    </div>
                    <!-- /.feature__content -->
                    <a href="#" class="btn__link">
        <i class="icon-arrow-right icon-outlined"></i>
      </a>
                </div>
                <!-- /.feature-item -->
            </div>
            <!-- /.col-lg-3 -->
            <!-- Feature item #5 -->
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="feature-item">
                    <div class="feature__content">
                        <div class="feature__icon">
                            <i class="icon-first-aid-kit"></i>
                            <i class="icon-first-aid-kit feature__overlay-icon"></i>
                        </div>
                        <h4 class="feature__title">Only Qualified Doctors</h4>
                    </div>
                    <!-- /.feature__content -->
                    <a href="#" class="btn__link">
        <i class="icon-arrow-right icon-outlined"></i>
      </a>
                </div>
                <!-- /.feature-item -->
            </div>
            <!-- /.col-lg-3 -->
            <!-- Feature item #6 -->
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="feature-item">
                    <div class="feature__content">
                        <div class="feature__icon">
                            <i class="icon-hospital"></i>
                            <i class="icon-hospital feature__overlay-icon"></i>
                        </div>
                        <h4 class="feature__title">Cutting Edge Facility</h4>
                    </div>
                    <!-- /.feature__content -->
                    <a href="#" class="btn__link">
        <i class="icon-arrow-right icon-outlined"></i>
      </a>
                </div>
                <!-- /.feature-item -->
            </div>
            <!-- /.col-lg-3 -->
            <!-- Feature item #7 -->
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="feature-item">
                    <div class="feature__content">
                        <div class="feature__icon">
                            <i class="icon-expenses"></i>
                            <i class="icon-expenses feature__overlay-icon"></i>
                        </div>
                        <h4 class="feature__title">Affordable Prices For All Patients</h4>
                    </div>
                    <!-- /.feature__content -->
                    <a href="#" class="btn__link">
        <i class="icon-arrow-right icon-outlined"></i>
      </a>
                </div>
                <!-- /.feature-item -->
            </div>
            <!-- /.col-lg-3 -->
            <!-- Feature item #8 -->
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="feature-item">
                    <div class="feature__content">
                        <div class="feature__icon">
                            <i class="icon-bandage"></i>
                            <i class="icon-bandage feature__overlay-icon"></i>
                        </div>
                        <h4 class="feature__title">Quality Care For Every Patient</h4>
                    </div>
                    <!-- /.feature__content -->
                    <a href="#" class="btn__link">
        <i class="icon-arrow-right icon-outlined"></i>
      </a>
                </div>
                <!-- /.feature-item -->
            </div>
            <!-- /.col-lg-3 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12 col-lg-6 offset-lg-3 text-center">
                <p class="font-weight-bold mb-0">Serve the community by improving the quality of life through better health. We have put protocols to protect our patients and staff while continuing to provide medically necessary care.
                    <a href="#" class="color-secondary">
        <span>Contact Us For More Information</span> <i class="icon-arrow-right"></i>
      </a>
                </p>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /.Features Layout 1 -->

<!-- ======================
Work Process
========================= -->
<section class="work-process work-process-carousel pt-130 pb-0 bg-overlay bg-overlay-secondary">
    <div class="bg-img"><img src="assets/images/banners/1.jpg" alt="background"></div>
    <div class="container">
        <div class="row heading-layout2">
            <div class="col-12">
                <h2 class="heading__subtitle color-primary">Caring For The Health Of You And Your Family.</h2>
            </div>
            <!-- /.col-12 -->
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-5">
                <h3 class="heading__title color-white">We Provide All Aspects Of Medical Practice For Your Whole Family!
                </h3>
            </div>
            <!-- /.col-xl-5 -->
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 offset-xl-1">
                <p class="heading__desc font-weight-bold color-gray mb-40">We will work with you to develop individualised care plans, including management of chronic diseases. If we cannot assist, we can provide referrals or advice about the type of practitioner you require. We treat all enquiries sensitively
                    and in the strictest confidence.
                </p>
                <ul class="list-items list-items-layout2 list-items-light list-horizontal list-unstyled">
                    <li>Fractures and dislocations</li>
                    <li>Health Assessments</li>
                    <li>Desensitisation injections</li>
                    <li>High Quality Care</li>
                    <li>Desensitisation injections</li>
                </ul>
            </div>
            <!-- /.col-xl-6 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="carousel-container mt-90">
                    <div class="slick-carousel" data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "infinite":false, "arrows": false, "dots": false, "responsive": [{"breakpoint": 1200, "settings": {"slidesToShow": 3}}, {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 2}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
                        <!-- process item #1 -->
                        <div class="process-item">
                            <span class="process__number">01</span>
                            <div class="process__icon">
                                <i class="icon-health-report"></i>
                            </div>
                            <!-- /.process__icon -->
                            <h4 class="process__title">Fill In Our Medical Application</h4>
                            <p class="process__desc">Medcity offers low-cost health coverage for adults with limited income, you can enroll.
                            </p>
                            <a href="#" class="btn btn__secondary btn__link">
            <span>Doctors’ Timetable</span>
            <i class="icon-arrow-right"></i>
          </a>
                        </div>
                        <!-- /.process-item -->
                        <!-- process-item #2 -->
                        <div class="process-item">
                            <span class="process__number">02</span>
                            <div class="process__icon">
                                <i class="icon-dna"></i>
                            </div>
                            <!-- /.process__icon -->
                            <h4 class="process__title">Review Your Family Medical History</h4>
                            <p class="process__desc">Regular health exams can help find all the problems, also can find it early chances.
                            </p>
                            <a href="#" class="btn btn__secondary btn__link">
            <span>Start A Check Up</span>
            <i class="icon-arrow-right"></i>
          </a>
                        </div>
                        <!-- /.process-item -->
                        <!-- process-item #3 -->
                        <div class="process-item">
                            <span class="process__number">03</span>
                            <div class="process__icon">
                                <i class="icon-medicine"></i>
                            </div>
                            <!-- /.process__icon -->
                            <h4 class="process__title">Choose Between Our Care Programs</h4>
                            <p class="process__desc">We have protocols to protect our patients while continuing to provide necessary care.
                            </p>
                            <a href="#" class="btn btn__secondary btn__link">
            <span>Explore Programs</span>
            <i class="icon-arrow-right"></i>
          </a>
                        </div>
                        <!-- /.process-item -->
                        <!-- process-item #4 -->
                        <div class="process-item">
                            <span class="process__number">04</span>
                            <div class="process__icon">
                                <i class="icon-stethoscope"></i>
                            </div>
                            <!-- /.process__icon -->
                            <h4 class="process__title">Introduce You To Highly Qualified Doctors</h4>
                            <p class="process__desc">Our administration and support staff have exceptional skills and trained to assist you. </p>
                            <a href="#" class="btn btn__secondary btn__link">
            <span>Meet Our Doctors</span>
            <i class="icon-arrow-right"></i>
          </a>
                        </div>
                        <!-- /.process-item -->
                        <!-- process-item #5 -->
                        <div class="process-item">
                            <span class="process__number">05</span>
                            <div class="process__icon">
                                <i class="icon-head"></i>
                            </div>
                            <!-- /.process__icon -->
                            <h4 class="process__title">Your custom Next process</h4>
                            <p class="process__desc">Our administration and support staff have exceptional skills to assist you.
                            </p>
                            <a href="#" class="btn btn__secondary btn__link">
            <span>Meet Our Doctors</span>
            <i class="icon-arrow-right"></i>
          </a>
                        </div>
                        <!-- /.process-item -->
                    </div>
                    <!-- /.carousel -->
                </div>
            </div>
            <!-- /.col-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
    <div class="cta bg-primary">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-12 col-md-2 col-lg-2">
                    <img src="assets/images/icons/alert.png" class="cta__img" alt="alert">
                </div>
                <!-- /.col-lg-2 -->
                <div class="col-sm-12 col-md-7 col-lg-7">
                    <h4 class="cta__title">True Healthcare For Your Family!</h4>
                    <p class="cta__desc">Serve the community by improving the quality of life through better health. We have put protocols to protect our patients and staff while continuing to provide medically necessary care.
                    </p>
                </div>
                <!-- /.col-lg-7 -->
                <div class="col-sm-12 col-md-12 col-lg-3">
                    <a href="appointment.html" class="btn btn__secondary btn__secondary-style2 btn__rounded mr-30">
        <span>Healthcare Programs</span>
        <i class="icon-arrow-right"></i>
      </a>
                </div>
                <!-- /.col-lg-3 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.cta -->
</section>
<!-- /.Work Process -->

<!-- ======================
Team
========================= -->
<section class="team-layout2 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
                <div class="heading text-center mb-40">
                    <h3 class="heading__title">Meet Our Doctors</h3>
                    <p class="heading__desc">Our administration and support staff all have exceptional people skills and trained to assist you with all medical enquiries.
                    </p>
                </div>
                <!-- /.heading -->
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="slick-carousel" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "autoplay": true, "arrows": false, "dots": false, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 1}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
                    <!-- Member #1 -->
                    <div class="member">
                        <div class="member__img">
                            <img src="assets/images/team/1.jpg" alt="member img">
                        </div>
                        <!-- /.member-img -->
                        <div class="member__info">
                            <h5 class="member__name"><a href="doctors-single-doctor1.html">Mike Dooley</a></h5>
                            <p class="member__job">Cardiology Specialist</p>
                            <p class="member__desc">Muldoone obtained his undergraduate degree in Biomedical Engineering at Tulane University prior to attending St George's University School of Medicine</p>
                            <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                                <a href="doctors-single-doctor1.html" class="btn btn__secondary btn__link btn__rounded">
              <span>Read More</span>
              <i class="icon-arrow-right"></i>
            </a>
                                <ul class="social-icons list-unstyled mb-0">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" class="phone"><i class="fas fa-phone-alt"></i></a></li>
                                </ul>
                                <!-- /.social-icons -->
                            </div>
                        </div>
                        <!-- /.member-info -->
                    </div>
                    <!-- /.member -->
                    <!-- Member #2 -->
                    <div class="member">
                        <div class="member__img">
                            <img src="assets/images/team/2.jpg" alt="member img">
                        </div>
                        <!-- /.member-img -->
                        <div class="member__info">
                            <h5 class="member__name"><a href="doctors-single-doctor1.html">Dermatologists</a></h5>
                            <p class="member__job">Cardiology Specialist</p>
                            <p class="member__desc">Brian specializes in treating skin, hair, nail, and mucous membrane. He also address cosmetic issues, helping to revitalize the appearance of the skin</p>
                            <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                                <a href="doctors-single-doctor1.html" class="btn btn__secondary btn__link btn__rounded">
              <span>Read More</span>
              <i class="icon-arrow-right"></i>
            </a>
                                <ul class="social-icons list-unstyled mb-0">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" class="phone"><i class="fas fa-phone-alt"></i></a></li>
                                </ul>
                                <!-- /.social-icons -->
                            </div>
                        </div>
                        <!-- /.member-info -->
                    </div>
                    <!-- /.member -->
                    <!-- Member #3 -->
                    <div class="member">
                        <div class="member__img">
                            <img src="assets/images/team/3.jpg" alt="member img">
                        </div>
                        <!-- /.member-img -->
                        <div class="member__info">
                            <h5 class="member__name"><a href="doctors-single-doctor1.html">Maria Andaloro</a></h5>
                            <p class="member__job">Pediatrician</p>
                            <p class="member__desc">Andaloro graduated from medical school and completed 3 years residency program in pediatrics. She passed rigorous exams by the American Board of Pediatrics.</p>
                            <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                                <a href="doctors-single-doctor1.html" class="btn btn__secondary btn__link btn__rounded">
              <span>Read More</span>
              <i class="icon-arrow-right"></i>
            </a>
                                <ul class="social-icons list-unstyled mb-0">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" class="phone"><i class="fas fa-phone-alt"></i></a></li>
                                </ul>
                                <!-- /.social-icons -->
                            </div>
                        </div>
                        <!-- /.member-info -->
                    </div>
                    <!-- /.member -->
                    <!-- Member #4 -->
                    <div class="member">
                        <div class="member__img">
                            <img src="assets/images/team/4.jpg" alt="member img">
                        </div>
                        <!-- /.member-img -->
                        <div class="member__info">
                            <h5 class="member__name"><a href="doctors-single-doctor1.html">Dupree Black</a></h5>
                            <p class="member__job">Urologist</p>
                            <p class="member__desc">Black diagnose and treat diseases of the urinary tract in both men and women. He also diagnose and treat anything involving the reproductive tract in men.</p>
                            <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                                <a href="doctors-single-doctor1.html" class="btn btn__secondary btn__link btn__rounded">
              <span>Read More</span>
              <i class="icon-arrow-right"></i>
            </a>
                                <ul class="social-icons list-unstyled mb-0">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" class="phone"><i class="fas fa-phone-alt"></i></a></li>
                                </ul>
                                <!-- /.social-icons -->
                            </div>
                        </div>
                        <!-- /.member-info -->
                    </div>
                    <!-- /.member -->
                    <!-- Member #5 -->
                    <div class="member">
                        <div class="member__img">
                            <img src="assets/images/team/5.jpg" alt="member img">
                        </div>
                        <!-- /.member-img -->
                        <div class="member__info">
                            <h5 class="member__name"><a href="doctors-single-doctor1.html">Markus skar</a></h5>
                            <p class="member__job">Laboratory</p>
                            <p class="member__desc">Skar play a very important role in your health care. People working in the clinical laboratory are responsible for conducting tests that provide crucial information.</p>
                            <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                                <a href="doctors-single-doctor1.html" class="btn btn__secondary btn__link btn__rounded">
              <span>Read More</span>
              <i class="icon-arrow-right"></i>
            </a>
                                <ul class="social-icons list-unstyled mb-0">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" class="phone"><i class="fas fa-phone-alt"></i></a></li>
                                </ul>
                                <!-- /.social-icons -->
                            </div>
                        </div>
                        <!-- /.member-info -->
                    </div>
                    <!-- /.member -->
                    <!-- Member #6 -->
                    <div class="member">
                        <div class="member__img">
                            <img src="assets/images/team/6.jpg" alt="member img">
                        </div>
                        <!-- /.member-img -->
                        <div class="member__info">
                            <h5 class="member__name"><a href="doctors-single-doctor1.html">Kiano Barker</a></h5>
                            <p class="member__job">Pathologist </p>
                            <p class="member__desc">Barker help care for patients every day by providing their doctors with the information needed to ensure appropriate care. He also valuable resources for other physicians.</p>
                            <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                                <a href="doctors-single-doctor1.html" class="btn btn__secondary btn__link btn__rounded">
              <span>Read More</span>
              <i class="icon-arrow-right"></i>
            </a>
                                <ul class="social-icons list-unstyled mb-0">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" class="phone"><i class="fas fa-phone-alt"></i></a></li>
                                </ul>
                                <!-- /.social-icons -->
                            </div>
                        </div>
                        <!-- /.member-info -->
                    </div>
                    <!-- /.member -->
                </div>
                <!-- /.carousel -->
            </div>
            <!-- /.col-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
@endsection
