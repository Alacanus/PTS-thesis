<?php

require __DIR__ . '/../src/bootstrap.php';
$ClassCARD = get_Class_CARDS();

if (is_user_2fa() == 'false') {
  redirect_to('login.php');
} else {
  audit_trail('User has successfuly viewed the landing page', 2);
}
?>

<?php view('header', ['title' => 'Dashboard']) ?>
<main id="mymain1">
  <div class="landing-page">
    <div class="lp-container">
      <section class="lp-section--1">
        <div class="banner--container">
          <video src="/PTS-thesis/static/lp-vid2.mp4" loop muted autoplay></video>
          <div class="banner--content">
            <h2>Personal Tutoring Services</h2>
            <h3>A place where you can hire your own personal tutor.</h3>
          </div>
        </div>
      </section>
      <section class="lp-section--2">
        <div class="search-container">
          <div class="search--item--1">
            <i class="bi bi-search"></i>
            <label for="#"><i></i>Search</label>
          </div>
          <div class="search--item--2">
            <input type="text">
          </div>
          <div class="search--item--6">
            <button class="btn btn-full btn-nav">Search</button>
          </div>
        </div>
        <div class="grid-container">
          <?php // Add Function to show cards if enrolled
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
            </div>';}?>
        </div>
      </section>
    </div>
  </div>
</main>
<script>
  $(".card img").on("error", function() {
    $(this).attr("src", "/PTS-thesis/static/broken-img.jpg")
  });
</script>
<?php view('footer') ?>