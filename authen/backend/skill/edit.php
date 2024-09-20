<?php
include '../master/header.php';
include '../../../public2/font/fonts.php';

if(isset($_GET['editid'])){
    $id = $_GET['editid'];

    $select_query = "SELECT * FROM skills WHERE id ='$id'";
    $connect = mysqli_query($dbm,$select_query);
    $skill = mysqli_fetch_assoc($connect);



}


?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Edit your Skill</h1>
        </div>
    </div>
</div>




<div class="row">
<div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Skills</h3>
            </div>

            <?php if(isset($_SESSION['updateError'])) : ?>
            <div id="emailHelp" class="form-text text-danger " style="font-weight: bold; margin-left:30px"><?= $_SESSION['updateError'] ?></div>
            <?php endif; unset($_SESSION['updateError']); ?>


            <form action="./store.php?update_id=<?= $skill['id'] ?>" method="POST">
            <div class="card-body">
            <div class="example-content">
            <label for="exampleInputEmail1" class="form-label">Education Title:</label>
            <input name="title" type="text" class="form-control" value="<?= $skill['title'] ?>" >
            <label for="exampleInputEmail1" class="form-label">Education Year:</label>
            <input name="year" type="number" class="form-control" value="<?= $skill['year']?>" >
            <label for="exampleInputEmail1" class="form-label">Ratio:</label>

            <select name="ratio" id="" class="form-select">
                <?php for($i=1; $i<=100; $i++): ?>
                <option value="<?= $i ?>"  <?= $skill['ratio'] == $i ? 'selected' : '' ?>>
                    <?= $i ?>%
                
                </option>
                <?php endfor; ?>
            </select>
            
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