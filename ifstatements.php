<?php
//    if(1 === "1") {
//     echo "This is true";
//    } elseif(1 !== "1") {
//     echo "This is true 1 is 1";
//    }

   echo (1 === "1") ? "This is true" : "This is false";
   echo (1 === "1") ? "This is true" : ((1 === "1") ? "This is true" : "This is false");
    echo "<hr>";
    if( 2 < 5) echo "2 is less than 5";
?>