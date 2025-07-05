<div class="project-card loading" style="animation-delay: {{ $delay ?? '0.1s' }};">
    <div class="project-image">
        @if ($image)
            <img src="{{ asset('storage/' . $image) }}" alt="{{ $title }}" loading="lazy">
        @else
            <div class="project-placeholder">
                <i class="fas fa-image"></i>
            </div>
        @endif

        @if ($link)
            <div class="project-overlay">
                <div class="overlay-content">
                    <h3>{{ $title }}</h3>
                    <a href="{{ $link }}" target="_blank" rel="noopener noreferrer" class="view-project-btn">
                        <i class="fas fa-external-link-alt"></i> View Live
                    </a>
                </div>
            </div>
        @endif
    </div>
    <div class="project-content">
        <h3 class="project-title">{{ $title }}</h3>
        <p class="project-description">
            {{ $description ?? 'Deskripsi project akan ditampilkan di sini.' }}
        </p>
        @if ($link)
            <a href="{{ $link }}" target="_blank" rel="noopener noreferrer" class="project-link">
                <i class="fas fa-link"></i> Lihat Project
            </a>
        @else
            <span class="project-link" style="color: #999; cursor: default;">
                <i class="fas fa-info-circle"></i> Link tidak tersedia
            </span>
        @endif
    </div>
</div>
