<?php 

namespace App\Assets;

use App\Assets\Resolver;
use App\Core\Config;
use App\Traits\Singleton;

class Assets
{
    use Resolver;
    use Singleton;

    public function __construct()
    {
        $this->load();
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        //actions and filter
        add_action( 'admin_enqueue_scripts', [$this, 'admin'] );
    }
    /**
     * @action admin_enqueue_scripts
     */
    public function admin(): void
    {
        $config = Config::get_instance();
        
        wp_enqueue_style('itt-1-tailwind-style', $this->resolve('styles/css/tailwind.css'), [], $config->get('version'), 'all');
        wp_enqueue_style('itt-2-style', $this->resolve('styles/scss/styles.scss'), [], $config->get('version'), 'all');
        wp_enqueue_script('itt-1-script', $this->resolve('scripts/scripts.js'), [], $config->get('version'), ['strategy' => 'defer']);
    }
}