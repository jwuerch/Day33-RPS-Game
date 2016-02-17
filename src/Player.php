<?php

    require_once __DIR__.'/../src/Rock.php';
    require_once __DIR__.'/../src/Scissors.php';
    require_once __DIR__.'/../src/Paper.php';

    class Player
        {
            private $name;
            private $age;
            private $weapon;

            public function __construct($name, $age, $weapon) {
                $this->name = $name;
                $this->age = $age;
                $this->weapon = $weapon;
            }

            //setters;
            public function setName($new_name) {
                $this->name = $new_name;
            }
            public function setAge($new_age) {
                $this->age = $new_age;
            }
            public function setWeapon($new_weapon) {
                $this->weapon = $new_weapon;
            }

            //getters;
            public function getName() {
                return $this->name;
            }
            public function getAge() {
                return $this->age;
            }
            public function getWeapon() {
                return $this->weapon;
            }

            //Play function;

            static function playerTurn() {
                if ($_SESSION['player_stats'][0] % 2 == 0) { //player2
                    return "It's " . $_SESSION['player_stats'][2]->getName() . "'s turn";
                } else { //player1
                    return "It's " . $_SESSION['player_stats'][1]->getName() . "'s turn";

                }
            }
            
            public function attack() {
                $_SESSION['player_stats'][0] += 1;
                if ($_SESSION['player_stats'][0] % 2 == 0) { //player2's turn
                    $player = $_SESSION['player_stats'][2];
                    $opponent = $_SESSION['player_stats'][1];
                    $weapon = $player->getWeapon();
                    $accuracy = $weapon->getAccuracy();
                    $strength = $weapon->getStrength();
                    $life = $weapon->getLife();

                    //opponent stats;
                    $opponent_weapon = $opponent->getWeapon();
                    $opponent_accuracy = $opponent_weapon->getAccuracy();
                    $opponent_strength = $opponent_weapon->getStrength();
                    $opponent_life = $opponent_weapon->getLife();
                    $damage = ($strength / 2);
                    $roll = rand(1, 6);

                    $accuracy += $roll;

                    if ($accuracy >=6) { //to hit;
                        $opponent_life -= $damage;
                        if ($life <= 0 ) { //if player1 life
                            return "They're dead!  You win!";
                        }
                        return "A hit!  Opponent takes " . $damage . " damage.";
                    } else { //miss;
                        return "You miss!";
                    }

                } else { //player1's turn
                    $player = $_SESSION['player_stats'][1];
                    $opponent = $_SESSION['player_stats'][2];
                    $weapon = $player->getWeapon();
                    $accuracy = $weapon->getAccuracy();
                    $strength = $weapon->getStrength();
                    $life = $weapon->getLife();

                    //opponent stats;
                    $opponent_weapon = $opponent->getWeapon();
                    $opponent_accuracy = $opponent_weapon->getAccuracy();
                    $opponent_strength = $opponent_weapon->getStrength();
                    $opponent_life = $opponent_weapon->getLife();
                    $damage = ($strength / 2);

                    $roll = rand(1, 6);

                    $accuracy += $roll;

                    if ($accuracy >=6) { //to hit;
                        $opponent_life -= $damage;
                        if ($life <= 0 ) { //if player1 life
                            return "They're dead!  You win!";
                        }
                        return "A hit!  Opponent takes " . $damage  . " damage. " . $opponent_life . " hp remaining.";
                    } else { //miss;
                        return "You miss! " . $opponent_life . " hp remaining.";
                    }
                }
            }

            //Heal function?!?

            function heal(){
                $_SESSION['player_stats'][0] += 1;
                if ($_SESSION['player_stats'][0] % 2 == 0) { //player2
                    $player = $_SESSION['player_stats'][2];
                    $weapon = $player->getWeapon();
                    $life = $weapon->getLife();
                    $heal_roll = rand(1, 3);
                    $life += $heal_roll;

                    return "You healed " . $heal_roll. " hp!" . $life  . " hp.";
                } else { //player1
                    $player = $_SESSION['player_stats'][1];
                    $weapon = $player->getWeapon();
                    $life = $weapon->getLife();
                    $heal_roll = rand(1, 3);
                    $life += $heal_roll;

                    return "You healed " . $heal_roll . " hp! " . $life  . " hp.";
                }
            }

            //SESSION STUFF;
            function save() {
                array_push($_SESSION['player_stats'], $this);
            }

            static function deleteAll() {
                $_SESSION['player_stats'] = [];
            }

            static function getAll() {
                return $_SESSION['player_stats'];
            }


        }


?>
