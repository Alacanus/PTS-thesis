<?php

require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/viewClasses.php';


//is_user_2fa();
?>

<?php view('header', ['title' => 'Class page']);
?>
<main id="mymain1">

    <h1><?= $class['']?>'s page</h1>
    <button type = "button" data-toggle="modal" data-target="#editProfileModal">Edit your Class(modal button)</button>
    <div>
        <label for="className">class name: <?= $class['']?></label>

    </div>
    <div>
        <label for="classStatus">Status: <?= $class['']?></label>

    </div>
    <div>
        <label for="classDescription">Description: <?= $class['']?></label>

    </div>
    <div>
        <label for="classSchedules">Schedules Available: <?= $class['']?></label>

    </div>
    <div>
        <label for="classVideointo">View introduction: <?= $class['']?></label>

    </div>
    <div>
        <label for="classImage">Class banner: <?= $class['']?></label>

    </div>
    <div>
        <label for="createdDate">Teaching students since: <?= $class['']?></label>

    </div>

    <div>
        <label for="modifiedDate">Updated on: <?= $class['']?></label>

    </div>
    <div>
        <label for="equivalentHours">equivalent Hours: <?= $class['']?></label>

    </div>
    <div>
        <label for="skillLevel">skill Level: <?= $class['']?></label>

    </div>

    <div>
        <label for="userID">Teacher name: <?= $class['']?></label>

    </div>
    <div>
        <label for="milestones">Class Milestones: <?= $class['']?></label>
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
<!-- Trigger the modal with a button
    Update on CLass CRUD
  -->

<!-- Modal -->
<div class="modal fade" id="editProfileModal" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit your profile</h4>
      </div>
      <div class="modal-body">
            <div class=modalTHIS> 
            <form id="form" action="userprofile.php" method="post">
            <div>
            username<input type="text" name="username" id="username" value="<?= $inputs['username'] ?? $user[''] ?>"
            class="<?= error_class($errors, 'username') ?>">
            <small><?= $errors['username'] ?? '' ?></small>
            email<input type="email" name="email" id="email" value="<?= $inputs['email'] ?? $user[''] ?>"
            class="<?= error_class($errors, 'email') ?>">
            <small><?= $errors['email'] ?? '' ?></small>
            </div>
            <div>
            fname<input type="text" name="fname" id="fname" value="<?= $inputs['fname'] ?? $user[''] ?>"
            class="<?= error_class($errors, 'fname') ?>">
            <small><?= $errors['fname'] ?? '' ?></small>
            lname<input type="text" name="lname" id="lname" value="<?= $inputs['lname'] ?? $user[''] ?>"
            class="<?= error_class($errors, 'lname') ?>">
            <small><?= $errors['lname'] ?? '' ?></small>
            </div>
            </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Update</button>

      </div>
    </div>
    
  </div>
</div>



<?php view('footer') ?>
