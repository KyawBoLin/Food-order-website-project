<?php

// ************* Database function **************

define('IMG_URL',"http://localhost/Food%20order%20project/img/");
define('DB_HOST','localhost');
define('DB_NAME','food_order');
define('DB_USERNAME','root');
define('DB_PASSWORD','');

function dbConnect(){
    return mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
}

function errDebug($par){
    echo "<pre>".print_r($par,true)."</pre>";
}

function insertData($full_name,$username,$password){
    $db = dbConnect();
    $pass=pass($password);
    $qry = "SELECT * FROM tbl_admin WHERE username='$username'";
    $result = mysqli_query($db,$qry);
    if(mysqli_num_rows($result)==1){
        return "This email already registered.";
    }else{
        $qry = "INSERT INTO tbl_admin (full_name,username,password) VALUES ('$full_name','$username','$pass')";
        $result = mysqli_query($db,$qry);
        if($result==1){
            return "Register is successful.";
        }else{
            return "Register is unsuccessful.";
        }
    }
    
}

function getData($table){
    $db=dbConnect();
    $qry="SELECT * FROM $table";
    $result = mysqli_query($db,$qry);
    return $result;
}

function pass($password){
    $password = md5($password);
    $password = sha1($password);
    $password = crypt($password,$password);
    return $password;
}

function deleteData($id,$table){
    $db = dbConnect();
    $qry = "DELETE FROM $table WHERE id=$id";
    $result = mysqli_query($db,$qry);
    return $result;
}

function updateData($id,$fullName,$username){
    $db = dbConnect();
    $qry = "UPDATE tbl_admin SET full_name='$fullName', username='$username' WHERE id=$id";
    $result = mysqli_query($db,$qry);
    if($result == 1){
        return "ok";
    }else{
        return "not";
    }
}

function showData($id,$table){
    $db=dbConnect();
    $qry = "SELECT * FROM $table WHERE id=$id";
    $result = mysqli_query($db,$qry);
    return $result;
}

function change_pass($id,$current_pass,$new_pass,$confirm_pass){
    $db = dbConnect();
    $current_pass = pass($current_pass);
    $qry = "SELECT * FROM tbl_admin WHERE id=$id && password='$current_pass'";
    $result = mysqli_query($db,$qry);
    if(mysqli_num_rows($result)==1){
        if($new_pass == $confirm_pass){
            $confirm_pass = pass($confirm_pass);
            $qry1 = "UPDATE tbl_admin SET password='$confirm_pass' WHERE id=$id";
            $result1 = mysqli_query($db,$qry1);
            if($result1 == 1){
                return "ok";
            }else{
                return "not";
            }
        }else{
            return "Try again";
        }
    }else{
        return "current password wrong";
    }
}

function loginCheck($username,$password){
    $db=dbConnect();
    $password = pass($password);
    $qry="SELECT * FROM tbl_admin WHERE username='$username' && password='$password'";
    $result = mysqli_query($db,$qry);
    if(mysqli_num_rows($result)==1){
        return 'ok';
    }else{
        return 'not';
    }
}

// category 

function insertCategory($title,$new_image_name,$feature,$order){
    $db=dbConnect();
    $qry="INSERT INTO tbl_category (title,image_name,featured,active) VALUES ('$title','$new_image_name','$feature','$order')";
    $result = mysqli_query($db,$qry);
    if($result==1){
        return 'ok';
    }else{
        return 'not';
    }
}

function updateCategory($id,$title,$new_image_name,$feature,$order){
    $db = dbConnect();
    $qry = "UPDATE tbl_category SET title='$title', image_name='$new_image_name',featured='$feature',active='$order' WHERE id=$id";
    $result = mysqli_query($db,$qry);
    if($result ==1){
        return 'ok';
    }else{
        return 'not';
    }
}

// Manage Foods functions 

function foodCategory(){
    $db= dbConnect();
    $qry = "SELECT id,title FROM tbl_category WHERE featured='show'";
    $result = mysqli_query($db,$qry);
    return $result;
}

