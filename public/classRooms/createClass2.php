<?php
require __DIR__ . '/../../src/bootstrap.php';
require __DIR__ . '/../../src/loggedin/classStep2.php';

// if (is_user_2fa() == 'false'){
//   redirect_to('login.php');
// }else{
// audit_trail('User has procedeed step2', 2);
// }
// if(!auth_Level('Instructor')){
//     redirect_to('../allowedNOT.php');
// }
$tableNAme ='unitofmeasurement';
$option_list2 = get_db_Options($tableNAme);
$Card_entries = get_ingredient_CARDS($_SESSION['post']['classID']);
echo $_SESSION['post']['classID'];
?>

<?php view('header', ['title' => 'Create Class']);
?>
<?php if (isset($errors['classRooms'])) : ?>
    <div class="alert alert-error">
        <?= $errors['classRooms'] ?>
    </div>
<?php endif ?>
<main id="mymain1">
  <div>
    <?php
    // var_dump($_SESSION['post']['classID']);
    // var_dump($Card_entries);
    if(!empty($Card_entries)){
      foreach($Card_entries as $options2)
      {
          echo '<div class="row">
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">'.$options2['IngredientName'].'</h5>
                <p class="card-text">Description: '.$options2['description'].', Unit of Measure: '.$options2['unitMID'].', Quanitity: '.
                $options2['amount'].', Price: '.$options2['price'].'
                </p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>';
      }
    }
    ?>
  </div>
<form action="createClass2.php" method="post">
  <div id = "ingredientContainer">

    <table class="table table-bordered" id="dynamic_field">
      <th><label >Ingredients Name</label></th>
      <th><label >Ingredients Description</label></th>
      <th><label >Unit of Measurement</label></th>
      <th><label >Ingredients Price</label></th>
      <th><label >Ingredients Quantity</label></th>
      <th><label >Controls</label></th>
      
      <tr>
        <td><input type="text" name="IngredientName[]" id="IngredientName[]"  placeholder="Ingredient Name" required/></td>
        <td><input type="text" name="description[]" id="description[]" placeholder="Description" required/></td>
        <td><select name="unitOfMeasure[]" id="unitOfMeasure[]" required>
            <?php 
            foreach($option_list2 as $options2)
            {
                echo '<option value="'.$options2['unitName '].'">'.$options2['unitName'].'</option>';
            }
            ?>
            </select>
        </td>
        <td><input  type="number" name="price[]" id="price[]" min="0.00" step="any" placeholder="price" required/></td>
        <td><input  type="number" name="quantity[]" id="quantity[]" value="1" min="1"/ placeholder="Quantity" required></td>
        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
      </tr>
    </table>
  </div>
  <button type="submit">Next</button>
</form>
</main>
<button onclick="history.back()">Back</button>


<script type = "text/javascript">
    $(document).ready(function(){
      var i=1;
      $('#add').click(function(){
        i++;
        $('#dynamic_field').append('<tr id="row'+i+'">'
        +'<td><input type="text" name="IngredientName[]" id="IngredientName[]"  placeholder="Ingredient Name" required/></td>'
        +'<td><input type="text" name="description[]" id="description[]" placeholder="Description" required/></td>'
        +'<td><select name="unitOfMeasure[]" id="unitOfMeasure[]" required>'
            + '<?php 
            foreach($option_list2 as $options2)
            {
                echo '<option value="'.$options2['unitName'].'">'.$options2['unitName'].'</option>';
            }
            ?>'
            +'</select></td>'
        +'<td><input  type="number" name="price[]" id="price[]" min="0.00" step="any" placeholder="price"required/></td>'
        +'<td><input  type="number" name="quantity[]" id="quantity[]" value="1" min="1"/ placeholder="Quantity" required></td>'
        +'<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td>'
        +'</tr>');
      });

    $(document).on('click', '.btn_remove', function(){
      var button_id = $(this).attr("id"); 
      $('#row'+button_id+'').remove();
    });
});
</script>  


<?php view('footer');

?>
