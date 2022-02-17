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
echo '<pre>' , var_dump($_SESSION['key']) , '</pre>';
echo '<pre>classID' , var_dump($_SESSION['post']['tempClassid']) , '</pre>';

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
              <tbody id= "filesT">
                <?php
                // if(!isset($option_list)){
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
                // }
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
</script>



<?php view('footer') ?>
