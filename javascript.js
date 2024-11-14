document.addEventListener("DOMContentLoaded", () => {
  const searchBar = document.querySelector(".search-bar");
  searchBar.addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
      // Check if the pressed key is Enter
      performSearch(); // Call the search function
    }
  });
});

function performSearch() {
  const searchTerm = document.querySelector(".search-bar").value; // Get the value from the input
  if (searchTerm) {
    alert(`Searching for: ${searchTerm}`); // For demonstration, show an alert
  } else {
    alert("Please enter a search term."); // Prompt if input is empty
  }
}
