<?php

require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/loggedin/userProfile.php';

if (is_user_2fa() == 'false'){
    redirect_to('login.php');
}else{
  audit_trail('User has successfuly viewed the userprofile page', 2);
}
?>

<?php view('header', ['title' => 'User Profile']);
?>
<?php if (isset($errors['userProfile'])) : ?>
    <div class="alert alert-error">
        <?= $errors['userProfile'] ?>
    </div>
<?php endif ?>

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
                    <img src="/PTS-thesis/static/profilepic.JPG" alt="userprofile">
                </div>
                <div class="item--4">
                    <div class="profile-name">
                        <p><?= $user['firstname'] ?> <?= $user['lastName'] ?></p>
                    </div>
                    <div class="profile-role">
                        <p><?= $user['roleType'] ?></p>
                    </div>
                    <div class="general-info">
                        <i class="ion-android-person icon-small"></i>
                        <p> <?= $user['gender'] ?></p>
                        <i class="person-outline"></i>
                        <p> <?= $user['age'] ?></p>
                        <p> <?= $user['birthday'] ?></p>
                        <p> <?= $user['contactno'] ?></p>
                        <p> <?= $user['address'] ?></p>
                    </div>
                    <div>
                        <button class="btn btn-nav btn-full" id="show-editprofile">Edit Profile</button>
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

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Make changes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form id="form" action="userprofile.php" method="post">
            <label for="usertype">User Type:</label>
            <select name="usertype" class="<?= error_class($errors, 'usertype') ?>">
            <option value="<?= $user['roleID'] ?>"><?= $user['roleType'] ?><options>
            <?php 
            foreach($option_list as $options)
            {
                echo '<option value="'.$options['roleID'].'">'.$options['roleType'].'</option>';
            }
            ?>
            </select>
            <small><?= $errors['usertype'] ?? '' ?></small><br>
            username<input type="text" name="username" id="username" value="<?= $inputs['username'] ?? $user['username'] ?>"
            class="<?= error_class($errors, 'username') ?>">
            <small><?= $errors['username'] ?? '' ?></small><br>
            email<input type="email" name="email" id="email" value="<?= $inputs['email'] ?? $user['email'] ?>"
            class="<?= error_class($errors, 'email') ?>">
            <small><?= $errors['email'] ?? '' ?></small><br>
            fname<input type="text" name="firstname" id="firstname" value="<?= $inputs['firstname'] ?? $user['firstname'] ?>"
            class="<?= error_class($errors, 'firstname') ?>">
            <small><?= $errors['firstname'] ?? '' ?></small><br>
            lname<input type="text" name="lastName" id="lastName" value="<?= $inputs['lastName'] ?? $user['lastName'] ?>"
            class="<?= error_class($errors, 'lastName') ?>">
            <small><?= $errors['lastName'] ?? '' ?></small><br>
            gender<input type="text" name="gender" id="gender" value="<?= $inputs['gender'] ?? $user['gender'] ?>"
            class="<?= error_class($errors, 'gender') ?>">
            <small><?= $errors['gender'] ?? '' ?></small><br>
            age<input type="text" name="age" id="age" value="<?= $inputs['age'] ?? $user['age'] ?>"
            class="<?= error_class($errors, 'age') ?>">
            <small><?= $errors['age'] ?? '' ?></small><br>
            <label for="birthday">birthday</label>
            <input type="date" name="birthday" id="birthday"type="date" value="<?= $inputs['birthday'] ?? $user['birthday'] ?>"
            class="<?= error_class($errors, 'birthday') ?>">
            <small><?= $errors['birthday'] ?? '' ?></small><br>
            address<input type="text" name="address" id="address" value="<?= $inputs['address'] ?? $user['address'] ?>"
            class="<?= error_class($errors, 'address') ?>">
            <small><?= $errors['address'] ?? '' ?></small><br>
            contactno<input type="text" name="contactno" id="contactno" value="<?= $inputs['contactno'] ?? $user['contactno'] ?>"
            class="<?= error_class($errors, 'contactno') ?>">
            <small><?= $errors['contactno'] ?? '' ?></small><br>
            aboutme<input type="text" name="aboutme" id="aboutme" value="<?= $inputs['aboutme'] ?? $user['aboutme'] ?>"
            class="<?= error_class($errors, 'aboutme') ?>">
            <small><?= $errors['aboutme'] ?? '' ?></small><br>
            <input type="checkbox" name="checkbox" value="YesiWANT"> I WANT to Change password button
        <div>
        <label for="password">Password New:</label>
        <input type="password" name="password" id="password" value="<?= $inputs['password'] ?? '' ?>"
               class="<?= error_class($errors, 'password') ?>">
        <small><?= $errors['password'] ?? '' ?></small>
    </div>

    <div>
        <label for="password2">Password Again:</label>
        <input type="password" name="password2" id="password2" value="<?= $inputs['password2'] ?? '' ?>"
               class="<?= error_class($errors, 'password2') ?>">
        <small><?= $errors['password2'] ?? '' ?></small>
    </div>
        <section>
            <button type="submit" name="btnCpass">Change</button>
        </section>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" form="form" class="btn btn-primary">Save changes</button>
      </div>
    </div>
</div>

PLACE IN MODAL <br>

<?php view('footer') ?>