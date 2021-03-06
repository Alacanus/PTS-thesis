<?php
require __DIR__ . '/../src/bootstrap.php';


view('header', ['title' => 'Register']);
?>
<div class="overlaybg">
    <div class="success-msg">
        <div class="msg-container">
            <div class="msg-content">
                <i class="bi bi-lock-fill"></i>
                <h2><?= current_user() ?>, Sorry the Link you have directed to is not Allowed</h2>
                <div class="msg-btn">
                    <a href="landing.php"><button id="msg-btn" class="btn btn-nav btn-full">Home</button></a>
                    <a href="login.php"><button id="msg-btn2" class="btn btn-nav btn-ghost2">Login</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php view('footer') ?>