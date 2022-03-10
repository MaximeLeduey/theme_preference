<?php 


function has_click_on_form() {
    if (isset($_POST['dark'])) {
        return 'dark';
    }
    else if (isset($_POST['light'])) {
        return 'light';
    }
    else {
        return null;
    }
}

function has_cookies() {
    return isset($_COOKIE['user_pref']);
}

function has_different_theme() {
    return has_click_on_form() != null && has_click_on_form() != $_COOKIE['user_pref'];
}

function manage_cookies() {
    if(!has_cookies() || has_different_theme()) {
        set_cookies('user_pref', has_click_on_form(), strtotime('+1 month'));
        return has_click_on_form();
    }
    else {
        return $_COOKIE['user_pref'];
    }
}

function set_cookies(string $name, string $value, int  $delay) {
    return setcookie($name, $value, $delay);
}





?>