// Portfolio v2.0 - JavaScript Enhancements
// Author: Rohit Sawant

// ======================
// 1. UTILITY FUNCTIONS
// ======================

// Debounce function for performance
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// ======================
// 2. TYPING ANIMATION
// ======================

function initTypingAnimation() {
    const texts = [
        "Creative Developer & Designer",
        "Full Stack Developer",
        "UI/UX Enthusiast",
        "Problem Solver"
    ];
    
    const typedTextElement = document.getElementById('typed-text');
    if (!typedTextElement) return;
    
    let textIndex = 0;
    let charIndex = 0;
    let isDeleting = false;
    let typingDelay = 100;
    
    function type() {
        const currentText = texts[textIndex];
        
        if (isDeleting) {
            typedTextElement.textContent = currentText.substring(0, charIndex - 1);
            charIndex--;
            typingDelay = 50;
        } else {
            typedTextElement.textContent = currentText.substring(0, charIndex + 1);
            charIndex++;
            typingDelay = 100;
        }
        
        if (!isDeleting && charIndex === currentText.length) {
            typingDelay = 2000; // Pause at end
            isDeleting = true;
        } else if (isDeleting && charIndex === 0) {
            isDeleting = false;
            textIndex = (textIndex + 1) % texts.length;
            typingDelay = 500; // Pause before next text
        }
        
        setTimeout(type, typingDelay);
    }
    
    // Start typing after splash screen
    setTimeout(type, 3000);
}

// ======================
// 3. ACTIVE NAVIGATION
// ======================

function initActiveNavigation() {
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-link');
    const mainArea = document.querySelector('.main-area');

    function updateActiveNav() {
        const scrollY = mainArea.scrollTop; // use mainArea scroll instead of window

        sections.forEach(section => {
            const sectionHeight = section.offsetHeight;
            const sectionTop = section.offsetTop - 100;
            const sectionId = section.getAttribute('id');
            
            if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
                navLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('data-section') === sectionId) {
                        link.classList.add('active');
                    }
                });
            }
        });
    }

    if (mainArea) {
        mainArea.addEventListener('scroll', debounce(updateActiveNav, 10));
        updateActiveNav(); // Initial check
    }
}

// ======================
// 4. SMOOTH SCROLL
// ======================

function initSmoothScroll() {
    const navLinks = document.querySelectorAll('.nav-link');
    
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            const targetSection = document.querySelector(targetId);
            const mainArea = document.querySelector('.main-area');
            
            if (targetSection && mainArea) {
                const offsetTop = targetSection.offsetTop - 80; // Offset for fixed headers
                
                mainArea.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
                
                // Close sidebar on mobile after clicking
                if (window.innerWidth <= 768) {
                    const sidebarToggle = document.getElementById('sidebar-toggle');
                    if (sidebarToggle) {
                        sidebarToggle.checked = false;
                    }
                }
            }
        });
    });
}

// ======================
// 5. SCROLL PROGRESS BAR
// ======================

function initScrollProgressBar() {
    const progressBar = document.querySelector('.scroll-progress-bar');
    if (!progressBar) return;
    
    function updateProgressBar() {
        const windowHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (window.pageYOffset / windowHeight) * 100;
        progressBar.style.width = scrolled + '%';
    }
    
    window.addEventListener('scroll', debounce(updateProgressBar, 10));
    updateProgressBar();
}

// ======================
// 6. SCROLL ANIMATIONS
// ======================

function initScrollAnimations() {
    const fadeElements = document.querySelectorAll('.fade-in-section');
    
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
            }
        });
    }, observerOptions);
    
    fadeElements.forEach(element => {
        observer.observe(element);
    });
}

// ======================
// 7. ANIMATED COUNTERS
// ======================

function initAnimatedCounters() {
    const counters = document.querySelectorAll('.stat-number');
    let hasAnimated = false;
    
    function animateCounter(counter) {
        const target = parseInt(counter.getAttribute('data-target'));
        const duration = 2000; // 2 seconds
        const increment = target / (duration / 16); // 60fps
        let current = 0;
        
        const updateCounter = () => {
            current += increment;
            if (current < target) {
                counter.textContent = Math.floor(current) + '+';
                requestAnimationFrame(updateCounter);
            } else {
                counter.textContent = target + '+';
            }
        };
        
        updateCounter();
    }
    
    function checkCountersInView() {
        if (hasAnimated) return;
        
        const sidebar = document.querySelector('.sidebar-footer');
        if (!sidebar) return;
        
        const rect = sidebar.getBoundingClientRect();
        const isVisible = rect.top < window.innerHeight && rect.bottom >= 0;
        
        if (isVisible) {
            hasAnimated = true;
            counters.forEach(counter => animateCounter(counter));
        }
    }
    
    window.addEventListener('scroll', debounce(checkCountersInView, 100));
    checkCountersInView(); // Check on load
}

