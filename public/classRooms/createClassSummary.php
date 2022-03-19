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
                                <!-- Input Data Here -->
                            </div>
                            <div class="sub-item">
                                <label for="#">Equivalent Hours: </label>
                                <!-- Input Data Here -->
                            </div>
                            <div class="sub-item">
                                <label for="#">Skill Level: </label>
                                <!-- Input Data Here -->
                            </div>
                            <div class="sub-item">
                                <label for="#">Description: </label>
                                <!-- Input Data Here -->
                            </div>
                        </div>
                    </div>
                    <div class="sum-section--02">
                        <!-- cards - For Each Need -->
                        <div class="sum-title">
                            <h3>Package</h3>
                        </div>
                        <div class="grid-container">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3>Package Name
                                            <!-- Input Date Here -->
                                        </h3>
                                    </div>
                                    <div class="card-description">
                                        <p>
                                            Description
                                            <!-- Input Date Here -->
                                        </p>
                                        <p>
                                            Unit of Measurement
                                            <!-- Input Date Here -->
                                        </p>
                                        <p>
                                            Quantity
                                            <!-- Input Date Here -->
                                        </p>
                                        <p>
                                            Price
                                            <!-- Input Date Here -->
                                        </p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <!-- Go Somewhere Button? -->
                                    <a href="#"><button class="btn btn-nav btn-full" value="">Redirect</button></a>
                                </div>
                            </div>
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
                                        <div class="td-item tbl-item--">
                                            TempData
                                            <!-- Input Date Here -->
                                        </div>
                                        <div class="td-item tbl-item--">
                                            TempData
                                            <!-- Input Date Here -->
                                        </div>
                                        <div class="td-item tbl-item--">
                                            TempData
                                            <!-- Input Date Here -->
                                        </div>
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
                                        <iframe src="https://www.youtube.com/embed/S7brGlaYNdM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                    <div class="sub-item">
                                        <label for="#">
                                            Video File
                                            <!-- Input Date Here -->
                                        </label>
                                    </div>
                                </div>
                                <div class="summary-item--04">
                                    <div class="sub-item">
                                        <label for="#">
                                            Title:
                                            <!-- Input Date Here -->
                                        </label>
                                    </div>
                                    <div class="sub-item">
                                        <label for="#">
                                            Tags:
                                            <!-- Input Date Here -->
                                        </label>
                                    </div>
                                    <div class="sub-item">
                                        <label for="#">
                                            Description:
                                            <!-- Input Date Here -->
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