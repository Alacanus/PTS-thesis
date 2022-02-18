<?php
$errors = [];
$globalARR['classcrt1'] = "<script>$(document).ready(function(){ $('#modalFile').modal('show'); });</script>

<div class='modal fade' id='modalFile' tabindex='-2' aria-labelledby='modalLavelFile' aria-hidden='true'>
<div class='modal-dialog'>
  <div class='modal-content'>
    <div class='modal-header'>
      <h5 class='modal-title' id='modalLavelFile'>Class Create step 1</h5>
    </div>
    <div class='modal-body'>
    <form action='classStep21.php?field1=Value1' id='myform' method='post'>
    username<input type='text' name='username' id='username' value=''><br>
    email<input type='email' name='email' id='email' value=''><br>
    fname<input type='text' name='firstname' id='firstname' value=''><br>
    lname<input type='text' name='lastName' id='lastName' value=''><br>
    password<input type='text' name='password' id='password' value=''><br>
    <input type='submit' onclick='myFunction()' form='myform' value='Update'/>
    </form>
    </div>
    <div class='modal-footer'>
      <button type='button' class='btn btn-secondary' data-bs-dismiss='#modalCreate'>Close</button> 
      <button type='submit' class='btn btn-primary'  form='step1from'>Save changes</button>
    </div>
  </div>
</div>
</div>";

$globalARR['classcrt2'] = "<script>$(document).ready(function(){ $('#modalFile').modal('show'); });</script>

<div class='modal fade' id='modalFile' tabindex='-2' aria-labelledby='modalLavelFile' aria-hidden='true'>
<div class='modal-dialog'>
  <div class='modal-content'>
    <div class='modal-header'>
      <h5 class='modal-title' id='modalLavelFile'>Class Create step 2</h5>
    </div>
    <div class='modal-body'>
    <div class='container-login'>
                        <div class='form-style'>
                            <div class='form-element'>
                                <label for='username'>Username<div class='reqcolor'>*</div></label>

                                <input type='text' name='username' id='username' class='".error_class($errors, 'username') ."'>
                            </div>
                            <div class='form-element'>
                                <label for='password'>Password<div class='reqcolor'>*</div></label>

                                <input type='password' name='password' id='password'  class='".error_class($errors, 'password') ."'>
                            </div>
                            <div class='form-group'>
                                <div class='form-element'>
                                    <button>Login</button>
                                </div>      
                            </div>
                        </div>
                    </div>
    </div>
    <div class='modal-footer'>
      <button type='button' class='btn btn-secondary' data-bs-dismiss='#modalCreate'>Close</button> 
      <button onclick='' class='btn btn-primary'>Save changes</button>
    </div>
  </div>
</div>
</div>";


$globalARR['classcrt3'] = "<script>$(document).ready(function(){ $('#modalFile').modal('show'); });</script>

<div class='modal fade' id='modalFile' tabindex='-2' aria-labelledby='modalLavelFile' aria-hidden='true'>
<div class='modal-dialog'>
  <div class='modal-content'>
    <div class='modal-header'>
      <h5 class='modal-title' id='modalLavelFile'>Class Create step 3</h5>
    </div>
    <div class='modal-body'>
    <div class='container-login'>
                        <div class='form-style'>
                            <div class='form-element'>
                                <label for='username'>Username<div class='reqcolor'>*</div></label>

                                <input type='text' name='username' id='username' class='".error_class($errors, 'username') ."'>
                            </div>
                            <div class='form-element'>
                                <label for='password'>Password<div class='reqcolor'>*</div></label>

                                <input type='password' name='password' id='password'  class='".error_class($errors, 'password') ."'>
                            </div>
                            <div class='form-group'>
                                <div class='form-element'>
                                    <button>Login</button>
                                </div>      
                            </div>
                        </div>
                    </div>
    </div>
    <div class='modal-footer'>
      <button type='button' class='btn btn-secondary' data-bs-dismiss='#modalCreate'>Close</button> 
      <button onclick='' class='btn btn-primary'>Save changes</button>
    </div>
  </div>
</div>
</div>";




$inputs = [];
$errors = [];

if (is_post_request()) {
	if(!empty($_POST["page"])) {
		$page = $_POST["page"];
	}

    // if ($errors) {
    //     redirect_with('userprofile.php', [
    //         'errors' => $errors
    //     ]);
    // }

    // $messages = [
    //     'usertype' => [
    //         'required' => 'You need to agree to the term of services to register'
    //     ]
    // ];

    // if(update_user_Profile($_SESSION['user_id'], $inputs['email'], $inputs['username'],  $inputs['firstname'], $inputs['lastName'], $inputs['usertype'],
    // $inputs['gender'],  $inputs['age'],  $inputs['birthday'], $inputs['address'], $inputs['contactno'], $inputs['aboutme']
    // )){
    //     sleep(3);
    //     $user = null;
    //     $errors['userProfile'] = 'User account has been Edited';

    //     redirect_with('userprofile.php', [
    //         'errors' => $errors,
    //         'inputs' => $inputs
    //     ]);
    // }else{
    //     $errors['userProfile'] = 'NO workey';

    //     redirect_with('userprofile.php', [
    //         'errors' => $errors,
    //         'inputs' => $inputs
    //     ]);
    // }


} else if (is_get_request()) {
    [$inputs, $errors] = session_flash('inputs', 'errors');

    //load file


}