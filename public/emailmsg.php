<?php
require __DIR__ . '/../src/bootstrap.php';
?>

<?php view('header', ['title' => 'Email Sent']);
?>
<div class="overlaybg">
    <div class="success-msg">
        <div class="msg-container">
            <div class="msg-content">
                <i id="icon-color" class="bi bi-envelope-check"></i>
                <h2>successfully Sent to your email</h2>
                <p>Please Check Your Spam</p>
                <div class="msg-btn">
                    <a href="landing.php"><button id="msg-btn" class="btn btn-nav btn-full">Home</button></a>
                    <a href="login.php"><button id="msg-btn2" class="btn btn-nav btn-ghost2">Login</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php view('footer') ?>