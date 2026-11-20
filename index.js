
function validateDonorForm() {
    const name = document.getElementById("fullname").value.trim();
    const blood = document.getElementById("blood_group").value.trim();
    const phone = document.getElementById("phone").value.trim();
    const email = document.getElementById("email").value.trim();

    // Check required fields
    if (!name || !blood || !phone || !email) {
        alert("All fields are required.");
        return false;
    }

    // Validate phone number
    const phonePattern = /^\+?[0-9\s-]{9,15}$/;

    if (!phonePattern.test(phone)) {
        alert("Please enter a valid phone number.");
        return false;
    }

    // Validate email address
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    return true;
}
