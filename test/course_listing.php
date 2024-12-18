<?php
session_start();
require_once('user_authentication/functions.php');

//if (!isset($_SESSION['username'])) {
   // header("Location: user_authentication/login.php");
    //exit();
//}
require_once('C:/xampp/htdocs/LMS(tasks)/connection/db.php');

// Get the search term if it's set
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
//echo "Search Term: " . $searchTerm; // For debugging purposes

// Define the query to search for courses 
$query1 = "SELECT courses.*, instructors.name as instructor_name FROM courses 
          LEFT JOIN instructors ON courses.instructor_id = instructors.id 
          WHERE courses.title LIKE ? 
          OR courses.description LIKE ? 
          OR instructors.name LIKE ?";
          
$term = '%' . $searchTerm . '%';
$stmt = $pdo->prepare($query1);
$stmt->execute([$term, $term,$term]);
$courses1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
//end


//insert courses
// Define your courses 
$courses = [
  [
      'title' => 'Python',
      'description' => 'Beginner-friendly, versatile programming language',
      'short_des' => 'Python is a powerful, high-level programming language known for its simplicity and readability. This course covers fundamental concepts such as data types, control structures, functions, and libraries, as well as advanced topics like web development, data analysis, and machine learning.',
      'video' => 'assets/videos/python.mp4',
      'instructor_name' => 'Guido van Rossum',
      'price' => 0.00,
      'discount_price' => 0.00,
      'status' => 'free',
      'image' => 'assets/images/th.jpeg',
      'learning' => '✅ Use Python for Data Science and Machine Learning
                     ✅ Implement Machine Learning Algorithms
                     ✅ Use Spark for Big Data Analysis
                     ✅ Learn to use Pandas for Data Analysis
                     ✅ Learn to use NumPy for Numerical Data
                     ✅ Learn to use Matplotlib for Python Plotting',
      'category_id' => 1,
      'rates' => 4.5,
      'course_code' => 'Hot & New',
      
      'course_duration' => '6-8 weeks (Basic to Intermediate)',
      'category' => 'Programming',
  ],
  [
      'title' => 'Java',
      'description' => 'Versatile, platform-independent programming language',
      'short_des' => 'Java is a high-level, object-oriented programming language designed for cross-platform compatibility. This course covers the fundamentals of Java, including syntax, OOP concepts, file handling, and building robust applications.',
      'instructor_name' => 'James Gosling',
      'price' => 0.00,
      'discount_price' => 0.00,
      'status' => 'free',
      'image' => 'assets/images/java.png',
      'learning' => '✅ Build robust, platform-independent applications 
                     ✅ Develop web applications using Java EE and Spring
                     ✅ Understand object-oriented programming principles 
                     ✅ Create Android applications 
                     ✅ Utilize Java APIs and libraries for various tasks 
                     ✅ Implement multithreading and concurrency',
      'video' => 'assets/videos/java.mp4',
      'category_id' => 2,
      'rates' => 4.2,
      'course_code' => 'Hot & New',
      
      'course_duration' => '8-12 weeks (Basic to Advanced)',
      'category' => 'Programming',
  ],
  [
      'title' => 'C++',
      'description' => 'Powerful, efficient programming for systems',
      'short_des' => 'C++ is a widely used programming language for performance-critical applications. This course focuses on core concepts such as memory management, object-oriented programming, data structures, and algorithms, ideal for developing games and system software.',
      'instructor_name' => 'Bjarne Stroustrup',
      'price' => 150.00,
      'discount_price' => 99.99,
      'status' => 'paid',
      'image' => 'assets/images/c++.jpg',
      'learning' => '✅ Develop high-performance applications and systems 
                     ✅ Master object-oriented programming concepts 
                     ✅ Implement data structures and algorithms 
                     ✅ Create real-time simulations and game engines 
                     ✅ Handle low-level memory management 
                     ✅ Utilize the Standard Template Library (STL)',
      'video' => 'assets/videos/c++.mp4',
      'category_id' => 3,
      'rates' => 4.1,
      
      'course_duration' => '8-10 weeks (Intermediate Level)',
      'category' => 'Programming',
  ],

             [  'title' => 'software engineer',
                'description' => 'Systematic approach to software development',
                'short_des' => 'This course provides an introduction to software engineering principles, covering the software development lifecycle, requirement analysis, design patterns, agile methodologies, and testing strategies. Learn to build scalable and maintainable software systems.',
                'instructor_name' => 'Martin Fowler', 
                'price' => 200.00,
                'discount_price'=>187.99,
                'status' => 'paid', 
                'image' => 'assets/images/software.jpeg',
                'learning'=>'✅ Design and develop scalable software systems 
                             ✅ Apply software development methodologies (Agile, Scrum) 
                             ✅ Ensure software quality through testing and debugging 
                             ✅ Understand software architecture and design patterns 
                             ✅ Collaborate with teams using version control systems (Git) 
                             ✅ Maintain and improve existing software systems',
                'video'=>'assets/videos/software_engineer.mp4',
                'category_id' => 4,
                'rates'=>3.65,
                
                'course_duration' => '12 weeks (Basic to Intermediate)',
                'category' => 'Engineering', ],

                [  'title' => 'PHP',
                'description' => 'Dynamic server-side web development',
                'short_des' => 'PHP is a versatile scripting language for building dynamic web applications. This course covers syntax, working with databases (MySQL), creating RESTful APIs, and best practices for developing secure and scalable server-side code.',
                'instructor_name' => 'Rasmus Lerdorf', 
                'price' => 148.00,
                'status' => 'paid', 
                'image' => 'assets/images/php.png',
                'learning'=>'✅ Design and develop dynamic, server-side web applications
                             ✅ Integrate PHP with databases like MySQL and PostgreSQL
                             ✅ Optimize PHP scripts for performance and scalability
                             ✅ Debug and troubleshoot backend issues in PHP code
                             ✅ Implement RESTful APIs and web services
                             ✅ Collaborate with frontend teams to connect server-side logic
                             ✅ Use version control tools (e.g., Git) for project collaboration
                             ✅ Follow best practices for secure coding to prevent vulnerabilities,',
                'video'=>'assets/videos/php.mp4',
                'category_id' => 5,
                'rates'=>4.99,
                
        
                'course_duration' => '14 weeks (Basic to Intermediate)',
                'category'=>'Web Development' ]  , 

                [  'title' => 'Networking',
                'description' => 'Foundation of digital communication systems',
                'short_des' => 'Networking is at the core of modern communication. This course introduces you to network architectures, protocols, subnetting, and tools for configuring and troubleshooting networks, preparing you for roles in IT and cybersecurity.',
                'instructor_name' => 'Vinton Cerf', 
                'price' => 0.00,'discount_price'=>0.00,
                'status' => 'free', 
                'image' => 'assets/images/net.jfif',
                'learning'=>'✅ Design and implement secure, scalable network infrastructures
                             ✅ Configure and manage routers, switches, and firewalls
                             ✅ Monitor network performance and troubleshoot connectivity issues
                             ✅ Ensure network security through protocols, firewalls, and encryption
                             ✅ Maintain and update network documentation and configurations
                             ✅ Collaborate with teams to support enterprise IT requirements
                             ✅ Implement and manage VPNs and remote access solutions
                             ✅ Conduct regular network audits and optimize for performance',
                'video'=>'assets/videos/networking.mp4',
                'category_id' => 6,
                'rates'=>4.48,
                
              'course_duration' => '6-8 weeks (Basic to Intermediate)',
              'category'=>'Communication' ], 
                
                [  'title' => 'SQL',
                'description' => 'Essential for managing relational databases',
                'short_des' => 'SQL is the language for querying and managing relational databases. This course teaches you to create, update, and delete data, optimize queries, design database schemas, and understand key concepts like joins, indexes, and transactions.',
                'instructor_name' => 'Donald D. Chamberlin', 
                'price' => 88.99,'discount_price'=>49.99,
                'status' => 'paid', 
                'image' => 'assets/images/sql1.png',
                'learning'=>'✅ Design and maintain efficient, scalable database schemas
                            ✅ Write and optimize SQL queries for data retrieval and manipulation
                            ✅ Ensure data integrity through normalization and constraints
                            ✅ Create, update, and manage stored procedures and triggers
                            ✅ Monitor database performance and optimize for speed and efficiency
                            ✅ Implement database security measures to protect sensitive data
                            ✅ Perform regular backups and manage disaster recovery plans
                            ✅ Collaborate with developers to integrate databases with applications
                            ✅ Analyze data and generate reports for business insights,',
                'video'=>'assets/videos/sql.mp4',
                'category_id' => 7,
                'rates'=>3.48,
                'course_code'=>'Bestseller',
                'course_duration' => '4-5 weeks (Basic to Intermediate)',
                
                'category'=>'Database Management'] ,
            ]; 
