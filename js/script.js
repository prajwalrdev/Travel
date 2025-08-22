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
        navOverlay.setAttribute('aria-hidden', 'true');
        document.body.appendChild(navOverlay);
    }
    
    if (mobileMenuToggle && navLinks) {
        // Function to close mobile menu
        function closeMobileMenu() {
            navLinks.classList.remove('active');
            mobileMenuToggle.classList.remove('active');
            navOverlay.style.display = 'none';
            document.body.style.overflow = '';
            try { 
                mobileMenuToggle.setAttribute('aria-expanded', 'false');
                navOverlay.setAttribute('aria-hidden', 'true');
            } catch (err) {}
        }
        
        // Function to open mobile menu
        function openMobileMenu() {
            navLinks.classList.add('active');
            mobileMenuToggle.classList.add('active');
            navOverlay.style.display = 'block';
            document.body.style.overflow = 'hidden';
            try { 
                mobileMenuToggle.setAttribute('aria-expanded', 'true');
                navOverlay.setAttribute('aria-hidden', 'false');
            } catch (err) {}
        }
        
        mobileMenuToggle.addEventListener('click', function(e) {
            e.stopPropagation();
            const isActive = navLinks.classList.contains('active');
            
            if (isActive) {
                closeMobileMenu();
            } else {
                openMobileMenu();
            }
        });
        
        navOverlay.addEventListener('click', closeMobileMenu);
        
        // Dropdown toggle for mobile
        document.querySelectorAll('.dropdown > a').forEach(function(dropLink) {
            dropLink.addEventListener('click', function(e) {
                if (window.innerWidth <= 900) {
                    e.preventDefault();
                    const parent = this.parentElement;
                    const isActive = parent.classList.contains('active');
                    
                    // Close other dropdowns
                    document.querySelectorAll('.dropdown.active').forEach(function(activeDropdown) {
                        if (activeDropdown !== parent) {
                            activeDropdown.classList.remove('active');
                        }
                    });
                    
                    parent.classList.toggle('active');
                    
                    // Add smooth animation
                    const dropdownMenu = parent.querySelector('.dropdown-menu');
                    if (dropdownMenu) {
                        if (parent.classList.contains('active')) {
                            dropdownMenu.style.transition = 'all 0.3s ease';
                        }
                    }
                }
            });
        });
        
        // Ensure dropdown links work properly
        document.querySelectorAll('.dropdown-menu a').forEach(function(dropdownLink) {
            dropdownLink.addEventListener('click', function(e) {
                // Allow the link to work normally
                if (window.innerWidth <= 900) {
                    // Close mobile menu after clicking dropdown link
                    setTimeout(() => {
                        closeMobileMenu();
                    }, 150);
                }
            });
        });
        
        // Close mobile menu when clicking on a nav link (except dropdowns)
        document.querySelectorAll('.nav-links a').forEach(function(navLink) {
            if (!navLink.parentElement.classList.contains('dropdown')) {
                navLink.addEventListener('click', function(e) {
                    // Ensure the link works properly
                    const href = this.getAttribute('href');
                    if (href && href !== '#' && href !== 'javascript:void(0)') {
                        // Link is valid, close mobile menu
                        if (window.innerWidth <= 900) {
                            setTimeout(() => {
                                closeMobileMenu();
                            }, 100);
                        }
                    }
                });
            }
        });
        
        // Close mobile menu when clicking outside the header/nav area
        document.addEventListener('click', function(event) {
            if (!event.target.closest('header') && navLinks.classList.contains('active')) {
                closeMobileMenu();
            }
        });
        
        // Close mobile menu on resize to desktop
        window.addEventListener('resize', function() {
            if (window.innerWidth > 900 && navLinks.classList.contains('active')) {
                closeMobileMenu();
            }
        });
        
        // Keyboard navigation support
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && navLinks.classList.contains('active')) {
                closeMobileMenu();
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
                
                // Close mobile menu first if open
                if (navLinks && navLinks.classList.contains('active')) {
                    closeMobileMenu();
                }
                
                // Smooth scroll to the target section
                setTimeout(() => {
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }, 150);
            }
        });
    });
    
    // Header scroll effect
    function handleHeaderScroll() {
        const header = document.querySelector('header');
        if (header) {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        }
    }
    
    // Add scroll event listener
    window.addEventListener('scroll', handleHeaderScroll);
    
    // Initial check
    handleHeaderScroll();
    
    // Active section highlighting
    function updateActiveSection() {
        const sections = document.querySelectorAll('section[id]');
        const navLinks = document.querySelectorAll('.nav-links a[href^="#"]');
        
        let current = '';
        const headerHeight = document.querySelector('header').offsetHeight;
        
        sections.forEach(section => {
            const sectionTop = section.offsetTop - headerHeight - 100;
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
    }
    
    // Add scroll event listener for active section
    window.addEventListener('scroll', updateActiveSection);
    
    // Initial check
    updateActiveSection();
    
    // Animate Elements on Scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
            }
        });
    }, observerOptions);

    // Observe elements for animation
    document.querySelectorAll('.service-card, .destination-card, .testimonial-card, .stats-item').forEach(el => {
        observer.observe(el);
    });

    // Service Loading Functionality
    const serviceLinks = document.querySelectorAll('.service-link');
    const pageLoadingOverlay = document.getElementById('pageLoadingOverlay');
    
    serviceLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const serviceCard = this.closest('.service-card');
            const btnTextContent = this.querySelector('.btn-text-content');
            const btnTextLoading = this.querySelector('.btn-text-loading');
            const href = this.getAttribute('href');
            
            // Show loading state on button
            if (btnTextContent && btnTextLoading) {
                btnTextContent.style.display = 'none';
                btnTextLoading.style.display = 'inline-block';
            }
            
            // Add loading class to service card
            if (serviceCard) {
                serviceCard.classList.add('loading');
            }
            
            // Show page loading overlay
            if (pageLoadingOverlay) {
                pageLoadingOverlay.classList.add('active');
                document.body.classList.add('page-transitioning');
            }
            
            // Simulate loading delay for better UX
            setTimeout(() => {
                // Navigate to service page
                window.location.href = href;
            }, 800);
        });
    });

    // Hide page loading overlay when page is fully loaded
    window.addEventListener('load', function() {
        if (pageLoadingOverlay) {
            pageLoadingOverlay.classList.remove('active');
            document.body.classList.remove('page-transitioning');
        }
    });

    // Also hide overlay if it's still visible after a timeout
    setTimeout(() => {
        if (pageLoadingOverlay && pageLoadingOverlay.classList.contains('active')) {
            pageLoadingOverlay.classList.remove('active');
            document.body.classList.remove('page-transitioning');
        }
    }, 3000);

    // Add hover effects for service cards
    const serviceCards = document.querySelectorAll('.service-card');
    
    serviceCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.classList.add('hover');
        });
        
        card.addEventListener('mouseleave', function() {
            this.classList.remove('hover');
        });
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

    // Form Handling and Backend Integration
    const contactForm = document.getElementById('contactForm');
    const newsletterForm = document.querySelector('.footer-newsletter form');
    
    // Add CSRF token to forms
    function addCSRFToken() {
        const forms = document.querySelectorAll('form');
        forms.forEach(form => {
            if (!form.querySelector('input[name="csrf_token"]')) {
                const csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = 'csrf_token';
                csrfInput.value = generateCSRFToken();
                form.appendChild(csrfInput);
            }
        });
    }
    
    // Generate CSRF token (simple implementation)
    function generateCSRFToken() {
        return Math.random().toString(36).substr(2, 15) + Math.random().toString(36).substr(2, 15);
    }
    
    // Form validation
    function validateForm(formData) {
        const errors = [];
        
        // Common validation rules
        if (!formData.get('name') || formData.get('name').trim().length < 2) {
            errors.push('Name must be at least 2 characters long');
        }
        
        if (!formData.get('email') || !isValidEmail(formData.get('email'))) {
            errors.push('Please enter a valid email address');
        }
        
        if (!formData.get('phone') || !isValidPhone(formData.get('phone'))) {
            errors.push('Please enter a valid 10-digit phone number');
        }
        
        return errors;
    }
    
    // Email validation
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
    
    // Phone validation
    function isValidPhone(phone) {
        const phoneRegex = /^[0-9]{10}$/;
        return phoneRegex.test(phone.replace(/\D/g, ''));
    }
    
    // Show form status
    function showFormStatus(form, message, type = 'success') {
        const statusDiv = form.querySelector('.form-status') || form.querySelector('#contactFormStatus');
        if (statusDiv) {
            statusDiv.textContent = message;
            statusDiv.className = `form-status ${type}`;
            statusDiv.style.display = 'block';
            
            // Auto-hide after 5 seconds
            setTimeout(() => {
                statusDiv.style.display = 'none';
            }, 5000);
        }
    }
    
    // Submit form via AJAX
    async function submitForm(form, formType) {
        const formData = new FormData(form);
        formData.append('form_type', formType);
        
        // Validate form
        const validationErrors = validateForm(formData);
        if (validationErrors.length > 0) {
            showFormStatus(form, validationErrors.join(', '), 'error');
            return;
        }
        
        // Show loading state
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;
        submitBtn.textContent = 'Sending...';
        submitBtn.disabled = true;
        
        try {
            const response = await fetch('server/process-forms.php', {
                method: 'POST',
                body: formData
            });
            
            const result = await response.json();
            
            if (result.success) {
                showFormStatus(form, result.message, 'success');
                form.reset();
                
                // Show success alert
                showAlert(result.message, 'success');
            } else {
                showFormStatus(form, result.errors.join(', '), 'error');
                showAlert(result.errors.join(', '), 'error');
            }
            
        } catch (error) {
            console.error('Form submission error:', error);
            showFormStatus(form, 'Network error. Please try again.', 'error');
            showAlert('Network error. Please try again.', 'error');
        } finally {
            // Restore button state
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
        }
    }
    
    // Contact form submission
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            submitForm(this, 'contact');
        });
    }
    
    // Newsletter form submission
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            submitForm(this, 'newsletter');
        });
    }

    // Service booking form submissions
    const outstationBookingForm = document.getElementById('outstationBookingForm');
    if (outstationBookingForm) {
        outstationBookingForm.addEventListener('submit', function(e) {
            e.preventDefault();
            submitForm(this, 'outstation_booking');
        });
    }

    const airportBookingForm = document.getElementById('airportBookingForm');
    if (airportBookingForm) {
        airportBookingForm.addEventListener('submit', function(e) {
            e.preventDefault();
            submitForm(this, 'airport_booking');
        });
    }

    const weddingCarBookingForm = document.getElementById('weddingCarBookingForm');
    if (weddingCarBookingForm) {
        weddingCarBookingForm.addEventListener('submit', function(e) {
            e.preventDefault();
            submitForm(this, 'wedding_car_booking');
        });
    }

    const tempoTravellerBookingForm = document.getElementById('tempoTravellerBookingForm');
    if (tempoTravellerBookingForm) {
        tempoTravellerBookingForm.addEventListener('submit', function(e) {
            e.preventDefault();
            submitForm(this, 'tempo_traveller_booking');
        });
    }
    
    // Show alert message
    function showAlert(message, type = 'info') {
        // Remove existing alerts
        const existingAlerts = document.querySelectorAll('.alert');
        existingAlerts.forEach(alert => alert.remove());
        
        const alert = document.createElement('div');
        alert.className = `alert alert-${type}`;
        alert.textContent = message;
        
        document.body.appendChild(alert);
        
        // Auto-remove after 5 seconds
        setTimeout(() => {
            alert.remove();
        }, 5000);
    }
    
    // Initialize forms with CSRF tokens
    addCSRFToken();
    
    // FAQ Accordion Functionality
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        
        question.addEventListener('click', () => {
            const isActive = item.classList.contains('active');
            
            // Close all other FAQ items
            faqItems.forEach(otherItem => {
                otherItem.classList.remove('active');
            });
            
            // Toggle current item
            if (!isActive) {
                item.classList.add('active');
            }
        });
    });
    
    // Service Page Specific Features
    const serviceBookingForms = document.querySelectorAll('[id$="BookingForm"]');
    
    serviceBookingForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = new FormData(this);
            const serviceType = this.id.replace('BookingForm', '').replace(/([A-Z])/g, ' $1').trim();
            
            // Show loading state
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Processing...';
            submitBtn.disabled = true;
            
            // Simulate form submission (replace with actual backend integration)
            setTimeout(() => {
                showAlert(`Thank you! Your ${serviceType} booking request has been submitted. We will contact you shortly to confirm.`, 'success');
                this.reset();
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            }, 2000);
        });
    });
    
    // Smooth scrolling for service page anchor links
    const servicePageLinks = document.querySelectorAll('a[href^="#"]');
    
    servicePageLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            
            if (href !== '#') {
                e.preventDefault();
                const targetElement = document.querySelector(href);
                
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });
    
    // Service page scroll animations
    const servicePageObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });
    
    // Observe service page elements
    document.querySelectorAll('.feature-item, .area-category, .faq-item, .service-card').forEach(el => {
        servicePageObserver.observe(el);
    });

    // Header scroll effect for sticky/solid background
    const header = document.querySelector('header');
    window.addEventListener('scroll', function() {
        if (window.scrollY > 40) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });
});