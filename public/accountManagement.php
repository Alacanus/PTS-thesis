<?php
require __DIR__ . '/../src/bootstrap.php';
if (is_user_2fa() == 'false'){
  redirect_to('login.php');
}else{
  audit_trail('User has visited AccountManagement', 2);
  }
if(!auth_Level('Admin')){
    redirect_to('allowedNOT.php');
}
require __DIR__ . '/../src/loggedin/accountManagement.php';

view('header', ['title' => 'Account Manage']) ?>
<?php if (isset($errors['accountMGT'])) : ?>
    <div class="alert alert-error">
        <?= $errors['accountMGT']?>
    </div>
<?php endif ?>


<div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">username</th>
      <th scope="col">email</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Role</th>
    </tr>
  </thead>
  <tbody>
    <?php 
                    if(is_array($option_list)){
            foreach($option_list as $options)
            { 
                echo "<tr>";
                echo '<th scope="row">'.$options['userID'].'</th>';
                echo '<td>'. $options['username'] .'</td>';
                echo '<td>'. $options['email'] .'</td>';
                echo '<td>'. $options['firstname'] .'</td>';
                echo '<td>'. $options['lastName'] .'</td>';
                echo '<td>'. convert_roleID2Type($options['roleID'])  .'</td>';
                echo '<td>';
                  echo '<button class="btn" src="../static/select.png"><i class="fa fa-bars"></i> View</button>';
                  echo '<button class="btn" data-bs-toggle="modal" data-bs-target="#modal" onclick ="UpdateStatus('.$options['userID'].')" src="../static/delete-user.png"><i class="fa fa-trash"></i> Update User</button>';
                  echo '<button class="btn" onclick ="deleteUser('.$options['userID'].')" src="../static/editing.png"><i class="fa fa-close"></i> Delete</button>';
                  echo '<button class="btn" data-bs-toggle="modal" data-bs-target="#modalFile" onclick = SetID('.$options['userID'].')><i class="fa fa-folder"></i> Folder</button></td>';
                echo '</tr>';
            }
          }
        ?>
  </tbody>
</table>
<button data-bs-toggle="modal" data-bs-target="#modalCreate">Create User</button>
</div>

<!-- Modal -->

<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabelView" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabelView">Make changes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form id="form" action="accountManagement.php" method="post">
            <label for="usertype">User Type:</label>
            <select name="usertype" id="usertype"  class="<?= error_class($errors, 'usertype') ?>"required>
            <option value=""></option>
            <?php
            if(is_array($option_list2)){
            foreach($option_list2 as $options2)
              {
                  echo '<option value="'.$options2[$optionVal2].'">'.$options2[$optionName2].'</option>';
              }
            }
            ?>
            </select>
            <small><?= $errors['usertype'] ?? '' ?></small><br>
            <input hidden name="user_id" id="user_id" value ="">
            username<input type="text" name="username" id="username" value=""
            class="<?= error_class($errors, 'username') ?>">
            <small><?= $errors['username'] ?? '' ?></small><br>
            email<input type="email" name="email" id="email" value=""
            class="<?= error_class($errors, 'email') ?>">
            <small><?= $errors['email'] ?? '' ?></small><br>
            fname<input type="text" name="firstname" id="firstname" value=""
            class="<?= error_class($errors, 'firstname') ?>">
            <small><?= $errors['firstname'] ?? '' ?></small><br>
            lname<input type="text" name="lastName" id="lastName" value=""
            class="<?= error_class($errors, 'lastName') ?>">
            <small><?= $errors['lastName'] ?? '' ?></small><br>
            gender<input type="text" name="gender" id="gender" value=""
            class="<?= error_class($errors, 'gender') ?>">
            <small><?= $errors['gender'] ?? '' ?></small><br>
            age<input type="text" name="age" id="age" value=""
            class="<?= error_class($errors, 'age') ?>">
            <small><?= $errors['age'] ?? '' ?></small><br>
            <label for="birthday">birthday</label>
            <input type="date" name="birthday" id="birthday"type="date" value=""
            class="<?= error_class($errors, 'birthday') ?>">
            <small><?= $errors['birthday'] ?? '' ?></small><br>
            address<input type="text" name="address" id="address" value=""
            class="<?= error_class($errors, 'address') ?>">
            <small><?= $errors['address'] ?? '' ?></small><br>
            contactno<input type="text" name="contactno" id="contactno" value=""
            class="<?= error_class($errors, 'contactno') ?>">
            <small><?= $errors['contactno'] ?? '' ?></small><br>
            aboutme<input type="text" name="aboutme" id="aboutme" value=""
            class="<?= error_class($errors, 'aboutme') ?>">
            <small><?= $errors['aboutme'] ?? '' ?></small><br>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> 
        <button type="submit" form="form" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- from boostrap.com/modal-->
