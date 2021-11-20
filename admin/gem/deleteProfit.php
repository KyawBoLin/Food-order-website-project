<?php

include_once("session.php");
include_once("dbFunction.php");
session_start();

// Delete Profit data from get method

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $showResult = showData($id,'tbl_profit');
    if(mysqli_num_rows($showResult)==0){
        header("Location:../profit.php?tag=revenue");
    }
    $deleteResult= deleteData($id,'tbl_profit');
    if($deleteResult==1){
        setSession('deleteProfit',"<div style='color:green; margin-bottom:20px;'>Delete successful.</div>");
        header("Location:../profit.php?tag=revenue");
    }else{
        setSession('deleteProfit',"<div style='color:red; margin-bottom:20px;'>Delete unsuccessful.</div>");
        header("Location:../profit.php?tag=revenue");
    }
}else{
    header("Location:../profit.php?tag=revenue");
}