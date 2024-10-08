<?php
include './config/database.php';

session_start();

if (isset($_SESSION['author_id'])) {
    $id = $_SESSION['author_id'];
    $users_query = "SELECT * FROM users WHERE id='$id'";
    $conncet = mysqli_query($db, $users_query);
    $user = mysqli_fetch_assoc($conncet);
} else {
    $users_query = "SELECT * FROM users";
    $conncet = mysqli_query($db, $users_query);
    $user = mysqli_fetch_assoc($conncet);
}

// service staer here....!!

$services_query = "SELECT * FROM services WHERE status='active'";
$services = mysqli_query($db, $services_query);

// service staer here...!!

// reviews start here....!!

$services_query = "SELECT * FROM reviews WHERE status='active'";
$reviews = mysqli_query($db, $services_query);

// portfolio start here....!!
$portfolio_query = "SELECT * FROM portfolio";
$portfolio = mysqli_query($db, $portfolio_query);

// portfolio active start here....!!
$portfolio_query = "SELECT * FROM portfolio WHERE status='active'";
$portfolio = mysqli_query($db, $portfolio_query);

// about active start here....!!
$about_query = "SELECT * FROM about WHERE status='active'";
$abouts = mysqli_query($db, $about_query);

// education active start here....!!
$education_query = "SELECT * FROM education WHERE status='active'";
$education = mysqli_query($db, $education_query);

// education active start here....!!
$quotes_query = "SELECT * FROM quotes WHERE status='active'";
$quotes = mysqli_query($db, $quotes_query);

// contacts active start here....!!
$contacts_query = "SELECT * FROM contacts WHERE status='active'";
$contacts = mysqli_query($db, $contacts_query);

?>




<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Personal Portfolio</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="./public/update/defult/sabbir (1).png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="../Dashboard/public/frontent/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Dashboard/public/frontent/css/animate.min.css">
    <link rel="stylesheet" href="../Dashboard/public/frontent/css/magnific-popup.css">
    <link rel="stylesheet" href="../Dashboard/public/frontent/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../Dashboard/public/frontent/css/flaticon.css">
    <link rel="stylesheet" href="../Dashboard/public/frontent/css/slick.css">
    <link rel="stylesheet" href="../Dashboard/public/frontent/css/aos.css">
    <link rel="stylesheet" href="../Dashboard/public/frontent/css/default.css">
    <link rel="stylesheet" href="../Dashboard/public/frontent/css/style.css">
    <link rel="stylesheet" href="../Dashboard/public/frontent/css/responsive.css">
</head>

