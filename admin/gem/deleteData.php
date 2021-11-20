<?php

include_once("session.php");
include_once("dbFunction.php");
session_start();

// Delete data 
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = deleteData($id,'tbl_admin');
    if($result==1){
        setSession('delete','<div style="color:green; margin-bottom:20px;">Delete successful.</div>');
        header('Location:../manage.php?tag=admin');
    }else{
        return;
    }
}else{
    header('Location:../manage.php?tag=admin');
}

?>