<?php 
  function data_br($data){
    //2018-06-26
    $data = explode('-', $data);
    // array([0] => 2018 , [1] => 06 , 26)
    $data = array_reverse($data);
    $data = implode('/',$data );
    return $data;
}
?>