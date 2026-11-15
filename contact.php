<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <link rel="stylesheet" href="./styles/style6.css">
</head>
<body>
<?php
include "header.php";
?>

<h2>Contact Us</h2>

<form onsubmit="return validateContact()">
    <input type="text" id="name" placeholder="Your Name"><br><br>
    <input type="email" id="email" placeholder="Your Email"><br><br>
    <textarea id="message" placeholder="Message"></textarea><br><br>
    <button type="submit">Send</button>
</form>

<script>
function validateContact() {
    if (name.value === "" || email.value === "" || message.value === "") {
        alert("All fields are required");
        return false;
    }
    return true;
}
</script>

</body>
</html>
