const header = document.getElementById('header');

window.addEventListener('scroll', () => {
    if (window.scrollY > 20) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
});

const menuToggle = document.getElementById('menuToggle');
const navLinks = document.getElementById('navLinks');

menuToggle.addEventListener('click', () => {
    navLinks.classList.toggle('active');
});

const ctaClose = document.getElementById('ctaClose');
const navCtaWrapper = document.getElementById('navCtaWrapper');

if (ctaClose && navCtaWrapper) {
    ctaClose.addEventListener('click', () => {
        navCtaWrapper.classList.add('hide-cta');
    });
}

const navLinksItems = navLinks.querySelectorAll('a');
navLinksItems.forEach(link => {
    link.addEventListener('click', () => {
        navLinks.classList.remove('active');
    });
});

document.addEventListener('click', (e) => {
    if (!navLinks.contains(e.target) && !menuToggle.contains(e.target)) {
        navLinks.classList.remove('active');
    }
});

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

const manufacturingSection = document.querySelector('.manufacturing');
const parallaxBg = document.querySelector('.parallax-bg');

window.addEventListener('scroll', () => {
    if (manufacturingSection && parallaxBg) {
        const rect = manufacturingSection.getBoundingClientRect();
        const scrollY = window.scrollY;

        if (rect.top < window.innerHeight && rect.bottom > 0) {
            const offset = scrollY * 0.3;
            parallaxBg.style.transform = `translateY(${offset}px)`;
        }
    }
});

const timelineItems = document.querySelectorAll('.timeline-item');
const timelineDots = document.querySelectorAll('.timeline-dots .dot');

function setActiveTimeline(index) {
    timelineItems.forEach(item => item.classList.remove('active'));
    timelineDots.forEach(dot => dot.classList.remove('active'));

    if (index !== null) {
        if (timelineItems[index]) timelineItems[index].classList.add('active');
        if (timelineDots[index]) timelineDots[index].classList.add('active');
    }
}

timelineItems.forEach((item, index) => {
    item.addEventListener('mouseenter', () => {
        setActiveTimeline(index);
    });
});

const timelineSection = document.querySelector('.timeline');
if (timelineSection) {
    timelineSection.addEventListener('mouseleave', () => {
        setActiveTimeline(null);
    });
}

timelineDots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
        setActiveTimeline(index);
    });
});

const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -100px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';

            if (!entry.target.classList.contains('timeline-card')) {
                entry.target.style.transform = 'translateY(0)';
            }
        }
    });
}, observerOptions);

const animatedElements = document.querySelectorAll('.product-card, .capability-card, .cert-card');
animatedElements.forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(30px)';
    el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    observer.observe(el);
});

const timelineCards = document.querySelectorAll('.timeline-card');
timelineCards.forEach(el => {
    el.style.opacity = '0';
    el.style.transition = 'opacity 0.6s ease';
    observer.observe(el);
});

const productsScroll = document.querySelector('.products-scroll');

if (productsScroll) {

    const productCards = document.querySelectorAll('.product-card');

    productsScroll.addEventListener('scroll', () => {

        const scrollPercentage = (productsScroll.scrollLeft / (productsScroll.scrollWidth - productsScroll.clientWidth)) * 100;

    });
}

const metricsSection = document.querySelector('.certifications');

const metricsObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {

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

const allButtons = document.querySelectorAll('button');
allButtons.forEach(button => {
    button.addEventListener('click', function (e) {

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

        const computedPos = window.getComputedStyle(this).position;
        if (computedPos === 'static') {
            this.style.position = 'relative';
        }
        this.style.overflow = 'hidden';
        this.appendChild(ripple);

        setTimeout(() => {
            ripple.remove();
        }, 600);
    });
});

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

console.log('%c🏥 PT RISA IMPLANTAMA', 'font-size: 20px; font-weight: bold; color: #DB032D;');
console.log('%cPremium Orthopedic Implants Since 1993', 'font-size: 14px; color: #202356;');
console.log('%c✓ ISO 13485:2016 Certified', 'font-size: 12px; color: #666;');
console.log('%c✓ ISO 9001:2015 Certified', 'font-size: 12px; color: #666;');
console.log('%c✓ CPAKB Certified', 'font-size: 12px; color: #666;');

(function () {
    const slides = document.querySelectorAll('.mfg-slide');
    const thumbs = document.querySelectorAll('.mfg-thumb');
    const dots = document.querySelectorAll('.mfg-dot');
    const prevBtn = document.querySelector('.mfg-prev');
    const nextBtn = document.querySelector('.mfg-next');
    const currentEl = document.querySelector('.mfg-current');
    const total = slides.length;

    if (!slides.length) return;

    let current = 0;

    function setSlide(index, isInit = false) {
        if (index < 0) index = total - 1;
        if (index >= total) index = 0;
        current = index;

        slides.forEach(s => s.classList.remove('active'));
        slides[current].classList.add('active');

        thumbs.forEach(t => t.classList.remove('active'));
        if (thumbs[current]) thumbs[current].classList.add('active');

        dots.forEach(d => d.classList.remove('active'));
        if (dots[current]) dots[current].classList.add('active');

        if (currentEl) currentEl.textContent = String(current + 1).padStart(2, '0');

        if (!isInit && thumbs[current]) {
            thumbs[current].scrollIntoView({ block: 'nearest', behavior: 'smooth' });
        }
    }

    prevBtn && prevBtn.addEventListener('click', () => setSlide(current - 1));
    nextBtn && nextBtn.addEventListener('click', () => setSlide(current + 1));

    thumbs.forEach(thumb => {
        thumb.addEventListener('click', () => setSlide(parseInt(thumb.dataset.index)));
    });

    dots.forEach(dot => {
        dot.addEventListener('click', () => setSlide(parseInt(dot.dataset.index)));
    });

    document.addEventListener('keydown', (e) => {
        const gallery = document.querySelector('.mfg-gallery');
        if (!gallery) return;
        const rect = gallery.getBoundingClientRect();
        if (rect.top < window.innerHeight && rect.bottom > 0) {
            if (e.key === 'ArrowRight') setSlide(current + 1);
            if (e.key === 'ArrowLeft') setSlide(current - 1);
        }
    });

    setSlide(0, true);
})();

// === COMPANY EVENTS SLIDER ===
(function () {
    const slides = document.querySelectorAll('.event-slide');
    const thumbs = document.querySelectorAll('.event-thumb');
    const prevBtn = document.getElementById('eventPrev');
    const nextBtn = document.getElementById('eventNext');
    const currentEl = document.getElementById('eventCurrent');
    const totalEl = document.getElementById('eventTotal');
    const total = slides.length;

    if (!total) return;

    // Update proper number of slides loaded just in case DOM overrides it
    if (totalEl) totalEl.textContent = total;

    let current = 0;

    function setSlide(index, isInit = false) {
        if (index < 0) index = total - 1;
        if (index >= total) index = 0;
        current = index;

        // Change Main Image
        slides.forEach(s => s.classList.remove('active'));
        slides[current].classList.add('active');

        // Change Thumbnails state
        thumbs.forEach(t => t.classList.remove('active'));
        if (thumbs[current]) thumbs[current].classList.add('active');

        // Update Text Counter (1 / 3)
        if (currentEl) currentEl.textContent = current + 1;

        // Auto-scroll thumbnail container if it exists
        if (!isInit && thumbs[current]) {
            thumbs[current].scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
        }
    }

    // Attach Click Events to Arrows
    prevBtn && prevBtn.addEventListener('click', () => setSlide(current - 1));
    nextBtn && nextBtn.addEventListener('click', () => setSlide(current + 1));

    // Attach Click Events to Thumbnails
    thumbs.forEach(thumb => {
        thumb.addEventListener('click', () => setSlide(parseInt(thumb.dataset.index)));
    });

    // Optional Keyboard Navigation (Arrow Keys) when user is viewing the section
    document.addEventListener('keydown', (e) => {
        const gallery = document.querySelector('.event-main-display');
        if (!gallery) return;

        // Only trigger arrow keys if section is in viewport
        const rect = gallery.getBoundingClientRect();
        if (rect.top < window.innerHeight && rect.bottom > 0) {
            if (e.key === 'ArrowRight') setSlide(current + 1);
            if (e.key === 'ArrowLeft') setSlide(current - 1);
        }
    });

    // Initialize the slides to start properly at index 0
    setSlide(0, true);
})();

// === IMAGE PROTECTION ===
document.querySelectorAll('img').forEach(img => {
    // Disable right-click context menu
    img.addEventListener('contextmenu', e => e.preventDefault());
    // Disable drag
    img.addEventListener('dragstart', e => e.preventDefault());
});

