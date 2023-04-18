<?php
const SERVICES_RENEW = [
    "name" => "Services Renew",
    "parent_name" => null,
    "guard_name" => 'admin'
];
const SERVICES_RENEW_HOSTING = [
    "name" => "Services Renew-Hosting",
    "parent_name" => "Services Renew",
    "guard_name" => 'admin'
];
const SERVICES_RENEW_DOMAIN = [
    "name" => "Services Renew-Domain",
    "parent_name" => "Services Renew",
    "guard_name" => 'admin'
];
const SERVICES_RENEW_SSL = [
    "name" => "Services Renew-SSL",
    "parent_name" => "Services Renew",
    "guard_name" => 'admin'
];

?>
<li class="nav-item {{ active_class(['services_renew/*']) }}">
    <a class="nav-link" data-toggle="collapse" href="#services_renew" role="button" aria-expanded="{{ is_active_route(['services_renew/*']) }}" aria-controls="services_renew">
        <i class="link-icon" data-feather="server"></i>
        <span class="link-title" p-name="{{json_encode(SERVICES_RENEW)}}">Services Renew</span>
        <i class="link-arrow" data-feather="chevron-down"></i>
    </a>
    <div class="collapse {{ show_class(['services_renew/*']) }}" id="services_renew">
        <ul class="nav sub-menu">
            <li class="nav-item">
                <a href="{{ url('/email/compose') }}" class="nav-link {{ active_class(['email/compose']) }}" p-name="{{json_encode(SERVICES_RENEW_HOSTING)}}">Hosting</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/email/inbox') }}" class="nav-link {{ active_class(['email/inbox']) }}" p-name="{{json_encode(SERVICES_RENEW_DOMAIN)}}">Domain</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/email/read') }}" class="nav-link {{ active_class(['email/read']) }}" p-name="{{json_encode(SERVICES_RENEW_SSL)}}">SSL</a>
            </li>
        </ul>
    </div>
</li>