<?php 
include '../master/header.php';
?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Settings</h1>
        </div>
    </div>
</div>




<div class="row">
     <!-- name update start -->
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h3>Username Update</h3>
            </div>
            <?php if(isset($_SESSION['nameupdate'])) : ?>
            <div id="emailHelp" class="form-text text-success" style="margin-left: 30px; font-weight: bold;"><?= $_SESSION['nameupdate'] ?> </div>
            <?php endif; unset($_SESSION['nameupdate']); ?>
            <form action="./update.php" method="POST">
            <div class="card-body">
            <div class="example-content">
            <label for="exampleInputEmail1" class="form-label">New Name</label>
            <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your new name">
            <?php if(isset($_SESSION['nameError'])) : ?>
            <div id="emailHelp" class="form-text text-danger"><?= $_SESSION['nameError'] ?></div>
            <?php endif; unset($_SESSION['nameError']); ?>
            <button name="nameubtn" type="submit" class="btn btn-primary mt-2"><i class="material-icons">add</i>Add</button> 
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- name update end -->

    
     <!-- email update start -->
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h3>Email Update</h3>
            </div>
            <?php if(isset($_SESSION['emailupdate'])) : ?>
            <div id="emailHelp" class="form-text text-success" style="margin-left: 30px; font-weight: bold;"><?= $_SESSION['emailupdate'] ?> </div>
            <?php endif; unset($_SESSION['emailupdate']); ?>
            <form action="./update.php" method="POST">
            <div class="card-body">
            <div class="example-content">
            <label for="exampleInputEmail1" class="form-label">New Email</label>
            <input name="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your new Email">
            <?php if(isset($_SESSION['emailError'])) : ?>
            <div id="emailHelp" class="form-text text-danger"><?= $_SESSION['emailError'] ?></div>
            <?php endif; unset($_SESSION['emailError']); ?>
            <button name="emailubtn" type="submit" class="btn btn-primary mt-2"><i class="material-icons">add</i>Add</button> 
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- email update end -->


<!-- pass update start -->
 
    <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h3>Password Update</h3>
                </div>
                <?php if(isset($_SESSION['passupdate'])) : ?>
                <div id="emailHelp" class="form-text text-success" style="margin-left: 30px; font-weight: bold;"><?= $_SESSION['passupdate'] ?> </div>
                <?php endif; unset($_SESSION['passupdate']); ?>


                <?php if(isset($_SESSION['updatefailed'])) : ?>
                <div id="emailHelp" class="form-text text-danger" style="margin-left: 30px; font-weight: bold;"><?= $_SESSION['updatefailed'] ?> </div>
                <?php endif; unset($_SESSION['updatefailed']); ?>


                <form action="./update.php" method="POST">
                <div class="card-body">
                <div class="example-content">
                <label for="exampleInputEmail1" class="form-label">Old Password</label>
                <input name="oldpass" type="password" class="form-control mb-2" id="oldpass" aria-describedby="emailHelp" placeholder="Enter your old Password">
                <div class="mt-2 mb-3" >
                        <input type="checkbox" onclick="myFun()">Show Password
                </div>
                

                <?php if(isset($_SESSION['opassError'])) : ?>
                <div id="emailHelp" class="form-text text-danger"><?= $_SESSION['opassError'] ?></div>
                <?php endif; unset($_SESSION['opassError']); ?>
                <label for="exampleInputEmail1" class="form-label">New Password</label>
                <input name="newpass" type="password" class="form-control mb-2" id="newpass" aria-describedby="emailHelp" placeholder="Enter your new Password">
                <div class="mt-2 mb-3" >
                        <input type="checkbox" onclick="myFunt()">Show Password
                </div>

                <?php if(isset($_SESSION['npassError'])) : ?>
                <div id="emailHelp" class="form-text text-danger"><?= $_SESSION['npassError'] ?></div>
                <?php endif; unset($_SESSION['npassError']); ?>
                <label for="exampleInputEmail1" class="form-label">Confirm Password</label>
                <input name="conpass" type="password" class="form-control" id="conpass" aria-describedby="emailHelp" placeholder="Confirm your password">
                
                <div class="mt-2 mb-3" >
                        <input type="checkbox" onclick="myFunti()">Show Password
                </div>


                <?php if(isset($_SESSION['cpassError'])) : ?>
                <div id="emailHelp" class="form-text text-danger"><?= $_SESSION['cpassError'] ?></div>
                <?php endif; unset($_SESSION['cpassError']); ?>

                <button name="passubtn" type="submit" class="btn btn-primary mt-2"><i class="material-icons">add</i>Add</button> 
                    </div>
                </div>
                </form>
            </div>
    </div>

