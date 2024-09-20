
<?php
include '../master/header.php';

$user_query = "SELECT * FROM users";

$users = mysqli_query($dbm,$user_query);

?>



<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Dashboard</h1>
        </div>
    </div>
</div>

<?php if(isset($_SESSION['temp_name'])) : ?>
<div class="row">
    <div class="col-4">
    <div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-dark"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-title"> Welcome Chief Mr. <?= $_SESSION['temp_name'] ?></span>
        <span class="alert-text">Email- <?= $_SESSION['author_email'] ?></span>
    </div>
</div>
    </div>
</div>
<?php endif; unset($_SESSION['temp_name']); ?>



<div class="row">
<div class="col-8">
    
<div class="card">
    <div class="card-header">
        <h2 style="color:aqua; background-color:gray; display:inline-block; padding:10px; border-radius: 8px; ">Users Information!</h2>
    </div>
    <div class="card_body" style="overflow: scroll; height: 400px; ">
    <div class="example-content">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $num = 1;
                            $authid = $_SESSION['author_id'];
                            foreach($users as $user) :
                                if($user['id'] == $authid) {
                                    continue;
                                }
                            ?>
                            <tr>
                                <th scope="row">
                                <?= $num++ ?>
                                </th>
                                <td>
                                    <?= $user['name'] ?>
                                </td>
                                <td>
                                    <?= $user['email'] ?>
                                </td>
                                <td>@mdo</td>
                            </tr>
                            <?php endforeach; ?>
                            
                        </tbody>
                    </table>
                </div>
    </div>
</div>
</div>
        
<?php
include '../master/footer.php';

?>