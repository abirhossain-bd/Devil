<?php
include '../master/header.php';
include '../../config/database.php';

$brand_query = "SELECT * FROM brands";
$brands = mysqli_query($dbm,$brand_query);
$brand = mysqli_fetch_assoc($brands);
?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Brands List</h1>
        </div>
    </div>
</div>









<!-- brand delete msg start -->

<?php if(isset($_SESSION['brand_del'])) : ?>
<div class="row">
    <div class="col-4">
    <div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-dark"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-text" style="font-weight: bold; color:green; margin-top:10px"><?= $_SESSION['brand_del'] ?></span>
    </div>
</div>
    </div>
</div>
<?php endif; unset($_SESSION['brand_del']); ?>

<!-- brand delete msg end -->




<!-- Port add  msg start -->


<?php if(isset($_SESSION['brand_service'])) : ?>
<div class="row">
    <div class="col-4">
    <div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-dark"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-text" style="font-weight: bold; color:green; margin-top:10px"><?= $_SESSION['brand_service'] ?></span>
    </div>
</div>
    </div>
</div>
<?php endif; unset($_SESSION['brand_service']); ?>


<!-- Port add  msg end -->


<!-- Port status msg start -->

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

<!-- active end -->

<?php if(isset($_SESSION['deactivestatus'])) : ?>
<div class="row">
    <div class="col-4">
    <div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-dark"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-text" style="font-weight: bold; color:red; margin-top:10px"><?= $_SESSION['deactivestatus'] ?></span>
    </div>
</div>
    </div>
</div>
<?php endif; unset($_SESSION['deactivestatus']); ?>


<!-- Port status msg end -->
<div class="row">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Brands Information</h4>
            <a name="create" href="./create.php" class="btn btn-primary "><i class="material-icons">add</i>Create</a> 
        </div>
        <div class="card-body" style="overflow: scroll; height: 400px;">
            <div class="example-content">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Brand Name</th>
                           
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty($brand)) : ?>
                                <tr>
                                    <td colspan="5" style="font-weight: bold;" class="text-danger text-center">
                                        No data found!!
                                    </td>
                                </tr>
                            <?php else: ?>

                           <?php 
                           $num = 1;
                           foreach($brands as $brand) :
                           ?>
                            <tr>
                                <th scope="row">
                                    <?= $num++ ?>
                                </th>
                                <td>
                                   <img src="../../../public2/uploads/brand/<?= $brand['image'] ?>" alt="" style="height: 80px; width: 80px; object-fit:cover">
                                </td>
                                <td>
                                <?= $brand['brandname'] ?>
                                </td>
                                
                                <td>
                                <a href="store.php?status_id=<?= $brand['id'] ?>" class="<?= ($brand['status'] == 'active') ? 'badge bg-success':'badge bg-danger' ?>">
                                <?= $brand['status'] ?>
                                </a>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-around">
                                    <a href="edit.php?editid=<?= $brand['id'] ?>" class="text-primary">
                                        <i class="fa fa-pencil fa-3x"></i>
                                    </a>
                                    <a href="./store.php?del_id=<?= $brand['id'] ?>" class="text-danger">
                                        <i class="fa fa-trash fa-3x"></i>
                                    </a>
                                    </div>
                                </td>
                            </tr>
                           
                          <?php endforeach; endif; ?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>

<?php
include '../master/footer.php';

?>