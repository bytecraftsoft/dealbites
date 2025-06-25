document.addEventListener("DOMContentLoaded", () => {
  // Mobile Menu Toggle
  const menuToggle = document.getElementById("menuToggle")
  const closeMenu = document.getElementById("closeMenu")
  const mobileMenu = document.getElementById("mobileMenu")

  menuToggle.addEventListener("click", () => {
    mobileMenu.classList.add("active")
    document.body.style.overflow = "hidden" // Prevent scrolling when menu is open
  })

  closeMenu.addEventListener("click", () => {
    mobileMenu.classList.remove("active")
    document.body.style.overflow = "" // Re-enable scrolling
  })

 // Category Tab Switching
 const tabButtons = document.querySelectorAll(".tab-button")

  tabButtons.forEach((button) => {
    button.addEventListener("click", function () {
      // Remove active class from all buttons
      tabButtons.forEach((btn) => btn.classList.remove("active"))

      // Add active class to clicked button
      this.classList.add("active")

      // Get the category from data attribute
      const category = this.getAttribute("data-category")

      // Here you would typically filter the deals based on the category
      //console.log(`Category selected: ${category}`)

      // For demo purposes, we'll just log the category
      // In a real app, you would filter the deals or fetch new data
    })
  })


  // Simulate loading data
  function simulateLoading() {
    const loadingElement = document.createElement("div")
    loadingElement.className = "loading-indicator"
    loadingElement.innerHTML = "<p>Loading deals...</p>"
    document.body.appendChild(loadingElement)

    setTimeout(() => {
      loadingElement.remove()
    }, 1500)
  }

  // Call simulate loading on page load
  simulateLoading()

  // Add scroll animation for sections
  const sections = document.querySelectorAll("section")

  function checkScroll() {
    sections.forEach((section) => {
      const sectionTop = section.getBoundingClientRect().top
      const windowHeight = window.innerHeight

      if (sectionTop < windowHeight * 0.75) {
        section.style.opacity = "1"
        section.style.transform = "translateY(0)"
      }
    })
  }

  // Set initial styles for animation
  sections.forEach((section) => {
    section.style.opacity = "0"
    section.style.transform = "translateY(20px)"
    section.style.transition = "opacity 0.5s ease, transform 0.5s ease"
  })

  // Check scroll position on load and scroll
  window.addEventListener("load", checkScroll)
  window.addEventListener("scroll", checkScroll)
})

