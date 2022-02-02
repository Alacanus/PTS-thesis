<?php
//sql functions
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
function read(string $tableName, string $optionVal, string $optionName) {
    $option_list = '';
    $sql = "SELECT * FROM `$tableName`";
    $statement = db()->prepare($sql);
    $statement->execute();
    while($data=  $statement->fetchAll(PDO::FETCH_ASSOC)) {
        $option_list = $data;
       //$option_list.="<option value='$data[$optionVal]'>$data[$optionName]</option>";
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