<div class="empty-state">
    <i class="fas fa-{{ $icon ?? 'folder-open' }}"></i>
    <h3>{{ $title ?? 'Belum Ada Project' }}</h3>
    <p>{{ $description ?? 'Project akan ditampilkan di sini setelah Anda menambahkannya melalui admin panel.' }}</p>

    @if ($showAdminLink ?? false)
        <a href="{{ url('/administrator') }}" class="view-project-btn" style="margin-top: 1rem;">
            <i class="fas fa-plus"></i> Tambah Project
        </a>
    @endif
</div>
