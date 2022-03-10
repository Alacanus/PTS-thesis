<!-- Script for Loading Templates -->
<?php
require __DIR__ . '/../src/bootstrap.php';
?>
<?php view('header', ['title' => 'About Us']); ?>
<main id="mymain1">
    <div class="aboutus">
        <div class="aboutus-container">
            <section class="section--1">
                <div class="section--1-content">
                    <h2 id="sec-1-title">About Us</h2>
                    <h3 id="sec-1-title">Catch Phrase</h3>
                </div>
            </section>
            <section class="section--2">
                <div class="title-container">
                    <h2 id="title--1">Introduction</h2>
                    <p id="number">01</p>
                </div>
                <div class="content-container">
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        It has survived not only five centuries, but also the leap into electronic typesetting,
                        remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                        sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like
                        Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                </div>
            </section>
            <section class="section--5">
                <div class="title-container">
                    <h2 id="title--1">Mission</h2>
                    <p id="number">02</p>
                </div>
                <div class="content-container">
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                    </p>
                </div>
            </section>
            <section class="section--6">
                <div class="title-container">
                    <h2 id="title--1">Vision</h2>
                    <p id="number">03</p>
                </div>
                <div class="content-container">
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                    </p>
                </div>
            </section>
            <section class="section--4">
                <div class="title-container">
                    <h2>Our Services</h2>
                    <p id="number">04</p>
                    <div class="desc-container">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </p>
                    </div>
                </div>
                <div class="services-content">
                    <div class="col span-1-of-4">
                        <!-- Font Awesome Icon -->
                        <img src="/PTS-thesis/static/onetoone.svg" alt="OneToOne.svg">
                        <h3>One-To-One Meetings</h3>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                        </p>
                    </div>
                    <div class="col span-1-of-4">
                        <!-- Font Awesome Icon -->
                        <img src="/PTS-thesis/static/delivery.svg" alt="delivery.svg" class="icon-white">
                        <h3>Delivery</h3>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                        </p>
                    </div>
                    <div class="col span-1-of-4">
                        <!-- Font Awesome Icon -->
                        <img src="/PTS-thesis/static/learning.svg" alt="learning.svg" class="icon-white">
                        <h3>Online Learning</h3>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                        </p>
                    </div>
                    <div class="col span-1-of-4">
                        <!-- Font Awesome Icon -->
                        <img src="/PTS-thesis/static/teaching.svg" alt="teaching.svg" class="icon-white">
                        <h3>Live Teaching</h3>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                        </p>
                    </div>
                </div>
            </section>
            <section class="section--3">
                <div class="title-container">
                    <h2 id="title--2">Our Team Members</h2>
                    <p id="number">05</p>
                </div>
                <div class="grid-container">
                    <div class="card">
                        <div class="card-header">
                            <img src="/PTS-thesis/static/ourteam01.jpg" alt="Card-Header">
                        </div>
                        <div class="card-body">
                            <div class="card-title">
                                <p>Genesis Fragas</p>
                            </div>
                            <span class="tag tag-blue">Front-End Developer</span>
                            <div class="card-desc">
                                <p>
                                    I'm the Front-End Developer of Team Sage Main
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <img src="/PTS-thesis/static/loginbg.jpg" alt="Card-Header">
                        </div>
                        <div class="card-body">
                            <div class="card-title">
                                <p>Mark Henrick Linsangan</p>
                            </div>
                            <span class="tag tag-blue">Back-End Developer</span>
                            <div class="card-desc">
                                <p>
                                    I'm the Back-End Developer of Team Sage Main
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <img src="/PTS-thesis/static/instructorpf.jpg" alt="Card-Header" id="ourteam03">
                        </div>
                        <div class="card-body">
                            <div class="card-title">
                                <p>Sean Dennie Go</p>
                            </div>
                            <span class="tag tag-cyan">Documentation</span>
                            <div class="card-desc">
                                <p>
                                    I'm part of Team Sage Main
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <img src="/PTS-thesis/static/ourteam04.jpg" alt="Card-Header" id="ourteam04">
                        </div>
                        <div class="card-body">
                            <div class="card-title">
                                <p>Samuel Narbuada</p>
                            </div>
                            <span class="tag tag-cyan">Documentation</span>
                            <div class="card-desc">
                                <p>
                                    I'm part of Team Sage Main
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</main>
<?php view('footer') ?>