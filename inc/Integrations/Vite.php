<?php
namespace App\Integrations;

use App\Core\Config;
use App\Traits\Singleton;

class Vite
{
    use Singleton;
    /**
     * @action wp_head 1
     */
    public function client(): void
    {
        $config = Config::get_instance();

        echo '<script type="module" src="' . $config->get('hmr.client') . '"></script>';
    }

    /**
     * @filter script_loader_tag 1 3
     */
    public function module(string $tag, string $handle, string $url): string
    {
        if (false !== strpos($url, FM_HMR_HOST)) {
            $tag = str_replace('<script ', '<script type="module" ', $tag);
        }

        return $tag;
    }

    /**
     * @filter fm/assets/resolver/url 1 2
     */
    public function url(string $url, string $path): string
    {
        $config = Config::get_instance();

        return $config->get('hmr.base') . "/{$path}";
    }
}