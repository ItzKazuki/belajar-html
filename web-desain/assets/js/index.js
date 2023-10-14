window.onscroll = () => {
  var navbar = document.getElementById("navbar");
  var sticky = navbar.offsetTop;

  window.scrollY >= sticky ? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
}
