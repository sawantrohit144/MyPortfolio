<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $meta_description ?? 'Professional portfolio showcasing web development and design skills' }}">
    <meta name="keywords" content="{{ $meta_keywords ?? 'portfolio, web developer, designer, frontend, backend' }}">
    <meta name="author" content="{{ $author ?? 'Portfolio Owner' }}">
    <title>{{ $page_title ?? 'My Portfolio' }}</title>

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
            <div class="logo">{{ strtoupper(substr($author ?? 'P', 0, 1)) }}</div>
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
        <div class="version-indicator" aria-label="Portfolio version">
            <span class="version-text">{{ $version ?? 'v1.0' }}</span>
        </div>

        <!-- Brand Circle -->
        <div class="brand-circle" role="presentation" aria-hidden="true">
            {{ strtoupper(substr($author ?? 'P', 0, 1)) }}
        </div>

        <!-- Sidebar Navigation -->
        <nav class="sidebar" role="navigation" aria-label="Main navigation">
            <div class="sidebar-header">
                <div class="sidebar-logo">{{ $site_name ?? 'MyPortfolio' }}</div>
                <label for="sidebar-toggle" class="close-btn" aria-label="Close navigation menu">
                    <span></span><span></span><span></span>
                </label>
            </div>

            <div class="sidebar-nav">
                <ul>
                    @foreach($navItems ?? [
                        ['id' => 'home', 'icon' => '🏠', 'text' => 'Home'],
                        ['id' => 'about', 'icon' => '👤', 'text' => 'About'],
                        ['id' => 'skills', 'icon' => '⚡', 'text' => 'Skills'],
                        ['id' => 'experience', 'icon' => '💼', 'text' => 'Experience'],
                        ['id' => 'contact', 'icon' => '📧', 'text' => 'Contact'],
                    ] as $item)
                        <li>
                            <a href="#{{ $item['id'] }}" class="nav-link" data-section="{{ $item['id'] }}">
                                <span class="nav-icon">{{ $item['icon'] }}</span>
                                <span class="nav-text">{{ $item['text'] }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="sidebar-footer">
                <div class="quick-stats">
                    <div class="stat-item">
                        <span class="stat-number" data-target="{{ $experience_years ?? 2 }}">0</span>
                        <span class="stat-label">Years Exp</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number" data-target="{{ $projects ?? 10 }}">0</span>
                        <span class="stat-label">Projects</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number" data-target="{{ $clients ?? 5 }}">0</span>
                        <span class="stat-label">Happy Clients</span>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content Area -->
        <main class="main-area">
            @include('sections.hero', ['hero' => $hero ?? []])
            @include('sections.about', ['about' => $about ?? []])
            @include('sections.skills', ['skills' => $skills ?? []])
            @include('sections.experience', ['experience' => $experience ?? []])
            @include('sections.contact', ['contact' => $contact ?? []])
            @include('sections.footer')
        </main>
    </div>

    <!-- JS -->
    <script src="{{ asset('js/script.js') }}" defer></script>
</body>
</html>
