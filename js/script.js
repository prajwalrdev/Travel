/**
 * TravelEase Theme JavaScript
 * Handles mobile menu, smooth scrolling, and other interactive features
 */

document.addEventListener('DOMContentLoaded', function() {
    
    // Mobile Menu Toggle
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle') || document.querySelector('.mobile-menu-btn');
    const navLinks = document.querySelector('.nav-links');
    const headerEl = document.querySelector('header');
    // Add overlay for mobile nav
    let navOverlay = document.querySelector('.nav-overlay');
    if (!navOverlay) {
        navOverlay = document.createElement('div');
        navOverlay.className = 'nav-overlay';
        document.body.appendChild(navOverlay);
    }
    
    if (mobileMenuToggle && navLinks) {
        mobileMenuToggle.addEventListener('click', function(e) {
            e.stopPropagation();
            navLinks.classList.toggle('active');
            mobileMenuToggle.classList.toggle('active');
            const isExpanded = navLinks.classList.contains('active');
            navOverlay.style.display = isExpanded ? 'block' : 'none';
            try { mobileMenuToggle.setAttribute('aria-expanded', isExpanded ? 'true' : 'false'); } catch (err) {}
        });
        navOverlay.addEventListener('click', function() {
            navLinks.classList.remove('active');
            mobileMenuToggle.classList.remove('active');
            navOverlay.style.display = 'none';
            try { mobileMenuToggle.setAttribute('aria-expanded', 'false'); } catch (err) {}
        });
        // Dropdown toggle for mobile
        document.querySelectorAll('.dropdown > a').forEach(function(dropLink) {
            dropLink.addEventListener('click', function(e) {
                if (window.innerWidth <= 768) {
                    e.preventDefault();
                    const parent = this.parentElement;
                    parent.classList.toggle('active');
                }
            });
        });
        // Close mobile menu when clicking outside the header/nav area
        document.addEventListener('click', function(event) {
            if (!event.target.closest('header') && navLinks.classList.contains('active')) {
                navLinks.classList.remove('active');
                mobileMenuToggle.classList.remove('active');
                navOverlay.style.display = 'none';
                try { mobileMenuToggle.setAttribute('aria-expanded', 'false'); } catch (err) {}
            }
        });
        // Close mobile menu on resize to desktop
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768 && navLinks.classList.contains('active')) {
                navLinks.classList.remove('active');
                mobileMenuToggle.classList.remove('active');
                navOverlay.style.display = 'none';
                try { mobileMenuToggle.setAttribute('aria-expanded', 'false'); } catch (err) {}
            }
        });
    }
    
    // Smooth Scrolling for Anchor Links
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    
    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            
            if (href === '#') return;
            
            const targetElement = document.querySelector(href);
            
            if (targetElement) {
                e.preventDefault();
                
                const headerHeight = document.querySelector('header').offsetHeight;
                const targetPosition = targetElement.offsetTop - headerHeight;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
                
                // Close mobile menu after clicking a link
                if (navLinks) {
                    navLinks.classList.remove('active');
                    if (mobileMenuToggle) mobileMenuToggle.classList.remove('active');
                    if (navOverlay) navOverlay.style.display = 'none';
                    try { if (mobileMenuToggle) mobileMenuToggle.setAttribute('aria-expanded', 'false'); } catch (err) {}
                }
            }
        });
    });
    
    // Header is not fixed; remove scroll-based style toggling
    
    // Animate Elements on Scroll
    

    const observerOptions = {
        threshold: 0.5,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    // Observe elements for animation
    const animateElements = document.querySelectorAll('.feature-card, .service-card, .destination-card, .testimonial-card');
    
    animateElements.forEach(element => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(30px)';
        element.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(element);
    });

    // Animated Counters in Stats Section
    const counters = document.querySelectorAll('.counter');
    function animateCounter(counterEl) {
        if (counterEl.dataset.animated === 'true') return; // run once
        counterEl.dataset.animated = 'true';
        const base = parseInt(counterEl.getAttribute('data-target') || '1000', 10);
        const minAttr = parseInt(counterEl.getAttribute('data-min') || '0', 10);
        const maxAttr = parseInt(counterEl.getAttribute('data-max') || '0', 10);
        const min = Number.isFinite(minAttr) && minAttr > 0 ? minAttr : Math.max(1, Math.floor(base * 0.9));
        const max = Number.isFinite(maxAttr) && maxAttr > 0 ? maxAttr : Math.ceil(base * 1.1);
        const target = Math.max(min, Math.min(max, Math.floor(Math.random() * (max - min + 1)) + min));
        const durationMs = 1600;
        const startTime = performance.now();

        function step(now) {
            const progress = Math.min((now - startTime) / durationMs, 1);
            const current = Math.floor(target * progress);
            counterEl.textContent = current.toLocaleString();
            if (progress < 1) {
                requestAnimationFrame(step);
            } else {
                counterEl.textContent = target.toLocaleString();
            }
        }
        requestAnimationFrame(step);
    }

    if (counters.length) {
        const counterObserver = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    obs.unobserve(entry.target);
                }
            });
        }, { threshold: 0.3 });

        counters.forEach(c => counterObserver.observe(c));
    }
    
    // Form Validation and Submission
    const contactForm = document.querySelector('.contact-form form');
    const bookingForm = document.querySelector('.booking-form');
    const supportForm = document.querySelector('.support-form');
    
    function validateForm(form) {
        const inputs = form.querySelectorAll('input[required], textarea[required], select[required]');
        let isValid = true;
        
        inputs.forEach(input => {
            if (!input.value.trim()) {
                isValid = false;
                input.style.borderColor = '#dc3545';
                
                // Remove error styling after user starts typing
                input.addEventListener('input', function() {
                    this.style.borderColor = '#dee2e6';
                });
            } else {
                input.style.borderColor = '#dee2e6';
            }
        });
        
        return isValid;
    }
    
    function showMessage(message, type = 'success') {
        const messageDiv = document.createElement('div');
        messageDiv.className = `alert alert-${type}`;
        messageDiv.textContent = message;
        messageDiv.style.cssText = `
            padding: 1rem;
            margin: 1rem 0;
            border-radius: 5px;
            color: ${type === 'success' ? '#155724' : '#721c24'};
            background-color: ${type === 'success' ? '#d4edda' : '#f8d7da'};
            border: 1px solid ${type === 'success' ? '#c3e6cb' : '#f5c6cb'};
        `;
        
        // Insert message before the form
        const form = messageDiv.parentElement;
        if (form) {
            form.parentElement.insertBefore(messageDiv, form);
        }
        
        // Remove message after 5 seconds
        setTimeout(() => {
            messageDiv.remove();
        }, 5000);
    }
    
    // Contact Form Handler
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (validateForm(this)) {
                // Simulate form submission
                const submitButton = this.querySelector('button[type="submit"]');
                const originalText = submitButton.textContent;
                
                submitButton.textContent = 'Sending...';
                submitButton.disabled = true;
                
                setTimeout(() => {
                    showMessage('Thank you for your message! We will get back to you soon.');
                    this.reset();
                    submitButton.textContent = originalText;
                    submitButton.disabled = false;
                }, 2000);
            } else {
                showMessage('Please fill in all required fields.', 'error');
            }
        });
    }
    
    // Booking Form Handler
    if (bookingForm) {
        bookingForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (validateForm(this)) {
                const submitButton = this.querySelector('.booking-submit');
                const originalText = submitButton.textContent;
                
                submitButton.textContent = 'Processing...';
                submitButton.disabled = true;
                
                setTimeout(() => {
                    showMessage('Booking request submitted successfully! We will confirm your booking shortly.');
                    this.reset();
                    submitButton.textContent = originalText;
                    submitButton.disabled = false;
                }, 2000);
            } else {
                showMessage('Please fill in all required fields.', 'error');
            }
        });
    }
    
    // Support Form Handler
    if (supportForm) {
        supportForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (validateForm(this)) {
                const submitButton = this.querySelector('button[type="submit"]');
                const originalText = submitButton.textContent;
                
                submitButton.textContent = 'Sending...';
                submitButton.disabled = true;
                
                setTimeout(() => {
                    showMessage('Your support request has been submitted. We will respond within 24 hours.');
                    this.reset();
                    submitButton.textContent = originalText;
                    submitButton.disabled = false;
                }, 2000);
            } else {
                showMessage('Please fill in all required fields.', 'error');
            }
        });
    }
    
    // FAQ Accordion (for support page)
    const faqQuestions = document.querySelectorAll('.faq-question');
    
    faqQuestions.forEach(question => {
        question.addEventListener('click', function() {
            const answer = this.nextElementSibling;
            const isActive = this.classList.contains('active');
            
            // Close all other FAQ items
            faqQuestions.forEach(q => {
                q.classList.remove('active');
                q.nextElementSibling.classList.remove('active');
            });
            
            // Toggle current FAQ item
            if (!isActive) {
                this.classList.add('active');
                answer.classList.add('active');
            }
        });
    });
    
    // Search Functionality (for blog page)
    const searchForm = document.querySelector('.blog-search form');
    
    if (searchForm) {
        searchForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const searchInput = this.querySelector('input[name="s"]');
            const searchTerm = searchInput.value.trim();
            
            if (searchTerm) {
                // Simulate search functionality
                showMessage(`Searching for: "${searchTerm}"`);
                // In a real implementation, this would redirect to search results
            } else {
                showMessage('Please enter a search term.', 'error');
            }
        });
    }
    
    // Lazy Loading for Images
    const images = document.querySelectorAll('img[data-src]');
    
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });
        
        images.forEach(img => imageObserver.observe(img));
    }
    
    // Back to Top Button
    let backToTopButton = document.querySelector('.back-to-top');
    if (!backToTopButton) {
        backToTopButton = document.createElement('button');
        backToTopButton.innerHTML = '<i class="fas fa-arrow-up"></i>';
        backToTopButton.className = 'back-to-top';
        backToTopButton.style.cssText = `
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 1000;
            font-size: 1.2rem;
        `;
        document.body.appendChild(backToTopButton);
    }
    
    window.addEventListener('scroll', function() {
        if (window.scrollY > 300) {
            backToTopButton.style.opacity = '1';
            backToTopButton.style.visibility = 'visible';
        } else {
            backToTopButton.style.opacity = '0';
            backToTopButton.style.visibility = 'hidden';
        }
    });
    
    backToTopButton.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    // Service Type Selection (for booking page)
    const serviceTypeSelect = document.querySelector('#service-type');
    const vehicleTypeSelect = document.querySelector('#vehicle-type');
    
    if (serviceTypeSelect && vehicleTypeSelect) {
        serviceTypeSelect.addEventListener('change', function() {
            const selectedService = this.value;
            
            // Update vehicle options based on service type
            vehicleTypeSelect.innerHTML = '<option value="">Select Vehicle</option>';
            
            const vehicleOptions = {
                'airport-transfer': ['sedan', 'suv', 'luxury'],
                'city-taxi': ['sedan', 'hatchback', 'suv'],
                'corporate-travel': ['sedan', 'suv', 'luxury'],
                'event-transport': ['sedan', 'suv', 'minivan', 'bus'],
                'executive-travel': ['luxury'],
                'group-transport': ['minivan', 'bus']
            };
            
            if (vehicleOptions[selectedService]) {
                vehicleOptions[selectedService].forEach(vehicle => {
                    const option = document.createElement('option');
                    option.value = vehicle;
                    option.textContent = vehicle.charAt(0).toUpperCase() + vehicle.slice(1);
                    vehicleTypeSelect.appendChild(option);
                });
            }
        });
    }
    
    // Initialize tooltips and other UI enhancements
    console.log('TravelEase theme JavaScript loaded successfully!');
});