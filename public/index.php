<?php

require __DIR__ . '/../src/bootstrap.php';
include "../Model/Includes/getConVar.php";
is_user_2fa();
?>

<?php view('header', ['title' => 'Dashboard']) ?>
<pre>───▄▀▀▀▄▄▄▄▄▄▄▀▀▀▄───
───█▒▒░░░░░░░░░▒▒█───
────█░░█░░░░░█░░█────
─▄▄──█░░░▀█▀░░░█──▄▄─
█░░█─▀▄░░░░░░░▄▀─█░░█
</pre>
<br>
<p>
 <?= current_user() ?> <a href="logout.php">Logout</a><br>
 \( ` ・ω・´)/</p>
 <p><?php echo current_user() . '\'s IP address' .getUserIpAddr();?></p><br>
<?php view('footer') ?>