<?php

class NumPer {

    //Limit number to find perfect numbers below
    private int $numLim;

    public function __construct(int $numLim)
    {
        $this->numLim = $numLim;        
    }

    //Returns de list of perfect numbers below $numLim
    public function findNumPer(): array {

        $numPerList = [];
        for ($x = 6; $x <= $this->numLim; $x++) {
            $list = [];
            $sum = 0;
            $list = $this->divisors($x);
            for ($i = 0; $i < count($list); $i++) {
                $sum += $list[$i];                
            }
            if ($sum == $x) {
                $numPerList[] = [$x, $list];
            }
        }

        return $numPerList;

    }
    //Returns de list of divisors of $num
    private function divisors(int $num): array {

        $list = [1];
        for ($i = 2; ($i * $i) <= $num; $i++) {
            if ($num % $i == 0) {
                $list[] = $i;
                $list[] = $num / $i;
            }
        } 
        sort($list);
        return $list;
        }        

}