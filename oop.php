<?php 
    class car {
        // properties
        public $color;

        public $model;
        public $name;
        public $speed;
        private $engine = "V8";
        private $justforme = "private info";
        // methods/functions
        public function __construct($color, $model, $name, $speed = 100) {
            $this->color = $color;
            $this->model = $model;
            $this->name = $name;
            $this->speed = $speed;
            echo "The car is runing on ".$this->engine;  
        }

        public function move_car() {
            // $speed = 100;
            return "The car is moving at " . $this->speed;
        }

        protected function stop_car() {
            return "The car is stopped";
        }

        function __destruct() {
            echo $this->stop_car();
        }
        
    }

    $car1 = new car("red", "BMW", "X5");
    // $car1->speed = 200;
    // echo $car1->engine; // error because engine is private
    echo $car1->move_car();
    echo "<br>";
    $bike = new bike("blue", "Yamaha", "R15", 150);
    //echo $car1->stop_car(); // error because stop_car is protected
    $bike->bike_stop();
    class bike extends car {
        
        public function bike_stop() {
            return $this->stop_car();
        }
    }