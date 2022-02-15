<?php
require __DIR__ . '/../src/bootstrap.php';
$errors = [];


if (is_post_request()) {
  define ('SITE_ROOT', realpath(dirname(__FILE__)));

  $target_dir = SITE_ROOT."/../Writable/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $errors['accountMGTFile'] = "Sorry, file already exists.";
  redirect_with('../public/accountManagement.php', [
      'errors' => $errors
  ]);
  $uploadOk = 0;
}


// Allow certain file formats
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
// && $imageFileType != "gif" ) {
//   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//   $uploadOk = 0;
// }

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  $errors['accountMGTFile'] = "Sorry, your file was not uploaded.";
  redirect_with('../public/accountManagement.php', [
      'errors' => $errors
  ]);
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

  $sql = 'INSERT INTO debugfiles(fileName, filePath, userID)
  VALUES(:fileName, :filePath, :userID)';
  
  $statement = db()->prepare($sql);
  
  $statement->bindValue(':fileName', $_FILES["fileToUpload"]["name"]);
  $statement->bindValue(':filePath', $target_file);
  $statement->bindValue(':userID', $_POST['user_idfile'] ?? $_SESSION['user_id']);
  
  $statement->execute();


    $errors['accountMGTFile'] = "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";

        redirect_with('../public/accountManagement.php', [
            'errors' => $errors
        ]);
  } else {
    $errors['accountMGTFile'] = "Sorry, there was an error uploading your file.";

    redirect_with('../public/accountManagement.php', [
        'errors' => $errors
    ]);
  }
}



} else if (is_get_request()) {

}



?>