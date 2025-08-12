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

    if (menuBtn && navLinks) {
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
}

// Slider functionality
function initSliders() {
    // Destinations slider
    const destinationsSlider = document.querySelector('.destinations-slider');
    if (destinationsSlider) {
        const cards = destinationsSlider.querySelectorAll('.destination-card');
        const prevBtn = destinationsSlider.parentElement.querySelector('.prev-btn');
        const nextBtn = destinationsSlider.parentElement.querySelector('.next-btn');
        let currentIndex = 0;

        function showCard(index) {
            cards.forEach((card, i) => {
                card.style.transform = `translateX(${(i - index) * 100}%)`;
            });
        }

        if (prevBtn) {
            prevBtn.addEventListener('click', function() {
                currentIndex = (currentIndex - 1 + cards.length) % cards.length;
                showCard(currentIndex);
            });
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', function() {
                currentIndex = (currentIndex + 1) % cards.length;
                showCard(currentIndex);
            });
        }

        // Auto-slide
        setInterval(function() {
            currentIndex = (currentIndex + 1) % cards.length;
            showCard(currentIndex);
        }, 5000);
    }

    // Testimonials slider
    const testimonialsSlider = document.querySelector('.testimonials-slider');
    if (testimonialsSlider) {
        const cards = testimonialsSlider.querySelectorAll('.testimonial-card');
        const prevBtn = testimonialsSlider.parentElement.querySelector('.prev-btn');
        const nextBtn = testimonialsSlider.parentElement.querySelector('.next-btn');
        let currentIndex = 0;

        function showCard(index) {
            cards.forEach((card, i) => {
                card.style.transform = `translateX(${(i - index) * 100}%)`;
            });
        }

        if (prevBtn) {
            prevBtn.addEventListener('click', function() {
                currentIndex = (currentIndex - 1 + cards.length) % cards.length;
                showCard(currentIndex);
            });
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', function() {
                currentIndex = (currentIndex + 1) % cards.length;
                showCard(currentIndex);
            });
        }

        // Auto-slide
        setInterval(function() {
            currentIndex = (currentIndex + 1) % cards.length;
            showCard(currentIndex);
        }, 6000);
    }
}

// Counter animation
function initCounters() {
    const counters = document.querySelectorAll('.counter');
    
    const animateCounter = (counter) => {
        const target = parseInt(counter.getAttribute('data-target'));
        const duration = 2000; // 2 seconds
        const step = target / (duration / 16); // 60fps
        let current = 0;
        
        const timer = setInterval(() => {
            current += step;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            counter.textContent = Math.floor(current).toLocaleString();
        }, 16);
    };

    const observerOptions = {
        threshold: 0.5,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    counters.forEach(counter => {
        observer.observe(counter);
    });
}

// Back to top functionality
function initScrollToTop() {
    const backToTopBtn = document.querySelector('.back-to-top');
    
    if (backToTopBtn) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 300) {
                backToTopBtn.classList.add('active');
            } else {
                backToTopBtn.classList.remove('active');
            }
        });

        backToTopBtn.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
}

// Form validation and submission
function initFormValidation() {
    // Contact form
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (validateContactForm()) {
                submitContactForm();
            }
        });
    }

    // Newsletter form
    const newsletterForm = document.getElementById('newsletterForm');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (validateNewsletterForm()) {
                submitNewsletterForm();
            }
        });
    }
}

// Contact form validation
function validateContactForm() {
    const form = document.getElementById('contactForm');
    const name = form.querySelector('#name').value.trim();
    const email = form.querySelector('#email').value.trim();
    const phone = form.querySelector('#phone').value.trim();
    const service = form.querySelector('#service').value;
    const date = form.querySelector('#date').value;
    const time = form.querySelector('#time').value;
    
    let isValid = true;
    
    // Reset previous error states
    clearFormErrors(form);
    
    // Name validation
    if (name.length < 2) {
        showFieldError(form.querySelector('#name'), 'Name must be at least 2 characters long');
        isValid = false;
    }
    
    // Email validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        showFieldError(form.querySelector('#email'), 'Please enter a valid email address');
        isValid = false;
    }
    
    // Phone validation
    const phoneRegex = /^[\+]?[1-9][\d]{0,15}$/;
    if (!phoneRegex.test(phone.replace(/[\s\-\(\)]/g, ''))) {
        showFieldError(form.querySelector('#phone'), 'Please enter a valid phone number');
        isValid = false;
    }
    
    // Service validation
    if (!service) {
        showFieldError(form.querySelector('#service'), 'Please select a service');
        isValid = false;
    }
    
    // Date validation
    if (!date) {
        showFieldError(form.querySelector('#date'), 'Please select a date');
        isValid = false;
    }
    
    // Time validation
    if (!time) {
        showFieldError(form.querySelector('#time'), 'Please select a time');
        isValid = false;
    }
    
    return isValid;
}

