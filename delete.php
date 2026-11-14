<?php
include "db.php";

if (!isset($_GET['id'])) {
    header("Location: dashboard.php");
    exit();
}

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM donors WHERE id=$id");

header("Location: dashboard.php");
exit();
?>