<body class="theme-bg">

    <!-- preloader -->
    <div id="preloader">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_one"></div>
                <div class="object" id="object_two"></div>
                <div class="object" id="object_three"></div>
            </div>
        </div>
    </div>
    <!-- preloader-end -->

    <!-- header-start -->
    <header>
        <div id="header-sticky" class="transparent-header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="main-menu">
                            <nav class="navbar navbar-expand-lg">
                                <a href="index.html" class="navbar-brand logo-sticky-none">
                                    <h1 style="color: #8cc090;">SABBIR</h1>
                                </a>
                                <a href="index.html" class="navbar-brand s-logo-none">
                                    <h1 style="color: #8cc090;">SABBIR</h1>
                                </a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarNav">
                                    <span class="navbar-icon"></span>
                                    <span class="navbar-icon"></span>
                                    <span class="navbar-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item active"><a class="nav-link" href="#home">Home</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#about">about</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#service">service</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#portfolio">portfolio</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>

                                        <?php if (isset($_SESSION['author_id'])) : ?>
                                            <li class="nav-item"><a class="nav-link" href="../Dashboard/dashboard/home/home.php">Dashboard</a></li>
                                        <?php else: ?>
                                            <li class="nav-item"><a class="nav-link" href="./dashtools/login.php">Login/Register</a></li>
                                        <?php endif; ?>

                                    </ul>
                                </div>
                                <div class="header-btn">
                                    <a href="#" class="off-canvas-menu menu-tigger"><i class="flaticon-menu"></i></a>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- offcanvas-start -->
        <div class="extra-info">
            <div class="close-icon menu-close">
                <button>
                    <i class="far fa-window-close"></i>
                </button>
            </div>
            <div class="logo-side mb-30">
                <a href="index-2.html">
                    <img src="./public/frontent/img/logo/logo.png" alt="" />
                </a>
            </div>
            <?Php foreach ($contacts as $contact): ?>
                <div class="side-info mb-30">
                    <div class="contact-list mb-30">
                        <h4>Permanent Address</h4>
                        <p><?= $contact['addares'] ?></p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Phone Number</h4>
                        <p>+088-0 <?= $contact['number'] ?></p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Email Address</h4>
                        <p><?= $_SESSION['author_email'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="social-icon-right mt-20">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-google-plus-g"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div class="offcanvas-overly"></div>
        <!-- offcanvas-end -->
    </header>
    <!-- header-end -->

    <!-- main-area -->
    <main>

        <!-- banner-area -->
        <section id="home" class="banner-area banner-bg fix">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-7 col-lg-6">
                        <div class="banner-content">
                            <h6 class="wow fadeInUp" data-wow-delay="0.2s">HELLO!</h6>
                            <?php if (isset($_SESSION['author_id'])) : ?>
                                <h2 class="wow fadeInUp" data-wow-delay="0.4s">I am <?= $user['name'] ?></h2>
                            <?php else : ?>
                                <h2 class="wow fadeInUp" data-wow-delay="0.4s">I am <?= $user['name'] ?></h2>
                            <?php endif; ?>
                            <p class="wow fadeInUp" data-wow-delay="0.6s">HI ! i am Sabbir Hossain. I love Programing i like to learn and know new things. My dream is to work with Microsoft company.</p>
                            <div class="banner-social wow fadeInUp" data-wow-delay="0.8s">
                                <ul>
                                    <li><a href="https://www.facebook.com/profile.php?id=100041356129062&mibextid=ZbWKwL"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://www.instagram.com/sabbir1811123?igsh=cTRjeXZ5MDZ0aW93"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="www.linkedin.com/in/sabbir-hossain-102429327"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="https://github.com/SabbirHossain1811"><i class="fab fa-github"></i></a></li>
                                </ul>
                            </div>
                            <a href="#" class="btn wow fadeInUp" data-wow-delay="1s">SEE PORTFOLIOS</a>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                        <div class="banner-img text-right">
                            <?php if ($user['image'] == 'cat.jpg') : ?>
                                <img style="width: 800px; margin-right:100px; margin-top:-400px;" src="../Dashboard/public/update/defult/<?= $user['image'] ?>">
                            <?php else : ?> 
                                <img style="width: 900px;" src="../Dashboard/public/update/profile/<?= $user['image'] ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-shape"><img src="./public/frontent/img/shape/dot_circle.png" class="rotateme" alt="img"></div>
        </section>
        <!-- banner-area-end -->

        <!-- about-area-->
        <?Php foreach ($abouts as $about): ?>
            <section id="about" class="about-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="about-img">
                                <img style="width: 600px; height:800px;" src="../Dashboard/public/update/aboutt/<?= $about['image'] ?>" alt="me-01">
                            </div>
                        </div>
                        <div class="col-lg-6 pr-90">
                            <div class="section-title mb-25">
                                <span>Introduction</span>
                                <h2>About Me</h2>
                            </div>
                            <div class="about-content">
                                <p><?= $about['description'] ?></p>
                                <span>
                                    <p> HTML : HyperText Markup Language. <br>
                                        CSS : Cascading Style Sheets <br>
                                        JS : JAVASCRIPT <br>
                                        PHP : Hypertext Preprocessor.
                                    </p>

                                </span>
                                <h3>SKILLS :</h3>
                            </div>
                            <!-- Education Item -->
                            <?php foreach ($education as $educatio) : ?>
                                <div class="education">
                                    <div class="year"><?= $educatio['year'] ?></div>
                                    <div class="line"></div>
                                    <div class="location">
                                        <span "><?= $educatio['description'] ?></span>
                                    <div class=" progressWrapper">
                                            <div class="progress">
                                                <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width:<?= $educatio['skill'] ?>;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                    </div>
                                </div>
                        </div>
                    <?php endforeach; ?>

                    <!-- End Education Item -->
                    </div>
                </div>
                </div>
            </section>
        <?php endforeach; ?>
        <!-- about-area-end -->

        <!-- Services-area -->
        <section id="service" class="services-area pt-120 pb-50">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-70">
                            <span>WHAT WE DO</span>
                            <h2>Services and Solutions</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($services as $service) : ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="icon_box_01 wow fadeInLeft" data-wow-delay="0.2s">

                                <i class="<?= $service['icon'] ?>"></i>
                                <h3><?= $service['title'] ?></h3>
                                <p>
                                    <?= $service['description'] ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!-- Services-area-end -->

        <!-- Portfolios-area -->
        <section id="portfolio" class="portfolio-area primary-bg pt-120 pb-90">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-70">
                            <span>Portfolio Showcase</span>
                            <h2>My Recent Best Works</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($portfolio as $portfoli) : ?>
                        <div class="col-lg-4 col-md-6 pitem">
                            <div class="speaker-box">
                                <div class="speaker-thumb">
                                    <img style="height: 600px ; object-fit:cover;" src="../Dashboard/public/update/portfolios/<?= $portfoli['image'] ?>" alt="img">
                                </div>
                                <div class="speaker-overlay">
                                    <span>
                                        <?= $portfoli['subtitle'] ?>
                                    </span>
                                    <h4><a href="portfolio-single.html">
                                            <?= $portfoli['title'] ?>
                                        </a></h4>
                                    <a href="../Dashboard/dashboard/portfolio/singel.php?singelid=<?= $portfoli['id'] ?>" class="arrow-btn">More information <span></span></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!-- services-area-end -->


        <!-- fact-area -->
        <!-- fact-area -->
        <section class="fact-area">
            <div class="container">
                <div class="fact-wrap">
                    <div class="row justify-content-between">
                        <?php foreach ($reviews as $review) : ?>
                            <div class="col-xl-2 col-lg-3 col-sm-6">
                                <div class="fact-box text-center mb-50">
                                    <div class="fact-icon">
                                        <i class="<?= $review['icon'] ?>"></i>
                                    </div>
                                    <div style="margin-top: -30px;" class="fact-content">
                                        <span style="font-size: 40px;"><?= $review['title'] ?></span>
                                        <p style="font-weight: bold; font-size:16px;"><?= $review['description'] ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- fact-area-end -->

        <!-- testimonial-area -->
        <section class="testimonial-area primary-bg pt-115 pb-115">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-70">
                            <span>testimonial</span>
                            <h2>happy customer quotes</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-9 col-lg-10">
                        <div class="testimonial-active">
                            <?php foreach ($quotes as $quote) : ?>

                                <div class="single-testimonial text-center">
                                    <div class="testi-avatar">
                                        <img style="width: 100px; height:100px; border-radius:50%;" src="../Dashboard/public/update/quotes/<?= $quote['image'] ?>" alt="img">
                                    </div>
                                    <div style="margin-top: -20px;" class="testi-content">
                                        <h4><span>“</span><?= $quote['description'] ?><span>”</span></h4>
                                        <div style="margin-top: -10px;" class="testi-avatar-info">
                                            <h5> <?= $quote['title'] ?></h5>
                                            <span><?= $quote['subtitle'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- testimonial-area-end -->

        <!-- brand-area -->
        <div class="barnd-area pt-100 pb-100">
            <div class="container">
                <div class="row brand-active">
                    <div class="col-xl-2">
                        <div class="single-brand">
                            <img src="../Dashboard/public/update/brand/brand_img01.png" alt="img">
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="single-brand">
                            <img style="width: 120px; margin-top:-25px;" src="../Dashboard/public/update/defult/pngwing.com (1).png" alt="img">
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="single-brand">
                            <img src="../Dashboard/public/update/brand/brand_img02.png" alt="img">
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="single-brand">
                            <img style="width: 140px;margin-top:-25px;" src="../Dashboard/public/update/defult/pngwing.com.png" alt="img">
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="single-brand">
                            <img style="width: 120px; margin-top:-25px;" src="../Dashboard/public/update/defult/pngwing.com (1).png" alt="img">
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="single-brand">
                            <img src="../Dashboard/public/update/brand/brand_img05.png" alt="img">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- brand-area-end -->

        <!-- contact-area -->
        <section id="contact" class="contact-area primary-bg pt-120 pb-120">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="section-title mb-20">
                            <span>information</span>
                            <h2>Contact Information</h2>
                        </div>
                        <?Php foreach ($contacts as $contact): ?>
                            <div class="contact-content">
                                <p>Event definition is - somthing that happens occurre How evesnt sentence. Synonym when an unknown printer took a galley.</p>
                                <h5>NATIONOLILY <span>BANGLADESHi</span></h5>
                                <div class="contact-list">
                                    <ul>
                                        <li><i class="fas fa-map-marker"></i><span>Address :</span> <?= $contact['addares'] ?></li>
                                        <li><i class="fas fa-headphones"></i><span>Phone :</span>+088-0 <?= $contact['number'] ?></li>
                                        <li><i class="fas fa-globe-asia"></i><span>e-mail :</span><?= $_SESSION['author_email'] ?></li>
                                    </ul>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-form">
                            <form action="./dashboard/email/action.php" method="POST">
                                <input type="text" placeholder="your name *" name="name">
                                <input type="email" placeholder="your email *" name="email" style="text-transform: lowercase !important;">
                                <textarea name="body" id="message" placeholder="your message *"></textarea>
                                <button class="btn" name="sent_email" type="submit">SEND</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-area-end -->

    </main>
    <!-- main-area-end -->

    <!-- footer -->
    <footer>
        <div class="copyright-wrap">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="copyright-text text-center">
                            <p>Copyright© <span>SABBIR</span> | All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer-end -->





    <!-- JS here -->
    <script src="../Dashboard/public/frontent/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="../Dashboard/public/frontent/js/popper.min.js"></script>
    <script src="../Dashboard/public/frontent/js/bootstrap.min.js"></script>
    <script src="../Dashboard/public/frontent/js/isotope.pkgd.min.js"></script>
    <script src="../Dashboard/public/frontent/js/one-page-nav-min.js"></script>
    <script src="../Dashboard/public/frontent/js/slick.min.js"></script>
    <script src="../Dashboard/public/frontent/js/ajax-form.js"></script>
    <script src="../Dashboard/public/frontent/js/wow.min.js"></script>
    <script src="../Dashboard/public/frontent/js/aos.js"></script>
    <script src="../Dashboard/public/frontent/js/jquery.waypoints.min.js"></script>
    <script src="../Dashboard/public/frontent/js/jquery.counterup.min.js"></script>
    <script src="../Dashboard/public/frontent/js/jquery.scrollUp.min.js"></script>
    <script src="../Dashboard/public/frontent/js/imagesloaded.pkgd.min.js"></script>
    <script src="../Dashboard/public/frontent/js/jquery.magnific-popup.min.js"></script>
    <script src="../Dashboard/public/frontent/js/plugins.js"></script>
    <script src="../Dashboard/public/frontent/js/main.js"></script>
</body>

</html>