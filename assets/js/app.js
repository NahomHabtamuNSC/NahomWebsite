// List of projects
const projects = [
  {
    title: "Project 1",
    description: "Description of your first project.",
    link: "link-to-project-1"
  },
  {
    title: "Project 2",
    description: "Description of your second project.",
    link: "link-to-project-2"
  }
];

// Function to render the portfolio dynamically
function renderPortfolio() {
  const projectsElement = document.getElementById('projects');

  if (projectsElement) {
    projects.forEach(project => {
      // Create a div for each project
      const projectDiv = document.createElement('div');
      projectDiv.classList.add('project');

      // Create and append project title
      const title = document.createElement('h3');
      title.textContent = project.title;
      projectDiv.appendChild(title);

      // Create and append project description
      const description = document.createElement('p');
      description.textContent = project.description;
      projectDiv.appendChild(description);

      // Create and append link to the project
      const link = document.createElement('a');
      link.href = project.link;
      link.textContent = 'View Project';
      projectDiv.appendChild(link);

      // Append the project div to the portfolio section
      projectsElement.appendChild(projectDiv);
    });
  } else {
    console.error('Element with id "projects" not found');
  }
}


