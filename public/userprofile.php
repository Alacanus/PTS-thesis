<?php

require __DIR__ . '/../src/bootstrap.php';
if (is_user_2fa() == 'false') {
    redirect_to('login.php');
} else {
    audit_trail('User has successfuly viewed the userprofile page', 2);
}
require __DIR__ . '/../src/loggedin/userProfile.php';

$temp = getprofilePic($_SESSION['user_id']);
$imageAddress = substr($temp['filePath'], 15);

?>

<?php view('header', ['title' => 'User Profile']);
?>
<?php if (isset($errors['userProfile'])) : ?>
    <div class="alert alert-error">
        <?= $errors['userProfile'] ?>
    </div>
<?php endif ?>
<main id="mymain1">
    <div class="userprofile">
        <div class="profile-conainter">
            <section class="section-myprofile">
                <div class="row">
                    <div class="item--1">
                        <h2>My Profile</h2>
                    </div>
                    <div class="item--2">
                        <hr>
                    </div>
                </div>
                <div class="row row-style">
                    <div class="item--3">
                        <img src="<?= $imageAddress ?>" alt="userprofile">
                    </div>
                    <div class="item--4">
                        <div class="profile-name">
                            <p><?= $user['firstname'] ?> <?= $user['lastName'] ?></p>
                        </div>
                        <div class="profile-role">
                            <p><?= $user['roleType'] ?></p>
                        </div>
                        <div class="general-info">
                            <div class="gi-item">
                                <i class="bi bi-person" title="Gender"></i>
                                <p id="gi-p"><?= $user['gender'] ?></p>
                            </div>
                            <div class="gi-item">
                                <i class="bi bi-person-badge" title="Age"></i>
                                <p id="gi-p"><?= $user['age'] ?></p>
                            </div>
                            <div class="gi-item">
                                <i class="bi bi-calendar" title="Birthday"></i>
                                <p id="gi-p"><?= $user['birthday'] ?></p>
                            </div>
                            <div class="gi-item">
                                <i class="bi bi-phone" title="Contact No"></i>
                                <p id="gi-p"><?= $user['contactno'] ?></p>
                            </div>
                            <div class="gi-item">
                                <i class="bi bi-card-text" title="Address"></i>
                                <p id="gi-p"><?= $user['address'] ?></p>
                            </div>
                        </div>
                        <div class="edit-user-profile">
                            <button class="btn btn-nav btn-full" id="show-modal">Edit Profile</button>
                            <div id="edit-modal" class="overlay-new">
                                <div class="edit-profile">
                                    <h2>Edit Profile</h2>
                                    <form id="form" action="userprofile.php" method="post" enctype="multipart/form-data">
                                        <div class="container-edit-left">
                                            <div class="form-element">
                                                <img src="<?= $imageAddress ?>" alt="" width="130" height="50">
                                            </div>
                                            <div class="form-element">
                                                <label for="imageUpload">Upload New Image</label>
                                                <input type="file" name="imageUpload" id="imageUpload" value="<?= $imageAddress ?>">
                                            </div>
                                            <div class="form-element">
                                                <label>Username</label>
                                                <input type="text" name="username" id="username" value="<?= $inputs['username'] ?? $user['username'] ?>" class="<?= error_class($errors, 'username') ?>">
                                                <small><?= $errors['username'] ?? '' ?></small>
                                            </div>
                                            <div class="form-element">
                                                <label>Email</label>
                                                <input type="email" name="email" id="email" value="<?= $inputs['email'] ?? $user['email'] ?>" class="<?= error_class($errors, 'email') ?>" required>
                                                <small><?= $errors['email'] ?? '' ?></small>
                                            </div>
                                            <div class="form-element">
                                                <input type="checkbox" name="checkbox" value="YesiWANT">
                                                <label>I want to change my password</label>
                                            </div>
                                            <div class="form-element">
                                                <label for="password">Password New:</label>
                                                <input type="password" name="password" id="password" value="<?= $inputs['password'] ?? '' ?>" class="<?= error_class($errors, 'password') ?>">
                                                <small><?= $errors['password'] ?? '' ?></small>
                                            </div>
                                            <div class="form-element">
                                                <label for="password2">Password Again:</label>
                                                <input type="password" name="password2" id="password2" value="<?= $inputs['password2'] ?? '' ?>" class="<?= error_class($errors, 'password2') ?>">
                                                <small><?= $errors['password2'] ?? '' ?></small>
                                            </div>
                                        </div>
                                        <div class="container-edit">
                                            <div class="form-style">
                                                <div class="close-btn">&times;</div>
                                                <div class="form-element">
                                                    <label for="usertype">User Type:</label>
                                                    <select name="usertype" class="<?= error_class($errors, 'usertype') ?>">
                                                        <option value="<?= $user['roleID'] ?>"><?= $user['roleType'] ?><options>
                                                                <?php
                                                                foreach ($option_list as $options) {
                                                                    echo '<option value="' . $options['roleID'] . '">' . $options['roleType'] . '</option>';
                                                                }
                                                                ?>
                                                    </select>
                                                </div>
                                                <div class="form-element">
                                                    <div class="inline-item-1">
                                                        <label>First Name</label>
                                                        <small><?= $errors['firstname'] ?? '' ?></small>
                                                        <input type="text" name="firstname" id="firstname" value="<?= $inputs['firstname'] ?? $user['firstname'] ?>" class="<?= error_class($errors, 'firstname') ?>" required>
                                                    </div>
                                                    <div class="inline-item-2">
                                                        <label>Last Name</label>
                                                        <input type="text" name="lastName" id="lastName" value="<?= $inputs['lastName'] ?? $user['lastName'] ?>" class="<?= error_class($errors, 'lastName') ?>">
                                                        <small><?= $errors['lastName'] ?? '' ?></small>
                                                    </div>
                                                </div>
                                                <div class="form-element">
                                                    <div class="inline-item-3">
                                                        <label>Gender</label>
                                                        <select name="gender" id="gender" required>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                    <div class="inline-item-4">
                                                        <label for="birthday">Birthday</label>
                                                        <input type="date" name="birthday" id="birthday" type="date" value="<?= $inputs['birthday'] ?? $user['birthday'] ?>" class="<?= error_class($errors, 'birthday') ?>" required>
                                                        <small><?= $errors['birthday'] ?? '' ?></small>
                                                    </div>
                                                    <div class="inline-item-5">
                                                        <label>Age</label>
                                                        <input type="number" name="age" id="age" min="1" max="110" value="<?= $inputs['age'] ?? $user['age'] ?>" class="<?= error_class($errors, 'age') ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-element">
                                                    <label>Contact no.</label>
                                                    <input type="text" name="contactno" id="contactno" value="<?= $inputs['contactno'] ?? $user['contactno'] ?>" class="<?= error_class($errors, 'contactno') ?>" required>
                                                    <small><?= $errors['contactno'] ?? '' ?></small>
                                                </div>
                                                <div class="form-element">
                                                    <label>Address</label>
                                                    <input type="text" name="address" id="address" value="<?= $inputs['address'] ?? $user['address'] ?>" class="<?= error_class($errors, 'address') ?>" required>
                                                    <small><?= $errors['address'] ?? '' ?></small>
                                                </div>
                                                <div class="form-element">
                                                    <label>About Me</label>
                                                    <textarea type="text" name="aboutme" id="aboutme" value="<?= $inputs['aboutme'] ?? $user['aboutme'] ?>" class="<?= error_class($errors, 'aboutme') ?>" required><?= $user['aboutme'] ?></textarea>
                                                    <small><?= $errors['aboutme'] ?? '' ?></small>
                                                </div>
                                                <div class="form-element margin-minus">
                                                    <button type="submit" class="btn btn-nav btn-full btn-edit">Save Changes</button>
                                                    <button type="button" class="btn btn-nav btn-ghost btn-edit" data-bs-dismiss="modal">Cancel</button>
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section-aboutme header-space">
                <div class="row">
                    <div class="item--1">
                        <h2>About Me</h2>
                    </div>
                    <div class="item--6">
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <label for="aboutme"><?= $user['aboutme'] ?></label>
                </div>
            </section>
            <section class="section-enrolled">
                <div class="row">
                    <div class="item--1">
                        <h2>Enrolled Classes</h2>
                    </div>
                    <div class="item--5">
                        <hr>
                    </div>
                </div>
                <div class="grid-container">
                    <div class="card">
                        <div class="card-header">
                            <img src="/PTS-thesis/static/loginbg.jpg" alt="Card-Header">
                        </div>
                        <div class="card-body">
                            <div class="card-title">
                                <p>Cooking Adobo: The Chinese Way</p>
                            </div>
                            <span class="tag tag-blue">Status</span>
                            <div class="card-desc">
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                    when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                </p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <img src="/PTS-thesis/static/instructorpf.jpg" alt="instructor picture">
                            <div class="footer-info">
                                <p>Dennie Go</p>
                            </div>
                            <a href="#"><i></i></a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <img src="/PTS-thesis/static/loginbg.jpg" alt="Card-Header">
                        </div>
                        <div class="card-body">
                            <div class="card-title">
                                <p>Cooking Adobo: The Chinese Way</p>
                            </div>
                            <span class="tag tag-blue">Status</span>
                            <div class="card-desc">
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                    when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                </p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <img src="/PTS-thesis/static/instructorpf.jpg" alt="instructor picture">
                            <div class="footer-info">
                                <p>Dennie Go</p>
                            </div>
                            <a href="#"><i></i></a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <img src="/PTS-thesis/static/loginbg.jpg" alt="Card-Header">
                        </div>
                        <div class="card-body">
                            <div class="card-title">
                                <p>Cooking Adobo: The Chinese Way</p>
                            </div>
                            <span class="tag tag-blue">Status</span>
                            <div class="card-desc">
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                    when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                </p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <img src="/PTS-thesis/static/instructorpf.jpg" alt="instructor picture">
                            <div class="footer-info">
                                <p>Dennie Go</p>
                            </div>
                            <a href="#"><i></i></a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <img src="/PTS-thesis/static/loginbg.jpg" alt="Card-Header">
                        </div>
                        <div class="card-body">
                            <div class="card-title">
                                <p>Cooking Adobo: The Chinese Way</p>
                            </div>
                            <span class="tag tag-blue">Status</span>
                            <div class="card-desc">
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                    when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                </p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <img src="/PTS-thesis/static/instructorpf.jpg" alt="instructor picture">
                            <div class="footer-info">
                                <p>Dennie Go</p>
                            </div>
                            <a href="#"><i></i></a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</main>

<!-- W3School for Modal Button -->

<script>
    var btn = document.getElementById("show-modal");
    var modal = document.getElementById("edit-modal");
    var span = document.getElementsByClassName("close-btn")[0];

    btn.onclick = function() {
        modal.style.display = "block";
    }
    span.onclick = function() {
        modal.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
<?php view('footer') ?>