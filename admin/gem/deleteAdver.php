<?php

include_once("session.php");
include_once("dbFunction.php");
session_start();

// delete advertisement

    if(isset($_GET['id']) && isset($_GET['image_name'])){
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];
        if($image_name!=null){
            $delImg = unlink("../../img/adver/".$image_name);
            if($delImg!=1){
                setSession('delImg',"<div style='color:red; margin-bottom:20px;'>Image delete is not successful.</div>");
                header("Location:../advertisement.php?tag=adverTag");
                die();
            }
        }

        $result = deleteData($id,'tbl_advertisement');
        if($result==1){
            setSession('delImg',"<div style='color:green; margin-bottom:20px;'>Deleted successfully.</div>");
            header("Location:../advertisement.php?tag=adverTag");
        }

    }else{
        header("Location:../advertisement.php?tag=adverTag");
    }
?>