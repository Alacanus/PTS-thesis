<?php

require __DIR__ . '/../src/bootstrap.php';
include "../Model/Includes/getConVar.php";
require_login();
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