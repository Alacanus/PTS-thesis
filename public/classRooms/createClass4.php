<?php
require __DIR__ . '/../../src/bootstrap.php';
require __DIR__ . '/../../src/loggedin/classStep4.php';

// if (is_user_2fa() == 'false'){
//   redirect_to('login.php');
// }else{
// audit_trail('User has procedeed step4', 2);
// }
// if(!auth_Level('Instructor')){
//     redirect_to('../allowedNOT.php');
// }

$client = init_Client();
if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token);

  // store in the session also
  $_SESSION['upload_token'] = $token;

  // redirect back to the example
  header('Location: ' . filter_var('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'], FILTER_SANITIZE_URL));
}


if (!empty($_SESSION['upload_token'])) {
  $client->setAccessToken($_SESSION['upload_token']);
  if ($client->isAccessTokenExpired()) {
    unset($_SESSION['upload_token']);
    // $_SESSION['upload_token'] = 'no accesstoken';
  }
} else {
  $authUrl = $client->createAuthUrl();
  $_SESSION['authUrl'] = $authUrl;
  // redirect_to($authUrl);
}
?>
<?php
// $temp = placeholderPIC;
// $imageAddress = substr($temp, 15);
// if (isset($_SESSION['user_id']) && isset($_SESSION['post']['classID'])) {

//   $temp = getclassPic($_SESSION['user_id']);
//   $imageAddress = substr($temp['filePath'], 15);
// }

?>
<?php view('header', ['title' => 'Create Class']);
?>
<!-- <img src="<?= $imageAddress ?>" alt="" width="500" height="333"><br>
<iframe src="https://www.youtube.com/embed/'<?= $_SESSION['videoID'] ?? 'Y5uQqLbzviU' ?>" height="200" width="300" title="Iframe Example"></iframe> -->
<?php if (isset($errors['classRooms'])) : ?>
  <div class="overlay-new02" id="error-modal">
    <div class="error-container">
      <div class="edit-profile">
        <div class="error-close-btn">&times;</div>
        <i class="bi bi-exclamation-triangle"></i>
        <?= $errors['classRooms'] ?>
      </div>
    </div>
  </div>
  <script>
    var modalerror = document.getElementById("error-modal");
    modalerror.style.display = "block";

    var span = document.getElementsByClassName("error-close-btn")[0];
    span.onclick = function() {
      modalerror.style.display = "none";
    }
  </script>
<?php endif ?>
<main id="mymain1">
  <div class="overlaybg">
    <div class="ccr-step--04">
      <div class="ccr-container">
        <div class="container-edit-left">
          <div class="wrapper">
            <ul class="ccr-progbar">
              <li class="ccr-progbar-item is-done">
                <h3>Step 01</h3>
              </li>
              <li class="ccr-progbar-item is-done">
                <h3>Step 02</h3>
              </li>
              <li class="ccr-progbar-item is-done">
                <h3>Step 03</h3>
              </li>
              <li class="ccr-progbar-item current">
                <h3>Step 04</h3>
              </li>
              <li class="ccr-progbar-item">
                <h3>Step 05</h3>
              </li>
              <li class="ccr-progbar-item">
                <h3>Summary</h3>
              </li>
            </ul>
          </div>
        </div>
        <div class="container-edit form-style">
          <form id="form" action="createClass4.php" method="post" name="multiple_upload_form" id="multiple_upload_form" enctype="multipart/form-data">
            <h2>Create Class</h2>
            <div class="form-element">
              <label for="title">Video Title:</label>
              <input type="text" name="title" id="title" value="" />
            </div>
            <div class="form-element">
              <label for="description">Video Description:</label>
              <textarea name="description" id="description" cols="20" rows="2"></textarea>
            </div>
            <div class="form-element">
              <label for="tags">Video Tags:</label>
              <input type="text" name="tags" id="tags" value="" />
            </div>
            <div class="form-element">
              <label for="imageUpload">Class Image: <div class="reqcolor">*</div></label>
              <input type="file" name="imageUpload" id="imageUpload">
            </div>
            <div class="form-element">
              <label for="video_file">Video File:</label> <input type="file" name="videoFile" id="videoFile">
            </div>
            <div class="form-element-btn">
              <button class="btn btn-nav btn-table-grn"><i class="bi bi-upload"></i> Upload</button>
              <?php
              if ($client->getAccessToken() && !$client->isAccessTokenExpired()) {
                echo '<label class="oauth-container"><i class="bi bi-check-circle"></i> Authorized to Upload</label>';
              } else {
                echo '<a href="' . $authUrl . '"><button type="submit" value ="Auth PTS" class="btn btn-nav btn-ghost2"><i class="bi bi-shield"></i> OAuth</button></a>';
              };
              ?>
            </div>
          </form>
          <div class="outside-btn">
            <button class="btn btn-table btn-table-mb" onclick="back(<?= $_SESSION['post']['classID'] ?>)"><i class="bi bi-arrow-left-circle"></i></button>
            <a href="createClass5.php">
              <button type="submit" value="Next" class="btn btn-table btn-full"><i class="bi bi-arrow-right-circle"></i></button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>

<script>
  function back(classID) {
    $.ajax({
      url: '../../src/redirectDir.php?editClass=1&classID=' + classID + '&step=3',
      type: 'POST',
      success: function(response) {
        window.location.href = response;
      },
      error: function(err) {
        alert("There was some error performing the AJAX call!");

      },
    });
  }
</script>
<?php view('footer') ?>