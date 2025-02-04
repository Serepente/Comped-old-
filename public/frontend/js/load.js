document.addEventListener("DOMContentLoaded", () => {
    const progressBar = document.querySelector(".div");
    const rectangle = document.querySelector(".rectangle"); // Reference to the rectangle
    let progress = 0;

    const loadingInterval = setInterval(() => {
        const rectangleWidth = rectangle.offsetWidth; // Get current width of the rectangle
        progress += 2; // Increment progress

        const percentage = (progress / 320) * 100; // Calculate percentage (317 is full width in the example)
        progressBar.style.width = `${Math.min(percentage, 100)}%`; // Ensure width doesn't exceed 100%

        if (progress >= 320) { // When progress completes
            clearInterval(loadingInterval);
            window.location.href = "/homepage"; // Redirect to homepage.html
        }
    }, 30); // Adjust speed by modifying interval duration
});