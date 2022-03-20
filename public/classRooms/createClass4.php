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
  <div class="alert alert-error">
    <?= $errors['classRooms'] ?>
  </div>
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
              <label for="title">Title:</label>
              <input type="text" name="title" id="title" value="" />
            </div>
            <div class="form-element">
              <label for="description">Description:</label> 
              <textarea name="description" id="description" cols="20" rows="2"></textarea>
            </div>
            <div class="form-element">
              <label for="tags">Tags:</label> 
              <input type="text" name="tags" id="tags" value="" />
            </div>
            <div class="form-element">
              <label for="imageUpload">Image<div class="reqcolor">*</div></label>
              <input type="file" name="imageUpload" id="imageUpload">
            </div>
            <div class="form-element">
              <label for="video_file">Choose Video File:</label> <input type="file" name="videoFile" id="videoFile">
            </div>
            <div class="form-element">
              <label name="status">Upload Progress:</label>
              <progress id="progressBar" value="0" max="100" style="width:300hv;"></progress><p id="loaded_total"></p>
            </div>
            <div class="form-element">
              <button class="btn btn-nav btn-table-mb"><i class="bi bi-upload"></i> Upload</button>
            </div>
          </form>
          <div class="btn-right-02">
            <?php
            if ($client->getAccessToken() && !$client->isAccessTokenExpired()) {
              echo 'Authorized to Upload';
            } else {
              echo '<i class="bi bi-shield-check"><a href="' . $authUrl . '"><input type="submit" value ="Auth PTS" class="btn btn-nav btn-ghost2"/></a></i>';
            };
            ?>
            <a href="createClass5.php">
              <i class="bi bi-arrow-right-circle"></i>
              <input type="submit" value="Next" class="btn btn-nav btn-full" />
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <buttonon onclick="back(<?= $_SESSION['post']['classID']?>)">Back</button>
</main>

<script>
function back(classID){
    $.ajax({
        url: '../../src/redirectDir.php?editClass=1&classID='+classID+'&step=3',
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