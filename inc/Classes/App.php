<?php

namespace App\Classes;

use App\Integrations\Vite;
use App\Traits\Singleton;
use App\Core\Config;
use App\Assets\Assets;

/**
 * Summary of ImageToText
 */
class App
{
    use Singleton;

    protected function __construct()
    {
        AdminMenu::get_instance();
        $config = Config::get_instance();
        Assets::get_instance();

        if ($config->get('hmr.active')) {
            $vite = Vite::get_instance();

            add_action('admin_head', [$vite, 'client'], 1);
            
            add_filter('script_loader_tag', [$vite, 'module'], 10, 3);

            add_filter('app/assets/resolver/url', [$vite, 'url'], 10, 2);
        }

        $this->setup_hooks();
    }

    
    protected function setup_hooks()
    {
        
    }
}
