<?php
function determinant(array $matrix): int {
  $count = count($matrix[0]);
  if ($count == 1){
    return (int) $matrix[0][0];
  }
  if ($count == 2){
    return (int) $matrix[0][0]*$matrix[1][1]-$matrix[0][1]*$matrix[1][0];
  } else {
    $sign;
    $det = 0;
    for($i=0; $i < $count; $i++){
      if ($i % 2){
          $sign = -1;
        } else {
          $sign = 1;
        }
      $det += $matrix[0][$i]*determinant(get_minor($matrix, 0, $i))*$sign;
    }
    return (int) $det;
  }
}

function get_minor($matrix, $r, $c){
  $new_matrix = array();
  $count = count($matrix[0]);
  for($i=0; $i< $count;$i++){
      for($j=0; $j< $count;$j++){
        if ($i != $r && $j != $c){
              $new_matrix[$i][] = $matrix[$i][$j];
            }
      }
    }
    return array_values($new_matrix);
}
?>
