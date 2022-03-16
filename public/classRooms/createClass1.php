<?php
require __DIR__ . '/../../src/bootstrap.php';
require __DIR__ . '/../../src/loggedin/classStep1.php';

// if (is_user_2fa() == 'false'){
//   redirect_to('login.php');
// }else{
// audit_trail('User has started Class Creation', 2);
// }
// if(!auth_Level('Instructor')){
//     redirect_to('../allowedNOT.php');
// }
$tableNAme = 'skilllevels';
$option_list = get_db_Options($tableNAme);
$tableNAme2 = 'equivalenthours';
$option_list2 = get_db_Options($tableNAme2);
$submitMethod = "post";
if (is_get_request()) {
  [$inputs, $errors] = session_flash('inputs', 'errors');

  //load file
  if (isset($_GET['classID'])) {
    $classID = $_GET['classID'];
    $temp = get_class_Info($classID);
    if (isset($temp[0])) {
      $inputs = $temp[0];
      $_SESSION['post']['classID'] = $classID;
      $submitMethod = "GET";
    } else {
      $submitMethod = "post";
    } 
  }
} else{
  $submitMethod = "post";
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
if (!isset($_SESSION['post']['tempClassid'])) {
  $tempClassid = generate_activation_code();
  $_SESSION['post']['tempClassid'] = $tempClassid;
}
?>
<main id="mymain1">
  <!-- PA ADD https://getbootstrap.com/docs/5.0/components/progress/ -->
  <div class="overlaybg">
    <div class="ccr-step--01">
      <div class="ccr-container">
        <div class="container-edit-left">
          <div class="wrapper">
            <ul class="ccr-progbar">
              <li class="ccr-progbar-item current">
                <h3>Step 01</h3>
              </li>
              <li class="ccr-progbar-item">
                <h3>Step 02</h3>
              </li>
              <li class="ccr-progbar-item">
                <h3>Step 03</h3>
              </li>
              <li class="ccr-progbar-item">
                <h3>Step 04</h3>
              </li>
              <li class="ccr-progbar-item">
                <h3>Step 05</h3>
              </li>
              <li class="ccr-progbar-item">
                <h3>Summary</h3>
              </li>
            </ul>
          </div>
        </div>
        <div class="container-edit form-style">
          <form action="createClass1.php" method="<?= $submitMethod ?>">
            <h2>Create Class</h2>
            <div class="form-element">
              <label for="className">Class Name<div class="reqcolor">*</div></label>
              <input type="text" name="className" id="className" value="<?= $inputs['className'] ?? '' ?>" class="<?= error_class($errors, 'className') ?>">
              <small><?= $errors['className'] ?? '' ?></small>
            </div>
            <div class="form-element">
              <label for="classDescription">Description<div class="reqcolor">*</div></label>
              <textarea type="text" name="classDescription" id="description" class="<?= error_class($errors, 'classDescription') ?>"><?= $inputs['classDescription'] ?? '' ?></textarea>
              <small><?= $errors['classDescription'] ?? '' ?></small>
            </div>
            <div class="form-element">
              <label for="equivalentHours">Equivalent Hours<div class="reqcolor">*</div></label>
              <select name="equivalentHours" id="equivalentHours" required>
                <option selected value="<?= $inputs['equivalentHours'] ?? '' ?>"><?= $inputs['equivalentHours'] ?? '' ?></option>
                <?php
                foreach ($option_list2 as $options) {
                  echo '<option value="' . $options['Label'] . '">' . $options['Label'] . '</option>';
                }
                ?>
              </select>
            </div>
            <div class="form-element">
              <label for="skillLevel">Skill Level<div class="reqcolor">*</div></label>
              <select name="skillLevel" id="skillLevel" required>
                <option selected value="<?= $inputs['skillLevel'] ?? '' ?>"><?= $inputs['skillLevel'] ?? '' ?></option>
                <?php
                foreach ($option_list as $options) {
                  echo '<option value="' . $options['SkillName'] . '">' . $options['SkillName'] . '</option>';
                }
                ?>
              </select>
            </div>
            <div class="form-element-btn">
              <button class="btn btn-nav btn-ghost2"><i class="bi bi-arrow-clockwise"></i> Reset</button>
              <button class="btn btn-table btn-full" title="Next" id="btn-next"><i class="bi bi-arrow-right-circle"></i></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
<?php view('footer') ?>