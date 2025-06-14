// Website Animation Observer.
document.addEventListener('DOMContentLoaded', () => {
    const animatedElements = document.querySelectorAll('[data-animate]');

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const animation = entry.target.getAttribute('data-animate');
                    const delay = entry.target.getAttribute('data-delay') || '0s';
                    entry.target.style.animationDelay = delay;
                    entry.target.classList.add(`animate-${animation}`);
                    // Stop observing after animation
                    observer.unobserve(entry.target);
                }
            });
        },
        {
            threshold: 0.1, // Trigger when 10% of the element is visible
        }
    );

    animatedElements.forEach((element) => {
        observer.observe(element);
    });



});