<?php

require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/viewClasses.php';

?>

<?php view('header', ['title' => 'Class page']);
?>
<main id="mymain1">
    <h1><?= $class['']?>'s page</h1>
    <img src="../static/OIP.jpg" class="card-img-top" style="width: 40rem;">
    <div>
        <label for="className">class name: <?= $class['']?></label>

    </div>
    <div>
        <label for="classStatus">Status: <?= $class['']?></label>

    </div>
    <div>
        <label for="classDescription">Description: <?= $class['']?></label>

    </div>
    <div>
        <label for="classSchedules">Schedules Available: <?= $class['']?></label>

    </div>
    <div>
        <label for="classVideointo">View introduction: <?= $class['']?></label>

    </div>
    <div>
        <label for="classImage">Class banner: <?= $class['']?></label>

    </div>
    <div>
        <label for="createdDate">Teaching students since: <?= $class['']?></label>

    </div>

    <div>
        <label for="modifiedDate">Updated on: <?= $class['']?></label>

    </div>
    <div>
        <label for="equivalentHours">equivalent Hours: <?= $class['']?></label>

    </div>
    <div>
        <label for="skillLevel">skill Level: <?= $class['']?></label>

    </div>

    <div>
        <label for="userID">Teacher name: <?= $class['']?></label>

    </div>
    <div>
        <label for="milestones">Class Milestones: <?= $class['']?></label>
        <table id="milestonesTable">
    <thead>
        <th>Milestone </th>
        <th>Description </th>
        <th>achieved via </th>
    </thead>
    <tbody>
        <?php if(!empty($arr_users)) { ?>
            <?php foreach($arr_users as $user) { ?>
                <tr>
                    <td><?php echo $user['first_name']; ?></td>
                    <td><?php echo $user['last_name']; ?></td>
                    <td><?php echo $user['age']; ?></td>
                </tr>
            <?php } ?>
        <?php } ?>
    </tbody>
</table>
    </div>
</main>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal">
  Edit
</button>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



<?php view('footer') ?>
