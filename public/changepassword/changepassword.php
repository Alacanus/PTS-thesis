<?php
require __DIR__ . '/../../src/bootstrap.php';
require __DIR__ . '/../../src/changepassword.php';
?>

<?php view('header', ['title' => 'Change Password']) ?>
<div class="overlaybg">
    <div class="changepass">
        <div class="center-form-changepass">
            <div class="container-changepass">
                <main>
                    <form id="form" action="changepassword.php" method="post">
                        <div class="form-style">
                            <h2>Change Password</h2>
                            <div class="form-element">
                                <label for="password">Password New:</label>
                                <input type="password" name="password" id="password" value="<?= $inputs['password'] ?? '' ?>" class="<?= error_class($errors, 'password') ?>">
                                <small id="changepass"><?= $errors['password'] ?? '' ?></small>
                            </div>

                            <div class="form-element">
                                <label for="password2">Password Again:</label>
                                <input type="password" name="password2" id="password2" value="<?= $inputs['password2'] ?? '' ?>" class="<?= error_class($errors, 'password2') ?>">
                                <small id="changepass2"><?= $errors['password2'] ?? '' ?></small>
                            </div>
                            <div class="form-element">
                                <button type="submit" name="btnCpass">Request</button>

                            </div>
                            <div class="form-element">
                                <a href="../register.php">Register</a>
                            </div>
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </div>
</div>
<?php view('footer') ?>