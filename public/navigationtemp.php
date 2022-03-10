<?php
require __DIR__ . '/../src/bootstrap.php';
?>

<?php view('header', ['title' => 'Change Password']); ?>

<!--======================== LoggedIn - Learner ========================-->
<nav class="nav-loggedin">
    <div class="row">
        <div class="logo">
            <h2>
                <div class="logo-blue">P</div>TS
            </h2>
        </div>
        <ul class="main-nav">
            <li><a href="#">Home</a></li>
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

<!--======================== LoggedIn - Instructor ========================-->
<nav class="nav-loggedin">
    <div class="row">
        <div class="logo">
            <h2>
                <div class="logo-blue">P</div>TS
            </h2>
        </div>
        <ul class="main-nav">
            <li><a href="#">Home</a></li>
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
</nav>

<!--======================== LoggedIn - Coordinator ========================-->
<nav class="nav-loggedin">
    <div class="row">
        <div class="logo">
            <h2>
                <div class="logo-blue">P</div>TS
            </h2>
        </div>
        <ul class="main-nav">
            <li><a href="#">Home</a></li>
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
</nav>

<!--======================== LoggedIn - Procurement ========================-->
<nav class="nav-loggedin">
    <div class="row">
        <div class="logo">
            <h2>
                <div class="logo-blue">P</div>TS
            </h2>
        </div>
        <ul class="main-nav">
            <li><a href="#">Home</a></li>
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
</nav>

<!--======================== LoggedIn - Admin ========================-->
<nav class="nav-loggedin">
    <div class="row">
        <div class="logo">
            <h2>
                <div class="logo-blue">P</div>TS
            </h2>
        </div>
        <ul class="main-nav">
            <li><a href="#">Home</a></li>
            <li><a href="aboutUs.php">About Us</a></li>
            <li><a href="#">Courses</a></li>
            <li><a href="viewfaq.php">FAQ</a></li>
            <li>
                <div class="user-img" onclick="umToggle_04();">
                    <img src="/PTS-thesis/static/profilepic.jpg" alt="profile picture.jpg">
                </div>
                <div class="user-menu">
                    <div class="user-content">
                        <p>Genesis Fragas</p>
                        <p id="content--1">Admin</p>
                    </div>
                    <ul>
                        <li><img src="/PTS-thesis/static/user-solid.svg" alt=""><a href="#">Account Management</a></li>
                        <li><i class="bi bi-file-earmark-person-fill"></i><a href="#">Class Management</a></li>
                        <li><img src="/PTS-thesis/static/table-solid.svg" alt=""><a href="#">Transaction</a></li>
                        <li><img src="/PTS-thesis/static/audittrail-solid.svg" alt=""><a href="#">Audit Trail</a></li>
                        <li><img src="/PTS-thesis/static/logout.svg" alt=""><a href="#">Logout</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>

<!--======================== Script for Img Menu Drop Down ========================-->

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