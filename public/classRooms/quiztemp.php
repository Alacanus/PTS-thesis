<?php require __DIR__ . '/../../src/bootstrap.php';
require __DIR__ . '/../../src/loggedin/classStep1.php'; ?>
<?php view('header', ['title' => 'Create Class']); ?>
<!-- Responsive Height Background -->
<div class="overlaybg-02">
    <!-- Flex -->
    <div class="usertest">
        <!-- Container for the Page -->
        <div class="ut-container">
            <div class="test-header">
                <div class="header-item">
                    <div class="time" id="navbar">
                        <!-- Need Class Name -->
                        <i class="bi bi-clock"></i>Time left : <span id="timer"></span>
                        <!-- Temp Date -->
                        <label for="#">4:00</label>
                    </div>
                </div>
                <div class="header-item">
                    <button class="button btn btn-full btn-nav" id="mybut" onclick="myFunction()">START QUIZ</button>
                </div>
            </div>
            <div class="test-body">
                <!-- For each Container -->
                <div class="question-container">
                    <div class="question-title">
                        <h2>1.) What does PHP stand for?</h2>
                    </div>
                    <div class="question-body">
                        <!-- Question Options won't Text Transform to Upper Case or Lower Case -->
                        <div class="question-option--01">
                            <p>
                                <!-- Radio Button Before Choice A -->
                                a.) Preprocessed Hypertext Page
                            </p>
                        </div>
                        <div class="question-option--02">
                            <p>
                                <!-- Radio Button Before Choice B -->
                                b.) Hypertext Markup Language
                            </p>
                        </div>
                        <div class="question-option--03">
                            <p>
                                <!-- Radio Button Before Choice C -->
                                c.) Hypertext Preprocessor
                            </p>
                        </div>
                        <div class="question-option--04">
                            <p>
                                <!-- Radio Button Before Choice D -->
                                d.) Hypertext Transfer Protocol
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php view('footer') ?>