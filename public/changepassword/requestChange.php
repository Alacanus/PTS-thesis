<?php
require __DIR__ . '/../../src/bootstrap.php';
require __DIR__ . '/../../src/requestChange.php';
?>

<?php view('header', ['title' => 'Password Reset']) ?>
<?php if (isset($errors['requestChange'])) : ?>
    <div class="alert alert-error">
        <?= $errors['login'] ?>
    </div>
<?php endif ?>
<main>
<form id="form" action="requestChange.php" method="post">
        <h1>Change Password</h1>
        <div>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email">
        </div>
        <section>
            <button type="submit" name="btnCpass">Request</button>
            <a href="../register.php">Register</a>
        </section>
    </form>
</main>
<?php view('footer') ?>