<?php

include_once("session.php");
include_once("dbFunction.php");
session_start();

// delete customer feedback

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $result = deleteData($id,'tbl_feedback');
        if($result==1){
            setSession('feedback_delete','<div style="color:green; margin-bottom:20px;">Delete successful.</div>');
            header("Location:../feedback.php?tag=customer");
        }
    }else{
        header("Location:../feedback.php?tag=customer");
    }
?>