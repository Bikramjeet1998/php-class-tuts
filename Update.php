<?php include("config.php");
try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $Fname = $_POST['fname'];
    $Lname = $_POST['lname'];
    $email = $_POST['email'];
    $id = $_GET['id'];

    $res = $conn->prepare(" update employees set First_name='$Fname',Last_name='$Lname',Email='$email' where Id='$id'");
    $res->execute();
    $conn = null;
    header("location: Main.php");
} catch (PDOException $e) {
    echo "failed to delete" . $e->getMessage();
}
