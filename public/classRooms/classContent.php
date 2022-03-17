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
<!-- <link rel="stylesheet" href="4-styles.css"/>
    <script src="5-message.js"></script> -->

<?php if (isset($errors['classContent'])) : ?>
  <div class="alert alert-error">
    <?= $errors['classContent'] ?>
  </div>
<?php endif ?>
<main id="mymain1">
  <div class="overlaybg">
    <div class="cc-container">
      <h2>Class Content</h2>
      <div class="cc--nested-01">
        <div class="cc-flex--01">
          <?php
          // (A) GET USERS
          require "2-core.php";
          require "3-lib-msg.php";
          $users = $MSG->getUsers($_SESSION["user"]["id"]);
          ?>
          <!-- (B) LEFT : USER NOW & LIST -->
          <div id="userLeft">
            <!-- (B1) CURRENT USER -->
            <div id="userNow">
              You are <?= $_SESSION["user"]["name"] ?>
            </div>
            <!-- (B2) USER LIST -->
            <?php foreach ($users as $uid => $u) { ?>
              <div class="userRow" id="usr<?= $uid ?>" onclick="msg.show(<?= $uid ?>)">
                <?php if (isset($u["unread"])) { ?>
                  <u class="userUR" id="ur<?= $uid ?>"><?= $u["unread"] ?></u>
                <?php } ?>
                <?= $u["email"] ?>
              </div>
            <?php } ?>
          </div>
        </div>
        <div class="cc-flex--02">
          <div class="cc--nested-02">
            <div class="nested-02--header">
              <?= $_SESSION["user"]["name"] ?>
            </div>
            <div class="nested-02--body">

            </div>
            <div class="nested-02--footer footer--container">
              <div class="footer-flex--01">
                <input type="text">
              </div>
              <div class="footer-flex--02">
                <button class="btn btn-nav btn-full">Send</button>
              </div>
            </div>
            <!-- <div id="userRight">
              (C1) SEND MESSAGE

              <div>

              </div>

              (C2) MESSAGES

            </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="overlaybg">
    <div class="cc-container">
      <h2>Class Content</h2>
      <div class="cc--nested-01">
        <div class="cc-flex--01">
          <?php foreach ($users as $uid => $u) { ?>
            <div class="userRow" id="usr<?= $uid ?>" onclick="msg.show(<?= $uid ?>)">
              <?php if (isset($u["unread"])) { ?>
                <u class="userUR" id="ur<?= $uid ?>"><?= $u["unread"] ?></u>
              <?php } ?>
              <?= $u["email"] ?>
            </div>
          <?php } ?>
        </div>
        <div class="cc-flex--02">
          <div class="cc--nested-02">
            <div class="nested-02--header">

            </div>
            <div class="nested-02--body">

            </div>
            <div class="nested-02--footer">
              <form>
                <input type="text" id="msgTxt" required />
                <input type="submit" value="Send" />
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

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
      You are <?= $_SESSION["user"]["name"] ?>
    </div>
    <!-- (B2) USER LIST -->
    <?php foreach ($users as $uid => $u) { ?>
      <div class="userRow" id="usr<?= $uid ?>" onclick="msg.show(<?= $uid ?>)">
        <?php if (isset($u["unread"])) { ?>
          <u class="userUR" id="ur<?= $uid ?>"><?= $u["unread"] ?></u>
        <?php } ?>
        <?= $u["email"] ?>
      </div>
    <?php } ?>
  </div>

  <!-- (C) RIGHT : MESSAGES LIST -->
  <div id="userRight">
    <!-- (C1) SEND MESSAGE -->
    <form id="userSend" onsubmit="return msg.send()">
      <input type="text" id="msgTxt" required />
      <input type="submit" value="Send" />
    </form>

    <!-- (C2) MESSAGES -->
    <div id="userMsg"></div>
  </div>
</main>


<?php view('footer') ?>

<Script>
  var msg = {
    // (A) HELPER - AJAX FETCH
    ajax: (data, after) => {
      // (A1) FORM DATA
      let fdata = new FormData();
      for (const [k, v] of Object.entries(data)) {
        fdata.append(k, v);
      }

      // (A2) FETCH
      fetch("6-ajax.php", {
          method: "POST",
          body: fdata
        })
        .then((res) => {
          if (res.status != 200) {
            alert(`Server ${res.status} error.`)
          } else {
            return res.text();
          }
        }).then(after).catch((err) => {
          console.error(err);
        });
    },

    // (B) SHOW MESSAGES
    uid: null, // CURRENT SELECTED USER
    show: (uid) => {
      // (B1) SET SELECTED USER ID
      msg.uid = uid;

      // (B2) HTML INTERFACE UPDATE
      let form = document.getElementById("userSend"),
        field = document.getElementById("msgTxt"),
        unread = document.getElementById("ur" + uid),
        wrap = document.getElementById("userMsg");
      wrap.innerHTML = "";
      form.style.display = "flex";
      field.value = "";
      field.focus();
      for (let r of document.querySelectorAll(".userRow")) {
        if (r.id == "usr" + uid) {
          r.classList.add("now");
        } else {
          r.classList.remove("now");
        }
      }

      // (B3) AJAX LOAD MESSAGES
      msg.ajax({
        "req": "list",
        "uid": uid
      }, (txt) => {
        wrap.innerHTML = txt;
        if (unread !== null) {
          unread.remove();
        }
      });
    },

    // (C) SEND MESSAGE
    send: () => {
      let field = document.getElementById("msgTxt");
      msg.ajax({
        "req": "send",
        "to": msg.uid,
        "msg": field.value
      }, (txt) => {
        if (txt == "OK") {
          msg.show(msg.uid);
          field.value = "";
        } else {
          alert(txt);
        }
      });
      return false;
    }
  };
</Script>

<?php view('footer') ?>