@props(['url', 'title', 'icon'])

<li class="sidebar-item" {{ $title }}>
    <a href="{{ route($url) }}" class="sidebar-link"><i class="{{ $icon }}"></i><span class="hide-menu"> {{ $title }} </span></a>
</li>
