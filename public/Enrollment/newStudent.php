<?php
require __DIR__ . '/../../src/bootstrap.php';
require __DIR__ . '/../../src/loggedin/newStudent.php';

// if (is_user_2fa() == 'false'){
//   redirect_to('login.php');
// }else{
// audit_trail('User has started Class Creation', 2);
// }
// if(!auth_Level('Instructor')){
//     redirect_to('../allowedNOT.php');
// }
?>

<?php view('header', ['title' => 'Create Class']);
?>
<?php if (isset($errors['classRooms'])) : ?>
  <div class="alert alert-error">
    <?= $errors['classRooms'] ?>
  </div>
<?php endif ?>
<main id="mymain1">
    <form action="newStudent.php" method="POST">
    <input type="checkbox" name="Async" value="Async">Async<br>
    <input type="checkbox" name="Sync" value="Sync">Sync<br>
    <label for="agree">
                                    <input type="checkbox" name="agree" id="agree" value="checked" <?= $inputs['agree'] ?? '' ?> /> I
                                    agree with the
                                    <a href="#" title="term of services">Term of Services</a>
                                    <div class="reqcolor">*</div>
                                </label>
    <button>Apply</button>
    </form>

</main>
<?php view('footer') ?>