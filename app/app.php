<?php
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/Player.php';
    require_once __DIR__.'/../src/Rock.php';
    require_once __DIR__.'/../src/Scissors.php';
    require_once __DIR__.'/../src/Paper.php';


    session_start();
    if(empty($_SESSION['player_stats'])) {
        $_SESSION['player_stats'] = array(2);
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    $app->get('/', function() use ($app) {
        return $app['twig']->render('home.html.twig');
    });

    $app->post('/play', function() use ($app) {
        $player1 = new Player($_POST['p1name'], $_POST['p1age'], $_POST['p1weapon']);
        $player2 = new Player($_POST['p2name'], $_POST['p2age'], $_POST['p2weapon']);
        $rock = new Rock();
        $paper = new Paper();
        $scissors = new Scissors();
        $player1->save();
        $player2->save();
        $player1_spot = $_SESSION['player_stats'][1];
        $player2_spot = $_SESSION['player_stats'][2];
        return $app['twig']->render('play.html.twig', array('player1' => $player1_spot, 'player2' => $player2_spot));
    });

    return $app;


 ?>
