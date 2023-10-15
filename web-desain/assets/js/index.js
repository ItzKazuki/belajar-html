window.onscroll = () => {
  var navbar = document.getElementById("navbar");
  var sticky = navbar.offsetTop;
  // console.log(sticky)

  window.scrollY >= sticky ? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
}

// const swiper = new Swiper('.cards', {
//   // Optional parameters
//   direction: 'horizontal',
//   loop: true,

//   // // If we need pagination
//   // pagination: {
//   //   el: '.swiper-pagination',
//   // },

//   // // Navigation arrows
//   // navigation: {
//   //   nextEl: '.swiper-button-next',
//   //   prevEl: '.swiper-button-prev',
//   // },

//   // // And if we need scrollbar
//   // scrollbar: {
//   //   el: '.swiper-scrollbar',
//   // },
// });
