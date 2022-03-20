<?php
require __DIR__ . '/../../src/bootstrap.php';
require __DIR__ . '/../../src/loggedin/classStep3.php';

// if (is_user_2fa() == 'false'){
//   redirect_to('login.php');
// }else{
// audit_trail('User has procedeed step 3', 2);
// }
// if(!auth_Level('Instructor')){
//     redirect_to('../allowedNOT.php');
// }
?>
<?php
// echo '<pre>classID' , var_dump($_SESSION['post']['tempClassid']) , '</pre>';
?>
<?php view('header', ['title' => 'Create Class']);
?>
<?php if (isset($errors['classRooms'])) : ?>
  <div class="alert alert-error">
    <?= $errors['classRooms'] ?>
  </div>
<?php endif ?>
<?php

?>
<main id="mymain1">
  <div class="overlaybg">
    <div class="ccr-step--03">
      <div class="ccr-container">
        <div class="container-edit-left">
          <div class="wrapper">
            <ul class="ccr-progbar">
              <li class="ccr-progbar-item is-done">
                <h3>Step 01</h3>
              </li>
              <li class="ccr-progbar-item is-done">
                <h3>Step 02</h3>
              </li>
              <li class="ccr-progbar-item current">
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
        <div class="container-edit form-style">
          <h2>Create Class</h2>
          <form action="createClass3.php" method="post" enctype="multipart/form-data">
            <div class="form-element">
              <label for="chapter">Chapter<div class="reqcolor">*</div></label>
              <input type="number" name="chapter" id="chapter" value="<?= $inputs['chapter'] ?? '' ?>" class="<?= error_class($errors, 'chapter') ?>">
              <small><?= $errors['chapter'] ?? '' ?></small>
            </div>
            <div class="form-element">
              <label for="moduleName">Module Name<div class="reqcolor">*</div></label>
              <input type="text" name="moduleName" id="moduleName" value="<?= $inputs['moduleName'] ?? '' ?>" class="<?= error_class($errors, 'moduleName') ?>">
              <small><?= $errors['moduleName'] ?? '' ?></small>
            </div>
            <div class="form-element">
              <label for="file">Choose File to Upload<div class="reqcolor">*</div></label>
              <input type="file" name="fileToUpload" id="fileToUpload" required>
            </div>
            <div class="form-element">
              <button class="btn btn-nav btn-ghost2"><i class="bi bi-upload"></i> Upload File</button>
            </div>
          </form>
          <div class="btn-right">
            <!-- id="show-modal" -->
            <button class="btn btn-nav btn-table-grn" onclick="SetID()"><i class="bi bi-plus-lg"></i> Milestones</button>
            <button class="btn btn-nav btn-table-mb" onclick="back(<?= $_SESSION['post']['classID']?>)"><i class="bi bi-arrow-left-circle"></i></button>
            <a href="createClass4.php"><i class="bi bi-arrow-right-circle"></i><input class="btn btn-nav btn-full" type="submit" value="Next" /></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="overlaybg">
    <div class="cc-section--02">
      <h2 id="cc-step03">Created View Modules</h2>
      <div class="table-container">
        <div class="table-row-container tbl-heading">
          <div class="th-item tbl-item--1">Chapter</div>
          <div class="th-item tbl-item--2">Module Name</div>
          <div class="th-item tbl-item--2">File</div>
          <div class="th-item tbl-item--1">Action</div>
        </div>
        <?php
        if (is_array($option_list)) {
          foreach ($option_list as $options) {
            echo '<div class="table-row-container">';
            echo '<div class="td-item tbl-item--1">' . $options['chapter'] . '</div>';
            echo '<div class="td-item tbl-item--2">' . $options['moduleName'] . '</div>';
            echo '<div class="td-item tbl-item--2">' . $options['fileName'] . '</div>';
            echo '<div class="td-item tbl-item--1">';
            echo '<button class="btn btn-table btn-full" onclick ="downloadFile(' . $options['fileID'] . ')" ><i class="bi bi-download"></i></button>';
            echo '<button class="btn btn-table btn-table-red" onclick ="deleteFile2(' . $options['fileID'] . ')"><i class="bi bi-trash"></i></button>';
            echo '</div>';
            echo '</div>';
          }
        }
        ?>
      </div>
    </div>
  </div>

  <div class="cc-modal--01">
    <div id="edit-modal" class="overlay-new">
      <div class="edit-profile">
        <h2>Milestones</h2>
        <div class="container-edit">
          <div class="form-style">
            <div class="close-btn">&times;</div>
            <form action="" name="createStoneForm" method="post">
              <div class="form-element">
                <label for="milestoneName">Milestone Name<div class="reqcolor">*</div></label>
                <input type="text" name="milestoneName" id="milestoneName" value="<?= $inputs['milestoneName'] ?? '' ?>" class="<?= error_class($errors, 'milestoneName') ?>">
                <small><?= $errors['milestoneName'] ?? '' ?></small>
              </div>
              <div class="form-element">
                <label for="milestonedesc">Milestone Description<div class="reqcolor">*</div></label>
                <textarea name="milestonedesc" id="milestonedesc" class="<?= error_class($errors, 'milestonedesc') ?>"><?= $inputs['milestonedesc'] ?? '' ?></textarea>
                <small><?= $errors['milestonedesc'] ?? '' ?></small>
              </div>
              <div class="form-element">
                <label for="milestoneTrigger">Milestone Trigger<div class="reqcolor">*</div></label>
                <select name="milestoneTrigger" id="milestoneTrigger" class="<?= error_class($errors, 'milestoneTrigger') ?>" required>
                  <option value=""></option>
                  <?php
                  foreach ($option_list2 as $options2) {
                    echo '<option value="' . $options2['actionID'] . '">' . $options2['actionType'] . '</option>';
                  }
                  ?>
                </select>
              </div>
              <div class="form-element">
                <input class="form-check-input" type="checkbox" value="" id="Learners" disabled>
                <label class="form-check-label" for="flexCheckDisabled">
                  Send Email to Enrolled Learners
                </label>
              </div>
              <div class="form-element">
                <input class="form-check-input" type="checkbox" value="" id="Instructors">
                <label class="form-check-label" for="flexCheckDefault">
                  Send Email to Instructors
                </label>
              </div>
              <div class="form-element">
                <button class="btn btn-nav btn-full" onclick="createmileStone()" name="submit"><i class="bi bi-plus-lg"></i> Create Milestone</button>
              </div>
            </form>
          </div>
        </div>
        <table class="table-container table-container-stones" name="filesT">
          <thead class="tbl-heading">
            <tr class="table-row-container">
              <th class="th-item tbl-item--3">Milestone Name</th>
              <th class="th-item tbl-item--3">Description</th>
              <th class="th-item tbl-item--1">Get via</th>
              <th class="th-item tbl-item--5">controls</th>
            </tr>
          </thead>
          <tbody id="filesT">
          </tbody>
        </table>
        <!-- Modal Save Changes -->
        <div class="btn-style">
          <button onclick="" class="btn btn-nav btn-table-grn">Save changes</button>
          <button type="button" class="btn btn-nav btn-table-red">Close</button>
        </div>
      </div>
    </div>
  </div>
  </div>
