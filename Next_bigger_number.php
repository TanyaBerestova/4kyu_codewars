<?php
function nextBigger($n) {
 $arr = str_split((string) $n, 1);
 $arr1 = $arr; 
 $ind; $elem;
 arsort($arr1);
 if ((count(array_unique($arr)) == 1) || ($arr === $arr1)){
   return -1;
 }

 for ($i = count($arr)-1; $i > 0; $i--) {
  if($arr[$i]>$arr[$i-1]){
      $ind = $i-1;
      break;
    }
 }
 $arr1 = array_slice($arr, $ind);

 for ($i=$arr[$ind]+1; $i < 10; $i++){
  if (in_array($i, $arr1)){
      $elem = $i;
        unset($arr1[array_search($elem,$arr1)]);
        sort($arr1);
        break;
    }
 }
 
 $str = implode('', array_slice($arr, 0, $ind)).$elem.implode('',$arr1);
 return (int) $str;
}
?>
