@props(['action', 'method', 'color', 'icon', 'title'])
<form method="post" class="d-inline" action="{{ $action }}">
    @method($method)
    @csrf
    <button type="submit" class="btn icon btn-{{ $color }}" data-bs-toggle="tooltip" data-bs-placement="top"
        title="{{ $title }}"> <i class="bi bi-{{ $icon }}"></i>
    </button>
</form>
