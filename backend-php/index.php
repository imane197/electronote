<?php
require_once 'controllers/BusinessController.php';

// Headers CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

$controller = new BusinessController();
$route = $_GET['route'] ?? '';

switch ($route) {
    case 'components':
        $controller->getAllComponents();
        break;
        
    case 'add-to-project':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->addToProject();
        }
        break;
        
    case 'my-project':
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $controller->getMyProject();
        } elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            $controller->removeFromProject();
        }
        break;
        
    default:
        http_response_code(404);
        echo json_encode(["error" => "Route non trouvée"]);
}

