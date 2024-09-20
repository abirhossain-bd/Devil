<?php
include '../master/header.php';
include '../../config/database.php';
$post_query = "SELECT * FROM posts";
$posts = mysqli_query($dbm,$post_query);
$post = mysqli_fetch_assoc($posts);

?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Post List</h1>
        </div>
    </div>
</div>









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




<!-- Port add  msg start -->


<?php if(isset($_SESSION['updatesuccess'])) : ?>
<div class="row">
    <div class="col-4">
    <div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-dark"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-text" style="font-weight: bold; color:green; margin-top:10px"><?= $_SESSION['updatesuccess'] ?></span>
    </div>
</div>
    </div>
</div>
<?php endif; unset($_SESSION['updatesuccess']); ?>


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
            <h4> Posts Information</h4>
            <a name="create" href="./create.php" class="btn btn-primary "><i class="material-icons">add</i>Create</a> 
        </div>
        <div class="card-body" style="overflow: scroll; height: 400px;">
            <div class="example-content">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Icon</th>
                                <th scope="col">Link</th>
                           
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty($post)) : ?>
                                <tr>
                                    <td colspan="5" style="font-weight: bold;" class="text-danger text-center">
                                        No data found!!
                                    </td>
                                </tr>
                            <?php else: ?> 

                            <?php
                            $num = 1 ;
                             foreach($posts as $post) :
                            ?>
                            <tr>
                                <th scope="row">
                                    
                                    <?= $num++ ?>
                                </th>
                        
                                <td>
                                    <i class="<?= $post['icon'] ?> fa-3x" style="background-color: rgba(215, 157, 168, 0.26); padding: 10px 20px; border-radius:15px; box-shadow: 2px 3px 2px"></i>
                                </td>
                                <td>
                                
                                <?= $post['link'] ?>
                                </td>
                            
                                
                                
                                <td>
                                <a href="store.php?status_id=<?= $post['id'] ?>" class="<?= ($post['status'] == 'active') ? 'badge bg-success':'badge bg-danger' ?>">
                                <?= $post['status'] ?>
                                </a>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-around">
                                    <a href="edit.php?editid=<?= $post['id'] ?>" class="text-primary">
                                        <i class="fa fa-pencil fa-3x"></i>
                                    </a>
                                    <a href="./store.php?del_id=<?= $post['id'] ?>" class="text-danger">
                                        <i class="fa fa-trash fa-3x"></i>
                                    </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach ; endif; ?>
                          
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>

<?php
include '../master/footer.php';

?>