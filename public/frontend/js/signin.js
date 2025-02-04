// document.addEventListener("DOMContentLoaded", () => {
//     const signupForm = document.querySelector("form");

//     signupForm.addEventListener("submit", (e) => {
//         e.preventDefault(); // Prevent default form submission

//         const fullName = document.querySelector('input[placeholder="Full Name"]').value.trim();
//         const email = document.querySelector('input[placeholder="Email Address"]').value.trim();
//         const password = document.querySelector('input[placeholder="Password"]').value.trim();
//         const confirmPassword = document.querySelector('input[placeholder="Confirm Password"]').value.trim();
//         const termsCheckbox = document.querySelector('input[type="checkbox"]');

//         if (!fullName || !email || !password || !confirmPassword) {
//             alert("Please fill in all the fields.");
//         } else if (password !== confirmPassword) {
//             alert("Passwords do not match.");
//         } else if (!termsCheckbox.checked) {
//             alert("You must agree to the terms and conditions.");
//         } else {
//             alert("Account created successfully!");
//             window.location.href = "register"; // Redirect to create.html
//         }
//     });
// });