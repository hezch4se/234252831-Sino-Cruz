<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose an Activity</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="background-animation"></div>
    <div class="container">
        <header class="header">
            <h1><i class="fas fa-code"></i> Welcome to PHP Activities</h1>
            <p class="subtitle">Dive into interactive PHP exercises and sharpen your coding skills!</p>
        </header>
        
        <!-- Carousel Container -->
        <div class="carousel-container">
            <div class="carousel">
                <div class="carousel-track" id="carouselTrack">
                    <!-- Duplicate buttons for infinite loop (original + clone) -->
                    <div class="button-wrapper">
                        <button class="activity-btn" onclick="redirectTo('activity1.php')">
                            <span>Introduce Yourself</span>
                        </button>
                    </div>
                    <div class="button-wrapper">
                        <button class="activity-btn" onclick="redirectTo('activity2.php')">
                            <span>Simple Math Task</span>
                        </button>
                    </div>
                    <div class="button-wrapper">
                        <button class="activity-btn" onclick="redirectTo('activity3.php')">
                            <span>Area and Perimeter of a Rectangle</span>
                        </button>
                    </div>
                    <div class="button-wrapper">
                        <button class="activity-btn" onclick="redirectTo('activity4.php')">
                            <span>Temperature Converter</span>
                        </button>
                    </div>
                    <div class="button-wrapper">
                        <button class="activity-btn" onclick="redirectTo('activity5.php')">
                            <span>Swapping Variables</span>
                        </button>
                    </div>
                    <div class="button-wrapper">
                        <button class="activity-btn" onclick="redirectTo('activity6.php')">
                            <span>Salary Calculator</span>
                        </button>
                    </div>
                    <div class="button-wrapper">
                        <button class="activity-btn" onclick="redirectTo('activity7.php')">
                            <span>BMI Calculator</span>
                        </button>
                    </div>
                    <div class="button-wrapper">
                        <button class="activity-btn" onclick="redirectTo('activity8.php')">
                            <span>String Manipulation</span>
                        </button>
                    </div>
                    <div class="button-wrapper">
                        <button class="activity-btn" onclick="redirectTo('activity9.php')">
                            <span>Bank Account Simulation</span>
                        </button>
                    </div>
                    <div class="button-wrapper">
                        <button class="activity-btn" onclick="redirectTo('activity10.php')">
                            <span>Simple Grading System</span>
                        </button>
                    </div>
                    <div class="button-wrapper">
                        <button class="activity-btn" onclick="redirectTo('activity11.php')">
                            <span>Currency Converter</span>
                        </button>
                    </div>
                    <div class="button-wrapper">
                        <button class="activity-btn" onclick="redirectTo('activity12.php')">
                            <span>Travel Cost Estimator</span>
                        </button>
                    </div>
                    <!-- Clones for infinite loop (hidden initially) -->
                    <div class="button-wrapper clone">
                        <button class="activity-btn" onclick="redirectTo('activity1.php')">
                            <span>Introduce Yourself</span>
                        </button>
                    </div>
                    <div class="button-wrapper clone">
                        <button class="activity-btn" onclick="redirectTo('activity2.php')">
                            <span>Simple Math Task</span>
                        </button>
                    </div>
                    <!-- Add more clones as needed for smooth loop; here, first 2 for demo -->
                </div>
            </div>
            
            <!-- Indicators -->
            <div class="carousel-indicators" id="carouselIndicators"></div>
        </div>
    </div>

    <script>
        function redirectTo(page) {
            window.location.href = page;
        }

        // Carousel JavaScript
        class Carousel {
            constructor() {
                this.track = document.getElementById('carouselTrack');
                this.indicators = document.getElementById('carouselIndicators');
                this.buttonWrappers = document.querySelectorAll('.button-wrapper:not(.clone)');
                this.currentIndex = 0;
                this.isDragging = false;
                this.startPos = 0;
                this.currentTranslate = 0;
                this.prevTranslate = 0;
                this.animationID = 0;
                this.threshold = 100; // Min swipe distance
                this.numButtons = this.buttonWrappers.length; // 12
                this.buttonWidth = 320; // Approx width including gap; adjust if needed
                
                this.init();
            }
            
            init() {
                this.createIndicators();
                this.setPositionByIndex();
                this.track.addEventListener('touchstart', this.touchStart.bind(this));
                this.track.addEventListener('touchend', this.touchEnd.bind(this));
                this.track.addEventListener('mousedown', this.mouseStart.bind(this));
                this.track.addEventListener('mouseup', this.mouseEnd.bind(this));
                this.track.addEventListener('mouseleave', this.mouseEnd.bind(this));
                this.track.addEventListener('mousemove', this.mouseMove.bind(this));
                
                // Entrance animation
                const wrappers = document.querySelectorAll('.button-wrapper');
                wrappers.forEach((wrapper, index) => {
                    wrapper.style.opacity = '0';
                    wrapper.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        wrapper.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                        wrapper.style.opacity = '1';
                        wrapper.style.transform = 'translateY(0)';
                    }, index * 100);
                });
            }
            
            createIndicators() {
                for (let i = 0; i < this.numButtons; i++) {
                    const indicator = document.createElement('span');
                    indicator.classList.add('indicator');
                    if (i === 0) indicator.classList.add('active');
                    indicator.addEventListener('click', () => this.setPositionByIndex(i));
                    this.indicators.appendChild(indicator);
                }
            }
            
            setPositionByIndex(index = this.currentIndex) {
                this.currentIndex = index;
                this.prevTranslate = this.currentTranslate;
                this.currentTranslate = index * -this.buttonWidth;
                this.setIndicatorActive();
                this.translate(this.currentTranslate);
            }
            
            setIndicatorActive() {
                const indicators = this.indicators.querySelectorAll('.indicator');
                indicators.forEach((ind, i) => {
                    ind.classList.toggle('active', i === this.currentIndex);
                });
            }
            
            translate(amount) {
                this.track.style.transform = `translateX(${amount}px)`;
            }
            
            // Touch Events
            touchStart(e) {
                this.startPos = e.touches[0].clientX;
                this.isDragging = true;
                this.animationID = requestAnimationFrame(this.animate.bind(this));
                this.track.style.transition = '';
            }
            
            touchEnd(e) {
                this.isDragging = false;
                cancelAnimationFrame(this.animationID);
                const movedBy = this.startPos - this.currentTranslate;
                if (movedBy < -this.threshold) {
                    this.next();
                } else if (movedBy > this.threshold) {
                    this.prev();
                } else {
                    this.setPositionByIndex();
                }
            }
            
            // Mouse Events (simplified drag)
            mouseStart(e) {
                this.startPos = e.clientX;
                this.isDragging = true;
                this.animationID = requestAnimationFrame(this.animate.bind(this));
                this.track.style.transition = '';
            }
            
            mouseMove(e) {
                if (!this.isDragging) return;
                const currentPosition = e.clientX;
                this.currentTranslate = this.prevTranslate + currentPosition - this.startPos;
                this.translate(this.currentTranslate);
            }
            
            mouseEnd() {
                if (!this.isDragging) return;
                this.isDragging = false;
                cancelAnimationFrame(this.animationID);
                const movedBy = this.startPos - this.currentTranslate;
                if (movedBy < -this.threshold) {
                    this.next();
                } else if (movedBy > this.threshold) {
                    this.prev();
                } else {
                    this.setPositionByIndex();
                }
            }
            
            animate() {
                if (this.isDragging) {
                    this.translate(this.currentTranslate);
                    this.animationID = requestAnimationFrame(this.animate.bind(this));
                }
            }
            
            next() {
                this.currentIndex = (this.currentIndex + 1) % this.numButtons;
                this.setPositionByIndex();
            }
            
            prev() {
                this.currentIndex = (this.currentIndex - 1 + this.numButtons) % this.numButtons;
                this.setPositionByIndex();
            }
        }
        
        // Initialize Carousel on Load
        document.addEventListener('DOMContentLoaded', () => {
            new Carousel();
        });
    </script>
</body>
</html>

