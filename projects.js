document.addEventListener("DOMContentLoaded", () => {
  const projects = [
    {
      title: "Portfolio Website",
      description: "A sleek personal portfolio built with HTML, CSS, and PHP to showcase my web development skills.",
      image: "images/portfolio.jpg"
    },
    {
      title: "Weather App",
      description: "A responsive weather application using OpenWeather API and JavaScript to display real-time forecasts.",
      image: "images/weather.jpg"
    },
    {
      title: "Task Manager",
      description: "A PHP-based task management tool with MySQL integration for organizing daily tasks efficiently.",
      image: "images/taskmanager.jpg"
    },
    {
      title: "E-commerce Demo",
      description: "A mock e-commerce site built with HTML, CSS, and JavaScript featuring product listings and a cart system.",
      image: "images/ecommerce.jpg"
    },
    {
      title: "Blog CMS",
      description: "A lightweight content management system for blogging, built with PHP and modular components.",
      image: "images/blogcms.jpg"
    }
  ];

  const container = document.getElementById("projects-container");

  projects.forEach(project => {
    const card = document.createElement("div");
    card.className = "project-card";

    card.innerHTML = `
      <img src="${project.image}" alt="${project.title}" class="project-image" />
      <div class="project-content">
        <h3 class="project-title">${project.title}</h3>
        <p class="project-description">${project.description}</p>
      </div>
    `;

    container.appendChild(card);
  });
});