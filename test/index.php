<?php
session_start();
require_once('user_authentication/functions.php');
require_once('C:/xampp/htdocs/LMS(tasks)/connection/db.php');
$query = "SELECT courses.*, instructors.name as instructor_name FROM courses LEFT JOIN instructors ON courses.instructor_id = instructors.id"; 
$stmt = $pdo->query($query); 
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

//display the avg rating
//$stmt = $pdo->prepare("SELECT rates FROM courses WHERE id = :course_id");
//$stmt->execute([':course_id' => $course_id]);
//$course = $stmt->fetch(PDO::FETCH_ASSOC);
//$average_rating = $course['rates'];
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>InternGrub | Home</title>
    <!-- BOOTSTRAP 5.3.3 & FONT-AWESOME -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/all.min.css" />
    <!-- TINY-SLIDER & ANIMATE CSS-->
    <link rel="stylesheet" href="css/tiny-slider.css" />
    <link rel="stylesheet" href="css/animate.min.css" />
    <!-- OWL-CAROUSEL & OWL-CAROUSEL THEME CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/owl.theme-default.min.css" />
    <!-- MAIN-THEME STYLES -->
    <link rel="stylesheet" href="css/style.css" />
   
   
   
    <style>
  
 /* Carousel Container */
 .carousel-container {
            width: 100%; /* Full width */
            max-width: 1400px; /* Max width to keep the carousel centered */
            margin: 0 auto; /* Centering the carousel */
            overflow: hidden;
            position: relative;
            padding:0 20px;
            justify-content: center;
            align-items:center;
        }
    
        /* Carousel Flexbox Layout */
        .carousel {
          width: 500px;
          display: flex;
          transition: transform 0.5s ease-in-out;
          width: max-content; /* Ensures the carousel width adjusts to the content */
          justify-content: center; /* Centers the cards within the carousel */
        }
    
        /* Card Styling */
        .card {
            width: 500px;
            height: 450px;
            perspective: 1000px;
            margin:  30px; /* Adds space between cards */
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
        }
    
        /* Card Flip Effect */
        .card-inner {
            width: 500px;
            height: 450px;
            transition: transform 0.6s;
            transform-style: preserve-3d;
            position: relative;
            margin: 0 10px;
        }
    
        .card:hover .card-inner {
            transform: rotateY(180deg);
        }
    
        /* Front of the Card */
        .card-front, .card-back {
            width: 500px;
            height:auto;
            backface-visibility: hidden;
            position: absolute;
            top: 0;
            left: 0;
        }
    
        .card-front {
    display: flex;
    flex-direction: column;
    padding: 20px; /* Add space around the text */
    box-shadow: 0 4px 8px rgba(7, 10, 158, 0.1); /* Subtle shadow */
    border-radius: 10px; /* Rounded corners */
    overflow: hidden;
    background-color: #fff; /* Background color for the card */
    transition: transform 0.3s ease; /* Smooth transition on hover */
    padding: 30px;
}

.card-front:hover {
    transform: translateY(-5px); /* Slight hover effect */
}

.card-title {
    text-align: center;
    font-size: 25px; /* Slightly smaller for better balance */
    font-weight: bold;
    margin-bottom: 10px;
    color: #2b235e;
}

.card-author {
    font-size: 18px; /* Slightly smaller for better balance */
    color: #9754a1;; /* Muted color for author */
    margin-bottom: 5px;
    text-align: center;
    font-weight: bold;
}

.card-rating {
    text-align: center;
    font-size: 18px; /* Slightly smaller for better balance */
    font-weight: bold;
    margin-bottom: 10px;
    color: #eebe20; 
  

}

.card-talk {
    font-size: 16px; /* Adjusted font size for description */
    color: #000; /* Darker color for readability */
    line-height: 1.6; /* Increased line height for readability */
    margin-bottom: 15px; /* More space below description */
    font-family: 'Arial', sans-serif;
    letter-spacing: 0.5px;
    word-wrap: break-word; /* Allow long words to wrap */
    width: 100%; /* Ensures text fills container */
    box-sizing: border-box; /* Include padding and border in element's total width */
    
   
}

.card-price {
    font-size: 18px; /* Slightly smaller for better balance */
    color:#ff0000;  
    font-weight: bold;
    margin-top: 10px; /* Space above the price */
}

