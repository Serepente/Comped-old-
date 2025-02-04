// JavaScript for the profile page application with navigation and clickable indicators

// Helper function to update the active state
function updateActiveIndicator(selector) {
    document.querySelectorAll('.overlap-group').forEach(item => {
        item.classList.remove('active');
    });
    document.querySelector(selector).classList.add('active');
}

// Add hover effect for clickable items
document.querySelectorAll('.home, .chat, .event, .book, .img, .arrowleft, .overlap-group-2').forEach(element => {
    element.addEventListener('mouseover', () => {
        element.classList.add('hover');
    });
    element.addEventListener('mouseout', () => {
        element.classList.remove('hover');
    });
});

// Navigation for the sidebar icons
document.querySelector('.home').addEventListener('click', () => {
    window.location.href = 'socmed';
    updateActiveIndicator('.home');
});
document.querySelector('.chat').addEventListener('click', () => {
    window.location.href = 'inbox';
    updateActiveIndicator('.chat');
});
document.querySelector('.event').addEventListener('click', () => {
    window.location.href = 'events';
    updateActiveIndicator('.event');
});
document.querySelector('.book').addEventListener('click', () => {
    window.location.href = 'eLearningPlatform';
    updateActiveIndicator('.book');
});
document.querySelector('.profile').addEventListener('click', () => {
    window.location.href = 'profile';
    updateActiveIndicator('.profile');
});


// Back button functionality
document.querySelector('.arrowleft').addEventListener('click', () => {
    window.location.href = 'socmed.html';
});
document.querySelector('.search').addEventListener('click', () => {
    window.location.href = 'searching.html';
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
