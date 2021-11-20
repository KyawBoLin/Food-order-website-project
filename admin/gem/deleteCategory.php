<?php

include_once("session.php");
include_once("dbFunction.php");
session_start();

// Delete category

if(isset($_GET['id']) && isset($_GET['image_name'])){
    $id = $_GET['id'];
    $img=$_GET['image_name'];
    if($img!=null){
        $imgDel = unlink('../../img/category/'.$img);
        if($imgDel!=1){
            setSession('removeImg',"<div style='color:red; margin-bottom:20px;'>Image delete is not successful.</div>");
            header('Location:../category.php?tag=category');
            die();
        }
    }
    
    $result = deleteData($id,'tbl_category');
    if($result==1){
        setSession('delete_category','<div style="color:green; margin-bottom:20px;">Delete successful.</div>');
        header('Location:../category.php?tag=category');
    }else{
        return;
    }
}else{
    header('Location:../category.php?tag=category');
}

?>