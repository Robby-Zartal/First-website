document.querySelectorAll(".nav-button").forEach((link) => {
  if (link.href === window.location.href) {
    link.setAttribute("aria-current", "page")
  }
})