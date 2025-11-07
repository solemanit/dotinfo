var swiper = new Swiper(".ecommerceSliderThumbs", {
  spaceBetween: 10,
  slidesPerView: 4,
  freeMode: true,
  watchSlidesProgress: true,

});
var swiper2 = new Swiper(".ecommerceMainSlider", {
  spaceBetween: 10,
  navigation: {
    nextEl: ".ecommerce-button-next",
    prevEl: ".ecommerce-button-prev",
  },
  thumbs: {
    swiper: swiper,
  },
});

document.querySelector('.apply-btn').addEventListener('click', function () {
  const input = document.querySelector('.coupon-input');
  const message = document.querySelector('.coupon-message');
  const validCodes = ["RELAX20", "QUICK15", "HURRY10"]; // Your valid codes

  if (validCodes.includes(input.value.trim().toUpperCase())) {
    message.textContent = "Coupon applied successfully!";
    message.classList.add('success');
    message.classList.remove('error');
    // Add logic to apply discount (e.g., update cart total)
  } else {
    message.textContent = "Invalid code. Try again!";
    message.classList.add('error');
    message.classList.remove('success');
  }
});

/* Quantity Incases */
$(document).ready(function () {
  $(".increase").on("click", function () {
    if ($(this).prev().val() < 999) {
      $(this)
        .prev()
        .val(+$(this).prev().val() + 1);
    }
  });
  $(".decrease").on("click", function () {
    if ($(this).next().val() > 0) {
      if ($(this).next().val() > 0)
        $(this)
          .next()
          .val(+$(this).next().val() - 1);
    }
  });
});