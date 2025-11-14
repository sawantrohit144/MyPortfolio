@if(!empty($skills))
<section id="skills" class="skills fade-in-section">
    <h2 class="section-title">My Skills & Expertise</h2>
    <div class="skills-container">

        @foreach($skills as $skill)
        <div class="skill-card">
            <div class="skill-header">
                <div class="skill-icon-large">
                    <i class="{{ $skill['icon'] }}"></i>
                </div>
                <h3>{{ $skill['title'] }}</h3>
            </div>

            <p>{{ $skill['description'] }}</p>

            <div class="skill-details">
                <div class="skill-category">{{ $skill['category'] }}</div>

                @if(!empty($skill['items']))
                <div class="skill-icons">
                    @foreach($skill['items'] as $item)
                        <div class="skill-icon" title="{{ $item['name'] }}">
                            <i class="{{ $item['icon'] }}"></i>
                            <span>{{ $item['name'] }}</span>
                        </div>
                    @endforeach
                </div>
                @endif
            </div>

            <div class="skill-bar-container">
                <div class="skill-bar-label">
                    <span>Proficiency</span>
                    <span class="skill-percentage">{{ $skill['proficiency'] }}%</span>
                </div>
                <div class="skill-bar">
                    <div class="skill-progress" data-progress="{{ $skill['proficiency'] }}"></div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</section>
@endif
