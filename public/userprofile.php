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
        <label for="usertype">user Type: <?= $user['roleType']?></label>

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
            username<input type="text" name="username" id="username" value="<?= $inputs['username'] ?? $user['username'] ?>"
            class="<?= error_class($errors, 'username') ?>">
            <small><?= $errors['username'] ?? '' ?></small><br>
            email<input type="email" name="email" id="email" value="<?= $inputs['email'] ?? $user['email'] ?>"
            class="<?= error_class($errors, 'email') ?>">
            <small><?= $errors['email'] ?? '' ?></small><br>
            fname<input type="text" name="fname" id="fname" value="<?= $inputs['fname'] ?? $user['firstname'] ?>"
            class="<?= error_class($errors, 'fname') ?>">
            <small><?= $errors['fname'] ?? '' ?></small><br>
            lname<input type="text" name="lname" id="lname" value="<?= $inputs['lname'] ?? $user['lastName'] ?>"
            class="<?= error_class($errors, 'lname') ?>">
            <small><?= $errors['lname'] ?? '' ?></small><br>
            gender<input type="text" name="gender" id="gender" value="<?= $inputs['gender'] ?? $user['gender'] ?>"
            class="<?= error_class($errors, 'gender') ?>">
            <small><?= $errors['gender'] ?? '' ?></small><br>
            age<input type="text" name="age" id="age" value="<?= $inputs['age'] ?? $user['age'] ?>"
            class="<?= error_class($errors, 'age') ?>">
            <small><?= $errors['age'] ?? '' ?></small><br>
            <label for="birthday">birthday</label>
            <input type="date" name="birthday" id="birthday"type="date" value="<?= $inputs['birthday'] ?? $user['birthday'] ?>"
            class="<?= error_class($errors, 'birthday') ?>">
            <small><?= $errors['birthday'] ?? '' ?></small><br>
            address<input type="text" name="address" id="address" value="<?= $inputs['address'] ?? $user['address'] ?>"
            class="<?= error_class($errors, 'address') ?>">
            <small><?= $errors['address'] ?? '' ?></small><br>
            contactno<input type="text" name="contactno" id="contactno" value="<?= $inputs['contactno'] ?? $user['contactno'] ?>"
            class="<?= error_class($errors, 'contactno') ?>">
            <small><?= $errors['contactno'] ?? '' ?></small><br>
            aboutme<input type="text" name="aboutme" id="aboutme" value="<?= $inputs['aboutme'] ?? $user['aboutme'] ?>"
            class="<?= error_class($errors, 'aboutme') ?>">
            <small><?= $errors['aboutme'] ?? '' ?></small><br>
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
