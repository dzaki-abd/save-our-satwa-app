window.addEventListener('scroll', function () {
  const navbar = document.querySelector('.navbar');
  if (window.scrollY > 0) {
    navbar.classList.add('scrolled', 'shadow');
  } else {
    navbar.classList.remove('scrolled');
  }
});