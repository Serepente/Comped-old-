// JavaScript for the schedule page application with navigation and clickable indicators

// Helper function to update the active state
function updateActiveIndicator(selector) {
    document.querySelectorAll('.overlap-group, .home, .event, .attendance, .refund-line, .tools-line').forEach(item => {
        item.classList.remove('active');
    });
    document.querySelector(selector).classList.add('active');
}

// Add hover effect for clickable items
document.querySelectorAll('.home, .event, .attendance, .refund-line, .tools-line, .profile, .arrowleft').forEach(element => {
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
document.querySelector('.event').addEventListener('click', () => {
    window.location.href = 'events';
    updateActiveIndicator('.event');
});
document.querySelector('.attendance').addEventListener('click', () => {
    window.location.href = 'attendance';
    updateActiveIndicator('.attendance');
});
document.querySelector('.refund-line').addEventListener('click', () => {
    window.location.href = 'finance';
    updateActiveIndicator('.refund-line');
});
document.querySelector('.tools-line').addEventListener('click', () => {
    window.location.href = 'tools.html';
    updateActiveIndicator('.tools-line');
});
document.querySelector('.profile').addEventListener('click', () => {
    window.location.href = 'profile.html';
});

// Back button functionality
document.querySelector('.arrowleft').addEventListener('click', () => {
    window.location.href = 'events';
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
