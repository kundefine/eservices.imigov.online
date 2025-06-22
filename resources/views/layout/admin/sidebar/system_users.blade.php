<?php
    const SYSTEM_USER = [
        "name" => "System Users",
        "parent_name" => null,
        "guard_name" => 'admin'
    ];
    const SYSTEM_ALL_USERS = [
        "name" => "System Users-All Users",
        "parent_name" => "System Users",
        "guard_name" => 'admin'
    ];
    const SYSTEM_CREATE_USER = [
        "name" => "System Users-Create User",
        "parent_name" => "System Users",
        "guard_name" => 'admin'
    ];
    const SYSTEM_ALL_ROLE = [
        "name" => "System Users-All Role",
        "parent_name" => "System Users",
        "guard_name" => 'admin'
    ];

    const SYSTEM_CREATE_ROLE = [
        "name" => "System Users-Create Role",
        "parent_name" => "System Users",
        "guard_name" => 'admin'
    ];
?>
<li class="nav-item {{ active_class(['/', '/*'], 'systemx/system_users') }}">
    <a class="nav-link" data-toggle="collapse" href="#system_users" role="button"
       aria-expanded="{{ is_active_route(['system_users/*']) }}" aria-controls="system_users">
        <i class="link-icon" data-feather="users"></i>
        <span class="link-title" p-name="{{json_encode(SYSTEM_USER)}}">System Users</span>
        <i class="link-arrow" data-feather="chevron-down"></i>
    </a>
    <div class="collapse {{ show_class(['/', '/*'], 'systemx/system_users') }}" id="system_users">
        <ul class="nav sub-menu">
            <li class="nav-item">
                <a href="{{ route('adminIndex') }}" class="nav-link {{ active_class(['/'], 'systemx/system_users') }}"
                   p-name="{{json_encode(SYSTEM_ALL_USERS)}}">All Users</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('adminCreate') }}"
                   class="nav-link {{ active_class(['/create'], 'systemx/system_users') }}"
                   p-name="{{json_encode(SYSTEM_CREATE_USER)}}">Create User</a>
            </li>

            <li class="nav-item">
                <a href="{{ route('roleIndex') }}" class="nav-link {{ active_class(['/'], 'systemx/system_users/role') }}"
                   p-name="{{json_encode(SYSTEM_ALL_ROLE)}}">All Role</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('roleCreate') }}"
                   class="nav-link {{ active_class(['/create'], 'systemx/system_users/role') }}"
                   p-name="{{json_encode(SYSTEM_CREATE_ROLE)}}">Create Role</a>
            </li>
        </ul>
    </div>
</li>

