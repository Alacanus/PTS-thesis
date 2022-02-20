<?php
//Codes are referred too https://www.php.net/manual/en/function.move-uploaded-file

function uploadImage(){
 
    $message = '';

    $target_dir = realpath(dirname(__FILE__))."/../../Writable/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
    // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      return array('result' => false, 'Message' => "File is an image - " . $check["mime"] . ".");
      $uploadOk = 1;
    } else {
        return [false,"File is not an image."];
      $uploadOk = 0;
    }
  }
  
  if(mb_strlen($_FILES["fileToUpload"]["name"],"UTF-8")> 225){
    $uploadOk = 0;
  }
  if(preg_match("`^[-0-9A-Z_\.]+$`i",$filename)){
    $uploadOk = 0;
  }
  
  // Check if file already exists
  if (file_exists($target_file)) {
    return "Sorry, file already exists.";
    $uploadOk = 0;
  }
  
  
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    return "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }
  
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    return "Sorry, your file was not uploaded.";

  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
  
    $sql = 'INSERT INTO debugfiles(fileName, filePath, userID)
    VALUES(:fileName, :filePath, :userID)';
    
    $statement = db()->prepare($sql);
    
    $statement->bindValue(':fileName', $_FILES["fileToUpload"]["name"]);
    $statement->bindValue(':filePath', $target_file);
    $statement->bindValue(':userID', $_POST['user_idfile'] ?? $_SESSION['user_id']);
    
    $statement->execute();
    return $statement->fetch(PDO::ASSOC);  

    } else {
        return "Sorry, there was an error uploading your file.";
  
    }
  }
  
}