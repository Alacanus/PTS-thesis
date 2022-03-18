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
<?php if (isset($errors['classRooms'])) : ?>
    <div class="alert alert-error">
        <?= $errors['classRooms'] ?>
    </div>
<?php endif ?>
<main id="mymain1">
    <div class="overlaybg">
        <div class="ccr-step--05">
            <div class="ccr-container">
                <div class="container-edit-left">
                    <div class="wrapper">
                        <ul class="ccr-progbar">
                            <li class="ccr-progbar-item is-done">
                                <h3>Step 01</h3>
                            </li>
                            <li class="ccr-progbar-item is-done">
                                <h3>Step 02</h3>
                            </li>
                            <li class="ccr-progbar-item is-done">
                                <h3>Step 03</h3>
                            </li>
                            <li class="ccr-progbar-item is-done">
                                <h3>Step 04</h3>
                            </li>
                            <li class="ccr-progbar-item current">
                                <h3>Step 05</h3>
                            </li>
                            <li class="ccr-progbar-item">
                                <h3>Summary</h3>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="container-edit form-style">
                    <form action="createClass5.php" method="POST" enctype="multipart/form-data">
                        <h2>Payment Details</h2>
                        <div class="form-element">
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
                            <input type="text" name="accountName" id="accountName" class="<?= error_class($errors, 'accountName') ?>">
                        </div>
                        <div class="form-element">
                            <label for="accountDetails">Accounnt Details {Purchase details}<div class="reqcolor">*</div></label>
                            <div class="errormsg">
                                <small><?= $errors['accountDetails'] ?? '' ?></small>
                            </div>
                            <input type="number" step="any" name="accountDetails" id="accountDetails" class="<?= error_class($errors, 'accountDetails') ?>">
                        </div>
                        <div class="form-element">
                            <label for="imageUpload">Upload Image</label>
                            <input type="file" name="imageUpload" id="imageUpload">
                        </div>
                        <div class="btn-right-03">
                            <button class="btn btn-table btn-table-mb" onclick="history.back()" title="Previous"><i class="bi bi-arrow-left-circle"></i></button>
                            <button type="submit" >Submit</button>
                            <button type="submit" class="btn btn-table btn-full" title="Next"><i class="bi bi-arrow-right-circle"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>


<?php view('footer') ?>