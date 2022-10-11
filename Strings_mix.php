<?php
function mix($s1, $s2) {
    $arr1 = str_to_arr($s1);
    $arr2 = str_to_arr($s2);
    $m_arr = array_merge($arr1, $arr2);
    $arr = array();
    foreach($m_arr as $key=>$value){
        if (substr_count($s1, $key) > substr_count($s2, $key)){
            $arr[]= '1:'.str_repeat($key, substr_count($s1, $key));
        } else if (substr_count($s1, $key) < substr_count($s2, $key)){
            $arr[]= '2:'.str_repeat($key, substr_count($s2, $key));
        } else {
            $arr[].= '=:'.str_repeat($key, $value);
        }
    }
    array_multisort(array_map('strlen', $arr), $arr, SORT_DESC);
    return implode('/', array_reverse($arr));  
}
  
function str_to_arr($str){
    $arr = count_chars(preg_replace('/[^a-z]/', '', $str), 1);
    $arr1 = array_filter($arr, function($n) {if ($n > 1) return $n;});
    $new_arr = array();
    foreach ($arr1 as $key=>$value){
        $new_arr[chr($key)] = $arr1[$key];
    }
    return $new_arr;
}
?>
