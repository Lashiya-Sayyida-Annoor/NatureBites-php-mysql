<?php
include("../Assets/Connection/Connection.php");
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>NatureBites- Organic Vegetable Selling Website</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../Assets/Template/Main/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../Assets/Template/Main/lib/animate/animate.min.css" rel="stylesheet">
    <link href="../Assets/Template/Main/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../Assets/Template/Main/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../Assets/Template/Main/css/style.css" rel="stylesheet">
</head>

<style>
        body{
        color: #000;
        }
        .dropdown-menu {
            background-color: #3cb815;
            border: 1px solid #0e0e0e;
        }
       #content, #content1, #content2, #content3 {
    overflow: hidden;
    max-height: 100px; /* Set the maximum height to display initially */
    transition: max-height 0.3s ease;
}
</style>


<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                <small><i class="fa fa-map-marker-alt me-2"></i>Eranakulum, Kerala, India</small>
                <small class="ms-4"><i class="fa fa-envelope me-2"></i>naturebites@gmail.com</small>
               &nbsp;&nbsp;&nbsp; <small  ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
</svg>1800-200-3444</small>
            </div>
            <div class="col-lg-6 px-5 text-end">
                <small>Follow us:</small>
                <a class="text-body ms-3" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-twitter"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-linkedin-in"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-instagram"></i></a>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="index.html" class="navbar-brand ms-4 ms-lg-0">
                <h1 class="fw-bold text-primary m-0">Nature<span class="text-secondary">Bites</span></h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="../index.php" class="nav-item nav-link active">Home</a>
                    
                    <a href="Searchvegetables.php" class="nav-item nav-link active">Products</a>
                    <a href="Searchdistributor.php" class="nav-item nav-link active">Distributors</a>
                    <a href="usercomplaint.php" class="nav-item nav-link active">Complaints</a>
                    <!--<div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="blog.html" class="dropdown-item">Blog Grid</a>
                            <a href="feature.html" class="dropdown-item">Our Features</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="404.html" class="dropdown-item">404 Page</a>
                        </div>
                    </div>-->
                   
                </div>
                <div class="d-none d-lg-flex ms-2">
                    
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="Profile.php">
                        <small class=""></small>
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg>
                    </a>
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="MyVegCart.php">
                        <small class=""></small>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg>
                    </a>
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="bookingpage.php">
                    <small class=""></small>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.004-.001.274-.11a.75.75 0 0 1 .558 0l.274.11.004.001 6.971 2.789Zm-1.374.527L8 5.962 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339Z"/>
                    </svg>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="../Assets/Template/Main/img/woman-holding-basket-full-different-vegetables.jpg" alt="Image" style="height:700px; ">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="../Assets/Template/Main/img/mother-daughter-preparing-salad-cooking-kitchen.jpg" alt="Image" style="height:700px; ">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <img class="w-100" src="../Assets/Template/Main/img/basket-filled-healthy-food.jpg" alt="Image" style="height:700px;">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        <img class="img-fluid w-100" src="../Assets/Template/Main/img/close-up-basket-vegetables.jpg">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="display-8 mb-7" id="content">Best Organic Vegetables</h1>
                    <p class="mb-4">Organic vegetables encompass a wide range of plant-based foods that are grown using
                        organic farming practices. These practices aim to minimize synthetic chemical inputs and
                        prioritize sustainable, environmentally-friendly cultivation methods.</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Spinach, kale, lettuce, and Swiss chard are examples
                        of leafy greens. They are rich in essential nutrients and often the foundation of salads and
                        green smoothies.</p>
                    <p><i class="fa fa-check text-primary me-3" ></i>Carrots, potatoes, beets, and radishes are root
                        vegetables. They grow underground and are a valuable source of carbohydrates and vitamins.</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Broccoli, cauliflower, and Brussels sprouts are
                        cruciferous vegetables. They are known for their cancer-fighting properties and high nutritional
                        content.</p>
                        <p class="mb-4">And there are long list ahead to describe....</p>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Feature Start -->
    <div class="container-fluid bg-light bg-icon my-5 py-6">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
                style="max-width: 500px;">
                <h1 class="display-5 mb-3">Our Features</h1>
                <p>Our veggies grow the way nature intended;Certified purity, free from synthetic chemicals and Healthy
                    for you and the environment.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="Assets/Template/Main/img/icon-1.png" alt="">
                        <h4 class="mb-3">Natural Process</h4>
                        <p class="mb-4" id="content1">
                            Our organic vegetables are grown through a natural and sustainable process. We prioritize
                            traditional farming techniques that respect the environment and work with nature to
                            cultivate the healthiest and most nutritious produce.
                        </p>
                        <a class="btn btn-outline-primary border-2 py-2 px-4 rounded-pill" 
                            onclick="toggleReadMore(1)">Read More</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="Assets/Template/Main/img/icon-2.png" alt="">
                        <h4 class="mb-3">Organic Products</h4>
                        <p class="mb-4" id="content2">Our offerings are certified organic, ensuring that they are free from synthetic
                            pesticides, herbicides, and GMOs. You can trust that our products are grown with a
                            commitment to organic farming principles.</p>
                            <a class="btn btn-outline-primary border-2 py-2 px-4 rounded-pill" 
                            onclick="toggleReadMore(2)">Read More</a>                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="Assets/Template/Main/img/icon-3.png" alt="">
                        <h4 class="mb-3">Biologically Safe</h4>
                        <p class="mb-4" id="content3">We take pride in providing biologically safe vegetables. By avoiding harmful
                            chemicals and focusing on natural methods, we promote a healthy ecosystem, reduce chemical
                            residues in our produce, and prioritize the well-being of our customers and the environment.
                        </p>
                        <a class="btn btn-outline-primary border-2 py-2 px-4 rounded-pill" 
                            onclick="toggleReadMore(3)">Read More</a>                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->


    <!-- Product Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s"
                        style="max-width: 500px;">
                        <h1 class="display-5 mb-3">Our Products</h1>
                        <p>Pure and Green: Nature's Bounty on Your Plate.</p>
                    </div>
                </div>
                <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary border-2 active" data-bs-toggle="pill"
                                href="#tab-1">Vegetable</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <?php 
                        $selQry = "select * from tbl_vegetables";
                        $result = $con->query($selQry);
                        while($row = $result -> fetch_assoc())
                        {
                            ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="product-item">
                                <div class="position-relative bg-light overflow-hidden">
                                    <img class="img-fluid w-100"
                                        src="../Assets/Files/Distimg/<?php echo $row['veg_img'] ?>" alt="">
                                    <div
                                        class="bg-transperent rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                        </div>
                                </div>
                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2" href="">
                                        <?php echo $row['veg_name'] ?>
                                    </a>
                                    <span class="text-primary me-1"> INR
                                        <?php echo $row['veg_rate']?>
                                    </span>&nbsp;
                                    <span class="text-body text-decoration-line-through">INR
                                        <?php echo $row['veg_rate'] + 10?>
                                    </span>
                                </div>
                                <div class="d-flex border-top">
                            
                                    <small class="w-50 text-center py-2">
                                        <a class="text-body" href="Searchvegetables.php"><i
                                                class="fa fa-shopping-bag text-primary me-2" ></i>Add to cart</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>

                        
                    </div>
                </div>
                                  
            
    <!-- Product End -->


    


    <!-- Testimonial Start -->
    <div class="container-fluid bg-light bg-icon py-6 mb-5">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
                style="max-width: 500px;">
                <h1 class="display-5 mb-3">Customer Review</h1>
                
            </div>
            
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            <?php 
                        $selQry = "select * from tbl_review r inner join tbl_user u on r.user_id=u.user_id";
                        $result = $con->query($selQry);
                        while($row = $result -> fetch_assoc())
                        {
                            ?>
            
                  <div class="testimonial-item position-relative bg-white p-5 mt-4">
                  <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <p class="mb-4"><?php echo $row['user_review'] ?></p>
                    <div class="d-flex align-items-center">
                        <img class="flex-shrink-0 rounded-circle"  src="../Assets/Files/userphoto/<?php echo $row['user_photo'] ?>" alt="">
                    
                        <div class="ms-3">
                            <h5 class="mb-1"><?php echo $row['user_name'] ?></h5>
                            <span><?php echo $row['review_datetime'] ?></span>
                        </div>
                    </div>
                </div>
                        
                        
                <?php
                        }
                        ?>
                        </div>
                       </div>
                        </div>
    <!-- Testimonial End -->


    <!-- Blog Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
                style="max-width: 500px;">
                <h1 class="display-5 mb-3">Latest Blog</h1>
                
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid" src="../Assets/Template/Main/img/blog-1.jpg" alt="">
                    <div class="bg-light p-4">
                        <a class="d-block h5 lh-base mb-4" href="">How to cultivate organic vegetables in own
                            firm</a>
                        <div class="text-muted border-top pt-4">
                            <small class="me-3"><i class="fa fa-user text-primary me-2"></i>Admin</small>
                            <small class="me-3"><i class="fa fa-calendar text-primary me-2"></i>01 september, 2023</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <img class="img-fluid" src="../Assets/Template/Main/img/blog-2.jpg" alt="">
                    <div class="bg-light p-4">
                        <a class="d-block h5 lh-base mb-4" href="">How to maintain product quality</a>
                        <div class="text-muted border-top pt-4">
                            <small class="me-3"><i class="fa fa-user text-primary me-2"></i>Admin</small>
                            <small class="me-3"><i class="fa fa-calendar text-primary me-2"></i>21 september, 2023</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <img class="img-fluid" src="../Assets/Template/Main/img/blog-3.jpg" alt="">
                    <div class="bg-light p-4">
                        <a class="d-block h5 lh-base mb-4" href="">What all tips need to take for healthy life</a>
                        <div class="text-muted border-top pt-4">
                            <small class="me-3"><i class="fa fa-user text-primary me-2"></i>Admin</small>
                            <small class="me-3"><i class="fa fa-calendar text-primary me-2"></i>4 november, 2023</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                <h1 class="fw-bold text-primary m-0">Nature<span class="text-secondary">Bites</span></h1>
                    <p>An online marketplace offering a wide variety of fresh, locally sourced, and organic vegetables for health-conscious consumers.</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i
                                class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-0" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Address</h4>
                    <p><i class="fa fa-map-marker-alt me-3"></i>Eranakulum,Kerala,India</p>
                    <p><i class="fa fa-phone-alt me-3"></i>1800-200-3444</p>
                    <p><i class="fa fa-envelope me-3"></i>naturebites@gmail.com</p>
                </div>
                
                <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Newsletter</h4>
                    <p>common tool for communication and marketing, and can cover a wide range of subjects, from company updates to industry news, personal interests, or educational topics.</p>
                    <div class="position-relative mx-auto" style="max-width: 600px;">
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text"
                            placeholder="Your email">
                        <button type="button"
                            class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a href="#">NatureBites</a>, All Right Reserved.
                    </div>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../Assets/Template/Main/lib/wow/wow.min.js"></script>
    <script src="../Assets/Template/Main/lib/easing/easing.min.js"></script>
    <script src="../Assets/Template/Main/lib/waypoints/waypoints.min.js"></script>
    <script src="../Assets/Template/Main/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="../Assets/Template/Main/js/main.js"></script>
    <script>
        function toggleReadMore(did) {
    var content = document.getElementById("content"+did);

    if (content.style.maxHeight === "100px") {
        content.style.maxHeight = "none"; // Show full content
    } else {
        content.style.maxHeight = "100px"; // Show only the first 20 words
    }
}

    </script>
</body>

</html>