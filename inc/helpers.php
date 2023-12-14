<?php

if (!function_exists('currentAdminPageName')) {
    function currentAdminPageName()
    {
        if (!is_admin()) {
            return '';
        }

        $screen = get_current_screen();
        $needle = "_page_";

        $wp_page = substr($screen->id, strpos($screen->id, $needle) + strlen($needle));

        return $wp_page;
    }
}


if (!function_exists('currentAdminPageURL')) {
    function currentAdminPageURL($data = [])
    {
        $url = site_url() . "/wp-admin/admin.php?page=" . currentAdminPageName();

        if (is_array($data) && count($data) > 0) {
            foreach ($data as $key => $val) {
                $url .= '&' . $key . '=' . $val;
            }
        } elseif(is_string($data)) {
            $url .= $data;
        }

        return $url;
    }
}

if (!function_exists('isUserLoggedInAndIsAdmin')) {
    function isUserLoggedInAndIsAdmin()
    {
        if (!is_user_logged_in() || !current_user_can('administrator')) {
            wp_redirect(home_url());
            exit;
        }
    }
}


if (!function_exists('show2')) {
    function show2($data)
    {
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
    }
}
