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
        <table class="table">
        <thead>
          <tr>
            <th scope="col">Chapter</th>
            <th scope="col">Module Name</th>
            <th scope="col">File</th>
            <th scope="col">controls</th>
          </tr>
        </thead>
              <tbody>
                <?php
                if(!isset($option_list['chapter'])){
                foreach($option_list as $options){
                    echo "<tr>";
                    echo '<td>'. $options['chapter'] .'</td>';
                    echo '<td>'. $options['moduleName'] .'</td>';
                    echo '<td>'. $options['fileName'] .'</td>';
                    echo '<td>';
                      echo '<button class="btn" onclick ="downloadFile('.$options['fileID'].')" ><i class="fa fa-trash"></i> Download</button>';
                      echo '<button class="btn" onclick ="deleteFile2('.$options['fileID'].')"><i class="fa fa-close"></i> Delete</button>';
                    echo '</tr>';
                  }
                }
                ?>
              </tbody>
        </table>
      <form action="createClass3.php" method="post" enctype="multipart/form-data">
      <label for="chapter">Chapter<div class="reqcolor">*</div></label>
      <small><?= $errors['chapter'] ?? '' ?></small>
      <input type="number" name="chapter" id="chapter" value="<?= $inputs['chapter'] ?? '' ?>" class="<?= error_class($errors, 'chapter') ?>">
      <label for="moduleName">Module Name<div class="reqcolor">*</div></label>
      <small><?= $errors['moduleName'] ?? '' ?></small>
      <input type="text" name="moduleName" id="moduleName" value="<?= $inputs['moduleName'] ?? '' ?>" class="<?= error_class($errors, 'moduleName') ?>">
      <input type="file" name="fileToUpload" id="fileToUpload" required>
      <button >Upload File</button>

      </form>
      <button name="Next" onclick="move2()">Next</button>
      <button data-bs-toggle="modal" onclick="SetID()" data-bs-target="#modalMilestone">Milestones</button>

      <div class="modal fade" id="modalMilestone" tabindex="-2" aria-labelledby="modalLavelFile" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLavelFile">Milestones</h5>
        <button type="button" class="btn-close" data-bs-dismiss="#modalMilestone" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <table class="table" name="filesT">
        <thead>
          <tr>
            <th scope="col">Milestone Name</th>
            <th scope="col">Description</th>
            <th scope="col">Get via</th>
            <th scope="col">controls</th>
          </tr>
        </thead>
              <tbody id= "filesT">
              </tbody>
      </table>
      <form action="" name="createStoneForm" method="post">
      <label for="milestoneName">Milestone Name<div class="reqcolor">*</div></label>
      <small><?= $errors['milestoneName'] ?? '' ?></small>
      <input type="text" name="milestoneName" id="milestoneName" value="<?= $inputs['milestoneName'] ?? 'The acolyte' ?>" class="<?= error_class($errors, 'milestoneName') ?>">
      <label for="milestonedesc">Milestone Description<div class="reqcolor">*</div></label>
      <small><?= $errors['milestonedesc'] ?? '' ?></small>
      <input type="text" name="milestonedesc" id="milestonedesc" value="<?= $inputs['milestonedesc'] ?? 'A Learner imbarking in a new lession' ?>" class="<?= error_class($errors, 'milestonedesc') ?>">
      <label for="milestoneTrigger">Milestone Trigger<div class="reqcolor">*</div></label>
      <select name="milestoneTrigger" id="milestoneTrigger"  class="<?= error_class($errors, 'milestoneTrigger') ?>"required>
            <option value=""></option>
            <?php 
            foreach($option_list2 as $options2)
            {
                echo '<option value="'.$options2['actionid'].'">'.$options2['actionType'].'</option>';
            }
            ?>
            </select>
      <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="Learners" disabled>
          <label class="form-check-label" for="flexCheckDisabled">
          Send Email to Enrolled Learners
          </label>
      </div>
      <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="Instructors">
          <label class="form-check-label" for="flexCheckDefault">
           Send Email to Instructors
          </label>
      </div>
      <button onclick="createmileStone()"  name="submit">Create Milestone</button>
      </form>
            <?php if (isset($errors['accountMGTFile'])) : ?>
            <div class="alert alert-error">
                <?= $errors['accountMGTFile']?>
            </div>
            <?php endif ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="#modalCreate">Close</button> 
        <button onclick="" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
      </div>
</main>
<script>
  function deleteFile2(id){
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
    error:function(err){
        // alert("error"+JSON.stringify(err));
        alert("error"+JSON.stringify(err));

    },
    });

}

function downloadFile(id){
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
          var blobf = new Blob([blob], {type: "application/zip"});
          var link = document.createElement('a');
          link.href = window.URL.createObjectURL(blobf);
          var fileName = myJSON['fileName'];
          link.download = fileName;
          link.click();
          alert('your file has downloaded!'); // or you know, something with better UX...
        })
        .catch(() => alert('oh no!'));



    },
    error:function(err){
        // alert("error"+JSON.stringify(err));
        alert("error");

    },
    });
  }

  function SetID(){

resetTable();
function resetTable(){
  document.getElementById("filesT").innerHTML = '';
}
                  function loadTableData(items) {


                    const table = document.getElementById("filesT");
                    for(var i = 0; i < items.length; i++) {
                      let row = table.insertRow();
                      let Filename = row.insertCell(0);
                      Filename.innerHTML = items[i]['milestoneName'];
                      let Classname = row.insertCell(1);
                      Classname.innerHTML = items[i]['description'];
                      let Owner = row.insertCell(2);
                      Owner.innerHTML = items[i]['Mtrigger'];
                      let Controls = row.insertCell(3);
                      Controls.innerHTML = "<button type='button' onclick=\"downloadFile(\'" + items[i]['fileID'] + "\')\" >Apply</button><br><button type='button' onclick=\"deleteFile(\'" + items[i]['fileID'] + "\')\" >Remove</button><br>";
                      // '<button class="btn" onclick ="downloadFile('.$options['fileID'].')" ><i class="fa fa-trash"></i> Download</button>';
                      // '<button class="btn" onclick ="deleteFile('.$options['fileID'].')"><i class="fa fa-close"></i> Delete</button>';
                    }
                  }
                  var tname = 'milestone';
                  var tcol = 'mileStoneID ';
                  var id = '2';
                  $.ajax({    
                  type: "POST",
                  url: "../../src/libs/tableFill.php",
                  data: {tableName: tname, tableCol: tcol , tableVal: id},
                  success: function(response){
                    console.log("respone->",response);
                    const myJSON = JSON.parse(response);
                    if(typeof myJSON[0]['mileStoneID'] !== 'undefined'){
                      loadTableData(myJSON);
                    }
                  },error:function(err){
        // alert("error"+JSON.stringify(err));
        alert("error");

    },
                      });
}

function createmileStone(){
    var link = '../../src/inc/ajaxModal.php';

    var data = $("form[name=createStoneForm]").serializeArray(); // convert form to array
    data.push({name: 'Option', value: 'createStone'});
    $.ajax({
    type: 'POST',
    url: link,
    data: data,
    success: function(data) {
        // const myJSON = JSON.parse(data);
        console.log('it workz', data);
        alert("Milestone Created");
        location.reload();
    },
    error:function(err){
        // alert("error"+JSON.stringify(err));
        alert("error");

    },
    });
}

function move2(){
  window.location.href="/createClass4.php";
}
</script>



<?php view('footer') ?>
