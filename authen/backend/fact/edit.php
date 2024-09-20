<?php
include '../master/header.php';
include '../../../public2/font/fonts.php';
include '../../config/database.php';

$fact = null;
if(isset($_GET['edit_id'])){
    $id = $_GET['edit_id'];
     $get_info = "SELECT * FROM facts WHERE id='$id'";
     $connect = mysqli_query($dbm,$get_info);
     $fact = mysqli_fetch_assoc($connect);
}

?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Edit "<?= $fact['shortdescription'] ?>" Fact</h1>
        </div>
    </div>
</div>




<div class="row">
<div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Facts</h3>
            </div>

            <?php if(isset($_SESSION['updateerror'])) : ?>
            <div id="emailHelp" class="form-text text-danger " style="font-weight: bold; margin-left:30px"><?= $_SESSION['updateerror'] ?></div>
            <?php endif; unset($_SESSION['updateerror']); ?>


            <form action="./store.php?update_id=<?= $fact['id'] ?>" method="POST">
            <div class="card-body">
            <div class="example-content">
            <label for="exampleInputEmail1" class="form-label">Count</label>
            <input name="count" type="number" class="form-control"  value="<?= isset($fact['count']) ? $fact['count'] : '' ?>" >
            <label for="exampleInputEmail1" class="form-label">Short Description</label>
            
            <input name="shortdescription" type="text"  class="form-control" value="<?= isset($fact['shortdescription']) ? $fact['shortdescription'] : '' ?>" >
            <label for="exampleInputEmail1" class="form-label">Icon</label>
            <input name="icon" type="text" readonly class="form-control needicon" value="<?= isset($fact['icon']) ? $fact['icon'] : '' ?>" >
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
            
            <button name="updates" type="submit" class="btn btn-primary mt-2"><i class="material-icons">add</i>Update</button> 
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