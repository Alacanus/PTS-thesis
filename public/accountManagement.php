<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/loggedin/accountManagement.php';

is_user_2fa();
if(!auth_Level('Admin')){
    redirect_to('login.php');
}
view('header', ['title' => 'Account Manage']) ?>
<?php if (isset($errors['accountMGT'])) : ?>
    <div class="alert alert-error">
        <?= $errors['accountMGT'] ?? print_r($errors) ?>
    </div>
<?php endif ?>
<script>
function UpdateStatus(id)
    {
        var Option = 'get';
        var link = '../src/inc/ajaxModal.php?userID=';
        var newlink = link + id + '&modalOption=' + Option;
        $.ajax({
        type: 'GET',
        url: newlink,
        success: function(data) {
            const myJSON = JSON.parse(data);
        console.log('it workz', myJSON[0]);
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
        console.log('it workz', data);
        alert("User Deleted");
        location.reload();
    },
    error:function(err){
        // alert("error"+JSON.stringify(err));
        alert("error");

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
</script>

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
                  echo '<button class="btn" ><i class="fa fa-folder"></i> Folder</button></td>';
                echo '</tr>';
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
            foreach($option_list2 as $options2)
            {
                echo '<option value="'.$options2[$optionVal2].'">'.$options2[$optionName2].'</option>';
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

<div class="modal fade" id="modalCreate" tabindex="-2" aria-labelledby="modalLavelCreate" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLavelCreate">Create User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="#modalCreate" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form id="form" name="createForm" action="accountManagement.php" method="post">
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