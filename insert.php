<?php
include "db.php";
include "header.php";

if (isset($_POST['submit'])) {
    $name  = $_POST['fullname'];
    $blood = $_POST['blood_group'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    if ($name == "" || $blood == "" || $phone == "" || $email == "") {
        echo "All fields are required";
    } else {
        $sql = "INSERT INTO donors (fullname, blood_group, phone, email)
                VALUES ('$name', '$blood', '$phone', '$email')";
        mysqli_query($conn, $sql);
        echo "Donor added successfully";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Donor</title>
    <script src="index.js"></script>
    <link rel="stylesheet" href="./styles/style2.css">
</head>
<body>

<h2>Add Blood Donor</h2>

<form method="post" onsubmit="return validateDonorForm()">
    <input type="text" name="fullname" id="fullname" placeholder="Full Name"><br><br>

    <select name="blood_group" id="blood_group">
        <option value="">Select Blood Group</option>
        <option>A+</option>
        <option>A-</option>
        <option>B+</option>
        <option>B-</option>
        <option>O+</option>
        <option>O-</option>
        <option>AB+</option>
        <option>AB-</option>
    </select><br><br>

    <input type="text" name="phone" id="phone" placeholder="Phone"><br><br>
    <input type="email" name="email" id="email" placeholder="Email"><br><br>

    <button type="submit" name="submit">Save</button>
</form>

</body>
</html>
