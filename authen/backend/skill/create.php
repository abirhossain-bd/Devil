<?php
include '../master/header.php';
include '../../../public2/font/fonts.php';


?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Insert New Skill</h1>
        </div>
    </div>
</div>




<div class="row">
<div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Skills</h3>
            </div>

            <?php if(isset($_SESSION['skillfailed'])) : ?>
            <div id="emailHelp" class="form-text text-danger " style="font-weight: bold; margin-left:30px"><?= $_SESSION['skillfailed'] ?></div>
            <?php endif; unset($_SESSION['skillfailed']); ?>


            <form action="./store.php" method="POST">
            <div class="card-body">
            <div class="example-content">
            <label for="exampleInputEmail1" class="form-label">Education Title:</label>
            <input name="title" type="text" class="form-control"  >
            <label for="exampleInputEmail1" class="form-label">Education Year:</label>
            <input name="year" type="number" class="form-control"  >
            <label for="exampleInputEmail1" class="form-label">Ratio:</label>

            <select name="ratio" id="" class="form-select">
                <?php for($i=1; $i<=100; $i++): ?>
                <option value="<?= $i ?>">
                    <?= $i ?>%
                
                </option>
                <?php endfor; ?>
            </select>
            
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