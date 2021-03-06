<?php

require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/viewClasses.php';
// $revidewCARD=[];
$Username = "KAT";
?>
<?php


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
view('header', ['title' => 'Class page']);
?>
<main id="mymain1">
    <div class="ViewClass">
        <div class="vc-container">
            <div class="section-bg--01">
                <section class="vc--section01">
                    <div class="vc-block-01">
                        <div class="vc--item">
                            <iframe src="https://www.youtube.com/embed/S7brGlaYNdM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="vc--item">
                            <label for="Price">Price: &#x20B1;1000</label>
                        </div>
                        <div class="vc--item">
                            <button class="btn btn-nav btn-full" onclick="Purchase(<?= $classInfo[0]['classID'] ?>)">Purchase Class</button>
                        </div>
                    </div>
                    <div class="vc-block-02">
                        <div class="vc--item">
                            <label for="className"><?= $classInfo[0]['className'] ?></label>
                        </div>
                        <div class="vc--item">
                            <div class="vc--sub-item">
                                <i class="bi bi-check-circle"></i>
                                <label for="classStatus"><?= $classInfo[0]['classStatus'] ?></label>
                            </div>
                            <div class="vc--sub-item">
                                <i class="bi bi-star-fill"></i>
                                <label> Total Rating:
                                    <?php if (isset($overRatingStars['avg'])) {
                                        echo mb_substr($overRatingStars['avg'], 0, 4);
                                    } else {
                                        echo 0;
                                    } ?>/ 5.0
                                </label>
                            </div>
                        </div>
                        <div class="vc--item">
                            <i class="bi bi-person-circle"></i>
                            <label for="userID">Instructor: <?= $teacher['firstname'] . " " . $teacher['lastName'] ?></label>
                        </div>
                        <div class="vc--item">
                            <i class="bi bi-clock"></i>
                            <label for="equivalentHours">Class Duration: <?= $classInfo[0]['equivalentHours'] ?></label>
                        </div>
                        <div class="vc--item">
                            <div class="vc--sub-item">
                                <i class="bi bi-clipboard-plus"></i>
                                <label for="createdDate">Course Created: <?= $classInfo[0]['creationDate'] ?? '' ?></label>
                            </div>
                            <div class="vc--sub-item">
                                <i class="bi bi-pencil-square"></i>
                                <label for="modifiedDate">Course Updated:<?= $classInfo[0]['modefiedDate'] ?? '' ?></label>
                            </div>
                        </div>
                    </div>
                    <!-- <button onclick="editClass(<?= $classInfo[0]['classID']?>)">Edit Class</button> -->
                    <button>Go to Class</button>
                </section>
            </div>
            <div class="section-bg--02">
                <section class="vc--section02">
                    <div class="vc-block-03">
                        <h2>Description</h2>
                    </div>
                    <div class="vc-block-04">
                        <div class="vc--item">
                            <h3>About this Course?</h3>
                            <label for="classDescription"><?= $classInfo[0]['classDescription'] ?></label>
                        </div>
                        <div class="vc--item">
                            <h3>Skills Level: </h3>
                            <label for="skillLevel"><?= $class[''] ?></label>
                        </div>
                        <div class="vc--item">
                            <h3>Schedules Available: </h3>
                            <label for="classSchedules"><?= $classInfo[0]['skillLevel'] ?></label>
                        </div>
                    </div>
                </section>
            </div>
            <div class="section-bg--03">
                <section class="vc--section03">
                    <div class="vc-block-05">
                        <div class="vc--item">
                            <img src="/PTS-thesis/static/instructorpf.jpg" alt="Instructor-Pic">
                        </div>
                    </div>
                    <div class="vc-block-06">
                        <div class="vc--item">
                            <h2 for="userID">
                                <?php if (isset($teacher['firstname'])) {
                                    echo $teacher['firstname'] . " " . $teacher['lastName'];
                                } else {
                                    echo '';
                                } ?>
                            </h2>
                            <h3>Instructor</h3>
                        </div>
                        <div class="vc--item">
                            <p><i class="bi bi-envelope"></i> denniego@pts.com</p>
                        </div>
                        <div class="vc--item">
                            <p><i class="bi bi-geo-alt"></i> Pasig, Metro Manila</p>
                        </div>
                        <div class="vc--item">
                            <p><i class="bi bi-globe"></i> www.denniego.com</p>
                        </div>
                    </div>
                    <div class="vc-block-07">
                        <div class="vc--item">
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
            </div>
            <div class="section-bg--04">
                <section class="vc--section04">
                    <h2>Review Cards</h2>
                    <div class="grid-container">
                        <?php
                        if (!empty($revidewCARD)) {
                            foreach ($revidewCARD as $options) {
                                $reviewer = find_user_by_uid($options['userID']);
                                $revidewCARDfeild['presentation'] = '';
                                $revidewCARDfeild['content'] = '';
                                $revidewCARDfeild['legibility'] = '';
                                $revidewCARDfeild['attendance'] = '';
                                $revidewCARDfeild['totalRating'] = '';
                                $totalRating = ($options['presentation'] + $options['content'] + $options['legibility'] + $options['attendance']) / 4;
                                $wholeNum = (int)$totalRating;
                                $frac  = $totalRating - $wholeNum;

                                for ($x = 1; $x <= $options['presentation']; $x++) {
                                    $revidewCARDfeild['presentation'] .= '<i class="bi bi-star-fill"></i>';
                                }
                                for ($x = 1; $x <= $options['content']; $x++) {
                                    $revidewCARDfeild['content'] .= '<i class="bi bi-star-fill"></i>';
                                }
                                for ($x = 1; $x <= $options['legibility']; $x++) {
                                    $revidewCARDfeild['legibility'] .= '<i class="bi bi-star-fill"></i>';
                                }
                                for ($x = 1; $x <= $options['attendance']; $x++) {
                                    $revidewCARDfeild['attendance'] .= '<i class="bi bi-star-fill"></i>';
                                }
                                for ($x = 1; $x <= $wholeNum; $x++) {
                                    $revidewCARDfeild['totalRating'] .= '<i class="bi bi-star-fill"></i>';
                                }
                                //set empty stars
                                for ($x = 1; $x <= (5 - $options['presentation']); $x++) {
                                    $revidewCARDfeild['presentation'] .= '<i class="bi bi-star"></i>';
                                }
                                for ($x = 1; $x <= (5 - $options['content']); $x++) {
                                    $revidewCARDfeild['content'] .= '<i class="bi bi-star"></i>';
                                }
                                for ($x = 1; $x <= (5 - $options['legibility']); $x++) {
                                    $revidewCARDfeild['legibility'] .= '<i class="bi bi-star"></i>';
                                }
                                for ($x = 1; $x <= (5 - $options['attendance']); $x++) {
                                    $revidewCARDfeild['attendance'] .= '<i class="bi bi-star"></i>';
                                }
                                if ($frac >= 0.5) {
                                    $revidewCARDfeild['totalRating'] .= '<i class="bi bi-star-half"></i>';
                                    for ($x = 1; $x <= (4 - $wholeNum); $x++) {
                                        $revidewCARDfeild['totalRating'] .= '<i class="bi bi-star"></i>';
                                    }
                                } else {
                                    for ($x = 1; $x <= (5 - $wholeNum); $x++) {
                                        $revidewCARDfeild['totalRating'] .= '<i class="bi bi-star"></i>';
                                    }
                                }
                                echo '
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <p> Reviewer: ' . $reviewer['lastName'] . '</p>
                                        </div>
                                    <div class="card-desc">
                                        <p>Overall ' . $revidewCARDfeild['totalRating'] . '</p>
                                        <p>Presentation  ' . $revidewCARDfeild['presentation'] . '</p>
                                        <p>Content ' . $revidewCARDfeild['content'] . '</p>
                                        <p>Grammar ' . $revidewCARDfeild['legibility'] . '</p>
                                        <p>Attendance ' . $revidewCARDfeild['attendance'] . '</p>
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
            </div>
            <div class="section-bg--05">
                <section class="vc--section05">
                    <div class="form-review">
                        <div class="form-container">
                            <form action="viewClasses.php" method="post" accept-charset="utf-8">
                                <h2>Create Review</h2>
                                <p>
                                    <label for="rating">Presentation</label>
                                    <div class="wrapper">
                                        <input type="checkbox" id="st1--01" name="presentation" value="5" />
                                        <label for="st1--01"></label>
                                        <input type="checkbox" id="st2--02" name="presentation" value="4" />
                                        <label for="st2--02"></label>
                                        <input type="checkbox" id="st3--03" name="presentation" value="3" />
                                        <label for="st3--03"></label>
                                        <input type="checkbox" id="st4--04" name="presentation" value="2" />
                                        <label for="st4--04"></label>
                                        <input type="checkbox" id="st5--05" name="presentation" value="1" />
                                        <label for="st5--05"></label>
                                    </div>
                                </p>
                                <p>
                                    <label for="rating">Legibility</label>
                                    <div class="wrapper">
                                        <input type="checkbox" id="st1--06" name="legibility" value="5" />
                                        <label for="st1--06"></label>
                                        <input type="checkbox" id="st2--07" name="legibility" value="4" />
                                        <label for="st2--07"></label>
                                        <input type="checkbox" id="st3--08" name="legibility" value="3" />
                                        <label for="st3--08"></label>
                                        <input type="checkbox" id="st4--09" name="legibility" value="2" />
                                        <label for="st4--09"></label>
                                        <input type="checkbox" id="st5--10" name="legibility" value="1" />
                                        <label for="st5--10"></label>
                                    </div>
                                </p>
                                <p>
                                    <label for="rating">Content</label>
                                    <div class="wrapper">
                                        <input type="checkbox" id="st1--11" name="content" value="5" />
                                        <label for="st1--11"></label>
                                        <input type="checkbox" id="st2--12" name="content" value="4" />
                                        <label for="st2--12"></label>
                                        <input type="checkbox" id="st3--13" name="content" value="3" />
                                        <label for="st3--13"></label>
                                        <input type="checkbox" id="st4--14" name="content" value="2" />
                                        <label for="st4--14"></label>
                                        <input type="checkbox" id="st5--15" name="content" value="1" />
                                        <label for="st5--15"></label>
                                    </div>
                                </p>
                                <p>
                                    <label for="rating">Attendance</label>
                                    <div class="wrapper">
                                        <input type="checkbox" id="st1--16" name="attendance" value="5" />
                                        <label for="st1--16"></label>
                                        <input type="checkbox" id="st2--17" name="attendance" value="4" />
                                        <label for="st2--17"></label>
                                        <input type="checkbox" id="st3--18" name="attendance" value="3" />
                                        <label for="st3--18"></label>
                                        <input type="checkbox" id="st4--19" name="attendance" value="2" />
                                        <label for="st4--19"></label>
                                        <input type="checkbox" id="st5--20" name="attendance" value="1" />
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

<script>
    // function editClass(classID){
    // $.ajax({
    //     url: '../src/redirectDir.php?editClass=1&classID='+classID+'&step=1',
    //     type: 'POST',
    //     success: function(response) {
    //     // console.log(response);
    //     // alert(response);
    //         window.location.href = response;
    //     },
    //     error: function(err) {
    //         alert("There was some error performing the AJAX call!");

    //     },
    //     });
    //     }

        function Purchase(classID){
    $.ajax({
        url: '../src/redirectDir.php?purChase=1&classID='+classID+'&step=1',
        type: 'POST',
        success: function(response) {
        // console.log(response);
        // alert(response);
            window.location.href = response;
        },
        error: function(err) {
            alert("There was some error performing the AJAX call!");

        },
        });
        }
</script>
<?php view('footer') ?>