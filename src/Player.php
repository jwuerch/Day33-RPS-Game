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

            static function whoseTurn() {
                if ($_SESSION['player_stats'][0] % 2 == 0) { //player2
                    return $_SESSION['player_stats'][2]->getName();
                } else { //player1
                    return $_SESSION['player_stats'][1]->getName();
                }
            }

            static function changeTurn() {
                $_SESSION['player_stats'][0] += 1;
            }

            static function decidePlayer() {
                if ($_SESSION['player_stats'][0] % 2 == 0) { //player2
                    return $_SESSION['player_stats'][2];
                } else { //player1
                    return $_SESSION['player_stats'][1];
                }
            }

            static function attack() {
                Player::changeTurn(); //determines whose turn it is
                // if ($_SESSION['player_stats'][0] % 2 == 0) { //player2's turn
                    $player = $_SESSION['player_stats'][2];
                    $opponent = $_SESSION['player_stats'][1];


                    $name1 = $player->getName();
                    $name1 = "Tom";
                    print_r($_SESSION['player_stats']);
                    return $name1;
                    $weapon = $player->getWeapon();
                    $accuracy = $weapon->getAccuracy();
                    $strength = $weapon->getStrength();
                    $life = $weapon->getLife();

                }


                    // //opponent stats;
                    // $opponent_weapon = $opponent->getWeapon();
                    //
                    // $opponent_accuracy = $opponent_weapon->getAccuracy();
                    // $opponent_strength = $opponent_weapon->getStrength();
                    // $opponent_life = $opponent_weapon->getLife();
                    // return $opponent_life = 0;
                    // $damage = ($strength / 2);
                    // $roll = rand(1, 6);
                    // //
                    // $accuracy += $roll;
                    //
                    // if ($accuracy >= 6) { //to hit;
                    //     $opponent_life -= $damage;
                    //     if ($opponent_life < 1) {
                    //         return "bye";
                    //     }
                    //     return $accuracy.' '.$opponent_life;
                    // }
                    //     if ($opponent_life <= 0 ) { //if player1 life
                    //         return "They're dead!  You win!";
                    //     }
                    //     return "A hit!  Opponent takes " . $damage . " damage.";
                    // } else { //miss;
                    //     return "You miss!";
                    // }

                // } else { //player1's turn
                //     $player = $_SESSION['player_stats'][1];
                //     $opponent = $_SESSION['player_stats'][2];
                //
                //     $weapon = $player->getWeapon();
                //     $accuracy = $weapon->getAccuracy();
                //     $strength = $weapon->getStrength();
                //     $life = $weapon->getLife();
                //
                //     //opponent stats;
                //     $opponent_weapon = $opponent->getWeapon();
                //     $opponent_accuracy = $opponent_weapon->getAccuracy();
                //     $opponent_strength = $opponent_weapon->getStrength();
                //     $opponent_life = $opponent_weapon->getLife();
                //     $damage = ($strength / 2);
                //
                //     $roll = rand(1, 6);
                //
                //     $accuracy += $roll;
                //
                //     if ($accuracy >=6) { //to hit;
                //         $opponent_life -= $damage;
                //         if ($life <= 0 ) { //if player1 life
                //             return "They're dead!  You win!";
                //         }
                //         return "A hit!  Opponent takes " . $damage  . " damage. " . $opponent_life . " hp remaining.";
                //     } else { //miss;
                //         return "You miss! " . $opponent_life . " hp remaining.";
                //     }
                // }
            // }


            //
            // //Heal function?!?
            //
            // public function heal(){
            //     $_SESSION['player_stats'][0] += 1;
            //     if ($_SESSION['player_stats'][0] % 2 == 0) { //player2
            //         $player = $_SESSION['player_stats'][2];
            //         $weapon = $player->getWeapon();
            //         $life = $weapon->getLife();
            //         $heal_roll = rand(1, 3);
            //         $life += $heal_roll;
            //
            //         return "You healed " . $heal_roll. " hp!" . $life  . " hp.";
            //     } else { //player1
            //         $player = $_SESSION['player_stats'][1];
            //         $weapon = $player->getWeapon();
            //         $life = $weapon->getLife();
            //         $heal_roll = rand(1, 3);
            //         $life += $heal_roll;
            //
            //         return "You healed " . $heal_roll . " hp! " . $life  . " hp.";
            //     }
            // }
            //
            // //SESSION STUFF;
            function save() {
                $new_stats =
                array_push($_SESSION['player_stats'], $this);
            }

            // function updateLife() {
            //     $player = Player::whoseTurn();
            //     $life = $player->getLife();
            //     //replace session's player life with updated player life
            //     return $_SESSION['player_stats']
            //
            //
            // }


            static function deleteAll() {
                $_SESSION['player_stats'] = [];
            }

            static function getAll() {
                return $_SESSION['player_stats'];
            }


        }


?>
