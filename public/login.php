<?php
/**
 * PHP PRG (Post-Redirect-Get)
 * solve double submit problem
 */
?>
<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/login.php';
?>
<link rel="stylesheet" href="<?= 'http://'. $_SERVER['HTTP_HOST'] . '/PTS-thesis/public/css/style.css'?>">
<script src="https://www.google.com/recaptcha/api.js"></script>
<script>
   function onSubmit(token) {
     document.getElementById("form").submit();
   }
 </script>
<?php view('header', ['title' => 'Login']) ?>
<?php if (isset($errors['login'])) : ?>
    <div class="alert alert-error">
        <?= $errors['login'] ?>
    </div>
<?php endif ?>
<div class="login">
    <div class="center-form">
        <div class="conainter-login">
            <main id="mymain1">
                <form id="form" action="login.php" method="post" >
                        <h2>Login</h2>
                        <div class="form-container">
                            <div class="form-element">
                                <label for="username">Username:</label>
                                <input type="text" name="username" id="username" class="<?= error_class($errors, 'username') ?>">
                            <small><?= $errors['username'] ?? '' ?></small>
                            </div>
                            <div class="form-element">
                                <label for="password">Password:</label>
                                <input type="password" name="password" id="password"  class="<?= error_class($errors, 'password') ?>">
                            <small><?= $errors['password'] ?? '' ?></small>
                            </div>
                            <div class="form-group">
                                <div class="g-recaptcha" data-sitekey="6Le6_lQeAAAAAG_6B4F-OjL0mbth_UQLUihCtxiG">
                                </div>
                                <small id="captcha_error" class="text-danger"></small>
                                <button>Login</button>
                            </div>
                            <div class="form-element">
                                <a href="register.php">Register</a>
                            </div>
                            <div class="form-element">
                                <a href="changepassword/requestChange.php">Change Password</a>
                            </div>
                        </div>
                </form>
            </main>
        </div>
    </div>
</div>
<?php view('footer') ?>