<div class="modal fade" id="modalCreate" tabindex="-2" aria-labelledby="modalLavelCreate" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLavelCreate">Create User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="#modalCreate" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form id="form" name="createForm" method="post">
            <label for="usertype">User Type:</label>
            <select name="usertype" id="usertype"  class="<?= error_class($errors, 'usertype') ?>"required>
            <option value=""></option>
            <?php 
            foreach($option_list2 as $options2)
            {
                echo '<option value="'.$options2[$optionVal2].'">'.$options2[$optionName2].'</option>';
            }
            ?>
            </select>
            username<input type="text" name="username" id="username" value=""><br>
            email<input type="email" name="email" id="email" value=""><br>
            fname<input type="text" name="firstname" id="firstname" value=""><br>
            lname<input type="text" name="lastName" id="lastName" value=""><br>
            password<input type="text" name="password" id="password" value=""><br>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="#modalCreate">Close</button> 
        <button onclick="createUser()" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalFile" tabindex="-2" aria-labelledby="modalLavelFile" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLavelFile">User Files</h5>
        <button type="button" class="btn-close" data-bs-dismiss="#modalCreate" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <table class="table" name="filesT">
        <thead>
          <tr>
            <th scope="col">File name</th>
            <th scope="col">Path</th>
            <th scope="col">owner</th>
            <th scope="col">controls</th>
          </tr>
        </thead>
              <tbody id= "filesT">
                <?php
                // if(is_array($option_list3)){
                // foreach($option_list3 as $options){
                //     echo "<tr>";
                //     echo '<td>'. $options['fileName'] .'</td>';
                //     echo '<td>'. $options['filePath'] .'</td>';
                //     echo '<td>'. $options['userID'] .'</td>';
                //     echo '<td>';
                //       echo '<button class="btn" onclick ="downloadFile('.$options['fileID'].')" ><i class="fa fa-trash"></i> Download</button>';
                //       echo '<button class="btn" onclick ="deleteFile('.$options['fileID'].')"><i class="fa fa-close"></i> Delete</button>';
                //     echo '</tr>';
                //   }
                // }
                ?>
              </tbody>
      </table>
      <form action="../src/upload.php" method="post" enctype="multipart/form-data">
      Select image to upload:
      <input type="hidden" name="user_idfile" id="user_idfile" value ="">
      <input type="file" name="fileToUpload" id="fileToUpload" required>
      <button type="submit"  name="submit">Upload File</button>
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


<!--  scripts  -->

<script>
  $('#modalFile').on('hidden.bs.modal', function (e) {
  $(this)
    .find("input,textarea,select")
       .val('')
       .end()
    .find("input[type=checkbox], input[type=radio]")
       .prop("checked", "")
       .end();
})