<!-- pass update end -->


<!-- profile pic update start -->

    <div class="col-4">
        <div class="card">
            <div class="card-header">
                <h3>Profile picture Update</h3>
            </div>
            <?php if(isset($_SESSION['imgupdate'])) : ?>
            <div id="emailHelp" class="form-text text-success" style="margin-left: 30px; font-weight: bold;"><?= $_SESSION['imgupdate'] ?> </div>
            <?php endif; unset($_SESSION['imgupdate']); ?>
          
            <form action="./update.php" method="POST" enctype="multipart/form-data">
            <div class="card-body">
            <div class="example-content">
            <label for="exampleInputEmail1" class="form-label">New Photo</label>
            <input name="image" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
           
            <button name="ppubtn" type="submit" class="btn btn-primary mt-2"><i class="material-icons">add</i>Add</button> 
                </div>
            </div>
            </form>
        </div>
    </div>

    <!-- profile pic update end -->

    <!-- bio update start -->

    <div class="col-4">
        <div class="card">
            <div class="card-header">
                <h3>Short-Bio Update</h3>
            </div>
            <?php if(isset($_SESSION['bioupdate'])) : ?>
            <div id="emailHelp" class="form-text text-success" style="margin-left: 30px; font-weight: bold;"><?= $_SESSION['bioupdate'] ?> </div>
            <?php endif; unset($_SESSION['bioupdate']); ?>

            <form action="./update.php" method="POST">
            <div class="card-body">
            <div class="example-content">
            <label for="exampleInputEmail1" class="form-label">New Short-BIo</label>
            <input name="bio" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your new Bio">
            <?php if(isset($_SESSION['bioError'])) : ?>
            <div id="emailHelp" class="form-text text-danger"><?= $_SESSION['bioError'] ?></div>
            <?php endif; unset($_SESSION['bioError']); ?>
            <button name="bioubtn" type="submit" class="btn btn-primary mt-2"><i class="material-icons">add</i>Add</button> 
                </div>
            </div>
            </form>
        </div>
    </div>

    <!-- bio update end -->


    <!-- About section update start -->


    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h3>About Update</h3>
            </div>
            <?php if(isset($_SESSION['aboutupdate'])) : ?>
            <div id="emailHelp" class="form-text text-success" style="margin-left: 30px; font-weight: bold;"><?= $_SESSION['aboutupdate'] ?> </div>
            <?php endif; unset($_SESSION['aboutupdate']); ?>

            <form action="./update.php" method="POST">
            <div class="card-body">
            <div class="example-content">
            <label for="exampleInputEmail1" class="form-label">About you</label>
            <textarea name="about" rows="5" type="text" class="form-control" aria-describedby="emailHelp"> </textarea>
            <?php if(isset($_SESSION['aboutError'])) : ?>
            <div id="emailHelp" class="form-text text-danger"><?= $_SESSION['aboutError'] ?></div>
            <?php endif; unset($_SESSION['aboutError']); ?>
            <button name="aboutubtn" type="submit" class="btn btn-primary mt-2"><i class="material-icons">add</i>Add</button> 
                </div>
            </div>
            </form>
        </div>
    </div>

    <!-- About section update end -->

</div>
<script>
    function myFun() {
        var x = document.getElementById('oldpass');
        if (x.type === "password") {
            x.type = "text";
        }else{
            x.type = "password";
        }
    }

</script>
<script>
    function myFunt() {
        var x = document.getElementById('newpass');
        if (x.type === "password") {
            x.type = "text";
        }else{
            x.type = "password";
        }
    }
</script>

<script>
    function myFunti() {
        var x = document.getElementById('conpass');
        if (x.type === "password") {
            x.type = "text";
        }else{
            x.type = "password";
        }
    }
</script>


<?php 
include '../master/footer.php';
?>