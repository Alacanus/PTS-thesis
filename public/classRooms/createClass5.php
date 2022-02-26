<?php
require __DIR__ . '/../../src/bootstrap.php';
require __DIR__ . '/../../src/loggedin/classStep5.php';

// if (is_user_2fa() == 'false'){
//   redirect_to('login.php');
// }else{
// audit_trail('User has procedeed step 5', 2);
// }
// if(!auth_Level('Instructor')){
//     redirect_to('../allowedNOT.php');
// }
?>

<?php view('header', ['title' => 'Create Class']);
?>
<?php if (isset($errors['userProfile'])) : ?>
    <div class="alert alert-error">
        <?= $errors['classRooms'] ?>
    </div>
<?php endif ?>
<main id="mymain1">
<div class="form-style">
<div class="form-element">
<form action="" method="POST"> 
                            <div class="inline-item-3">
                                <label for="paylistID">Payment Method<div class="reqcolor">*</div></label>
                                <select name="paylistID" class="<?= error_class($errors, 'paylistID') ?>">
                                    <option value="">- - - - Select - - - -</options>
                                        <?php
                                        foreach ($option_list as $options) {
                                            echo '<option value="' . $options['paylistID'] . '">' . $options['paymentName'] . '</option>';
                                        }
                                        ?>
                                </select>
                                <small><?= $errors['paylistID'] ?? '' ?></small>
                            </div>
                            <div class="form-element">
                                <label for="accountName">Accounnt Name<div class="reqcolor">*</div></label>
                                <div class="errormsg">       
                                    <small><?= $errors['accountName'] ?? '' ?></small>
                                </div>
                                <input type="text" name="accountName" id="accountName"  class="<?= error_class($errors, 'accountName') ?>">
                            </div>
                            <div class="form-element">
                                <label for="accountName">Accounnt Details {account number}<div class="reqcolor">*</div></label>
                                <div class="errormsg">       
                                    <small><?= $errors['accountName'] ?? '' ?></small>
                                </div>
                                <input type="text" name="accountName" id="accountName"  class="<?= error_class($errors, 'accountName') ?>">
                            </div>
                            <div class="form-element">
                                <label for="imageUpload">Upload Image</label>
                                <input type="file" name="imageUpload" id="imageUpload">
                            </div>
                            <div class="form-element">
                            <button type=="submit">Next</button>
                        </div>
                                    </form>
</main>


<?php view('footer') ?>
