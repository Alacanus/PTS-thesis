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
$temp = placeholderPIC;
$imageAddress = substr($temp,15);
if(isset($_SESSION['user_id']) && isset($_SESSION['post']['classID'])){
    
    $temp = getclassPic($_SESSION['user_id']);
    $imageAddress = substr($temp['filePath'],15);
}

?>
<?php view('header', ['title' => 'Create Class']);
?>
<img src="<?= $imageAddress?>" alt="" width="500" height="333"><br>
<iframe src="https://www.youtube.com/embed/'<?=$_SESSION['videoID'] ?? 'Y5uQqLbzviU'?>" height="200" width="300" title="Iframe Example"></iframe>
<?php if (isset($errors['classRooms'])) : ?>
    <div class="alert alert-error">
        <?= $errors['classRooms'] ?>
    </div>
<?php endif ?>
<main id="mymain1">
<form id="form" action="createClass4.php" method="post" name="multiple_upload_form" id="multiple_upload_form" enctype="multipart/form-data">
<h2>Upload and display Picture and Image</h2>
      <label for="imageUpload">Image<div class="reqcolor">*</div></label>
      <input type="file" name="imageUpload" id="imageUpload">
          <label for="title">Title:</label><input type="text" name="title" id="title" value="" /> 
          <label for="description">Description:</label> <textarea name="description" id="description" cols="20" rows="2" ></textarea> 
          <label for="tags">Tags:</label> <input type="text" name="tags" id="tags" value="" /> 
          <label for="video_file">Choose Video File:</label> <input type="file" name="videoFile" id="videoFile"> 
          <progress id="progressBar" value="0" max="100" style="width:300hv;"></progress>
          <h2 name="status"></h2><p id="loaded_total"></p>
          <button>Upload</button>
    </form> 
    
    <?php if($client->getAccessToken() && !$client->isAccessTokenExpired()){
        echo '
        Authorized to Upload
        ';
    }else{
        echo '
        <a href="'.$authUrl .'">
        <input type="submit" value ="Auth PTS"/>
    </a>
        ';
    }
    echo '<br><br><br>';
    ?>
    <br>
          <a href="createClassSummary.php">
        <input type="submit" value ="Next"/>
      </a>
</main>


<?php view('footer') ?>
