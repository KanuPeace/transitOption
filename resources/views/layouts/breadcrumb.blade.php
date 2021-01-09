@php
$crumbs = $crumbs ?? [];
$items = count($crumbs);
@endphp
<div class="page-header">
    <h3 class="page-title">{{ $title ?? '' }}</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item {{ count($crumbs) < 1 && empty($title) ? 'active' : '' }}"><a
                    href="{{ route('home') }}">Home</a></li>
            @if (count($crumbs) < 1)
                <li class="breadcrumb-item active"><a href="#">{{ $title }}</a></li>
            @else
                @foreach ($crumbs as $key => $crumb)
                    <li class="breadcrumb-item {{ $items == $key - 1 ? 'active' : '' }}" aria-current="page">
                        <a href="{{ $crumb['url' ?? '#'] }}">{{ $crumb['title' ?? ''] }}</a>
                    </li>
                @endforeach
            @endif
        </ol>
    </nav>
</div>
