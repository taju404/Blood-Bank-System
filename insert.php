<?php
include "db.php";
include "header.php";

if (isset($_POST['submit'])) {
    $name  = trim($_POST['fullname'] ?? '');
    $blood = trim($_POST['blood_group'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $email = trim($_POST['email'] ?? '');

    $validBloodGroups = ['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'];

    if ($name === '' || $blood === '' || $phone === '' || $email === '') {
        echo "All fields are required";
    } elseif (!in_array($blood, $validBloodGroups, true)) {
        echo "Invalid blood group";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address";
    } elseif (
        !preg_match('/^[+0-9\s()-]+$/', $phone) ||
        strlen(preg_replace('/\D/', '', $phone)) < 9 ||
        strlen(preg_replace('/\D/', '', $phone)) > 15
    ) {
        echo "Invalid phone number";
    } else {
        $sql = "INSERT INTO donors (fullname, blood_group, phone, email)
                VALUES ('$name', '$blood', '$phone', '$email')";

        if (mysqli_query($conn, $sql)) {
            echo "Donor added successfully";
        } else {
            echo "Error adding donor";
        }
    }
}
?>
