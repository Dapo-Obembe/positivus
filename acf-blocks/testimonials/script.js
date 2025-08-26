function initTestimonials() {
  // Get the testimonial container.
  const testimonialContainer = document.querySelector(
    ".testimonials-container"
  );

  if (!testimonialContainer) return;

  new Swiper(testimonialContainer, {
    loop: true,
    spaceBetween: 50,
    slidePerView: 1,
    grabCursor: true,
    centeredSlides: true,
    navigation: {
      nextEl: ".testimonial-next",
      prevEl: ".testimonial-prev",
    },
    autoplay: {
      delay: 5000,
      disableOnInteraction: true,
    },
  });
}

// Check if we are on the ACF block preview.
if (window.acf) {
  window.acf.addAction(
    "render_block_preview/type=testimonials",
    initTestimonials
  );
} else {
  document.addEventListener("DOMContentLoaded", initTestimonials);
}
