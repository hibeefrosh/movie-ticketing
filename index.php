<?php
$config = require __DIR__ . '/config/config.php';
// Accessing app configuration
$appConfig = $config['app'];
$appName = $appConfig['name'];
$appUrl = $appConfig['url'];

// Store values in the session
session_start();
$_SESSION['appName'] = $appName;
$_SESSION['appUrl'] = $appUrl;


define('BASE_PATH', __DIR__);
// Validate and sanitize the request URI
$request = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);

// routes that require authentication
$authenticatedRoutes = ['/movie-ticketing/admindashboard', '/movie-ticketing/movies', '/movie-ticketing/create-movies', '/movie-ticketing/logout', '/movie-ticketing/submit_movie','/movie-ticketing/delete_movie', '/movie-ticketing/sales'];

// Check if the current route requires authentication
if (in_array($request, $authenticatedRoutes) && !isset($_SESSION['admin'])) {
    // Redirect to the login page or perform any other authentication logic
    header("Location: /movie-ticketing/login");
    exit;
}

// Define allowed routes
$allowedRoutes = ['/movie-ticketing/', '/movie-ticketing/about', '/movie-ticketing/services', '/movie-ticketing/book_ticket', '/movie-ticketing/contact', '/movie-ticketing/login', '/movie-ticketing/login/authenticate', '/movie-ticketing/admindashboard', '/movie-ticketing/movies','/movie-ticketing/logout','/movie-ticketing/create-movies', '/movie-ticketing/submit_movie','/movie-ticketing/delete_movie','/movie-ticketing/sales', '/movie-ticketing/buy-ticket'];

// Validate against the whitelist
if (!in_array($request, $allowedRoutes)) {
    // Log the error
    error_log('404 Not Found - ' . $_SERVER['REQUEST_URI']);

    // Respond with a generic message
    header("HTTP/1.0 404 Not Found");
    echo '404 Not Found';
    exit;
}

// Switch based on the validated request URI
switch ($request) {
    case '/movie-ticketing/':
        require __DIR__ . '/src/Controllers/HomeController.php';
        $controller = new HomeController();
        $controller->index();
        break;
    case '/movie-ticketing/about':
        require __DIR__ . '/src/Controllers/HomeController.php';
        $controller = new HomeController();
        $controller->about();
        break;
    case '/movie-ticketing/services':
        require __DIR__ . '/src/Controllers/HomeController.php';
        $controller = new HomeController();
        $controller->services();
        break;
    case '/movie-ticketing/contact':
        require __DIR__ . '/src/Controllers/HomeController.php';
        $controller = new HomeController();
        $controller->showContactForm();
        break;
    case '/movie-ticketing/login':
        require __DIR__ . '/src/Controllers/AdminController.php';
        $controller = new AdminController();
        $controller->index();
        break;
    case '/movie-ticketing/login/authenticate':
        require __DIR__ . '/src/Controllers/AdminController.php';
        $controller = new AdminController();
        $controller->authenticate();
        break;
    case '/movie-ticketing/admindashboard':
        require __DIR__ . '/src/Controllers/AdminController.php';
        $controller = new AdminController();
        $controller->dashboard();
        break;
    case '/movie-ticketing/movies':
        require __DIR__ . '/src/Controllers/AdminController.php';
        $controller = new AdminController();
        $controller->movies();
        break;
    case '/movie-ticketing/create-movies':
        require __DIR__ . '/src/Controllers/AdminController.php';
        $controller = new AdminController();
        $controller->addmovies();
        break;
    case '/movie-ticketing/submit_movie':
        require __DIR__ . '/src/Controllers/AdminController.php';
        $controller = new AdminController();
        $controller->submitMovieForm();
        break;
    case '/movie-ticketing/delete_movie':
        require __DIR__ . '/src/Controllers/AdminController.php';
        $controller = new AdminController();
        $controller->deleteMovie();
        break;
    case '/movie-ticketing/logout':
        require __DIR__ . '/src/Controllers/AdminController.php';
        $controller = new AdminController();
        $controller->logout();
        break;
    case '/movie-ticketing/sales':
        require __DIR__ . '/src/Controllers/AdminController.php';
        $controller = new AdminController();
        $controller->sales();
        break;
    case '/movie-ticketing/buy-ticket':
        require __DIR__ . '/src/Controllers/HomeController.php';
        $controller = new HomeController();
        $controller->buyTicket();
        break;
    default:
        // Log the error
        error_log('404 Not Found - ' . $_SERVER['REQUEST_URI']);

        // Respond with a generic message
        header("HTTP/1.0 404 Not Found");
        echo '404 Not Found';
        break;
}
