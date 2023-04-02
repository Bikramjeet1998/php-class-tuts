<?php include("config.php"); ?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=4">
    <title>Bootstrap Tables with Hover States</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
    $result = $conn->prepare("select * from employees where id=" . $_GET['id']);
    $result->execute();
    $res = $result->fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="m-4">
        <form action="Update.php?id=<?php echo $_GET['id']; ?>" method="post">
            <div class="row mb-3">
                <label for="inputEmail" class="col-sm-1 col-form-label"><b>First name</b></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail" name="fname" placeholder="First name" value="<?= $res['First_name']; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword" class="col-sm-1 col-form-label"><b>Last name</b></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword" name="lname" placeholder="Last name" value="<?= $res['Last_name']; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail" class="col-sm-1 col-form-label"><b>Email</b></label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" value="<?= $res['Email']; ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10 offset-sm-1">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>