<?php

require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/viewClasses.php';
// $revidewCARD=[];
$Username = "KAT";
?>
<?php view('header', ['title' => 'Class page']);

if (isset($classInfo)) {
    $teacher = find_user_by_uid($classInfo[0]['userID']);

    $temp = $classInfo[0]['imageAddress'];
    $imageAddress = substr($temp, 15);
}

?>
<main id="mymain1">
    <div class="ViewClass">
        <div class="vc-container">
            <section class="vc--section01">
                <div class="vc-block-01">
                    <div class="block vc--item1">
                        <iframe src="https://www.youtube.com/embed/S7brGlaYNdM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="block vc--item2">
                        <label for="Price">Price: &#x20B1;1000</label>
                    </div>
                    <div class="block vc--item3">
                        <button class="btn btn-nav btn-full">Purchase Class</button>
                    </div>
                </div>
                <div class="vc-block-02">
                    <div class="block vc2--item1">
                        <label for="className"><?= $classInfo[0]['className'] ?></label>
                    </div>
                    <div class="block vc2--item2">
                        <!-- IMG - fontAwesome -->
                        <img src="/PTS-thesis/static/status.svg" alt="Status Icon">
                        <label for="classStatus"><?= $classInfo[0]['classStatus'] ?></label>
                    </div>
                    <div class="block vc2--item3">
                        <!-- IMG - fontAwesome -->
                        <img src="/PTS-thesis/static/user-icon.svg" alt="User Icon">
                        <label for="userID"><?= $teacher['firstname'] . " " . $teacher['lastName'] ?></label>
                        <!-- IMG - fontAwesome -->
                        <img src="/PTS-thesis/static/clock-icon.svg" alt="Clock Icon">
                        <label for="equivalentHours"><?= $class[''] ?> Hours</label>
                    </div>
                    <div class="block vc2--item4">
                        <!-- IMG - fontAwesome -->
                        <img src="/PTS-thesis/static/create-icon.svg" alt="Create Icon">
                        <label for="createdDate">Course Created: <?= $classInfo[0]['creationDate'] ?? '' ?></label>
                        <!-- IMG - fontAwesome -->
                        <img src="/PTS-thesis/static/update.svg" alt="Update Icon">
                        <label for="modifiedDate">Course Updated:<?= $classInfo[0]['modifiedDate'] ?? '' ?></label>
                    </div>
                </div>
            </section>
            <section class="vc--section02">
                <h2>Description</h2>
                <div class="vc-block-03">
                    <div class="block vc3--item1">
                        <h3>About this Course?</h3>
                        <label for="classDescription"><?= $classInfo[0]['classDescription'] ?></label>
                    </div>
                </div>
                <div class="vc-block-04">
                    <div class="block vc3--item2">
                        <h3>Skills Invovled: </h3>
                        <label for="skillLevel"><?= $class[''] ?></label>
                    </div>
                </div>
                <div class="vc-block-05">
                    <div class="block vc3--item3">
                        <h3>Schedules Available: </h3>
                        <label for="classSchedules"><?= $class[''] ?></label>
                    </div>
                </div>
            </section>
            <section class="vc--section03">
                <div class="vc-block-06">
                    <div class="block vc4--item1">
                        <img src="/PTS-thesis/static/instructorpf.jpg" alt="Instructor-Pic">
                    </div>
                </div>
                <div class="vc-block-07">
                    <div class="block vc4--item2">
                        <h2 for="userID">
                            <?php if (isset($teacher['firstname'])) {
                                echo $teacher['firstname'] . " " . $teacher['lastName'];
                            } else {
                                echo '';
                            } ?>
                        </h2>
                        <h3>Instructor</h3>
                    </div>
                    <div class="block vc4--item3">
                        <!-- IMG - FontAwesome -->
                        <img src="/PTS-thesis/static/envelope-regular.svg" alt="">
                        <p>denniego@pts.com</p>
                    </div>
                    <div class="block vc4--item4">
                        <!-- IMG - FontAwesome -->
                        <img src="/PTS-thesis/static/location-dot-solid.svg" alt="Location-Icon">
                        <p>Pasig, Metro Manila</p>
                    </div>
                    <div class="block vc4--item5">
                        <!-- IMG - FontAwesome -->
                        <img src="/PTS-thesis/static/global.png" alt="Web-icon">
                        <p>www.denniego.com</p>
                    </div>
                </div>
                <div class="block vc-block-08">
                    <div class="block vc4--item6">
                        <h2>About Me</h2>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged.
                        </p>
                    </div>
                </div>
            </section>
            <section class="vc--section04">
                <h2>Review Cards</h2>
                <div class="grid-container">
                    <?php
                    if (!empty($revidewCARD)) {
                        foreach ($revidewCARD as $options) {
                            $reviewer = find_user_by_uid($options['userID']);
                            echo '
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <p>' . $reviewer['lastName'] . '</p>
                                    </div>
                                <div class="card-desc">
                                    <p>Overall ' . $options['totalRating'] . '</p>
                                    <p>Presentation  ' . $options['presentation'] . '</p>
                                    <p>Content ' . $options['content'] . '</p>
                                    <p>Grammar ' . $options['legibility'] . '</p>
                                    <p>Attendance ' . $options['attendance'] . '</p>
                                    <p>' . $options['description'] . '</p>
                                </div>
                            </div>
                        </div>
                        ';
                        }
                    }
                    ?>
                </div>
            </section>
            <section class="vc--section05">
                <div class="form-review">
                    <div class="form-container">
                        <form action="viewClasses.php" method="post" accept-charset="utf-8">
                            <h2>Create Review</h2>
                            <p>
                                <label for="rating">Presentation</label>
                            <div class="wrapper">
                                <input type="checkbox" id="st1--01" name="presentation" value="1" />
                                <label for="st1--01"></label>
                                <input type="checkbox" id="st2--02" name="presentation" value="2" />
                                <label for="st2--02"></label>
                                <input type="checkbox" id="st3--03" name="presentation" value="3" />
                                <label for="st3--03"></label>
                                <input type="checkbox" id="st4--04" name="presentation" value="4" />
                                <label for="st4--04"></label>
                                <input type="checkbox" id="st5--05" name="presentation" value="5" />
                                <label for="st5--05"></label>
                            </div>
                            </p>
                            <p>
                                <label for="rating">Legibility</label>
                            <div class="wrapper">
                                <input type="checkbox" id="st1--06" name="legibility" value="1" />
                                <label for="st1--06"></label>
                                <input type="checkbox" id="st2--07" name="legibility" value="2" />
                                <label for="st2--07"></label>
                                <input type="checkbox" id="st3--08" name="legibility" value="3" />
                                <label for="st3--08"></label>
                                <input type="checkbox" id="st4--09" name="legibility" value="4" />
                                <label for="st4--09"></label>
                                <input type="checkbox" id="st5--10" name="legibility" value="5" />
                                <label for="st5--10"></label>
                            </div>
                            </p>
                            <p>
                                <label for="rating">Content</label>
                            <div class="wrapper">
                                <input type="checkbox" id="st1--11" name="content" value="1" />
                                <label for="st1--11"></label>
                                <input type="checkbox" id="st2--12" name="content" value="2" />
                                <label for="st2--12"></label>
                                <input type="checkbox" id="st3--13" name="content" value="3" />
                                <label for="st3--13"></label>
                                <input type="checkbox" id="st4--14" name="content" value="4" />
                                <label for="st4--14"></label>
                                <input type="checkbox" id="st5--15" name="content" value="5" />
                                <label for="st5--15"></label>
                            </div>
                            </p>
                            <p>
                                <label for="rating">Attendance</label>
                            <div class="wrapper">
                                <input type="checkbox" id="st1--16" name="attendance" value="1" />
                                <label for="st1--16"></label>
                                <input type="checkbox" id="st2--17" name="attendance" value="2" />
                                <label for="st2--17"></label>
                                <input type="checkbox" id="st3--18" name="attendance" value="3" />
                                <label for="st3--18"></label>
                                <input type="checkbox" id="st4--19" name="attendance" value="4" />
                                <label for="st4--19"></label>
                                <input type="checkbox" id="st5--20" name="attendance" value="5" />
                                <label for="st5--20"></label>
                            </div>
                            </p>
                            <div class="wrapper--1">
                                <label for="review">Review</label>
                            </div>
                            <div class="wrapper--1">
                                <textarea name="reviewText" rows="8" cols="40"></textarea>
                            </div>
                            <p>
                                <input type="submit" value="Submit Review" class="btn btn-nav btn-full">
                            </p>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>

