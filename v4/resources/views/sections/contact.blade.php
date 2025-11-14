<!-- Contact Section -->
<section id="contact" class="contact fade-in-section">
    <h2 class="section-title">Get In Touch</h2>
    <div class="contact-container">
        <div class="contact-info">
            <p class="contact-lead">{{ $contact['lead'] ?? '' }}</p>
            <div class="contact-methods">
                @foreach ($contact['methods'] as $method)
                    <div class="contact-method">
                        <div class="method-icon">
                            <i class="{{ $method['icon'] }}"></i>
                        </div>
                        <div class="method-details">
                            <h4>{{ $method['type'] }}</h4>
                            @if(!empty($method['link']))
                                <a href="{{ $method['link'] }}">{{ $method['value'] }}</a>
                            @else
                                <p>{{ $method['value'] }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
