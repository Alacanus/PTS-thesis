<?php
$inputs = [];
$errors = [];
if (is_post_request()) {

    if ($errors) {
        redirect_with('createClass2.php', [
            'errors' => $errors
        ]);
    }
    // foreach ($_POST['IngredientName'] as $key => $value) {
    //     $_SESSION['post']['IngredientName'][$key] = $value;
    //     };
    // foreach ($_POST['description'] as $key => $value) {
    //     $_SESSION['post']['description'][$key] = $value;
    //     }
    // foreach ($_POST['unitOfMeasure'] as $key => $value) {
    //     $_SESSION['post']['unitOfMeasure'][$key] = $value;
    //     }
    // foreach ($_POST['price'] as $key => $value) {
    //     $_SESSION['post']['price'][$key] = $value;
    //     }
    // foreach ($_POST['quantity'] as $key => $value) {
    //     $_SESSION['post']['quantity'][$key] = $value;
    //     }
        $temp = $_SESSION['post']['classID'];
        foreach($_POST['IngredientName'] as $key=>$value){
            $sql2 = "INSERT INTO package (`IngredientName`,`description`,`amount`,`price`, `unitMID`, `classID`) VALUES (:IngredientName, :description, :amount, :price, :unitMID, :classID)";
            $statement2 = db()->prepare($sql2);
            $statement2->bindParam(':IngredientName', $_POST['IngredientName'][$key], PDO::PARAM_STR);
            $statement2->bindParam(':description', $_POST['description'][$key], PDO::PARAM_STR);
            $statement2->bindParam(':amount', $_POST['quantity'][$key], PDO::PARAM_INT);
            $statement2->bindParam(':price', $_POST['price'][$key]);
            $statement2->bindValue(':unitMID', 10);
            // $statement2->bindParam(':unitMID', $_POST['unitOfMeasure'][$key]);
            // $statement2->bindParam(':classID', $_SESSION['post']['classID']);
            $statement2->bindParam(':classID', $temp);
            $statement2->execute();
        }
        // redirect_with('createClass3.php', [
        //     'inputs' => $inputs
        // ]);


} else if (is_get_request()) {
    [$inputs, $errors] = session_flash('inputs', 'errors');

    //load file


}