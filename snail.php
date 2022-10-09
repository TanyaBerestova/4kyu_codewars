function snail($matrix){
  $arr = array();
  while (true){
    for ($i=0; $i<count($matrix[0]);$i++){
      $arr[]=$matrix[0][$i];
    }
    unset($matrix[0]);
    if (count($matrix) == 0){
      break;
    }
    $matrix = array_values($matrix);
    $matrix = rotation_m($matrix);
  }
  return $arr;   
}

function rotation_m($matrix){
  $height = count($matrix);
  $width = count($matrix[0]);
  if($height == $width){
    $step = 1;
  } else {
    $step = 0;
  }
  $new_matrix;
  for($i=0; $i < $width; $i++){
      for($j = 0; $j < $height; $j++){
          $new_matrix[$i][$j] = $matrix[$j][$height-$step-$i];
        }
    }
    return $new_matrix;
}
