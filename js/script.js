// Wait for the DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Initialize all components
    initHeader();
    initMobileMenu();
    initSliders();
    initCounters();
    initScrollToTop();
    initFormValidation();
});

// Header scroll effect
function initHeader() {
    const header = document.querySelector('header');
    const scrollThreshold = 100;

    window.addEventListener('scroll', function() {
        if (window.scrollY > scrollThreshold) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });

    // Check initial scroll position
    if (window.scrollY > scrollThreshold) {
        header.classList.add('scrolled');
    }

    // Active link highlighting
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-links a');

    window.addEventListener('scroll', function() {
        let current = '';
        
        sections.forEach(section => {
            const sectionTop = section.offsetTop - 100;
            const sectionHeight = section.offsetHeight;
            
            if (window.scrollY >= sectionTop && window.scrollY < sectionTop + sectionHeight) {
                current = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `#${current}`) {
                link.classList.add('active');
            }
        });
    });
}

// Mobile menu functionality
function initMobileMenu() {
    const menuBtn = document.querySelector('.mobile-menu-btn');
    const navLinks = document.querySelector('.nav-links');
    const navLinksItems = document.querySelectorAll('.nav-links a:not(.dropdown > a)');
    const dropdownToggle = document.querySelectorAll('.dropdown > a');

    menuBtn.addEventListener('click', function() {
        navLinks.classList.toggle('active');
        menuBtn.classList.toggle('active');
        
        // Toggle menu icon
        const icon = menuBtn.querySelector('i');
        if (navLinks.classList.contains('active')) {
            icon.classList.remove('fa-bars');
            icon.classList.add('fa-times');
        } else {
            icon.classList.remove('fa-times');
            icon.classList.add('fa-bars');
        }
    });

    // Handle dropdown toggles on mobile
    dropdownToggle.forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            // Only for mobile view
            if (window.innerWidth <= 768) {
                e.preventDefault();
                const parent = this.parentElement;
                parent.classList.toggle('active');
            }
        });
    });

    // Close menu when clicking on a link (except dropdown toggles)
    navLinksItems.forEach(item => {
        item.addEventListener('click', function() {
            navLinks.classList.remove('active');
            menuBtn.classList.remove('active');
            
            const icon = menuBtn.querySelector('i');
            icon.classList.remove('fa-times');
            icon.classList.add('fa-bars');
        });
    });
}

// Sliders functionality
function initSliders() {
    // Destinations slider
    initSlider('.destinations-slider', '.destination-card');
    
    // Testimonials slider
    initSlider('.testimonials-slider', '.testimonial-card');
}

function initSlider(sliderSelector, slideSelector) {
    const slider = document.querySelector(sliderSelector);
    const slides = document.querySelectorAll(slideSelector);
    const prevBtn = slider.parentElement.querySelector('.prev-btn');
    const nextBtn = slider.parentElement.querySelector('.next-btn');
    
    if (!slider || slides.length === 0) return;
    
    let currentIndex = 0;
    let slideWidth = slides[0].offsetWidth;
    let slidesToShow = calculateSlidesToShow();
    
    // Recalculate on window resize
    window.addEventListener('resize', function() {
        slideWidth = slides[0].offsetWidth;
        slidesToShow = calculateSlidesToShow();
        updateSliderPosition();
    });
    
    function calculateSlidesToShow() {
        if (window.innerWidth < 576) return 1;
        if (window.innerWidth < 768) return 1;
        return 3;
    }
    
    function updateSliderPosition() {
        const offset = -currentIndex * slideWidth;
        slider.style.transform = `translateX(${offset}px)`;
    }
    
    // Next button click
    nextBtn.addEventListener('click', function() {
        if (currentIndex < slides.length - slidesToShow) {
            currentIndex++;
            updateSliderPosition();
        }
    });
    
    // Previous button click
    prevBtn.addEventListener('click', function() {
        if (currentIndex > 0) {
            currentIndex--;
            updateSliderPosition();
        }
    });
    
    // Initialize position
    updateSliderPosition();
}

