<?php

require __DIR__ . '/../bootstrap.php';

$return_arr = array();
[$inputsget, $errors] = filter($_GET, [
    'userID' => 'string | required',
    'modalOption' => 'string | required',
    'fileID' => 'string | required',

]);

[$inputs, $errors] = filter($_POST, [
    'username' => 'string | required',
    'email' => 'string | required',
    'firstname' => 'string | required',
    'lastName' => 'string | required',
    'gender' => 'string | required',
    'age' => 'string | required | alphanumeric',
    'birthday' => 'string | required',
    'address' => 'string | required',
    'contactno' => 'string | required',
    'aboutme' => 'string | required',
    'usertype' => 'string | required',
    'user_id' => 'string | required',
    'Option' => 'string | required',
    'usertype' => 'string | required',
    'password' => 'string | required',

]);

if($inputsget['modalOption'] == 'get'){
    $sql = "SELECT * FROM userprofile 
      JOIN users
      ON users.userID = userprofile.userID
      JOIN userroles
      ON users.roleID = userroles.roleID
    WHERE users.userID = :userID";
    $statement = db()->prepare($sql);
    $statement->bindParam(':userID', $inputsget['userID'], PDO::PARAM_INT);
    $statement->execute();
        while($row = $statement->fetch(PDO::FETCH_ASSOC)){
            $uid = $row['userID'];
            $username = $row['username'];
            $fname = $row['firstname'];
            $lname = $row['lastName'];
            $roleType = $row['roleType'];
            $roleID = $row['roleID'];
            $email = $row['email'];
            $gender = $row['gender'];
            $age = $row['age'];
            $birthday = $row['birthday'];
            $address = $row['address'];
            $contactno = $row['contactno'];
            $about = $row['aboutme'];

        
            $return_arr[] = array("userID" => $inputsget['userID'],
                            "username" => $username,
                            "firstname" => $fname,
                            "lastName" => $lname,
                            "roleType" => $roleType,
                            "roleID" => $roleID,
                            "email" => $email,
                            "gender" => $gender,
                            "age" => $age,
                            "birthday" => $birthday,
                            "address" => $address,
                            "contactno" => $contactno,
                            "aboutme" => $about);
        }
        echo json_encode($return_arr);
}elseif($inputsget['modalOption'] == 'delete'){

    $sql = 'DELETE FROM users WHERE users.userID = :userID';
    $statement = db()->prepare($sql);
    $statement->bindParam(':userID', $inputsget['userID'], PDO::PARAM_INT);
    $return_arr = $statement->execute();
    echo json_encode($return_arr);

}elseif($inputsget['modalOption'] == 'delete2'){
    $sql = 'SELECT * FROM debugfiles WHERE fileID= :fileID';
    $statement = db()->prepare($sql);
    $statement->bindValue(':fileID', $inputsget['userID'], PDO::PARAM_INT);
    $statement->execute();
    $filearr = $statement->fetch(PDO::FETCH_ASSOC);
    if (!unlink($filearr['filePath'])) { 
        echo ($filearr['fileName'] . " cannot be deleted due to an error"); 
    } 
    else { 
        
        $sql2 = 'DELETE FROM debugfiles WHERE fileID = :fileID';

        $statement2 = db()->prepare($sql2);
        $statement2->bindParam(':fileID', $inputsget['userID'], PDO::PARAM_INT);
        $return_arr = $statement2->execute();
        echo ($filearr['fileName'] ." has been deleted"); 
    } 



}elseif($inputs['Option'] == "Create"){


    $sql = 'INSERT INTO users (username, email, password, firstname, lastname, roleID, active)VALUES(:username, :email, :password, :firstname, :lastname, :userType, 1);
    INSERT INTO userprofile (`userID`) VALUES (LAST_INSERT_ID())';
    $statement = db()->prepare($sql);

    $statement->bindValue(':username', $inputs['username']);
    $statement->bindValue(':email', $inputs['email']);
    $statement->bindValue(':firstname', $inputs['firstname'], PDO::PARAM_STR);
    $statement->bindValue(':lastname', $inputs['lastName'], PDO::PARAM_STR);
    $statement->bindValue(':userType', $inputs['usertype'], PDO::PARAM_INT);
    $statement->bindValue(':password', password_hash($inputs['password'], PASSWORD_BCRYPT));

    $return_arr=$statement->execute();
    echo json_encode($return_arr);
   
    
}elseif($inputsget['modalOption'] == 'download'){
    $sql = 'SELECT * FROM debugfiles WHERE fileID= :fileID';
    $statement = db()->prepare($sql);
    $statement->bindValue(':fileID', $inputsget['fileID'], PDO::PARAM_INT);
    $statement->execute();
    $filearr = $statement->fetch(PDO::FETCH_ASSOC);
    echo json_encode($filearr);

    
}elseif($inputsget['modalOption'] == 'download2'){
    $sql = 'SELECT * FROM debugfiles WHERE fileID= :fileID';
    $statement = db()->prepare($sql);
    $statement->bindValue(':fileID', $inputsget['fileID'], PDO::PARAM_INT);
    $statement->execute();
    $filearr = $statement->fetch(PDO::FETCH_ASSOC);

    if(file_exists($filearr['filePath']) && is_file($filearr['filePath']))
    {
        header('Cache-control: private');
        header('Content-Type: application/octet-stream');
        header('Content-Length: '.filesize($filearr['filePath']));
        header('Content-Disposition: attachment; filename="'.basename($filearr['filePath']).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filearr['filePath']));
        readfile($filearr['filePath']);
        exit;
    
    }
}else{

    echo json_encode($_POST);
}