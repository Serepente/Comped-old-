// JavaScript for tools history page navigation and interactivity

// Add hover effect for Borrowed and Return buttons
document.querySelectorAll('.borrowed, .return').forEach((button) => {
    button.addEventListener('mouseover', () => {
        button.style.cursor = 'pointer';
        button.style.backgroundColor = 'rgba(0, 123, 255, 0.1)';
    });

    button.addEventListener('mouseout', () => {
        button.style.backgroundColor = '';
    });
});

// Navigation for sidebar icons
document.querySelector('.home').addEventListener('click', () => {
    window.location.href = 'socmed.html';
});
document.querySelector('.attendance').addEventListener('click', () => {
    window.location.href = 'attendance';
});
document.querySelector('.event').addEventListener('click', () => {
    window.location.href = 'events';
});
document.querySelector('.finance').addEventListener('click', () => {
    window.location.href = 'finance';
});
document.querySelector('.inventory').addEventListener('click', () => {
    window.location.href = 'tools';
});

document.querySelector('.profile').addEventListener('click', () => {
    window.location.href = 'profile';
});

document.querySelector('.borrowed').addEventListener('click', () => {
    window.location.href = 'borrowTools';
});

document.querySelector('.return').addEventListener('click', () => {
    window.location.href = 'toolsHistory';
});

// Back button functionality
document.querySelector('.arrowleft').addEventListener('click', () => {
    window.location.href = 'tools';
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
