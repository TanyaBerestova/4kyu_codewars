<?php
function valid_solution(array $m): bool {
  $count = 9;  
  foreach($m as $element){
        foreach($element as $value){
            if (!$value){
                return false;
            }
        }
    }
    foreach($m as $row){
        if (count(array_unique($row)) != $count){
            return false;
        }
    }
    for ($i=0; $i < $count; $i++){
        $arr_t = array();
        for($j=0; $j < $count; $j++){
            $arr_t[] = $m[$j][$i];
        }
        if (count(array_unique($arr_t)) != $count){
            return false;
        }
    }
  
    for ($i=0; $i < $count; $i+=3){
        for ($j=0; $j < $count; $j+=3){
            $arr_t = array();
            for($k=0; $k < 3; $k++){
                for($l=0; $l<3; $l++){
                    $x = $i+$k;
                    $y = $j+$l;
                    $arr_t[] = $m[$x][$y];
                }
            }
            if (count(array_unique($arr_t)) != $count){
                return false;
            }
        }
        
    }
    
    return true;
}

print_r(valid_solution(
    [[5, 3, 4, 6, 7, 8, 9, 1, 2],
  [6, 7, 2, 1, 9, 5, 3, 4, 8],
  [1, 9, 8, 3, 4, 2, 5, 6, 7],
  [8, 5, 9, 7, 6, 1, 4, 2, 3],
  [4, 2, 6, 8, 5, 3, 7, 9, 1],
  [7, 1, 3, 9, 2, 4, 8, 5, 6],
  [9, 6, 1, 5, 3, 7, 2, 8, 4],
  [2, 8, 7, 4, 1, 9, 6, 3, 5],
  [3, 4, 5, 2, 8, 6, 1, 7, 9]
]));
?>
