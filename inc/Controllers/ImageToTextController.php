<?php

namespace App\Controllers;

use App\Models\ImageToText;
use App\Traits\BladeOneTrait;

class ImageToTextController
{
    use BladeOneTrait;

    public function __construct()
    {
        isUserLoggedInAndIsAdmin();

        $this->initializeBlade();
        $this->handleRequest();
    }

    public function handleRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
            $action = $_GET['action'];
            $this->handleGetRequestBasedOnAction($action);
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
            $action = $_POST['action'];
            $this->handlePostRequestBasedOnAction($action);
        } else {
            // Jeśli nie ma żadnego żądania lub akcji, załaduj domyślny widok (index)
            $this->index();
        }
    }

    public function handleGetRequestBasedOnAction($action)
    {
        // W zależności od wartości $action, wybierz i wyświetl odpowiedni widok
        switch ($action) {
            case 'view1s':
                // Renderuj widok 1
                break;
            case 'view2':
                // Renderuj widok 2
                break;
                // Dodaj kolejne przypadki dla różnych akcji
            default:
                // Domyślnie załaduj index
                $this->index();
                break;
        }
    }

    public function handlePostRequestBasedOnAction($action)
    {
        // Zrób coś w zależności od akcji w przypadku żądania POST
        switch ($action) {
            case 'submit1':
                // Obsłuż przesłany formularz 1
                break;
            case 'submit2':
                // Obsłuż przesłany formularz 2
                break;
                // Dodaj kolejne przypadki dla różnych akcji
            default:
                // Domyślnie załaduj index
                $this->index();
                break;
        }
    }

    private function index()
    {
        // include VIEW_PATH . "/test.php";

        echo $this->blade->run("imageToText", []);
    }
}
