<?php
include "db.php";
include "header.php";
?>
<html>
    <head>
        <link rel="stylesheet" href="./styles/style3.css">
    </head>
    <body>
        <h2>Search Donor</h2>

        <form method="post">
            <input type="text" name="keyword" placeholder="Search by name or blood group">
            <button type="submit" name="search">Search</button>
        </form>

        <br>
    </body>
</html>

<?php
if (isset($_POST['search'])) {
    $key = $_POST['keyword'];

    $result = mysqli_query(
        $conn,
        "SELECT * FROM donors 
         WHERE fullname LIKE '%$key%' 
         OR blood_group LIKE '%$key%'"
    );

    if (mysqli_num_rows($result) > 0) {

        echo "<table border='1'>
        <tr>
            <th>Name</th>
            <th>Blood Group</th>
            <th>Phone</th>
            <th>Email</th>
        </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>{$row['fullname']}</td>
                <td>{$row['blood_group']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['email']}</td>
            </tr>";
        }

        echo "</table>";

    } else {
        echo "<p>No record found</p>";
    }
}
?>

<br>
<a href="dashboard.php" id="btn-dashboard">Back to Dashboard</a>
