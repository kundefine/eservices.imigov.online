<?php
    const PRA_STATUS = [
        "name" => "Pra Status",
        "parent_name" => null,
        "guard_name" => 'admin'
    ];
    const PRA_STATUS_ALL_PRASTATUS = [
        "name" => "Pra Status-All Pra Status",
        "parent_name" => "Pra Status",
        "guard_name" => 'admin'
    ];
    const PRA_STATUS_CREATE_PRASTATUS = [
        "name" => "Pra Status-Create PraStatus",
        "parent_name" => "Pra Status",
        "guard_name" => 'admin'
    ];
//    const SYSTEM_ALL_ROLE = [
//        "name" => "Pra Status-All Role",
//        "parent_name" => "Pra Status",
//        "guard_name" => 'admin'
//    ];
//
//    const SYSTEM_CREATE_ROLE = [
//        "name" => "Pra Status-Create Role",
//        "parent_name" => "Pra Status",
//        "guard_name" => 'admin'
//    ];
?>
<li class="nav-item {{ active_class(['/', '/*'], 'systemx/pra_status') }}">
    <a class="nav-link" data-toggle="collapse" href="#system_users" role="button"
       aria-expanded="{{ is_active_route(['system_users/*']) }}" aria-controls="system_users">
        <i class="link-icon" data-feather="users"></i>
        <span class="link-title" p-name="{{json_encode(PRA_STATUS)}}">Pra Status</span>
        <i class="link-arrow" data-feather="chevron-down"></i>
    </a>
    <div class="collapse {{ show_class(['/', '/*'], 'systemx/pra_status') }}" id="system_users">
        <ul class="nav sub-menu">
            <li class="nav-item">
                <a href="{{ route('praStatusIndex') }}" class="nav-link {{ active_class(['/'], 'systemx/pra_status') }}"
                   p-name="{{json_encode(PRA_STATUS_ALL_PRASTATUS)}}">All Pra Status</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('praStatusCreate') }}"
                   class="nav-link {{ active_class(['/create'], 'systemx/pra_status') }}"
                   p-name="{{json_encode(PRA_STATUS_CREATE_PRASTATUS)}}">Create PraStatus</a>
            </li>

{{--            <li class="nav-item">--}}
{{--                <a href="{{ route('roleIndex') }}" class="nav-link {{ active_class(['/'], 'systemx/system_users/role') }}"--}}
{{--                   p-name="{{json_encode(SYSTEM_ALL_ROLE)}}">All Role</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a href="{{ route('roleCreate') }}"--}}
{{--                   class="nav-link {{ active_class(['/create'], 'systemx/system_users/role') }}"--}}
{{--                   p-name="{{json_encode(SYSTEM_CREATE_ROLE)}}">Create Role</a>--}}
{{--            </li>--}}
        </ul>
    </div>
</li>

