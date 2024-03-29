<?php

// Inclure l'autoloader de Composer pour charger automatiquement les classes
require_once '../../vendor/autoload.php';

// Importer la classe Router du namespace App\routes
use app\routes\Router;

// Créer une instance du routeur
$router = new Router();

// Définir les routes associées aux méthodes HTTP GET et POST
$router->setRoutes([
    'GET' => [
        '' => ['WikiController', 'home'],

        'login' => ['AuthController', 'loginPage'],
        'register' => ['AuthController', 'registerPage'],

        'tag' => ['TagController', 'tag'],
        'delete-tag' => ['TagController', 'delete'],
        'edit-tag' => ['TagController', 'getTag'],

        'category' => ['CategoryController', 'category'],
        'delete-category' => ['CategoryController', 'delete'],
        'edit-category' => ['CategoryController', 'getCategory'],

        'users' => ['AuthController', 'allUsers'],
        'delete-user' => ['AuthController', 'delete'],
        'edit-user' => ['AuthController', 'getUser'],
        'logout' => ['AuthController', 'logout'],


        'wiki' => ['WikiController', 'getAll'],
        'archive-wiki' => ['WikiController', 'archiveWiki'],

        'archived-wiki' => ['WikiController', 'archivedWiki'],
        'restore-wiki' => ['WikiController', 'restoredWiki'],
        'details-wiki' => ['WikiController', 'getWiki'],
        'delete-wiki' => ['WikiController', 'delete'],

        'search' => ['WikiController', 'searchWiki'],

        'admin' => ['WikiController', 'statistics'],

        



    ],
    'POST' => [
        'register' => ['AuthController', 'register'],
        'login' => ['AuthController', 'login'],

        'tag' => ['TagController', 'add'],
        'update-tag' => ['TagController', 'update'],

        'category' => ['CategoryController', 'add'],
        'update-category' => ['CategoryController', 'update'],

        'users' => ['AuthController', 'add'],
        'update-user' => ['AuthController', 'update'],

        'add-wiki' => ['WikiController', 'add'],
        'update-wiki' => ['WikiController', 'update'],







    ]
]);

// Vérifier si l'URL est définie dans la requête
if (isset($_GET['url'])) {
    // Nettoyer l'URI en supprimant les barres obliques au début et à la fin
    $uri = trim($_GET['url'], '/');
    
    // Récupérer la méthode HTTP de la requête
    $methode = $_SERVER['REQUEST_METHOD'];

    // Essayer d'obtenir la route associée à la méthode et à l'URI
    try {
        $route = $router->getRoute($methode, $uri);

        // Si une route est trouvée
        if ($route) {
            // Destructurer la route pour obtenir le nom du contrôleur et de la méthode
            list($controllerName, $methodName) = $route;

            // Construire le nom complet de la classe du contrôleur
            $controllerClass = 'app\\controller\\' . ucfirst($controllerName);

            // Instancier le contrôleur
            $controller = new $controllerClass();

            // Si une méthode est spécifiée dans la route
            if ($methodName) {
                // Vérifier si la méthode existe dans le contrôleur
                if (method_exists($controller, $methodName)) {
                    // Appeler la méthode du contrôleur
                    $controller->$methodName();
                } else {
                    // Lancer une exception si la méthode n'est pas trouvée dans le contrôleur
                    throw new Exception('Method not found in controller.');
                }
            } else {
                // Si aucune méthode n'est spécifiée, appeler la méthode par défaut (index)
                $controller->index();
            }
        } else {
            // Lancer une exception si aucune route n'est trouvée
            throw new Exception('Route not found.');
        }
    } catch (Exception $e) {
        // Capturer et afficher les exceptions
        echo 'Caught exception: ', $e->getMessage(), "\n";
    }
}