function myMenuFunction() {
    const navMenu = document.querySelector('.nav-menu');
    navMenu.classList.toggle('active');
}

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
        
        // Update active class
        document.querySelectorAll('.nav-menu a').forEach(link => {
            link.classList.remove('active');
        });
        this.classList.add('active');
    });
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
    
    // Reset form after 2 seconds
    setTimeout(() => {
        this.reset();
        status.classList.remove('success');
        status.style.display = 'none';
    }, 2000);
});

l
window.addEventListener('scroll', () => {
    const nav = document.querySelector('.nav');
    if (window.scrollY > 50) {
        nav.style.background = 'rgba(39,39,39, 0.9)';
    } else {
        nav.style.background = 'linear-gradient(rgba(39,39,39, 0.6), transparent)';
    }
});