<?php include("config.php");
// echo $_GET['id'];
if (!empty($_REQUEST) && !empty($_GET['id'])) {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $res = $conn->prepare("delete from Employees where Id=" . $_GET['id']);
        $res->execute();
        $conn = null;
        header("location: main.php");
    } catch (PDOException $e) {
        echo "failed to delete" . $e->getMessage();
    }
}
