<?php

require __DIR__ . '/../src/bootstrap.php';
is_user_2fa();
?>

<?php view('header', ['title' => 'Dashboard']) ?>
<pre>
───▄▀▀▀▄▄▄▄▄▄▄▀▀▀▄───
───█▒▒░░░░░░░░░▒▒█───
────█░░█░░░░░█░░█────
─▄▄──█░░░▀█▀░░░█──▄▄─
█░░█─▀▄░░░░░░░▄▀─█░░█
</pre>
<br>
<a href="userprofile.php">
  <button>User profile</button>
</a>
<br>
<p>
 <?= current_user() ?> <a href="logout.php">Logout</a><br>
 \( ` ・ω・´)/</p>
 <p><?php echo current_user() . '\'s IP address' .getUserIpAddr() . 'usrid: ' . $_SESSION['user_id'];?></p><br>
<?php view('footer') ?>