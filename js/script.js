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
    const contactForm = document.getElementById('contactForm');
    const newsletterForm = document.getElementById('newsletterForm');
    
    if (contactForm) {
        contactForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            // Basic validation
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const phone = document.getElementById('phone').value.trim();
            const service = document.getElementById('service').value;
            const date = document.getElementById('date').value;
            const time = document.getElementById('time').value;
            const message = document.getElementById('message').value;
            
            if (!name || !email || !phone || !service || !date || !time) {
                showAlert('Please fill in all required fields', 'error', 'contactFormStatus');
                return;
            }
            
            if (!validateEmail(email)) {
                showAlert('Please enter a valid email address', 'error', 'contactFormStatus');
                return;
            }
            
            if (!validatePhone(phone)) {
                showAlert('Please enter a valid phone number', 'error', 'contactFormStatus');
                return;
            }
            
            // Disable submit button during submission
            const submitButton = contactForm.querySelector('button[type="submit"]');
            const originalButtonText = submitButton.textContent;
            submitButton.disabled = true;
            submitButton.textContent = 'Sending...';
            
            try {
                // Send form data to server
                const response = await fetch('http://localhost:3000/api/contact', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        name,
                        email,
                        phone,
                        service,
                        date,
                        time,
                        message
                    }),
                });
                
                const data = await response.json();
                
                if (data.success) {
                    // Reset the form
                    contactForm.reset();
                    
                    // Show popup message
                    showPopupMessage(
                        'Inquiry Received!',
                        'Thank you for your inquiry. A confirmation has been sent to your email.<br>Our team will contact you shortly to assist you with your request.'
                    );
                    
                } else {
                    // Show error message
                    const errorDiv = document.createElement('div');
                    errorDiv.className = 'alert alert-danger';
                    errorDiv.textContent = data.message || 'An error occurred. Please try again.';
                    
                    // Insert error message before the form
                    contactForm.prepend(errorDiv);
                    
                    // Remove error message after 5 seconds
                    setTimeout(() => {
                        errorDiv.remove();
                    }, 5000);
                }
            } catch (error) {
                console.error('Error submitting contact form:', error);
                
                // Show error message
                const errorDiv = document.createElement('div');
                errorDiv.className = 'alert alert-danger';
                errorDiv.textContent = 'An error occurred while submitting your inquiry. Please try again.';
                
                // Insert error message before the form
                contactForm.prepend(errorDiv);
                
                // Remove error message after 5 seconds
                setTimeout(() => {
                    errorDiv.remove();
                }, 5000);
            } finally {
                // Re-enable submit button
                submitButton.disabled = false;
                submitButton.textContent = originalButtonText;
            }
        });
    }
    
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const emailInput = newsletterForm.querySelector('input[type="email"]');
            const email = emailInput.value.trim();
            
            if (!email || !validateEmail(email)) {
                showAlert('Please enter a valid email address', 'error', 'newsletterFormStatus');
                return;
            }
            
            // Disable submit button during submission
            const submitButton = newsletterForm.querySelector('button[type="submit"]');
            const originalButtonText = submitButton.textContent;
            submitButton.disabled = true;
            submitButton.textContent = 'Subscribing...';
            
            try {
                // Send form data to server
                const response = await fetch('http://localhost:3000/api/newsletter', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ email }),
                });
                
                const data = await response.json();
                
                if (data.success) {
                    // Reset the form
                    newsletterForm.reset();
                    
                    // Show popup message
                    showPopupMessage(
                        'Subscription Successful!',
                        'Thank you for subscribing to our newsletter!<br>You\'ll now receive our latest updates and special offers.'
                    );
                    
                } else {
                    // Show error message
                    const errorDiv = document.createElement('div');
                    errorDiv.className = 'alert alert-danger';
                    errorDiv.textContent = data.message || 'An error occurred. Please try again.';
                    
                    // Insert error message before the form
                    newsletterForm.prepend(errorDiv);
                    
                    // Remove error message after 5 seconds
                    setTimeout(() => {
                        errorDiv.remove();
                    }, 5000);
                }
            } catch (error) {
                console.error('Error submitting newsletter form:', error);
                
                // Show error message
                const errorDiv = document.createElement('div');
                errorDiv.className = 'alert alert-danger';
                errorDiv.textContent = 'An error occurred while subscribing. Please try again.';
                
                // Insert error message before the form
                newsletterForm.prepend(errorDiv);
                
                // Remove error message after 5 seconds
                setTimeout(() => {
                    errorDiv.remove();
                }, 5000);
            } finally {
                // Re-enable submit button
                submitButton.disabled = false;
                submitButton.textContent = originalButtonText;
            }
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

