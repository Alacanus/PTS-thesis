<?php
//sql functions
define("ROW_PER_PAGE",10);
$per_page_html = '';
$page = 1;
$start=0;
$limit=" limit " . $start . "," . ROW_PER_PAGE;
function create(string $email, string $username, string $password, string $fname, string $lname, string $userType, string $activation_code, int $expiry = 1 * 24  * 60 * 60): bool
{
    $sql = 'INSERT INTO users(username, email, password, firstname, lastname, roleID, activation_code, activation_expiry)
            VALUES(:username, :email, :password, :firstname, :lastname, :userType, :activation_code,:activation_expiry)';

    $statement = db()->prepare($sql);

    $statement->bindValue(':username', $username);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':firstname', $fname, PDO::PARAM_STR);
    $statement->bindValue(':lastname', $lname, PDO::PARAM_STR);
    $statement->bindValue(':userType', $userType, PDO::PARAM_INT);
    $statement->bindValue(':password', password_hash($password, PASSWORD_BCRYPT));
    $statement->bindValue(':activation_code', password_hash($activation_code, PASSWORD_DEFAULT));
    $statement->bindValue(':activation_expiry', date('Y-m-d H:i:s',  time() + $expiry));

    return $statement->execute();
}
function read_db(string $tableName) {
    $sql = "SELECT * FROM `$tableName` WHERE userID = :userID";
    $statement = db()->prepare($sql);
    $statement->bindParam(':userID', $_SESSION['userID'], PDO::PARAM_INT);
    $statement->execute();
    
    return $statement->fetch(PDO::FETCH_ASSOC);
 }

 function get_db_Modules(string $classID) {
    $option_list = '';
        $sql = "SELECT * FROM classmodules INNER JOIN debugfiles ON debugfiles.fileID  = classmodules.fileID 
        WHERE classmodules.classID = :fileID";
        $statement = db()->prepare($sql);
        $statement->bindValue(':fileID', $classID, PDO::PARAM_INT);
        $statement->execute();
        while($data =  $statement->fetchAll(PDO::FETCH_ASSOC)) {
            $option_list = $data;
        }
      
    return $option_list;
 }
 function update(string $password, string $password2):bool{
    if($password == $password2){
        $sql = 'UPDATE users
        SET password = :password, 
        WHERE userID = :userID';
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':userID', $_SESSION['userID'], PDO::PARAM_INT);
    $statement->bindParam(':password',password_hash($password, PASSWORD_BCRYPT));

    // execute the UPDATE statment
    if ($statement->execute()) {
        return true;
        }   
    return false;
    }

    return false;
}

function delete(){
    $sql = 'DELETE FROM table_name WHERE condition;';
    $statement = db()->prepare($sql);
    $statement->bindValue(':username', $username);
    $statement->execute();
}

function get_user_Profile(int $userID){
    $sql = "SELECT * FROM userprofile 
    INNER JOIN users
      ON users.userID = userprofile.userID
      JOIN userroles
      ON users.roleID = userroles.roleID
  WHERE users.userID = :userID";
    $statement = db()->prepare($sql);
    $statement->bindParam(':userID', $userID, PDO::PARAM_INT);
    $statement->execute();
    
    return $statement->fetch(PDO::FETCH_ASSOC);
}

function update_user_Profile(string $userID, string $email, string $username, string $fname, string $lname, int $userType, string $gender, int $age, string $bDay, string $adress, string $contact, string $about , int $fileID = 73):bool{//place holder image
    try{
        
        $sql1 = "UPDATE users
        SET users.roleID = :userType, users.username = :username, users.email = :email, users.firstname = :firstname, users.lastName = :lastname
        WHERE users.userID = :userID";
        db()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = db()->prepare($sql1);
        $statement->bindParam(':userType', $userType);
        $statement->bindParam(':username', $username);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':firstname', $fname);
        $statement->bindParam(':lastname', $lname);
        $statement->bindParam(':userID', $userID);

            
        $statement->execute();
        // 2nd sql
        $sql2 = "UPDATE userprofile
        JOIN
        users
        ON userprofile.userID = users.userID
        SET userprofile.age = :age, userprofile.gender = :gender, userprofile.birthday = :birthday, userprofile.address = :address, 
        userprofile.contactno = :contactno, userprofile.aboutme  = :aboutme, userprofile.pictureID=:fileID
        WHERE userprofile.userID = :userID";
        $statement2 = db()->prepare($sql2);
        $statement2->bindParam(':userID', $userID, PDO::PARAM_INT);
        $statement2->bindParam(':age', $age, PDO::PARAM_INT);
        $statement2->bindParam(':gender', $gender, PDO::PARAM_STR);
        $statement2->bindValue(':birthday', $bDay, PDO::PARAM_STR);
        $statement2->bindValue(':address', $adress, PDO::PARAM_STR);
        $statement2->bindParam(':contactno', $contact, PDO::PARAM_INT);
        $statement2->bindParam(':aboutme', $about, PDO::PARAM_STR);
        $statement2->bindParam(':fileID', $fileID, PDO::PARAM_INT);
        $statement2->execute();
        return true;

    }catch(PDOException $e) {
            // db()->rollBack();
            die($e->getMessage());
            return false;
    }

}

