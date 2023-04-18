<?php
const HOSTING = [
    "name" => "Hosting",
    "parent_name" => null,
    "guard_name" => 'admin'
];
const ALL_HOSTING = [
    "name" => "Hosting-All Hosting",
    "parent_name" => "Hosting",
    "guard_name" => 'admin'
];
const CREATE_HOSTING = [
    "name" => "Hosting-Create Hosting",
    "parent_name" => "Hosting",
    "guard_name" => 'admin'
];

?>
<li class="nav-item {{ active_class(['hosting/*']) }}">
    <a class="nav-link" data-toggle="collapse" href="#hosting" role="button" aria-expanded="{{ is_active_route(['hosting/*']) }}" aria-controls="hosting">
        <i class="link-icon" data-feather="hard-drive"></i>
        <span class="link-title" p-name="{{json_encode(HOSTING)}}">Hosting</span>
        <i class="link-arrow" data-feather="chevron-down"></i>
    </a>
    <div class="collapse {{ show_class(['hosting/*']) }}" id="hosting">
        <ul class="nav sub-menu">
            <li class="nav-item">
                <a href="{{ url('/email/compose') }}" class="nav-link {{ active_class(['email/compose']) }}" p-name="{{json_encode(ALL_HOSTING)}}">All Hosting</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/email/inbox') }}" class="nav-link {{ active_class(['email/inbox']) }}" p-name="{{json_encode(CREATE_HOSTING)}}">Create Hosting</a>
            </li>
        </ul>
    </div>
</li>