// Counter animation
function initCounters() {
    const counters = document.querySelectorAll('.counter');
    const speed = 200; // The lower the faster
    
    const observerOptions = {
        threshold: 0.5
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const target = parseInt(counter.getAttribute('data-target'));
                let count = 0;
                
                const updateCount = () => {
                    const increment = target / speed;
                    
                    if (count < target) {
                        count += increment;
                        counter.innerText = Math.ceil(count);
                        setTimeout(updateCount, 1);
                    } else {
                        counter.innerText = target;
                    }
                };
                
                updateCount();
                observer.unobserve(counter);
            }
        });
    }, observerOptions);
    
    counters.forEach(counter => {
        observer.observe(counter);
    });
}

// Scroll to top button
function initScrollToTop() {
    const scrollToTopBtn = document.querySelector('.back-to-top');
    const scrollThreshold = 300;
    
    window.addEventListener('scroll', function() {
        if (window.scrollY > scrollThreshold) {
            scrollToTopBtn.classList.add('active');
        } else {
            scrollToTopBtn.classList.remove('active');
        }
    });
    
    scrollToTopBtn.addEventListener('click', function(e) {
        e.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
}

// Form validation
function initFormValidation() {
    const bookingForm = document.getElementById('bookingForm');
    const newsletterForm = document.getElementById('newsletterForm');
    
    if (bookingForm) {
        bookingForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Basic validation
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const phone = document.getElementById('phone').value.trim();
            const service = document.getElementById('service').value;
            const date = document.getElementById('date').value;
            const time = document.getElementById('time').value;
            
            if (!name || !email || !phone || !service || !date || !time) {
                showAlert('Please fill in all required fields', 'error');
                return;
            }
            
            if (!validateEmail(email)) {
                showAlert('Please enter a valid email address', 'error');
                return;
            }
            
            if (!validatePhone(phone)) {
                showAlert('Please enter a valid phone number', 'error');
                return;
            }
            
            // If all validations pass, show success message
            showAlert('Booking submitted successfully! We will contact you shortly.', 'success');
            bookingForm.reset();
        });
    }
    
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const emailInput = newsletterForm.querySelector('input[type="email"]');
            const email = emailInput.value.trim();
            
            if (!email || !validateEmail(email)) {
                showAlert('Please enter a valid email address', 'error');
                return;
            }
            
            showAlert('Thank you for subscribing to our newsletter!', 'success');
            newsletterForm.reset();
        });
    }
}

// Helper functions
function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function validatePhone(phone) {
    const re = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;
    return re.test(phone);
}

function showAlert(message, type) {
    // Create alert element
    const alertEl = document.createElement('div');
    alertEl.className = `alert alert-${type}`;
    alertEl.textContent = message;
    
    // Add to DOM
    document.body.appendChild(alertEl);
    
    // Style the alert
    alertEl.style.position = 'fixed';
    alertEl.style.top = '20px';
    alertEl.style.left = '50%';
    alertEl.style.transform = 'translateX(-50%)';
    alertEl.style.padding = '15px 20px';
    alertEl.style.borderRadius = '5px';
    alertEl.style.zIndex = '9999';
    alertEl.style.boxShadow = '0 5px 15px rgba(0, 0, 0, 0.1)';
    
    if (type === 'success') {
        alertEl.style.backgroundColor = '#28a745';
        alertEl.style.color = '#fff';
    } else if (type === 'error') {
        alertEl.style.backgroundColor = '#dc3545';
        alertEl.style.color = '#fff';
    }
    
    // Remove after 3 seconds
    setTimeout(function() {
        alertEl.style.opacity = '0';
        alertEl.style.transition = 'opacity 0.5s ease';
        
        setTimeout(function() {
            document.body.removeChild(alertEl);
        }, 500);
    }, 3000);
}

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        const targetId = this.getAttribute('href');
        
        if (targetId === '#') return;
        
        const targetElement = document.querySelector(targetId);
        
        if (targetElement) {
            e.preventDefault();
            window.scrollTo({
                top: targetElement.offsetTop - 80,
                behavior: 'smooth'
            });
        }
    });
});