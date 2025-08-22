function initFaqs() {
  // Get all the buttons.
  const faqBtns = document.querySelectorAll(".faq-list button");

  if (!faqBtns.length > 0) return;

  faqBtns.forEach((button) => {
    button.addEventListener("click", () => {
      const faqItem = button.closest(".faq-list");

      // Get all the answer and icons.
      const answer = faqItem.querySelector(".answer");
      const plusIcon = faqItem.querySelector(".faq-open");
      const minusIcon = faqItem.querySelector(".faq-close");

      // Toggle the hidden class on the answer.
      answer.classList.toggle("hidden");

      plusIcon.classList.toggle("hidden");
      minusIcon.classList.toggle("hidden");
    });
  });
}

// Check if we are on the ACF block preview.
if (window.acf) {
  window.acf.addAction("render_block_preview/type=faqs", initFaqs);
} else {
  document.addEventListener("DOMContentLoaded", initFaqs);
}
