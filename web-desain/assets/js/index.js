window.onscroll = () => {
  var navbar = document.getElementById("navbar");
  var sticky = navbar.offsetTop;

  console.log(sticky)

  window.scrollY >= sticky ? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
}
