<!-- Hero Section -->
<section id="home" class="hero">
    <div class="hero-content">
        @if(!empty($hero['available']))
            <div class="hero-badge">
                <span class="badge-dot"></span>
                <span class="badge-text">{{ $hero['badge_text'] ?? '------' }}</span>
            </div>
        @endif

        <h1>Hi, I'm <span class="name-highlight">{{ $hero['highlighted_name'] ?? '------' }}</span></h1>

        <!-- Typing animation text -->
        <p class="hero-subtitle">
            <span id="typed-text"></span>
            <span class="typing-cursor">|</span>
        </p>

        <div class="cta-group">
            <a href="{{ $hero['primary_button_link'] ?? '#' }}" class="cta-button primary">
                <span>{{ $hero['primary_button_text'] ?? '------' }}</span>
                <i class="{{ $hero['primary_button_icon'] ?? 'fas fa-arrow-right' }}"></i>
            </a>

            <a href="{{ $hero['secondary_button_link']['link'] ?? '#' }}" class="cta-button secondary">
                <span>{{ $hero['secondary_button_text'] ?? '------' }}</span>
                <i class="{{ $hero['secondary_button_icon'] ?? 'fas fa-envelope' }}"></i>
            </a>
        </div>

        <div class="scroll-indicator">
            <span class="scroll-text">{{ $hero['scroll_text'] ?? '-------' }}</span>
            <div class="scroll-arrow">
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
    </div>
</section>
