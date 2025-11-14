<!-- Experience Section -->
<section id="experience" class="experience fade-in-section">
    <h2 class="section-title">Work Experience</h2>
    <div class="experience-container">
        <div class="timeline">
            @foreach ($experience as $exp)
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <div class="timeline-date">{{ $exp['years'] }}</div>
                        <h3>{{ $exp['role'] }}</h3>
                        <h4>{{ $exp['company'] }}</h4>
                        <p>{{ $exp['description'] }}</p>

                        @if (!empty($exp['tags']))
                            <div class="timeline-tags">
                                @foreach ($exp['tags'] as $tag)
                                    <span class="tag">{{ $tag }}</span>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
