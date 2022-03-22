<?php

require __DIR__ . '/../../src/bootstrap.php';


//is_user_2fa();
if(is_post_request()){
    $classRow = get_Class_Rows($_POST['search']);
    
}else{
    $classRow = get_Class_Rows();
}
?>

<?php view('header', ['title' => 'Class List']);
?>
<form action="classTable.php" method="POST">
<input id="search" name ="search" type="text" placeholder="Type Class Name">
<input id="submit" type="submit" value="Search">
</form>
<h1>Class table</h1>
      <table class="table" name="ClassTable">
      <thead>
  <tr>
    <th >Class Name</th>
    <th >Instructor</th>
    <th >Status</th>
    <th >Controls</th>
  </tr>
</thead>
<tbody id="classTable">
  <?php
  if(is_array($classRow)){
        foreach ($classRow as $options){
      echo '  <tr>
      <td >'.$options['className'].'</td>
      <td >'.$options['userID'].'</td>
      <td >'.$options['classStatus'].'</td>
      <td ><button onclick="viewSummary('.$options['classID'].')">View Summary</button></td>
      <td ><button onclick="editClass('.$options['classID'].')">edit Class</button></td>
      <td ><button onclick="markVerified('.$options['classID'].')">mark Verified</button></td>
      <td ><button onclick="markUNVerified('.$options['classID'].')">mark UNVerified</button></td>
      <td ><button onclick="disableClass('.$options['classID'].')">Disable</button></td>
      <td ><button onclick="certAuth('.$options['classID'].')">Authorize Certificate</button></td>
    </tr>';
    }
  }else{
      echo '<tr><td>NO RECORDS</td></tr>';
  }

  ?>
</tbody>
      </table>

<script>
  function editClass(classID) {
    $.ajax({
      url: '../../src/redirectDir.php?editClass=1&classID=' + classID + '&step=1',
      type: 'POST',
      success: function(response) {
        window.location.href = response;
      },
      error: function(err) {
        alert("There was some error performing the AJAX call!");

      },
    });
  }
  
  function viewSummary(classID) {
    $.ajax({
      url: '../../src/redirectDir.php?viewSummary=1&classID=' + classID + '&step=1',
      type: 'POST',
      success: function(response) {
        window.location.href = response;
      },
      error: function(err) {
        alert("There was some error performing the AJAX call!");

      },
    });
  }

  function markVerified(classID) {
    $.ajax({
      url: '../../src/ajaxFunction.php?markVerified=1&classID='+classID,
      type: 'GET',
      success: function(response) {
        window.location.reload();
        // alert(response);
        // console.log(response);
      },
      error: function(err) {
        alert("There was some error performing the AJAX call!");

      },
    });
  }

  function markUNVerified(classID) {
    $.ajax({
      url: '../../src/ajaxFunction.php?markVerified=2&classID='+classID,
      type: 'GET',
      success: function(response) {
        window.location.reload();

      },
      error: function(err) {
        alert("There was some error performing the AJAX call!");

      },
    });
  }

  function disableClass(classID) {
    $.ajax({
      url: '../../src/ajaxFunction.php?markVerified=3&classID='+classID,
      type: 'GET',
      success: function(response) {
        window.location.reload();
      },
      error: function(err) {
        alert("There was some error performing the AJAX call!");

      },
    });
  }

  function certAuth(classID) {
    $.ajax({
      url: '../../src/ajaxFunction.php?certAuth=1&classID='+classID,
      type: 'GET',
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