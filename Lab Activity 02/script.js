function myMenuFunction() {
    const navMenu = document.querySelector('.nav-menu');
    navMenu.classList.toggle('active');
}

function showSection(sectionId) {
    
    const sections = document.querySelectorAll('.section');
    sections.forEach(section => {
        section.classList.remove('visible'); // Remove visible class
    });

    
    const selectedSection = document.getElementById(sectionId);
    selectedSection.classList.add('visible'); 
}


document.querySelectorAll('.nav-menu a').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const targetId = this.getAttribute('href').substring(1); 
        showSection(targetId); 

        // Update active class
        document.querySelectorAll('.nav-menu a').forEach(link => {
            link.classList.remove('active');
        });
        this.classList.add('active');
    });
});


showSection('home');

document.querySelector('.cta-btn').addEventListener('click', function (e) {
    e.preventDefault();
    showSection('contact');
    document.getElementById('contact').scrollIntoView({ behavior: 'smooth' });
});


document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const status = document.querySelector('.form-status');

    
    if (!formData.get('email').includes('@')) {
        status.classList.add('error');
        status.textContent = 'Please enter a valid email address';
        return;
    }

    status.classList.remove('error');
    status.classList.add('success');
    status.textContent = 'Message sent successfully!';
    
    
    setTimeout(() => {
        this.reset();
        status.classList.remove('success');
        status.style.display = 'none';
    }, 2000);
});


window.addEventListener('scroll', () => {
    const nav = document.querySelector('.nav');
    if (window.scrollY > 50) {
        nav.style.background = 'rgba(39,39,39, 0.9)';
    } else {
        nav.style.background = 'linear-gradient(rgba(39,39,39, 0.6), transparent)';
    }
});