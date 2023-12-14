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

        wp_enqueue_style('admin-style-msz', $this->resolve('styles/styles.scss'), [], $config->get('version'), 'all');
        wp_enqueue_script('admin-script-msz', $this->resolve('scripts/scripts.js'), [], $config->get('version'), ['strategy' => 'defer']);
    }
}