// ======================
// 8. SKILL BARS ANIMATION
// ======================

function initSkillBarsAnimation() {
    const skillBars = document.querySelectorAll('.skill-progress');
    let hasAnimated = false;
    const skillsSection = document.getElementById('skills');
    const mainArea = document.querySelector('.main-area');

    function animateSkillBars() {
        if (hasAnimated || !skillsSection || !mainArea) return;

        const rect = skillsSection.getBoundingClientRect();
        const mainRect = mainArea.getBoundingClientRect();

        // Check if section is visible inside mainArea
        const isVisible = rect.top < mainRect.bottom && rect.bottom > mainRect.top;

        if (isVisible) {
            hasAnimated = true;
            skillBars.forEach(bar => {
                const progress = bar.getAttribute('data-progress');
                bar.style.width = progress + '%';
            });
        }
    }

    if (mainArea) {
        mainArea.addEventListener('scroll', debounce(animateSkillBars, 100));
    }
    animateSkillBars();
}

// ======================
// 9. AUTO-CLOSE SIDEBAR
// ======================

function initAutoCloseSidebar() {
    const sidebarToggle = document.getElementById('sidebar-toggle');
    const navLinks = document.querySelectorAll('.nav-link');
    
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth <= 768 && sidebarToggle) {
                sidebarToggle.checked = false;
            }
        });
    });
}

// ======================
// 10. BACK TO TOP BUTTON
// ======================

function initBackToTop() {
    const backToTopBtn = document.createElement('button');
    backToTopBtn.className = 'back-to-top';
    backToTopBtn.innerHTML = '<i class="fas fa-arrow-up"></i>';
    backToTopBtn.setAttribute('aria-label', 'Back to top');
    document.body.appendChild(backToTopBtn);

    const mainArea = document.querySelector('.main-area');

    function toggleBackToTop() {
        if (mainArea.scrollTop > 300) {
            backToTopBtn.classList.add('visible');
        } else {
            backToTopBtn.classList.remove('visible');
        }
    }

    backToTopBtn.addEventListener('click', function() {
        mainArea.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    if (mainArea) {
        mainArea.addEventListener('scroll', debounce(toggleBackToTop, 100));
        toggleBackToTop();
    }
}

// ======================
// 11. SPLASH SCREEN
// ======================

function initSplashScreen() {
    const splashScreen = document.querySelector('.splash-screen');
    
    // Hide splash screen after animation
    setTimeout(() => {
        if (splashScreen) {
            splashScreen.style.display = 'none';
        }
    }, 3000);
}

// ======================
// 12. FORM VALIDATION
// ======================

function initFormValidation() {
    // Placeholder for future contact form
    // Will add in next update when we add a contact form
    console.log('Form validation ready for future implementation');
}

// ======================
// 13. KEYBOARD NAVIGATION
// ======================

function initKeyboardNavigation() {
    document.addEventListener('keydown', function(e) {
        // ESC key closes sidebar
        if (e.key === 'Escape') {
            const sidebarToggle = document.getElementById('sidebar-toggle');
            if (sidebarToggle && sidebarToggle.checked) {
                sidebarToggle.checked = false;
            }
        }
    });
}

// ======================
// 14. LAZY LOADING IMAGES
// ======================

function initLazyLoading() {
    const images = document.querySelectorAll('img[data-src]');
    
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.add('loaded');
                observer.unobserve(img);
            }
        });
    });
    
    images.forEach(img => imageObserver.observe(img));
}

// ======================
// 15. PERFORMANCE MONITORING
// ======================

function initPerformanceMonitoring() {
    // Log performance metrics
    window.addEventListener('load', function() {
        if ('performance' in window) {
            const perfData = window.performance.timing;
            const pageLoadTime = perfData.loadEventEnd - perfData.navigationStart;
            console.log('Page load time:', pageLoadTime + 'ms');
        }
    });
}

// ======================
// INITIALIZATION
// ======================

document.addEventListener('DOMContentLoaded', function() {
    console.log('Portfolio v2.0 - JavaScript Initialized');
    
    // Initialize all features
    initSplashScreen();
    initTypingAnimation();
    initActiveNavigation();
    initSmoothScroll();
    initScrollProgressBar();
    initScrollAnimations();
    initAnimatedCounters();
    initSkillBarsAnimation();
    initAutoCloseSidebar();
    initBackToTop();
    initKeyboardNavigation();
    initLazyLoading();
    initPerformanceMonitoring();
    
    // Log successful initialization
    console.log('All features initialized successfully!');
});

// ======================
// WINDOW LOAD EVENT
// ======================

window.addEventListener('load', function() {
    // Add loaded class to body for CSS animations
    document.body.classList.add('loaded');
    
    // Initialize any features that need full page load
    console.log('Page fully loaded');
});
