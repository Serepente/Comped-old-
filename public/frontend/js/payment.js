// Navigation functionality
document.querySelector('.vector').addEventListener('click', () => {
    window.location.href = 'socmed';
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

document.querySelector('.tools-line').addEventListener('click', () => {
    window.location.href = 'tools';
});

document.querySelector('.profile').addEventListener('click', () => {
    window.location.href = 'profile';
});

document.querySelector('.arrowleft').addEventListener('click', () => {
    window.location.href = 'events';
});

// Adding hover effects
const buttons = document.querySelectorAll('.details, .overlap-group-wrapper');

buttons.forEach(button => {
    button.addEventListener('mouseover', () => {
        button.classList.add('hover');
    });

    button.addEventListener('mouseout', () => {
        button.classList.remove('hover');
    });

    button.addEventListener('click', () => {
        buttons.forEach(btn => btn.classList.remove('active')); // Remove active state from all buttons
        button.classList.add('active'); // Add active state to the clicked button
    });
});
