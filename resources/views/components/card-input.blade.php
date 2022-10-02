@props(['icon', 'title', 'link_back', 'action'])
<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h4 class="card-title"><i class="bi bi-{{ $icon }}"></i> {{ $title }}</h4>
                <div>
                    <a href="{{ $link_back }}" class="btn btn-warning btn-md" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Back">
                        <i class="bi bi-reply-fill"></i>
                    </a>
                </div>
            </div>
            <hr>
        </div>
        <form method="POST" action="{{ $action }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    {{ $slot ?? '' }}
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success"><i class="bi bi-sd-card-fill"></i> Save</button>
                    <div>
                        <a href="{{ $link_back }}" class="btn btn-warning btn-md" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Back">
                            <i class="bi bi-reply-fill"></i>
                        </a>
                    </div>
                </div>
            </div>
        </form>
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
