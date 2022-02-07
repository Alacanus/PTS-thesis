<?php

require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/loggedin/userProfile.php';


is_user_2fa();
?>

<?php view('header', ['title' => 'User Profile']);
?>
<main id="mymain1">
    <h1><?= $user['username']?>'s Profile</h1>
    <div>
        <label for="usertype">user Type: <?= $user['roleID']?></label>

    </div>
    <div>
        <label for="username">Username: <?= $user['username']?></label>

    </div>

    <div>
        <label for="email">Email: <?= $user['email']?></label>

    </div>

    <div>
        <label for="fname">first name: <?= $user['firstname']?></label>

    </div>

    <div>
        <label for="lname">Last name: <?= $user['lastName']?></label>

    </div>

    <div>
        <label for="age">Age: <?= $user['age']?></label>

    </div>

    <div>
        <label for="gender">Gender: <?= $user['gender']?></label>

    </div>

    <div>
        <label for="birthday">Birthday: <?= $user['birthday']?></label>

    </div>

    <div>
        <label for="address">Address: <?= $user['address']?></label>

    </div>

    <div>
        <label for="contactno">Contact No: <?= $user['contactno']?></label>

    </div>

    <div>
        <label for="aboutme">About me: <?= $user['aboutme']?></label>

    </div>
</main>
<!-- Trigger the modal with a button -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal">
  Edit
</button>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Make changes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form id="form" action="userprofile.php" method="post">
            username<input type="text" name="username" id="username" value="<?= $inputs['username'] ?? $user[''] ?>"
            class="<?= error_class($errors, 'username') ?>">
            <small><?= $errors['username'] ?? '' ?></small>
            email<input type="email" name="email" id="email" value="<?= $inputs['email'] ?? $user[''] ?>"
            class="<?= error_class($errors, 'email') ?>">
            <small><?= $errors['email'] ?? '' ?></small>
            fname<input type="text" name="fname" id="fname" value="<?= $inputs['fname'] ?? $user[''] ?>"
            class="<?= error_class($errors, 'fname') ?>">
            <small><?= $errors['fname'] ?? '' ?></small>
            lname<input type="text" name="lname" id="lname" value="<?= $inputs['lname'] ?? $user[''] ?>"
            class="<?= error_class($errors, 'lname') ?>">
            <small><?= $errors['lname'] ?? '' ?></small>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



<?php view('footer') ?>
