<?php
require __DIR__ . '/../src/bootstrap.php';
if (is_user_2fa() == 'false') {
  redirect_to('login.php');
} else {
  audit_trail('User has visited AccountManagement', 2);
}
if (!auth_Level('Admin')) {
  redirect_to('allowedNOT.php');
}
require __DIR__ . '/../src/loggedin/accountManagement.php';

view('header', ['title' => 'Account Manage']) ?>
<?php if (isset($errors['accountMGT'])) : ?>
  <div class="alert alert-error">
    <?= $errors['accountMGT'] ?>
  </div>
<?php endif ?>
<div class="overlaybg">
  <div class="am-container">
    <div>
      <h2>Account Management</h2>
    </div>
    <div class="search-container">
      <div class="search--item--1">
        <label id="am-search" for="searchinput">Search</label>
      </div>
      <div class="search--item--2">
        <input id="searchinput" name="searchinput" type="text">
      </div>
      <div class="search--item--3">
        <button class="btn btn-full btn-nav"><i class="bi bi-search"></i> Search</button>
      </div>
      <div class="search--item--4">
        <button class="btn btn-table-grn btn-nav"><i class="bi bi-plus-lg"></i> Create User</button>
      </div>
    </div>
    <div class="table-container">
      <div class="table-row-container tbl-heading">
        <div class="th-item tbl-item--1">#</div>
        <div class="th-item tbl-item--2">User Name</div>
        <div class="th-item tbl-item--3">Email</div>
        <div class="th-item tbl-item--4">First Name</div>
        <div class="th-item tbl-item--5">Last Name</div>
        <div class="th-item tbl-item--6">Role</div>
        <div class="th-item tbl-item--7">Action</div>
      </div>
      <?php
      if (is_array($option_list)) {
        foreach ($option_list as $options) {
          echo '<div class="table-row-container">';
          echo '<div class="td-item tbl-item--1">' . $options['userID'] . '</div>';
          echo '<div class="td-item tbl-item--2">' . $options['username'] . '</div>';
          echo '<div class="td-item tbl-item--3">' . $options['email'] . '</div>';
          echo '<div class="td-item tbl-item--4">' . $options['firstname'] . '</div>';
          echo '<div class="td-item tbl-item--5">' . $options['lastName'] . '</div>';
          echo '<div class="td-item tbl-item--6">' . convert_roleID2Type($options['roleID'])  . '</div>';
          echo '<div class="td-item tbl-item--7">';
          echo '<button class="btn-table btn-full" src="../static/select.png" title="View User Details"><i class="bi bi-search"></i></button>';
          echo '<button id="show-modal01" class="btn-table btn-table-mb" title="Edit User" onclick="UpdateStatus(' . $options['userID'] . ')" src="../static/delete-user.png"><i class="bi bi-pencil"></i></button>';
          echo '<button id="show-modal02" class="btn-table btn-table-grn" title="View Folder" onclick=SetID(' . $options['userID'] . ')><i class="bi bi-folder"></i></button>';
          echo '<button id="show-modal03" class="btn-table btn-table-red" title="Delete User" onclick="deleteUser(' . $options['userID'] . ')" src="../static/editing.png"><i class="bi bi-trash"></i></button>';
          echo '</div>';
          echo '</div>';
        }
      }
      ?>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="am-modal--01">
  <div id="edit-modal" class="overlay-new">
    <div class="edit-profile">
      <h2>Edit User Profile</h2>
      <form id="form" action="accountManagement.php" method="post">
        <div class="container-edit-left">
          <div class="form-element">
            <label for="username">User Name</label>
            <input type="text" name="username" id="username" value="" class="<?= error_class($errors, 'username') ?>">
            <small><?= $errors['username'] ?? '' ?></small>
          </div>
          <div class="form-element">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="" class="<?= error_class($errors, 'email') ?>">
            <small><?= $errors['email'] ?? '' ?></small>
          </div>

          <div class="form-element">
            <div class="inline-item-3">
              <label for="address">Unit No. | Condo No.</label>
              <input type="text" name="address" id="address" value="" class="<?= error_class($errors, 'address') ?>">
              <small><?= $errors['address'] ?? '' ?></small>
            </div>
            <div class="inline-item-4">
              <label for="address2">Street Name | Condo Building Name</label>
              <input type="text" name="address2" id="address2" value="" class="<?= error_class($errors, 'address2') ?>">
              <small><?= $errors['address2'] ?? '' ?></small>
            </div>
          </div>
          <div class="form-element">
            <label for="address3">Subdivision</label>
            <input type="text" name="address3" id="address3" value="" class="<?= error_class($errors, 'address2') ?>">
            <small><?= $errors['address3'] ?? '' ?></small>
          </div>
          <div class="form-element">
            <div class="inline-item-5">
              <label for="city">City</label>
              <input type="text" name="city" id="city" value="" class="<?= error_class($errors, 'address') ?>">
              <small><?= $errors['city'] ?? '' ?></small>
            </div>
            <div class="inline-item-6">
              <label for="district">District</label>
              <input type="text" name="district" id="district" value="" class="<?= error_class($errors, 'address') ?>">
              <small><?= $errors['district'] ?? '' ?></small>
            </div>
            <div class="inline-item-7">
              <label for="region">Region</label>
              <input type="text" name="region" id="region" value="" class="<?= error_class($errors, 'address') ?>">
              <small><?= $errors['region'] ?? '' ?></small>
            </div>
          </div>
          <div class="form-element">
            <div class="inline-item-8">
              <label for="zipCode">Zip Code</label>
              <input type="text" name="zipCode" id="zipCode" value="" class="<?= error_class($errors, 'address') ?>">
              <small><?= $errors['zipCode'] ?? '' ?></small>
            </div>
            <div class="inline-item-9">
              <label for="country">Country</label>
              <input type="text" name="country" id="country" value="" class="<?= error_class($errors, 'address') ?>">
              <small><?= $errors['country'] ?? '' ?></small>
            </div>
          </div>
          <div class="form-element">
            <label for="otherInfo">Other Details</label>
            <input type="text" name="otherInfo" id="otherInfo" value="" class="<?= error_class($errors, 'address') ?>">
            <small><?= $errors['otherInfo'] ?? '' ?></small>
          </div>
        </div>
        <div class="container-edit form-style">
          <div class="close-btn">&times;</div>
          <input hidden name="user_id" id="user_id" value="">
          <div class="form-element">
            <label for="usertype">User Type:</label>
            <select name="usertype" id="usertype" class="<?= error_class($errors, 'usertype') ?>" required>
              <option value=""></option>
              <?php
              if (is_array($option_list2)) {
                foreach ($option_list2 as $options2) {
                  echo '<option value="' . $options2['roleID'] . '">' . $options2['roleType'] . '</option>';
                }
              }
              ?>
            </select>
            <small><?= $errors['usertype'] ?? '' ?></small>
          </div>
          <div class="form-element">
            <div class="inline-item-1">
              <label for="firstname">First Name</label>
              <input type="text" name="firstname" id="firstname" value="" class="<?= error_class($errors, 'firstname') ?>">
              <small><?= $errors['firstname'] ?? '' ?></small>
            </div>
            <div class="inline-item-2">
              <label for="lastName">Last Name</label>
              <input type="text" name="lastName" id="lastName" value="" class="<?= error_class($errors, 'lastName') ?>">
              <small><?= $errors['lastName'] ?? '' ?></small>
            </div>
          </div>
          <div class="form-element">
            <div class="inline-item-3">
              <label for="gender">Gender</label>
              <select name="gender" id="gender" class="<?= error_class($errors, 'gender') ?>" required>
                <option value="Male">Male</option>
                <option value="Male">Female</option>
              </select>
              <small><?= $errors['gender'] ?? '' ?></small>
            </div>
            <div class="inline-item-4">
              <label for="birthday">Birthday</label>
              <input type="date" name="birthday" id="birthday" type="date" value="" class="<?= error_class($errors, 'birthday') ?>">
              <small><?= $errors['birthday'] ?? '' ?></small>
            </div>
            <div class="inline-item-5">
              <label for="age">Age</label>
              <input type="number" name="age" id="age" min="1" max="99" value="" class="<?= error_class($errors, 'age') ?>">
              <small><?= $errors['age'] ?? '' ?></small>
            </div>
          </div>
          <div class="form-element">
            <label for="contactno">Contact No.</label>
            <input type="text" name="contactno" id="contactno" value="" class="<?= error_class($errors, 'contactno') ?>">
            <small><?= $errors['contactno'] ?? '' ?></small>
          </div>
          <div class="form-element">
            <label for="aboutme">About Me</label>
            <textarea type="text" name="aboutme" id="aboutme" class="<?= error_class($errors, 'aboutme') ?>" required><?= $user['aboutme'] ?? $inputs['aboutme'] ?></textarea>
            <small><?= $errors['aboutme'] ?? '' ?></small>
          </div>
          <div class="form-element">
            <button type="submit" form="form" class="btn btn-nav btn-full btn-edit">Save changes</button>
          </div>
          <div class="form-element">
            <button type="button" class="btn btn-nav btn-ghost btn-edit" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Create User Modal-->

