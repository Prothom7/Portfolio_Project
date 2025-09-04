document.addEventListener("DOMContentLoaded", () => {
  const container = document.getElementById("projects-container");

  fetch("projects.php")
    .then(response => {
      if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
      }
      return response.json();
    })
    .then(projects => {
      if (!Array.isArray(projects)) {
        throw new Error("Invalid data format received from server.");
      }

      projects.forEach(project => {
        const card = createProjectCard(project);
        container.appendChild(card);
      });
    })
    .catch(error => {
      console.error("Error loading projects:", error);
      container.innerHTML = `<p class="error-message">Failed to load projects. Please try again later.</p>`;
    });
});

/**
 * Creates a clickable project card element
 * @param {Object} project - Project data object
 * @returns {HTMLElement} - DOM element for the project card
 */
function createProjectCard(project) {
  const link = document.createElement("a");
  link.href = project.link;
  link.target = "_blank"; // Opens in new tab
  link.className = "project-card";

  link.innerHTML = `
    <img src="${project.image}" alt="${project.title}" class="project-image" />
    <div class="project-content">
      <h3 class="project-title">${project.title}</h3>
      <p class="project-description">${project.description}</p>
    </div>
  `;

  return link;
}