// Newsletter form validation
function validateNewsletterForm() {
    const form = document.getElementById('newsletterForm');
    const email = form.querySelector('input[name="email"]').value.trim();
    
    let isValid = true;
    
    // Reset previous error states
    clearFormErrors(form);
    
    // Email validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        showFieldError(form.querySelector('input[name="email"]'), 'Please enter a valid email address');
        isValid = false;
    }
    
    return isValid;
}

// Show field error
function showFieldError(field, message) {
    field.classList.add('error');
    
    // Create error message element
    const errorDiv = document.createElement('div');
    errorDiv.className = 'field-error';
    errorDiv.textContent = message;
    errorDiv.style.color = '#dc3545';
    errorDiv.style.fontSize = '12px';
    errorDiv.style.marginTop = '5px';
    
    field.parentNode.appendChild(errorDiv);
}

// Clear form errors
function clearFormErrors(form) {
    const errorFields = form.querySelectorAll('.error');
    const errorMessages = form.querySelectorAll('.field-error');
    
    errorFields.forEach(field => field.classList.remove('error'));
    errorMessages.forEach(message => message.remove());
}

// Submit contact form via AJAX
function submitContactForm() {
    const form = document.getElementById('contactForm');
    const statusDiv = document.getElementById('contactFormStatus');
    const submitBtn = form.querySelector('button[type="submit"]');
    
    // Show loading state
    submitBtn.disabled = true;
    submitBtn.textContent = 'Sending...';
    statusDiv.innerHTML = '<div class="loading">Sending your message...</div>';
    
    // Prepare form data
    const formData = new FormData(form);
    formData.append('action', 'travelease_contact_form');
    formData.append('nonce', travelease_ajax.nonce);
    
    // Send AJAX request
    fetch(travelease_ajax.ajax_url, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            statusDiv.innerHTML = '<div class="success">' + data.data + '</div>';
            form.reset();
            showPopup('success', 'Success!', data.data);
        } else {
            statusDiv.innerHTML = '<div class="error">' + data.data + '</div>';
            showPopup('error', 'Error', data.data);
        }
    })
    .catch(error => {
        statusDiv.innerHTML = '<div class="error">An error occurred. Please try again.</div>';
        showPopup('error', 'Error', 'An error occurred. Please try again.');
    })
    .finally(() => {
        // Reset button state
        submitBtn.disabled = false;
        submitBtn.textContent = 'Submit Inquiry';
    });
}

// Submit newsletter form via AJAX
function submitNewsletterForm() {
    const form = document.getElementById('newsletterForm');
    const statusDiv = document.getElementById('newsletterFormStatus');
    const submitBtn = form.querySelector('button[type="submit"]');
    
    // Show loading state
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
    statusDiv.innerHTML = '<div class="loading">Subscribing...</div>';
    
    // Prepare form data
    const formData = new FormData(form);
    formData.append('action', 'travelease_newsletter_form');
    formData.append('nonce', travelease_ajax.nonce);
    
    // Send AJAX request
    fetch(travelease_ajax.ajax_url, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            statusDiv.innerHTML = '<div class="success">' + data.data + '</div>';
            form.reset();
            showPopup('success', 'Success!', data.data);
        } else {
            statusDiv.innerHTML = '<div class="error">' + data.data + '</div>';
            showPopup('error', 'Error', data.data);
        }
    })
    .catch(error => {
        statusDiv.innerHTML = '<div class="error">An error occurred. Please try again.</div>';
        showPopup('error', 'Error', 'An error occurred. Please try again.');
    })
    .finally(() => {
        // Reset button state
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="fas fa-paper-plane"></i>';
    });
}

// Show popup modal
function showPopup(type, title, message) {
    const modalContainer = document.createElement('div');
    modalContainer.className = 'popup-modal';
    modalContainer.innerHTML = `
        <div class="popup-modal-content">
            <span class="popup-close">&times;</span>
            <div class="popup-icon">
                <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'}"></i>
            </div>
            <h3>${title}</h3>
            <p>${message}</p>
            <button class="popup-btn">OK</button>
        </div>
    `;
    
    document.body.appendChild(modalContainer);
    
    // Close functionality
    const closeBtn = modalContainer.querySelector('.popup-close');
    const okBtn = modalContainer.querySelector('.popup-btn');
    
    const closeModal = () => {
        modalContainer.style.animation = 'fadeOut 0.3s ease-out forwards';
        setTimeout(() => {
            if (document.body.contains(modalContainer)) {
                document.body.removeChild(modalContainer);
            }
        }, 300);
    };
    
    closeBtn.addEventListener('click', closeModal);
    okBtn.addEventListener('click', closeModal);
    modalContainer.addEventListener('click', function(e) {
        if (e.target === modalContainer) {
            closeModal();
        }
    });
    
    // Add styles
    const style = document.createElement('style');
    style.textContent = `
        .popup-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 10000;
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
        
        @keyframes fadeOut {
            from { opacity: 1; }
            to { opacity: 0; }
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
                closeModal();
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