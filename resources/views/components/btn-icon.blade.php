@props(['href', 'color', 'icon', 'title'])
<a href="{{ $href }}" class="btn icon btn-{{ $color }}" data-bs-toggle="tooltip" data-bs-placement="top"
    title="{{ $title }}">
    <i class="bi bi-{{ $icon }}"></i>
</a>
