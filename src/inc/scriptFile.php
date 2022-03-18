<?php

function uploadImage(array $files){
    
  $target_dir = realpath(dirname(__FILE__)) ."/../../public/Writable/";
  $target_file = $target_dir . basename($files["imageUpload"]["name"]);
  $uploadOk = 1;
  $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

//   Check if image file is a actual image or fake image
  $check = getimagesize($files["imageUpload"]["tmp_name"]);
  if($check !== false) {
    // echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    $uploadOk = 0;
    return array('result'=>false,'message' => "File is not an image.",
    'Data'=>'0'
    );
  }

if(mb_strlen($files["imageUpload"]["name"],"UTF-8")> 225){
  $uploadOk = 0;
    return array('result'=>false,'message' => "Sorry, file name is to long.",
    'Data'=>'0'
    );
}

// Check if file already exists
if (file_exists($target_file)) {
  $uploadOk = 0;
  return array('result'=>false,'message' => "Sorry, file already exists.",
  'Data'=>'0'
  );
}


// Allow certain file formats
if($FileType != "jpg" && $FileType != "png" && $FileType != "jpeg"
&& $FileType != "gif" ) {
  $uploadOk = 0;
  return array('result'=>false,'message' => "Sorry, only JPG, JPEG, PNG & GIF files are allowed.",
  'Data'=>'0'
  );
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  return array('result'=>false,'message' => "Sorry, your file was not uploaded.",
  'Data'=>'0'
  );
} else {
  if (move_uploaded_file($files["imageUpload"]["tmp_name"], $target_file)) {
    $conn = new PDO(
      sprintf("mysql:host=%s;dbname=%s;charset=UTF8", DB_HOST, DB_NAME),
      DB_USER,
      DB_PASSWORD,
      [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
  );

  $sql = 'INSERT INTO debugfiles(fileName, filePath, userID)
  VALUES(:fileName, :filePath, :userID)
  ';
  
  $statement = $conn->prepare($sql);
  
  $statement->bindValue(':fileName', $files["imageUpload"]["name"]);
  $statement->bindValue(':filePath', $target_file);
  $statement->bindValue(':userID', $_POST['user_idfile'] ?? $_SESSION['user_id']);
  
  $statement->execute();
  $temp = $conn->lastInsertId();
  // db()->commit();


  return array('result'=>true,'message' => "The file ". htmlspecialchars( basename( $files["imageUpload"]["name"])). " has been uploaded.",
  'Data'=>$temp, 'filePath' =>$target_file);
  } else {
    return array('result'=>false,'message' => "Sorry, there was an error uploading your file.",
    'Data'=>'0', 'filePath' => placeholderPIC
    );
  }
}

}

function getPic_byID(int $fileID){
  $sql = 'SELECT * FROM debugfiles
  WHERE fileID = :fileID
  ';
  $statement = db()->prepare($sql);
  $statement->bindValue(':fileID', $fileID, PDO::PARAM_INT);
  $statement->execute();
  $filearr = $statement->fetch(PDO::FETCH_ASSOC);
  if(isset($filearr['filePath'])){
    if(file_exists($filearr['filePath']) && is_file($filearr['filePath']))
    {
        return $filearr;
    }
  }else{
    return ['filePath' => placeholderPIC];
  }
}

function deletePic_byID(int $fileID){
  $sql = 'SELECT * FROM debugfiles
  WHERE fileID = :fileID
  ';
  $statement = db()->prepare($sql);
  $statement->bindValue(':fileID', $fileID, PDO::PARAM_INT);
  $statement->execute();
  $filearr = $statement->fetch(PDO::FETCH_ASSOC);
  if (!unlink($filearr['filePath'])) { 
            echo ($filearr['fileName'] . " cannot be deleted due to an error"); 
        } 
        else { 
          $sql2 = 'DELETE FROM debugfiles WHERE fileID = :fileID';
          $statement2 = db()->prepare($sql2);
          $statement2->bindParam(':fileID', $filearr['fileID'], PDO::PARAM_INT);
          $return_arr = $statement2->execute();
        }
}

function getprofilePic(int $userID){
  $sql = 'SELECT * FROM debugfiles 
  JOIN userprofile
  ON userprofile.pictureID = debugfiles.fileID
  JOIN users
  ON users.userID = userprofile.userID
  WHERE users.userID = :userID
  ';
  $statement = db()->prepare($sql);
  $statement->bindValue(':userID', $userID, PDO::PARAM_INT);
  $statement->execute();
  $filearr = $statement->fetch(PDO::FETCH_ASSOC);
  if(isset($filearr['filePath'])){
    if(file_exists($filearr['filePath']) && is_file($filearr['filePath']))
    {
        return $filearr;
    }
  }else{
    return ['filePath' => placeholderPIC];
  }
}

function replaceprofilePic(int $userID){
  $sql = 'SELECT * FROM debugfiles 
  JOIN userprofile
  ON userprofile.pictureID = debugfiles.fileID
  JOIN users
  ON users.userID = userprofile.userID
  WHERE users.userID = :userID
  ';
  $statement = db()->prepare($sql);
  $statement->bindValue(':userID', $userID, PDO::PARAM_INT);
  $statement->execute();
  $filearr = $statement->fetch(PDO::FETCH_ASSOC);
  if (!unlink($filearr['filePath'])) { 
            echo ($filearr['fileName'] . " cannot be deleted due to an error"); 
        } 
        else { 
          $sql2 = 'DELETE FROM debugfiles WHERE fileID = :fileID';
          $statement2 = db()->prepare($sql2);
          $statement2->bindParam(':fileID', $filearr['fileID'], PDO::PARAM_INT);
          $return_arr = $statement2->execute();
        }
}

function getclassPic(int $userID){
  $sql = 'SELECT * FROM debugfiles 
  JOIN classprofile
  ON classprofile.imageAddress = debugfiles.filePath
  JOIN classes
  ON classprofile.classID = classes.classID
  WHERE classes.userID = :userID AND classes.classID = :classID
  ';
  $statement = db()->prepare($sql);
  $statement->bindValue(':userID', $userID, PDO::PARAM_INT);
  $statement->bindValue(':classID', $_SESSION['post']['classID'], PDO::PARAM_INT); 
  $statement->execute();
  $filearr = $statement->fetch(PDO::FETCH_ASSOC);
    return $filearr;
}

function replaceclassPic(int $userID){
  $sql = 'SELECT * FROM debugfiles 
  JOIN classprofile
  ON classprofile.imageAddress = debugfiles.filePath
  JOIN classes
  ON classprofile.classID = classes.classID
  WHERE classes.userID = :userID
  ';
  $statement = db()->prepare($sql);
  $statement->bindValue(':userID', $userID, PDO::PARAM_INT);
  $statement->execute();
  $filearr = $statement->fetch(PDO::FETCH_ASSOC);
  if($filearr['filePath'] !== placeholderPIC){
    if (!unlink($filearr['filePath'])) { 
      echo ($filearr['fileName'] . " cannot be deleted due to an error"); 
  } 
  else { 
    $sql2 = 'DELETE FROM debugfiles WHERE fileID = :fileID';
    $statement2 = db()->prepare($sql2);
    $statement2->bindParam(':fileID', $filearr['fileID'], PDO::PARAM_INT);
    $return_arr = $statement2->execute();
  }
  }
}



function replacePaymentPic(int $userID){
  $sql = 'SELECT * FROM debugfiles 
  JOIN paymentmethod
  ON paymentmethod.methodfileID = debugfiles.fileID
  WHERE debugfiles.userID = :userID
  ';
  $statement = db()->prepare($sql);
  $statement->bindValue(':userID', $userID, PDO::PARAM_INT);
  $statement->execute();
  $filearr = $statement->fetch(PDO::FETCH_ASSOC);
  if(!is_bool($filearr)){
      if (!unlink($filearr['filePath'])) { 
        echo ($filearr['fileName'] . " cannot be deleted due to an error"); 
    } 
    else { 
      $sql2 = 'DELETE FROM debugfiles WHERE fileID = :fileID';
      $statement2 = db()->prepare($sql2);
      $statement2->bindParam(':fileID', $filearr['fileID'], PDO::PARAM_INT);
      $return_arr = $statement2->execute();
    }
  }
}

function getPaymentPic(int $userID){
  $sql = 'SELECT * FROM debugfiles 
  JOIN paymentmethod
  ON paymentmethod.methodfileID = debugfiles.fileID
  WHERE paymentmethod.userID = :userID
  ';
  $statement = db()->prepare($sql);
  $statement->bindValue(':userID', $userID, PDO::PARAM_INT);
  $statement->execute();
  $filearr = $statement->fetch(PDO::FETCH_ASSOC);
    return $filearr;
}