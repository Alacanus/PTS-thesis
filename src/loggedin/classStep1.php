<?php
$inputs = [];
$errors = [];

if (is_post_request()) {



    [$inputs, $errors] = filter($_POST, [
        'className' => 'string | required | between: 3, 255',
        'classDescription' => 'string | required | between: 3, 255',
    ]);
    

    if ($errors) {
        redirect_with('createClass1.php', [
            'errors' => $errors,
            'inputs' => $inputs

        ]);
    }

    foreach ($_POST as $key => $value) {
        $_SESSION['post'][$key] = $value;
    }
        if(isset($inputs['className']) && isset($inputs['classDescription'])){
            $conn = new PDO(
                sprintf("mysql:host=%s;dbname=%s;charset=UTF8", DB_HOST, DB_NAME),
                DB_USER,
                DB_PASSWORD,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
            $sql2 = "INSERT INTO classes (`className`, `classStatus`, `userID`) VALUES (:className, :classStatus, :userID)";
            $statement2 = $conn->prepare($sql2);
            $statement2->bindParam(':className', $inputs['className'], PDO::PARAM_STR);
            $statement2->bindValue(':classStatus', 'UNVERIFIED', PDO::PARAM_STR);
            $statement2->bindParam(':userID', $_SESSION['user_id'], PDO::PARAM_INT);
            
            if($statement2->execute()){
                $temp = $conn->lastInsertId();
                $sql = "INSERT INTO classprofile (`className`, `classDescription`, `imageAddress`, `equivalentHours`, `skillLevel`, `classID`) VALUES (:className, :classDescription, :imageAddress, :equivalentHours, :skillLevel, :classID)";
                $statement = $conn->prepare($sql);
                $statement->bindParam(':className', $inputs['className'], PDO::PARAM_STR);
                $statement->bindParam(':classDescription', $inputs['classDescription'], PDO::PARAM_STR);
                $statement->bindValue(':imageAddress', placeholderPIC, PDO::PARAM_STR);
                $statement->bindParam(':equivalentHours',$_POST['equivalentHours'], PDO::PARAM_STR);
                $statement->bindParam(':skillLevel',$_POST['skillLevel'] , PDO::PARAM_STR);
                $statement->bindParam(':classID', $temp, PDO::PARAM_INT);
                $statement->execute();

                $_SESSION['post']['classID']=$temp;

                $errors['classRooms'] = 'Class Created';
    
                $_SESSION['post']['classProcess1']=true;

                redirect_with('createClass2.php', [
                    'errors' => $errors,
                    'inputs' => $inputs
                ]);
            }
                
        }

} else if (is_get_request()) {
    [$inputs, $errors] = session_flash('inputs', 'errors');

    [$inputs, $errors] = filter($_GET, [
        'className' => 'string | required | between: 3, 255',
        'classDescription' => 'string | required | between: 3, 255',
    ]);

    //load file
    foreach ($_GET as $key => $value) {
        $_SESSION['post'][$key] = $value;
    }
        if(isset($inputs['className']) && isset($inputs['classDescription']) && isset($_SESSION['post']['classID'])){
        $sql1 = "UPDATE classes
        SET classes.className = :className
        WHERE classes.classID  = :classID ";
        db()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = db()->prepare($sql1);
        $statement->bindParam(':className', $inputs['className'], PDO::PARAM_STR);
        $statement->bindParam(':classID', $_SESSION['post']['classID'], PDO::PARAM_INT);

            
        $statement->execute();
        // 2nd sql
        $sql2 = "UPDATE classprofile
        JOIN
        classes
        ON classprofile.classID = classes.classID
        SET classprofile.className = :className, classprofile.classDescription = :classDescription, classprofile.equivalentHours = :equivalentHours, classprofile.skillLevel=:skillLevel
        WHERE classprofile.classID = :classID";
        $statement2 = db()->prepare($sql2);
        $statement2->bindParam(':className', $inputs['className'], PDO::PARAM_STR);
        $statement2->bindParam(':classDescription', $inputs['classDescription'], PDO::PARAM_STR);
        $statement2->bindValue(':equivalentHours', $_GET['equivalentHours'], PDO::PARAM_STR);
        $statement2->bindParam(':skillLevel', $_GET['skillLevel'], PDO::PARAM_STR);
        $statement2->bindParam(':classID', $_SESSION['post']['classID'], PDO::PARAM_INT);
        $statement2->execute();
        redirect_with('createClass2.php', [
            'errors' => $errors,
            'inputs' => $inputs
        ]);
        }


}