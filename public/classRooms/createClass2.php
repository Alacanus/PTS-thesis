<?php
require __DIR__ . '/../../src/bootstrap.php';
require __DIR__ . '/../../src/loggedin/classStep2.php';

if (is_user_2fa() == 'false'){
  redirect_to('login.php');
}else{
audit_trail('User has procedeed step2', 2);
}
if(!auth_Level('Instructor')){
    redirect_to('../allowedNOT.php');
}
?>

<?php view('header', ['title' => 'Create Class']);
?>
<?php if (isset($errors['errors'])) : ?>
    <div class="alert alert-error">
        <?= $errors['errors'] ?>
    </div>
<?php endif ?>
<main id="mymain1">
<?php
traverseArray($_SESSION);
// print_r($_POST);

  ?>
<button id="addIngredient">Add Ingredient</button>
<form action="createClass2.php" method="post">
  <div id = "ingredientContainer">
    <label for="ingredients[]">Ingredients and Discription<div class="reqcolor">*</div></label>
    <small><?= $errors['ingredients[]'] ?? '' ?></small>
    <input type="text" name="ingredients[]" id="ingredients[]" class="<?= error_class($errors, 'ingredients[]') ?>" required = "required"/>
    <label for="price[]">Price<div class="reqcolor">*</div></label>
    <small><?= $errors['price[]'] ?? '' ?></small>
    <input  type="number" name="price[]" id="price[]" min="0.00" class="<?= error_class($errors, 'price[]') ?>" step="any" required = "required"/>
    <label for="amount[]">amount<div class="reqcolor">*</div></label>
    <small><?= $errors['amount[]'] ?? '' ?></small>
    <input  type="number" name="amount[]" id="amount[]" value="1" min="1" class="<?= error_class($errors, 'amount[]') ?>" required = "required"/>
  </div>
  <button>Reset</button>
  <button type=="submit">Next</button>
</form>
</main>
<script type = "text/javascript">
  var count = 0;
    $(document).ready(function(){
        $('#addIngredient').click(function(){
                $input = $('<div class = "form-group">'
                + '<label for="ingredients[]">Ingredients and Discription<div class="reqcolor">*</div></label>'
                + '<input type="text" name="ingredients[]" id="ingredients[]" class="<?= error_class($errors, 'ingredients[]') ?>" required = "required"/>'
                + '</div>'
                + '<div class = "form-group">'
                + '<label for="price[]">price<div class="reqcolor">*</div></label>'
                + '<input  type="number" name="price[]" id="price[]" min="0.00" class="<?= error_class($errors, 'price[]') ?>" step="any" required = "required"/>'
                +'<label for="amount[]">amount<div class="reqcolor">*</div></label>'
                +'<input  type="number" name="amount[]" id="amount[]" value="1" min="1" class="<?= error_class($errors, 'amount[]') ?>" required = "required"/>'
                + '</div>');
                $input.fadeIn(1000).appendTo('#ingredientContainer');
        });
    });
</script>  


<?php view('footer') ?>
