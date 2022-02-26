<?php
require __DIR__ . '/../../src/bootstrap.php';
require __DIR__ . '/../../src/requestChange.php';
?>

<?php view('header', ['title' => 'Password Reset']) ?>
<?php if (isset($errors['requestChange'])) : ?>
    <div class="alert alert-error">
        <?= $errors['requestChange'] ?>
    </div>
<?php endif ?>
<div class="overlaybg">
    <div class="request">
        <div class="center-form-request">
            <div class="container-request">
                <main>
                    <div class="form-style">
                        <form id="form" action="requestChange.php" method="post">
                            <h2>Change Password</h2>
                            <div class="form-element">
                                <label for="email">Email:</label>
                                <div class="errormsg">
                                    <small><?= $errors['email'] ?? '' ?></small>
                                </div>
                                <input type="text" name="email" id="email" class="<?= error_class($errors, 'email') ?>">
                            </div>
                            <div class="form-element">
                                <button type="submit">Request</button>
                            </div>
                            <div class="form-element">
                                <a href="../register.php">Register</a>
                            </div>
                        </form>
                    </div>
                </main>
            </div>
        </div>
    </div>
</div>
<?php view('footer') ?>