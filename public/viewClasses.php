<?php

require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/viewClasses.php';
// $revidewCARD=[];
$Username="KAT";
?>

<?php view('header', ['title' => 'Class page']);
if(isset($classInfo)){
    $teacher=find_user_by_uid($classInfo[0]['userID']);

    $temp = $classInfo[0]['imageAddress'];
    $imageAddress = substr($temp,15);
}

?>
<main id="mymain1">
    <h1><?= $class['']?>'s page</h1>
    <img src="<?= $imageAddress?>" class="card-img-top" style="width: 40rem;">
    <div>
        <label for="className">class name: <?= $classInfo[0]['className'] ?? '' ?></label>

    </div>
    <div>
        <label for="classStatus">Status: <?= $classInfo[0]['classStatus'] ?? ''?></label>

    </div>
    <div>
        <label for="classDescription">Description: <?= $classInfo[0]['classDescription'] ?? ''?></label>

    </div>
    <div>
        <label for="classSchedules">Schedules Available: <?= $class[''] ?? ''?></label>

    </div>
    <div>
        <label for="classVideointo">View introduction: <?= $class[''] ?? ''?></label>

    </div>
    <div>
        <label for="classImage">Class banner: <?=  $classInfo[0]['imageAddress'] ?? ''?></label>

    </div>
    <div>
        <label for="createdDate">Teaching students since: <?= $classInfo[0]['creationDate'] ?? ''?></label>

    </div>

    <div>
        <label for="modifiedDate">Updated on: <?= $classInfo[0]['modifiedDate'] ?? ''?></label>

    </div>
    <div>
        <label for="equivalentHours">equivalent Hours: <?= $class['']?></label>

    </div>
    <div>
        <label for="skillLevel">skill Level: <?= $class['']?></label>

    </div>

    <div>
        <label for="userID">Teacher name: <?php if(isset($teacher['firstname'])){
            echo $teacher['firstname']. " ". $teacher['lastName'];}else{
                echo '';
            } ?></label>

    </div>
    <div>
        <label for="milestones">Class Milestones: <?= $class[''] ?? ''?></label>
        <table id="milestonesTable">
    <thead>
        <th>Milestone </th>
        <th>Description </th>
        <th>achieved via </th>
    </thead>
    <tbody>
        <?php if(!empty($arr_users)) { ?>
            <?php foreach($arr_users as $user) { ?>
                <tr>
                    <td><?php echo $user['first_name']; ?></td>
                    <td><?php echo $user['last_name']; ?></td>
                    <td><?php echo $user['age']; ?></td>
                </tr>
            <?php } ?>
        <?php } ?>
    </tbody>
</table>
    </div>
</main>

<div>
    <h2>Review Cards</h2>
    <div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
    <div class="card-header">Feedback DemoUsername</div>
    <div class="card-body">
        <h4 class="card-title">Overall <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i><i class="bi bi-star"></i></h4>
        <h6 class="card-title">Presentation <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i></h6>
        <h6 class="card-title">Content <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i><i class="bi bi-star"></i></h6>
        <h6 class="card-title">Grammar <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i></h6>
        <h6 class="card-title">Attendance <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></h6>
        <p class="card-text"> Chef Stevie made each lesson a fun and informative experience! She was ver encouraging and great in explaining things in a simple and direct way that made each dish a rewarding experience. By the end of the lesson I felt like I really accomplished something!</p>
    </div>
</div>
<?php
if(!empty($revidewCARD)){
    foreach ($revidewCARD as $options) {
$reviewer=find_user_by_uid($options['userID']);
        echo '<div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
        <div class="card-header">'. $reviewer['lastName'] .'</div>
        <div class="card-body">
            <h4 class="card-title">Overall '. $options['totalRating'].'</h4>
            <h6 class="card-title">Presentation  '. $options['presentation'].'</h6>
            <h6 class="card-title">Content '.$options['content'].'</h6>
            <h6 class="card-title">Grammar '.$options['legibility'].'</h6>
            <h6 class="card-title">Attendance '.$options['attendance'].'</h6>
            <p class="card-text">'.$options['description'].'</p>
        </div>
        </div>
        <br>';
      }
}

    ?>
</div>
<form action="viewClasses.php" method="post" accept-charset="utf-8">
    <fieldset><legend>Review The Class</legend>	
    <p>
        <label for="rating">Presentation</label>
        <input type="radio" name="presentation" value="5" /> 5 
        <input type="radio" name="presentation" value="4" /> 4
        <input type="radio" name="presentation" value="3" /> 3 
        <input type="radio" name="presentation" value="2" /> 2 
        <input type="radio" name="presentation" value="1" /> 1
    </p>
    <p>
        <label for="rating">Legibility</label>
        <input type="radio" name="legibility" value="5" /> 5 
        <input type="radio" name="legibility" value="4" /> 4
        <input type="radio" name="legibility" value="3" /> 3 
        <input type="radio" name="legibility" value="2" /> 2 
        <input type="radio" name="legibility" value="1" /> 1
    </p>
    <p>
        <label for="rating">Content</label>
        <input type="radio" name="content" value="5" /> 5 
        <input type="radio" name="content" value="4" /> 4
        <input type="radio" name="content" value="3" /> 3 
        <input type="radio" name="content" value="2" /> 2 
        <input type="radio" name="content" value="1" /> 1
    </p>
    <p>
        <label for="rating">Attendance</label>
        <input type="radio" name="attendance" value="5" /> 5 
        <input type="radio" name="attendance" value="4" /> 4
        <input type="radio" name="attendance" value="3" /> 3 
        <input type="radio" name="attendance" value="2" /> 2 
        <input type="radio" name="attendance" value="1" /> 1
    </p>
    <p>
        <label for="review">Review</label>
        <textarea name="reviewText" rows="8" cols="40"></textarea></p>
    <p><input type="submit" value="Submit Review"></p>
</fieldset>
</form>
<?php 

view('footer') ?>