</main>
<script>
  function deleteFile2(id) {
    var Option = 'delete2f';
    var link = '../../src/inc/ajaxModal.php?userID=';
    var newlink = link + id + '&modalOption=' + Option;
    $.ajax({
      type: 'GET',
      url: newlink,
      success: function(data) {
        console.log(data);
        // const myJSON = JSON.parse(data);
        alert("File Deleted", data);
        location.reload();
      },
      error: function(err) {
        // alert("error"+JSON.stringify(err));
        alert("error" + JSON.stringify(err));

      },
    });

  }

  function RemoveStone(id) {
    var Option = 'RemoveStone';
    var link = '../../src/inc/ajaxModal.php?userID=';
    var newlink = link + id + '&modalOption=' + Option;
    $.ajax({
      type: 'GET',
      url: newlink,
      success: function(data) {
        console.log(data);
        // const myJSON = JSON.parse(data);
        alert("File Deleted", data);
        location.reload();
      },
      error: function(err) {
        // alert("error"+JSON.stringify(err));
        alert("error" + JSON.stringify(err));

      },
    });

  }

  function downloadFile(id) {
    var Option = 'download';
    var link = '../../src/inc/ajaxModal.php?fileID=';
    var newlink = link + id + '&modalOption=' + Option;


    $.ajax({
      type: 'GET',
      url: newlink,
      success: function(data) {
        const myJSON = JSON.parse(data);
        console.log('it workz', myJSON['fileName']);
        var Option = 'download2';
        var link = '../../src/inc/ajaxModal.php?fileID=';
        var newlink = link + id + '&modalOption=' + Option;
        fetch(newlink)
          .then(resp => resp.blob())
          .then(blob => {
            var blobf = new Blob([blob], {
              type: "application/zip"
            });
            var link = document.createElement('a');
            link.href = window.URL.createObjectURL(blobf);
            var fileName = myJSON['fileName'];
            link.download = fileName;
            link.click();
            alert('your file has downloaded!'); // or you know, something with better UX...
          })
          .catch(() => alert('oh no!'));



      },
      error: function(err) {
        // alert("error"+JSON.stringify(err));
        alert("error");

      },
    });
  }

  function SetID() {
    modal.style.display = "block";
    resetTable();

    function resetTable() {
      document.getElementById("filesT").innerHTML = '';
    }

    function loadTableData(items) {

      const table = document.getElementById("filesT");
      for (var i = 0; i < items.length; i++) {
        let row = table.insertRow();
        let Filename = row.insertCell(0);
        Filename.innerHTML = items[i]['milestoneName'];
        let Classname = row.insertCell(1);
        Classname.innerHTML = items[i]['description'];
        let Owner = row.insertCell(2);
        Owner.innerHTML = items[i]['Mtrigger'];
        let Controls = row.insertCell(3);
        Controls.innerHTML = "<button title='Edit Milestone' type='button' class='btn-table btn-table-mb' onclick=\"appymileStone(\'" + items[i]['mileStoneID'] + "\')\" ><i class='bi bi-pencil'></i></button><br><button title='Delete Milestone' type='button' class='btn-table btn-table-red' onclick=\"RemoveStone(\'" + items[i]['mileStoneID'] + "\')\" ><i class='bi bi-trash'></i></button>";
        // '<button class="btn" onclick ="downloadFile('.$options['fileID'].')" ><i class="fa fa-trash"></i> Download</button>';
        // '<button class="btn" onclick ="deleteFile('.$options['fileID'].')"><i class="fa fa-close"></i> Delete</button>';
      }
    }
    var tname = 'milestone';
    var tcol = null;
    var id = null;
    $.ajax({
      type: "GET",
      url: "../../src/libs/tableFill.php",
      data: {
        tableName: tname,
        tableCol: tcol,
        tableVal: id
      },
      success: function(response) {
        // console.log("respone->",response);
        const myJSON = JSON.parse(response);
        if (typeof myJSON[0]['mileStoneID'] !== 'undefined') {
          loadTableData(myJSON);
        }
      },
      error: function(err) {
        // alert("error"+JSON.stringify(err));
        alert("error");

      },
    });
  }

  function createmileStone() {
    var link = '../../src/inc/ajaxModal.php';

    var data = $("form[name=createStoneForm]").serializeArray(); // convert form to array
    data.push({
      name: 'Option',
      value: 'createStone'
    });
    console.log('it workz', data)
    $.ajax({
      type: 'POST',
      url: link,
      data: data,
      success: function(data) {
        // const myJSON = JSON.parse(data);
        // console.log('it workz', data);
        alert("Milestone Created");
        location.reload();
      },
      error: function(err) {
        // alert("error"+JSON.stringify(err));
        alert("error");

      },
    });
  }

  function move2() {
    window.location.href = "createClass4.php";
  }

  function appymileStone(id) {
    var link = '../../src/inc/ajaxModal.php';

    var data = $("form[name=createStoneForm]").serializeArray(); // convert form to array
    data.push({
      name: 'Option',
      value: 'applyStone'
    });
    data.push({
      name: 'id',
      value: id
    });

    // $.ajax({
    // type: 'POST',
    // url: link,
    // data: data,
    // success: function(data) {
    //     // const myJSON = JSON.parse(data);
    //     console.log('it workz', data);
    //     alert("Milestone Created");
    //     location.reload();
    // },
    // error:function(err){
    //     // alert("error"+JSON.stringify(err));
    //     alert("error");

    // },
    // });
    alert('not working yet');
  }

  // Show Modal Functions
  var modal = document.getElementById("edit-modal");
  var span = document.getElementsByClassName("close-btn")[0];

  span.onclick = function() {
    modal.style.display = "none";
  }

  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
  function back(classID){
    $.ajax({
        url: '../../src/redirectDir.php?editClass=1&classID='+classID+'&step=2',
        type: 'POST',
        success: function(response) {
            window.location.href = response;
        },
        error: function(err) {
            alert("There was some error performing the AJAX call!");

        },
        });
        }
    function next(classID){
    $.ajax({
        url: '../../src/redirectDir.php?editClass=1&classID='+classID+'&step=4',
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



<?php view('footer') ?>