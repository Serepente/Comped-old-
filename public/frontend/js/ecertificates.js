// Navigation functionality
document.querySelector('.home').addEventListener('click', () => {
    window.location.href = 'socmed';
});

document.querySelector('.img').addEventListener('click', () => {
    window.location.href = 'certificates';
});

document.querySelector('.elearning').addEventListener('click', () => {
    window.location.href = 'eLearning';
});

document.querySelector('.profile').addEventListener('click', () => {
    window.location.href = 'profile';
});

document.querySelector('.arrowleft').addEventListener('click', () => {
    window.location.href = 'elearningplatform';
});

// Adding hover effects
const interactiveElements = document.querySelectorAll('.home, .img, .elearning, .profile, .arrowleft');

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
