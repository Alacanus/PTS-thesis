<!DOCTYPE html>
<html lang="en">
<head>
<script>
    function umToggle_01() {
        const toggleUM = document.querySelector('.user-menu--01');
        toggleUM.classList.toggle('active')
    }

    function umToggle_02() {
        const toggleUM = document.querySelector('.user-menu');
        toggleUM.classList.toggle('active')
    }

    function umToggle_03() {
        const toggleUM = document.querySelector('.user-menu');
        toggleUM.classList.toggle('active')
    }

    function umToggle_04() {
        const toggleUM = document.querySelector('.user-menu');
        toggleUM.classList.toggle('active')
    }

    function umToggle_05() {
        const toggleUM = document.querySelector('.user-menu');
        toggleUM.classList.toggle('active')
    }
</script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ELP is a Electronic Learning PLatform for students who want to continuesly hone their skills">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper //remove with own js css/js-->
<!--     
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
     -->
    <!-- Design - External CSS & Scripts Code -->
    <link rel="stylesheet" type="text/css" href="<?= 'http://'. $_SERVER['HTTP_HOST'] . '/PTS-thesis/public/css/grid.css'?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    
    <!-- own code -->
    <script type="text/javascript" src= <?= 'http://'. $_SERVER['HTTP_HOST'] . '/PTS-thesis/static/Sitewide.js'?>></script>  
    <link rel="stylesheet" href="<?= 'http://'. $_SERVER['HTTP_HOST'] . '/PTS-thesis/public/css/style.css'?>">
    
    <!-- Title -->
    <title><?= $title ?? 'PTS' ?></title>

