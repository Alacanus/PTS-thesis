<?php

if(filter_has_var(INPUT_POST,'Sync')) {
    // ...
    // $temp = $_SESSION['post']['classID'];

    
}else{

    // foreach($_POST['Day'] as $key=>$value){
    //     $sql2 = "INSERT INTO package (`IngredientName`,`description`,`amount`,`price`, `unitMID`, `classID`) VALUES (:IngredientName, :description, :amount, :price, :unitMID, :classID)";
    //     $statement2 = db()->prepare($sql2);
    //     $statement2->bindParam(':Day', $_POST['IngredientName'][$key], PDO::PARAM_STR);
    //     $statement2->bindParam(':startDate', $_POST['description'][$key], PDO::PARAM_STR);
    //     $statement2->bindParam(':startTime', $_POST['quantity'][$key], PDO::PARAM_INT);
    //     $statement2->bindParam(':endTime', $_POST['price'][$key]);
    //     // $statement2->bindParam(':unitMID', $_POST['unitOfMeasure'][$key]);
    //     // $statement2->bindParam(':classID', $_SESSION['post']['classID']);
    //     $statement2->bindParam(':classID', $temp);
    //     $statement2->execute();
    // }
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
}

// if(filter_has_var(INPUT_POST,'Async')) {
//     // ...
// }