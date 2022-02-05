<?php

require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/loggedin/twoFactor_S.php';
require_login();

?>
<?php view('header', ['title' => 'Two factor authentication']) ?>
<main>
<h2>Hello <?= current_user() ?></h2>
<br>
<h4>please enter two factor authentication code</h4>
    <form id="form" action="twoFactor.php" method="post">
    <div>
        <label for="twofactorcode">Two Factor:</label>
        <input type="text" name="twofactorcode" id="twofactorcode" value="<?= $inputs['twofactorcode'] ?? '' ?>"
               class="<?= error_class($errors, 'twofactorcode') ?>">
        <small><?= $errors['twofactorcode'] ?? '' ?></small>
    </div>

        <div>
            <label for="retry email">in case of incorrect code another one will be send to you:</label>
        </div>

        <section>
            <button type="submit">authentication</button>
        </section>
    </form>
</main>
 <p><?php echo current_user() . '\'s IP address' .getUserIpAddr()?><br> <a href="logout.php">Logout</a> </p><br>
<?php view('footer') ?>