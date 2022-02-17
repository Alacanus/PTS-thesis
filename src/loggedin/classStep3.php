<?php
$inputs = [];
$errors = [];

$option_list = get_db_Modules($_SESSION['post']['tempClassid']);
$tableNAme3 ='actiontype';
$optionVal3 ="actionType ";
$optionName3 ='actionType'; 
$option_list2 = get_db_Options($tableNAme3 , $optionVal3, $optionName3);
if (is_post_request()) {

    [$inputs, $errors] = filter($_POST, [
        'moduleName' => 'string | required | between: 3, 255',
        'chapter' => 'string | required | between: 1, 255',

    ]);
    

    if ($errors) {
        redirect_with('createClass3.php', [
            'errors' => $errors
        ]);
    }

    define ('SITE_ROOT', realpath(dirname(__FILE__)));

    $target_dir = SITE_ROOT."/../../Writable/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;


    // if(mb_strlen($_FILES["fileToUpload"]["name"],"UTF-8")> 225){
    //     $uploadOk = 0;
    // }
    // if(preg_match("`^[-0-9A-Z_\.]+$`i",$filename)){
    //     $uploadOk = 0;
    // }
    
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $errors['classRooms'] = "Sorry, file already exists. change the file name or pick another file";
        redirect_with('createClass3.php', [
            'errors' => $errors
        ]);
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        $errors['classRooms'] = "Sorry, your file was not uploaded.";
        redirect_with('createClass3.php', [
            'errors' => $errors
        ]);
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    

            $sql = 'INSERT INTO debugfiles(fileName, filePath, userID, classID)
            VALUES(:fileName, :filePath, :userID, :contID);
            INSERT INTO classmodules (moduleName, chapter, fileID, classID)
            VALUES(:moduleName, :chapter, LAST_INSERT_ID(),:classID)';
            
            $statement = db()->prepare($sql);
            
            $statement->bindValue(':fileName', basename( $_FILES["fileToUpload"]["name"]));
            $statement->bindValue(':filePath', $target_file);
            $statement->bindValue(':userID', $_SESSION['user_id']);
            $statement->bindValue(':contID', $_SESSION['post']['tempClassid']);
            $statement->bindValue(':classID', $_SESSION['post']['tempClassid']);
            $statement->bindValue(':moduleName', $inputs['moduleName']);
            $statement->bindValue(':chapter', $inputs['chapter']);
            $statement->execute();
        


        foreach ($_POST as $key => $value) {
            $_SESSION['post'][$key] = $value;
            }
    
        $errors['classRooms'] = "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        if($inputs['next']){
            redirect_with('createClass3.php', [
                'errors' => $errors
            ]);
        }

        } else {
        $errors['classRooms'] = "Sorry, there was an error in your submission your file.";
    
        redirect_with('createClass3.php', [
            'errors' => $errors
        ]);
        }
    }
    // redirect_with('createClass4.php', [
    //     'inputs' => $inputs
    // ]);

} else if (is_get_request()) {
    [$inputs, $errors] = session_flash('inputs', 'errors');

}