<div id="edit-profile" class="overlaynew">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLavelCreate">Create User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="#modalCreate" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form" name="createForm" method="post">
          <label for="usertype">User Type:</label>
          <select name="usertype" id="usertype" class="<?= error_class($errors, 'usertype') ?>" required>
            <option value=""></option>
            <?php
            foreach ($option_list2 as $options2) {
              echo '<option value="' . $options2['roleID'] . '">' . $options2['roleType'] . '</option>';
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
          <tbody id="filesT">
            <?php
            if(is_array($option_list3)){
            foreach($option_list3 as $options){
                echo "<tr>";
                echo '<td>'. $options['fileName'] .'</td>';
                echo '<td>'. $options['filePath'] .'</td>';
                echo '<td>'. $options['userID'] .'</td>';
                echo '<td>';
                  echo '<button class="btn" onclick ="downloadFile('.$options['fileID'].')" ><i class="fa fa-trash"></i> Download</button>';
                  echo '<button class="btn" onclick ="deleteFile('.$options['fileID'].')"><i class="fa fa-close"></i> Delete</button>';
                echo '</tr>';
              }
            }
            ?>
          </tbody>
        </table>
        <form action="../src/upload.php" method="post" enctype="multipart/form-data">
          Select image to upload:
          <input type="hidden" name="user_idfile" id="user_idfile" value="">
          <input type="file" name="fileToUpload" id="fileToUpload" required>
          <button type="submit" name="submit">Upload File</button>
        </form>
        <?php if (isset($errors['accountMGTFile'])) : ?>
          <div class="alert alert-error">
            <?= $errors['accountMGTFile'] ?>
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
  $(' #modalFile').on('hidden.bs.modal', function(e) {
    $(this).find("input,textarea,select").val('').end().find("input[type=checkbox], input[type=radio]").prop("checked", "").end();
  })

  function SetID(id) {
    var temp = id; // console.log("this->",temp);
    document.getElementById("user_idfile").value = temp;
    // $.post('../src/loggedin/accountManagement.php', { user_idfile: id }, function(result) {
    // alert(result);
    // });
    resetTable();

    function resetTable() {
      document.getElementById("filesT").innerHTML = '';
    }

    function loadTableData(items) {


      const table = document.getElementById("filesT");
      for (var i = 0; i < items.length; i++) {
        let row = table.insertRow();
        let Filename = row.insertCell(0);
        Filename.innerHTML = items[i]['fileName'];
        let Classname = row.insertCell(1);
        Classname.innerHTML = items[i]['filePath'];
        let Owner = row.insertCell(2);
        Owner.innerHTML = items[i]['userID'];
        let Controls = row.insertCell(3);
        Controls.innerHTML = "<button type='button' onclick=\" downloadFile(\'" + items[i]['fileID'] + "\')\">Download</button><br><button type='button' onclick=\"deleteFile(\'" + items[i]['fileID'] + "\')\">Delete</button><br>";
        // '<button class="btn" onclick="downloadFile('.$options['fileID'].')"><i class="fa fa-trash"></i> Download</button>';
        // '<button class="btn" onclick="deleteFile('.$options['fileID'].')"><i class="fa fa-close"></i> Delete</button>';
      }
    }
    var tname = 'debugfiles';
    var tcol = 'userID';
    var id = temp;
    $.ajax({
      type: "POST",
      url: "../src/libs/tableFill.php",
      data: {
        tableName: tname,
        tableCol: tcol,
        tableVal: id
      },
      success: function(response) {
        const myJSON = JSON.parse(response);
        // console.log("respone->",response);
        if (typeof myJSON[0]['fileName'] !== 'undefined') {
          loadTableData(myJSON);
        }
      }
    });
  }

  function UpdateStatus(id) {
    var Option = 'get';
    var link = '../src/inc/ajaxModal.php?userID=';
    var newlink = link + id + '&modalOption=' + Option;
    modal.style.display = "block";
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
      error: function(err) {
        alert("error");

      },
    });


  }

  function deleteUser(id) {
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
      error: function(err) {
        // alert("error"+JSON.stringify(err));
        alert("error");

      },
    });

  }

  function deleteFile(id) {
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
      error: function(err) {
        // alert("error"+JSON.stringify(err));
        alert("error" + JSON.stringify(err));

      },
    });

  }

  function createUser() {
    var link = '../src/inc/ajaxModal.php';

    var data = $("form[name=createForm]").serializeArray(); // convert form to array
    data.push({
      name: 'Option',
      value: 'Create'
    });
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
      error: function(err) {
        // alert("error"+JSON.stringify(err));
        alert("error");

      },
    });
  }

  function downloadFile(id) {
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

  function tblToggle() {
    const toggleTbl = document.querySelector('.tbl-menu');
    toggleTbl.classList.toggle('active')
  }

  // Modal - JS Function

  var btnEdit = document.getElementById("show-modal01");
  var btnFolder = document.getElementById("show-modal02");
  var btnDelete = document.getElementById("show-modal03");
  var modal = document.getElementById("edit-modal");
  var modalCrtUsr = document.getElementById("cu-modal");
  var modalDlt = document.getElementById("dlt-modal");
  var span = document.getElementsByClassName("close-btn")[0];

  btnEdit.onclick = function() {
    modal.style.display = "block";
  }

  btnFolder.onclick = function() {
    modalCrtUsr.style.display = "block";
  }

  btnDelete.onclick = function() {
    modalDlt.style.display = "block";
  }

  span.onclick = function() {
    modal.style.display = "none";
  }
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>

<!-- 
  <div class="overlaybg">
  <div class="am-container">
    <div class="table-style">
      <table>
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
        if (is_array($option_list)) {
          foreach ($option_list as $options) {
            echo "<tr>";
            echo '<th scope="row">' . $options['userID'] . '</th>';
            echo '<td>' . $options['username'] . '</td>';
            echo '<td>' . $options['email'] . '</td>';
            echo '<td>' . $options['firstname'] . '</td>';
            echo '<td>' . $options['lastName'] . '</td>';
            echo '<td>' . convert_roleID2Type($options['roleID'])  . '</td>';
            echo '<td>';
            echo '<button class="btn" src="../static/select.png"><i class="fa fa-bars"></i> View</button>';
            echo '<button class="btn" data-bs-toggle="modal" data-bs-target="#modal" onclick ="UpdateStatus(' . $options['userID'] . ')" src="../static/delete-user.png"><i class="fa fa-trash"></i> Update User</button>';
            echo '<button class="btn" onclick ="deleteUser(' . $options['userID'] . ')" src="../static/editing.png"><i class="fa fa-close"></i> Delete</button>';
            echo '<button class="btn" data-bs-toggle="modal" data-bs-target="#modalFile" onclick = SetID(' . $options['userID'] . ')><i class="fa fa-folder"></i> Folder</button></td>';
            echo '</tr>';
          }
        }
        ?>
        </tbody>
      </table>
      <button data-bs-toggle="modal" data-bs-target="#modalCreate">Create User</button>
    </div>
  </div>
</div>
 -->

<!-- 
  <div class="td-item tbl-item--1"> . $options['userID'] . </div>
  <div class="td-item tbl-item--2"> . $options['username'] . </div>
  <div class="td-item tbl-item--3"> . $options['email'] . </div>
  <div class="td-item tbl-item--4"> . $options['firstname'] . </div>
  <div class="td-item tbl-item--5"> . $options['lastName'] . </div>
  <div class="td-item tbl-item--6"> . convert_roleID2Type($options['roleID']) . </div>
  <div class="td-item tbl-item--7">
  <button class="btn-table btn-full" src="../static/select.png" title="View User Details"><i class="bi bi-search"></i></button>
  <button class="btn-table btn-table-mb" title="Edit User" onclick="UpdateStatus(' . $options['userID'] . ')" src="../static/delete-user.png"><i class="bi bi-pencil"></i></button>
  <button class="btn-table btn-table-grn" title="View Folder" onclick=SetID(' . $options['userID'] . ')><i class="bi bi-folder"></i></button>
  <button class="btn-table btn-table-red" title="Delete User" onclick="deleteUser(' . $options['userID'] . ')" src="../static/editing.png"><i class="bi bi-trash"></i></button>
</div> -->