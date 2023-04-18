<?php
  
function active_class($path, $prefix = '', $active = 'active') {
    $path_with_prefix = [];
    if($prefix) {
        foreach ((array)$path as $p) {
            $pre = rtrim($prefix,"/");
            $path_with_prefix[] = $pre . rtrim($p,"/");
        }
    } else {
        $path_with_prefix = $path;
    }
    return call_user_func_array('Request::is', $path_with_prefix) ? $active : '';
}

function is_active_route($path) {
  return call_user_func_array('Request::is', (array)$path) ? 'true' : 'false';
}

function show_class($path, $prefix = '') {
    $path_with_prefix = [];
    if($prefix) {
        foreach ((array)$path as $p) {
            $pre = rtrim($prefix,"/");
            $path_with_prefix[] = $pre . rtrim($p,"/");
        }
    } else {
        $path_with_prefix = $path;
    }
  return call_user_func_array('Request::is', $path_with_prefix) ? 'show' : '';
}


function get_default_role() {
    return 'administrator';
}
