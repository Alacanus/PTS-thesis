<?php
require __DIR__ . '/../src/bootstrap.php';

$client = init_Client();
?>
<div class="box">
<?php if (isset($authUrl)): ?>
  <div class="request">
    <a class='login'>Connect Me!</a>
  </div>
<?php elseif(isset($client)): ?>
  <div class="shortened">
      <h2>URL <?= print_r($_SESSION['upload_token']) ?></h2>
    <p>Your call was successful! Check your drive for the following files:<pre><?= var_dump($client) ?></pre></p>
    <a href="<?= $_SESSION['authUrl']?>">
     <input type="submit"/>
   </a>

  </div>
<?php else: ?>
  <form method="POST">
    <input type="submit" value="Click here to upload two small (1MB) test files" />
  </form>
<?php endif ?>
</div>