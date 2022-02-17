<?php
$inputs = [];
$errors = [];

$option_list = get_db_Modules($_SESSION['post']['tempClassid']);
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
    
            $assoc= upload_file_Record(basename($_FILES["fileToUpload"]["name"]), $target_file);
            $_SESSION['key'] = $assoc;
        $sql2 = 'INSERT INTO classmodules (moduleName, chapter, fileID, classID)
        VALUES(:moduleName, :chapter, :fileID,:classID)';
        
        $statement2 = db()->prepare($sql2);
        
        $statement2->bindValue(':moduleName', $inputs['moduleName']);
        $statement2->bindValue(':chapter', $inputs['chapter']);
        $statement2->bindValue(':fileID', $assoc['fileID'] ?? 0);
        $statement2->bindValue(':classID', $_SESSION['post']['tempClassid']);

        
        $statement2->execute();

        


        foreach ($_POST as $key => $value) {
            $_SESSION['post'][$key] = $value;
            }
    
        $errors['classRooms'] = "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    
            redirect_with('createClass3.php', [
                'errors' => $errors
            ]);
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