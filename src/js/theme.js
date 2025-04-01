document.addEventListener('DOMContentLoaded', () => {
    const animatedElements = document.querySelectorAll('[data-animate]');

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const animation = entry.target.getAttribute('data-animate');
                    entry.target.classList.add(`animate-${animation}`);
                    observer.unobserve(entry.target); // Stop observing after animation
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

// FLOATING CTA SCRIPT.
document.addEventListener('DOMContentLoaded', function () {
    const cta = document.querySelector('.floating-cta');
    const closeBtn = document.querySelector('.floating-cta .close');

    // Initialize page view counter if it doesn't exist
    if (!localStorage.getItem('ctaPageViews')) {
        localStorage.setItem('ctaPageViews', '0');
    }

    // Get current values
    const ctaStatus = localStorage.getItem('ctaStatus');
    let pageViews = parseInt(localStorage.getItem('ctaPageViews'));

    // Increment page view counter (we do this on every page load)
    pageViews += 1;
    localStorage.setItem('ctaPageViews', pageViews.toString());

    // Determine if we should show the CTA
    // Show if:
    // 1. First visit (ctaStatus is null)
    // 2. Status is "open" (previously shown and not closed)
    // 3. Status is "closed" but we've reached 3 page views
    const shouldShow = !ctaStatus || ctaStatus === 'open' || (ctaStatus === 'closed' && pageViews >= 3);

    if (shouldShow) {
        // If status is already "open", show immediately without animation
        if (ctaStatus === 'open') {
            setTimeout(() => {
                cta.classList.add('slide-in-right');
            }, 5000);
        } else {
            // Otherwise, show with delay and animation
            setTimeout(() => {
                cta.classList.add('slide-in-right');
                localStorage.setItem('ctaStatus', 'open');
                // Reset counter when showing
                localStorage.setItem('ctaPageViews', '0');
            }, 5000);
        }
    }

    // Close button functionality
    closeBtn.addEventListener('click', function () {
        cta.classList.remove('slide-in-right');
        cta.style.transform = 'translateX(150%)';
        localStorage.setItem('ctaStatus', 'closed');
        // Reset counter when closed
        localStorage.setItem('ctaPageViews', '1');
    });
});


// FLOATING CONTACT BUTTONS SCRIPT.
document.addEventListener('DOMContentLoaded', function () {
    const floatingContact = document.querySelector('.floating-contact');
    const openFloatingContact = document.querySelector('.lets-chat');
    const closeBtn = document.querySelector('.floating-contact .close');

    // Open Floating Contact.
    openFloatingContact.addEventListener('click', function () {
        floatingContact.classList.add('active');
    });

    // Close button functionality
    closeBtn.addEventListener('click', function () {
        floatingContact.classList.remove('active');
    });
});