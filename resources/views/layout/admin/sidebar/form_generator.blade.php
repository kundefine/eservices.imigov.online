<?php
    const FORM_GENERATOR = [
        "name" => "Form Generator",
        "parent_name" => null,
        "guard_name" => 'admin'
    ];
    const FORM_GENERATOR_ALL = [
        "name" => "Form Generator-All Forms",
        "parent_name" => 'Form Generator',
        "guard_name" => 'admin'
    ];
    const FORM_GENERATOR_CREATE = [
        "name" => "Form Generator-Generate New Form",
        "parent_name" => 'Form Generator',
        "guard_name" => 'admin'
    ];
?>
<li class="nav-item {{ active_class(['/', '/*'], 'systemx/form_generator') }}">
    <a class="nav-link" data-toggle="collapse" href="#form_generator" role="button"
       aria-expanded="{{ is_active_route(['form_generator/*']) }}" aria-controls="system_users">
        <i class="link-icon" data-feather="users"></i>
        <span class="link-title" p-name="{{json_encode(FORM_GENERATOR)}}">Form Generator</span>
        <i class="link-arrow" data-feather="chevron-down"></i>
    </a>
    <div class="collapse {{ show_class(['/', '/*'], 'systemx/form_generator') }}" id="form_generator">
        <ul class="nav sub-menu">
            <li class="nav-item">
                <a href="{{ route('formGeneratorIndex') }}" class="nav-link {{ active_class(['/'], 'systemx/form_generator') }}"
                   p-name="{{json_encode(FORM_GENERATOR_ALL)}}">All Forms</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('formGeneratorCreate') }}" class="nav-link {{ active_class(['/create'], 'systemx/form_generator') }}"
                   p-name="{{json_encode(FORM_GENERATOR_CREATE)}}">Generate New Form</a>
            </li>
        </ul>
    </div>
</li>

