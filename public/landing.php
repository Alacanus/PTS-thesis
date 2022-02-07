<?php
/**
 * PHP PRG (Post-Redirect-Get)
 * solve double submit problem
 */
?>
<?php
require __DIR__ . '/../src/bootstrap.php';
?>

<?php view('header', ['title' => 'PTS']) ?>
<main id="mymain1" class="d-flex aligns-items-center">
<a href="login.php">
  <button>Login</button>
</a>
<br>
<a href="register.php">
  <button>Register</button>
</a>
<br>
<a href="viewfaq.php">
  <button>View Faqs</button>
</a>
<br>
<a href="viewClasses.php">
  <button>View Classes</button>
</a>
<br>
<a href="viewfaq.php">
  <button>View Faqs</button>
</a>
<br>
<a href="viewfaq.php">
  <button>View Faqs</button>
</a>
<br>
<a href="viewfaq.php">
  <button>View Faqs</button>
</a>
<br>
<a href="viewfaq.php">
  <button>View Faqs</button>
</a>
<br>
<a href="viewfaq.php">
  <button>View Faqs</button>
</a>
<br>
</main>

<?php view('footer') ?>