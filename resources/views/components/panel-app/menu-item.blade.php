@props(['url', 'title', 'icon'])
<li class="sidebar-item" title="{{ $title }}">
    <a class="sidebar-link waves-effect waves-dark" href="{{ route($url) }}" aria-expanded="false"><i class="{{ $icon }}"></i><span class="hide-menu">{{ $title }}</span></a>
</li>
