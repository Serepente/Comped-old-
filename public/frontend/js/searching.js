// JavaScript for the social media application with navigation indicator and hover state

// Helper function to update the active state
function updateActiveIndicator(selector) {
    document.querySelectorAll('.overlap-group').forEach(item => {
        item.classList.remove('active');
    });
    document.querySelector(selector).classList.add('active');
}

// Add hover effect for clickable items
document.querySelectorAll('.home, .chat, .event, .book, .profile, .faces .img, .text-wrapper-17, .text-wrapper-18').forEach(element => {
    element.addEventListener('mouseover', () => {
        element.classList.add('hover');
    });
    element.addEventListener('mouseout', () => {
        element.classList.remove('hover');
    });
});

// Navigation for the sidebar icons
document.querySelector('.home').addEventListener('click', () => {
    window.location.href = 'socmed.html';
    updateActiveIndicator('.home');
});
document.querySelector('.chat').addEventListener('click', () => {
    window.location.href = 'chatbox.html';
    updateActiveIndicator('.chat');
});
document.querySelector('.event').addEventListener('click', () => {
    window.location.href = 'event.html';
    updateActiveIndicator('.event');
});
document.querySelector('.book').addEventListener('click', () => {
    window.location.href = 'elearningplatform.html';
    updateActiveIndicator('.book');
});
document.querySelector('.profile').addEventListener('click', () => {
    window.location.href = 'profile.html';
    updateActiveIndicator('.profile');
});


// Making follower images clickable
document.querySelectorAll('.faces .img').forEach((image, index) => {
    image.addEventListener('click', () => {
        // Example: Navigate to different profiles based on index
        window.location.href = `profile${index + 1}.html`;
    });
});

// Clickable suggestions
const suggestions = [
    { selector: '.conarcs', link: 'visitprofile.html' },
    { selector: '.kenneth', link: 'visitprofile.html' },
    { selector: '.jobs', link: 'jobposting.html' },
    { selector: '.kyle', link: 'visitprofile.html' }
];
suggestions.forEach(({ selector, link }) => {
    document.querySelector(selector).addEventListener('click', () => {
        window.location.href = link;
    });
});

// Follow and Followed button actions
document.querySelectorAll('.text-wrapper-17, .text-wrapper-18').forEach(button => {
    button.addEventListener('click', () => {
        alert(`You clicked ${button.textContent}!`);
        // You can add further logic to handle follow/unfollow here.
    });
});

// Responsive adjustments
function makeResponsive() {
    const resizeHandler = () => {
        if (window.innerWidth <= 768) {
            document.body.style.fontSize = '14px';
        } else {
            document.body.style.fontSize = '16px';
        }
    };
    window.addEventListener('resize', resizeHandler);
    resizeHandler();
}
makeResponsive();

// Clickable images in the timeline
document.querySelectorAll('.bro, .seminars').forEach(image => {
    image.addEventListener('click', () => {
        window.location.href = 'visitprofile.html';
    });
});

// Search bar functionality
document.querySelector('.searchbar .search').addEventListener('click', () => {
    alert('Search functionality coming soon!');
});

// Post creation handler
document.querySelector('.div-wrapper .text-wrapper-5').addEventListener('click', () => {
    alert('Your post has been shared!');
});
