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
$tableNAme ='skilllevels';
$option_list = get_db_Options($tableNAme);
$tableNAme2 ='equivalenthours';
$option_list2 = get_db_Options($tableNAme2);
if(is_get_request()) {
  [$inputs, $errors] = session_flash('inputs', 'errors');

  //load file
  if(isset($_GET['classID'])){
      $classID = $_GET['classID'];
     $temp= get_class_Info($classID);
     if(isset($temp[0])){
      $inputs = $temp[0];
      $_SESSION['post']['classID'] = $classID;
      $submitMethod = "GET";
     }else{
      $submitMethod = "post";
     }
  }
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
  ?>
<main id="mymain1">
  PA ADD https://getbootstrap.com/docs/5.0/components/progress/
<form action="createClass1.php"  method="<?= $submitMethod?>">
  <label for="className">Class Name<div class="reqcolor">*</div></label>
  <small><?= $errors['className'] ?? '' ?></small>
  <input type="text" name="className" id="className" value="<?= $inputs['className'] ?? '' ?>" class="<?= error_class($errors, 'className') ?>">
  <label for="classDescription">description<div class="reqcolor">*</div></label>
  <small><?= $errors['classDescription'] ?? '' ?></small>
  <textarea  type="text" name="classDescription" id="description" class="<?= error_class($errors, 'classDescription') ?>"><?= $inputs['classDescription'] ?? ''?></textarea>
  <label for="equivalentHours">Equivalent Hours<div class="reqcolor">*</div></label>
  <select name="equivalentHours" id="equivalentHours" required>
  <option selected value="<?=$inputs['equivalentHours'] ?? ''?>"><?=$inputs['equivalentHours'] ?? ''?></option>
            <?php 
            foreach($option_list2 as $options)
            {
                echo '<option value="'.$options['Label'].'">'.$options['Label'].'</option>';
            }
            ?>
            </select>
  <label for="skillLevel">Skill Level<div class="reqcolor">*</div></label>
  <select name="skillLevel" id="skillLevel" required>
  <option selected value="<?=$inputs['skillLevel'] ?? ''?>"><?=$inputs['skillLevel'] ?? ''?></option>
            <?php 
            foreach($option_list as $options)
            {
                echo '<option value="'.$options['SkillName'].'">'.$options['SkillName'].'</option>';
            }
            ?>
            </select>
  <button>Reset</button>
  <button>Next</button>
</form>
</main>


<?php view('footer') ?>
