<?php

    class vechile{
       private $engine;
       private $tyre;
       private $headlight;
       private $seat;

        function __construct($engine,$tyre,$headlight){
            $this->engine = $engine;
            $this->tyre = $tyre;
            $this->headlight = $headlight;
        }


        public function getengine(){
            return $this -> engine;
        }

        public function setengine($engine){
            $this -> engine = $engine;
        }

        public function gettyre(){
            return $this -> tyre;
        }

        public function settyre($tyre){
            $this -> tyre = $tyre;
        }
        public function getheadlight(){
            return $this -> headlight;
        }

        public function setheadlight($headlight){
            $this -> headlight = $headlight;
        }
        
        public function getseat(){
            return $this -> seat;
        }

        public function setseat($seat){
            $this -> seat = $seat;
        }

        function __destruct(){
            echo $this->engine." destructor <br/>";
        }

    }

    $honda = new vechile("4stroke","MRF","oval headlight");

    echo $honda->getengine()."<br/>";
    echo $honda->gettyre()."<br/>";
    echo $honda->getheadlight()."<br/>";

?>