.card-quote {
    background-color:none;
    font-size: 18px;
    font-style: italic;
    font-weight: bold;
    color: #ff0000; 
    margin-top: 10px;
    border-radius: 5px;
    padding: 10px 20px;
    display: inline-block;
}

.card-status {
  background-color:#2b235e;
    font-size: 18px;
    font-style: italic;
    font-weight: bold;
    color: #fff; 
    margin-top: 10px;
    margin-bottom: 5px;
    border-radius: 5px;
    padding: 10px 20px;
    display: inline-block;
    margin-left: 80px;
}

.card-image {
    width:90%;
    height: 200px; /* Control the image height */
    object-fit: cover; /* Maintain aspect ratio of image */
    border-radius: 10px 10px 10px 10px; /* Rounded top corners */
    margin-bottom: 15px; /* Space between image and content */
}

/* Optional: Add hover effect on image */
.card-image:hover {
    opacity: 0.8; /* Slight opacity change on hover */
}

    
    .card-back {
    background-color: #fff;
    color: #2b235e;
    transform: rotateY(180deg);
    overflow-y: auto; /* Allows vertical scrolling if content overflows */
    padding: 10px;
    box-sizing: border-box;
    border-radius: 10px;
    text-align: center;
    height: 100%; /* Ensures the card-back takes the full height of the card */
}

.course-description {
    font-size: 25px; /* Adjust the font size */
    margin-bottom: 10px; /* Adds space between description and button */
    color:#2b235e;
}

.btn-register {
    background-color: #23aa62;
    color: #fff;
    text-transform: uppercase;
    padding: 10px 10px; /* Adjust padding for better fit */
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
}

.btn-register:hover {
    background-color: #9754a1;
}



.carousel-controls {
  display: flex;
  justify-content: space-between;
  margin-top: 10px;
  
}
.carousel-prev, .carousel-next {
  background-color: #23aa62;
  color:#fff;
  border:none;
  padding: 10px;
  cursor: pointer;
  opacity: 0.7;
  transition: opacity 0.3s
}



/* Title Box */
.title-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
  
}


/* Title underline effect */
.title::after {
    content: '';
    display: block;
    width: 50px;
    height: 3px;
    background-color: #28a745; /* Green color */
    margin-top: 10px;
    text-align: center;
}

/* Title Link */
.title-link a {
  font-size: 24px;
  text-decoration: none;
  /* color: #313131; */
  background: var(--linear);
  -webkit-background-clip: text;
  color: transparent;
  transition: all 0.3s ease-in-out;
  text-align: center;
  margin-top: 20px;
}

 .title-link a:hover {
  font-size: 24px;

  font-weight: 600;
  letter-spacing: 1px;

}

/* Home Section */
.home {
    position: relative;
    background: url('assets/images/home1.png') no-repeat center center/cover;
    height: 100vh; /* Full viewport height */
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
}

.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5); /* Dark overlay for readability */
    z-index: 1;
}

.container {
    position: relative;
    z-index: 2; /* Ensures the content is above the overlay */
}

/* Text Section */
.home-text h3 {
    font-size: 3rem;
    font-weight: bold;
    color: #D4AD37;
    margin-bottom: 20px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    animation: fadeInUp 1s ease-out;
}

.home-text h4 {
    font-size: 2.5rem;
    font-weight: bold;
    color: #ffffff;
    margin-bottom: 20px;
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
    animation: fadeInUp 1.2s ease-out;
}

.home-text p {
    font-size: 1.5rem;
    color: #f8f9fa;
    margin-bottom: 20px;
    animation: fadeInUp 1.4s ease-out;
}

.latter form {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px; /* Space between the input and the button */
}



