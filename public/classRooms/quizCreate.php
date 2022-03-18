<?php
require __DIR__ . '/../../src/bootstrap.php';
require __DIR__ . '/../../src/loggedin/classStep1.php';
?>
<?php view('header', ['title' => 'Create Class']); ?>

<div class="overlaybg">
    <div class="quizCreate">
        <div class="qc-container">
            <div class="container-edit form-style">
                <h2>Add Quiz</h2>
                <form action="" method="post">
                    <div class="form-element">
                        <label for="question">Ask Question</label>
                        <input type="text" class="form-control" id="question" name="question" placeholder="Enter your question here" Required>
                    </div>
                    <div class="form-element">
                        <label for="correct_answer">Correct answer</label>
                        <input type="text" class="form-control" id="correct_answer" name="correct_answer" placeholder="Enter the correct answer here" Required>
                    </div>
                    <div class="form-element">
                        <label for="wrong_answer1">Wrong Answers</label>
                        <input type="text" class="form-control" id="wrong_answer1" name="wrong_answer1" placeholder="Wrong answer 1" Required>
                    </div>
                    <div class="form-element">
                        <label class="sr-only" for="wrong_answer2">Wrong Answers 2</label>
                        <input type="text" class="form-control" id="wrong_answer2" name="wrong_answer2" placeholder="Wrong answer 2" Required>
                    </div>
                    <div class="form-element">
                        <label class="sr-only" for="wrong_answer3">Wrong Answers 2</label>
                        <input type="text" class="form-control" id="wrong_answer3" name="wrong_answer3" placeholder="Wrong answer 3" Required>
                    </div>
                    <div class="form-element">
                        <button type="submit" class="btn btn-nav btn-full" value="submit" name="submit"><i class="bi bi-plus-lg"></i> Add Question</button>
                    </div>
                </form>
            </div>
            <div class="container-edit form-style">
                <h2>Set New Timer</h2>
                <form action="" method="post">
                    <div id="inline-inputs" class="form-element">
                        <div class="sub-item">
                            <label for="minute">Minutes</label>
                            <input type="digit" class="form-control input-group-lg reg_name" name="min" placeholder="Min" Required>
                        </div>
                        <div class="sub-item">
                            <label for="second">Seconds</label>
                            <input type="digit" class="form-control input-group-lg reg_name" name="sec" placeholder="Sec" Required>
                        </div>
                    </div>
                    <div class="form-element">
                        <button type="submit" class="btn btn-nav btn-full" value="submit" name="timesubmit"><i class="bi bi-plus-lg"></i> Set Timer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php if (isset($_POST['submit'])) {
    $fetchqry = "SELECT * FROM `quiz`";
    $result = mysqli_query($con, $fetchqry);
    $num = mysqli_num_rows($result);
    @$id = $num + 1;
    @$que = $_POST['question'];
    @$ans = $_POST['correct_answer'];
    @$wans1 = $_POST['wrong_answer1'];
    @$wans2 = $_POST['wrong_answer2'];
    @$wans3 = $_POST['wrong_answer3'];
    $qry = "INSERT INTO `quiz`(`id`, `que`, `option 1`, `option 2`, `option 3`, `option 4`, `ans`) VALUES ($id,'$que','$ans','$wans1','$wans2','$wans3','$ans')";
    $done = mysqli_query($con, $qry);
    if ($done == TRUE) {
        echo "Question and Answers Sumbmitted Succesfully";
    }
}
?>

<?php
if (isset($_POST['timesubmit'])) {
    @$min = $_POST['min'];
    @$sec = $_POST['sec'];
    $timer = $min . ':' . $sec;
    $fetchqry3 = "UPDATE `quiz` SET `timer`='$timer' WHERE`id`=1";
    $result3 = mysqli_query($con, $fetchqry3);
    if ($result3 == TRUE) {
        echo "The timer currently set to $timer";
    }
}
?>

<?php view('footer') ?>

<!-- ===================================================================================== -->

<!-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Simple Online Quiz">
    <meta name="author" content="Val Okafor">   
    <title>Simple Quiz</title> -->

<!-- Bootstrap core CSS -->
<!-- <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-theme.css"> -->
<!-- Custom styles for this template -->
<!-- <link href="css/theme.css" rel="stylesheet">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <a href="quizCreate.php">
  <button>add questions</button>
</a>
<a href="quiz.php">
  <button>Quiz</button>
</a> -->