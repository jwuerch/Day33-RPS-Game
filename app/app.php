<?php
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/Player.php';
    require_once __DIR__.'/../src/Rock.php';
    require_once __DIR__.'/../src/Scissors.php';
    require_once __DIR__.'/../src/Paper.php';


    session_start();
    if(empty($_SESSION['player_stats'])) {
        $_SESSION['player_stats'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    $app->get('/', function() use ($app) {
        return $app['twig']->render('home.html.twig');
    });

    return $app;


 ?>
