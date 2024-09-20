<?php
include '../master/header.php';
include '../../../public2/font/fonts.php';


?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Insert New Testimonial</h1>
        </div>
    </div>
</div>




<div class="row">
<div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Testimonials</h3>
            </div>

            <?php if(isset($_SESSION['insertError'])) : ?>
            <div id="emailHelp" class="form-text text-danger " style="font-weight: bold; margin-left:30px"><?= $_SESSION['insertError'] ?></div>
            <?php endif; unset($_SESSION['insertError']); ?>


            <form action="./store.php" method="POST" enctype="multipart/form-data">
            <div class="card-body">
            <div class="example-content">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input name="name" type="text" class="form-control"  >
            <label for="exampleInputEmail1" class="form-label"> Designation</label>
            <input name="designation" type="text" class="form-control"  >
            <label for="exampleInputEmail1" class="form-label">Description</label>
            <textarea name="description" type="text" rows="5" class="form-control" ></textarea>

            <picture class="d-block my-4 d-flex justify-content-center">
                <img id="portimage" src="../../../public2/uploads/default/demotestimonial.png" alt="" style="width: 100%; height: 250px; object-fit:contain;">
            </picture>

            <label for="exampleInputEmail1" class="form-label">Image</label>
            <input onchange="document.getElementById('portimage'). src = window.URL.createObjectURL(this.files[0])" name="image" type="file"  class="form-control needicon">
           
            
            <button name="insert" type="submit" class="btn btn-primary mt-2"><i class="material-icons">add</i>Insert</button> 
                </div>
            </div>
            </form>
        </div> 
    </div>
</div>


<?php
include '../master/footer.php';

?>