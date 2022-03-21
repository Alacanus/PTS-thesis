<?php
require __DIR__ . '/../../src/bootstrap.php';
//This code is an imitation of W.S. Toh's Simple Messaging System With PHP MySQL 

if (isset($_POST["req"])) {
  // (A) LOAD LIBRARY
  require "2-core.php";
  require "3-lib-msg.php";

  switch ($_POST["req"]) {
    // (B) INVALID
    default: echo "Invalid request"; break;

    // (C) LIST MESSAGES
    case "list":
      $msg = $MSG->getMsg($_SESSION['user_id'], $_POST["uid"]);
      if (count($msg)>0) { foreach ($msg as $m) {
        $css = $m["user_from"] == $_SESSION['user_id'] ? "mout" : "min" ; ?>
        <div class="<?=$css?>">
          <div class="mdate">
            <?php 
            $MsgUser = find_user_by_uid($m["user_from"]);
            echo $MsgUser['lastName'].": ";
            $dt= new DateTime($m["date_send"]);
            echo date_format($dt, 'M d Y h:i a')
          ?>
          </div> 
          <div class="mtxt"><?=$m["message"]?></div>
        </div>
      <?php }}
      break;

    // (D) SEND MESSAGE
    case "send":
      echo $MSG->send($_SESSION['user_id'], $_POST["to"], $_POST["msg"])
        ? "OK" : $MSG->error ;
      break;
  }
}