// Call the function to insert courses into the database 
insertCourses($pdo, $courses); 
//echo "Courses have been successfully inserted.";

// Fetch distinct categories from courses table
$stmt = $pdo->prepare("SELECT DISTINCT category FROM courses");
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

$limit = 3; // Number of courses per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;
$search = isset($_GET['search']) ? $_GET['search'] : '';
$courseType = isset($_GET['courseType']) ? $_GET['courseType'] : '';
$category = isset($_GET['category']) ? $_GET['category'] : '';

// Build SQL query with dynamic conditions
$sql = "
    SELECT COUNT(*) 
    FROM courses
    JOIN instructors ON courses.instructor_id = instructors.id
    WHERE (courses.title LIKE :search
    OR courses.description LIKE :search
    OR courses.category LIKE :search
    OR instructors.name LIKE :search)
";
if (!empty($courseType)) {
  $sql .= " AND courses.status = :courseType";
}
if (!empty($category)) {
  $sql .= " AND courses.category = :category";
}

// Fetch total number of courses with search and filter
$stmt = $pdo->prepare($sql);
$searchTerm = '%' . $search . '%';
$stmt->bindParam(':search', $searchTerm, PDO::PARAM_STR);
if (!empty($courseType)) {
  $stmt->bindParam(':courseType', $courseType, PDO::PARAM_STR);
}
if (!empty($category)) {
  $stmt->bindParam(':category', $category, PDO::PARAM_STR);
}
$stmt->execute();
$total_courses = $stmt->fetchColumn();
$total_pages = ceil($total_courses / $limit);

