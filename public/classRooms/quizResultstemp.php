<?php require __DIR__ . '/../../src/bootstrap.php';
require __DIR__ . '/../../src/loggedin/classStep1.php'; ?>
<?php view('header', ['title' => 'Create Class']); ?>

<!-- Background Color -->
<div class="overlaybg">
    <!-- Parent Flex container -->
    <div class="quizResult">
        <!-- flex container -->
        <div class="result-container">
            <!-- flex container -->
            <div class="res-body">
                <!-- flex container -->
                <div class="res-ill-item">
                    <!-- flex item -->
                    <img src="/PTS-thesis/static/undraw_quiz.svg" alt="unDraw Illustration">
                </div>
                <!-- flex container -->
                <div class="res-body-item">
                    <!-- flex item -->
                    <h2>Quiz Result</h2>
                    <!-- flex item -->
                    <span><label for="correct-score">No. of Correct Answer:</label><?php echo $no = @$_SESSION['score']; ?></span>
                    <!-- flex item -->
                    <span><label for="num-score">Your Score:</label>&nbsp<?php if (isset($no)) echo $no * 2; ?></span>
                    <!-- Button To Redirect to Class or Courses -->
                </div>
            </div>
        </div>
    </div>
</div>

<!--
    for res-body-firstchild ========================
    //var_dump($_SESSION['ids']); //session_unset(); 
-->

<?php view('footer') ?>