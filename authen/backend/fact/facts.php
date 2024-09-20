<?php
include '../master/header.php';
include '../../config/database.php';
$facts_query = "SELECT * FROM facts";
$facts = mysqli_query($dbm,$facts_query);

?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Fact List</h1>
        </div>
    </div>
</div>





<!-- service insert msg start -->
<?php if(isset($_SESSION['insertSuccess'])) : ?>
<div class="row">
    <div class="col-4">
    <div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-dark"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-text" style="font-weight: bold; color:green; margin-top:10px"><?= $_SESSION['insertSuccess'] ?></span>
    </div>
</div>
    </div>
</div>
<?php endif; unset($_SESSION['insertSuccess']); ?>
<!-- service insert msg end -->




<!-- service delete msg start -->

<?php if(isset($_SESSION['delSuccessful'])) : ?>
<div class="row">
    <div class="col-4">
    <div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-dark"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-text" style="font-weight: bold; color:green; margin-top:10px"><?= $_SESSION['delSuccessful'] ?></span>
    </div>
</div>
    </div>
</div>
<?php endif; unset($_SESSION['delSuccessful']); ?>

<!-- service delete msg end -->




<!-- service status update msg start -->


<?php if(isset($_SESSION['statusUpdate'])) : ?>
<div class="row">
    <div class="col-4">
    <div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-dark"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-text" style="font-weight: bold; color:green; margin-top:10px"><?= $_SESSION['statusUpdate'] ?></span>
    </div>
</div>
    </div>
</div>
<?php endif; unset($_SESSION['statusUpdate']); ?>


<!-- service status update msg end -->

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
                                <th scope="col">Icon</th>
                                <th scope="col">Status</th>
                                <th scope="col">Count</th>
                                <th scope="col">Short Description</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php 
                           $num = 1;
                           foreach($facts as $fact) : ?>
                            <tr>
                                <th scope="row">
                                    <?= $num++ ?>
                                </th>
                                <td>
                                    
                                    <i class="<?= $fact['icon'] ?> fa-3x"></i>
                                </td>
                                <td>
                                <a href="store.php?statusid=<?= $fact['id'] ?>" class="<?= ($fact['status'] == 'active') ? 'badge bg-success':'badge bg-danger' ?>">
                                <?= $fact['status'] ?>
                                </a>
                                </td>
                                <td>
                                <?= $fact['count'] ?>
                                </td>
                                <td>
                                <?= $fact['shortdescription'] ?>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-around">
                                    <a href="edit.php?edit_id=<?= $fact['id'] ?>" class="text-primary">
                                        <i class="fa fa-pencil fa-3x"></i>
                                    </a>
                                    <a href="./store.php?factid=<?= $fact['id'] ?>" class="text-danger">
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