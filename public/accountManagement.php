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
  <div class="overlay-new02" id="error-modal">
    <div class="error-container">
      <div class="edit-profile">
        <div class="error-close-btn">&times;</div>
        <i class="bi bi-exclamation-triangle"></i>
        <?= $errors['accountMGT'] ?>
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
<div class="overlaybg">
  <div class="AccountManagement">
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
          <button id="show-modal04" class="btn btn-table-grn btn-nav"><i class="bi bi-plus-lg"></i> Create User</button>
        </div>
      </div>
      <table class="table-container table-container-am">
        <thead class="tbl-heading">
          <tr class="table-row-container">
            <th class="th-item tbl-item--1">#</th>
            <th class="th-item tbl-item--2">User Name</th>
            <th class="th-item tbl-item--3">Email</th>
            <th class="th-item tbl-item--4">Name</th>
            <!-- <div class="th-item tbl-item--5">Status</div> -->
            <th class="th-item tbl-item--5">Role</th>
            <th class="th-item tbl-item--6">Action</th>
          </tr>
        </thead>
        <tbody class="tbody-overflow">
          <?php
          // var_dump($option_list);
          if (is_array($option_list)) {
            foreach ($option_list as $options) {
              echo '<tr class="table-row-container">';
              echo '<td class="td-item tbl-item--1">' . $options['userID'] . '</td>';
              echo '<td class="td-item tbl-item--2">' . $options['username'] . '</td>';
              echo '<td class="td-item tbl-item--3">' . $options['email'] . '</td>';
              echo '<td class="td-item tbl-item--4">' . $options['firstname'] . " " . $options['lastName'] . '</td>';
              // echo '<div class="td-item tbl-item--5">' . "" .  '</div>';
              echo '<td class="td-item tbl-item--5">' . convert_roleID2Type($options['roleID'])  . '</td>';
              echo '<td class="td-item tbl-item--6">';
              echo '<button id="show-modal00" class="btn-table btn-full" src="../static/select.png" title="View User Details" onclick="getUserDetails(' . $options['userID'] . ')"><i class="bi bi-search"></i></button>';
              echo '<button id="show-modal01" class="btn-table btn-table-mb" title="Edit User" onclick="UpdateStatus(' . $options['userID'] . ')" src="../static/delete-user.png"><i class="bi bi-pencil"></i></button>';
              echo '<button id="show-modal02" class="btn-table btn-table-grn" title="View Folder" onclick=SetID(' . $options['userID'] . ')><i class="bi bi-folder"></i></button>';
              echo '<button id="" class="btn-table btn-table-red" title="Delete User" onclick="displayModalDlt(' . $options['userID'] . ')" src="../static/editing.png"><i class="bi bi-trash"></i></button>';
              echo '</td>';
              echo '</tr>';
            }
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  </div>

<!-- view Profile - Modal -->
<div class="am-modal--00">
  <div id="view-modal" class="overlay-new">
    <div class="edit-profile">
      <h2>View Profile</h2>
      <div class="container-edit form-style">
        <div class="close-btnView">&times;</div>
        <div class="form-element element-bg-01">

          <div class="sub-item-vp">
            <h3>Account Information</h3>
          </div>
          <div class="sub-item-vp">
            <label for="lb-title"><i class="bi bi-hash"></i>User ID :</label>
            <label id="viewuser_id"></label>
          </div>
          <div class="sub-item-vp">
            <label for="lb-title"><i class="bi bi-postcard"></i>User Name :</label>
            <label id="viewusername"></label>
          </div>
          <div class="sub-item-vp">
            <label for="lb-title"><i class="bi bi-envelope"></i>Email : </label>
            <label id="viewemail"></label>
          </div>
        </div>

        <div class="form-element element-bg-02">
          <div class="sub-item-vp">
            <h3>Basic Information</h3>
          </div>
          <div class="sub-item-vp">
            <label for="lb-title"><i class="bi bi-person-circle"></i>Name : </label>
            <label id="viewfirstname"></label>
            <label id="viewlastName"></label>
          </div>
          <div class="sub-item-vp">
            <label for="lb-title"><i class="bi bi-gender-female"></i><i class="bi bi-gender-male"></i>Gender : </label>
            <label id="viewgender"></label>
          </div>
          <div class="sub-item-vp">
            <label for="lb-title"><i class="bi bi-calendar-date"></i>Age : </label>
            <label id="viewage"></label>
          </div>
          <div class="sub-item-vp">
            <label for="lb-title"><i class="bi bi-calendar-event"></i>Birthday : </label>
            <label id="viewbirthday"></label>
          </div>
          <div class="sub-item-vp">
            <label for="lb-title"><i class="bi bi-geo-alt"></i>Address : </label>
            <label id="viewaddress"></label>
          </div>
          <div class="sub-item-vp">
            <label for="lb-title"><i class="bi bi-phone"></i>Contact No : </label>
            <label id="viewcontactno"></label>
          </div>
          <div class="sub-item-vp">
            <label for="lb-title"><i class="bi bi-card-text"></i>About Me : </label>
            <label id="viewaboutme"></label>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Edit User Profile - Modal -->
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
            <input type="text" name="aboutme" id="aboutme" class="<?= error_class($errors, 'aboutme') ?>" required>
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

<!-- Create User - Modal-->

<div class="am-modal--02">
  <div id="cu-modal" class="overlay-new">
    <div class="edit-profile">
      <div class="container-edit form-style">
        <div class="close-btn02">&times;</div>
        <form id="form" name="createForm" method="post">
          <h2 id="modalLavelCreate">Create User</h2>
          <div class="form-element">
            <label for="usertype">User Type:</label>
            <select name="usertype" id="usertype" class="<?= error_class($errors, 'usertype') ?>" required>
              <option value=""></option>
              <?php
              foreach ($option_list2 as $options2) {
                echo '<option value="' . $options2['roleID'] . '">' . $options2['roleType'] . '</option>';
              }
              ?>
            </select>
          </div>
          <div class="form-element">
            <label for="username">User Name</label>
            <input type="text" name="username" id="username" value="">
          </div>
          <div class="form-element">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="">
          </div>
          <div class="form-element">
            <label for="firstname">First Name</label>
            <input type="text" name="firstname" id="firstname" value="">
          </div>
          <div class="form-element">
            <label for="lastName">Last Name</label>
            <input type="text" name="lastName" id="lastName" value="">
          </div>
          <div class="form-element">
            <label for="password">Password</label>
            <input type="text" name="password" id="password" value="">
          </div>
          <div class="form-element">
            <button onclick="createUser()" class="btn btn-nav btn-full btn-edit">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- View File - Modal  -->
<div class="am-modal--03">
  <div id="file-modal" class="overlay-new">
    <div class="edit-profile">
      <h2 id="modalLavelFile">User Files</h2>
      <div class="close-btn03">&times;</div>
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
      </div>
      <!-- <table class="table" name="filesT">
        <thead>
          <tr>
            <th scope="col">File name</th>
            <th scope="col">Path</th>
            <th scope="col">owner</th>
            <th scope="col">controls</th>
          </tr>
        </thead>
        <tbody id="filesT">
        </tbody>
      </table> -->
      <table class="table table-container table-container-files" name="filesT">
        <thead class="tbl-heading">
          <tr class="table-row-container">
            <th class="th-item tbl-item--3" scope="col">File name</th>
            <th class="th-item tbl-item--3" scope="col">Path</th>
            <th class="th-item tbl-item--8" scope="col">Owner</th>
            <th class="th-item tbl-item--5" scope="col">Actions</th>
          </tr>
        </thead>
        <tbody id="filesT">
        </tbody>
      </table>

      <div class="container-edit form-style">
        <div>
          <h3>Upload Image</h3>
        </div>
        <form action="../src/upload.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="user_idfile" id="user_idfile" value="">
          <div class="form-element">
            <label>Select image to upload:</label>
            <input type="file" name="fileToUpload" id="fileToUpload" required>
          </div>
          <div class="form-element">
            <button class="btn btn-nav btn-table-grn" type="submit" name="submit">Upload File</button>
          </div>
        </form>
      </div>
      <?php if (isset($errors['accountMGTFile'])) : ?>
        <div class="alert alert-error">
          <?= $errors['accountMGTFile'] ?>
        </div>
      <?php endif ?>
      <div class="btn-right-04">
        <button onclick="" class="btn btn-nav btn-full">Save changes</button>
        <button type="button" class="btn btn-nav btn-ghost2" data-bs-dismiss="#modalCreate">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Delete Modal -->

<!-- <button id="dltbtnID" class="btn btn-nav btn-full">Yes</button> -->

<div class="am-modal--04">
  <div id="dlt-modal" class="overlay-new">
    <div class="edit-profile">
      <div class="container-edit form-style">
        <h2>Delete File</h2>
        <div class="close-btn04">&times;</div>
        <div class="form-element">
          <p>Are you sure you want to delete this User?</p>
        </div>
        <div class="form-element">
          <button id="dltbtnID" class="btn btn-nav btn-full">Yes</button>
          <button class="btn btn-nav btn-full">Cancel</button>
        </div>
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
    var temp = id;
    modalFile.style.display = "block";
    console.log("this->", temp);
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
        Controls.innerHTML = "<button class='btn btn-table btn-full' type='button' onclick=\" downloadFile(\'" + items[i]['fileID'] + "\')\"><i class='bi bi-upload'></i></button><br><button class='btn btn-table btn-table-red' type='button' onclick=\"deleteFile(\'" + items[i]['fileID'] + "\')\"><i class='bi bi-trash'></i></button><br>";
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
        console.log("respone->", response);
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
    console.log(newlink);
    modal.style.display = "block";
    $.ajax({
      type: 'GET',
      url: newlink,
      success: function(data) {
        console.log(data);
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

  function getUserDetails(id) {
    var modalView = document.getElementById("view-modal");
    var Option = 'get';
    var link = '../src/inc/ajaxModal.php?userID=';
    var newlink = link + id + '&modalOption=' + Option;
    console.log(newlink);
    modalView.style.display = "block"; //change this to view users
    $.ajax({
      type: 'GET',
      url: newlink,
      success: function(data) {
        console.log(data);
        const myJSON = JSON.parse(data);
        var select = document.querySelector('#usertype');
        // select.options[select.selectedIndex].value = myJSON[0]['roleID'];
        select.options[select.selectedIndex].text = myJSON[0]['roleType'];
        document.getElementById("viewuser_id").innerHTML = myJSON[0]['userID'];
        document.getElementById("viewusername").innerHTML = myJSON[0]['username'];
        document.getElementById("viewemail").innerHTML = myJSON[0]['email'];
        document.getElementById("viewfirstname").innerHTML = myJSON[0]['firstname'];
        document.getElementById("viewlastName").innerHTML = myJSON[0]['lastName'];
        document.getElementById("viewgender").innerHTML = myJSON[0]['gender'];
        document.getElementById("viewage").innerHTML = myJSON[0]['age'];
        document.getElementById("viewbirthday").innerHTML = myJSON[0]['birthday'];
        document.getElementById("viewaddress").innerHTML = myJSON[0]['address'];
        document.getElementById("viewcontactno").innerHTML = myJSON[0]['contactno'];
        document.getElementById("viewaboutme").innerHTML = myJSON[0]['aboutme'];
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

  function displayModalDlt(deleteID) {
    modalDlt.style.display = "block";
    document.getElementById("dltbtnID").onclick = function() {
      deleteUser(deleteID);
    }
  }

  // Modal - JS Function ====================================================

  // Button for Modal
  var btnView = document.getElementById("show-modal00");
  var btnEdit = document.getElementById("show-modal01");
  var btnFile = document.getElementById("show-modal02");
  var btnDelete = document.getElementById("show-modal03");
  var btnCrtUsr = document.getElementById("show-modal04");
  // CSS SHOW MODAL
  var modalView = document.getElementById("view-modal");
  var modal = document.getElementById("edit-modal");
  var modalFile = document.getElementById("file-modal");
  var modalDlt = document.getElementById("dlt-modal");
  var modalCrtUsr = document.getElementById("cu-modal");

  var spanView = document.getElementsByClassName("close-btnView")[0];
  var span = document.getElementsByClassName("close-btn")[0];
  var spanCrtUsr = document.getElementsByClassName("close-btn02")[0];
  var spanFile = document.getElementsByClassName("close-btn03")[0];
  var spanDlt = document.getElementsByClassName("close-btn04")[0];

  // btnEdit.onclick = function() {
  //   modal.style.display = "block";
  // }

  // btnFile.onclick = function() {
  //   modalFile.style.display = "block";
  // }

  // btnDelete.onclick = function() {
  //   modalDlt.style.display = "block";
  // }

  btnCrtUsr.onclick = function() {
    modalCrtUsr.style.display = "block";
  }

  span.onclick = function() {
    modal.style.display = "none";
  }

  spanView.onclick = function() {
    modalView.style.display = "none";
  }

  spanCrtUsr.onclick = function() {
    modalCrtUsr.style.display = "none";
  }

  spanFile.onclick = function() {
    modalFile.style.display = "none";
  }

  // spanDlt.onclick = function() {
  //   modalDlt.style.display = "none";
  // }//why error

  // Out of Bounce click close modal
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>

<?php view('footer') ?>