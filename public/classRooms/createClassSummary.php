<?php
require __DIR__ . '/../../src/bootstrap.php';
require __DIR__ . '/../../src/loggedin/classStep5.php';

// if (is_user_2fa() == 'false'){
//   redirect_to('login.php');
// }else{
// audit_trail('User has procedeed step 5', 2);
// }
// if(!auth_Level('Instructor')){
//     redirect_to('../allowedNOT.php');
// }
if(isset($_GET['classID'])){
    $classID = $_GET['classID'];
   $classInfo= get_class_Info($classID);
   $_SESSION['viewClassID']=$classID;
   $revidewCARD = get_review_CARDS($classID);
   $overRatingStars = get_review_totalRating($classID);

}elseif(isset($_SESSION['post']['classID'])){
    $classID = $_SESSION['post']['classID'];
   $classInfo= get_class_Info($classID);
   $_SESSION['viewClassID']=$classID;
   $revidewCARD = get_review_CARDS($classID);
  $Card_entries = get_ingredient_CARDS($_SESSION['post']['classID']);
$option_list = get_db_Modules($_SESSION['post']['tempClassid']);
$videoFile = get_class_vidData($_SESSION['post']['classID']);

   $overRatingStars = get_review_totalRating($classID);

}
if (isset($classInfo) && $classInfo !== "") {
    $teacher = find_user_by_uid($classInfo[0]['userID']);

    $temp = $classInfo[0]['imageAddress'];
    $imageAddress = substr($temp, 15);
} else {
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
        $link = "https";
    else $link = "http";
    // Here append the common URL characters.
    $link .= "://";
    // Append the host(domain name, ip) to the URL.
    $link .= $_SERVER['HTTP_HOST'];
    // Append the requested resource location to the URL
    $link .= $_SERVER['REQUEST_URI'];
    // redirect_to('emailmsg.php');
    header("Location: allowedNot.php"); //request denied
}
if(!is_bool(display_class_Payment())){
    $pay = display_class_Payment();
    $pay['image'] = substr(getPic_byID($pay['methodfileID'])['filePath'], 15);
}else{
    $pay = [];
}
?>

<?php view('header', ['title' => 'Create Class']);
?>
<?php if (isset($errors['classRooms'])) : ?>
    <div class="alert alert-error">
        <?= $errors['classRooms'] ?>
    </div>
