<?php
require __DIR__ . '/../../src/bootstrap.php';
require __DIR__ . '/../../src/loggedin/newStudent.php';

// if (is_user_2fa() == 'false'){
//   redirect_to('login.php');
// }else{
// audit_trail('User has started Class Creation', 2);
// }
// if(!auth_Level('Instructor')){
//     redirect_to('../allowedNOT.php');
// }
?>

<?php view('header', ['title' => 'Create Class']);
?>
<?php if (isset($errors['classRooms'])) : ?>
  <div class="alert alert-error">
    <?= $errors['classRooms'] ?>
  </div>
<?php endif ?>
<main id="mymain1">
    <form action="newStudent.php" method="POST">
    <input type="checkbox" name="Async" value="Async">Async<br>
    <input type="checkbox" name="Sync" value="Sync">Sync<br>
    <br>Insert Schedules<br>//explain 
              <div id="schedulesContainer">
              <div class="table-container table-container-ing" id="dynamic_field">
                <div class="table-row-container tbl-heading">
                  <div class="th-item tbl-item--1">Week Day</div>
                  <div class="th-item tbl-item--2">Date</div>
                  <div class="th-item tbl-item--3">start Time</div>
                  <div class="th-item tbl-item--4">End Time</div>
                  <div class="th-item tbl-item--5">Controls</div>
                </div>

                <div class="table-row-container">
                <div class="td-item tbl-item--1"><select name="Day[]" id="Day[]" required>
                <option value="Sun">Sun</option>
                <option value="Mon">Mon</option>
                <option value="Wed">Wed</option>
                <option value="Thurs">Thurs</option>
                <option value="Fri">Fri</option>
                <option value="Sat">Sat</option>
                    </select>
                  </div>
                  <div class="td-item tbl-item--2"><input type="date" name="startDate[]" id="startDate[]" type="date" value="" class=""required></div>
                  <div class="td-item tbl-item--3"><input type="time" name="startTime[]" id="startTime[]" type="time" value="" class=""required></div>
                  <div class="td-item tbl-item--4"><input type="time" name="endTime[]" id="endTime[]" type="time" value="" class=""required></div>
                  <div class="td-item tbl-item--5"><button type="button" name="add" id="add" class="btn btn-table btn-full" title="Add Row"><i class="bi bi-plus-lg"></i></button></div>
                </div>
              </div>
            </div>
    <label for="agree">
                                    <input type="checkbox" name="agree" id="agree" value="checked" <?= $inputs['agree'] ?? '' ?> /> I
                                    agree with the
                                    <a href="#" title="term of services">Term of Services</a>
                                    <div class="reqcolor">*</div>
                                </label>
    <button>Apply</button>
    </form>

</main>

<script type="text/javascript">
  $(document).ready(function() {
    var i = 1;
    $('#add').click(function() {
      i++;
      $('#dynamic_field').append('<div class="table-row-container" id="row' + i + '">' +
        '<div class="td-item tbl-item--1"><select name="Day[]" id="Day[]" required>' +
        '<option value="Sun">Sun</option>'+
        '<option value="Mon">Mon</option>'+
        '<option value="Wed">Wed</option>'+
        '<option value="Thurs">Thurs</option>'+
        '<option value="Fri">Fri</option>'+
        '<option value="Sat">Sat</option>'+
        '</select></div>' +
        '<div class="td-item tbl-item--2"><input type="date" name="startDate[]" id="startDate[]" type="date" value="" class=""required></div>' +
        '<div class="td-item tbl-item--3"><input type="date" name="startTime[]" id="startTime[]" type="date" value="" class=""required></div>' +
        '<div class="td-item tbl-item--4"><input type="date" name="endTime[]" id="endTime[]" type="date" value="" class=""required></div>' +
        '<div class="td-item tbl-item--5"><button type="button" name="remove" id="' + i + '" class="btn btn-table btn-table-red btn_remove" title="Delete Row"><i class="bi bi-x-lg"></i></button></div>' +
        '</div>');
    });

    $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
    });
  });
</script>
<?php view('footer') ?>