// Fetch courses with limit, offset, search filter, type filter, and category filter
$sql = "
    SELECT 
        courses.id,
        courses.title, 
        courses.description,
        courses.video,  
        courses.short_des,
        courses.learning,
        courses.rates,
        
        courses.course_duration,
        courses.category,
        courses.price,
        courses.discount_price,
        courses.image,
        courses.status,
        instructors.name AS instructor_name
    FROM courses
    JOIN instructors ON courses.instructor_id = instructors.id
    WHERE (courses.title LIKE :search
    OR courses.description LIKE :search
    OR courses.category LIKE :search
    OR instructors.name LIKE :search)
";
if ($courseType) {
    $sql .= " AND courses.status = :courseType";
}
if ($category) {
    $sql .= " AND courses.category = :category";
}
$sql .= " LIMIT :limit OFFSET :offset";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':search', $searchTerm, PDO::PARAM_STR);
if ($courseType) {
    $stmt->bindParam(':courseType', $courseType, PDO::PARAM_STR);
}
if ($category) {
    $stmt->bindParam(':category', $category, PDO::PARAM_STR);
}
$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$courses1 = $stmt->fetchAll(PDO::FETCH_ASSOC);




// Fetch all courses from the database 
$query1 = "SELECT courses.*, instructors.name as instructor_name FROM courses 
           JOIN instructors ON courses.instructor_id = instructors.id";
