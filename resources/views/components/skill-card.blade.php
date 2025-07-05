{{-- resources/views/components/skill-card.blade.php --}}
@props([
    'icon' => 'code',
    'logo' => null,
    'title' => '',
    'description' => '',
    'proficiencyLevel' => 3,
    'proficiencyLabel' => '',
    'category' => '',
    'delay' => '0s',
])

@php
    // Icon mapping untuk berbagai teknologi (fallback jika tidak ada logo)
    $iconMap = [
        'laravel' => 'heroicon-o-code-bracket',
        'php' => 'heroicon-o-variable',
        'javascript' => 'heroicon-o-bolt',
        'react' => 'heroicon-o-arrow-path',
        'vue' => 'heroicon-o-sparkles',
        'mysql' => 'heroicon-o-circle-stack',
        'database' => 'heroicon-o-circle-stack',
        'code' => 'heroicon-o-code-bracket',
        'git' => 'heroicon-o-document-text',
        'docker' => 'heroicon-o-cube',
        'linux' => 'heroicon-o-command-line',
        'api' => 'heroicon-o-globe-alt',
        'mobile' => 'heroicon-o-device-phone-mobile',
        'tools' => 'heroicon-o-wrench-screwdriver',
        'devops' => 'heroicon-o-server',
        'frontend' => 'heroicon-o-computer-desktop',
        'backend' => 'heroicon-o-server',
    ];

    // Tentukan icon yang akan digunakan sebagai fallback
    $displayIcon = $iconMap[$icon] ?? ($icon ?? 'heroicon-o-code-bracket');

    // Warna berdasarkan proficiency level
    $proficiencyColors = [
        1 => 'text-gray-400',
        2 => 'text-yellow-500',
        3 => 'text-blue-500',
        4 => 'text-green-500',
        5 => 'text-red-500',
    ];

    $proficiencyColor = $proficiencyColors[$proficiencyLevel] ?? 'text-gray-400';

    // Badge color berdasarkan kategori
    $categoryColors = [
        'backend' => 'bg-green-100 text-green-800',
        'frontend' => 'bg-blue-100 text-blue-800',
        'database' => 'bg-yellow-100 text-yellow-800',
        'tools' => 'bg-gray-100 text-gray-800',
        'mobile' => 'bg-purple-100 text-purple-800',
        'devops' => 'bg-orange-100 text-orange-800',
    ];

    $categoryColor = $categoryColors[$category] ?? 'bg-gray-100 text-gray-800';
@endphp

<div class="skill-card" style="animation-delay: {{ $delay }}" data-aos="fade-up"
    data-aos-delay="{{ (float) $delay * 1000 }}">

    <div class="skill-header">
        {{-- Logo/Icon --}}
        <div class="skill-icon {{ $proficiencyColor }}">
            @if ($logo && Storage::disk('public')->exists($logo))
                {{-- Tampilkan logo jika tersedia --}}
                <img src="{{ Storage::disk('public')->url($logo) }}" alt="{{ $title }} logo"
                    class="w-12 h-12 object-contain rounded-lg"
                    onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                {{-- Fallback icon jika gambar gagal load --}}
                <div style="display: none;">
                    @if (str_starts_with($displayIcon, 'heroicon-'))
                        <x-dynamic-component :component="$displayIcon" class="w-8 h-8" />
                    @else
                        <i class="{{ $displayIcon }} text-2xl"></i>
                    @endif
                </div>
            @else
                {{-- Fallback ke icon jika tidak ada logo --}}
                @if (str_starts_with($displayIcon, 'heroicon-'))
                    <x-dynamic-component :component="$displayIcon" class="w-8 h-8" />
                @else
                    <i class="{{ $displayIcon }} text-2xl"></i>
                @endif
            @endif
        </div>

        {{-- Category Badge --}}
        @if ($category)
            <span class="category-badge {{ $categoryColor }}">
                {{ ucfirst($category) }}
            </span>
        @endif
    </div>

    {{-- Title --}}
    <h3 class="skill-title">{{ $title }}</h3>

    {{-- Description --}}
    @if ($description)
        <p class="skill-description">{{ $description }}</p>
    @endif

    {{-- Proficiency Level --}}
    @if ($proficiencyLabel)
        <div class="skill-proficiency">
            <span class="proficiency-label">{{ $proficiencyLabel }}</span>
            <div class="proficiency-bar">
                <div class="proficiency-fill" style="width: {{ ($proficiencyLevel / 5) * 100 }}%"></div>
            </div>
        </div>
    @endif
</div>
