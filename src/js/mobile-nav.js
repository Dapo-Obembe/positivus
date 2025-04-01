/**
 * Mobile nav JS
 */

document.addEventListener('DOMContentLoaded', function () {
	const menuToggle = document.querySelector('.menu-toggle, .menu-toggle-light');
	const mobileNavContainer = document.querySelector('.mobile-nav');

	// Return if either of the elements isn't present.
	if (!menuToggle || !mobileNavContainer) return;

	menuToggle.addEventListener('click', () => {
		const expanded = menuToggle.getAttribute('aria-expanded') === 'true' || false;

		// Toggle body class for menu state
		document.body.classList.toggle('menu-open');

		// Toggle aria-expanded attribute
		menuToggle.setAttribute('aria-expanded', !expanded);

		// Toggle mobile nav visibility and sliding animation
		mobileNavContainer.hidden = !mobileNavContainer.hidden;
		mobileNavContainer.classList.toggle('mobile-nav--open');

		// Toggle menu toggle icon state
		menuToggle.classList.toggle('menu-toggle--open');
	});
});