<?php

require __DIR__ . '/../src/bootstrap.php';


//is_user_2fa();
$ClassCARD = get_Class_CARDS();

?>

<?php view('header', ['title' => 'Class List']);
?>
<div class="classlist">
  <div class="cl-container">
    <h2>Class List</h2>
    <div class="grid-container">
      <?php
      foreach ($ClassCARD as $options) {
        $temp = $options['imageAddress'];
        $imageAddress = substr($temp, 15); //../static/OIP.jpg
        echo '
      
        <div class="card">
          <div class="card-header">
            <img class="broken-img" src="' . $imageAddress . '" alt="...">
          </div>
          <div class="card-body">
            <div class="card-title">
              <p>' . $options['className'] . '</p>
            </div>
            <div class="card-desc">
              <p>' . $options['classDescription'] . '</p>
            </div>
            <div class="card-footer">
              <a href="viewClasses.php?classID=' . $options['classID'] . '">
                <button class="btn btn-nav btn-full">View Class</button>
              </a>
            </div>
          </div>
        </div>
      
      ';
      }
      ?>
    </div>
  </div>
</div>

<script>
  $(".card img").on("error", function() {
    $(this).attr("src", "/PTS-thesis/static/broken-img.jpg")
  });
</script>
<?php view('footer') ?>