function validateDonorForm() {
    let name = document.getElementById("fullname").value;
    let blood = document.getElementById("blood_group").value;
    let phone = document.getElementById("phone").value;
    let email = document.getElementById("email").value;

    if (name === "" || blood === "" || phone === "" || email === "") {
        alert("All fields are required");
        return false;
    }

    if (phone.length < 9) {
        alert("Invalid phone number");
        return false;
    }

    return true;
}
