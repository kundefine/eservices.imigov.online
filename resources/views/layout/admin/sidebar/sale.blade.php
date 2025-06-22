<?php
const SALE = [
    "name" => "Sale",
    "parent_name" => null,
    "guard_name" => 'admin'
];
const SALE_ALL_SALE = [
    "name" => "Sale-All Sale",
    "parent_name" => "Sale",
    "guard_name" => 'admin'
];
const SALE_CREATE_NEW_SALE = [
    "name" => "Sale-Create New Sale",
    "parent_name" => "Sale",
    "guard_name" => 'admin'
];


?>
<li class="nav-item {{ active_class(['/', '/*'], 'systemx/sale') }}">
    <a class="nav-link" data-toggle="collapse" href="#sale" role="button"
       aria-expanded="{{ is_active_route(['sale/*']) }}" aria-controls="system_users">
        <i class="link-icon" data-feather="users"></i>
        <span class="link-title" p-name="{{json_encode(SALE)}}">Sale</span>
        <i class="link-arrow" data-feather="chevron-down"></i>
    </a>
    <div class="collapse {{ show_class(['/', '/*'], 'systemx/sale') }}" id="sale">
        <ul class="nav sub-menu">
            <li class="nav-item">
                <a href="{{ route('saleIndex') }}" class="nav-link {{ active_class(['/'], 'systemx/sale') }}"
                   p-name="{{json_encode(SALE_ALL_SALE)}}">All Sale</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('saleCreate') }}" class="nav-link {{ active_class(['/create'], 'systemx/sale') }}"
                   p-name="{{json_encode(SALE_CREATE_NEW_SALE)}}">Create New Sale</a>
            </li>
        </ul>
    </div>
</li>