<?php

include "NumPer.php";

//Asks the user to input the limit number in order to find perfect numbers below it
do {
    $limNum = readline("Input a limit number >= 6 (will find perfect numbers below that number): ");
} while ((filter_var($limNum, FILTER_VALIDATE_INT) == false) || $limNum < 6);

$numPerList = new NumPer($limNum);
$list = $numPerList->findNumPer();

echo PHP_EOL . "This is the list of perfect numbers below $limNum:" . PHP_EOL;
showTheList($list);


function showTheList(array $list): void {

    foreach ($list as $num) {
        echo $num[0] . " -> (Divisors: ";
        $divisors = "";
        foreach ($num[1] as $div) {
            $divisors = $divisors . $div . "+";
        }
        $divisors = substr($divisors, 0, -1);
        $divisors = $divisors . " = $num[0])";
        echo $divisors;
        echo PHP_EOL;
    }
}

?>
