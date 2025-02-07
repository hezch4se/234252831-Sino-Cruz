// Mobile Menu Toggle
function myMenuFunction() {
    const navMenu = document.querySelector('.nav-menu');
    navMenu.classList.toggle('active');
}

// Show Section Function
function showSection(sectionId) {
    // Hide all sections
    const sections = document.querySelectorAll('.section');
    sections.forEach(section => {
        section.classList.remove('visible'); // Remove visible class
    });

    // Show the selected section
    const selectedSection = document.getElementById(sectionId);
    selectedSection.classList.add('visible'); // Add visible class
}

// Add click event listeners to navigation links
document.querySelectorAll('.nav-menu a').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const targetId = this.getAttribute('href').substring(1); // Get the target section ID
        showSection(targetId); // Show the target section

        // Update active class
        document.querySelectorAll('.nav-menu a').forEach(link => {
            link.classList.remove('active');
        });
        this.classList.add('active');
    });
});

// Show the first section by default
showSection('home');

document.querySelector('.cta-btn').addEventListener('click', function (e) {
    e.preventDefault();
    showSection('contact');
    document.getElementById('contact').scrollIntoView({ behavior: 'smooth' });
});

// Contact form submission handling
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const status = document.querySelector('.form-status');

    // Simple email validation
    if (!formData.get('email').includes('@')) {
        status.classList.add('error');
        status.textContent = 'Please enter a valid email address';
        return;
    }

    status.classList.remove('error');
    status.classList.add('success');
    status.textContent = 'Message sent successfully!';
    
    // Reset form after 2 seconds
    setTimeout(() => {
        this.reset();
        status.classList.remove('success');
        status.style.display = 'none';
    }, 2000);
});

// Sticky Navigation on Scroll
window.addEventListener('scroll', () => {
    const nav = document.querySelector('.nav');
    if (window.scrollY > 50) {
        nav.style.background = 'rgba(39,39,39, 0.9)';
    } else {
        nav.style.background = 'linear-gradient(rgba(39,39,39, 0.6), transparent)';
    }
});