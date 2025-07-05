<x-app-layout>
    @section('title', 'Portfolio | Web Developer')
    @section('description', 'Portfolio Web Developer dengan pengalaman Laravel dan Filament')

    <!-- Header -->
    <header class="header" id="home">
        <div class="container">
            <!-- Profile Photo -->
            <div class="profile-photo" data-aos="fade-down" data-aos-delay="0.1s">
                <img src="{{ asset('images/profile/satrio-profile.jpg') }}" alt="Satrio Nugroho" class="profile-img">
            </div>

            <h1 data-aos="fade-up" data-aos-delay="0.2s">Satrio Nugroho</h1>
            <h2 data-aos="fade-up" data-aos-delay="0.3s">Web Developer</h2>
            <p data-aos="fade-up" data-aos-delay="0.4s">Lulusan D3 Teknik Informatika dengan pengalaman dalam
                mengembangkan aplikasi web menggunakan Laravel dan
                teknologi modern lainnya.</p>

            <!-- Social Links -->
            {{-- <div class="social-links" data-aos="fade-up" data-aos-delay="0.5s">
                <a href="https://github.com/satrionugroho" target="_blank" rel="noopener noreferrer"
                    class="social-link github" title="GitHub">
                    <i class="fab fa-github"></i>
                    <span class="social-text">GitHub</span>
                </a>
                <a href="https://linkedin.com/in/satrio-nugroho" target="_blank" rel="noopener noreferrer"
                    class="social-link linkedin" title="LinkedIn">
                    <i class="fab fa-linkedin"></i>
                    <span class="social-text">LinkedIn</span>
                </a>
                <a href="mailto:satrionugroho682@gmail.com" class="social-link email" title="Email">
                    <i class="fas fa-envelope"></i>
                    <span class="social-text">Email</span>
                </a>
                <a href="https://wa.me/6287862000412?text=Halo%20Satrio%2C%20saya%20tertarik%20dengan%20portfolio%20Anda"
                    target="_blank" rel="noopener noreferrer" class="social-link whatsapp" title="WhatsApp">
                    <i class="fab fa-whatsapp"></i>
                    <span class="social-text">WhatsApp</span>
                </a>
            </div> --}}
        </div>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <!-- About Section dengan Skills Dynamic -->
            <section class="about-section" id="about">
                <h2>Keahlian</h2>

                @if ($allSkills->count() > 0 && $skills->count() > 0)
                    {{-- Tabs Navigation --}}
                    <div class="tabs">
                        @foreach ($skills as $categoryKey => $categorySkills)
                            <button class="tab-button {{ $loop->first ? 'active' : '' }}"
                                data-tab="tab-{{ $categoryKey }}">
                                {{ App\Models\Skill::CATEGORIES[$categoryKey] ?? ucfirst($categoryKey) }}
                            </button>
                        @endforeach
                    </div>

                    {{-- Tabs Content --}}
                    <div class="tabs-content">
                        @foreach ($skills as $categoryKey => $categorySkills)
                            <div class="tab-content {{ $loop->first ? 'active' : '' }}" id="tab-{{ $categoryKey }}">
                                <div class="skills-grid">
                                    @foreach ($categorySkills as $index => $skill)
                                        <x-skill-card :icon="$skill->icon ?? 'code'" :logo="$skill->logo" :title="$skill->name"
                                            :description="$skill->description" :proficiency-level="$skill->proficiency_level" :proficiency-label="$skill->proficiency_label" :category="$skill->category"
                                            :delay="$index * 0.1 . 's'" />
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    {{-- Fallback jika tidak ada skill --}}
                    <div class="about-content">
                        <x-skill-card icon="laravel" title="Laravel" description="Framework PHP..." delay="0.1s" />
                        <x-skill-card icon="code" title="Filament" description="Admin panel Laravel..."
                            delay="0.2s" />
                    </div>

                    @if (auth()->check())
                        <div class="empty-skills-notice">
                            <p>Belum ada skills. <a href="{{ url('/admin/skills') }}" target="_blank">Tambahkan
                                    sekarang</a></p>
                        </div>
                    @endif
                @endif
            </section>

            <!-- Experience Section -->
            <section class="experience-section" id="experience">
                <h2 class="section-title">Pengalaman Kerja</h2>

                <div class="timeline">
                    <div class="timeline-item" data-aos="fade-up" data-aos-delay="0.1s">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <div class="timeline-header">
                                <h3>Junior Web Developer</h3>
                                <span class="company">CV.BLITARIS TEKNO</span>
                                <span class="period">2023 - 2025</span>
                            </div>
                            <div class="timeline-description">
                                <p>Mengembangkan dan memelihara berbagai sistem informasi dan website untuk instansi
                                    pemerintah dan perusahaan swasta. Fokus pada pengembangan portal layanan publik dan
                                    sistem informasi terintegrasi.</p>
                                <ul class="achievements">
                                    <li>Mengembangkan aplikasi web dengan Laravel dan Codeigniter</li>
                                    <li>Optimasi database dan query performance</li>
                                    <li>Integrasi API dan third-party services</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-item" data-aos="fade-up" data-aos-delay="0.3s">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <div class="timeline-header">
                                <h3>Internship - Web Developer</h3>
                                <span class="company">Akademi Komunitas Negeri Putra Sang Fajar</span>
                                <span class="period">2023 (6 bulan)</span>
                            </div>
                            <div class="timeline-description">
                                <p>Program magang sebagai web developer, mempelajari best practices dalam pengembangan
                                    web dan berpartisipasi dalam project nyata perusahaan.</p>
                                <ul class="achievements">
                                    <li>Belajar Framework Node.js dari dasar</li>
                                    <li>Membuat Aplikasi Sistem Absensi Karyawan Dengan GPS</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-item" data-aos="fade-up" data-aos-delay="0.2s">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <div class="timeline-header">
                                <h3>Freelance Web Developer</h3>
                                <span class="company">Freelancer</span>
                                <span class="period">2025 - sekarang</span>
                            </div>
                            <div class="timeline-description">
                                <p>Mengerjakan berbagai project web development untuk klien dari berbagai industri.
                                    Fokus pada pengembangan website company profile dan sistem informasi sederhana.</p>
                                <ul class="achievements">
                                    <li>Maintenance dan support aplikasi</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Education Section -->
            <section class="education-section" id="education">
                <h2 class="section-title">Pendidikan</h2>

                <div class="education-grid">
                    <div class="education-card" data-aos="fade-up" data-aos-delay="0.1s">
                        <div class="education-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="education-content">
                            <h3>D3 Teknik Informatika</h3>
                            <p class="institution">Politeknik Elektronika Negeri Surabaya</p>
                            <p class="period">2022 - 2023</p>
                            <p class="description">
                                Fokus pada pengembangan aplikasi web dan mobile. Mempelajari pemrograman, database, dan
                                sistem informasi dengan penekanan pada teknologi web modern.
                            </p>
                            <div class="education-achievements">
                                <span class="achievement-badge">IPK: 3.42</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Certifications Section -->
            <section class="certifications-section" id="certifications">
                <h2 class="section-title">Sertifikasi</h2>

                <div class="certifications-grid">
                    <div class="certification-card" data-aos="fade-up" data-aos-delay="0.1s">
                        <div class="cert-icon">
                            <i class="fab fa-laravel"></i>
                        </div>
                        <div class="cert-content">
                            <h3>Laravel Certified Developer</h3>
                            <p class="cert-issuer">Laravel.com</p>
                            <p class="cert-date">2023</p>
                        </div>
                    </div>

                    <div class="certification-card" data-aos="fade-up" data-aos-delay="0.2s">
                        <div class="cert-icon">
                            <i class="fab fa-php"></i>
                        </div>
                        <div class="cert-content">
                            <h3>PHP Web Development</h3>
                            <p class="cert-issuer">Udemy</p>
                            <p class="cert-date">2022</p>
                        </div>
                    </div>

                    <div class="certification-card" data-aos="fade-up" data-aos-delay="0.3s">
                        <div class="cert-icon">
                            <i class="fas fa-database"></i>
                        </div>
                        <div class="cert-content">
                            <h3>MySQL Database Administration</h3>
                            <p class="cert-issuer">Oracle</p>
                            <p class="cert-date">2022</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Projects Section -->
            <section class="projects-section" id="projects">
                <div class="container">
                    <h2 class="section-title">Project Portfolio</h2>

                    @if ($projects->count() > 0)
                        <!-- Swiper Container dengan posisi relatif untuk nav buttons -->
                        <div class="projects-swiper-wrapper" data-aos="fade-up">
                            <div class="swiper-container projects-swiper">
                                <div class="swiper-wrapper">
                                    @foreach ($projects as $index => $project)
                                        <div class="swiper-slide">
                                            <x-project-card :title="$project->title" :description="$project->description" :image="$project->image"
                                                :link="$project->link" :delay="($index + 1) * 0.1 . 's'" />
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Navigation buttons dalam container yang sama -->
                            <div class="swiper-navigation">
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>
                            </div>

                            <!-- Pagination -->
                            <div class="swiper-pagination"></div>
                        </div>
                    @else
                        <x-empty-state :show-admin-link="auth()->check()" />
                    @endif
                </div>
            </section>
        </div>
    </div>

    <!-- JavaScript for interactive features -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');

            tabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const target = button.getAttribute('data-tab');

                    tabButtons.forEach(btn => btn.classList.remove('active'));
                    button.classList.add('active');

                    tabContents.forEach(content => {
                        content.classList.remove('active');
                        if (content.id === target) {
                            content.classList.add('active');
                        }
                    });
                });
            });

            // Social links click tracking (optional)
            const socialLinks = document.querySelectorAll('.social-link');
            socialLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    // Optional: Add analytics tracking here
                    console.log('Social link clicked:', this.title || this.href);
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const projectsSwiper = new Swiper('.projects-swiper', {
                loop: true,
                spaceBetween: 30,
                slidesPerView: 1,
                centeredSlides: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev'
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    dynamicBullets: true
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                        spaceBetween: 20
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 25,
                        centeredSlides: false
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                        centeredSlides: false
                    }
                },
                effect: 'slide',
                speed: 600,
                grabCursor: true,
                watchOverflow: true
            });
        });

        // Counter Animation
        function animateCounters() {
            const counters = document.querySelectorAll('.stat-number');

            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-target'));
                const duration = 2000;
                const increment = target / (duration / 16);
                let current = 0;

                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        counter.textContent = target;
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.floor(current);
                    }
                }, 16);
            });
        }

        // Testimonial Slider
        let currentTestimonialIndex = 0;
        const testimonials = document.querySelectorAll('.testimonial-card');
        const dots = document.querySelectorAll('.dot');

        function showTestimonial(index) {
            testimonials.forEach((testimonial, i) => {
                testimonial.classList.toggle('active', i === index);
            });

            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === index);
            });
        }

        function changeTestimonial(direction) {
            currentTestimonialIndex += direction;

            if (currentTestimonialIndex >= testimonials.length) {
                currentTestimonialIndex = 0;
            } else if (currentTestimonialIndex < 0) {
                currentTestimonialIndex = testimonials.length - 1;
            }

            showTestimonial(currentTestimonialIndex);
        }

        function currentTestimonial(index) {
            currentTestimonialIndex = index - 1;
            showTestimonial(currentTestimonialIndex);
        }

        // Contact Form Handler
        const contactForm = document.getElementById('contactForm');
        if (contactForm) {
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();

                // Get form data
                const formData = new FormData(this);
                const data = Object.fromEntries(formData);

                // Simulate form submission
                alert('Terima kasih! Pesan Anda telah dikirim. Saya akan segera menghubungi Anda.');
                this.reset();
            });
        }

        // Initialize counters when stats section is visible
        const statsSection = document.querySelector('.stats-section');
        if (statsSection) {
            let countersAnimated = false;

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting && !countersAnimated) {
                        animateCounters();
                        countersAnimated = true;
                    }
                });
            });

            observer.observe(statsSection);
        }

        // Auto-rotate testimonials
        if (testimonials.length > 0) {
            setInterval(() => {
                changeTestimonial(1);
            }, 5000);
        }
    </script>
</x-app-layout>
