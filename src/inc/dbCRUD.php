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
function read_db(string $tableName) {
    $sql = "SELECT * FROM `$tableName` WHERE userID = :userID";
    $statement = db()->prepare($sql);
    $statement->bindParam(':userID', $_SESSION['userID'], PDO::PARAM_INT);
    $statement->execute();
    
    return $statement->fetch(PDO::FETCH_ASSOC);
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

function update_user_Profile(string $userID, string $email, string $username,
string $fname, string $lname, int $userType, string $gender, int $age, string $bDay, string $adress, string $contact, string $about):bool{
    try{
        
        $sql1 = "UPDATE users
        SET roleID = :userType, username = :username, email = :email, firstname = :firstname, lastName = :lastname
        WHERE userID = :userID";
        $sqltest = "UPDATE users
        SET roleID = 2,firstname = 'linlin'
        WHERE userID = 9;";
        db()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = db()->prepare($sql1);
        $statement->bindParam(':userID', $_SESSION['userID'], PDO::PARAM_INT);
        $statement->bindParam(':userType', $userType, PDO::PARAM_INT);
        $statement->bindValue(':username', $username, PDO::PARAM_STR);
        $statement->bindValue(':email', $email, PDO::PARAM_STR);
        $statement->bindValue(':firstname', $fname, PDO::PARAM_STR);
        $statement->bindValue(':lastname', $lname, PDO::PARAM_STR);
        $statement->closeCursor();
        $statement->execute();
        //2nd sql
        $sql2 = "UPDATE userprofile
        JOIN
        users
        ON userprofile.userID = users.userID
        SET userprofile.age = :age, userprofile.gender = :gender, userprofile.birthday = :birthday, userprofile.address = :address, userprofile.contactno = :contactno, userprofile.aboutme  = :aboutme
        WHERE userprofile.userID = :userID";
        $statement = db()->prepare($sql2);
        $statement->bindParam(':userID', $_SESSION['userID'], PDO::PARAM_INT);
        $statement->bindParam(':age', $age, PDO::PARAM_INT);
        $statement->bindParam(':gender', $gender, PDO::PARAM_STR);
        $statement->bindValue(':birthday', $bDay, PDO::PARAM_STR);
        $statement->bindValue(':address', $adress, PDO::PARAM_STR);
        $statement->bindParam(':contactno', $contact, PDO::PARAM_INT);
        $statement->bindParam(':aboutme', $about, PDO::PARAM_STR);
        $statement->execute();
        return true;

    }catch(PDOException $e) {
            // db()->rollBack();
            die($e->getMessage());
            return false;
    }

}
