<?php
/**
 * Plugin Name: Image to text 
 * Description: tu jakis opis 2
 * Version: 1.0.0
 * Author: Michał
 * Author URI: http://adres-autora.pl
 */

require_once __DIR__ . '/vendor/autoload.php';

define('ROOT', __DIR__);
define('VIEW_PATH', __DIR__ . '/src/views');
define('CACHE_PATH', __DIR__ . '/cache');

//vite
define('FM_VERSION', '0.1.1');
define('FM_PATH', dirname(__FILE__));
define('FM_URI', plugins_url(). "/image-to-text-msz");
define('FM_HMR_HOST', 'http://localhost:5173');
define('FM_ASSETS_PATH', FM_PATH . '\dist');
define('FM_ASSETS_URI', FM_URI . '/dist');
define('FM_RESOURCES_PATH', FM_PATH . '\src');
define('FM_RESOURCES_URI', FM_URI . '/src');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use App\Classes\App;

App::get_instance();
