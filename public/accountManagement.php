<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/loggedin/accountManagement.php';

is_user_2fa();
?>

<?php view('header', ['title' => 'Account Manage']) ?>
<?php if (isset($errors['accountMGT'])) : ?>
    <div class="alert alert-error">
        <?= $errors['login'] ?>
    </div>
<?php endif ?>
<script>
function UpdateStatus(Status)
    {
        var link = '../src/loggedin/accountManagement.php?userID=';
        var newlink = link + Status;
        $.ajax({
        type: 'GET',
        url: newlink,
        success: function(data) {
            console.log('it workz', newlink);
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
                  echo '<button class="btn" src="../static/editing.png"><i class="fa fa-close"></i> Edit</button>';
                  echo '<button class="btn" ><i class="fa fa-folder"></i> Folder</button></td>';
                echo '</tr>';
            }
        ?>
  </tbody>
</table>
</div>

<!-- Modal -->

<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabelView" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabelView">Make changes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="Modalview" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form id="form" action="src/loggedin/accountManagement.php" method="post">
            <label for="usertype">User Type:</label>
            <select name="usertype" class="<?= error_class($errors, 'usertype') ?>">
            <option value="<?= $user['roleID'] ?>"><?= $user['roleType'] ?><options>
            <?php 
            foreach($option_list2 as $options)
            {
                echo '<option value="'.$options[$optionVal2].'">'.$options[$optionName2].'</option>';
            }
            ?>
            </select>
            <small><?= $errors['usertype'] ?? '' ?></small><br>
            username<input type="text" name="username" id="username" value="<?= $inputs['username'] ?? $user['username'] ?>"
            class="<?= error_class($errors, 'username') ?>">
            <small><?= $errors['username'] ?? '' ?></small><br>
            email<input type="email" name="email" id="email" value="<?= $inputs['email'] ?? $user['email'] ?>"
            class="<?= error_class($errors, 'email') ?>">
            <small><?= $errors['email'] ?? '' ?></small><br>
            fname<input type="text" name="firstname" id="firstname" value="<?= $inputs['firstname'] ?? $user['firstname'] ?>"
            class="<?= error_class($errors, 'firstname') ?>">
            <small><?= $errors['firstname'] ?? '' ?></small><br>
            lname<input type="text" name="lastName" id="lastName" value="<?= $inputs['lastName'] ?? $user['lastName'] ?>"
            class="<?= error_class($errors, 'lastName') ?>">
            <small><?= $errors['lastName'] ?? '' ?></small><br>
            gender<input type="text" name="gender" id="gender" value="<?= $inputs['gender'] ?? $user['gender'] ?>"
            class="<?= error_class($errors, 'gender') ?>">
            <small><?= $errors['gender'] ?? '' ?></small><br>
            age<input type="text" name="age" id="age" value="<?= $inputs['age'] ?? $user['age'] ?>"
            class="<?= error_class($errors, 'age') ?>">
            <small><?= $errors['age'] ?? '' ?></small><br>
            <label for="birthday">birthday</label>
            <input type="date" name="birthday" id="birthday"type="date" value="<?= $inputs['birthday'] ?? $user['birthday'] ?>"
            class="<?= error_class($errors, 'birthday') ?>">
            <small><?= $errors['birthday'] ?? '' ?></small><br>
            address<input type="text" name="address" id="address" value="<?= $inputs['address'] ?? $user['address'] ?>"
            class="<?= error_class($errors, 'address') ?>">
            <small><?= $errors['address'] ?? '' ?></small><br>
            contactno<input type="text" name="contactno" id="contactno" value="<?= $inputs['contactno'] ?? $user['contactno'] ?>"
            class="<?= error_class($errors, 'contactno') ?>">
            <small><?= $errors['contactno'] ?? '' ?></small><br>
            aboutme<input type="text" name="aboutme" id="aboutme" value="<?= $inputs['aboutme'] ?? $user['aboutme'] ?>"
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
