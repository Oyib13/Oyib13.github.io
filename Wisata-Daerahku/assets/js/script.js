document.addEventListener("DOMContentLoaded", () => {
  const menuBtn = document.getElementById("menu-btn");
  const mobileMenu = document.getElementById("mobile-menu");
  const navbar = document.getElementById("navbar");

  // Navbar scroll effect
  window.addEventListener("scroll", () => {
    if (window.scrollY > 60) {
      navbar.classList.add("scrolled");
    } else {
      navbar.classList.remove("scrolled");
    }
  });

  // Toggle hamburger
  menuBtn.addEventListener("click", () => {
    const isHidden = mobileMenu.classList.contains("hidden");
    menuBtn.classList.toggle("open");

    if (isHidden) {
      mobileMenu.classList.remove("hidden");
      mobileMenu.classList.add("animate-slideDown");
      mobileMenu.style.opacity = "1";
    } else {
      mobileMenu.classList.add("hidden");
      mobileMenu.classList.remove("animate-slideDown");
      mobileMenu.style.opacity = "0";
    }
  });
});
const toggleBtn = document.getElementById('toggleGaleri');
const galeriGrid = document.getElementById('galeriGrid');

toggleBtn.addEventListener('click', () => {
  galeriGrid.classList.toggle('hidden'); // Toggle tampil/sembunyi
});
