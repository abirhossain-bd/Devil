<?php
include '../master/header.php';
include '../../../public2/font/fonts.php';


if(isset($_GET['editid'])){
    $id = $_GET['editid'];

    $port_query = "SELECT * FROM portfolios WHERE id='$id'";
    $connect = mysqli_query($dbm,$port_query);
    $portfolio = mysqli_fetch_assoc($connect);
}


?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Update Portfolios</h1>
        </div>
    </div>
</div>




<div class="row">
<div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Portfolios</h3>
            </div>

            <?php if(isset($_SESSION['updateError'])) : ?>
            <div id="emailHelp" class="form-text text-danger " style="font-weight: bold; margin-left:30px"><?= $_SESSION['updateError'] ?></div>
            <?php endif; unset($_SESSION['updateError']); ?>


            <form action="./store.php?update_id=<?=$portfolio['id']?>" method="POST" enctype="multipart/form-data">
            <div class="card-body">
            <div class="example-content">
            <label for="exampleInputEmail1" class="form-label">Title</label>
            <input name="title" type="text" class="form-control" value="<?= $portfolio['title'] ?>" >
            <label for="exampleInputEmail1" class="form-label">Sub Title</label>
            <input name="subtitle" type="text" class="form-control" value="<?= $portfolio['subtitle'] ?>" >
            <label for="exampleInputEmail1" class="form-label">Description</label>
            <textarea name="description" type="text" rows="5" class="form-control" ><?= $portfolio['description'] ?> </textarea>

            <picture class="d-block my-4 d-flex justify-content-center">
                <img id="portimage" src="../../../public2/uploads/portfolio/<?= $portfolio['image'] ?>" alt="" style="width: 100%; height: 250px; object-fit:contain;">
            </picture>

            <label for="exampleInputEmail1" class="form-label">Image</label>
            <input onchange="document.getElementById('portimage'). src = window.URL.createObjectURL(this.files[0])" name="image" type="file"  class="form-control needicon" >
           
            
            <button name="update" type="submit" class="btn btn-primary mt-2"><i class="material-icons">add</i>Update</button> 
                </div>
            </div>
            </form>
        </div> 
    </div>
</div>


<?php
include '../master/footer.php';

?>