$stmt = $pdo->prepare($query1);
$stmt->execute();
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta content="IE=edge" http-equiv="X-UA-Compatible" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Intern Dashboard</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/multiple-select@1.7.0/dist/multiple-select.min.css" /> -->
    <!-- <link rel="stylesheet" href="css/multiple-select.min.css" /> -->
    <link rel="stylesheet" href="css/all.min.css" />
    <!-- CSS for Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <style>
        /*hhhhhhhhhhh*/
     .course-card img {
      width: 100%;
      height: 300px;
      object-fit: cover;
      
    }
    .card-body {
       color: #9754a1;
    }
    
    .course-card  {
      width: 400px;
      height: 600px;
      margin-bottom: 30px;
      margin: 30px;
      transition: transform 0.3s;
      margin-left: 180px;
    }
    .course-card:hover .course-popup {
      opacity: 1;
      visibility: visible;
      transform: translateY(0);
     
    }
    .course-popup {
      
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      background-color: #29aa62;
      padding: 30px;
      opacity: 1;
      visibility: hidden;
      transform: translateY(-10px);
      transition: all 0.3s;
      font-size: 18px;
      font-weight: bold;
      color: #9754a1;
      
    }
   
    .course-details {
      padding: 30px;
      background-color: #f8f9fa;
      color: #9754a1;
 
    }


    .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background: #2b235e;
            color: #fff;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            overflow-y: auto;
            transition: all 0.3s;
        }

       

        .top-section {
            margin-bottom: 30px;
        }

        

        .menu-items {
            list-style: none;
            padding: 0;
        }

        .menu-items h2 {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 20px;
            text-transform: uppercase;
            color: #29aa62;
            text-align: center;
        }

        .form-control {
            margin-bottom: 15px;
            border-radius: 5px;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ced4da;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .btn-secondary {
            padding: 10px;
            border-radius: 5px;
            transition: background 0.3s, transform 0.3s;
            display: block;
            width: 100%;
            text-align: center;
            background: #2b235e;
            font-weight: bold;

        }
        .btn-secondary:hover {
            background:  #9754a1;
            transform: scale(1.05);
        }

        .btn-primary {
            background: #29aa62;
            border: none;
            color: #fff;
        }

        .btn-primary:hover {
            background:  #9754a1;
            transform: scale(1.05);
        }

        .dropdown-menu {
            background-color: #29aa62;
            border: none;
            border-radius: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .dropdown-item {
            color:  #000;
            transition: background-color 0.3s;
            font-weight: bold;
           
        }

        .dropdown-item:hover {
            background-color: #495057;
        }

       
    
.card-body input[type="submit"] {
    background-color: #2b235e;
    color: #fff;
    font-weight: bold;
    padding: 5px 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1rem;
    text-transform: uppercase;
    transition: background-color 0.3s ease;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    margin-left: 150px;
}

.card-body input[type="submit"]:hover {
    background-color: #9754a1;
}

/*home*/
.home {
    margin-left:250px;
    position: relative;
    background: url('assets/images/courselisting.png') no-repeat center center/cover;
    height: 30vh; /* Full viewport height */
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
    width: 60%;
    height: 60%;
    background: none; 
    z-index: 1;
}

.container {
    position: relative;
    z-index: 2; /* Ensures the content is above the overlay */
}

/* Text Section */
.home-text h3 {
    font-size: 2rem;
    font-weight: bold;
    color: #D4AD37;
    margin-bottom: 20px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    animation: fadeInUp 1s ease-out;
}

.home-text h4 {
    font-size: 1.5rem;
    font-weight: bold;
    color: #ffffff;
    margin-bottom: 20px;
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
    animation: fadeInUp 1.2s ease-out;
}

.home-text p {
    font-size: 1rem;
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
header {
    margin-left: 250px;
}
.text-custom {
    color: #9754a1;
}
.card-rating {
    text-align: center;
    font-size: 18px; /* Slightly smaller for better balance */
    font-weight: bold;
    margin-bottom: 10px;
    color: #eebe20; 
  

}
      </style>
  </head>
  <div class="pageContainer">
      <header>
        <div class="header py-3">
          <nav class="navbar navbar-expand-lg">
            <div class="container">
              <a class="navbar-brand" href="#">
                <img src="assets/internGrub-logo.png" alt="" width="150" />
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
                    <a class="nav-link fw-semibold" href="#">Grab Your Intern</a>
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






<div class="sidebar">
        <div class="top-section mt-20">
            
        </div>
        <ul class="menu-items">
           <!-- Search Section -->
<h2 class="text-center search-heading mt-20">Search Courses</h2>
<form method="GET" action="course_listing.php" class="d-flex flex-column">
    <input type="text" name="search" class="form-control" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>" placeholder="Search courses, categories, or instructors...">
    <div class="radio-section d-flex justify-content-between mb-3">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="courseType" id="free" value="free" <?php echo (isset($_GET['courseType']) && $_GET['courseType'] == 'free') ? 'checked' : ''; ?>>
            <label class="form-check-label radio-label" for="free">Free</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="courseType" id="paid" value="paid" <?php echo (isset($_GET['courseType']) && $_GET['courseType'] == 'paid') ? 'checked' : ''; ?>>
            <label class="form-check-label radio-label" for="paid">Paid</label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mb-3">Search</button>
    <!-- Correctly add the ID for reset button -->
    <button type="button" id="resetButton" class="btn btn-secondary">Reset</button>
</form>

            

     <!-- Categories Section -->
     <div class="dropdown mt-4">
            <button class="category-btn btn btn-secondary dropdown-toggle" type="button" id="categoriesDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Categories
            </button>
            <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                <?php foreach ($categories as $category): ?>
                <li>
                    <a class="dropdown-item" href="course_listing.php?category=<?php echo urlencode($category['category']); ?>">
                        <?php echo htmlspecialchars($category['category']); ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </ul>
</div>
  
<!-- Course Listing -->
<div class="container mt-5" id="courses">
    <div class="row">
        <?php if (!empty($courses1)): ?>
            <?php foreach ($courses1 as $course): ?>
                <div class="col-md-4">
                    <a href="course_details.php?course_id=<?php echo $course['id']; ?>" class="text-decoration-none text-dark">
                        <div class="card course-card">
                            <img src="<?php echo htmlspecialchars($course['image']); ?>" class="card-img-top" alt="Course Thumbnail">
                            <div class="card-body m-3">
                                <h5 class="card-title text-center fw-bold " style="font-size: 25px; color:#2b235e;"><?php echo htmlspecialchars($course['title']); ?></h5>
                                <p class="card-rating "><?php echo htmlspecialchars($course['rates']); ?></p></h3>
                                <p class="card-text fw-bold text-center" style=" color: #9754a1;"><?php echo htmlspecialchars($course['instructor_name']); ?></p>
                                <p class="card-text text-black" style="color: #fff;"><?php echo htmlspecialchars($course['description']); ?></p>  
                                <span class="badge bg-success">
                                <?php echo $course['price'] == 0 || $course['price'] == '0.00' ? 'FREE' : '$' . htmlspecialchars($course['price']); ?>
                                </span>
                                <input type="submit" value="Let's start">
                            </div>

                            <!-- Popup with data from the database -->
                            <div class="course-popup">
                                <div class="card-body">
                                   
                                    
                                    <p class="card-text text-black"><?php echo htmlspecialchars($course['short_des']); ?></p>
                                    <a href="course_details.php?course_id=<?php echo $course['short_des']; ?>"></a>  
                                   
                                </div>
                                
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
            <?php else: ?>
              <p class="text-center mt-5" style="color: black;">No courses found matching your search criteria. Please try again with different keywords.</p>

                <?php endif; ?> 
              </div> 
            </div>
            <nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <li class="page-item <?php if ($page <= 1) { echo 'disabled'; } ?>">
            <a class="page-link" href="?page=<?php echo $page - 1; ?>&search=<?php echo htmlspecialchars($search); ?>#courses" tabindex="-1">Previous</a>
        </li>
        <?php
        for ($i = 1; $i <= $total_pages; $i++) {
            $active = ($i == $page) ? 'active' : '';
            echo '<li class="page-item ' . $active . '">';
            echo '<a class="page-link" href="?page=' . $i . '&search=' . htmlspecialchars($search) . '#courses">' . $i . '</a>';
            echo '</li>';
        }
        ?>
        <li class="page-item <?php if ($page >= $total_pages) { echo 'disabled'; } ?>">
            <a class="page-link" href="?page=<?php echo $page + 1; ?>&search=<?php echo htmlspecialchars($search); ?>#courses">Next</a>
        </li>
    </ul>
</nav>

</div>

    


 <script>  
document.addEventListener('DOMContentLoaded', () => {
    // Enable smooth scrolling for pagination links with #courses
    const links = document.querySelectorAll('a.page-link');
    links.forEach(link => {
        link.addEventListener('click', (e) => {
            const href = link.getAttribute('href');
            if (href.includes('#courses')) {
                const target = document.querySelector('#courses');
                if (target) {
                    // Scroll to the section but allow page navigation
                    target.scrollIntoView({ behavior: 'smooth' });

                    // Let the browser handle navigation after a delay
                    setTimeout(() => {
                        window.location.href = href;
                    }, 0); // Delay to allow smooth scrolling to finish
                    e.preventDefault(); // Prevent immediate navigation
                }
            }
        });
    });

    // Reset button functionality
    const resetButton = document.getElementById('resetButton');
    if (resetButton) {
        resetButton.addEventListener('click', () => {
            console.log('Reset button clicked');
            window.location.href = 'course_listing.php'; // Redirect to reset filters
        });
    }
});
</script>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/dashboard-script.js"></script>
</body>
</html>
