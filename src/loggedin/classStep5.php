<?php
$inputs = [];
$errors = [];
$tableNAme ="paymentlist";
$option_list = get_db_Options($tableNAme);
if (is_post_request()) {

    [$inputs, $errors] = filter($_POST, [
        'accountName' => 'string | required | between: 3, 255',
        'accountDetails' => 'string | required | between: 3, 255',
    ]);


    // if ($errors) {
    //     redirect_with('createClass5.php', [
    //         'inputs' => $inputs,
    //         'errors' => $errors
    //     ]);
    // }



    
    if(get_class_Payment()){
        if(isset($_FILES['imageUpload']) && $_FILES['imageUpload']['size'] > 0){
            replacePaymentPic($_SESSION['user_id']);
            $fileDATA=uploadImage($_FILES);
            $_SESSION['debug'] = $_FILES;
        }else{
            if(!isset($fileDATA)){
                $fileDATA = [];
            }
            $fileDATA['result'] = false;
            // $fileID = getPaymentPic($_SESSION['post']['classID']);
            $fileID = getPaymentPic(71);

            if(!isset($fileID['fileID'])){
                $fileDATA['Data'] = 0;
            }else{
                $fileDATA['Data'] = $fileID['fileID'];
            }
            
            $fileDATA['message'] = ' ';
        }

        $sql = 'UPDATE paymentmethod SET accountName = :accountName, accountDetail = :accountDetail, paylistID = :paylistID, methodfileID = :methodfileID
        WHERE userID = :userID';
        $statement = db()->prepare($sql);
        
        $statement->bindValue(':accountName', encrypt0($inputs['accountName']));
        $statement->bindValue(':accountDetail', encrypt0($inputs['accountDetails']));
        $statement->bindValue(':paylistID', $_POST['paylistID']);
        $statement->bindValue(':methodfileID', $fileDATA['Data']);
        $statement->bindValue(':userID', $_SESSION['user_id']);
        $statement->execute();

            $errors['classRooms'] = 'User Payment details has been Edited' . $fileDATA['message'];


            redirect_with('createClassSummary.php', [
                'errors' => $errors,
                'inputs' => $inputs
            ]);
    }else{

        $_SESSION['debug'] = $_FILES['imageUpload'];

        if(isset($_FILES['imageUpload']) && $_FILES['imageUpload']['size'] > 0){
            replacePaymentPic($_SESSION['user_id']);
            $fileDATA=uploadImage($_FILES);
            $_SESSION['debug'] = $fileDATA;
        }else{
            if(!isset($fileDATA)){
                $fileDATA = [];
            }
            $fileDATA['result'] = false;
            $fileID = getPaymentPic(71);
            
            if(!isset($fileID['fileID'])){
                $fileDATA['Data'] = 0;
            }else{
                $fileDATA['Data'] = $fileID['fileID'];
            }
            
            $fileDATA['message'] = ' ';
        }
        
        $sql = 'INSERT INTO paymentmethod(accountName, accountDetail, paylistID, methodfileID, userID)
        VALUES(:accountName, :accountDetail, :paylistID, :methodfileID,  :userID)
        ';
            $_SESSION['debug'] = $fileDATA;
        
        $statement = db()->prepare($sql);
        
        $statement->bindValue(':accountName', encrypt0($inputs['accountName']));
        $statement->bindValue(':accountDetail', encrypt0($inputs['accountDetails']));
        $statement->bindValue(':paylistID', $_POST['paylistID']);
        $statement->bindValue(':methodfileID', $fileDATA['Data']);
        $statement->bindValue(':userID', $_SESSION['user_id']);
        $statement->execute();

        $errors['classRooms'] = 'Payment details recorded and '. $fileDATA['message'];
        redirect_with('createClass5.php', [
            'errors' => $errors,
            'inputs' => $inputs
        ]);
        
    }


} else if (is_get_request()) {
    [$inputs, $errors] = session_flash('inputs', 'errors');

    //load file


}