</head>
<body>
    <header>
        <!-- <nav class="not-loggedin">
            <div class="row">
                <div class="logo">
                    <h2>
                        <div class="logo-blue">P</div>TS
                    </h2>
                </div>
                <ul class="main-nav">
                    <li><a href="landing.php">Home</a></li>
                    <li><a href="aboutus.php">About Us</a></li>
                    <li><a href="viewFAQ.php">FAQ</a></li>
                    <li><a href="login.php"><button class="btn btn-nav btn-full">LOGIN</button></a></li>
                    <li><a href="register.php"><button class="btn btn-nav btn-nav-ghost btn-ghost">REGISTER</button></a></li>
                </ul>
            </div>
        </nav> -->
        <?php
        function Get_Navbar(int $roleID){
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
        $link = "https";
        else $link = "http";
        // Here append the common URL characters.
        $link .= "://";
        // Append the host(domain name, ip) to the URL.
        $link .= $_SERVER['HTTP_HOST'];
        $link .= "/pts-thesis/public/";
        switch ($roleID) {
            case "2":
              $roletype = 'Admin';
              $nav='<nav class="nav-loggedin">
              <div class="row">
                  <div class="logo">
                      <h2>
                          <div class="logo-blue">P</div>TS
                      </h2>
                  </div>
                  <ul class="main-nav">
                      <li><a href="'.$link.'landing.php">Home</a></li>
                      <li><a href="'.$link.'aboutUs.php">About Us</a></li>
                      <li><a href="#">Courses</a></li> <!-- classlist -->
                      <li><a href="'.$link.'viewfaq.php">FAQ</a></li>
                      <li>
                          <div class="user-img" onclick="umToggle_04();">
                              
                              <!-- <img src="/PTS-thesis/static/profilepic.jpg" alt="profile picture.jpg"> -->
                              <!-- style this -->
                          </div>
                          <div class="user-menu">
                              <div class="user-content">
                                  <p>Genesis Fragas</p>
                                  <p id="content--1">Admin</p>
                              </div>
                              <ul>
                                  <li><img src="/PTS-thesis/static/user-solid.svg" alt=""><a href="'.$link.'accountManagement.php">Account Management</a></li>
                                  <li><i class="bi bi-file-earmark-person-fill"></i><a href="'.$link.'">Class Management</a></li>
                                  <li><img src="/PTS-thesis/static/table-solid.svg" alt=""><a href="'.$link.'">Transaction</a></li>
                                  <li><img src="/PTS-thesis/static/audittrail-solid.svg" alt=""><a href="'.$link.'">Audit Trail</a></li>
                                  <li><img src="/PTS-thesis/static/logout.svg" alt=""><a href="'.$link.'logout">Logout</a></li>
                              </ul>
                          </div>
                      </li>
                  </ul>
              </div>
          </nav>'."<script>
          function umToggle_01() {
              const toggleUM = document.querySelector('.user-menu--01');
              toggleUM.classList.toggle('active')
          }
      
          function umToggle_02() {
              const toggleUM = document.querySelector('.user-menu');
              toggleUM.classList.toggle('active')
          }
      
          function umToggle_03() {
              const toggleUM = document.querySelector('.user-menu');
              toggleUM.classList.toggle('active')
          }
      
          function umToggle_04() {
              const toggleUM = document.querySelector('.user-menu');
              toggleUM.classList.toggle('active')
          }
      
          function umToggle_05() {
              const toggleUM = document.querySelector('.user-menu');
              toggleUM.classList.toggle('active')
          }
      </script>";
              break;
            case "3":
              $roletype = 'Learner';
              $nav ='<nav class="nav-loggedin">
              <div class="row">
                  <div class="logo">
                      <h2>
                          <div class="logo-blue">P</div>TS
                      </h2>
                  </div>
                  <ul class="main-nav">
                      <li><a href="landing.php">Home</a></li>
                      <li><a href="aboutUs.php">About Us</a></li>
                      <li><a href="#">Courses</a></li>
                      <li><a href="viewfaq.php">FAQ</a></li>
                      <li>
                          <div class="user-img" onclick="umToggle_01();">
                              <img src="/PTS-thesis/static/profilepic.jpg" alt="profile picture.jpg">
                          </div>
                          <div class="user-menu">
                              <div class="user-content">
                                  <p>Genesis Fragas</p>
                                  <p id="content--1">Learner</p>
                              </div>
                              <ul>
                                  <li><img src="/PTS-thesis/static/user-solid.svg" alt=""><a href="#">My Profile</a></li>
                                  <li><img src="/PTS-thesis/static/chalkboard-solid.svg" alt=""><a href="#">My Classes</a></li>
                                  <li><i class="bi bi-calendar-event"></i><a href="#">Schedules</a></li>
                                  <li><img src="/PTS-thesis/static/truck-fast-solid.svg" alt=""><a href="#">Deliveries</a></li>
                                  <li><i class="bi bi-cart"></i><a href="#">Order</a></li>
                                  <li><img src="/PTS-thesis/static/table-solid.svg" alt=""><a href="#">Transaction</a></li>
                                  <li><img src="/PTS-thesis/static/audittrail-solid.svg" alt=""><a href="#">Audit Trail</a></li>
                                  <li><img src="/PTS-thesis/static/logout.svg" alt=""><a href="#">Logout</a></li>
                              </ul>
                          </div>
                      </li>
                  </ul>
              </div>
          </nav>
          '."<script>
          function umToggle_01() {
              const toggleUM = document.querySelector('.user-menu--01');
              toggleUM.classList.toggle('active')
          }
      
          function umToggle_02() {
              const toggleUM = document.querySelector('.user-menu');
              toggleUM.classList.toggle('active')
          }
      
          function umToggle_03() {
              const toggleUM = document.querySelector('.user-menu');
              toggleUM.classList.toggle('active')
          }
      
          function umToggle_04() {
              const toggleUM = document.querySelector('.user-menu');
              toggleUM.classList.toggle('active')
          }
      
          function umToggle_05() {
              const toggleUM = document.querySelector('.user-menu');
              toggleUM.classList.toggle('active')
          }
      </script>";
              break;
            case "4":
              $roletype = 'Instructor';
              $nav ='<nav class="nav-loggedin">
              <div class="row">
                  <div class="logo">
                      <h2>
                          <div class="logo-blue">P</div>TS
                      </h2>
                  </div>
                  <ul class="main-nav">
                      <li><a href="landing.php">Home</a></li>
                      <li><a href="aboutUs.php">About Us</a></li>
                      <li><a href="#">Courses</a></li>
                      <li><a href="viewfaq.php">FAQ</a></li>
                      <li>
                          <div class="user-img" onclick="umToggle_02();">
                              <img src="/PTS-thesis/static/profilepic.jpg" alt="profile picture.jpg">
                          </div>
                          <div class="user-menu">
                              <div class="user-content">
                                  <p>Mark Linsangan</p>
                                  <p id="content--1">Instructor</p>
                              </div>
                              <ul>
                                  <li><img src="/PTS-thesis/static/user-solid.svg" alt=""><a href="#">My Profile</a></li>
                                  <li><img src="/PTS-thesis/static/chalkboard-solid.svg" alt=""><a href="#">My Classes</a></li>
                                  <li><i class="bi bi-people"></i><a href="#">Learner List</a></li>
                                  <li><i class="bi bi-calendar-event"></i><a href="#">Schedules</a></li>
                                  <li><img src="/PTS-thesis/static/table-solid.svg" alt=""><a href="#">Transaction</a></li>
                                  <li><img src="/PTS-thesis/static/audittrail-solid.svg" alt=""><a href="#">Audit Trail</a></li>
                                  <li><img src="/PTS-thesis/static/logout.svg" alt=""><a href="#">Logout</a></li>
                              </ul>
                          </div>
                      </li>
                  </ul>
              </div>
          </nav>'."<script>
          function umToggle_01() {
              const toggleUM = document.querySelector('.user-menu--01');
              toggleUM.classList.toggle('active')
          }
      
          function umToggle_02() {
              const toggleUM = document.querySelector('.user-menu');
              toggleUM.classList.toggle('active')
          }
      
          function umToggle_03() {
              const toggleUM = document.querySelector('.user-menu');
              toggleUM.classList.toggle('active')
          }
      
          function umToggle_04() {
              const toggleUM = document.querySelector('.user-menu');
              toggleUM.classList.toggle('active')
          }
      
          function umToggle_05() {
              const toggleUM = document.querySelector('.user-menu');
              toggleUM.classList.toggle('active')
          }
      </script>";;
              break;
            case "5":
              $roletype = 'Coordinator';
              $nav ='<nav class="nav-loggedin">
              <div class="row">
                  <div class="logo">
                      <h2>
                          <div class="logo-blue">P</div>TS
                      </h2>
                  </div>
                  <ul class="main-nav">
                      <li><a href="landing.php">Home</a></li>
                      <li><a href="aboutUs.php">About Us</a></li>
                      <li><a href="#">Courses</a></li>
                      <li><a href="viewfaq.php">FAQ</a></li>
                      <li>
                          <div class="user-img" onclick="umToggle_03();">
                              <img src="/PTS-thesis/static/profilepic.jpg" alt="profile picture.jpg">
                          </div>
                          <div class="user-menu">
                              <div class="user-content">
                                  <p>Dennie Go</p>
                                  <p id="content--1">Coordinator</p>
                              </div>
                              <ul>
                                  <li><img src="/PTS-thesis/static/user-solid.svg" alt=""><a href="#">My Profile</a></li>
                                  <li><i class="bi bi-file-earmark-person-fill"></i><a href="#">Class Management</a></li>
                                  <li><i class="bi bi-calendar-event"></i><a href="#">Schedules</a></li>
                                  <li><img src="/PTS-thesis/static/table-solid.svg" alt=""><a href="#">Transaction</a></li>
                                  <li><img src="/PTS-thesis/static/audittrail-solid.svg" alt=""><a href="#">Audit Trail</a></li>
                                  <li><img src="/PTS-thesis/static/logout.svg" alt=""><a href="#">Logout</a></li>
                              </ul>
                          </div>
                      </li>
                  </ul>
              </div>
          </nav>'."<script>
          function umToggle_01() {
              const toggleUM = document.querySelector('.user-menu--01');
              toggleUM.classList.toggle('active')
          }
      
          function umToggle_02() {
              const toggleUM = document.querySelector('.user-menu');
              toggleUM.classList.toggle('active')
          }
      
          function umToggle_03() {
              const toggleUM = document.querySelector('.user-menu');
              toggleUM.classList.toggle('active')
          }
      
          function umToggle_04() {
              const toggleUM = document.querySelector('.user-menu');
              toggleUM.classList.toggle('active')
          }
      
          function umToggle_05() {
              const toggleUM = document.querySelector('.user-menu');
              toggleUM.classList.toggle('active')
          }
      </script>";
              break;
            case "6":
              $roletype = 'Procurement';
              $nav='<nav class="nav-loggedin">
              <div class="row">
                  <div class="logo">
                      <h2>
                          <div class="logo-blue">P</div>TS
                      </h2>
                  </div>
                  <ul class="main-nav">
                      <li><a href="landing.php">Home</a></li>
                      <li><a href="aboutUs.php">About Us</a></li>
                      <li><a href="#">Courses</a></li>
                      <li><a href="viewfaq.php">FAQ</a></li>
                      <li>
                          <div class="user-img" onclick="umToggle_04();">
                              <img src="/PTS-thesis/static/profilepic.jpg" alt="profile picture.jpg">
                          </div>
                          <div class="user-menu">
                              <div class="user-content">
                                  <p>Samuel Narbuada</p>
                                  <p id="content--1">Procurement</p>
                              </div>
                              <ul>
                                  <li><i class="bi bi-cart"></i><a href="#">Order</a></li>
                                  <li><img src="/PTS-thesis/static/truck-fast-solid.svg" alt=""><a href="#">Delivery</a></li>
                                  <li><img src="/PTS-thesis/static/table-solid.svg" alt=""><a href="#">Transaction</a></li>
                                  <li><img src="/PTS-thesis/static/audittrail-solid.svg" alt=""><a href="#">Audit Trail</a></li>
                                  <li><img src="/PTS-thesis/static/logout.svg" alt=""><a href="#">Logout</a></li>
                              </ul>
                          </div>
                      </li>
                  </ul>
              </div>
          </nav>'."<script>
          function umToggle_01() {
              const toggleUM = document.querySelector('.user-menu--01');
              toggleUM.classList.toggle('active')
          }
      
          function umToggle_02() {
              const toggleUM = document.querySelector('.user-menu');
              toggleUM.classList.toggle('active')
          }
      
          function umToggle_03() {
              const toggleUM = document.querySelector('.user-menu');
              toggleUM.classList.toggle('active')
          }
      
          function umToggle_04() {
              const toggleUM = document.querySelector('.user-menu');
              toggleUM.classList.toggle('active')
          }
      
          function umToggle_05() {
              const toggleUM = document.querySelector('.user-menu');
              toggleUM.classList.toggle('active')
          }
      </script>";
              break;
              default:
              $nav = '<header>
              <nav class="not-loggedin">
                  <div class="row">
                      <div class="logo">
                          <h2>
                              <div class="logo-blue">P</div>TS
                          </h2>
                      </div>
                      <ul class="main-nav">
                          <li><a href="landing.php">Home</a></li>
                          <li><a href="aboutus.php">About Us</a></li>
                          <li><a href="viewFAQ.php">FAQ</a></li>
                          <li><a href="login.php"><button class="btn btn-nav btn-full">LOGIN</button></a></li>
                          <li><a href="register.php"><button class="btn btn-nav btn-nav-ghost btn-ghost">REGISTER</button></a></li>
                      </ul>
                  </div>
              </nav>
          </header>'."<script>
          function umToggle_01() {
              const toggleUM = document.querySelector('.user-menu--01');
              toggleUM.classList.toggle('active')
          }
      
          function umToggle_02() {
              const toggleUM = document.querySelector('.user-menu');
              toggleUM.classList.toggle('active')
          }
      
          function umToggle_03() {
              const toggleUM = document.querySelector('.user-menu');
              toggleUM.classList.toggle('active')
          }
      
          function umToggle_04() {
              const toggleUM = document.querySelector('.user-menu');
              toggleUM.classList.toggle('active')
          }
      
          function umToggle_05() {
              const toggleUM = document.querySelector('.user-menu');
              toggleUM.classList.toggle('active')
          }
      </script>";
            }
        return $nav;
    }
    if(isset($_SESSION['logedroleID'])){
    echo Get_Navbar($_SESSION['logedroleID']);
    }else{
        echo'<nav class="not-loggedin">
        <div class="row">
            <div class="logo">
                <h2>
                    <div class="logo-blue">P</div>TS
                </h2>
            </div>
            <ul class="main-nav">
                <li><a href="landing.php">Home</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="viewFAQ.php">FAQ</a></li>
                <li><a href="login.php"><button class="btn btn-nav btn-full">LOGIN</button></a></li>
                <li><a href="register.php"><button class="btn btn-nav btn-nav-ghost btn-ghost">REGISTER</button></a></li>
            </ul>
        </div>
    </nav>';
    }
    ?>
    </header>
<main>
    <?php flash(
    'user_register_success',
    'Your account has been created successfully. Please activate your account here.',
    'success'
);
?>