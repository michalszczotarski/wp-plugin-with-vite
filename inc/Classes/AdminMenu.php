<?php

/*
* Enqueue theme menus
* @package Education
*/
namespace App\Classes;

use App\Controllers\ImageToTextController;
use App\Traits\Singleton;

class AdminMenu
{
    use Singleton;

    protected function __construct()
    {
        $this->setup_hooks();
        # code...
    }

    protected function setup_hooks()
    {
        //actions and filter
        add_action( 'admin_menu', [$this, 'register_menus'] );
    }

    public function register_menus()
    {
        add_menu_page(
            __('Image to text', 'msz'), // Tytuł menu
            __('Image to text', 'msz'), // Nazwa menu w sidebarze
            'manage_options', // Wymagane uprawnienia
            'image-to-text', // Unikalny slug menu
            array($this, 'render_custom_menu'), // Funkcja renderująca zawartość menu
            'dashicons-admin-generic', // Ikona menu (możesz użyć dashicon lub podać URL do ikony)
            100 // Pozycja menu w sidebarze
        );
    }


    public function render_custom_menu() {
        $imageToTextController = new ImageToTextController();
    }
}
