<?php
require __DIR__ . '/../../src/bootstrap.php';
require __DIR__ . '/../../src/loggedin/classRooms.php';

if (is_user_2fa() == 'false'){
    redirect_to('login.php');
}else{
  audit_trail('User has started Class Creation', 2);
}
?>

<?php view('header', ['title' => 'Create Class']);
?>
<?php if (isset($errors['userProfile'])) : ?>
    <div class="alert alert-error">
        <?= $errors['classRooms'] ?>
    </div>
<?php endif ?>
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
</main>


<?php view('footer') ?>