function SetID(id){
  var temp = id;
  // console.log("this->",temp);
  document.getElementById("user_idfile").value = temp;
//   $.post('../src/loggedin/accountManagement.php', { user_idfile: id }, function(result) { 
//    alert(result); 
// });
resetTable();
function resetTable(){
  document.getElementById("filesT").innerHTML = '';
}
                  function loadTableData(items) {


                    const table = document.getElementById("filesT");
                    for(var i = 0; i < items.length; i++) {
                      let row = table.insertRow();
                      let Filename = row.insertCell(0);
                      Filename.innerHTML = items[i]['fileName'];
                      let Classname = row.insertCell(1);
                      Classname.innerHTML = items[i]['filePath'];
                      let Owner = row.insertCell(2);
                      Owner.innerHTML = items[i]['userID'];
                      let Controls = row.insertCell(3);
                      Controls.innerHTML = "<button type='button' onclick=\"downloadFile(\'" + items[i]['fileID'] + "\')\" >Download</button><br><button type='button' onclick=\"deleteFile(\'" + items[i]['fileID'] + "\')\" >Delete</button><br>";
                      // '<button class="btn" onclick ="downloadFile('.$options['fileID'].')" ><i class="fa fa-trash"></i> Download</button>';
                      // '<button class="btn" onclick ="deleteFile('.$options['fileID'].')"><i class="fa fa-close"></i> Delete</button>';
                    }
                  }
                  var tname = 'debugfiles';
                  var tcol = 'userID';
                  var id = temp;
                  $.ajax({    
                  type: "POST",
                  url: "../src/libs/tableFill.php",
                  data: {tableName: tname, tableCol: tcol, tableVal: id},
                  success: function(response){
                    const myJSON = JSON.parse(response);
                    // console.log("respone->",response);
                    if(typeof myJSON[0]['fileName'] !== 'undefined'){
                      loadTableData(myJSON);
                    }
                  }
                      });
}

function UpdateStatus(id)
    {
        var Option = 'get';
        var link = '../src/inc/ajaxModal.php?userID=';
        var newlink = link + id + '&modalOption=' + Option;
        $.ajax({
        type: 'GET',
        url: newlink,
        success: function(data) {
          // console.log(data);
            const myJSON = JSON.parse(data);
            var select = document.querySelector('#usertype');
            select.options[select.selectedIndex].value = myJSON[0]['roleID'];
            select.options[select.selectedIndex].text = myJSON[0]['roleType'];
            document.getElementById("user_id").value = myJSON[0]['userID'];
            document.getElementById("username").value = myJSON[0]['username'];
            document.getElementById("email").value = myJSON[0]['email'];
            document.getElementById("firstname").value = myJSON[0]['firstname'];
            document.getElementById("lastName").value = myJSON[0]['lastName'];
            document.getElementById("gender").value = myJSON[0]['gender'];
            document.getElementById("age").value = myJSON[0]['age'];
            document.getElementById("birthday").value = myJSON[0]['birthday'];
            document.getElementById("address").value = myJSON[0]['address'];
            document.getElementById("contactno").value = myJSON[0]['contactno'];
            document.getElementById("aboutme").value = myJSON[0]['aboutme'];
            //convert to forloop to build modal body

        },
        error:function(err){
            alert("error");

        },
    });

        
    }
function deleteUser(id){
    var Option = 'delete';
    var link = '../src/inc/ajaxModal.php?userID=';
    var newlink = link + id + '&modalOption=' + Option;
    $.ajax({
    type: 'GET',
    url: newlink,
    success: function(data) {
        // const myJSON = JSON.parse(data);
        alert("User Deleted");
        location.reload();
    },
    error:function(err){
        // alert("error"+JSON.stringify(err));
        alert("error");

    },
    });

}
function deleteFile(id){
    var Option = 'delete2';
    var link = '../src/inc/ajaxModal.php?userID=';
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

function createUser(){
    var link = '../src/inc/ajaxModal.php';

    var data = $("form[name=createForm]").serializeArray(); // convert form to array
    data.push({name: 'Option', value: 'Create'});
    $.ajax({
    type: 'POST',
    url: link,
    data: data,
    success: function(data) {
        // const myJSON = JSON.parse(data);
        console.log('it workz', data);
        alert("User Created");
        location.reload();
    },
    error:function(err){
        // alert("error"+JSON.stringify(err));
        alert("error");

    },
    });
}

function downloadFile(id){
  var Option = 'download';
    var link = '../src/inc/ajaxModal.php?fileID=';
    var newlink = link + id + '&modalOption=' + Option;


    $.ajax({
    type: 'GET',
    url: newlink,
    success: function(data) {
      const myJSON = JSON.parse(data);
        // console.log('it workz', myJSON['fileName']);
        var Option = 'download2';
        var link = '../src/inc/ajaxModal.php?fileID=';
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
</script>