<?php endif ?>
<main id="mymain1">
    <div class="overlaybg">
        <div class="ccr-summary">
            <div class="ccr-container">
                <div class="container-edit-left">
                    <div class="wrapper">
                        <ul class="ccr-progbar">
                            <li class="ccr-progbar-item is-done">
                                <h3>Step 01</h3>
                            </li>
                            <li class="ccr-progbar-item is-done">
                                <h3>Step 02</h3>
                            </li>
                            <li class="ccr-progbar-item is-done">
                                <h3>Step 03</h3>
                            </li>
                            <li class="ccr-progbar-item is-done">
                                <h3>Step 04</h3>
                            </li>
                            <li class="ccr-progbar-item is-done">
                                <h3>Step 05</h3>
                            </li>
                            <li class="ccr-progbar-item current">
                                <h3>Summary</h3>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="container-edit">
                    <div class="sum-title">
                        <h2>Created Class - Summary</h2>
                    </div>
                    <div class="sum-section--01">
                        <!-- Additional Design Elements -->
                        <div class="summary-item--01">
                            <div class="sub-item">
                                <img src="\PTS-thesis\src\inc/../../public/Writable/f7f97425cafd67695409db84dc60871a.gif" alt="">
                            </div>
                            <div class="sub-item">
                                <label for="#">Class Image</label>
                            </div>
                            <!-- Input Data Here -->
                        </div>
                        <!-- Main Content -->
                        <div class="summary-item--02">
                            <div class="sub-item">
                                <label for="#">Class Name: </label>
                                <?= $classInfo[0]['className'] ?>
                            </div>
                            <div class="sub-item">
                                <label for="#">Equivalent Hours: </label>
                                <?= $classInfo[0]['equivalentHours'] ?>
                            </div>
                            <div class="sub-item">
                                <label for="#">Skill Level: </label>
                                <?= $classInfo[0]['skillLevel'] ?>
                            </div>
                            <div class="sub-item">
                                <label for="#">Description: </label>
                                <?= $classInfo[0]['classDescription'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="sum-section--02">
                        <!-- cards - For Each Need -->
                        <div class="sum-title">
                            <h3>Package</h3>
                        </div>
                        <div class="grid-container">
                        <?php
        // var_dump($_SESSION['post']['classID']);
        // var_dump($Card_entries);
        if (!empty($Card_entries)) {
          foreach ($Card_entries as $options2) {
            echo '<div class="card">
                      <div class="card-body">
                        <div class="card-title">
                          <h2>' . $options2['IngredientName'] . '</h2>
                        </div>  
                        <div class="card-description">
                          <p>
                            Description: ' . $options2['description'] . '
                          </p>
                          <p>
                            Unit of Measure: ' . $options2['unitMID'] . '
                          </p>
                           <p>
                            Quanitity: ' . $options2['amount'] . '
                          </p>
                          <p>
                            Price: ' . $options2['price'] . '
                          </p>
                        </div>
                      </div>
                      <div class="card-footer">
                        <a href="#" class="btn btn-nav btn-full">Go somewhere</a>
                      </div>
                    </div>';
          }
        }
        ?>
                        </div>
                    </div>
                    <div class="sum-section--03">
                        <!-- Table -->
                        <div class="sample-flex-con">
                            <div class="sum-title">
                                <h3>Modules</h3>
                            </div>
                            <div class="sample-flex-con2">
                                <div class="table-container table-container-sum">
                                    <div class="table-row-container tbl-heading">
                                        <div class="th-item tbl-item--">Chapter Name</div>
                                        <div class="th-item tbl-item--">Module Name</div>
                                        <div class="th-item tbl-item--">File Upload</div>
                                    </div>
                                    <div class="table-row-container">
                                    <?php
        if (is_array($option_list)) {
          foreach ($option_list as $options) {
            echo '<div class="table-row-container">';
            echo '<div class="td-item tbl-item--1">' . $options['chapter'] . '</div>';
            echo '<div class="td-item tbl-item--2">' . $options['moduleName'] . '</div>';
            echo '<div class="td-item tbl-item--2">' . $options['fileName'] . '</div>';
            echo '<div class="td-item tbl-item--1">';
            echo '<button class="btn btn-table btn-full" onclick ="downloadFile(' . $options['fileID'] . ')" ><i class="bi bi-download"></i></button>';
            echo '<button class="btn btn-table btn-table-red" onclick ="deleteFile2(' . $options['fileID'] . ')"><i class="bi bi-trash"></i></button>';
            echo '</div>';
            echo '</div>';
          }
        }
        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sum-section--04">
                        <div class="sample-flex-con">
                            <div class="sum-title">
                                <h3>Videos</h3>
                            </div>
                            <div class="sample-flex-con2">
                                <div class="summary-item--03">
                                    <div class="sub-item">
                                        <!-- Video inputed needs an element/phpcode -->
                                        <iframe src="https://www.youtube.com/embed/lR-u5iHozBo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                    <div class="sub-item">
                                        <label for="#">
                                            Video File
                                            
                                        </label>
                                    </div>
                                </div>
                                <div class="summary-item--04">
                                    <div class="sub-item">
                                        <label for="#">
                                            Title:
                                            <?= $videoFile['vidTitle']?>
                                        </label>
                                    </div>
                                    <div class="sub-item">
                                        <label for="#">
                                            Tags:
                                            <?= $videoFile['vidDesc']?>
                                        </label>
                                    </div>
                                    <div class="sub-item">
                                        <label for="#">
                                            Description:
                                            <?= $videoFile['vidTags']?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="sum-section--05">
                        <!-- simple Card -->
                        <div class="sample-flex-con">
                            <div class="sum-title">
                                <h3>Payment</h3>
                            </div>
                            <div class="sample-flex-con2">
                                <div class="summary-item--03">
                                    <div class="sub-item">
                                        <!-- <img src="\PTS-thesis\public\Writable\Capture33.png" alt="placeholder">substr(getPic_byID($pay['methodfileID']), 15) -->
                                        <img src="<?= $pay['image']?>" alt="placeholder">

                                    </div>
                                    <div class="sub-item">
                                        <label for="#">Payment Image</label>
                                    </div>
                                </div>
                                <div class="summary-item--04">
                                    <div class="sub-item">
                                        <label for="#">Payment Method</label>
                                        <label for="#"><?= $pay['paylistID']?></label>

                                    </div>
                                    <div class="sub-item">
                                        <label for="#">Account Name:</label>
                                        <label for="#"><?= decrypt0($pay['accountName'])?></label>

                                    </div>
                                    <div class="sub-item">
                                        <label for="#">Account No:</label>
                                        <label for="#"><?= decrypt0($pay['accountDetail'])?></label>

                                    </div>
                                    <div class="sub-item">
                                        <label for="#">Upload Image ID:</label>
                                        <label><?=$pay['methodfileID']?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-element-btn">
                        <form action='../classlist.php' method="POST">
                            <button class="btn btn-nav btn-full">Publish</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<!-- <pre>
    <?= var_dump($_SESSION['post']) ?>
    <form action ='../classlist.php' method="POST">
        <button>Publish</button>
    </form>
</pre> -->

<?php view('footer') ?>