.latter input[type="submit"] {
    background-color: #D4AD37;
    color: #fff;
    font-weight: bold;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1rem;
    text-transform: uppercase;
    transition: background-color 0.3s ease;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.latter input[type="submit"]:hover {
    background-color: #ffc107;
}

/* Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}




    
 </style>
  </head>

  <body>
    <div class="pageContainer">
      <header>
        <div class="header py-3">
          <nav class="navbar navbar-expand-lg">
            <div class="container">
              <a class="navbar-brand" href="#">
                <img src="assets/images/internGrub-logo.png" alt="" width="150" />
              </a>
              <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 text-uppercase d-flex justify-content-between w-lg-75">
                  <li class="nav-item">
                    <a class="nav-link active fw-semibold" aria-current="page" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link fw-semibold" href="#">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link fw-semibold" href="#">Grab Your Itern</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link fw-semibold" href="course_listing.php">courses</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link fw-semibold" href="#">hub your internship</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link fw-semibold" href="index.html#contactUs">Contact</a>
                  </li>
                </ul>
                <div class="text-center">
                  <a href="user_authentication/login.php" class="btn btn-main text-uppercase">Sign In</a>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>
      <section class="home" id="home">
    <div class="overlay"></div>
    <div class="container">
        <div class="home-text text-center">
            <h3>Best Online Learning Platform</h3>
            <h4>Accessible Online Courses For All</h4>
            <p>Own your future learning new skills online</p>
            <div class="latter">
              <form action="user_authentication/login.php" method="get">
                  <input type="submit" value="Let's start">
              </form>
          </div>

        </div>
    </div>
</section>







      <section class="carousel-container  py-2 my-lg-2 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.3s">
      <div class="carousel-controls"> 
        
      <div class="title-wrap d-flex justify-content-between mb-4">
          <div class="title-container">
            <h2 class="title wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">Latest courses</h2>
          </div>
          <div class="title-link wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">  
          </div>
        </div>
        <div class="title-link wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                  <a href="course_listing.php">All courses
                    <span class="fa fa-chevron-right"></span>
                  </a>
                </div>
      </div>
      <div class="carousel py-2 my-lg-2 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.3s">
    <?php if (!empty($courses)): ?>
        <?php foreach ($courses as $course): ?>
            <div class="card">
                <div class="card-inner">
                <div class="card-front">
    <a href="course_details.php?course_id=<?php echo $course['id']; ?>">
    <?php if (!empty($course['course_code'])): ?>
      
      <p class="card-quote"><?php echo htmlspecialchars($course['course_code']); ?></p>



                                    <?php endif; ?>
                                    <span class="card-status"><?php echo $course['status'] == 'free' ? 'FREE' : 'PAID'; ?></span>
        <img src="<?php echo htmlspecialchars($course['image']); ?>" alt="Web Development" class="card-image"/>
        <div class="card-content">
             <h3 class="card-title text-center fw-bold " style="color:#2b235e;"><?php echo htmlspecialchars($course['title']); ?>
             <p class="card-rating "><?php echo htmlspecialchars($course['rates']); ?></p></h3>
            <p  class="card-author fw-bold" style="color: #9754a1;"><?php echo htmlspecialchars($course['instructor_name']); ?></p>
            <p class="card-talk text-black" style="color: #fff;"><?php echo htmlspecialchars($course['description']); ?></p>
         </div>
    </a>
</div>

                    <div class="card-back">
                        <p class="course-description"><?php echo htmlspecialchars($course['short_des']); ?></p>
                        <a href="course_details.php?course_id=<?php echo $course['id']; ?>" class="btn btn-register">more details</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

           
             <div class="carousel-controls"> 
        <button class="carousel-prev">&lt;</button>
        <button class="carousel-next">&gt;</button>
</div>
      

      <!-- Scripts -->
       <script>
      const carousel = document.querySelector('.carousel');
const prevButton = document.querySelector('.carousel-prev');
const nextButton = document.querySelector('.carousel-next');
let currentIndex = 0;
let autoScrollInterval;

function scrollCarousel(index) {
    const totalCards = document.querySelectorAll('.card').length;
    const cardWidth = 500; // Adjust card width as needed

    currentIndex = (index + totalCards) % totalCards; // Ensure currentIndex stays within bounds

    const offset = currentIndex * cardWidth;

    carousel.style.transform = `translateX(-${offset}px)`;
}

function startAutoScroll() {
    autoScrollInterval = setInterval(() => {
        scrollCarousel(currentIndex + 1);
    }, 8000);
}

function stopAutoScroll() {
    clearInterval(autoScrollInterval);
}

prevButton.addEventListener('click', () => {
    scrollCarousel(currentIndex - 1);
});

nextButton.addEventListener('click', () => {
    scrollCarousel(currentIndex + 1);
});

// Start auto-scroll
startAutoScroll();

// Stop auto-scroll on hover and resume on mouse leave
carousel.addEventListener('mouseover', stopAutoScroll);
carousel.addEventListener('mouseout', startAutoScroll);

      </script>

      <!-- Other Footer and Section Content goes here -->
      
    </div>

















	  
     
      <!-- ======= Latest Properties Section ======= -->
      <section class="internships py-5 my-lg-5 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.3s">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="title-wrap d-flex justify-content-between mb-4">
                <div class="title-box">
                  <h2 class="title wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">Latest Internships</h2>
                </div>
                <div class="title-link wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                  <a href="internships.html"
                    >All Internships
                    <span class="fa fa-chevron-right"></span>
                  </a>
                </div>
              </div>
            </div>
            <div class="owl-carousel owl-theme internshipsCarousel">
              <div class="item wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="card-box card-shadow">
                  <div class="img-box-a">
                    <img src="assets/images/internship.png" alt="" class="img-a img-fluid" />
                  </div>
                  <div class="card-overlay">
                    <div class="card-overlay-a-content">
                      <div class="card-header-a">
                        <h2 class="card-title-a">
                          <a href="internship-details.html"> Frontend Developer Internship </a>
                        </h2>
                      </div>
                      <div class="card-body-a">
                        <div class="price-box d-flex">
                          <span class="price-a">Full Time</span>
                        </div>
                        <a href="internship-details.html" class="link-a"
                          >More Details
                          <span class="fa fa-chevron-right"></span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- ITEM-2 -->
              <div class="item wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="card-box card-shadow">
                  <div class="img-box-a">
                    <img src="assets/images/internship.png" alt="" class="img-a img-fluid" />
                  </div>
                  <div class="card-overlay">
                    <div class="card-overlay-a-content">
                      <div class="card-header-a">
                        <h2 class="card-title-a">
                          <a href="internship-details.html"> Backend Developer Internship </a>
                        </h2>
                      </div>
                      <div class="card-body-a">
                        <div class="price-box d-flex">
                          <span class="price-a">Full Time</span>
                        </div>
                        <a href="internship-details.html" class="link-a"
                          >More Details
                          <span class="fa fa-chevron-right"></span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- ITEM-3 -->
              <div class="item wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="card-box card-shadow">
                  <div class="img-box-a">
                    <img src="assets/images/internship.png" alt="" class="img-a img-fluid" />
                  </div>
                  <div class="card-overlay">
                    <div class="card-overlay-a-content">
                      <div class="card-header-a">
                        <h2 class="card-title-a">
                          <a href="internship-details.html"> Fullstack Developer Internship </a>
                        </h2>
                      </div>
                      <div class="card-body-a">
                        <div class="price-box d-flex">
                          <span class="price-a">Full Time</span>
                        </div>
                        <a href="internship-details.html" class="link-a"
                          >More Details
                          <span class="fa fa-chevron-right"></span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- ITEM-4 -->
              <div class="item wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="card-box card-shadow">
                  <div class="img-box-a">
                    <img src="assets/images/internship.png" alt="" class="img-a img-fluid" />
                  </div>
                  <div class="card-overlay">
                    <div class="card-overlay-a-content">
                      <div class="card-header-a">
                        <h2 class="card-title-a">
                          <a href="internship-details.html"> Frontend Developer Internship </a>
                        </h2>
                      </div>
                      <div class="card-body-a">
                        <div class="price-box d-flex">
                          <span class="price-a">Part Time</span>
                        </div>
                        <a href="internship-details.html" class="link-a"
                          >More Details
                          <span class="fa fa-chevron-right"></span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- ITEMS-END -->
            </div>
          </div>
        </div>
      </section>
      <!-- End Latest Properties Section -->

      <footer>
        <section class="footer pt-5">
          <div class="container text-lg-start text-center">
            <div class="row">
              <div class="col-lg-3 col-md-6">
                <a href="index.html" class="footer-brand">
                  <img width="200" src="assets/images/footer-logo.png" alt="" />
                </a>
                <div class="social-icons d-flex ms-lg-4 ps-lg-1 mt-lg-5 mt-3 my-lg-0 my-3">
                  <a class="x-icon me-3" href="">
                    <i class="fa-brands fa-x-twitter"></i>
                  </a>
                  <a class="facebook-icon me-3" href="">
                    <i class="fa-brands fa-facebook"></i>
                  </a>
                  <a class="ig-icon" href="">
                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <defs>
                        <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                          <stop offset="0%" style="stop-color: #f09433; stop-opacity: 1" />
                          <stop offset="25%" style="stop-color: #e6683c; stop-opacity: 1" />
                          <stop offset="50%" style="stop-color: #dc2743; stop-opacity: 1" />
                          <stop offset="75%" style="stop-color: #cc2366; stop-opacity: 1" />
                          <stop offset="100%" style="stop-color: #bc1888; stop-opacity: 1" />
                        </linearGradient>
                      </defs>
                      <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M17.333 4.333H8.666C6.273 4.333 4.333 6.273 4.333 8.666v8.667c0 2.394 1.94 4.334 4.333 4.334h8.667c2.393 0 4.333-1.94 4.333-4.334V8.666c0-2.393-1.94-4.333-4.333-4.333H8.666zM8.666 2.166C5.076 2.166 2.166 5.076 2.166 8.666v8.667c0 3.59 2.91 6.5 6.5 6.5h8.667c3.59 0 6.5-2.91 6.5-6.5V8.666c0-3.59-2.91-6.5-6.5-6.5H8.666z"
                      />
                      <path d="M18.417 8.667c.599 0 1.084-.485 1.084-1.084 0-.598-.485-1.083-1.084-1.083-.598 0-1.083.485-1.083 1.083 0 .599.485 1.084 1.083 1.084z" />
                      <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M18.417 13c0 2.992-2.425 5.417-5.417 5.417-2.992 0-5.417-2.425-5.417-5.417S10.008 7.584 13 7.584c2.992 0 5.417 2.425 5.417 5.417zM16.25 13c0 1.795-1.455 3.25-3.25 3.25s-3.25-1.455-3.25-3.25 1.455-3.25 3.25-3.25 3.25 1.455 3.25 3.25z"
                      />
                    </svg>
                  </a>
                </div>
              </div>
              <div class="col-lg-3 col-md-6">
                <ul class="footer-links">
                  <li class="nav-item fw-bold">Company</li>
                  <li class="nav-item"><a class="footer-link" href="index.php">Home</a></li>
                  <li class="nav-item"><a class="footer-link" href="#!">About</a></li>
                  <li class="nav-item"><a class="footer-link" href="#!">Grab Your Intern</a></li>
                  <li class="nav-item"><a class="footer-link" href="#!">Hub Your Vendor</a></li>
                </ul>
              </div>
              <div class="col-lg-3 col-md-6">
                <ul class="footer-links">
                  <li class="nav-item fw-bold">Information</li>
                  <li class="nav-item"><a class="footer-link" href="#!">Privacy policy</a></li>
                  <li class="nav-item"><a class="footer-link" href="#!">Terms of use </a></li>
                </ul>
              </div>
              <div class="col-lg-3 col-md-6">
                <ul class="footer-links pb-lg-2">
                  <li class="nav-item fw-bold">Contact us</li>
                  <li class="nav-item pe-lg-5 pb-0 px-lg-0 px-md-0 px-2">
                    <p class="pe-lg-5 px-lg-0 px-md-5 px-5">Need help hiring talents, have questions about employment? We're here</p>
                  </li>
                </ul>
                <a class="btn btn-green px-4 py-2 mb-3" href="">Connect</a>
              </div>
            </div>
          </div>
          <div class="divider"></div>
          <div class="container text-center">
            <div class="row">
              <div class="col-12">
                <p class="pt-5 pb-2 copyrights">&copy; 2024 InternGrub. All rights reserved.</p>
              </div>
            </div>
          </div>
        </section>
      </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tiny-slider.js"></script>
    <script src="js/script.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!-- WOW.JS -->
    <script src="js/wow.min.js"></script>
    <script>
      new WOW().init();
    </script>

    <script>
      $(".internshipsCarousel").owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        smartSpeed: 1000,
        navSpeed: 1000,
        autoplay: true,
        autoplayHoverPause: true,
        autoplayTimeout: 5000,
        responsive: {
          0: {
            items: 1,
          },
          768: {
            items: 2,
          },
          1000: {
            items: 3,
          },
        },
        // autoWidth: true,
      });
    </script>
    <script type="text/javascript">
      //========= Hero Slider
      tns({
        container: ".hero-slider",
        slideBy: "page",
        autoplay: true,
        autoplayButtonOutput: false,
        mouseDrag: true,
        gutter: 0,
        items: 1,
        autoplayTimeout: 5000,
        speed: 1500,
        nav: false,
        controls: true,
        controlsText: ['<i class="fa-solid fa-chevron-left"></i>', '<i class="fa-solid fa-chevron-right"></i>'],
      });
    </script>
  </body>
</html>
