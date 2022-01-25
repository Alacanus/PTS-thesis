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

<?php view('header', ['title' => 'Login']) ?>
<?php if (isset($errors['login'])) : ?>
    <div class="alert alert-error">
        <?= $errors['login'] ?>
    </div>
<?php endif ?>
<main>
    <form id="form" action="login.php" method="post">
        <h1>Login</h1>
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>
        <section>
            <button type="submit" name="btnLogin">Login</button>
            <a href="register.php">Register</a>
        </section>
    </form>
</main>
<?php view('footer') ?>