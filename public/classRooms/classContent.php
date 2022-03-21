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
      <!-- flexbox -->
      <div class="flex-container">

        <!-- flex item & Container -->
        <div class="flex-item">
          <div class="userlist-header">
            <!-- User Email -->
            <p class="cut-text"><i class="bi bi-person-circle"></i> markhenricklinsangan@benilde.edu.ph</p>
          </div>
          <!-- Display User Enrolled Per Row -->
          <div class="userlist-body">
            <!-- User List -->
            <div class="ul-row-container">
              <img src="/PTS-thesis/static/instructorpf.jpg" alt="">
              <div class="sub-item">
                <p class="cut-text">Sean Dennie Go</p>
                <p class="cut-text">seandennie.go@benilde.edu.ph</p>
              </div>
            </div>
          </div>
        </div>

        <!-- flex item & Container -->
        <div class="flex-item">
          <div class="msg-header">
            <!-- Selected - User Email -->
            <img src="/PTS-thesis/static/instructorpf.jpg" alt="">
            <p>markhenricklinsangan@benilde.edu.ph</p>
          </div>
          <!-- message -->
          <div class="msg-body">
            <div class="msg-row-container">
              <div class="row-item">
                <!-- User Details -->
                <img src="/PTS-thesis/static/instructorpf.jpg" alt="">
              </div>
              <div class="row-item">
                <div class="user-title">
                  <p>Sean Dennie Go</p>
                  <p>Fri 12:00pm</p>
                </div>
                <div class="msg-item">
                  <p>
                    Hello! Learner
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="msg-footer">
            <input type="text">
            <button class="btn btn-nav btn-full"><i class="bi bi-send"></i> Send</button>
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
  $Classes = $MSG->getClasses($_SESSION["user_id"]);
  ?>
  <h2>Class Content</h2>
  <!-- (B) LEFT : USER NOW & LIST -->
  <div id="userLeft">
    <!-- (B1) CURRENT USER -->
    <div id="userNow">
      Class's <?= $_SESSION['post']['classID'] ?> space
    </div>
    <!-- (B2) USER LIST -->
    <?php foreach ($Classes as $uid => $u) { ?>
      <div class="userRow" id="usr<?= $uid ?>" onclick="msg.show(<?= $uid ?>)">
        <?php if (isset($u["unread"])) { ?>
          <u class="userUR" id="ur<?= $uid ?>"><?= $u["unread"] ?></u>
        <?php } ?>
        <?= $u["className"] ?>
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
  //This code is an imitation of W.S. Toh's Simple Messaging System With PHP MySQL 
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