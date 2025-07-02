// JS: assets/js/script.js

console.log("Dropdown JS loaded!");

// TOGGLE NAVBAR
function toggleMenu() {
  const nav = document.getElementById("navLinks");
  nav.classList.toggle("active");
}

// DROPDOWN
document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll('.custom-dropdown').forEach(dropdown => {
    const selected = dropdown.querySelector('.selected');
    const options = dropdown.querySelector('.options');

    selected.addEventListener('click', () => {
      const isOpen = options.style.display === 'block';
      document.querySelectorAll('.custom-dropdown .options').forEach(opt => opt.style.display = 'none');
      options.style.display = isOpen ? 'none' : 'block';
    });

    dropdown.querySelectorAll('.option').forEach(option => {
      option.addEventListener('click', () => {
        selected.textContent = option.textContent;
        options.style.display = 'none';
      });
    });
  });

  // Close all dropdowns on outside click
  window.addEventListener('click', e => {
    document.querySelectorAll('.custom-dropdown').forEach(dropdown => {
      if (!dropdown.contains(e.target)) {
        dropdown.querySelector('.options').style.display = 'none';
      }
    });
  });
});
