// JavaScript for the tools page application with navigation and clickable indicators

// Helper function to update the active state
function updateActiveIndicator(selector) {
    document.querySelectorAll('.home, .event, .attendance, .finance, .inventory').forEach(item => {
        item.classList.remove('active');
    });
    document.querySelector(selector).classList.add('active');
}

// Add hover effect for clickable items
document.querySelectorAll('.home, .event, .attendance, .finance, .inventory, .profile, .borrowed, .return, .arrowleft').forEach(element => {
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
document.querySelector('.finance').addEventListener('click', () => {
    window.location.href = 'finance';
    updateActiveIndicator('.finance');
});
document.querySelector('.inventory').addEventListener('click', () => {
    window.location.href = 'tools';
    updateActiveIndicator('.inventory');
});

// Navigation for profile and back button
document.querySelector('.profile').addEventListener('click', () => {
    window.location.href = 'profile.html';
});
document.querySelector('.arrowleft').addEventListener('click', () => {
    window.location.href = 'event.html';
});

// Navigation for "Borrowed" and "Return" buttons
document.querySelector('.borrowed').addEventListener('click', () => {
    window.location.href = 'borrowTools';
});
document.querySelector('.return').addEventListener('click', () => {
    window.location.href = 'toolshistory.html';
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
