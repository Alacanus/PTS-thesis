<?php
require __DIR__ . '/../../src/bootstrap.php';
require __DIR__ . '/../../src/loggedin/classStep1.php';

if (is_user_2fa() == 'false'){
  redirect_to('login.php');
}else{
audit_trail('User has procedeed step 5', 2);
}
if(!auth_Level('Instructor')){
    redirect_to('../allowedNOT.php');
}
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
                                <label for="username">Username<div class="reqcolor">*</div></label>
                                <div class="errormsg">
                                    <small><?= $errors['username'] ?? '' ?></small>
                                </div>
                                <input type="text" name="username" id="username" class="<?= error_class($errors, 'username') ?>">
                            </div>
                            <div class="form-element">
                                <label for="password">Password<div class="reqcolor">*</div></label>
                                <div class="errormsg">       
                                    <small><?= $errors['password'] ?? '' ?></small>
                                </div>
                                <input type="password" name="password" id="password"  class="<?= error_class($errors, 'password') ?>">
                            </div>
                            <div class="form-group">
                                <div class="g-recaptcha" data-sitekey="6Le6_lQeAAAAAG_6B4F-OjL0mbth_UQLUihCtxiG">
                                </div>
                                <small id="captcha_error" class="text-danger"></small>
                                <div class="form-element">
                                    <button>Login</button>
                                </div>      
                            </div>
                            <div class="form-element">
                                <a href="register.php"><button class="btnsignup">Sign Up</button></a>
                            </div>
                            <div class="form-element">
                                <a href="changepassword/requestChange.php">Change Password</a>
                            </div>
                        </div>
</main>


<?php view('footer') ?>
