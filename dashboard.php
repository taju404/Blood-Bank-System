<?php
include "db.php";
include "header.php"; 
$result = mysqli_query($conn, "SELECT * FROM donors");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="./styles/style1.css">
</head>
<body>

<h2>Donor List</h2>



<table border="1">
<tr>
    <th>Name</th>
    <th>Blood Group</th>
    <th>Phone</th>
    <th>Email</th>
    <th>Actions</th>
</tr>

<?php
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
        <td>{$row['fullname']}</td>
        <td>{$row['blood_group']}</td>
        <td>{$row['phone']}</td>
        <td>{$row['email']}</td>
        <td>
            <a href='./update.php?id={$row['id']}'>Edit</a> 
            <a href='./delete.php?id={$row['id']}'>Delete</a>
        </td>
    </tr>";
}
?>

</table>

</body>
</html>
