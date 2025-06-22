<?php
const VAULT = [
    "name" => "Vault",
    "parent_name" => null,
    "guard_name" => 'admin'
];
const VAULT_HOSTING = [
    "name" => "Vault-Hosting",
    "parent_name" => "Vault",
    "guard_name" => 'admin'
];
const VAULT_DOMAIN = [
    "name" => "Vault-Domain",
    "parent_name" => "Vault",
    "guard_name" => 'admin'
];
const VAULT_SSL = [
    "name" => "Vault-SSL",
    "parent_name" => "Vault",
    "guard_name" => 'admin'
];

?>
<li class="nav-item {{ active_class(['vault/*']) }}">
    <a class="nav-link" data-toggle="collapse" href="#vault" role="button" aria-expanded="{{ is_active_route(['vault/*']) }}" aria-controls="vault">
        <i class="link-icon" data-feather="server"></i>
        <span class="link-title" p-name="{{json_encode(VAULT)}}">Vault</span>
        <i class="link-arrow" data-feather="chevron-down"></i>
    </a>
    <div class="collapse {{ show_class(['vault/*']) }}" id="vault">
        <ul class="nav sub-menu">
            <li class="nav-item">
                <a href="{{ url('/email/compose') }}" class="nav-link {{ active_class(['email/compose']) }}" p-name="{{json_encode(VAULT_HOSTING)}}">Hosting</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/email/inbox') }}" class="nav-link {{ active_class(['email/inbox']) }}" p-name="{{json_encode(VAULT_DOMAIN)}}">Domain</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/email/read') }}" class="nav-link {{ active_class(['email/read']) }}" p-name="{{json_encode(VAULT_SSL)}}">SSL</a>
            </li>
        </ul>
    </div>
</li>