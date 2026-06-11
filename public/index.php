<?php
// Load config
require_once '../config/config.php';

// Load classes
require_once '../classes/Database.php';
require_once '../classes/User.php';
require_once '../classes/Game.php';
require_once '../classes/Review.php';

// Load controllers
require_once '../controllers/AuthController.php';
require_once '../controllers/GameController.php';
require_once '../controllers/AdminController.php';

// Initialize database
$db = new Database();

// Initialize classes
$user = new User($db);
$game = new Game($db);
$review = new Review($db);

// Initialize controllers
$authController = new AuthController($user);
$gameController = new GameController($game, $review);

// Get route
$route = $_GET['route'] ?? 'home';
$parts = explode('/', trim($route, '/'));
$page = $parts[0] ?? 'home';
$action = $parts[1] ?? null;

// Route handling
switch ($page) {
    case 'register':
        $data = $authController->register();
        require '../views/register.php';
        break;

    case 'login':
        $data = $authController->login();
        require '../views/login.php';
        break;

    case 'logout':
        $authController->logout();
        break;

    case 'games':
        if ($action) {
            $gameDetail = $gameController->getGameDetail($action);
            if ($gameDetail) {
                $data = $gameDetail;
                require '../views/game-detail.php';
            } else {
                require '../views/404.php';
            }
        } else {
            $search = $_GET['search'] ?? '';
            $games = $gameController->searchGames($search);
            require '../views/games.php';
        }
        break;

    case 'admin':
        $adminController = new AdminController($game, $review, $user);
        if ($action === 'games') {
            $data = $adminController->getGames();
            require '../views/admin/games.php';
        } elseif ($action === 'users') {
            $data = $adminController->getUsers();
            require '../views/admin/users.php';
        } elseif ($action === 'create-game') {

    $data = $adminController->createGame();
    require '../views/admin/create-game.php';

        } elseif ($action === 'delete' && isset($parts[2])) {

            $result = $adminController->deleteGame($parts[2]);

            if (!empty($result['success'])) {
                $_SESSION['success'] = $result['success'];
            }

            if (!empty($result['error'])) {
                $_SESSION['error'] = $result['error'];
            }

            header('Location: ' . SITE_URL . '/admin/games');
            exit;

        } elseif (is_numeric($action)) {
            $data = $adminController->updateGame($action);
            require '../views/admin/edit-game.php';
        } else {
            $data = $adminController->getDashboard();
            require '../views/admin/dashboard.php';
        }
        break;

    case 'home':
    default:
        $games = $gameController->getAllGames();
        require '../views/home.php';
        break;
}