</main>
<!-- <div>
        <label for="milestones">Class Milestones: <?= $class[''] ?? '' ?></label>
        <table id="milestonesTable">
            <thead>
                <th>Milestone </th>
                <th>Description </th>
                <th>achieved via </th>
            </thead>
            <tbody>
            <?php if (!empty($arr_users)) { ?>
                    <?php foreach ($arr_users as $user) { ?>
                        <tr>
                            <td><?php echo $user['first_name']; ?></td>
                            <td><?php echo $user['last_name']; ?></td>
                            <td><?php echo $user['age']; ?></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
</div> -->
<!-- <div>
    <h2>Review Cards</h2>
    <div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
        <div class="card-header">Feedback DemoUsername</div>
        <div class="card-body">
            <h4 class="card-title">Overall <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i><i class="bi bi-star"></i></h4>
            <h6 class="card-title">Presentation <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i></h6>
            <h6 class="card-title">Content <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i><i class="bi bi-star"></i></h6>
            <h6 class="card-title">Grammar <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i></h6>
            <h6 class="card-title">Attendance <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></h6>
            <p class="card-text"> Chef Stevie made each lesson a fun and informative experience! She was ver encouraging and great in explaining things in a simple and direct way that made each dish a rewarding experience. By the end of the lesson I felt like I really accomplished something!</p>
        </div>
    </div>
</div> -->

<?php view('footer') ?>