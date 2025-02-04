// JavaScript for the event platform application with navigation and clickable indicators

// Helper function to update the active state
function updateActiveIndicator(selector) {
    document.querySelectorAll('.home, .event, .attendance, .finance, .inventory').forEach(item => {
        item.classList.remove('active');
    });
    document.querySelector(selector).classList.add('active');
}

// Add hover effect for clickable items
document.querySelectorAll('.home, .event, .attendance, .finance, .inventory, .arrowleft, .text-wrapper-6, .text-wrapper-7').forEach(element => {
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

// Back button functionality
document.querySelector('.arrowleft').addEventListener('click', () => {
    window.location.href = 'socmed';
});

// Navigation for "View Events" and "View All" buttons
document.querySelector('.text-wrapper-6').addEventListener('click', () => {
    window.location.href = 'viewEvents';
});
document.querySelector('.text-wrapper-7').addEventListener('click', () => {
    window.location.href = 'scheduleOfActivities';
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
