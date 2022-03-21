<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/loggedin/youtube.php';
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
<?php view('header', ['title' => 'Youtube Upload']);
?>
<?php if (isset($errors['Youtube'])) : ?>
  <div class="overlay-new02" id="error-modal">
    <div class="error-container">
      <div class="edit-profile">
        <div class="error-close-btn">&times;</div>
        <i class="bi bi-exclamation-triangle"></i>
        <?= $errors['Youtube'] ?>
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
  <div class="youtube-box">

    <h1>Upload video to YouTube using PHP</h1>
    <iframe src="https://www.youtube.com/embed/'<?= $_SESSION['videoID'] ?? 'Y5uQqLbzviU' ?>" height="200" width="300" title="Iframe Example"></iframe>

    <form method="post" name="multiple_upload_form" id="multiple_upload_form" enctype="multipart/form-data" action="youtube_upload.php">

      <label for="title">Title:</label><input type="text" name="title" id="title" value="" />

      <label for="description">Description:</label> <textarea name="description" id="description" cols="20" rows="2"></textarea>

      <label for="tags">Tags:</label> <input type="text" name="tags" id="tags" value="" />

      <label for="video_file">Choose Video File:</label> <input type="file" name="videoFile" id="videoFile">
      <progress id="progressBar" value="0" max="100" style="width:300hv;"></progress>
      <input name="videoSubmit" id="submit" type="submit" value="Upload">
      <h2 name="status"></h2>
      <p id="loaded_total"></p>
    </form>
    <?php if ($client->getAccessToken() && !$client->isAccessTokenExpired()) {
      echo '
    Authorized to Upload
    ';
    } else {
      echo '
    <a href="' . $authUrl . '">
     <input type="submit" value ="Auth PTS"/>
   </a>
    ';
    }

    ?>

    </form>

</main>