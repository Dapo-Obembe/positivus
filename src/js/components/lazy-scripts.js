/**
 * Observe a DOM element and run a function when it enters the viewport.
 * @param {string|Element} target - CSS selector or element.
 * @param {Function} callback - Function to execute.
 * @param {Object} options - IntersectionObserver options.
 */
export function observeInViewport(target, callback, options = {}) {
    const element = typeof target === "string" ? document.querySelector(target) : target;
    if (!element || typeof callback !== "function") return;

    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                callback(entry.target);
                obs.unobserve(entry.target); // only run once
            }
        });
    }, options);

    observer.observe(element);
}
