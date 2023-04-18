<?php
const COMPANY = [
    "name" => "Company",
    "parent_name" => null,
    "guard_name" => 'admin'
];
const COMPANY_ALL_COMPANY = [
    "name" => "Company-All Company",
    "parent_name" => "Company",
    "guard_name" => 'admin'
];
const COMPANY_CREATE_NEW_COMPANY = [
    "name" => "Company-Create New Company",
    "parent_name" => "Company",
    "guard_name" => 'admin'
];


?>
<li class="nav-item {{ active_class(['/', '/*'], 'systemx/company') }}">
    <a class="nav-link" data-toggle="collapse" href="#company" role="button"
       aria-expanded="{{ is_active_route(['company/*']) }}" aria-controls="system_users">
        <i class="link-icon" data-feather="users"></i>
        <span class="link-title" p-name="{{json_encode(COMPANY)}}">Company</span>
        <i class="link-arrow" data-feather="chevron-down"></i>
    </a>
    <div class="collapse {{ show_class(['/', '/*'], 'systemx/company') }}" id="company">
        <ul class="nav sub-menu">
            <li class="nav-item">
                <a href="{{ route('companyIndex') }}" class="nav-link {{ active_class(['/'], 'systemx/company') }}"
                   p-name="{{json_encode(COMPANY_ALL_COMPANY)}}">All Company</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('companyCreate') }}" class="nav-link {{ active_class(['/create'], 'systemx/company') }}"
                   p-name="{{json_encode(COMPANY_CREATE_NEW_COMPANY)}}">Create New Company</a>
            </li>
        </ul>
    </div>
</li>