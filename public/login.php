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
<main id="mymain1">
    <form id="form" action="login.php" method="post" >
        <h1>Login</h1>
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" class="<?= error_class($errors, 'username') ?>">
        <small><?= $errors['username'] ?? '' ?></small>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password"  class="<?= error_class($errors, 'password') ?>">
        <small><?= $errors['password'] ?? '' ?></small>
        </div>
        <div class="form-group">
            <div class="g-recaptcha" data-sitekey="6LeY21QeAAAAABXgkFd4j6e7TirCMG0PEEGPT0lk">
            </div>
            <small id="captcha_error" class="text-danger"></small>
            <button class="g-recaptcha" 
            data-sitekey="reCAPTCHA_site_key" 
            data-callback='onSubmit' 
            data-action='submit'>Login</button>
        </div>
        <section>
            <a href="register.php">Register</a>
        </section>
        <section>
            <a href="changepassword/requestChange.php">Change Password</a>
        </section>
    </form>
</main>
<?php view('footer') ?>