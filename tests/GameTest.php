<?php
    require_once 'src/Player.php';
    require_once 'src/Paper.php';
    require_once 'src/Rock.php';
    require_once 'src/Scissors.php';
    session_start();
    if(empty($_SESSION['player_stats'])) {
        $_SESSION['player_stats'] = array(2);
    }

    class GameTest extends PHPUnit_Framework_TestCase {

        function test_Create_New_Player() {
            $rock = new Rock();
            $paper = new Paper();
            $scissors = new Scissors();

            //Arrange;
            $new_Player = new Player('Marika', 25, $rock);
            $name = $new_Player->getName();
            $age = $new_Player->getAge();
            $weapon = $new_Player->getWeapon();
            $new_Player->save();

            //Act;
            $result = [$name, $age, $weapon];

            //Assert;
            $this->assertEquals(['Marika', 25, $rock], $result);
        }

        function test_Create_New_Rock() {

            //Arrange;
            $new_rock = new Rock();
            $strength = $new_rock->getStrength();
            $accuracy = $new_rock->getAccuracy();
            $life = $new_rock->getLife();
            //Act;
            $result = [$strength, $accuracy, $life];

            //Assert;
            $this->assertEquals([6, 2, 4], $result);

        }

        function test_Create_New_Paper() {

            //Arrange;
            $new_paper = new Paper();
            $strength = $new_paper->getStrength();
            $accuracy = $new_paper->getAccuracy();
            $life = $new_paper->getLife();
            //Act;
            $result = [$strength, $accuracy, $life];

            //Assert;
            $this->assertEquals([2, 4, 6], $result);

        }

        function test_Create_New_Scissors() {

            //Arrange;
            $new_scissors = new Scissors();
            $strength = $new_scissors->getStrength();
            $accuracy = $new_scissors->getAccuracy();
            $life = $new_scissors->getLife();
            //Act;
            $result = [$strength, $accuracy, $life];

            //Assert;
            $this->assertEquals([4, 5, 3], $result);

        }
        //
        // function test_Player_One_Attacks() {
        //     //Arrange
        //     $rock = new Rock();
        //     $paper = new Paper();
        //     $scissors = new Scissors();
        //     $player1 = new Player('Marika', 25, $rock);
        //     $player2 = new Player('Jason', 25, $paper);
        //     $player1->save();
        //     $player2->save();
        //     //Act
        //     $result = $player1->attack();
        //     //Assert
        //     $this->assertEquals("You miss!", $result);
        // }
        //
        // function test_Player_Two_Attacks() {
        //     //Arrange
        //     $rock = new Rock();
        //     $paper = new Paper();
        //     $scissors = new Scissors();
        //     $player1 = new Player('Marika', 25, $rock);
        //     $player2 = new Player('Jason', 25, $paper);
        //     $player1->save();
        //     $player2->save();
        //     //Act
        //     $_SESSION['player_stats'][0] += 1;
        //     $result = $player2->attack();
        //     //Assert
        //     $this->assertEquals("You miss!", $result);
        // }

        // function test_Player_One_Heal() {
        //     //Arrange
        //     $rock = new Rock();
        //     $player1 = new Player('Marika', 25, $rock);
        //     $player1->save();
        //     //Act
        //
        //     $result = $player1->heal();
        //     //Assert
        //     $this->assertEquals("You healed 3 hp!", $result);
        // }
        //
        // function test_Player_Two_Heal() {
        //     //Arrange
        //     $rock = new Rock();
        //     $paper = new Paper();
        //     $scissors = new Scissors();
        //     $player1 = new Player('Marika', 25, $rock);
        //     $player2 = new Player('Jason', 25, $paper);
        //     $player1->save();
        //     $player2->save();
        //     //Act
        //     $_SESSION['player_stats'][0] += 1;
        //     $result = $player2->heal();
        //     //Assert
        //     $this->assertEquals("You healed 3 hp!", $result);
        // }

        function test_Player_Two_Turn() {
            //Arrange
            $rock = new Rock();
            $paper = new Paper();
            $scissors = new Scissors();
            $player1 = new Player('Marika', 25, $rock);
            $player2 = new Player('Jason', 25, $paper);
            $player1->save();
            $player2->save();
            //Act
            $result = Player::playerTurn();

            //Assert
            $this->assertEquals("It's Jason's turn", $result);
        }

        function test_Player_One_Turn() {
            //Arrange
            $rock = new Rock();
            $paper = new Paper();
            $scissors = new Scissors();
            $player1 = new Player('Marika', 25, $rock);
            $player2 = new Player('Jason', 25, $paper);
            $player1->save();
            $player2->save();
            //Act
            $_SESSION['player_stats'][0] += 1;
            $result = Player::playerTurn();

            //Assert
            $this->assertEquals("It's Marika's turn", $result);
        }
    }
 ?>
