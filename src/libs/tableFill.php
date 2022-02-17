<?php
require __DIR__ . '/../bootstrap.php';
$return_arr = array(0);
 if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST'){
    $tableName = $_POST['tableName'];
    $tableCol = $_POST['tableCol'];
    $tableVal = $_POST['tableVal'];
    $sql = "SELECT * FROM `$tableName` WHERE $tableCol = $tableVal";
    $statement = db()->prepare($sql);
    $statement->execute();
    while($data=  $statement->fetchAll(PDO::FETCH_ASSOC)) {
        $option_list = $data;
       //$option_list.="<option value='$data[$optionVal]'>$data[$optionName]</option>";
    }
    $count = $statement->rowCount();
    if($count <= 0){
       echo json_encode($return_arr);
    }else{
       echo json_encode($option_list);
    }

 }else{
   $tableName = $_GET['tableName'];
   $tableCol = $_GET['tableCol'];
   $tableVal = $_GET['tableVal'];
   $sql = "SELECT * FROM `$tableName`";
   $statement = db()->prepare($sql);
   $statement->execute();
   while($data=  $statement->fetchAll(PDO::FETCH_ASSOC)) {
       $option_list = $data;
      //$option_list.="<option value='$data[$optionVal]'>$data[$optionName]</option>";
   }
   $count = $statement->rowCount();
   if($count <= 0){
      echo json_encode($return_arr);
   }else{
      echo json_encode($option_list);
   }
 }
