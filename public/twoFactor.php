<?php

require __DIR__ . '/../src/bootstrap.php';
require_login();
require __DIR__ . '/../src/loggedin/twoFactor_S.php';

?>
<?php view('header', ['title' => 'Two factor authentication']) ?>
<div class="overlaybg">
    <div class="twofactor">
        <div class="center-form-twofactor">
            <div class="container-twofactor">
                <main>
                <!-- <h2>Hello <?= current_user() ?></h2> -->
                <h2>Two-Step Verification</h2>
                    <div class="form-style">
                        <form id="form" action="twoFactor.php" method="post">
                            <div class="form-element">
                                <label for="twofactorcode">Enter the Two-Step Verification Code Here:</label>
                                <input type="text" name="twofactorcode" id="twofactorcode" value="<?= $inputs['twofactorcode'] ?? '' ?>"
                                    class="<?= error_class($errors, 'twofactorcode') ?>">
                                <small><?= $errors['twofactorcode'] ?? '' ?></small>
                            </div>
                            <div class="form-element">
                                <button type="submit">authentication</button>
                            </div>
                            <div class="form-element">
                                <label for="retry email">Note: In case of incorrect code, another one will be send to you at: <?= $_SESSION['userEmail']?></label>
                            </div>
                            <div class="form-element">
                                <a href="logout.php">Return</a>
                            </div>
                        </form>
                    </div>
                </main>
                
            </div>
        </div>
    </div>
</div>
<?php view('footer') ?>