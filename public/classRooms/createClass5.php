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
if (isset($_GET['classID'])) {
    $pay = display_class_Payment();
    $tempNAme = decrypt0($pay['accountName']);
}else{

}

?>

<?php view('header', ['title' => 'Create Class']);
?>
<?php if (isset($errors['classRooms'])) : ?>
    <div class="overlay-new02" id="error-modal">
        <div class="error-container">
            <div class="edit-profile">
                <div class="error-close-btn">&times;</div>
                <i class="bi bi-exclamation-triangle"></i>
                <?= $errors['classRooms'] ?>
            </div>
        </div>
    </div>
    <script>
        var modalerror = document.getElementById("error-modal");
        modalerror.style.display = "block";

        var span = document.getElementsByClassName("error-close-btn")[0];
        span.onclick = function() {
            modalerror.style.display = "none";
        }
    </script>
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
                        <h2>Create Class</h2>
                        <div class="form-element">
                            <label for="paylistID">Payment Method<div class="reqcolor">*</div></label>
                            <select name="paylistID" class="<?= error_class($errors, 'paylistID') ?>">
                                <option value="<?= $pay['paylistID'] ?? '' ?>"><?= $pay['paylistID'] ?? ''?></options>
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
                            <input type="text" name="accountName" id="accountName" value="<?= $tempNAme ?? '' ?>" class="<?= error_class($errors, 'accountName') ?>">
                        </div>
                        <div class="form-element">
                            <label for="accountDetails">Accounnt Details {Purchase details}<div class="reqcolor">*</div></label>
                            <div class="errormsg">
                                <small><?= $errors['accountDetails'] ?? '' ?></small>
                            </div>
                            <input type="number" step="any" name="accountDetails" id="accountDetails" value="<?= decrypt0($pay['accountDetail']) ?>" class="<?= error_class($errors, 'accountDetails') ?>">
                        </div>
                        <div class="form-element">
                            <label for="imageUpload">Upload Image</label>
                            <input type="file" name="imageUpload" id="imageUpload">
                        </div>
                        <div class="form-element-btn">
                            <button class="btn btn-nav btn-table-grn" type="submit"><i class="bi bi-upload"></i> Upload</button>
                    </form>

                        </div>
                        <div class="outside-btn">
                            <button class="btn btn-table btn-table-mb" onclick="back(<?= $_SESSION['post']['classID'] ?>)" title="Previous"><i class="bi bi-arrow-left-circle"></i></button>
                            <button type="submit" class="btn btn-table btn-full" title="Next" onclick="next(<?= $_SESSION['post']['classID'] ?>)"><i class="bi bi-arrow-right-circle"></i></button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    function back(classID) {
        $.ajax({
            url: '../../src/redirectDir.php?editClass=1&classID=' + classID + '&step=4',
            type: 'POST',
            success: function(response) {
                window.location.href = response;//http://127.0.0.1/pts-thesis/public/classRooms/createClass4.php
            },
            error: function(err) {
                alert("There was some error performing the AJAX call!");

            },
        });
    }
    function next(classID) {
    $.ajax({
      url: '../../src/redirectDir.php?editClass=1&classID=' + classID + '&step=6',
      type: 'POST',
      success: function(response) {
        window.location.href = response;
      },
      error: function(err) {
        alert("There was some error performing the AJAX call!");

      },
    });
  }
</script>


<?php view('footer') ?>