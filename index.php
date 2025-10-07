<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>SEYI CLASS</h1>
    <?php 
        // This is a single-line comment in PHP
        /* This is a 
           multi-line comment in PHP */
       print "<h1>Hello World</h1>"."<p>This is a paragraph</p>"."<hr>";
       $string = "This is a string";
       $integer = 7;
       $float = 3.1;
       $boolean = true;
       $array_type_1 = array("apple", "banana", "cherry");
       $array_type_2 = ["dog", "cat", "mouse"];
    
       
        $result = addition($integer, $float);

      function addition($num1, $num2 = 90, $num3 = 0){
          return $num1 + $num2;
          echo "The sum is: ";
      }

      function above18($age) {
        if($age < 18) return "You are not above 18";
        echo "Take your Gun.";
      }
      // echo above18("God");

      // echo "<br>";
      // echo addition(89);

      // // math in php
      // // pi
      // echo "<br>";  
      // echo "PIE: ". pi();
      // echo "<br>";
      // // min and max 
      // echo "MIN: ". min(0, 150, 30, 20, -8, -200);
      // echo "<br>";
      // echo "MAX: ". max(0, 150, 30, 20, -8, -200);
      // // squre root
      // echo "<br>";
      // echo "SQUARE ROOT: ". sqrt(64);
      // //  you will often use this maths
      // echo "<br>";
      // // round up a number
      // echo "Rounded 7.4 to: ".round(7.4);
      // echo "<br>";
      // // generate a random number
      // echo "Random number between 1 and 100: ".rand(1, 100);
      // echo "<br>";
      // echo "Genarente unqiue ID: ". uniqid("user/");
      // echo "<br>";
      // echo "Our Genarente unqiue ID: ". unqid("user/");

      function unqid($prifex) {
        return $prifex.rand(100, 1000);
      }

      // constant in php
      define("IP", "10.9.9.373"); // first method to define constant variable
      const DB_NAME = "my_database"; // second method to define constant variable
      echo "<br>";
      echo "The IP address is: ".IP;
      echo "<br>";
      echo "The Database name is: ".DB_NAME;
      echo "<hr>";
      function accessVar() {
        echo DB_NAME;
        // $string = "This is a string in a function.";
        // echo $string; // this will throw an error because the variable is out of scope
      }
      accessVar();
      echo "<br>";
     echo "My dirctory: ". __DIR__;
     echo "<br>";
     echo "My dirctory and file name: ". __FILE__;
      
     echo "<br>";
    //  php operators 
    $x = "5"; $y =5; 
    //$x += $y; // addition
    // echo $x;
    // comparison
    var_dump($x != $y);
    // increment operators
    echo "<br>";
     $z = $y++;
    echo $z;
    echo $y;
    
    $y = 5;
    echo "<br>";
    $z = --$y;
    echo $z;
    echo $y;
    // Logical Operators

    $fullname = "Erinfolami";
    $fullname .= " Seyi"; // concatenation assignment
    $fullname .= " Olalekan";
    echo "<br>";
    echo $fullname;
    echo "<br>";
    // Conditional Assignment Operators
    $myage = 10;
    $age = $myage ?? 20;
    echo $age;
    echo "<br>";
    $mature = ($age > 18) ? "mature" : "baby";
    echo $mature;
    ?>
</body> 
</html>