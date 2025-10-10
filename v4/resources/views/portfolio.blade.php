<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Professional portfolio showcasing web development, design, and programming skills">
    <meta name="keywords" content="portfolio, web developer, designer, frontend, backend, Rohit Sawant">
    <meta name="author" content="Rohit Sawant">
    <title>Rohit Sawant - Creative Developer & Designer</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
</head>

<body>
    <!-- Scroll Progress Bar -->
    <div class="scroll-progress-bar"></div>

    <!-- Splash Screen -->
    <div class="splash-screen" role="presentation" aria-hidden="true">
        <div class="logo-container">
            <div class="logo">R</div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Hidden Checkbox for Toggle -->
        <input type="checkbox" id="sidebar-toggle" aria-hidden="true">

        <!-- Hamburger Button -->
        <label for="sidebar-toggle" class="hamburger-btn" aria-label="Toggle navigation menu">
            <span></span><span></span><span></span>
        </label>

        <!-- Version Indicator -->
        <div class="version-indicator" aria-label="Portfolio version 2.0">
            <span class="version-text">Portfolio v2.0</span>
        </div>

        <!-- Brand Circle -->
        <div class="brand-circle" role="presentation" aria-hidden="true">R</div>

        <!-- Sidebar Navigation -->
        <nav class="sidebar" role="navigation" aria-label="Main navigation">
            <div class="sidebar-header">
                <div class="sidebar-logo">MyPortfolio</div>
                <label for="sidebar-toggle" class="close-btn" aria-label="Close navigation menu">
                    <span></span><span></span><span></span>
                </label>
            </div>

            <div class="sidebar-nav">
                <ul>
                    <li><a href="#home" class="nav-link" data-section="home"><span class="nav-icon">🏠</span><span class="nav-text">Home</span></a></li>
                    <li><a href="#about" class="nav-link" data-section="about"><span class="nav-icon">👤</span><span class="nav-text">About</span></a></li>
                    <li><a href="#skills" class="nav-link" data-section="skills"><span class="nav-icon">⚡</span><span class="nav-text">Skills</span></a></li>
                    <li><a href="#experience" class="nav-link" data-section="experience"><span class="nav-icon">💼</span><span class="nav-text">Experience</span></a></li>
                    <li><a href="#contact" class="nav-link" data-section="contact"><span class="nav-icon">📧</span><span class="nav-text">Contact</span></a></li>
                </ul>
            </div>

            <div class="sidebar-footer">
                <div class="quick-stats">
                    <div class="stat-item"><span class="stat-number" data-target="2">0</span><span class="stat-label">Years Exp</span></div>
                    <div class="stat-item"><span class="stat-number" data-target="10">0</span><span class="stat-label">Projects</span></div>
                    <div class="stat-item"><span class="stat-number" data-target="5">0</span><span class="stat-label">Happy Clients</span></div>
                </div>
            </div>
        </nav>

        <!-- Main Content Area -->
        <main class="main-area">
            @include('sections.hero')
            @include('sections.about')
            @include('sections.skills')
            @include('sections.experience')
            @include('sections.contact')
            @include('sections.footer')
        </main>
    </div>

    <!-- JS -->
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