function foodInsert($title,$description,$price,$new_image_name,$type,$feature,$order){
    $db=dbConnect();
    $qry = "INSERT INTO tbl_food (title,description,price,image_name,category_id,featured,active) VALUES ('$title','$description','$price','$new_image_name','$type','$feature','$order')";
    $result = mysqli_query($db,$qry);
    if($result==1){
        return 'ok';
    }else{
        return 'not';
    }
}

function categoryId($id){
    $db=dbConnect();
    $qry="SELECT title FROM tbl_category WHERE id=$id";
    $result = mysqli_query($db,$qry);
    return $result;
}

function updateFood($id,$title,$description,$price,$new_image_name,$type,$feature,$order){
    $db = dbConnect();
    $qry = "UPDATE tbl_food SET title='$title',description='$description',price='$price',image_name='$new_image_name',category_id='$type',featured='$feature',active='$order' WHERE id=$id";
    $result = mysqli_query($db,$qry);
    if($result==1){
        return 'ok';
    }else{
        return 'not';
    }
}

// advertisement image upload 

function adverImgUpload($image_name,$featured){
    $db = dbConnect();
    $qry = "INSERT INTO tbl_advertisement (image_name,featured) VALUES ('$image_name','$featured')";
    $result = mysqli_query($db,$qry);
    if($result==1){
        return 'ok';
    }else{
        return 'not';
    }
}

function updateAdver($id,$image_name,$featured){
    $db = dbConnect();
    $qry = "UPDATE tbl_advertisement SET image_name='$image_name',featured='$featured' WHERE id=$id";
    $result = mysqli_query($db,$qry);
    if($result==1){
        return 'ok';
    }else{
        return 'not';
    }
}

// customer feedback

function updateFeedback($id,$message,$date,$feature){
    $db = dbConnect();
    $qry = "UPDATE tbl_feedback SET msg='$message',date='$date',featured='$feature' WHERE id=$id";
    $result = mysqli_query($db,$qry);
    if($result==1){
        return 'ok';
    }else{
        return 'not';
    }
}

function getFeedback(){
    $db=dbConnect();
    $qry="SELECT * FROM tbl_feedback WHERE featured='show'";
    $result = mysqli_query($db,$qry);
    return $result;
}

// FAQ

function insertFaq($question,$answer,$type){
    $db = dbConnect();
    $qry = "INSERT INTO tbl_faq (question,answer,type) VALUES ('$question','$answer','$type')";
    $result = mysqli_query($db,$qry);
    if($result==1){
        return "ok";
    }else{
        return "not";
    }
}

function updateFaq($id,$question,$answer,$type){
    $db = dbConnect();
    $qry = "UPDATE tbl_faq SET question='$question',answer='$answer',type='$type' WHERE id=$id";
    $result = mysqli_query($db,$qry);
    if($result==1){
        return 'ok';
    }else{
        return 'not';
    }
}

function getFaq($type,$table){
    $db=dbConnect();
    $qry = "SELECT * FROM $table WHERE type=$type";
    $result = mysqli_query($db,$qry);
    return $result;
}

// join with tbl_order and tbl_food_order for order

function orderData(){
    $db=dbConnect();
    $qry = "SELECT * FROM tbl_order o,tbl_food_order f WHERE o.customer_name = f.customer_name";
    $result = mysqli_query($db,$qry);
    return $result;
}

function order($data){
    $db=dbConnect();
    $qry = "SELECT * FROM tbl_food_order WHERE status='$data'";
    $result = mysqli_query($db,$qry);
    return $result;
}

function saleAmount(){
    $db=dbConnect();
    $qry = "SELECT SUM(total) AS Total FROM tbl_sale WHERE status='Delivered'";
    $result = mysqli_query($db,$qry);
    return $result;
}
function status($status,$id){
    $db=dbConnect();
    $qry = "UPDATE tbl_food_order SET status='$status' WHERE customer_name='$id'";
    $result = mysqli_query($db,$qry);
    return $result;
}

function getStatusData($id){
    $db=dbConnect();
    $qry = "SELECT * FROM tbl_food_order WHERE customer_name='$id'";
    $result = mysqli_query($db,$qry);
    return $result;
}

function orderDataDelete($name){
    $db=dbConnect();
    $qry="DELETE FROM tbl_order WHERE customer_name='$name'";
    $result = mysqli_query($db,$qry);
    if($result==1){
        return 'ok';
    }else{
        return 'not';
    }
}

