@props(['title', 'icon'])

<li class="sidebar-item">
    <a class="sidebar-link has-arrow waves-effect waves-dark" title="{{ $title }}" href="javascript:void(0)" aria-expanded="false"><i class="{{ $icon }}"></i><span class="hide-menu">{!! $title !!}</span></a>
    <ul aria-expanded="false" class="collapse first-level">
        {{ $slot }}
    </ul>
</li>
