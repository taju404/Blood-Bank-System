<?php
include "db.php";

if (!isset($_GET['id'])) {
    header("Location: dashboard.php");
    exit();
}

$id = (int) $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM donors WHERE id = $id");
$row = mysqli_fetch_assoc($result);

if (!$row) {
    die("Donor not found");
}

if (isset($_POST['update'])) {
    $name  = trim($_POST['fullname']);
    $blood = trim($_POST['blood_group']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);

    if ($name === "" || $blood === "" || $phone === "" || $email === "") {
        $error = "All fields are required";
    } else {
        mysqli_query($conn, "
            UPDATE donors SET
                fullname = '$name',
                blood_group = '$blood',
                phone = '$phone',
                email = '$email'
            WHERE id = $id
        ");

        header("Location: dashboard.php");
        exit();
    }
}

include ('header.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Donor</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 400px;
            margin: 80px auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 12px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            border-color: #007bff;
        }

        .error {
            background: #ffe0e0;
            color: #a00000;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
            text-align: center;
        }

        .buttons {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        button {
            padding: 10px 16px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
        }

        .update-btn {
            background-color: #28a745;
            color: #fff;
        }

        .update-btn:hover {
            background-color: #218838;
        }

        .cancel-btn {
            background-color: #6c757d;
            color: #fff;
            text-decoration: none;
            line-height: 36px;
            text-align: center;
            padding: 0 16px;
            border-radius: 4px;
        }

        .cancel-btn:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>

<h2>Edit Donor</h2>

<?php if (isset($error)) echo "<p style='color:red'>$error</p>"; ?>

<form method="POST">
    <label>Full Name</label><br>
    <input type="text" name="fullname" value="<?php echo $row['fullname']; ?>"><br><br>

    <label>Blood Group</label><br>
    <input type="text" name="blood_group" value="<?php echo $row['blood_group']; ?>"><br><br>

    <label>Phone</label><br>
    <input type="text" name="phone" value="<?php echo $row['phone']; ?>"><br><br>

    <label>Email</label><br>
    <input type="email" name="email" value="<?php echo $row['email']; ?>"><br><br>

    <button type="submit" name="update">Update</button>
</form>

</body>
</html>
