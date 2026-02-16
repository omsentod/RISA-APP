// ===== HEADER SCROLL EFFECT =====
const header = document.getElementById('header');

window.addEventListener('scroll', () => {
    if (window.scrollY > 20) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
});

// ===== MOBILE MENU TOGGLE =====
const menuToggle = document.getElementById('menuToggle');
const navLinks = document.getElementById('navLinks');

menuToggle.addEventListener('click', () => {
    navLinks.classList.toggle('active');
});

// Close menu when clicking on a link
const navLinksItems = navLinks.querySelectorAll('a');
navLinksItems.forEach(link => {
    link.addEventListener('click', () => {
        navLinks.classList.remove('active');
    });
});

// Close menu when clicking outside
document.addEventListener('click', (e) => {
    if (!navLinks.contains(e.target) && !menuToggle.contains(e.target)) {
        navLinks.classList.remove('active');
    }
});

// ===== SMOOTH SCROLL =====
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            const headerHeight = 140;
            const targetPosition = target.offsetTop - headerHeight;

            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });
        }
    });
});

// ===== PARALLAX EFFECT FOR MANUFACTURING SECTION =====
const manufacturingSection = document.querySelector('.manufacturing');
const parallaxBg = document.querySelector('.parallax-bg');

window.addEventListener('scroll', () => {
    if (manufacturingSection && parallaxBg) {
        const rect = manufacturingSection.getBoundingClientRect();
        const scrollY = window.scrollY;

        // Only apply parallax when section is in view
        if (rect.top < window.innerHeight && rect.bottom > 0) {
            const offset = scrollY * 0.3;
            parallaxBg.style.transform = `translateY(${offset}px)`;
        }
    }
});

// ===== TIMELINE INTERACTION =====
const timelineItems = document.querySelectorAll('.timeline-item');
const timelineDots = document.querySelectorAll('.timeline-dots .dot');

// Function to set active timeline item
function setActiveTimeline(index) {
    // Remove active class from all items
    timelineItems.forEach(item => item.classList.remove('active'));
    timelineDots.forEach(dot => dot.classList.remove('active'));

    // Add active class to selected item
    if (timelineItems[index]) {
        timelineItems[index].classList.add('active');
    }
    if (timelineDots[index]) {
        timelineDots[index].classList.add('active');
    }
}

// Click on timeline cards
timelineItems.forEach((item, index) => {
    item.addEventListener('click', () => {
        setActiveTimeline(index);
    });
});

// Click on timeline dots
timelineDots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
        setActiveTimeline(index);

        // Scroll to timeline item
        const timelineSection = document.getElementById('timeline');
        if (timelineSection) {
            const offset = timelineSection.offsetTop - 100;
            window.scrollTo({
                top: offset,
                behavior: 'smooth'
            });
        }
    });
});

// Auto-rotate timeline (optional)
let currentTimelineIndex = 2; // Start with index 2 (year 2008)
setActiveTimeline(currentTimelineIndex);

function autoRotateTimeline() {
    currentTimelineIndex = (currentTimelineIndex + 1) % timelineItems.length;
    setActiveTimeline(currentTimelineIndex);
}

// Auto-rotate every 5 seconds
let timelineInterval = setInterval(autoRotateTimeline, 5000);

// Pause auto-rotate when user interacts
timelineItems.forEach(item => {
    item.addEventListener('click', () => {
        clearInterval(timelineInterval);
        // Resume after 10 seconds
        setTimeout(() => {
            timelineInterval = setInterval(autoRotateTimeline, 5000);
        }, 10000);
    });
});

// ===== SCROLL ANIMATIONS =====
const observerOptions = {
    threshold: 0.1,
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

// Observe elements for scroll animations
const animatedElements = document.querySelectorAll('.product-card, .capability-card, .cert-card, .timeline-card');
animatedElements.forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(30px)';
    el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    observer.observe(el);
});

// ===== PRODUCT SCROLL INDICATOR =====
const productsScroll = document.querySelector('.products-scroll');

if (productsScroll) {
    // Add scroll indicator dots
    const productCards = document.querySelectorAll('.product-card');

    productsScroll.addEventListener('scroll', () => {
        // Optional: Add scroll position indicators
        const scrollPercentage = (productsScroll.scrollLeft / (productsScroll.scrollWidth - productsScroll.clientWidth)) * 100;
        // You can use this to update UI indicators if needed
    });
}

// ===== METRICS ANIMATION =====
const metricsSection = document.querySelector('.certifications');

const metricsObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            // Animate metric bars
            const metricBars = document.querySelectorAll('.metric-fill');
            metricBars.forEach(bar => {
                const width = bar.style.width;
                bar.style.width = '0';
                setTimeout(() => {
                    bar.style.width = width;
                }, 100);
            });
            metricsObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.5 });

if (metricsSection) {
    metricsObserver.observe(metricsSection);
}

// ===== NEWSLETTER FORM =====
const newsletterForm = document.querySelector('.newsletter-form');
if (newsletterForm) {
    newsletterForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const emailInput = newsletterForm.querySelector('input[type="email"]');
        if (emailInput && emailInput.value) {
            alert('Thank you for subscribing! We will keep you updated.');
            emailInput.value = '';
        }
    });
}

// ===== BUTTON CLICK EFFECTS =====
const allButtons = document.querySelectorAll('button');
allButtons.forEach(button => {
    button.addEventListener('click', function (e) {
        // Create ripple effect
        const ripple = document.createElement('span');
        const rect = this.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = e.clientX - rect.left - size / 2;
        const y = e.clientY - rect.top - size / 2;

        ripple.style.width = ripple.style.height = size + 'px';
        ripple.style.left = x + 'px';
        ripple.style.top = y + 'px';
        ripple.style.position = 'absolute';
        ripple.style.borderRadius = '50%';
        ripple.style.background = 'rgba(255, 255, 255, 0.5)';
        ripple.style.transform = 'scale(0)';
        ripple.style.animation = 'ripple 0.6s ease-out';
        ripple.style.pointerEvents = 'none';

        this.style.position = 'relative';
        this.style.overflow = 'hidden';
        this.appendChild(ripple);

        setTimeout(() => {
            ripple.remove();
        }, 600);
    });
});

// Add ripple animation to CSS via JavaScript
const style = document.createElement('style');
style.innerHTML = `
@keyframes ripple {
    to {
        transform: scale(4);
        opacity: 0;
    }
}
`;
document.head.appendChild(style);



// ===== CONSOLE MESSAGE =====
console.log('%c🏥 PT RISA IMPLANTAMA', 'font-size: 20px; font-weight: bold; color: #DB032D;');
console.log('%cPremium Orthopedic Implants Since 1993', 'font-size: 14px; color: #202356;');
console.log('%c✓ ISO 13485:2016 Certified', 'font-size: 12px; color: #666;');
console.log('%c✓ ISO 9001:2015 Certified', 'font-size: 12px; color: #666;');
console.log('%c✓ CPAKB Certified', 'font-size: 12px; color: #666;');