function showAlert(message, type, targetId = null) {
    if (targetId) {
        // Show alert in specific target element
        const targetElement = document.getElementById(targetId);
        if (targetElement) {
            targetElement.textContent = message;
            targetElement.className = `form-status ${type}`;
            targetElement.style.display = 'block';
            
            // Scroll to the alert
            targetElement.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            
            // Hide success messages after 5 seconds
            if (type === 'success') {
                setTimeout(() => {
                    targetElement.style.display = 'none';
                }, 5000);
            }
            return;
        }
    }
    
    // Fallback to floating alert if target not found
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

// Function to show a popup message after form submission
function showPopupMessage(title, message, type = 'success') {
    // Create modal container
    const modalContainer = document.createElement('div');
    modalContainer.className = 'popup-modal';
    
    // Create modal content
    const modalContent = document.createElement('div');
    modalContent.className = 'popup-modal-content';
    
    // Create close button
    const closeBtn = document.createElement('span');
    closeBtn.className = 'popup-close';
    closeBtn.innerHTML = '&times;';
    closeBtn.onclick = function() {
        document.body.removeChild(modalContainer);
    };
    
    // Create icon
    const icon = document.createElement('div');
    icon.className = 'popup-icon';
    if (type === 'success') {
        icon.innerHTML = '<i class="fas fa-check-circle"></i>';
    } else if (type === 'error') {
        icon.innerHTML = '<i class="fas fa-exclamation-circle"></i>';
    } else if (type === 'info') {
        icon.innerHTML = '<i class="fas fa-info-circle"></i>';
    }
    
    // Create title
    const titleEl = document.createElement('h3');
    titleEl.textContent = title;
    
    // Create message
    const messageEl = document.createElement('p');
    messageEl.innerHTML = message;
    
    // Create OK button
    const okButton = document.createElement('button');
    okButton.className = 'popup-btn';
    okButton.textContent = 'OK';
    okButton.onclick = function() {
        document.body.removeChild(modalContainer);
    };
    
    // Append elements to modal content
    modalContent.appendChild(closeBtn);
    modalContent.appendChild(icon);
    modalContent.appendChild(titleEl);
    modalContent.appendChild(messageEl);
    modalContent.appendChild(okButton);
    
    // Append modal content to modal container
    modalContainer.appendChild(modalContent);
    
    // Add modal container to body
    document.body.appendChild(modalContainer);
    
    // Add styles for the popup
    const style = document.createElement('style');
    style.textContent = `
        .popup-modal {
            display: flex;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
            animation: fadeIn 0.3s ease-out forwards;
        }
        
        .popup-modal-content {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            max-width: 400px;
            width: 90%;
            text-align: center;
            position: relative;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            animation: scaleIn 0.3s ease-out forwards;
        }
        
        .popup-close {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 24px;
            font-weight: bold;
            color: #aaa;
            cursor: pointer;
        }
        
        .popup-close:hover {
            color: #555;
        }
        
        .popup-icon {
            font-size: 48px;
            margin-bottom: 20px;
            color: ${type === 'success' ? '#28a745' : type === 'error' ? '#dc3545' : '#17a2b8'};
        }
        
        .popup-modal h3 {
            color: #333;
            margin-bottom: 15px;
        }
        
        .popup-modal p {
            color: #666;
            margin-bottom: 20px;
            line-height: 1.5;
        }
        
        .popup-btn {
            background-color: ${type === 'success' ? '#28a745' : type === 'error' ? '#dc3545' : '#17a2b8'};
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
            transition: background-color 0.3s;
        }
        
        .popup-btn:hover {
            background-color: ${type === 'success' ? '#218838' : type === 'error' ? '#c82333' : '#138496'};
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes scaleIn {
            from { transform: scale(0.8); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }
    `;
    document.head.appendChild(style);
    
    // Auto-close after 5 seconds for success messages
    if (type === 'success') {
        setTimeout(function() {
            if (document.body.contains(modalContainer)) {
                document.body.removeChild(modalContainer);
            }
        }, 5000);
    }
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