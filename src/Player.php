<?php
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
