<?php

require 'vendor/autoload.php';

$router = new AltoRouter();
$router->setBasePath('/tzards-chapeau-de-paille-repo/backend/api-general');

$router->map('GET', '/user', function () {
    require_once 'users/lire.php';
});

$router->map('POST', '/user', function () {
    require_once 'users/creer.php';
});

$router->map('GET', '/user/[i:id]', function ($id) {
    $_GET['id'] = "$id";
    require_once 'users/lire_un.php';
});

$router->map('GET', '/session', function () {
    require_once 'sessionSurf/lire.php';
});

$router->map('POST', '/session', function () {
    require_once 'sessionSurf/creer.php';
});

$router->map('GET', '/session/[i:id]', function ($id) {
    $_GET['id'] = "$id";
    require_once "sessionSurf/lire_un.php";
});

$router->map('PUT', '/session/[i:id]', function ($id) {
    $_GET['id'] = "$id";
    require_once "sessionSurf/modifier.php";
});

$router->map('DELETE', '/session/[i:id]', function ($id) {
    $_GET['id'] = "$id";
    require_once "sessionSurf/supprimer.php";
});

$router->map('GET', '/lieu', function ($id) {
    $_GET['id'] = "$id";
    require_once "lieu/lire.php";
});

$router->map('GET', '/session/[i:id]', function ($id) {
    $_GET['id'] = "$id";
    require_once "sessionSurf/lire_un.php";
});

$match = $router->match();

if ($match) {
    call_user_func_array($match['target'], $match['params']);
} else {
    echo "No match";
};
