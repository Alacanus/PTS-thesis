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
$tableNAme = 'unitofmeasurement';
$option_list2 = get_db_Options($tableNAme);
if (isset($_SESSION['post']['classID'])) {
  $Card_entries = get_ingredient_CARDS($_SESSION['post']['classID']);
} else {
  redirect_to('emailmsg.php');
}
?>

<?php view('header', ['title' => 'Create Class']);
?>
<?php if (isset($errors['classRooms'])) : ?>
  <div class="overlay-new02" id="error-modal">
    <div class="error-container">
      <div class="edit-profile">
        <div class="error-close-btn">&times;</div>
        <i class="bi bi-exclamation-triangle"></i>
        <?= $errors['classRooms'] ?>
      </div>
    </div>
  </div>
  <script>
    var modalerror = document.getElementById("error-modal");
    modalerror.style.display = "block";

    var span = document.getElementsByClassName("error-close-btn")[0];
    span.onclick = function() {
      modalerror.style.display = "none";
    }
  </script>
<?php endif ?>
<div id="mymain1">
  <div class="overlaybg">
    <div class="ccr-step--02">
      <div class="ccr-container">
        <div class="container-edit-left">
          <div class="wrapper">
            <ul class="ccr-progbar">
              <li class="ccr-progbar-item is-done">
                <h3>Step 01</h3>
              </li>
              <li class="ccr-progbar-item current">
                <h3>Step 02</h3>
              </li>
              <li class="ccr-progbar-item">
                <h3>Step 03</h3>
              </li>
              <li class="ccr-progbar-item">
                <h3>Step 04</h3>
              </li>
              <li class="ccr-progbar-item">
                <h3>Step 05</h3>
              </li>
              <li class="ccr-progbar-item">
                <h3>Summary</h3>
              </li>
            </ul>
          </div>
        </div>
        <div class="container-edit">
          <h2>Create Class</h2>
          <form action="createClass2.php" method="post">
            <div id="ingredientContainer">
              <div class="table-container table-container-ing" id="dynamic_field">
                <div class="table-row-container tbl-heading">
                  <div class="th-item tbl-item--2">Name</div>
                  <div class="th-item tbl-item--3">Description</div>
                  <div class="th-item tbl-item--2">Unit of Measurement</div>
                  <div class="th-item tbl-item--7">Price</div>
                  <div class="th-item tbl-item--8">Quantity</div>
                  <div class="th-item tbl-item--8">Controls</div>
                </div>

                <div class="table-row-container">
                  <div class="td-item tbl-item--2"><input type="text" name="IngredientName[]" id="IngredientName[]" placeholder="Name" required /></div>
                  <div class="td-item tbl-item--3"><input type="text" name="description[]" id="description[]" placeholder="Description" required /></div>
                  <div class="td-item tbl-item--2"><select name="unitOfMeasure[]" id="unitOfMeasure[]" required>
                      <?php
                      foreach ($option_list2 as $options2) {
                        echo '<option value="' . $options2['unitName '] . '">' . $options2['unitName'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                  <div class="td-item tbl-item--7"><input type="number" name="price[]" id="price[]" min="0.00" step="any" placeholder="price" required /></div>
                  <div class="td-item tbl-item--8"><input type="number" name="quantity[]" id="quantity[]" value="1" min="1" placeholder="Quantity" required /></div>
                  <div class="td-item tbl-item--8"><button type="button" name="add" id="add" class="btn btn-table btn-full" title="Add Row"><i class="bi bi-plus-lg"></i></button></div>
                </div>
              </div>
            </div>
            <div class="form-element-btn">
              <button class="btn btn-nav btn-table-grn" type="submit" title="Upload Pckage" id="btn-next"><i class="bi bi-upload"></i> Upload</button>
            </div>
          </form>
          <div class="outside-btn">
            <button type="button" class="btn btn-table btn-table-mb" onclick="back(<?= $_SESSION['post']['classID'] ?>)" title="Previous"><i class="bi bi-arrow-left-circle"></i></button>
            <button type="button" class="btn btn-table btn-full" onclick="next(<?= $_SESSION['post']['classID'] ?>)" title="Next"><i class="bi bi-arrow-right-circle"></i></button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="overlaybg">
    <div class="ccr-section-02">
      <h2 id="h2-title">View Created Packages</h2>
      <div class="grid-container">
        <?php
        // var_dump($_SESSION['post']['classID']);
        // var_dump($Card_entries);
        if (!empty($Card_entries)) {
          foreach ($Card_entries as $options2) {
            echo '<div class="card">
                      <div class="card-body">
                        <div class="card-title">
                          <h2>' . $options2['IngredientName'] . '</h2>
                        </div>  
                        <div class="card-description">
                          <p>
                            Description: ' . $options2['description'] . '
                          </p>
                          <p>
                            Unit of Measure: ' . $options2['unitMID'] . '
                          </p>
                           <p>
                            Quanitity: ' . $options2['amount'] . '
                          </p>
                          <p>
                            Price: ' . $options2['price'] . '
                          </p>
                        </div>
                      </div>
                      <div class="card-footer">
                        <a href="#">
                          <button class="btn btn-nav btn-full">
                            <i class="bi bi-penicl"></i> Edit
                          </button> 
                        </a>
                      </div>
                    </div>';
          }
        }
        ?>
      </div>
    </div>
  </div>
</div>
</main>

<script type="text/javascript">
  $(document).ready(function() {
    var i = 1;
    $('#add').click(function() {
      i++;
      $('#dynamic_field').append('<div class="table-row-container" id="row' + i + '">' +
        '<div class="td-item tbl-item--2"><input type="text" name="IngredientName[]" id="IngredientName[]"  placeholder="Ingredient Name" required/></div>' +
        '<div class="td-item tbl-item--3"><input type="text" name="description[]" id="description[]" placeholder="Description" required/></div>' +
        '<div class="td-item tbl-item--2"><select name="unitOfMeasure[]" id="unitOfMeasure[]" required>' +
        '<?php
          foreach ($option_list2 as $options2) {
            echo '<option value="' . $options2['unitName'] . '">' . $options2['unitName'] . '</option>';
          }
          ?>' +
        '</select></div>' +
        '<div class="td-item tbl-item--7"><input type="number" name="price[]" id="price[]" min="0.00" step="any" placeholder="price"required/></div>' +
        '<div class="td-item tbl-item--8"><input type="number" name="quantity[]" id="quantity[]" value="1" min="1"/ placeholder="Quantity" required></div>' +
        '<div class="td-item tbl-item--8"><button type="button" name="remove" id="' + i + '" class="btn btn-table btn-table-red btn_remove" title="Delete Row"><i class="bi bi-x-lg"></i></button></div>' +
        '</div>');
    });

    $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
    });
  });
</script>
<script>
  function back(classID) {
    $.ajax({
      url: '../../src/redirectDir.php?editClass=1&classID=' + classID + '&step=1',
      type: 'POST',
      success: function(response) {
        window.location.href = response;
      },
      error: function(err) {
        alert("There was some error performing the AJAX call!");

      },
    });
  }

  function next(classID) {
    $.ajax({
      url: '../../src/redirectDir.php?editClass=1&classID=' + classID + '&step=3',
      type: 'POST',
      success: function(response) {
        window.location.href = response;
      },
      error: function(err) {
        alert("There was some error performing the AJAX call!");

      },
    });
  }
</script>

<?php view('footer');

?>