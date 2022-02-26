<?php

require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/register.php';
?>

<?php view('header', ['title' => 'Register']);
?>
<script src="https://www.google.com/recaptcha/api.js"></script>
<script>
    function onSubmit(token) {
        document.getElementById("form").submit();
    }
</script>

<!-------- Divider -------->
<div class="overlaybg">
    <div class="signup">
        <div class="center-form-signup">
            <div class="container-signup">
                <form id="form" action="register.php" method="post">
                    <h2>Sign Up</h2>
                    <div class="form-style">
                        <div class="form-element">
                            <div class="inline-item-1">
                                <label for="fname">First Name<div class="reqcolor">*</div></label>
                                <input type="text" name="fname" id="fname" value="<?= $inputs['fname'] ?? '' ?>" class="<?= error_class($errors, 'fname') ?>">
                                <small><?= $errors['fname'] ?? '' ?></small>
                            </div>
                            <div class="inline-item-2">
                                <label for="lname">Last Name<div class="reqcolor">*</div></label>
                                <input type="text" name="lname" id="lname" value="<?= $inputs['lname'] ?? '' ?>" class="<?= error_class($errors, 'lname') ?>">
                                <small><?= $errors['lname'] ?? '' ?></small>
                            </div>
                        </div>

                        <div class="form-element">
                            <label for="email">Email<div class="reqcolor">*</div></label>
                            <input type="email" name="email" id="email" value="<?= $inputs['email'] ?? '' ?>" class="<?= error_class($errors, 'email') ?>">
                            <small><?= $errors['email'] ?? '' ?></small>
                        </div>

                        <div class="form-element">
                            <div class="inline-item-3">
                                <label for="usertype">User Type<div class="reqcolor">*</div></label>
                                <select name="usertype" class="<?= error_class($errors, 'usertype') ?>">
                                    <option value="">- - - - - Select - - - - -</options>
                                        <?php
                                        foreach ($option_list as $options) {
                                            echo '<option value="' . $options['roleID'] . '">' . $options['roleType'] . '</option>';
                                        }
                                        ?>
                                </select>
                                <small><?= $errors['usertype'] ?? '' ?></small>
                            </div>
                            <div class="inline-item-4">
                                <label for="username">User Name<div class="reqcolor">*</div></label>
                                <input type="text" name="username" id="username" value="<?= $inputs['username'] ?? '' ?>" class="<?= error_class($errors, 'username') ?>">
                                <small><?= $errors['username'] ?? '' ?></small>
                            </div>
                        </div>

                        <div class="form-element">
                            <label for="password">Password<div class="reqcolor">*</div></label>
                            <input type="password" name="password" id="password" value="<?= $inputs['password'] ?? '' ?>" class="<?= error_class($errors, 'password') ?>">
                            <small id="errorpwd"><?= $errors['password'] ?? '' ?></small>
                        </div>

                        <div class="form-element">
                            <label for="password2">Re-Type Password<div class="reqcolor">*</div></label>
                            <input type="password" name="password2" id="password2" value="<?= $inputs['password2'] ?? '' ?>" class="<?= error_class($errors, 'password2') ?>">
                            <small id="errorpwd2"><?= $errors['password2'] ?? '' ?></small>
                        </div>

                        <div class="form-element">
                            <div class="terms-container">
                                <label for="agree">
                                    <input type="checkbox" name="agree" id="agree" value="checked" <?= $inputs['agree'] ?? '' ?> /> I
                                    agree with the
                                    <a href="#" title="term of services">Term of Services</a>
                                    <div class="reqcolor">*</div>
                                </label>
                                <small id="agreeid"><?= $errors['agree'] ?? '' ?></small>
                            </div>
                        </div>

                        <div class="form-element">
                            <div class="form-group">
                                <div class="g-recaptcha" data-sitekey="6Le6_lQeAAAAAG_6B4F-OjL0mbth_UQLUihCtxiG">
                                </div>
                                <small id="captcha_error" class="text-danger"></small>
                            </div>
                        </div>

                        <div class="form-element">
                            <button>Register</button>
                        </div>

                        <div class="signup-footer">
                            <p>Already have an existing account?<a href="login.php"> Login Here...</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php view('footer') ?>