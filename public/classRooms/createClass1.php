<?php
require __DIR__ . '/../../src/bootstrap.php';
require __DIR__ . '/../../src/loggedin/classStep1.php';

if (is_user_2fa() == 'false'){
  redirect_to('login.php');
}else{
audit_trail('User has started Class Creation', 2);
}
if(!auth_Level('Instructor')){
    redirect_to('../allowedNOT.php');
}
?>

<?php view('header', ['title' => 'Create Class']);
?>
<?php if (isset($errors['classRooms'])) : ?>
    <div class="alert alert-error">
        <?= $errors['classRooms'] ?>
    </div>
<?php endif ?>
<?php
if(!isset($_SESSION['post']['tempClassid'])){
  $tempClassid = generate_activation_code();
  $_SESSION['post']['tempClassid'] = $tempClassid;
}

$url = 'createClass1.php?tempID';
  ?>
<main id="mymain1">
  PA ADD https://getbootstrap.com/docs/5.0/components/progress/
<form action="<?= $url?>"  method="post">
  <label for="className">Class Name<div class="reqcolor">*</div></label>
  <small><?= $errors['className'] ?? '' ?></small>
  <input type="text" name="className" id="className" value="<?= $inputs['className'] ?? '' ?>" class="<?= error_class($errors, 'className') ?>">
  <label for="description">description<div class="reqcolor">*</div></label>
  <small><?= $errors['description'] ?? '' ?></small>
  <textarea  type="text" name="description" id="description" class="<?= error_class($errors, 'description') ?>"><?= $inputs['description'] ?? ''?></textarea>
  <button>Reset</button>
  <button>Next</button>
</form>
</main>


<?php view('footer') ?>
