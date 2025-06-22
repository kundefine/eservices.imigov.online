<?php
const SSL = [
    "name" => "SSL",
    "parent_name" => null,
    "guard_name" => 'admin'
];
const ALL_SSL = [
    "name" => "SSL-All SSL",
    "parent_name" => "SSL",
    "guard_name" => 'admin'
];
const CREATE_SSL = [
    "name" => "SSL-Create SSL",
    "parent_name" => "SSL",
    "guard_name" => 'admin'
];

?>


<li class="nav-item {{ active_class(['ssl/*']) }}">
    <a class="nav-link" data-toggle="collapse" href="#ssl" role="button" aria-expanded="{{ is_active_route(['ssl/*']) }}" aria-controls="ssl">
        <i class="link-icon" data-feather="lock"></i>
        <span class="link-title" p-name="{{json_encode(SSL)}}">SSL</span>
        <i class="link-arrow" data-feather="chevron-down"></i>
    </a>
    <div class="collapse {{ show_class(['ssl/*']) }}" id="ssl">
        <ul class="nav sub-menu">
            <li class="nav-item">
                <a href="{{ url('/email/compose') }}" class="nav-link {{ active_class(['email/compose']) }}" p-name="{{json_encode(ALL_SSL)}}">All SSL</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/email/inbox') }}" class="nav-link {{ active_class(['email/inbox']) }}" p-name="{{json_encode(CREATE_SSL)}}">Create SSL</a>
            </li>
        </ul>
    </div>
</li>


