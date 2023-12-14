<?php 

namespace App\Assets;
use App\Core\Config;

trait Resolver
{
    private array $manifest = [];

    /**
     * @action wp_enqueue_scripts 1
     */
    public function load(): void
    {
        $config = Config::get_instance();

        $path = $config->get('manifest.path');

        if (empty($path) || ! file_exists($path)) {
            wp_die(__('Run <code>npm run build</code> in your application root!', 'fm'));
        }

        $this->manifest = json_decode(file_get_contents($path), true);
    }

    private function resolve(string $path): string
    {
        $url = '';

        if (! empty($this->manifest["src/{$path}"])) {
            $url = FM_ASSETS_URI . "/{$this->manifest["src/{$path}"]['file']}";
        }

        return apply_filters('app/assets/resolver/url', $url, $path);
    }
}