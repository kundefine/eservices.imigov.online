<?php
const SERVICES = [
    "name" => "Services",
    "parent_name" => null,
    "guard_name" => 'admin'
];
const SERVICES_ALL_SERVICES = [
    "name" => "Services-All Service",
    "parent_name" => "Services",
    "guard_name" => 'admin'
];
const SERVICES_CREATE_NEW_SERVICES = [
    "name" => "Services-Create New Service",
    "parent_name" => "Services",
    "guard_name" => 'admin'
];


?>
<li class="nav-item {{ active_class(['/', '/*'], 'systemx/services') }}">
    <a class="nav-link" data-toggle="collapse" href="#services" role="button"
       aria-expanded="{{ is_active_route(['services/*']) }}" aria-controls="system_users">
        <i class="link-icon" data-feather="users"></i>
        <span class="link-title" p-name="{{json_encode(SERVICES)}}">Services</span>
        <i class="link-arrow" data-feather="chevron-down"></i>
    </a>
    <div class="collapse {{ show_class(['/', '/*'], 'systemx/services') }}" id="services">
        <ul class="nav sub-menu">
            <li class="nav-item">
                <a href="{{ route('serviceIndex') }}" class="nav-link {{ active_class(['/'], 'systemx/services') }}"
                   p-name="{{json_encode(SERVICES_ALL_SERVICES)}}">All Service</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('serviceCreate') }}" class="nav-link {{ active_class(['/create'], 'systemx/services') }}"
                   p-name="{{json_encode(SERVICES_CREATE_NEW_SERVICES)}}">Create New Service</a>
            </li>
        </ul>
    </div>
</li>