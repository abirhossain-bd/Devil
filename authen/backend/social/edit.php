<?php
include '../master/header.php';
include '../../../public2/font/fonts.php';
include '../../config/database.php';

$social = null;
if(isset($_GET['editid'])){
    $id = $_GET['editid'];
     $get_info = "SELECT * FROM socials WHERE id='$id'";
     $connect = mysqli_query($dbm,$get_info);
     $social = mysqli_fetch_assoc($connect);
}

?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Edit Social Media</h1>
        </div>
    </div>
</div>




<div class="row">
<div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Social Media</h3>
            </div>

            <?php if(isset($_SESSION['updateerror'])) : ?>
            <div id="emailHelp" class="form-text text-danger " style="font-weight: bold; margin-left:30px"><?= $_SESSION['updateerror'] ?></div>
            <?php endif; unset($_SESSION['updateerror']); ?>


            <form action="./store.php?updateid=<?= $social['id'] ?>" method="POST">
            <div class="card-body">
            <div class="example-content">
            <label for="exampleInputEmail1" class="form-label">Title</label>
            <input name="link" type="text" class="form-control"  value="<?= isset($social['link']) ? $social['link'] : '' ?>" >
            <label for="exampleInputEmail1" class="form-label">Icon</label>
            <input name="icon" type="text" readonly class="form-control needicon" value="<?= isset($social['icon']) ? $social['icon'] : '' ?>" >
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