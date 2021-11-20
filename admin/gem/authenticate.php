<?php

// ********** Authenticate *************

function authentication($fullName,$userName,$password){
    if(userName($userName)==1 && passs($password)==1){
        $result = insertData($fullName,$userName,$password);
        return $result;
    }else{
        if(userName($userName)==0){
            return "user";
        }else{
            return "pass";
        }
    }
}

function authentication_password($id,$current_pass,$new_pass,$confirm_pass){
    if(passs($confirm_pass)==1){
        $result = change_pass($id,$current_pass,$new_pass,$confirm_pass);
        return $result;
    }else{
        if(passs($confirm_pass)==0){
            return "invalid";
        }
    }
}

function authentication_login($username,$password){
    if(userName($username)==1 && passs($password)==1){
        $result = loginCheck($username,$password);
        return $result;
    }else{
        if(userName($username)==0){
            return "user";
        }else{
            return "pass";
        }
    }
}

function userName($par){
    if(strlen($par)>=15){
        return preg_match("/^[a-z].+@[a-z]+\.[a-z]{2,4}$/",$par);
    }else{
        return 0;
    }
}

function passs($par){
    if(strlen($par)>=10){
        return preg_match("/(?=.*[a-z])(?=.*[A-Z])(?=.*[\d])(?=.*(_|[^\w]))/",$par);
    }else{
        return 0;
    }
}

// Abcdefgnijk11!

?>