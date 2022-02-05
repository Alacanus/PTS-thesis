<?php
require __DIR__ . '/../../src/bootstrap.php';
require __DIR__ . '/../../src/changepassword.php';
?>

<?php view('header', ['title' => 'Change Password']) ?>
<main>
    <form id="form" action="changepassword.php" method="post">
        <h1>Change Password</h1>
        <div>
        <label for="password">Password New:</label>
        <input type="password" name="password" id="password" value="<?= $inputs['password'] ?? '' ?>"
               class="<?= error_class($errors, 'password') ?>">
        <small><?= $errors['password'] ?? '' ?></small>
    </div>

    <div>
        <label for="password2">Password Again:</label>
        <input type="password" name="password2" id="password2" value="<?= $inputs['password2'] ?? '' ?>"
               class="<?= error_class($errors, 'password2') ?>">
        <small><?= $errors['password2'] ?? '' ?></small>
    </div>
        <section>
            <button type="submit" name="btnCpass">Request</button>
            <a href="../register.php">Register</a>
        </section>
    </form>
</main>
<?php view('footer') ?>