// JavaScript for the Social Media Application

document.addEventListener("DOMContentLoaded", () => {
    // Helper function to update active sidebar indicators
    const updateActiveIndicator = (selector) => {
        document.querySelectorAll(".sidebar img").forEach((item) => {
            item.classList.remove("active");
        });
        const activeElement = document.querySelector(selector);
        if (activeElement) {
            activeElement.classList.add("active");
        }
    };

    // Sidebar navigation
    // const navigationMapping = {
    //     ".home": "",
    //     ".chat": "inbox",
    //     ".event": "events",
    //     ".book": "eLearningPlatform",
    //     ".profile": "profile",
    // };

    Object.entries(navigationMapping).forEach(([selector, link]) => {
        const element = document.querySelector(selector);
        if (element) {
            element.addEventListener("click", (e) => {
                e.preventDefault();
                window.location.href = link;
                updateActiveIndicator(selector);
            });
        }
    });

    // Hover effect for clickable items
    document.querySelectorAll(
        ".home, .chat, .event, .book, .profile, .faces .img, .text-wrapper-17, .text-wrapper-18"
    ).forEach((element) => {
        element.addEventListener("mouseover", () => element.classList.add("hover"));
        element.addEventListener("mouseout", () => element.classList.remove("hover"));
    });

    // Making follower images clickable
    document.querySelectorAll(".faces .img").forEach((image, index) => {
        image.addEventListener("click", () => {
            window.location.href = `profile${index + 1}.html`;
        });
    });

    // Clickable suggestions
    const suggestions = [
        { selector: ".conarcs", link: "visitprofile.html" },
        { selector: ".kenneth", link: "visitprofile.html" },
        { selector: ".jobs", link: "jobposting.html" },
        { selector: ".kyle", link: "visitprofile.html" },
    ];

    suggestions.forEach(({ selector, link }) => {
        const suggestionElement = document.querySelector(selector);
        if (suggestionElement) {
            suggestionElement.addEventListener("click", (e) => {
                e.preventDefault();
                window.location.href = link;
            });
        }
    });

    // Follow and Followed button actions
    document.querySelectorAll(".text-wrapper-17, .text-wrapper-18").forEach((button) => {
        button.addEventListener("click", () => {
            alert(`You clicked ${button.textContent.trim()}!`);
        });
    });

    // Responsive adjustments
    const adjustFontSize = () => {
        document.body.style.fontSize = window.innerWidth <= 768 ? "14px" : "16px";
    };

    window.addEventListener("resize", adjustFontSize);
    adjustFontSize();

    // Clickable images in the timeline
    document.querySelectorAll(".bro, .seminars").forEach((image) => {
        image.addEventListener("click", () => {
            window.location.href = "visitprofile.html";
        });
    });

    // Search bar functionality
    const searchBar = document.querySelector(".searchbar .search");
    if (searchBar) {
        searchBar.addEventListener("click", () => {
            alert("Search functionality coming soon!");
        });
    }

    // Post creation handler
    const postButton = document.querySelector(".div-wrapper .text-wrapper-5");
    if (postButton) {
        postButton.addEventListener("click", () => {
            alert("Your post has been shared!");
        });
    }

    const menuIcon = document.querySelector(".menu-dropdown-icon");
    const menuContent = document.querySelector(".menu-content");

    if (menuIcon && menuContent) {
        menuIcon.addEventListener("click", () => {
            menuContent.classList.toggle("active");
        });

        document.addEventListener("click", (event) => {
            if (!menuContent.contains(event.target) && !menuIcon.contains(event.target)) {
                menuContent.classList.remove("active");
            }
        });
    }


    // Sidebar navigation active state logic
    const sidebarIcons = document.querySelectorAll(".sidebar img");

    sidebarIcons.forEach((icon) => {
        icon.addEventListener("click", function() {
            sidebarIcons.forEach((icon) => icon.classList.remove("active"));
            this.classList.add("active");
        });
    });
});
// JavaScript to handle navigation on image clicks and hover effects

// Add hover effect to elements
function addHoverEffect(selector) {
    const elements = document.querySelectorAll(selector);
    elements.forEach((element) => {
        element.addEventListener("mouseover", () => {
            element.style.cursor = "pointer";
            element.style.opacity = "0.8";
        });
        element.addEventListener("mouseout", () => {
            element.style.opacity = "1";
        });
    });
}

// Redirect to specific URLs when elements are clicked
function addClickRedirect(selector, targetUrl) {
    const elements = document.querySelectorAll(selector);
    elements.forEach((element) => {
        element.addEventListener("click", () => {
            window.location.href = targetUrl;
        });
    });
}

// Add hover and click functionality for profile picture
addClickRedirect(".profile-pic[src='img/profile.jpg']", "profile.html");
addHoverEffect(".profile-pic[src='img/profile.jpg']");

// Add hover and click functionality for suggestion avatar (Kyle)
addClickRedirect(".suggestion-avatar[src='img/kyle.png']", "visitprofile.html");
addHoverEffect(".suggestion-avatar[src='img/kyle.png']");

addClickRedirect(".post-avatar[src='img/kyle.png']", "visitprofile.html");
addHoverEffect(".post-avatar[src='img/kyle.png']");

// Add hover and click functionality for job image
addClickRedirect(".job-image[src='img/jobs.png']", "jobposting.html");
addHoverEffect(".job-image[src='img/jobs.png']");
