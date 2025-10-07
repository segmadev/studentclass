<?php
$variable = "value2";
 switch ($variable) {
    case 'value':
        //  run code for value
        echo "value block";
        break;
    
    case 'value2':
        echo "value2 block";
    break;
    default:
        // run default value
         echo "default block";
        break;
 }

 function credit_debit($action){
    switch ($action) {
        case 'credit':
            # code...
            echo ":credit block";
            break;
        case 'debit':
            # code...
           echo  "debit block";
            break;
        default:
            # code...
            break;
    }
 }

 credit_debit('debit');
 ?>

<h1><?php echo $variable ?></h1>
<h1><?=$variable?></h1>