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
    session_start();
    if(empty($_SESSION['player1_stats'])) {
        $_SESSION['player1_stats'] = array($_SESSION['player_stats'][1]);
    }
    session_start();
    if(empty($_SESSION['player2_stats'])) {
        $_SESSION['player2_stats'] = array($_SESSION['player_stats'][2]);
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    $app->get('/', function() use ($app) {
        return $app['twig']->render('home.html.twig');
    });

    $app->post('/play', function() use ($app) {
        $rock = new Rock();
        $paper = new Paper();
        $scissors = new Scissors();

        if ($_POST['p1weapon'] == "rock") {
            $player1 = new Player($_POST['p1name'], $_POST['p1age'], $rock);
        } else if ($_POST['p1weapon'] == "paper") {
            $player1 = new Player($_POST['p1name'], $_POST['p1age'], $paper);
        } else if ($_POST['p1weapon'] == "scissors") {
            $player1 = new Player($_POST['p1name'], $_POST['p1age'], $scissors);
        }

        if ($_POST['p2weapon'] == "rock") {
            $player2 = new Player($_POST['p2name'], $_POST['p2age'], $rock);
        } else if ($_POST['p2weapon'] == "paper") {
            $player2 = new Player($_POST['p2name'], $_POST['p2age'], $paper);
        } else if ($_POST['p2weapon'] == "scissors") {
            $player2 = new Player($_POST['p2name'], $_POST['p2age'], $scissors);
        }

        $player1->save();
        $player2->save();
        var_dump($_SESSION['player_stats']);
        $player1_spot = $_SESSION['player_stats'][1];
        $player2_spot = $_SESSION['player_stats'][2];
        $turn = Player::whoseTurn();


        return $app['twig']->render('play.html.twig', array('player1' => $player1_spot, 'player2' => $player2_spot, 'turn' => $turn));
    });

    $app->post("/delete", function() use ($app) {
        Player::deleteAll();
        return $app['twig']->render('home.html.twig');
    });

    $app->post("/attack", function() use ($app) {
        print_r($_SESSION['player_stats']);
        $whoseturn = Player::whoseTurn();
        $player = Player::decidePlayer();
        $attack = Player::attack();
        return $app['twig']->render('play.html.twig', array('turn' => $whoseturn, 'attack' => $attack));
    });

    // $app->post("/heal", function() use ($app) {
    //     print_r($_SESSION['player_stats']);
    //     Player::changeTurn();
    //     $whoseturn = Player::playerTurnName();
    //     return $app['twig']->render('play.html.twig', array('turn' => $whoseturn));
    // });

    return $app;


 ?>
