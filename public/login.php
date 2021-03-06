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
<?php view('header', ['title' => 'Login']) ?>
<?php if (isset($errors['login'])) : ?>
    <div class="overlay-new02" id="error-modal">
        <div class="error-container">
            <div class="edit-profile">
                <div class="error-close-btn">&times;</div>
                <i class="bi bi-exclamation-triangle"></i>
                <?= $errors['login'] ?>
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
<div class="overlaybg">
    <main id="mymain1">
        <form id="form" action="login.php" method="post">
            <div class="login">
                <div class="center-form">
                    <div class="container-login">
                        <h2>Login</h2>
                        <div class="form-style">
                            <div class="form-element">
                                <label for="username">Username<div class="reqcolor">*</div></label>
                                <div class="errormsg">
                                    <small><?= $errors['username'] ?? '' ?></small>
                                </div>
                                <input type="text" name="username" id="username" class="<?= error_class($errors, 'username') ?>" required>
                            </div>
                            <div class="form-element">
                                <label for="password">Password<div class="reqcolor">*</div></label>
                                <div class="errormsg">
                                    <small><?= $errors['password'] ?? '' ?></small>
                                </div>
                                <input type="password" name="password" id="password" class="<?= error_class($errors, 'password') ?>" required>
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
                                <div class="form-element">
                                    <a href="changepassword/requestChange.php">Change Password</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </main>
</div>
<?php view('footer') ?>