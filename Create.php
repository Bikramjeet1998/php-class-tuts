<?php include("config.php");

if (!empty($_REQUEST) && $_SERVER['REQUEST_METHOD'] == "POST") {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];

        $sql = "INSERT INTO Employees(First_name,Last_name,Email) VALUES ('$fname','$lname','$email')";
        $conn->exec($sql);

        $conn = null;
        header("location: Main.php");
    } catch (PDOException $e) {
        echo "failed to insert" . $e->getMessage();
    }
}
