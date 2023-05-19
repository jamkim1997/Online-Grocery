<?php

if(!isset($_COOKIE['totalPrice'])){
    setcookie("totalPrice", "0",time()+30*24*60*60);
}

if(!isset($_COOKIE['totalNum'])){
    setcookie("totalNum", "0",time()+30*24*60*60);
}

if($_POST['function'])
{
    $function_name = $_POST['function'];
    switch($function_name){
        case 'Clear' : clear(); break;
    }
}

function clear(){
    $selected_item = array(
    );
    
    setcookie("totalPrice", "", time()-3600);
    setcookie("totalNum", "", time()-3600);
    setcookie('selectedItems', '', time() - 3600);
}

?>