<?php
session_start();
include './config/database.php';

if(isset($_SESSION['author_id'])){

    $id = $_SESSION['author_id'];
    $user_info = "SELECT * FROM users WHERE id='$id'";
    $connect = mysqli_query($dbm,$user_info);
    $user = mysqli_fetch_assoc($connect);
}else{

    $user_info = "SELECT * FROM users ";
    $connect = mysqli_query($dbm,$user_info);
    $user = mysqli_fetch_assoc($connect);
}

$service_query = "SELECT * FROM services WHERE status='active'";
$service = mysqli_query($dbm,$service_query);


$fact_query = "SELECT * FROM facts WHERE status='active'";
$facts = mysqli_query($dbm,$fact_query);


$port_query = "SELECT * FROM portfolios WHERE status='active'";
$portfolios = mysqli_query($dbm,$port_query);

$port_query = "SELECT * FROM testimonials WHERE status='active'";
$testimonials = mysqli_query($dbm,$port_query);


$skill_query = "SELECT * FROM skills WHERE status='active'";
$skills = mysqli_query($dbm,$skill_query);

$social_query = "SELECT * FROM socials WHERE status='active'";
$socials = mysqli_query($dbm,$social_query);

$social_query = "SELECT * FROM brands WHERE status='active'";
$brands = mysqli_query($dbm,$social_query);
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Kufa - Personal Portfolio HTML5 Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" type="image/x-icon" href="../public2/frontend/img/favicon.png">
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="../public2/frontend/css/bootstrap.min.css">
        <link rel="stylesheet" href="../public2/frontend/css/animate.min.css">
        <link rel="stylesheet" href="../public2/frontend/css/magnific-popup.css">
        <link rel="stylesheet" href="../public2/frontend/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="../public2/frontend/css/flaticon.css">
        <link rel="stylesheet" href="../public2/frontend/css/slick.css">
        <link rel="stylesheet" href="../public2/frontend/css/aos.css">
        <link rel="stylesheet" href="../public2/frontend/css/default.css">
        <link rel="stylesheet" href="../public2/frontend/css/style.css">
        <link rel="stylesheet" href="../public2/frontend/css/responsive.css">
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
                                    <a href="index.html" class="navbar-brand logo-sticky-none"><img src="../public2/frontend/img/logo/logo.png" alt="Logo"></a>
                                    <a href="index.html" class="navbar-brand s-logo-none"><img src="../public2/frontend/img/logo/s_logo.png" alt="Logo"></a>
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
                                            <?php if(isset($_SESSION['author_id'])) : ?>
                                            <li class="nav-item"><a class="nav-link" href="./sign.php">Dashboard</a></li>
                                            <?php else: ?>
                                            <li class="nav-item"><a class="nav-link" href="./sign.php">Login/Registration</a></li>
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
                        <img src="../public2/frontend/img/logo/logo.png" alt="" />
                    </a>
                </div>
                <div class="side-info mb-30">
                    <div class="contact-list mb-30">
                        <h4>Office Address</h4>
                        <p>123/A, Miranda City Likaoli
                            Prikano, Dope</p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Phone Number</h4>
                        <p>+0989 7876 9865 9</p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Email Address</h4>
                        <p>info@example.com</p>
                    </div>
                </div>
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
                                <h2 class="wow fadeInUp" data-wow-delay="0.4s">I am <?= $user['name'] ?></h2>
                                <p class="wow fadeInUp" data-wow-delay="0.6s"><?= (isset($user['id'])) ? $user['bio'] : '';  ?></p>
                                
                        
                                <div class="banner-social wow fadeInUp" data-wow-delay="0.8s">
                                    <ul>
                                        <?php 
                                        foreach($socials as $social) : 
                                        ?>

                                        <li><a target="_blank" href="<?= $social['link'] ?>"><i class="<?= $social['icon'] ?>"></i></a></li>
                                        
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <a href="#portfolio"  class="btn wow fadeInUp" data-wow-delay="1s">SEE PORTFOLIOS</a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                            <div class="banner-img text-right">
                                <?php if($user['image'] == 'default.jpeg') : ?>
                                <img src="../public2/uploads/default/<?= $user['image'] ?>" alt="" style="width: 600px; height: 600px; border-radius: 50%; border: 5px solid gold">
                                <?php else : ?>
                                <img src="../public2/uploads/profile/<?= $user['image'] ?>" alt="" style="width: 700px; height: 700px; border-radius: 50%; border: 5px solid gold">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-shape"><img src="../public2/frontend/img/shape/dot_circle.png" class="rotateme" alt="img"></div>
            </section>
            <!-- banner-area-end -->

            <!-- about-area-->
            <section id="about" class="about-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="about-img">
                                <img src="../public2/frontend/img/banner/banner_img2.png" title="me-01" alt="me-01">
                            </div>
                        </div>
                        <div class="col-lg-6 pr-90">
                            <div class="section-title mb-25">
                                <span>Introduction</span>
                                <h2>About Me</h2>
                            </div>
                            <div class="about-content">
                                <p><?= (isset($user['id'])) ? $user['about'] : ''; ?></p>
                                <h3>Education:</h3>
                            </div>
                            <!-- Education Item -->
                             <?php foreach($skills as $skill): ?>
                            <div class="education">
                                <div class="year"><?= $skill['year'] ?></div>
                                <div class="line"></div>
                                <div class="location">
                                    <span><?= $skill['title'] ?></span>
                                    <div class="progressWrapper">
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width: <?= $skill['ratio'] ?>%;" aria-valuenow="<?= $skill['ratio'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
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
                        <?php foreach($service as $service) : ?>
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
                        <?php foreach($portfolios as $portfolio) :?>
                        <div class="col-lg-4 col-md-6 pitem">
                            <div class="speaker-box">
								<div class="speaker-thumb">
									<img style="height: 500px; object-fit:cover" src="../public2/uploads/portfolio/<?= $portfolio['image'] ?>" alt="img">
								</div>
								<div class="speaker-overlay">
									<span><?= $portfolio['subtitle'] ?></span>
									<h4><a href="portfolio-single.html"><?= $portfolio['title'] ?></a></h4>
									<a href="./backend/portfolio/single.php?portid=<?= $portfolio['id'] ?>" class="arrow-btn">More information <span></span></a>
								</div>
							</div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
            <!-- Portfolios-area-end -->


            <!-- fact-area -->
            <section class="fact-area">
                <div class="container">
                    <div class="fact-wrap">
                        <div class="row justify-content-between">
                            <?php foreach($facts as $fact) : ?>
                            <div class="col-xl-2 col-lg-3 col-sm-6">
                                <div class="fact-box text-center mb-50">
                                    <div class="fact-icon">
                                        <i class="<?= $fact['icon'] ?>"></i>
                                    </div>
                                    <div class="fact-content">
                                        <h2><span class="count"><?= $fact['count'] ?></span></h2>
                                        <span><?= $fact['shortdescription'] ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ; ?>
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
                                <?php foreach($testimonials as $testimonial) : ?>
                                    <div class="single-testimonial text-center">
                        
                                    
                                    <div class="testi-avatar">
                                        <img style="height: 150px; width: 150px; border-radius:50%; border: 5px solid gray; " src="../public2/uploads/testimonial/<?= $testimonial['image'] ?>" alt="img">
                                    </div>
                                    <div class="testi-content">
                                        <h4 style="text-align: justify;"><span>“</span > <?= $testimonial['description'] ?><span>”</span></h4>
                                        <div class="testi-avatar-info" style="margin-bottom: 100px; margin-top:-30px">
                                            <h5><?= $testimonial['name'] ?></h5>
                                            <span><?= $testimonial['designation'] ?></span>
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
                        
                        <?php foreach($brands as $brand) : ?>
                        <div class="col-xl-2" style="margin-left: 20px; ">
                            <div class="single-brand">
                                <img style="height: 130px; width: 130px; border: 5px solid gold; border-radius:50%" src="../public2/uploads/brand/<?= $brand['image'] ?>" alt="img">
                            </div>
                        </div>
                        <?php endforeach; ?>
                        
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
                            <div class="contact-content">
                                <p>"Experienced web developer with a strong background in front-end and back-end technologies. Proficient in HTML, CSS, JavaScript, PHP, and Laravel. Passionate about creating responsive, user-friendly websites.</p>
                                <h5>OFFICE IN <span>PABNA</span></h5>
                                <div class="contact-list">
                                    <ul>
                                        <li><i class="fas fa-map-marker"></i><span>Address :</span>Santhia - Pabna - Rajshahi</li>
                                        <li><i class="fas fa-headphones"></i><span>Phone :</span>+8801773172703</li>
                                        <li><i class="fas fa-globe-asia"></i><span>e-mail :</span>mdabirhossain.bd.info@gmail.com</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-form">

                                <?php if(isset($_SESSION['sendmail'])) : ?>
                                <div id="emailHelp" class="form-text text-success " style="font-weight: bold; margin-bottom:20px"><?= $_SESSION['sendmail'] ?></div>
                                <?php endif; unset($_SESSION['sendmail']); ?>


                                <?php if(isset($_SESSION['sendingFail'])) : ?>
                                <div id="emailHelp" class="form-text text-danger " style="font-weight: bold; margin-bottom:20px"><?= $_SESSION['sendingFail'] ?></div>
                                <?php endif; unset($_SESSION['sendingFail']); ?>

                                <form action="./backend/mail/action.php" method="POST">
                                    <input type="text" placeholder="your name *" name="name">
                                    <input style="text-transform: lowercase !important;" type="email" placeholder="your email *" name="email">
                                    <textarea name="body" id="message" placeholder="your message *"></textarea>
                                    <button name="front_mail" type="submit" class="btn">SEND</button>
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
                                <p>Copyright© <span>Kufa</span> | All Rights Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-end -->





		<!-- JS here -->
        <script src="../public2/frontend/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="../public2/frontend/js/popper.min.js"></script>
        <script src="../public2/frontend/js/bootstrap.min.js"></script>
        <script src="../public2/frontend/js/isotope.pkgd.min.js"></script>
        <script src="../public2/frontend/js/one-page-nav-min.js"></script>
        <script src="../public2/frontend/js/slick.min.js"></script>
        <script src="../public2/frontend/js/ajax-form.js"></script>
        <script src="../public2/frontend/js/wow.min.js"></script>
        <script src="../public2/frontend/js/aos.js"></script>
        <script src="../public2/frontend/js/jquery.waypoints.min.js"></script>
        <script src="../public2/frontend/js/jquery.counterup.min.js"></script>
        <script src="../public2/frontend/js/jquery.scrollUp.min.js"></script>
        <script src="../public2/frontend/js/imagesloaded.pkgd.min.js"></script>
        <script src="../public2/frontend/js/jquery.magnific-popup.min.js"></script>
        <script src="../public2/frontend/js/plugins.js"></script>
        <script src="../public2/frontend/js/main.js"></script>
    </body>

</html>
