@props(['icon', 'title', 'btn1_link', 'btn1_color', 'btn1_title', 'btn1_icon', 'btn2_link', 'btn2_color', 'btn2_title', 'btn2_icon'])
<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h4 class="card-title"><i class="bi bi-{{ $icon }}"></i> {{ $title }}</h4>
                <div>
                    <a href="{{ $btn1_link }}" class="btn btn-{{ $btn1_color }} btn-md" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="{{ $btn1_title }}">
                        <i class="bi bi-{{ $btn1_icon }}"></i>
                    </a>
                    <a href="{{ $btn2_link }}" class="btn btn-{{ $btn2_color }} btn-md" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="{{ $btn2_title }}">
                        <i class="bi bi-{{ $btn2_icon }}"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            {{ $slot ?? '' }}
        </div>
    </div>
</section>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        }, false);
    </script>
@endpush
