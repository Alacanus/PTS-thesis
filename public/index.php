<?php

require __DIR__ . '/../src/bootstrap.php';
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
<?php view('footer') ?>