// Function to toggle between pages
function showPage(pageId) {
    const pages = document.querySelectorAll('.page');
    pages.forEach(page => {
        page.classList.remove('active');
    });

    document.getElementById(pageId).classList.add('active');
}

// Form submission placeholders
// document.getElementById('login-form').addEventListener('submit', function(e) {
//     e.preventDefault();
//     alert('Login Successful!');
// });

// document.getElementById('signup-form').addEventListener('submit', function(e) {
//     e.preventDefault();
//     alert('Account Created Successfully!');
// });

// document.addEventListener("DOMContentLoaded", () => {
//     const form = document.querySelector("form");
//     const termsCheckbox = document.querySelector(".terms input");

//     form.addEventListener("submit", (event) => {
//         // Prevent default form submission
//         event.preventDefault();

//         // Validate that terms and conditions checkbox is checked
//         if (!termsCheckbox.checked) {
//             alert("Please agree to the terms and conditions before signing up.");
//             return;
//         }

//         // Gather input values
//         const fullName = form.querySelector('input[placeholder="Full Name"]').value;
//         const email = form.querySelector('input[placeholder="Email Address"]').value;
//         const password = form.querySelector('input[placeholder="Password"]').value;
//         const confirmPassword = form.querySelector('input[placeholder="Confirm Password"]').value;

//         // Validate password match
//         if (password !== confirmPassword) {
//             alert("Passwords do not match. Please try again.");
//             return;
//         }

//         // Display success message or proceed with form submission logic
//         alert(`Thank you for signing up, ${fullName}!`);

//         // Optionally, reset the form
//         form.reset();
//     });

//     // Redirect to Login.html on clicking Login link
//     const loginLink = document.querySelector(".redirect a");
//     loginLink.addEventListener("click", (event) => {
//         event.preventDefault(); // Prevent default anchor behavior
//         window.location.href = "login.html";
//     });
// });

// // script.js
// document.addEventListener("DOMContentLoaded", () => {
//     const form = document.getElementById("create-account-form");
//     const termsCheckbox = document.getElementById("terms");
//     const roleButtons = document.querySelectorAll(".role");
//     const statusSelect = document.getElementById("status");

//     // Role button interaction
//     roleButtons.forEach(button => {
//         button.addEventListener("click", () => {
//             roleButtons.forEach(btn => btn.classList.remove("active"));
//             button.classList.add("active");
//             statusSelect.value = button.textContent.trim().toLowerCase();
//         });
//     });

//     // Form submission handler
//     form.addEventListener("submit", (event) => {
//         event.preventDefault();

//         if (!termsCheckbox.checked) {
//             alert("You must accept the terms and conditions to create an account.");
//             return;
//         }

//         const status = statusSelect.value;
//         const rfid = document.getElementById("rfid").value;
//         const schoolYear = document.getElementById("school-year").value;

//         if (!status || !rfid || !schoolYear) {
//             alert("Please fill out all fields.");
//             return;
//         }

//         alert(`Account created successfully!\nStatus: ${status}\nRFID: ${rfid}\nSchool Year: ${schoolYear}`);

//         form.reset();
//         roleButtons.forEach(btn => btn.classList.remove("active"));
//     });
// });