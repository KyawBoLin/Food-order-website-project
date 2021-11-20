<?php

    include_once('dbFunction.php');
    include_once('session.php');
    session_start();

    // Delete food

    if(isset($_GET['id']) && isset($_GET['image'])){
        $id= $_GET['id'];
        $image=$_GET['image'];
        if($image!=null){
            $imgDel = unlink("../../img/food/".$image);
            if($imgDel!=1){
                setSession('removeImg',"<div style='color:red; margin-bottom:20px;'>Image delete is not successful.</div>");
                header('Location:../food.php?tag=food');
                die();
            }
        }
        
        $result = deleteData($id,'tbl_food');
        if($result==1){
            setSession('delete_food','<div style="color:green; margin-bottom:20px;">Delete successful.</div>');
            header('Location:../food.php?tag=food');
        }else{
            return;
        }
    }else{
        header("Location:../food.php?tag=food");
    }
?>