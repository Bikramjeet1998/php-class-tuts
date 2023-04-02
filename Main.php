<?php 

    include("Controller/Database.class.php");
    $dbObj = new Database();

    if(isset($_POST['fname'])){ // checking if form is submitted 
        $dbObj->createUser($_POST);
    }
    $usersArray = $dbObj->getUsers();

?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=4">
    <title>Bootstrap Tables with Hover States</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="m-4">
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="row mb-3">
                <label for="inputEmail" class="col-sm-1 col-form-label"><b>First name</b></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail" name="fname" placeholder="First name" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword" class="col-sm-1 col-form-label"><b>Last name</b></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword" name="lname" placeholder="Last name" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail" class="col-sm-1 col-form-label"><b>Email</b></label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10 offset-sm-1">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <!-- table creation -->
    <div class="m-4">
        <table class="table table-hover table-dark">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach ($usersArray as $user):   
            ?>
                    <tr>
                        <td><?= $user['Id']; ?></td>
                        <td><?= $user['First_name']; ?></td>
                        <td><?= $user['Last_name']; ?></td>
                        <td><?= $user['Email']; ?></td>
                        <!-- <td>
                            <button type="button" class="btn btn-primary">Edit</button>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </td> -->
                        <td>
                            <a href="/bikram/phpconnection/Crud2/Edit.php?id=<?= $user['Id']; ?>" class="btn btn-primary"> Edit</a>
                            <a onclick="  return  confirm('are you sure want to delete record ?')"  href="/bikram/phpconnection/crud2/Del.php?id=<?= $user['Id']; ?>" class="btn btn-danger"> Delete</a>

                        </td>
                    </tr>
            <?php
                 endforeach;
            ?>
            </tbody>
        </table>