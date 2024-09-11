import React from 'react';
import ReactDOM from 'react-dom';

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

function Project({ title, description, link }) {
    return (
      <div className="project">
        <h3>{title}</h3>
        <p>{description}</p>
        <a href={link}>View Project</a>
      </div>
    );
}

function Portfolio() {
    return (
      <div>
        {projects.map((project, index) => (
          <Project
            key={index}
            title={project.title}
            description={project.description}
            link={project.link}
          />
        ))}
      </div>
    );
}

console.log('Rendering Portfolio component');

// Ensure there's an element with id 'projects' before trying to render
const projectsElement = document.getElementById('projects');
if (projectsElement) {
    ReactDOM.render(<Portfolio />, projectsElement);
} else {
    console.error('Element with id "projects" not found');
}

// JavaScript to hide the loading screen and show the main content
window.addEventListener('load', function() {
    console.log('Page is fully loaded');
    setTimeout(function() {
        console.log('Hiding loading screen and showing main content');
        const loadingScreen = document.getElementById('loading');
        const mainContent = document.getElementById('main-content');

        if (loadingScreen && mainContent) {
            loadingScreen.style.display = 'none';
            mainContent.style.display = 'block';
        } else {
            console.error('Loading screen or main content element not found');
        }
    }, 2000); // 2000 milliseconds = 2 seconds
});
