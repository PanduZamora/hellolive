<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hellolive.id</title>
    
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- BOOTSTRAP CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- SWIPER JS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- CUSTOM STYLE -->
    <link rel="stylesheet" href="css/style.css">
    <!-- favicon -->
    <link rel="shortcut icon" href="images/favicon.svg" type="image/x-icon">
</head>

<body>
    <!-- NAVIGATION SECTION -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-transparent" id="mainNavbar">
        <div class="container">
          <a class="navbar-brand" href="#">
              <img src="images/logo.svg" alt="Logo Hellolive">
          </a>
          <button class="navbar-toggler" type="button" id="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link smooth-scroll" aria-current="page" href="#about">About Hellolive</a>
              </li>
              <li class="nav-item">
                <a class="nav-link smooth-scroll" href="#facilities">Facility</a>
              </li>
              <li class="nav-item">
                <a class="nav-link smooth-scroll" href="#package">Package</a>
              </li>
              <li class="nav-item ms-3">
                <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#contactUsModal">
                    Contact us
                </a>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <!-- END OF NAVIGATION SECTION -->

    <!-- HERO SECTION -->
    <div class="hero">
        <img src="images/background/hero-background.svg" class="hero-background" alt="Hellolive background">
        <div class="hero-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 pt-5">
                        <h1 class="hero-title text-dark-blue mb-4">
                            Bring your events to live
                        </h1>
                        <h4 class="hero-subtitle fw-regular mb-5" style="opacity: .9">
                            <span>Podcast Studio</span>
                            <i data-feather="circle" class="feather-10 feather-filled mx-1"></i>
                            <span>Webinar</span>
                            <i data-feather="circle" class="feather-10 feather-filled mx-1"></i>
                            <span>Liveroom</span>
                        </h4>
                        <a 
                            href="#" 
                            class="btn btn-primary btn-lg shadow"
                            data-bs-toggle="modal"
                            data-bs-target="#contactUsModal"
                        >
                            Start an event
                        </a>
                    </div>
                    <div class="col-md-6 d-none d-md-block">
                        <img 
                            src="images/gallery/hellolive-1.jpg" 
                            class="hero-img-1 mb-5 shadow-lg br-1 ms-auto d-block" alt="Hellolive Podcast Room"
                        />
                        <img 
                            src="images/gallery/5.jpg" 
                            class="hero-img-2 shadow-lg br-1" 
                            alt="Hellolive Webinar"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF HERO SECTION -->

    <!-- ABOUT HELLOLIVE SECTION -->
    <section class="section-120" id="about">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-6 mb-5 mb-md-0">
                    <img src="images/thumbnail.png" class="img-fluid br-1" alt="">
                </div>
                <div class="col-md-6">
                    <h1 class="fw-bold mb-4 text-dark-blue">
                        What is Hellolive?
                    </h1>
                    <p>
                        Hellolive adalah ruang studio multifungsi dengan fasilitas dan peralatan rekaman lengkap yang dapat digunakan sebagai ruang podcast atau event online dan ideal bagi kalangan profesional maupun non-profesional.
                    </p>
                </div>    
            </div>
        </div>
    </section>
    <!-- END OF ABOUT HELLOLIVE SECTION -->

    <!-- SWIPER STREAMING PLATFORM -->
    <section class="py-4">
        <div class="container">
            <div class="swiper-streaming-platform">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="images/logo/facebook-live.png" class="img-fluid" alt="Facebook Live" />
                    </div>
                    <div class="swiper-slide">
                        <img src="images/logo/google-meet.png" class="img-fluid" alt="Google Meet" />
                    </div>
                    <div class="swiper-slide">
                        <img src="images/logo/live-ig.png" class="img-fluid" alt="Instagram Live" />
                    </div>
                    <div class="swiper-slide">
                        <img src="images/logo/periscope.png" class="height-80-xs" alt="Periscope" />
                    </div>
                    <div class="swiper-slide">
                        <img src="images/logo/vimeo-logo.png" class="img-fluid" alt="Vimeo" />
                    </div>
                    <div class="swiper-slide">
                        <img src="images/logo/youtube.png" class="img-fluid" alt="Periscope" />
                    </div>
                    <div class="swiper-slide">
                        <img src="images/logo/zoom-logo.png" class="img-fluid" alt="Zoom" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END OF SWIPER STREAMING PLATFORM -->

    <!-- FACILITES SECTION -->
    <section 
            class="section-100"
            id="facilities"
    >
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    <h1 class="fw-bold text-dark-blue">Hellolive Facilities</h1>
                    <p class="text-secondary mb-4">Ruang Hellolive dilengkapi dengan set peralatan rekaman lengkap untuk mengakomodir kebutuhan Anda.</p>
                </div>
                <div class="col-10">
                    <div class="row py-5 gy-3 gy-md-5">
                        <div class="col-md-3 col-6">
                            <div class="card border-0 bg-transparent">
                                <img src="images/icons/mic.svg" alt="Microphone">
                                <div class="card-body text-center px-0 px-md-1">
                                    <p class="text-dark-blue fw-500">Microphone</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="card border-0 bg-transparent">
                                <img src="images/icons/mixer.svg" alt="Microphone">
                                <div class="card-body text-center px-0 px-md-1">
                                    <p class="text-dark-blue fw-500">Mixer</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="card border-0 bg-transparent">
                                <img src="images/icons/sound.svg" alt="Sound Card">
                                <div class="card-body text-center px-0 px-md-1">
                                    <p class="text-dark-blue fw-500">Sound Card</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="card border-0 bg-transparent">
                                <img src="images/icons/chair.svg" alt="Chairs">
                                <div class="card-body text-center px-0 px-md-1">
                                    <p class="text-dark-blue fw-500">Chairs</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="card border-0 bg-transparent">
                                <img src="images/icons/table.svg" alt="Table">
                                <div class="card-body text-center px-0 px-md-1">
                                    <p class="text-dark-blue fw-500">Table</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="card border-0 bg-transparent">
                                <img src="images/icons/pc.svg" alt="Set PC">
                                <div class="card-body text-center px-0 px-md-1">
                                    <p class="text-dark-blue fw-500">Set PC</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="card border-0 bg-transparent">
                                <img src="images/icons/headphone.svg" alt="Headphones">
                                <div class="card-body text-center px-0 px-md-1">
                                    <p class="text-dark-blue fw-500">Headphones</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="card border-0 bg-transparent">
                                <img src="images/icons/camera.svg" alt="High Resolution Camera">
                                <div class="card-body text-center px-0 px-md-1">
                                    <p class="text-dark-blue fw-500">High Resolution Camera</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="card border-0 bg-transparent">
                                <img src="images/icons/wifi.svg" alt="High Speed Internet">
                                <div class="card-body text-center px-0 px-md-1">
                                    <p class="text-dark-blue fw-500">High Speed Internet</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="card border-0 bg-transparent">
                                <img src="images/icons/tv.svg" alt="LCD TV">
                                <div class="card-body text-center px-0 px-md-1">
                                    <p class="text-dark-blue fw-500">LCD TV</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="card border-0 bg-transparent">
                                <img src="images/icons/freeflow.svg" alt="Free Flow Refreshment">
                                <div class="card-body text-center px-0 px-md-1">
                                    <p class="text-dark-blue fw-500">Free Flow Refreshment</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="card border-0 bg-transparent">
                                <img src="images/icons/lighting.svg" alt="Lighting">
                                <div class="card-body text-center px-0 px-md-1">
                                    <p class="text-dark-blue fw-500">Lighting</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- END OF FACILITES SECTION -->

    <!-- WA Button -->
    <a href="http://bit.ly/vofficestudio" class="back-to-top" target="_blank"><i class="" ></i><img src="images/icons/whatsapp.svg" alt=""></a>


    <!-- CALL TO ACTION -->
    <section class="section-80 bg-dark-blue p-relative bg-gradient-blue">
        <div class="container">
            <div class="d-md-flex justify-content-between align-items-center text-center text-md-start">
                <p class="text-uppercase ls-10 text-light mb-4 mb-md-0 fs-1">Start your event now</p>
                <div>
                    <a 
                        href="#" 
                        class="btn btn-light shadow btn-lg mb-0 fw-500 text-inter"
                        data-bs-toggle="modal"
                        data-bs-target="#contactUsModal"
                    >
                        <i data-feather="phone" class="me-2"></i>
                        Contact us
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- END CALL TO ACTION -->

    <!-- START GALLERY SECTION -->
    <section class="section-120">
        <div class="container">
            <div class="col-12 text-center">
                <h1 class="fw-bold fs-1 mb-7">
                    We have accomodate multiple events
                    <br class="d-none d-md-block" />
                    now it???s your turn
                </h1>
            </div>
            <div id="container" class="cols">
                <div class="box one">
                    <img src="images/clients/1.jpg" class="masonry-img">
                </div>
                <div class="box two">
                    <img src="images/clients/2.jpg" class="masonry-img">
                </div>
                <div class="box three">
                    <img src="images/gallery/hellolive-4.jpg" class="masonry-img">
                </div>
                <div class="box four">
                    <img src="images/clients/3.jpg" class="masonry-img">
                </div>
                <div class="box five">
                    <img src="images/gallery/10.jpg" class="masonry-img">
                </div>
                <div class="box six">
                    <img src="images/gallery/6.jpg" class="masonry-img">
                </div>
            </div>
        </div>
    </section>
    <!-- END OF GALLERY SECTION -->

    <!-- START LOCATION SECTION -->

    <section class="section-120"  style="background-color: #58c7e1;
    background-image: linear-gradient(115deg, #58c7e1 0%, #B721FF 100%);
    
    ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 text-center text-md-start">
                    <h1 class="display-2 fw-bold mb-7 text-light">Our Location</h1>
                </div>
                <div class="col-10 col-md-8">
                    <div class="row justify-content-center g-4">
                        <div class="col-md-5">
                            <div class="card border-0 shadow br-1 p-1">
                                <div class="card-body">
                                    <img src="images/podcast-room.jpg" class="img-fluid br-1 shadow mb-4" alt="Centennial Tower" />
                                    <p class="fs-4 fw-bold">Centennial Tower</p>
                                    <p>Level 29F, Jl. Jendral Gatot Subroto No. 27 Jakarta Selatan</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card border-0 shadow br-1 p-1" style="background-color: rgba(255,255,255, 0.7)">
                                <div class="ribbon ribbon-top-left"><span>free trial</span></div>
                                <div class="card-body">
                                    <img src="images/mrt-bundaran-hi.jpg" class="img-fluid br-1 shadow mb-4" alt="Centennial Tower" />
                                    <p class="fs-4 fw-bold">MRT Bundaran HI</p>
                                    <p>Jl. MH Thamrin, Gondangdia, Menteng, Jakarta Pusat</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- END OF LOCATION SECTION -->

    <!-- START PACKAGE SECTION -->
    <section class="section-120 bg-gradient-blue" id="package">
        <div class="container">
            <h1 class="text-center display-4 fw-bold text-light mb-6">Package</h1>
            <div class="row g-4 justify-content-center justify-content-md-start">
                <div class="col-10 col-md-4">
                    <div class="card bg-light py-5 br-1 z-3 shadow">
                        <img src="images/icons/package-1.svg" class="w-50 d-block mx-auto">
                        <div class="card-body text-center">
                            <h3 class="fw-bold text-dark-blue mb-4">
                                Live Room Rental
                            </h3>
                            <h5 class="mb-5">
                                IDR 500.000 / Hour
                            </h5>
                            <a 
                                href="#" 
                                class="btn btn-primary shadow" 
                                data-bs-toggle="modal"
                                data-bs-target="#contactUsModal"
                            >
                                Hubungi Kami
                            </a>
                        </div>
                    </div>
                    <div class="card bg-light pt-5" style="margin-top: -2rem;">
                        <div class="card-body">
                            <p class="text-center fs-5 fw-bold mb-4 mt-3">Benefits</p>
                            <ul class="list-group list-group-flush fw-500">
                                <li class="list-group-item bg-transparent rounded-0">
                                    <i data-feather="check" class="text-success"></i>
                                    Koneksi Internet hingga 100mbps
                                </li>
                                <li class="list-group-item bg-transparent rounded-0">
                                    <i data-feather="check" class="text-success"></i>
                                    Podcast Equipment Set <br>
                                    <span class="text-secondary small">
                                        (2 Webcams, 2 Microphone, Sound Mixer, Sound Card)
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-10 col-md-4">
                    <div class="card bg-light py-5 br-1 z-3 shadow">
                        <img src="images/icons/package-2.svg" class="w-50 d-block mx-auto">
                        <div class="card-body text-center">
                            <h3 class="fw-bold text-dark-blue mb-4">
                                All in One Package
                            </h3>
                            <h5 class="mb-5">
                                IDR 2.000.000 / Hour
                            </h5>
                            <a 
                                href="#" 
                                class="btn btn-primary shadow" 
                                data-bs-toggle="modal"
                                data-bs-target="#contactUsModal"
                            >
                                Hubungi Kami
                            </a>
                        </div>
                    </div>
                    <div class="card bg-light pt-5" style="margin-top: -2rem;">
                        <div class="card-body">
                            <p class="text-center fs-5 fw-bold mb-4 mt-3">Benefits</p>
                            <ul class="list-group list-group-flush fw-500">
                                <li class="list-group-item bg-transparent rounded-0">
                                    <i data-feather="check" class="text-success"></i>
                                    Koneksi Internet hingga 100mbps
                                </li>
                                <li class="list-group-item bg-transparent rounded-0">
                                    <i data-feather="check" class="text-success"></i>
                                    Operator
                                </li>
                                <li class="list-group-item bg-transparent rounded-0">
                                    <i data-feather="check" class="text-success"></i>
                                    Ticketing
                                </li>
                                <li class="list-group-item bg-transparent rounded-0">
                                    <i data-feather="check" class="text-success"></i>
                                    Event Promotion
                                </li>
                                <li class="list-group-item bg-transparent rounded-0">
                                    <i data-feather="check" class="text-success"></i>
                                    Additional Event Content
                                </li>
                                <li class="list-group-item bg-transparent rounded-0">
                                    <i data-feather="check" class="text-success"></i>
                                    Recording
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-10 col-md-4">
                    <div class="card bg-light py-5 br-1 z-3 shadow">
                        <img src="images/icons/package-3.svg" class="w-50 d-block mx-auto">
                        <div class="card-body text-center">
                            <h3 class="fw-bold text-dark-blue mb-4">
                                Other Service Rent
                            </h3>
                            <h5 class="mb-5">
                                Negotiable Price
                            </h5>
                            <a 
                                href="#" 
                                class="btn btn-primary shadow" 
                                data-bs-toggle="modal"
                                data-bs-target="#contactUsModal"
                            >
                                Hubungi Kami
                            </a>
                        </div>
                    </div>
                    <div class="card bg-light pt-5" style="margin-top: -2rem;">
                        <div class="card-body">
                            <p class="text-center fs-5 fw-bold mb-4 mt-3">Choose one</p>
                            <ul class="list-group list-group-flush fw-500">
                                <li class="list-group-item bg-transparent rounded-0">
                                    <i data-feather="chevron-right" class="text-success"></i>
                                    Videographer
                                </li>
                                <li class="list-group-item bg-transparent rounded-0">
                                    <i data-feather="chevron-right" class="text-success"></i>
                                    Photographer
                                </li>
                                <li class="list-group-item bg-transparent rounded-0">
                                    <i data-feather="chevron-right" class="text-success"></i>
                                    Social Media Promotion
                                </li>
                                <li class="list-group-item bg-transparent rounded-0">
                                    <i data-feather="chevron-right" class="text-success"></i>
                                    Operator
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- END OF PACKAGE SECTION -->

    <!-- START CONTACT US SECTION -->
    
    <section class="section-100" style="background: #f5f6f8">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-11 col-md-6">
                    <div class="card shadow-lg border-0 br-1 py-4 px-3">
                        <div class="card-body">
                            <h1 class="text-center fw-bold mb-6">Get In Touch</h1>
                            <form class="form-email">

                                <input type="text" name="hellolive_inquiry" hidden="hidden" value="hellolive_inquiry" class="field-changer">

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="email">
                                  </div>

                                  <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name">
                                  </div>

                                  <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="phone">
                                  </div>

                                  <div class="mb-5">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" id="message"></textarea>
                                  </div>

                                  <button type="submit" class="btn btn-primary w-100">
                                      Submit
                                  </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- END OF CONTACT US SECTION -->


    <!-- START MODAL SECTION -->
    <div class="modal fade" id="contactUsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">
                        Hubungi Kami
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form class="form-email">

                        <input type="text" name="hellolive_inquiry" hidden="hidden" value="hellolive_inquiry" class="field-changer">

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email">
                          </div>

                          <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name">
                          </div>

                          <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone">
                          </div>

                          <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message"></textarea>
                          </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Kirim</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF MODAL SECTION -->

    <!-- FOOTER -->

    <footer id="footer" class="footer bg-light">
    
    <section class="section">

    <div class="footer-top">
        <hr class="mt-4 border-footer">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 col-md-12 footer-info">
            <a href="index.php" class="logo d-flex align-items-center">
              <img src="images/logo.svg" alt="Hellolive Logo">
            </a>
            <p class="about-footer">Hellolive adalah ruang studio multifungsi dengan fasilitas dan peralatan rekaman lengkap yang dapat digunakan sebagai ruang podcast atau event online dan ideal bagi kalangan profesional maupun non-profesional.</p>

            <div class="social-links mt-3">
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram bx bxl-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin bx bxl-linkedin"></i></a>
            </div>

            <div class="col-lg footer-links">
                <h4>Useful Links</h4>
                <p>
                    <a href="index.php#about">About us</a>, 
                    <a href="index.php#facilities">Facilities</a>, 
                    <a href="index.php#package">Package</a>, 
                    <a href="#" data-bs-toggle="modal" data-bs-target="#contactUsModal">Contact Us</a>
                </p>
            </div>
          </div>

          <div class="col-lg-6 col-md-12 footer-contact text-center text-md-start">
            <h4 class="text-dark-blue contact-us">Contact Us</h4>
            <p class="contact-us">
              <strong class="strong-footer">Centennial Tower</strong><br>
              Level 29 Unit D-F, Jl. Jend Gatot Suboto Kav 24-25, Karet Semanggi, Jakarta Selatan 12950<br><br>

              <strong>Phone:</strong> +6221 2922 2999<br>
              <strong>Whatsapp:</strong> <a href="http://bit.ly/vofficestudio" target="_blank"> +6282 2999 80022</a><br>
            </p>

          </div>

        </div>
      </div>

      <div class="copyrights">
          <div class="container text-center">
              <span>?? Copyright 2021 <a href="index.php">hellolive.id</a> - All Rights Reserved</span>
          </div>
      </div>

    </div>

    </section>

  </footer>

</body>

<!-- BOOTSTRAP JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<!-- SWIPER JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    const swiper = new Swiper('.swiper-streaming-platform', {
        direction: 'horizontal',
        breakpoints: {
            320: {
                slidesPerView: 3,
                spaceBetween: 50
            },
            600: {
                slidesPerView: 4,
                spaceBetween: 80
            },
            768: {
                slidesPerView: 5,
                spaceBetween: 100
            }
        },
        autoplay: {
            delay: 2000
        },
        loop: true
    });
</script>

<!-- JQUERY CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- FEATHER ICONS -->
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace();
</script>

<!-- APP JS -->
<script src="js/main.js"></script>
<script src="js/scripts.js"></script>

</html>