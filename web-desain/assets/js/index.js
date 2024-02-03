window.onscroll = () => {
  var navbar = document.getElementById("navbar");
  var sticky = navbar.offsetTop;
  // console.log(sticky)

  window.scrollY >= sticky ? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
}

const btnLogin = document.getElementById('btn-login');
const btnCloseLogin = document.getElementById('close-login')
const modalLogin = document.getElementById('login-modal');

btnCloseLogin.addEventListener('click', () => {
  modalLogin.style.display = 'none';

})

btnLogin.addEventListener('click', () => {
  modalLogin.style.display = 'block';
})

window.onclick = function(event) {
  if (event.target == modalLogin) {
      modalLogin.style.display = "none";
  }
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
