<?php
require __DIR__ . '/../src/bootstrap.php';
?>

<?php view('header', ['title' => 'Change Password']);
?>
<div class="overlaybg">
    <div class="success-msg">
        <div class="msg-container">
            <div class="msg-content">
                <i id="icon-color" class="bi bi-envelope-check"></i>
                <h2>Change Request Password has been sent to your email</h2>
                <a href="landing.php"><button id="msg-btn" class="btn btn-nav btn-full">Home</button></a>
            </div>
        </div>
    </div>
</div>
<?php view('footer') ?>