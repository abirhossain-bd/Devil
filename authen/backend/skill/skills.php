<?php
include '../master/header.php';
include '../../config/database.php';
$skill_query = "SELECT * FROM skills";
$skills = mysqli_query($dbm,$skill_query);

?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Skills List</h1>
        </div>
    </div>
</div>





<!-- service insert msg start -->
<?php if(isset($_SESSION['skillsuccess'])) : ?>
<div class="row">
    <div class="col-4">
    <div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-dark"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-text" style="font-weight: bold; color:green; margin-top:10px"><?= $_SESSION['skillsuccess'] ?></span>
    </div>
</div>
    </div>
</div>
<?php endif; unset($_SESSION['skillsuccess']); ?>
<!-- service insert msg end -->

<!-- update msg start -->


<?php if(isset($_SESSION['updateSuccess'])) : ?>
<div class="row">
    <div class="col-4">
    <div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-dark"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-text" style="font-weight: bold; color:green; margin-top:10px"><?= $_SESSION['updateSuccess'] ?></span>
    </div>
</div>
    </div>
</div>
<?php endif; unset($_SESSION['updateSuccess']); ?>

<!-- update msg end -->

<!-- service delete msg start -->

<?php if(isset($_SESSION['del_success'])) : ?>
<div class="row">
    <div class="col-4">
    <div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-dark"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-text" style="font-weight: bold; color:green; margin-top:10px"><?= $_SESSION['del_success'] ?></span>
    </div>
</div>
    </div>
</div>
<?php endif; unset($_SESSION['del_success']); ?>

<!-- service delete msg end -->




<!-- skill status update msg start -->


<?php if(isset($_SESSION['activestatus'])) : ?>
<div class="row">
    <div class="col-4">
    <div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-dark"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-text" style="font-weight: bold; color:green; margin-top:10px"><?= $_SESSION['activestatus'] ?></span>
    </div>
</div>
    </div>
</div>
<?php endif; unset($_SESSION['activestatus']); ?>

<?php if(isset($_SESSION['deactivestatus'])) : ?>
<div class="row">
    <div class="col-4">
    <div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-dark"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-text" style="font-weight: bold; color:green; margin-top:10px"><?= $_SESSION['deactivestatus'] ?></span>
    </div>
</div>
    </div>
</div>
<?php endif; unset($_SESSION['deactivestatus']); ?>


<!-- skill status update msg end -->

<div class="row">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Users Information</h4>
            <a name="create" href="./create.php" class="btn btn-primary "><i class="material-icons">add</i>Create</a> 
        </div>
        <div class="card-body" style="overflow: scroll; height: 400px;">
            <div class="example-content">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Year</th>
                                <th scope="col">Ratio</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $num = 1; 
                            foreach($skills as $skill):
                            ?>
                            <tr>
                                <th scope="row">
                                    <?= $num++ ?>
                                </th>
                                <td>
                                <?= $skill['title'] ?>
                                </td>
                                <td>
                                <?= $skill['year'] ?>
                                </td>
                                <td>
                                <?= $skill['ratio'] ?>%
                                </td>
                                <td>
                                <a href="store.php?status_id=<?= $skill['id'] ?>" class="<?= ($skill['status'] == 'active') ? 'badge bg-success':'badge bg-danger' ?>">
                                    <?= $skill['status'] ?>
                                </a>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-around">
                                    <a href="edit.php?editid=<?= $skill['id'] ?>" class="text-primary">
                                        <i class="fa fa-pencil fa-3x"></i>
                                    </a>
                                    <a href="./store.php?del_id=<?= $skill['id'] ?>" class="text-danger">
                                        <i class="fa fa-trash fa-3x"></i>
                                    </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>

<?php
include '../master/footer.php';

?>