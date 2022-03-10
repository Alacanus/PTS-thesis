<?php

require __DIR__ . '/../src/bootstrap.php';


//is_user_2fa();
$ClassCARD = get_Class_CARDS();

?>

<?php view('header', ['title' => 'Class page']);
?>
<div class="container-fluid mb-4">
  <div class="row justify-content-center row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
    <div class="col mt-4">
      <div class="card">
        <img src="<?= placeholderPIC?>" alt="...">
      </div>
    </div>
    <div class="col mt-4">
      <div class="card">
        <img src="https://via.placeholder.com/340x440/f9d737/FFFFFF" alt="...">
      </div>
    </div>
    <div class="col mt-4">
      <div class="card">
        <img src="https://via.placeholder.com/340x440/81f0f4/FFFFFF" alt="...">
      </div>
    </div>
    <?php
    foreach ($ClassCARD as $options) {
      $temp = $options['imageAddress'];
      $imageAddress = substr($temp,15); //../static/OIP.jpg
      echo '<div class="col mt-4">
      <div class="card" style="width: 20rem;">
              <img src="'.$imageAddress.'" class="card-img-top" alt="...">
                  <div class="card-body">
                  <h5 class="card-title">'.$options['className'].'</h5>
                  <p class="card-text">'.$options['classDescription'].'</p>
                  <a href="viewClasses.php?classID='.$options['classID'].'" class="btn btn-primary">View Details</a>
                  </div>
          </div>
      </div>
      ';
    }
  
    ?>
    </div>
  </div>
</div>





<?php view('footer') ?>
