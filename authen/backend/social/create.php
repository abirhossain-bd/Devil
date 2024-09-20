<?php
include '../master/header.php';
include '../../../public2/font/fonts.php';


?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Insert New Social Media</h1>
        </div>
    </div>
</div>




<div class="row">
<div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Social Medias</h3>
            </div>

            <?php if(isset($_SESSION['insertError'])) : ?>
            <div id="emailHelp" class="form-text text-danger " style="font-weight: bold; margin-left:30px"><?= $_SESSION['insertError'] ?></div>
            <?php endif; unset($_SESSION['insertError']); ?>


            <form action="./store.php" method="POST">
            <div class="card-body">
            <div class="example-content">

            <label for="exampleInputEmail1" class="form-label">Link</label>
            <input name="link" type="text" class="form-control"  >
            
            <label for="exampleInputEmail1" class="form-label">Icon</label>
            <input name="icon" type="text" readonly class="form-control needicon">
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
            
            <button name="insert" type="submit" class="btn btn-primary mt-2"><i class="material-icons">add</i>Insert</button> 
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