function orderDataDelete2($name){
    $db=dbConnect();
    $qry="DELETE FROM tbl_food_order WHERE customer_name='$name'";
    $result = mysqli_query($db,$qry);
    if($result==1){
        return 'ok';
    }else{
        return 'not';
    }
}

// sale table

function getDataSale(){
    $db= dbConnect();
    $qry = "SELECT * FROM tbl_sale WHERE status='Delivered'";
    $result = mysqli_query($db,$qry);
    return $result;
}

function saleStatus($status,$name){
    $db=dbConnect();
    $qry = "UPDATE tbl_sale SET status='$status' WHERE customer='$name'";
    $result = mysqli_query($db,$qry);
    return $result;
}

// expense table

function getCost($cost,$table){
    $db=dbConnect();
    $qry = "SELECT * FROM $table WHERE status='$cost'";
    $result = mysqli_query($db,$qry);
    return $result;
}

function insertCost($about,$cost,$date,$status){
    $db= dbConnect();
    $qry = "INSERT INTO tbl_expense (about,cost,date,status) VALUES ('$about','$cost','$date','$status')";
    $result = mysqli_query($db,$qry);
    if($result==1){
        return 'ok';
    }else{
        return 'not';
    }
}

function getCostUpdate($id){
    $db=dbConnect();
    $qry = "SELECT * FROM tbl_expense WHERE id=$id";
    $result = mysqli_query($db,$qry);
    return $result;
}

function updateCost($id,$about,$cost,$date,$status){
    $db= dbConnect();
    $qry = "UPDATE tbl_expense SET about='$about',cost='$cost',date='$date',status='$status' WHERE id=$id";
    $result = mysqli_query($db,$qry);
    if($result==1){
        return "ok";
    }else{
        return "not";
    }
}

// profit

function profit($total,$table){
    $db=dbConnect();
    $qry = "SELECT SUM($total) AS Total FROM $table WHERE status='Delivered'";
    $result = mysqli_query($db,$qry);
    return $result;
}

function profitExpense($total,$table){
    $db=dbConnect();
    $qry = "SELECT SUM($total) AS Total FROM $table";
    $result = mysqli_query($db,$qry);
    return $result;
}

function insertProfit($month,$sale,$expense,$profit,$year){
    $db= dbConnect();
    $qry = "INSERT INTO tbl_profit (months,sale,expense,profit,year) VALUES ('$month','$sale','$expense','$profit','$year')";
    $result = mysqli_query($db,$qry);
    if($result==1){
        return 'ok';
    }else{
        return 'not';
    }
}

function checkMonth($month,$sale,$expense,$profit,$year){
    $db = dbConnect();
    $qry = "UPDATE tbl_profit SET months='$month',sale='$sale',expense='$expense',profit='$profit',year='$year' WHERE months='$month'";
    $result = mysqli_query($db,$qry);
    return $result;
}

function getDataProfit($month){
    $db=dbConnect();
    $qry = "SELECT months FROM tbl_profit WHERE months='$month'";
    $result = mysqli_query($db,$qry);
    return $result;
}

function updateStatus($id,$status){
    $db=dbConnect();
    $qry = "UPDATE tbl_profit SET status='$status' WHERE id='$id'";
    $result = mysqli_query($db,$qry);
    return $result;
}

function getMonthProfit($status){
    $db=dbConnect();
    $qry = "SELECT * FROM tbl_profit WHERE status='$status'";
    $result = mysqli_query($db,$qry);
    return $result;
}

// customer message 

function dateCU(){
    date_default_timezone_set("Asia/Rangoon");
    $date = date("F j, Y \a\\t g:i a",time());
    return $date;
}
function updateReply($id){
    $db = dbConnect();
    $status = "replyed";
    $date = dateCU();
    $qry = "UPDATE tbl_message SET date='$date',status='$status' WHERE id='$id'";
    $result = mysqli_query($db,$qry);
    return $result;
}

function getMessage(){
    $db=dbConnect();
    $qry = "SELECT * FROM tbl_message WHERE status='new'";
    $result = mysqli_query($db,$qry);
    return $result;
}
?>