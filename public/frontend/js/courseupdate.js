// Navigation functionality
document.querySelector('.home').addEventListener('click', () => {
    window.location.href = 'socmed.html';
});

document.querySelector('.ecertificates').addEventListener('click', () => {
    window.location.href = 'ecertificates.html';
});

document.querySelector('.elearning').addEventListener('click', () => {
    window.location.href = 'elearning.html';
});

document.querySelector('.text-wrapper-6').addEventListener('click', () => {
    window.location.href = 'courses.html';
});

// Adding hover effects
const interactiveElements = document.querySelectorAll('.home, .ecertificates, .elearning, .text-wrapper-6');

interactiveElements.forEach(element => {
    element.addEventListener('mouseover', () => {
        element.classList.add('hover');
    });

    element.addEventListener('mouseout', () => {
        element.classList.remove('hover');
    });

    element.addEventListener('click', () => {
        interactiveElements.forEach(el => el.classList.remove('active')); // Remove active state from all
        element.classList.add('active'); // Add active state to the clicked element
    });
});
