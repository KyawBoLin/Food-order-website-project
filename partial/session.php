<?php

function setSession($key,$value){
    return $_SESSION[$key]=$value;
}

function checkSession($key){
    return isset($_SESSION[$key]);
}

function destroySession(){
    return session_destroy();
}

function unsetSession($key){
    unset($_SESSION[$key]);
}
?>