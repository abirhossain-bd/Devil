<?php
include '../master/header.php';
include '../../../public2/font/fonts.php';
include '../../config/database.php';

$service = null;
if(isset($_GET['editid'])){
    $id = $_GET['editid'];
     $get_info = "SELECT * FROM services WHERE id='$id'";
     $connect = mysqli_query($dbm,$get_info);
     $service = mysqli_fetch_assoc($connect);
}

?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Edit "<?= $service['title'] ?>" Service</h1>
        </div>
    </div>
</div>




<div class="row">
<div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Services</h3>
            </div>

            <?php if(isset($_SESSION['updateerror'])) : ?>
            <div id="emailHelp" class="form-text text-danger " style="font-weight: bold; margin-left:30px"><?= $_SESSION['updateerror'] ?></div>
            <?php endif; unset($_SESSION['updateerror']); ?>


            <form action="./store.php?updateid=<?= $service['id'] ?>" method="POST">
            <div class="card-body">
            <div class="example-content">
            <label for="exampleInputEmail1" class="form-label">Title</label>
            <input name="title" type="text" class="form-control"  value="<?= isset($service['title']) ? $service['title'] : '' ?>" >
            <label for="exampleInputEmail1" class="form-label">Description</label>
            <textarea name="description" type="text" rows="5" class="form-control" > <?= isset($service['description']) ? $service['description'] : '' ?> </textarea>
            <label for="exampleInputEmail1" class="form-label">Icon</label>
            <input name="icon" type="text" readonly class="form-control needicon" value="<?= isset($service['icon']) ? $service['icon'] : '' ?>" >
            <div class="row">
                <div class="card my-3">
                    <div class="card-header">
                        Select Icon
                    </div>
                    <div class="card-body" style="overflow: scroll; height: 300px">
                        <?php foreach($fonts as $font) :?>
                        <span class="fa-2x m-2"><i class="<?= $font ?>" onclick="myFun(event)"></i></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            
            <button name="update" type="submit" class="btn btn-primary mt-2"><i class="material-icons">add</i>Update</button> 
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    let input = document.querySelector('.needicon');
    function myFun(e){
        input.value = e.target.classList.value ;
    }
</script>

<?php
include '../master/footer.php';

?>