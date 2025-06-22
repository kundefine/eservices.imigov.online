<?php
const PAYMENT_METHOD = [
    "name" => "Payment Method",
    "parent_name" => null,
    "guard_name" => 'admin'
];
const PAYMENT_METHOD_ALL_PAYMENT_METHOD = [
    "name" => "Payment Method-All Payment Method",
    "parent_name" => "Payment Method",
    "guard_name" => 'admin'
];
const PAYMENT_METHOD_ADD_NEW_PAYMENT_METHOD = [
    "name" => "Payment Method-Add New Payment Method",
    "parent_name" => "Payment Method",
    "guard_name" => 'admin'
];


?>
<li class="nav-item {{ active_class(['/', '/*'], 'systemx/payment_method') }}">
    <a class="nav-link" data-toggle="collapse" href="#payment_method" role="button"
       aria-expanded="{{ is_active_route(['payment_method/*']) }}" aria-controls="system_users">
        <i class="link-icon" data-feather="users"></i>
        <span class="link-title" p-name="{{json_encode(PAYMENT_METHOD)}}">Payment Method</span>
        <i class="link-arrow" data-feather="chevron-down"></i>
    </a>
    <div class="collapse {{ show_class(['/', '/*'], 'systemx/payment_method') }}" id="payment_method">
        <ul class="nav sub-menu">
            <li class="nav-item">
                <a href="{{ route('paymentMethodIndex') }}" class="nav-link {{ active_class(['/'], 'systemx/payment_method') }}"
                   p-name="{{json_encode(PAYMENT_METHOD_ALL_PAYMENT_METHOD)}}">All Payment Method</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('paymentMethodCreate') }}" class="nav-link {{ active_class(['/create'], 'systemx/payment_method') }}"
                   p-name="{{json_encode(PAYMENT_METHOD_ADD_NEW_PAYMENT_METHOD)}}">Create New Payment Method</a>
            </li>
        </ul>
    </div>
</li>