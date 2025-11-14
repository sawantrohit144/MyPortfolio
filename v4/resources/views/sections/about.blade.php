@if(!empty($about))
<section id="about" class="about fade-in-section">
    <h2 class="section-title">{{ $about['title'] ?? 'About Me' }}</h2>
    <div class="about-container">
        <div class="about-content">
            <div class="about-text">
                <p class="lead-text">{{ $about['lead_text'] ?? '' }}</p>
                <p>{{ $about['description'] ?? '' }}</p>

                @if(!empty($about['highlights']) && is_array($about['highlights']))
                <div class="about-highlights">
                    @foreach($about['highlights'] as $item)
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <span>{{ $item }}</span>
                        </div>
                    @endforeach
                </div>
                @endif
            </div>

            <div class="about-image">
                <div class="image-placeholder">
                    <img src="{{ isset($about['image']) ? asset($about['image']) : asset('assets/profile.png') }}" 
                         alt="About Image" class="profile-image">
                </div>
            </div>
        </div>
    </div>
</section>
@endif
