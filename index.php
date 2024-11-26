<?php
include "php_functions/auth_utils.php";
session_start();
handleIfLoggedIn();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/boxicons.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Movemates</title>
  </head>
  <body  data-bs-spy="scroll" data-bs-target=".navbar">
    <!-- main navigation -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-light sticky-top">
    <div class="container">
        <div class="col-auto logo-container d-flex align-items-center">
            <img src="images/navbar/logo.png" alt="logo" class="logo">
            <a class="navbar-brand" href="#">Movemates<span>.</span></a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link active"  href="#home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active"  href="#about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active"  href="#services">Services</a>
            </li> 
            <li class="nav-item">
                <a class="nav-link active"  href="#reviews">Reviews</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active  btn btn-primary" data-bs-toggle="modal" data-bs-target="#contactModal" href="#contact">Contact Us</a>
            </li>        
            <li class="nav-item">
                <a class="nav-link active"  href="#team">Team</a>
            </li> 
            <div class="btn-group ms-1 btn-brand" role="group" aria-label="Button group with nested dropdown">
                <div class="btn-group" role="group">
                  <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                 Get Started
                  </button>
                  <ul class="dropdown-menu">
                    <button type="button" class="btn btn-primary ms-3" data-bs-toggle="modal" data-bs-target="#loginModal">
                        Login
                    </button>
                    <button type="button" class="btn btn-primary mt-3 ms-3" data-bs-toggle="modal" data-bs-target="#signupModal">
                        Signup
                    </button>
                  </ul>
                </div>
              </div>
        </ul>
        </div>
    </div>
    </nav>

    <!-- slider -->
    <div class="slider-wrapper owl-carousel owl-theme" id="hero-slider">
        <!--  slide 1 -->
        <div class="slide1 min-vh-100 bg-cover">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h6 class="text-uppercase sub-text">MoveMates is a transportation platform where you join Ashesi students or staff that can move to Accra (or anywhere in Ghana)</h6>
                        <h1 class="display-2 my-3 text-uppercase">Join A Mate <br>On The Move!!</h1>
                        <a href="" class="btn btn-brand" data-bs-toggle="modal" data-bs-target="#loginModal">Get Started</a>
                        <a href="" class="btn btn-outline-light ms-md-3">Our Works</a>
                    </div>
                </div>
            </div>
        </div>
        <!--  slide 2 -->
        <div class="slide2 min-vh-100 bg-cover">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h6 class="text-uppercase sub-text">Get in a ride with someone going where you're going with a relatively low cost</h6>
                        <h1 class="display-2 my-3 text-uppercase">We help make your travel<br>experiences better!!</h1>
                        <a href="" class="btn btn-brand" data-bs-toggle="modal" data-bs-target="#loginModal">Get Started</a>
                        <a href="" class="btn btn-outline-light ms-md-3">Our Works</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- slide 3 -->
        <div class="slide3 min-vh-100 bg-cover">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h6 class="text-uppercase sub-text">Get in a ride with someone going where you're going with a relatively low cost</h6>
                        <h1 class="display-2 my-3 text-uppercase">Join the fun<br>todayy!!</h1>
                        <a href="" class="btn btn-brand" data-bs-toggle="modal" data-bs-target="#loginModal">Get Started</a>
                        <a href="" class="btn btn-outline-light ms-md-3">Our Works</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- about us -->
    <section id="about">
        <div class="d-flex justify-content-center my-5">
            <h1 class="text-uppercase">About us</h1>
        </div>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-12 info-box">
                            <img src="images/about/affordable.jpg" alt="">
                            <div>
                             <h5>Affordable</h5>
                             <p>For a relatively low price, join someone going to a place you want to go, lowering the burden of transport costs exponentially.</p>
                            </div>
                        </div>
                        <div class="col-12 info-box mt-4">
                            <img src="images/about/quickprocess.jpg" alt="" id="quickprocessimg">
                            <div>
                             <h5>Quick Process</h5>
                             <p>No hassle. Like the ride offered, tap join and you're off when it's time to move.</p>
                            </div>
                        </div>
                        <div class="col-12 info-box mt-4">
                            <img src="images/about/community.jpg" alt="">
                            <div>
                             <h5>We're a community</h5>
                             <p>MoveMates verifies everyone on this platform, meaning we know you, and you know us. Perfect harmony.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- add an image on the right of the remaining column -->
                 <div class="col-lg-5">
                    <img src="images/about/movemate.jpeg" alt="" class="movemateimgright">
                 </div>
            </div>
        </div>
    </section>

    <!-- how to join a ride  section-->
    <section>
        <div class="d-flex justify-content-center text-uppercase"><h1>How to join a ride</h1></div>
        <div class="container mt-4">
            <!-- get the search icon  -->
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-11">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="step-box">
                                <h4><i class='bx bx-search search-icon'></i>Search through available rides</h4>
                                <p class="fs-5 ms-5">Look for a ride going where you want to go and look at the requirements needed.</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="step-box">
                                <h4><i class='bx bx-car car-icon'></i>Join one going were you want</h4>
                                <p class="fs-5 ms-5">Tap the Join button on the card with the details.</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="step-box">
                                <h4><i class='bx bx-time search-icon'></i>Wait till it's time for your trip</h4>
                                <p class="fs-5 ms-5">Once everything is verified, all that's left is to wait for the departure time.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- sample feed -->
    <section>
        <div class="container">
            <div class="card">
                <div class="card-header main-colors radius text-white d-flex justify-content-between align-items-center mb-4">
                  <img src="images/navbar/logo.png" alt="">
                  <h5 class="card-title-left">MoveMates</h5>
                  <h5 class="card-title-right">2023</h5>
                </div>
                <div class="container">
                    <div class="card-body mb-4">
                        <div class="row">
                          <div class="col-md-6">
                            <h6 class="card-subtitle mb-2 text-muted">DESTINATION</h6>
                            <h4 class="card-title">Accra Mall</h4>
                          </div>
                          <div class="col-md-6">
                            <h6 class="card-subtitle mb-2 text-muted">TRIP TYPE</h6>
                            <h4 class="card-title">One Way</h4>
                          </div>
                        </div>
                        <div class="row mt-3">
                          <div class="col-md-3">
                            <h6 class="card-subtitle mb-2 text-muted">SEATS LEFT</h6>
                            <p class="card-text">2</p>
                          </div>
                          <div class="col-md-3">
                            <h6 class="card-subtitle mb-2 text-muted">RIDE CREATOR</h6>
                            <p class="card-text">@denis</p>
                          </div>
                          <div class="col-md-3">
                            <h6 class="card-subtitle mb-2 text-muted">PRICE</h6>
                            <p class="card-text">₡25</p>
                          </div>
                          <div class="col-md-3">
                            <h6 class="card-subtitle mb-2 text-muted">DEPARTURE</h6>
                            <p class="card-text">Sep 8 11:00 AM</p>
                          </div>
                        </div>
                      </div>
                </div>
              </div>
        </div>
    </section>
  
    <!-- MILESTONE -->
    <section id="milestone" class="bg-cover">
        <div class="container">
            <div class="row text-center justify-content-center gy-4">
                <div class="col-lg-2 col-sm-6">
                    <div class="milestone-box display-4">50+</div>
                    <p class="mb-0 ms">Sign Ups</p>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="milestone-box display-4">100</div>
                    <p class="mb-0">Happy Clients</p>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="milestone-box display-4">570</div>
                    <p class="mb-0">5 star ratings</p>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="milestone-box display-4">585</div>
                    <p class="mb-0">5 star ratings</p>
                </div>
            </div>
        </div>
    </section>

      <!-- services-->
    <section class="bg-light" id="services">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <div class="intro">
                        <h6>Our Services</h6>
                        <h1>What do we provide you with?</h1>
                        <p class="mx-auto">We assist you with everything you need to have a safe and enjoyable ride to and from campus with your travel match</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="services-slider" class="owl-theme owl-carousel mt-5">
            <div class="services">
                <div class="overlay"></div>
                <img src="images/services/accountsetup.png" alt="">
                <div class="content">
                    <h2>East Account Setup</h2>
                    <h6>In just a minutes we authenticate your account and get you right into the app</h6>
                </div>
            </div>
            <div class="services">
                <div class="overlay"></div>
                <img src="images/services/cost-sharing.webp" alt="">
                <div class="content">
                    <h2>Cost Sharing Tips</h2>
                    <h6>We share great tips of cost sharing with your teammates as well as bargaining tips with drivers</h6>
                </div>
            </div>
            <div class="services">
                <div class="overlay"></div>
                <img src="images/services/movematematch.png" alt="">
                <div class="content">
                    <h2>MoveMate Matching</h2>
                    <h6>Travel with people of your choice with little to no stress</h6>
                </div>
            </div>
            <div class="services">
                <div class="overlay"></div>
                <img src="images/services/safety.png" alt="">
                <div class="content">
                    <h2>Safety is assured</h2>
                    <h6>We allow you to update the platform with your current location throughout the commute to help us track your safety</h6>
                </div>
            </div>
            <div class="services">
                <div class="overlay"></div>
                <img src="images/services/reachuseasily.png" alt="">
                <div class="content">
                    <h2>Reach us easily</h2>
                    <h6>Provide us with real time feedback to help us iterate and give you the best of performance and trips!</h6>
                </div>
            </div>
        </div>
    </section>
     
    <!-- team -->
    <section id="team">
        <div class="container py-5">
            <div class="row">
                <!-- Team Member 1 -->
                <div class="col-lg-3 col-md-6">
                    <div class="team-member text-center">
                        <img src="images/team/tani.jpg" alt="Team member" />
                        <h3 class="mt-4">Tanitoluwa Adebayo</h3>
                        <div class="position">Lead Backend Developer</div>
                        <div class="bio mb-5">
                            Problem-solver proficient in Python, Java, TypeScript, and Dart. Backend engineer at Faaji.
                        </div>
                    </div>
                </div>
    
                <!-- Team Member 2 -->
                <div class="col-lg-3 col-md-6">
                    <div class="team-member text-center">
                        <img src="images/team/eddie.jpg" alt="Team member" />
                        <h3 class="mt-4">Edward Mensah</h3>
                        <div class="position">Lead Frontend Developer</div>
                        <div class="bio mb-5">
                            An aspiring software and machine learning engineer with experience developing AI-powered web applications.
                        </div>
                    </div>
                </div>
    
                <!-- Team Member 3 -->
                <div class="col-lg-3 col-md-6">
                    <div class="team-member text-center">
                        <img src="images/team/welile.jpg" alt="Team member" />
                        <h3 class="mt-4">Welile Dlamini</h3>
                        <div class="position">Project Manager</div>
                        <div class="bio mb-5">
                            BSc Computer Science student committed to leveraging technology for innovative solutions.
                        </div>
                    </div>
                </div>
    
                <!-- Team Member 4 -->
                <div class="col-lg-3 col-md-6">
                    <div class="team-member text-center">
                        <img src="images/team/susana.jpeg" alt="Team member"/>
                        <h3 class="mt-4">Susanna Agyapong</h3>
                        <div class="position">QA</div>
                        <div class="bio mb-5">
                            Quality Assurance specialist ensuring product excellence.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 
    <!-- what do people say about us -->
    <section class="bg-light" id="reviews">
        <div class="owl-theme owl-carousel reviews-slider container">
            <div class="review">
                <div class="person">
                    <img src="images/team/welile.jpg" alt="">
                    <h5 class="mt-3">Ralph Edwards</h5>
                    <small>Market Development Manager</small>
                </div>
                <h3>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aut quis, rem culpa labore voluptate
                    ullam! In, nostrum. Dicta, vero nihil. Delectus minus vitae rerum voluptatum, excepturi incidunt ut,
                    enim nam exercitationem optio ducimus!</h3>
                <div class="stars">
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class="bx bxs-star-half"></i>
                </div>
                <i class='bx bxs-quote-alt-left'></i>
            </div>
            <div class="review">
                <div class="person">
                    <img src="images/team/tani.jpg" alt="">
                    <h5 class="mt-3">Ralph Edwards</h5>
                    <small>Market Development Manager</small>
                </div>
                <h3>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aut quis, rem culpa labore voluptate
                    ullam! In, nostrum. Dicta, vero nihil. Delectus minus vitae rerum voluptatum, excepturi incidunt ut,
                    enim nam exercitationem optio ducimus!</h3>
                <div class="stars">
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class="bx bxs-star-half"></i>
                </div>
                <i class='bx bxs-quote-alt-left'></i>
            </div>
            <div class="review">
                <div class="person">
                    <img src="images/team/eddie.jpg" alt="">
                    <h5 class="mt-3">Ralph Edwards</h5>
                    <small>Market Development Manager</small>
                </div>
                <h3>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aut quis, rem culpa labore voluptate
                    ullam! In, nostrum. Dicta, vero nihil. Delectus minus vitae rerum voluptatum, excepturi incidunt ut,
                    enim nam exercitationem optio ducimus!</h3>
                <div class="stars">
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class="bx bxs-star-half"></i>
                </div>
                <i class='bx bxs-quote-alt-left'></i>
            </div>
        </div>
    </section>

    <!-- call to action -->
    <section class="cta">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="text-uppercase">Join us today</h1>
                    <p>Join the community of people who are making their travel experiences better</p>
                    <div class="mt-2"><img src="images/services/calltoaction.png" alt=""></div>
                    <a href="" class="btn btn-brand mt-3" data-bs-toggle="modal" data-bs-target="#loginModal">Get Started</a>
                </div>
            </div>
        </div>
    </section>
 
    <!-- Medium Width Centered Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-custom">
            <div class="modal-content">
                <div class="modal-header text-white">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="login-content">
                        <form method = "POST" action="php_functions/login.php">
                            <!-- Welcome Message -->
                            <div class="text-center mb-5">
                                <h2 class="mb-3">Welcome Back!</h2>
                                <p class="text-muted">Please sign in to continue</p>
                            </div>

                            <!-- Login Form -->
                            <div class="mb-4">
                                <label for="emailInput" class="form-label">Email address</label>
                                <input type="email" class="form-control form-control-lg" id="emailInput" name="email" required>
                                <div id="emailError" style="color: red;"></div>
                            </div>
                            <div class="mb-4">
                                <label for="passwordInput" class="form-label">Password</label>
                                <input type="password" class="form-control form-control-lg" id="passwordInput" name="password" required>
                                <div id="passwordError" style="color: red;"></div>
                            </div>
                            <div class="d-grid mb-4">
                                <button type="submit" class="btn btn-lg sign-in">Sign in</button>
                            </div>


                            <!-- Sign Up Link -->
                            <div class="text-center">
                                <p class="mb-0">Don't have an account? <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#signupModal" data-bs-dismiss="modal">Sign up</a></p>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer text-white">
                    <p class="w-100 text-center mb-0">© 2024 Movemates. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Sign Up Modal -->
    <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-custom">
            <div class="modal-content">
                <div class="modal-header text-white">
                    <h5 class="modal-title" id="signupModalLabel">Sign Up</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-light">
                    <div class="login-content">
                        <form method="POST" action="php_functions/register.php">
                            <!-- Welcome Message -->
                            <div class="text-center mb-5">
                                <h2 class="mb-3">Create Account</h2>
                                <p class="text-muted">Join us today! Please fill in your details</p>
                            </div>

                            <!-- Sign Up Form -->
                            <div class="mb-4">
                                <label for="nameInput" class="form-label">First Name</label>
                                <input type="text" class="form-control form-control-lg" id="firstnameInput" name="firstName" required>
                                <div id="firstNameError" style="color: red;"></div>
                            </div>
                            <div class="mb-4">
                                <label for="nameInput" class="form-label">Last Name</label>
                                <input type="text" class="form-control form-control-lg" id="lastnameInput" name="lastName" required>
                                <div id="lastNameError" style="color: red;"></div>
                            </div>
                            <div class="mb-4">
                                <label for="signupEmail" class="form-label">Email address</label>
                                <input type="email" class="form-control form-control-lg" id="signupEmail" name="email" required>
                                <div id="emailError2" style="color: red !important; "></div>
                            </div>
                            <div class="mb-4">
                                <label for="signupPassword" class="form-label">Password</label>
                                <input type="password" class="form-control form-control-lg" id="signupPassword" name="password" required>
                                <div id="passwordError" style="color: red"></div>
                            </div>
                            <div class="mb-4">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control form-control-lg" id="confirmPassword" name="passwordConfirm" required>
                                <div id="confirmPasswordError" style="color: red;"></div>
                            </div>

                            <div class="d-grid mb-4">
                                <button type="submit" class="btn btn-lg create-account text-white">Create Account</button>
                            </div>

                            
                            <!-- Login Link -->
                            <div class="text-center">
                                <p class="mb-0">Already have an account? <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">Login</a></p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer text-white">
                    <p class="w-100 text-center mb-0">© 2024 Movemates. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>

     <!-- contacrt us-->
    <section>
        <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="container-fluid">
                            <div class="row gy-4">
                                <div class="col-lg-4 col-sm-12 bg-cover"
                                    style="background-image: url(images/carousel/mainimg.png); min-height:300px;">
                                    <div>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <form class="p-lg-5 col-12 row g-3">
                                        <div>
                                            <h1>Get in touch</h1>
                                        <p>Send us a message or complaint and we will respond to you as soon as possible!</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="userName" class="form-label">First name</label>
                                            <input type="text" class="form-control" placeholder="Jon" id="userName"
                                                aria-describedby="emailHelp">
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="userName" class="form-label">Last name</label>
                                            <input type="text" class="form-control" placeholder="Doe" id="userName"
                                                aria-describedby="emailHelp">
                                        </div>
                                        <div class="col-12">
                                            <label for="userName" class="form-label">Email address</label>
                                            <input type="email" class="form-control" placeholder="eddiemens@gmail.com" id="userName"
                                                aria-describedby="emailHelp">
                                        </div>
                                        <div class="col-12">
                                            <label for="exampleInputEmail1" class="form-label">Enter Message</label>
                                            <textarea name="" placeholder="This is looking great and nice." class="form-control" id=""  rows="4"></textarea>
                                        </div>
    
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-brand modal-btn">Send Message</button>
                                            <button type="button" class="btn btn-secondary ms-4 text-uppercase" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  
       <!-- footer -->
    <footer>
        <div class="footer-top text-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h4 class="navbar-brand">MoveMates<span class="dot">.</span></h4>
                        <p>Have fun moving with your buddies!!</p>
                        <div class="col-auto social-icons">
                            <a href="#"><i class='bx bxl-facebook'></i></a>
                            <a href="#"><i class='bx bxl-twitter'></i></a>
                            <a href="#"><i class='bx bxl-instagram'></i></a>
                            <a href="#"><i class='bx bxl-linkedin'></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom text-center">
            <p class="mb-0">Copyright@2020. All rights Reserved</p>
        </div>
    </footer>

    <!-- replace the local jquery and bootstrap js with the cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/index.js"></script>
  </body>
</html>