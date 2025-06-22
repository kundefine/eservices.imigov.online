<?php
const SERVICES_UPGRADE = [
    "name" => "Services Upgrade",
    "parent_name" => null,
    "guard_name" => 'admin'
];
const SERVICES_UPGRADE_HOSTING = [
    "name" => "Services Upgrade-Hosting",
    "parent_name" => "Services Upgrade",
    "guard_name" => 'admin'
];
const SERVICES_UPGRADE_DOMAIN = [
    "name" => "Services Upgrade-Domain",
    "parent_name" => "Services Upgrade",
    "guard_name" => 'admin'
];
const SERVICES_UPGRADE_SSL = [
    "name" => "Services Upgrade-SSL",
    "parent_name" => "Services Upgrade",
    "guard_name" => 'admin'
];

?>
<li class="nav-item {{ active_class(['services_upgrade/*']) }}">
    <a class="nav-link" data-toggle="collapse" href="#services_upgrade" role="button" aria-expanded="{{ is_active_route(['services_upgrade/*']) }}" aria-controls="services_upgrade">
        <i class="link-icon" data-feather="server"></i>
        <span class="link-title" p-name="{{json_encode(SERVICES_UPGRADE)}}">Services Upgrade</span>
        <i class="link-arrow" data-feather="chevron-down"></i>
    </a>
    <div class="collapse {{ show_class(['services_upgrade/*']) }}" id="services_upgrade">
        <ul class="nav sub-menu">
            <li class="nav-item">
                <a href="{{ url('/email/compose') }}" class="nav-link {{ active_class(['email/compose']) }}" p-name="{{json_encode(SERVICES_UPGRADE_HOSTING)}}">Hosting</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/email/inbox') }}" class="nav-link {{ active_class(['email/inbox']) }}" p-name="{{json_encode(SERVICES_UPGRADE_DOMAIN)}}">Domain</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/email/read') }}" class="nav-link {{ active_class(['email/read']) }}" p-name="{{json_encode(SERVICES_UPGRADE_SSL)}}">SSL</a>
            </li>
        </ul>
    </div>
</li>