<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT RISA IMPLANTAMA - Premium Orthopedic Implants</title>
    <link rel="stylesheet" href="styles.css?v={{ filemtime(public_path('styles.css')) }}">
    <link rel="icon" href="assets/images/web-logo.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body>

    <header id="header">
        <div class="top-bar">
            <div class="container">
                <div class="top-bar-content">
                    <div class="contact-info">
                        <a href="tel:+62123456789">📞+62 21 1234 56786</a>
                        <a href="mailto:info@risaimplantama.com">✉️ risa.implantama@gmail.com</a>
                    </div>
                    <div class="certification-badge">
                        <span class="pulse-dot"></span>
                        ISO 13485 CERTIFIED
                    </div>
                </div>
            </div>
        </div>

        <nav class="main-nav">
            <div class="container">
                <div class="nav-content">
                    <a href="#home" class="logo">
                        <div class="logo-icon">
                            <img src="assets/images/risa-logo.png" alt="risa-logo">
                        </div>
                    </a>

                    <div class="nav-right">
                        <div class="nav-links" id="navLinks">
                            <a href="#home">Home</a>
                            <a href="#products">Products</a>
                            <a href="#timeline">History</a>
                            <a href="#manufacturing">Manufacturing</a>
                            <a href="#certifications">Certifications</a>
                            <a href="#contact">Contact</a>
                        </div>

                        <div class="nav-cta-desktop">
                            <a href="" class="btn-primary" style="text-decoration:none;">Submit an offer →</a>
                        </div>
                    </div>

                    <button class="menu-toggle" id="menuToggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </nav>
    </header>

    <!-- Mobile CTA Wrapper (moved outside header for fixed positioning) -->
    <div class="nav-cta-wrapper" id="navCtaWrapper">
        <a href="" class="btn-primary"
            style="text-decoration:none; display: flex; align-items: center; justify-content: center;">
            Submit an offer <span style="font-size: 20px; margin-left: 10px;">→</span>
        </a>
        <button class="cta-close" id="ctaClose" aria-label="Close offer">&times;</button>
    </div>


    <section id="home" class="hero">
        <div class="hero-bg">
            <video src="assets/video/PT RISA IMPLANTAMA.MOV" autoplay loop muted playsinline
                class="hero-bg-video"></video>
            <!-- Overlay reduksi kontras agar teks terbaca -->
            <div class="hero-overlay"></div>

            <div class="gradient-orb orb-1"></div>
            <div class="gradient-orb orb-2"></div>
            <div class="grid-pattern"></div>
        </div>

        <div class="container">
            <div class="hero-content">
                <div class="hero-left">
                    <div class="hero-title-wrapper">
                        <div class="hero-bg-text">PT</div>
                        <h1 class="hero-title">
                            <span class="title-line-1">{{ $settings['hero_title_1'] ?? 'RISA' }}</span>
                            <span class="title-line-2">{{ $settings['hero_title_2'] ?? 'IMPLANTAMA' }}</span>
                        </h1>
                        <div class="title-divider">
                            <div class="divider-line"></div>
                            <span>SINCE 1993</span>
                        </div>
                    </div>

                    <p class="hero-description">
                        {{ $settings['hero_desc'] ?? 'Established in 1993 with the vision and mission of fulfilling and developing domestic orthopedic implants and developing the nation\'s own potential to be able to compete competitively with foreign implant products.' }}
                    </p>



                    <div class="hero-buttons">
                        <a href="#products" class="btn-primary btn-large" style="text-decoration:none">Explore Catalog
                            →</a>

                    </div>
                </div>
            </div>
        </div>

        <div class="scroll-indicator">
            <div class="scroll-mouse"></div>
        </div>
    </section>


    <section id="products" class="products">
        <div class="product-bg">
            <div class="section-bg">
                <div class="gradient-orb orb-3"></div>
            </div>

            <div class="container-wide">
                <div class="section-header">
                    <div class="section-badge">
                        <span>⚡</span>
                        OSFIX PRODUCT LINE
                    </div>
                    <h2 class="section-title">Innovative Catalog</h2>
                    <p class="section-description">
                        Explore our precision-engineered orthopedic implant systems designed for optimal surgical
                        outcomes.
                    </p>
                </div>

                <div class="products-scroll">
                    <div class="product-card">
                        <div class="product-image-wrapper">
                            <img src="assets/images/catalog/L Buttress.png" alt="OSFIX Locking Plate">
                            <div class="product-category">Fixation Systems</div>
                            <div class="product-brand">
                                <img src="assets/images/risa-logo.png" alt="risa-logo">
                            </div>
                        </div>
                        <div class="product-content">
                            <h3>Arthoscopy</h3>
                            <div class="product-material">
                                Ti-6Al-4V Titanium
                            </div>
                        </div>
                    </div>

                    <div class="product-card">
                        <div class="product-image-wrapper">
                            <img src="assets/images/catalog/L Buttress.png" alt="OSFIX Cortical Screw">
                            <div class="product-category">Fastening Solutions</div>
                            <div class="product-brand">
                                <img src="assets/images/risa-logo.png" alt="risa-logo">
                            </div>
                        </div>
                        <div class="product-content">
                            <h3>Arthoplasty(Elbow & Shoulder)</h3>
                            <div class="product-material">
                                Medical Grade Titanium
                            </div>
                        </div>
                    </div>

                    <div class="product-card">
                        <div class="product-image-wrapper">
                            <img src="assets/images/catalog/L Buttress.png" alt="OSFIX Trauma System">
                            <div class="product-category">Emergency Solutions</div>
                            <div class="product-brand">
                                <img src="assets/images/risa-logo.png" alt="risa-logo">
                            </div>
                        </div>
                        <div class="product-content">
                            <h3>Traumatology Implants</h3>
                            <div class="product-material">
                                Titanium Alloy
                            </div>
                        </div>
                    </div>

                    <div class="product-card">
                        <div class="product-image-wrapper">
                            <img src="assets/images/catalog/L Buttress.png" alt="OSFIX Compression Screw">
                            <div class="product-category">Advanced Fixation</div>
                            <div class="product-brand">
                                <img src="assets/images/risa-logo.png" alt="risa-logo">
                            </div>
                        </div>
                        <div class="product-content">
                            <h3>External Fixator</h3>
                            <div class="product-material">
                                Ti-6Al-4V Titanium
                            </div>
                        </div>
                    </div>
                    <div class="product-card">
                        <div class="product-image-wrapper">
                            <img src="assets/images/catalog/L Buttress.png" alt="OSFIX Compression Screw">
                            <div class="product-category">Advanced Fixation</div>
                            <div class="product-brand">
                                <img src="assets/images/risa-logo.png" alt="risa-logo">
                            </div>
                        </div>
                        <div class="product-content">
                            <h3>Instruments & Container</h3>
                            <div class="product-material">
                                Ti-6Al-4V Titanium
                            </div>
                        </div>
                    </div>


                    <div class="product-card cta-card">
                        <div class="cta-content">
                            <a class="cta-icon" href="catalog">→</a>
                            <h3>View Complete Catalog</h3>
                            <p>Download our comprehensive product specifications and technical documentation</p>
                            <button class="btn-primary">Download PDF</button>
                        </div>
                    </div>
                </div>

                <div class="swipe-indicator">
                    <div class="swipe-animation">
                        <span class="hand-icon">👆</span>
                        <span class="swipe-arrows">
                            <i>&rsaquo;</i><i>&rsaquo;</i><i>&rsaquo;</i>
                        </span>
                    </div>
                    <p> Scroll right and click the arrow button to view more catalogs</p>
                    <p>or click Download PDF button to download PDF</p>
                    <div class="supported-by">
                        <p class="supported-title">Supported by</p>
                        <div class="supported-logos">
                            <div class="support-logo-box"><img src="assets/images/osfix.jpeg" alt="Support Logo 1">
                            </div>
                            <div class="support-logo-box"><img src="assets/images/osteno.jpeg" alt="Support Logo 2">
                            </div>
                            <div class="support-logo-box"><img src="assets/images/rodic.jpeg" alt="Support Logo 3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="timeline" class="timeline">
        <div class="section-bg">
            <div class="gradient-orb orb-4"></div>
            <div class="gradient-orb orb-5"></div>
        </div>

        <div class="container">
            <div class="section-header">
                <div class="section-badge">
                    <span>🧪</span>
                    QUALITY ASSURANCE PROCESS
                </div>
                <h2 class="section-title">Quality Production<br>Responsibility</h2>
            </div>

            <div class="timeline-container">
                @forelse($timeline as $event)
                <div class="timeline-item" data-year="{{ $event->year }}">
                    <div class="timeline-card">
                        <img src="{{ $event->image_path ? asset('storage/' . $event->image_path) : asset('assets/images/timeline-hispatology.png') }}" class="timeline-img">
                        <div class="timeline-status">
                            <span class="status-dot"></span>
                            QUALITY STAGE
                        </div>
                        <div class="timeline-card-overlay">
                            <div class="timeline-year">
                                <span>{{ $event->year }}</span>
                            </div>
                            <h3>{{ $event->title }}</h3>
                            <p>{{ $event->description }}</p>
                        </div>
                    </div>
                </div>
                @empty
                <div class="timeline-item" data-year="1993">
                    <div class="timeline-card">
                        <img src="{{ asset('assets/images/timeline-hispatology.png') }}" class="timeline-img">
                        <div class="timeline-status">
                            <span class="status-dot"></span>
                            QUALITY STAGE
                        </div>
                        <div class="timeline-card-overlay">
                            <div class="timeline-year">
                                <span>1993</span>
                            </div>
                            <h3>Histopathology Test</h3>
                            <p>Microscopic tissue analysis confirming zero inflammatory response &amp; safe bone integration.</p>
                        </div>
                    </div>
                </div>
                
                @endforelse
            </div>

            <div class="timeline-dots">
                <button class="dot active" data-index="0"></button>
                <button class="dot" data-index="1"></button>
                <button class="dot" data-index="2"></button>
                <button class="dot" data-index="3"></button>
                <button class="dot" data-index="4"></button>
                <button class="dot" data-index="5"></button>
            </div>
        </div>
    </section>


    <section id="manufacturing" class="manufacturing">
        <div class="manufacturing-bg">
            <img src="assets/images/manufacturing-bg.jpg" alt="CNC Manufacturing" class="parallax-bg">
            <div class="manufacturing-overlay"></div>
            <div class="blueprint-grid"></div>
        </div>

        <div class="container">
            <div class="section-header">
                <div class="section-badge section-badge-light">
                    <span>�</span>
                    FACILITIES & COMMITMENT
                </div>
                <h2 class="section-title section-title-light">
                    Our Facilities &<br>Medical Commitment
                </h2>
                <p class="section-description section-description-light">
                    From precision CNC machines to hands-on surgical workshops — built to support
                    orthopedic specialists &amp; subspecialists across Indonesia.
                </p>
            </div>

            <div class="manufacturing-grid">
                <div class="capability-card">
                    <div class="capability-icon">🔧</div>
                    <div class="capability-value">CNC Machines</div>
                    <h4>Production Facility</h4>
                    <p>Multi-axis precision machining for Ti-6Al-4V implants</p>
                </div>

                <div class="capability-card">
                    <div class="capability-icon">🎓</div>
                    <div class="capability-value">Workshops</div>
                    <h4>Surgical Training</h4>
                    <p>Hands-on cadaveric & dry-bone workshops for surgeons</p>
                </div>

                <div class="capability-card">
                    <div class="capability-icon">🩺</div>
                    <div class="capability-value">Specialists</div>
                    <h4>Medical Support</h4>
                    <p>Supporting ortho specialists & subspecialists nationwide</p>
                </div>

                <div class="capability-card">
                    <div class="capability-icon">✅</div>
                    <div class="capability-value">ISO Certified</div>
                    <h4>Quality Assurance</h4>
                    <p>100% inspection ensuring medical-grade compliance</p>
                </div>
            </div>


                        <div class="mfg-gallery">
                <div class="mfg-gallery-header">
                    <div class="section-badge section-badge-light" style="margin:0">
                        <span>🏥</span>
                        INSIDE RISA IMPLANTAMA
                    </div>
                    <div class="mfg-counter"><span class="mfg-current">01</span> / <span class="mfg-total">06</span></div>
                </div>

                <div class="mfg-gallery-body">
                    
                    <div class="mfg-main">
                        <div class="mfg-slides">
                            @forelse($facilities as $index => $facility)
                            <div class="mfg-slide {{ $index === 0 ? 'active' : '' }}" data-index="{{ $index }}">
                                <img src="{{ $facility->image_path ? asset('storage/' . $facility->image_path) : asset('assets/images/facility-cnc.png') }}" alt="{{ $facility->name }}">
                                <div class="mfg-slide-info">
                                    <h4>{{ $facility->name }}</h4>
                                    <p>{{ $facility->description }}</p>
                                </div>
                            </div>
                            @empty
                            <div class="mfg-slide active" data-index="0">
                                <img src="assets/images/facility-cnc.png" alt="Default Facility">
                                <div class="mfg-slide-info">
                                    <h4>No Facilities Added</h4>
                                    <p>Please add a facility in the Admin Dashboard.</p>
                                </div>
                            </div>
                            @endforelse
                        </div>
                        <button class="mfg-nav mfg-prev" aria-label="Previous">&#8249;</button>
                        <button class="mfg-nav mfg-next" aria-label="Next">&#8250;</button>
                    </div>

                    
                    <div class="mfg-thumbs">
                        @forelse($facilities as $index => $facility)
                        <div class="mfg-thumb {{ $index === 0 ? 'active' : '' }}" data-index="{{ $index }}">
                            <img src="{{ $facility->image_path ? asset('storage/' . $facility->image_path) : asset('assets/images/facility-cnc.png') }}" alt="{{ $facility->name }}">
                            <span>{{ $facility->name }}</span>
                        </div>
                        @empty
                        <div class="mfg-thumb active" data-index="0">
                            <img src="assets/images/facility-cnc.png" alt="Default Facility">
                            <span>No Setup</span>
                        </div>
                        @endforelse
                    </div>
                </div>


                <div class="mfg-dots">
                    <button class="mfg-dot active" data-index="0"></button>
                    <button class="mfg-dot" data-index="1"></button>
                    <button class="mfg-dot" data-index="2"></button>
                    <button class="mfg-dot" data-index="3"></button>
                    <button class="mfg-dot" data-index="4"></button>
                    <button class="mfg-dot" data-index="5"></button>
                </div>
            </div>
        </div>
    </section>


    <section id="certifications" class="certifications">
        <div class="certifications-bg">
            <div class="gradient-orb orb-6"></div>
            <div class="gradient-orb orb-7"></div>
            <div class="grid-pattern"></div>
        </div>

        <div class="container">
            <div class="section-header">
                <div class="section-badge section-badge-light">
                    <span>🔒</span>
                    CREDIBILITY & CERTIFICATIONS
                </div>
                <h2 class="section-title section-title-light">Trust Dashboard</h2>
                <p class="section-description section-description-light">
                    Certified excellence backed by international standards and rigorous compliance
                </p>
            </div>

            <div class="certifications-grid">


                <div class="cert-main event-gallery-wrapper">
                    <div class="event-gallery-header">
                        <h3>📸 Company Events</h3>
                        <p>Momen berharga perjalanan PT RISA IMPLANTAMA</p>
                    </div>

                    <div class="event-main-display">
                        <div class="event-slides" id="eventSlides">
                            @forelse($companyEvents as $index => $event)
                            <div class="event-slide {{ $index === 0 ? 'active' : '' }}" data-index="{{ $index }}">
                                <img src="{{ $event->image_path ? asset('storage/' . $event->image_path) : asset('assets/images/kantor-risa.png') }}" alt="{{ $event->title }}"
                                    style="width: 100%; height: 100%; object-fit: cover;">
                                <div class="event-caption"
                                    style="position: absolute; bottom: 0; left: 0; right: 0; padding: 20px; background: linear-gradient(to top, rgba(0,0,0,0.8), transparent); color: white;">
                                    <h4 style="margin: 0 0 8px 0; font-size: 18px;">{{ $event->title }}</h4>
                                    <p style="margin: 0; font-size: 14px; opacity: 0.9;">{{ $event->description }}</p>
                                </div>
                            </div>
                            @empty
                            <div class="event-slide active" data-index="0">
                                <img src="assets/images/kantor-risa.png" alt="No Event"
                                    style="width: 100%; height: 100%; object-fit: cover;">
                                <div class="event-caption"
                                    style="position: absolute; bottom: 0; left: 0; right: 0; padding: 20px; background: linear-gradient(to top, rgba(0,0,0,0.8), transparent); color: white;">
                                    <h4 style="margin: 0 0 8px 0; font-size: 18px;">Belum Ada Event</h4>
                                    <p style="margin: 0; font-size: 14px; opacity: 0.9;">Silakan tambah Company Event di CMS Admin.</p>
                                </div>
                            </div>
                            @endforelse
                        </div>
                        <button class="event-nav event-prev" id="eventPrev" aria-label="Previous">&#8249;</button>
                        <button class="event-nav event-next" id="eventNext" aria-label="Next">&#8250;</button>
                        <div class="event-counter"><span id="eventCurrent">1</span> / <span id="eventTotal">3</span>
                        </div>
                    </div>

                    <div class="event-thumbstrip" id="eventThumbs">
                        @forelse($companyEvents as $index => $event)
                        <div class="event-thumb {{ $index === 0 ? 'active' : '' }}" data-index="{{ $index }}"
                            style="background-image: url('{{ $event->image_path ? asset('storage/' . $event->image_path) : asset('assets/images/kantor-risa.png') }}'); background-size: cover; background-position: center;">
                        </div>
                        @empty
                        <div class="event-thumb active" data-index="0"
                            style="background-image: url('assets/images/kantor-risa.png'); background-size: cover; background-position: center;">
                        </div>
                        @endforelse
                    </div>
                </div>


                <div class="cert-sidebar">
                    <h3 class="cert-sidebar-title">International Certifications</h3>
                    <div class="cert-cards-compact">
                        <div class="cert-card-compact">
                            <div class="cert-icon-sm">🛡️</div>
                            <div class="cert-info">
                                <h4>ISO 13485:2016</h4>
                                <p>Medical Devices QMS</p>
                                <div class="cert-status">
                                    <span class="status-dot"></span>
                                    <span>Active</span>
                                    <span class="cert-valid">Valid until 2027</span>
                                </div>
                            </div>
                        </div>

                        <div class="cert-card-compact">
                            <div class="cert-icon-sm">🏆</div>
                            <div class="cert-info">
                                <h4>ISO 9001:2015</h4>
                                <p>Quality Management</p>
                                <div class="cert-status">
                                    <span class="status-dot"></span>
                                    <span>Active</span>
                                    <span class="cert-valid">Valid until 2027</span>
                                </div>
                            </div>
                        </div>

                        <div class="cert-card-compact">
                            <div class="cert-icon-sm">📋</div>
                            <div class="cert-info">
                                <h4>CPAKB</h4>
                                <p>Indonesian Medical Device</p>
                                <div class="cert-status">
                                    <span class="status-dot"></span>
                                    <span>Active</span>
                                    <span class="cert-valid">Valid until 2028</span>
                                </div>
                            </div>
                        </div>

                        <div class="cert-card-compact">
                            <div class="cert-icon-sm">✓</div>
                            <div class="cert-info">
                                <h4>ISO 45001:2018</h4>
                                <p>European Conformity</p>
                                <div class="cert-status">
                                    <span class="status-dot"></span>
                                    <span>Active</span>
                                    <span class="cert-valid">Valid until 2027</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer id="contact" class="footer">
        <div class="footer-bg">
            <div class="gradient-orb orb-8"></div>
            <div class="grid-pattern"></div>
        </div>

        <div class="container">
            <div class="footer-main">
                <div class="footer-company">
                    <div class="footer-company-card">
                        <div class="footer-company-content">
                            <div class="footer-logo">
                                <div class="logo-text">
                                    <div class="company-name">PT. RISA IMPLANTAMA</div>
                                    <div class="tagline">SINCE 1993</div>
                                </div>
                            </div>
                            <p>Leading provider of precision orthopedic medical implants with over 30 years of
                                excellence in the medical device industry.</p>
                        </div>
                    </div>

                    <div class="newsletter">
                        <h4>Stay Updated</h4>
                        <div class="newsletter-form">
                            <input type="email" placeholder="Enter your email">
                            <button>→</button>
                        </div>
                    </div>
                </div>

                <div class="footer-links">



                    <div class="footer-column">
                        <h4>Products</h4>
                        <a href="#">OSFIX Plates</a>
                        <a href="#">OSFIX Screws</a>
                        <a href="#">Trauma Systems</a>
                        <a href="#">Surgical Tools</a>
                        <a href="#">Full Catalog</a>
                    </div>

                    <div class="footer-column">
                        <h4>Company</h4>
                        <a href="#">About Us</a>
                        <a href="#">Manufacturing</a>
                        <a href="#">Quality Assurance</a>
                        <a href="#">Careers</a>
                        <a href="#">News</a>
                    </div>


                </div>

                <div class="footer-contact">
                    <h4>Contact Us</h4>
                    <div class="contact-card">
                        <div class="contact-icon">📞</div>
                        <div>
                            <div class="contact-label">Phone</div>
                            <div class="contact-value">+62 21 1234 5678</div>
                        </div>
                    </div>
                    <div class="contact-card">
                        <div class="contact-icon">✉️</div>
                        <div>
                            <div class="contact-label">Email</div>
                            <div class="contact-value">risa.implantama@gmail.com</div>
                        </div>
                    </div>
                    <div class="contact-card">
                        <div class="contact-icon">📍</div>
                        <div>
                            <div class="contact-label">Location</div>
                            <div class="contact-value">Surabaya, Indonesia</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="footer-copyright">
                    <p><a href="{{ route('login') }}" title="Admin Login" style="color: inherit; text-decoration: none; outline: none;">&copy;</a> 2026 PT RISA IMPLANTAMA. All rights reserved.</p>
                    <div class="footer-certifications">
                        <span>• ISO 13485:2016</span>
                        <span>• ISO 9001:2015</span>
                        <span>• CPAKB Certified</span>
                    </div>
                </div>
                <div class="footer-social">
                    <span>Follow Us</span>
                    <a href="#" class="social-icon">in</a>
                    <a href="#" class="social-icon">f</a>
                    <a href="#" class="social-icon">ig</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="script.js?v={{ filemtime(public_path('script.js')) }}"></script>
</body>

</html>