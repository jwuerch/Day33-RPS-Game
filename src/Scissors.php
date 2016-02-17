<?php
class Scissors
    {
        private $strength;
        private $accuracy;
        private $life;

        public function __construct($strength = 4, $accuracy = 5, $life = 3) {
            $this->strength = $strength;
            $this->accuracy = $accuracy;
            $this->life = $life;
        }

        //setters;
        public function setStrength($new_strength) {
            $this->strength = $new_strength;
        }
        public function setAccuracy($new_accuracy) {
            $this->accuracy = $new_accuracy;
        }
        public function setLife($new_life) {
            $this->life = $new_life;
        }

        //getters;
        public function getStrength() {
            return $this->strength;
        }
        public function getAccuracy() {
            return $this->accuracy;
        }
        public function getLife() {
            return $this->life;
        }
    }

 ?>
