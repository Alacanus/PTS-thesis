<?php
require __DIR__ . '/../../src/bootstrap.php';
require __DIR__ . '/../../src/loggedin/classStep1.php';

// if (is_user_2fa() == 'false'){
//   redirect_to('login.php');
// }else{
// audit_trail('User has started Class Creation', 2);
// }
// if(!auth_Level('Instructor')){
//     redirect_to('../allowedNOT.php');
// }
?>

<?php view('header', ['title' => 'Create Class']);
?>
    <link rel="stylesheet" href="4-styles.css"/>
    <script src="5-message.js"></script>

<?php if (isset($errors['classContent'])) : ?>
    <div class="alert alert-error">
        <?= $errors['classContent'] ?>
    </div>
<?php endif ?>
<main id="mymain1"><br><br>
<?php
// (A) GET USERS
require "2-core.php";
require "3-lib-msg.php";
$users = $MSG->getUsers($_SESSION["user"]["id"]);
?>
 <h2>Class Content</h2>
<!-- (B) LEFT : USER NOW & LIST -->
<div id="userLeft">
  <!-- (B1) CURRENT USER -->
  <div id="userNow">
    You are <?=$_SESSION["user"]["name"]?>
  </div>
  <!-- (B2) USER LIST -->
  <?php foreach ($users as $uid=>$u) { ?>
  <div class="userRow" id="usr<?=$uid?>" onclick="msg.show(<?=$uid?>)">
    <?php if (isset($u["unread"])) { ?>
    <u class="userUR" id="ur<?=$uid?>"><?=$u["unread"]?></u>
    <?php } ?>
    <?=$u["email"]?>
  </div>
  <?php } ?>
</div>
 
 <!-- (C) RIGHT : MESSAGES LIST -->
<div id="userRight">
  <!-- (C1) SEND MESSAGE -->
  <form id="userSend" onsubmit="return msg.send()">
    <input type="text" id="msgTxt" required/>
    <input type="submit" value="Send"/>
  </form>
 
  <!-- (C2) MESSAGES -->
  <div id="userMsg"></div>
</div>
</main>


<?php view('footer') ?>
