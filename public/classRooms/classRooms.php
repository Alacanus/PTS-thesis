<?php
require __DIR__ . '/../../src/bootstrap.php';
require __DIR__ . '/../../src/loggedin/classRooms.php';

// if (is_user_2fa() == 'false'){
//     redirect_to('login.php');
// }else{
//   audit_trail('User has started Class Creation', 2);
// }
?>

<?php view('header', ['title' => 'Create Class']);
?>
<?php if (isset($errors['userProfile'])) : ?>
    <div class="alert alert-error">
        <?= $errors['classRooms'] ?>
    </div>
<?php endif ?>
<style>
#registration-step{margin:0;padding:0;}
#registration-step li{list-style:none; float:left;padding:5px 10px;border-top:#EEE 1px solid;border-left:#EEE 1px solid;border-right:#EEE 1px solid;}
#registration-step li.highlight{background-color:#EEE;}
#registration-form{clear:both;border:1px #EEE solid;padding:20px;}
.registration-error{color:#FF0000; padding-left:15px;}
.message {color: #00FF00;font-weight: bold;width: 100%;padding: 10;}
</style>
<main id="mymain1">
  <form action="classRooms.php" method="post">
<?php
$page_html = '';
$page_html .= "<div style='text-align:center;margin:20px 0px;'>";
$page_html .= '<input type="submit" name="page" value="' . 1 . '" class="btn-page current" />';
$page_html .= '<input type="submit" name="page" value="' . 2 . '" class="btn-page" />';
$page_html .= '<input type="submit" name="page" value="' . 3 . '" class="btn-page" />';

$page_html .= "</div>";

echo $page_html;
if(isset($_POST['page'])){
  echo global_arr($_POST['page']);
}else{
  echo 'loading';
}

?>
</form>

<ul id="registration-step">
	<li id="account" class="highlight">Account</li>
	<li id="password">Credentials</li>
	<li id="general">General</li>
</ul>
<form name="frmRegistration" id="registration-form" method="post">
	<div id="account-field">
		<label>Email</label><span id="email-error" class="registration-error"></span>	
		<div><input type="text" name="email" id="email" class="demoInputBox" /></div>
	</div>
	<div id="password-field" style="display:none;">
		<label>Enter Password</label><span id="password-error" class="registration-error"></span>
		<div><input type="password" name="password" id="user-password" class="demoInputBox" /></div>
		<label>Re-enter Password</label><span id="confirm-password-error" class="registration-error"></span>
		<div><input type="password" name="confirm-password" id="confirm-password" class="demoInputBox" /></div>
	</div>
	<div id="general-field" style="display:none;">
		<label>Display Name</label>
		<div><input type="text" name="display-name" id="display-name" class="demoInputBox"/></div>
		<label>Gender</label>
		<div>
		<select name="gender" id="gender" class="demoInputBox">
		<option value="female">Female</option>
		<option value="male">Male</option>
		</select></div>
	</div>
	<div id="account-field">
		<label>Email</label><span id="email-error" class="registration-error"></span>	
		<div><input type="text" name="email" id="email" class="demoInputBox" /></div>
	</div>
  <div id="password-field" style="display:none;">
		<label>Enter Password</label><span id="password-error" class="registration-error"></span>
		<div><input type="password" name="password" id="user-password" class="demoInputBox" /></div>
		<label>Re-enter Password</label><span id="confirm-password-error" class="registration-error"></span>
		<div><input type="password" name="confirm-password" id="confirm-password" class="demoInputBox" /></div>
	</div>
	<div>
		<input class="btnAction" type="button" name="back" id="back" value="Back" style="display:none;">
		<input class="btnAction" type="button" name="next" id="next" value="Next" >
		<input class="btnAction" type="submit" name="finish" id="finish" value="Finish" style="display:none;">
	</div>
</form>
<script>
  function myFunction(){
    console.log('it works via button')
}
</script>
</main>
<script>
function validate() {
var output = true;
$(".registration-error").html('');
if($("#account-field").css('display') != 'none') {
	if(!($("#email").val())) {
		output = false;
		$("#email-error").html("required");
	}	
	if(!$("#email").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
		$("#email-error").html("invalid");
		output = false;
	}
}

if($("#password-field").css('display') != 'none') {
	if(!($("#user-password").val())) {
		output = false;
		$("#password-error").html("required");
	}	
	if(!($("#confirm-password").val())) {
		output = false;
		$("#confirm-password-error").html("Not Matched");
	}	
	if($("#user-password").val() != $("#confirm-password").val()) {
		output = false;
		$("#confirm-password-error").html("Not Matched");
	}	
}
return output;
}
$(document).ready(function() {
	$("#next").click(function(){
		var output = validate();
		if(output) {
			var current = $(".highlight");
			var next = $(".highlight").next("li");
			if(next.length>0) {
				$("#"+current.attr("id")+"-field").hide();
				$("#"+next.attr("id")+"-field").show();
				$("#back").show();
				$("#finish").hide();
				$(".highlight").removeClass("highlight");
				next.addClass("highlight");
				if($(".highlight").attr("id") == $("li").last().attr("id")) {
					$("#next").hide();
					$("#finish").show();				
				}
			}
		}
	});
	$("#back").click(function(){ 
		var current = $(".highlight");
		var prev = $(".highlight").prev("li");
		if(prev.length>0) {
			$("#"+current.attr("id")+"-field").hide();
			$("#"+prev.attr("id")+"-field").show();
			$("#next").show();
			$("#finish").hide();
			$(".highlight").removeClass("highlight");
			prev.addClass("highlight");
			if($(".highlight").attr("id") == $("li").first().attr("id")) {
				$("#back").hide();			
			}
		}
	});
});
</script>
<?php view('footer') ?>
