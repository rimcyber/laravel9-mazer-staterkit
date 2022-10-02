@props(['icon', 'title'])
<section class="section">
    <div class="card shadow">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h4 class="card-title"><i class="bi bi-{{ $icon }}"></i> {{ $title }}</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                {{ $slot ?? '' }}
            </div>
        </div>
    </div>
</section>
