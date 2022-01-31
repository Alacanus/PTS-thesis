<?php

require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/loggedin/userProfile.php';


//is_user_2fa();
?>

<?php view('header', ['title' => 'User Profile']);
?>
<main id="mymain1">

    <h1><?= $user['']?>'s Profile</h1>
    <button type = "button" data-toggle="modal" data-target="#editProfileModal">Edit your profile(modal button)</button>
    <div>
        <label for="usertype">user Type: <?= $user['']?></label>

    </div>
    <div>
        <label for="username">Username: <?= $user['']?></label>

    </div>

    <div>
        <label for="email">Email: <?= $user['']?></label>

    </div>

    <div>
        <label for="fname">first name: <?= $user['']?></label>

    </div>

    <div>
        <label for="lname">Last name: <?= $user['']?></label>

    </div>
</main>
<!-- Trigger the modal with a button -->

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
