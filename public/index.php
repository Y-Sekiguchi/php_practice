<?php
ini_set("display_errors", 1);
if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

require __DIR__ . '/../vendor/autoload.php';

//session_start();

// Instantiate the app
$settings = require __DIR__ . '/../src/settings.php';
$app = new \Slim\App($settings);

$app->get('/test',function($request,$response,$args){
  echo "hogehoge";
});

// Set up dependencies
require __DIR__ . '/../src/dependencies.php';

// Register middleware
require __DIR__ . '/../src/middleware.php';

// Register routes
//require __DIR__ . '/../src/routes.php';

require __DIR__ . '/../src/App/Entity/User.php';

require __DIR__ . '/../src/App/AbstractResource.php';
require __DIR__ . '/../src/App/Resource/UserResource.php';
$app->get("/hoge", function($request, $response, $args){
  echo "hogehoge";
  echo "output : " . __DIR__ . '/../src/App/AbstractResource.php';
});

use App\Entity\User;
$userResource = new \App\Resource\UserResource();

$app->get('/users', function($id = null) use ($userResource) {
    echo $userResource->get($id);
});

// Run app
$app->run();
