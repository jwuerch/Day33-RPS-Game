<?php
class Paper
    {
        private $strength;
        private $accuracy;
        private $life;
        private $name;

        public function __construct($strength = 2, $accuracy = 4, $life = 6, $name = "Paper") {
            $this->strength = $strength;
            $this->accuracy = $accuracy;
            $this->life = $life;
            $this->name = $name;
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
        public function setName($new_name) {
            $this->name = $new_name;
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
        public function getName() {
            return $this->name;
        }
    }

 ?>
