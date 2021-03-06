<?php
//This code is an imitation of W.S. Toh's Simple Messaging System With PHP MySQL 
class Message {
  // (A) CONSTRUCTOR - CONNECT TO THE DATABASE
  private $pdo = null;
  private $stmt = null;
  public $error;
  function __construct () {
    try {
      $this->pdo = new PDO(
        "mysql:host=localhost;dbname=u657624546_pts;charset=utf8",
        'u657624546_eslp', 'Zxcvbnm1', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
      ]);
    } catch (Exception $ex) { exit($ex->getMessage()); }
  }

  // (B) DESTRUCTOR - CLOSE DATABSE CONNECTION
  function __destruct () {
    if ($this->stmt !== null) { $this->stmt = null; }
    if ($this->pdo !== null) { $this->pdo = null; }
  }

 // (C) EXECUTE SQL QUERY
 function exec ($sql, $data=null) {
    try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($data);
      return true;
    } catch (Exception $ex) {
      $this->error = $ex->getMessage();
      return false;
    }
  }

  // (D) FETCH (SINGLE ROW)
  function fetch ($sql, $data=null) {
    if ($this->exec($sql, $data) === false) { return false; }
    return $this->stmt->fetch();
  }

  // (E) FETCH ALL (MULTIPLE ROWS)
  function fetchAll ($sql, $data=null, $key=null) {
    if ($this->exec($sql, $data) === false) { return false; }
    if ($key === null) { return $this->stmt->fetchAll(); }
    else {
      $data = [];
      while ($r = $this->stmt->fetch()) { $data[$r[$key]] = $r; }
      return $data;
    }
  }

  // (F) GET ALL USERS & UNREAD MESSAGES
  function getUsers ($for=null) {
    // (F1) GET USERS
    $users = $this->fetchAll(
      "SELECT * FROM `users` WHERE `userID`!=?",
       [$for], "userID"
    );
    if (!is_array($users)) { return false; }

    // (F2) COUNT UNREAD MESSAGES
    if ($this->exec(
      "SELECT `user_from`, COUNT(*) `ur`
      FROM `messages` WHERE `user_to`=?
      AND `date_read` IS NULL
      GROUP BY `user_from`", [$for]) === false) { return false; }
    while ($r = $this->stmt->fetch()) {
      $users[$r["user_from"]]["unread"] = $r["ur"];
    }

    // (F3) RESULTS
    return $users;
  }

    // (F) GET ALL Classes & UNREAD MESSAGES
    function getClasses ($for=null) {
      // (F1) GET USERS
      $classes = $this->fetchAll(
        // "SELECT * FROM `classes` WHERE `classID`!=?",
        //  [$for], "classID"
        "SELECT * FROM `classes` WHERE `classID`=?",
         [$for], "classID"
      );
      if (!is_array($classes)) { return false; }
  
      // (F2) COUNT UNREAD MESSAGES
      // if ($this->exec(
      //   "SELECT `user_from`, COUNT(*) `ur`
      //   FROM `messages` WHERE `user_to`=?
      //   AND `date_read` IS NULL
      //   GROUP BY `user_from`", [$for]) === false) { return false; }
      // while ($r = $this->stmt->fetch()) {
      //   $classes[$r["user_from"]]["unread"] = $r["ur"];
      // }
  
      // (F3) RESULTS
      return $classes;
    }

  // (G) GET MESSAGES
  function getMsg ($from, $to, $limit=30) {
    // (G1) MARK ALL AS "READ"
    if ($this->exec(
      "UPDATE `messages` SET `date_read`=NOW()
      WHERE `user_from`=? AND `user_to`=? AND `date_read` IS NULL",
    [$from, $to]) === false) { return false; }

    // (G2) GET MESSAGES
    return $this->fetchAll(
      "SELECT * FROM `messages`
      WHERE `user_to` = (?)
      ORDER BY `date_send` DESC
      LIMIT 0, $limit",
      [$to]
    );
    // return $this->fetchAll(
    //   "SELECT * FROM `messages`
    //   WHERE `user_from` IN (?,?)
    //   AND `user_to` IN (?,?)
    //   ORDER BY `date_send` DESC
    //   LIMIT 0, $limit",
    //   [$from, $to, $from, $to]
    // );
  }

  // (H) SEND MESSAGE
  function send ($from, $to, $msg) {
    return $this->exec(
      "INSERT INTO `messages` (`user_from`, `user_to`, `message`) VALUES (?,?,?)",
      [$from, $to, $msg]
    );
  }
}

// (Z) START!
$MSG = new Message();
