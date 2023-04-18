<?php
const DOMAIN = [
    "name" => "DOMAIN",
    "parent_name" => null,
    "guard_name" => 'admin'
];
const ALL_DOMAIN = [
    "name" => "DOMAIN-All DOMAIN",
    "parent_name" => "DOMAIN",
    "guard_name" => 'admin'
];
const CREATE_DOMAIN = [
    "name" => "DOMAIN-Create DOMAIN",
    "parent_name" => "DOMAIN",
    "guard_name" => 'admin'
];

?>
<li class="nav-item {{ active_class(['domain/*']) }}">
    <a class="nav-link" data-toggle="collapse" href="#domain" role="button" aria-expanded="{{ is_active_route(['domain/*']) }}" aria-controls="domain">
        <i class="link-icon" data-feather="globe"></i>
        <span class="link-title" p-name="{{json_encode(DOMAIN)}}">Domain</span>
        <i class="link-arrow" data-feather="chevron-down"></i>
    </a>
    <div class="collapse {{ show_class(['domain/*']) }}" id="domain">
        <ul class="nav sub-menu">
            <li class="nav-item">
                <a href="{{ url('/email/compose') }}" class="nav-link {{ active_class(['email/compose']) }}" p-name="{{json_encode(ALL_DOMAIN)}}">All Domain</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/email/inbox') }}" class="nav-link {{ active_class(['email/inbox']) }}" p-name="{{json_encode(CREATE_DOMAIN)}}">Create Domain</a>
            </li>
        </ul>
    </div>
</li>


