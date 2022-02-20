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
?>
  <?php
// echo '<pre>' , var_dump($_SESSION['post']) , '</pre>';
$youAPI = 'AIzaSyAPk4i1eeAdRnizAzj6LajliE2PkKBn24s';
// $youChaID='UCK-xAPOXT-58fBzMhT2Pe9Q';
$youChaID= $inputs['chnlYout'] ?? 'UC6nSFpj9HTCZ5t-N3Rm3-HA';
$temp = getPic_byID($_SESSION['post']['fileData']['Data']);
$imageAddress = substr($temp['filePath'],15);
// $pagetion = 10;
// $apiError='';

// $apiData = @file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$youChaID.'&maxResults='.$pagetion.'&key='.$youAPI.''); 
// if($apiData){ 
//     $videoList = json_decode($apiData); 
// }else{ 
//     echo 'Invalid API key or channel ID.'; 
// }
?>
<?php view('header', ['title' => 'Create Class']);
?>
<img src="<?= $imageAddress?>" alt="" width="500" height="333">
<?php if (isset($errors['userProfile'])) : ?>
    <div class="alert alert-error">
        <?= $errors['classRooms'] ?>
    </div>
<?php endif ?>
<main id="mymain1">
<form id="form" action="createClass4.php" method="post" enctype="multipart/form-data">
<h2>Upload and display Picture and Image</h2>
      <label for="imageUpload">Image  - not working yet<div class="reqcolor">*</div></label>
      <input type="file" name="imageUpload" id="imageUpload">
      <label for="chnlYout">Video, Please enter you Channel ID<div class="reqcolor">*</div></label>
      <small><?= $errors['chnlYout'] ?? '' ?></small>
      <input type="text" name="chnlYout" id="chnlYout" value="<?= $inputs['chnlYout'] ?? '' ?>" class="<?= error_class($errors, 'chnlYout') ?>">
      <button>Upload</button>
<p>Try This channel = UCvG04Y09q0HExnIjdgaqcDQ</p>
<?php
    print_r($_SESSION['post']['fileData']).'<br>';

?>
</form>
</main>

<diV class = 'center'>
    <!-- <?php 
    if(!empty($videoList->items)){ 
      foreach($videoList->items as $item){ 
          // Embed video 
          if(isset($item->id->videoId)){ 
              echo ' 
              <div class="yvideo-box"> 
                  <iframe width="280" height="150" src="https://www.youtube.com/embed/'.$item->id->videoId.'" frameborder="0" allowfullscreen></iframe> 
                  <h4>'. $item->snippet->title .'</h4> 
                  <h4>'. $item->snippet->publishedAt .'</h4> 
                  <h4>'. $item->snippet->channelTitle .'</h4> 

              </div>'; 
          } 
      } 
  }else{ 
      echo '<p class="error">'.$apiError.'</p>'; 
  }
    ?> -->
    </diV>

<?php view('footer') ?>