function create_user_Profile(string $userID):bool{
    try{
        $sql2 = "INSERT INTO userprofile (`userID`) VALUES (:userID)";
        $statement2 = db()->prepare($sql2);
        $statement2->bindParam(':userID', $userID, PDO::PARAM_INT);
        $statement2->execute();
        return true;

    }catch(PDOException $e) {
            die($e->getMessage());
            return false;
    }

}
function update_vidData(int $vidID, string $youtubeID ){
        $sql = 'UPDATE videofiles
        SET youtubeVidID = :youtubeVidID
        WHERE vidID = :userID ';
    $statement = db()->prepare($sql);
    $statement->bindParam(':userID', $vidID, PDO::PARAM_INT);
    $statement->bindParam(':youtubeVidID', $youtubeID, PDO::PARAM_STR);
    // execute the UPDATE statment
    if ($statement->execute()) {
        return true;
        }   
    return false;
}

function insert_vidData(string $videoTitle, string $videoDesc, string $videoTags, string $videoFilePath)
{
$conn = new PDO(
    sprintf("mysql:host=%s;dbname=%s;charset=UTF8", 'localhost', 'u657624546_pts'),
    'u657624546_eslp',
    'Zxcvbnm1',
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);
    $sql = 'INSERT INTO videofiles(vidTitle, vidDesc, vidTags, vidPath)
            VALUES(:videoTitle, :videoDesc, :videoTags, :videoFilePath)';

    $statement = $conn->prepare($sql);

    $statement->bindValue(':videoTitle', $videoTitle, PDO::PARAM_STR);
    $statement->bindValue(':videoDesc', $videoDesc, PDO::PARAM_STR);
    $statement->bindValue(':videoTags', $videoTags, PDO::PARAM_STR);
    $statement->bindValue(':videoFilePath', $videoFilePath, PDO::PARAM_STR);


    $statement->execute();
    $temp = $conn->lastInsertId();
    $sql2 = 'SELECT * FROM videofiles WHERE vidID  = :vidID  ';
    $statement2 = $conn->prepare($sql2);
    $statement2->bindValue(':vidID', $temp, PDO::PARAM_INT);
    $statement2->execute();

    return $statement2->fetch(PDO::FETCH_ASSOC);

}


function get_Class_CARDS() {
    $option_list = '';
        $sql = "SELECT * FROM classes JOIN classprofile ON classes.classID  = classprofile.classID 
        ";//WHERE classes.classID = :fileID
        $statement = db()->prepare($sql);
        // $statement->bindValue(':fileID', $classID, PDO::PARAM_INT);
        $statement->execute();
        while($data =  $statement->fetchAll(PDO::FETCH_ASSOC)) {
            $option_list = $data;
        }
      
    return $option_list;
 }

 function get_class_Info(int $classID) {
    $option_list = '';
        $sql = "SELECT * FROM classes JOIN classprofile ON classes.classID  = classprofile.classID 
        WHERE classes.classID = :fileID";
        $statement = db()->prepare($sql);
        $statement->bindValue(':fileID', $classID, PDO::PARAM_INT);
        $statement->execute();
        while($data =  $statement->fetchAll(PDO::FETCH_ASSOC)) {
            $option_list = $data;
        }
      
    return $option_list;
 }

 function get_ingredient_CARDS(int $classID) {
    $option_list = '';
        $sql = "SELECT * FROM package WHERE classID  = :classID 
        ";//WHERE classes.classID = :fileID
        $statement = db()->prepare($sql);
        $statement->bindValue(':classID', $classID, PDO::PARAM_INT);
        $statement->execute();
        while($data =  $statement->fetchAll(PDO::FETCH_ASSOC)) {
            $option_list = $data;
        }
      
    return $option_list;
 }