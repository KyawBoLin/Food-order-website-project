<?php
    // Database connection

    define("IMG_URL","http://localhost/Food%20order%20project/img/");
    define("DB_HOST","localhost");
    define("DB_NAME","food_order");
    define("DB_USERNAME","root");
    define("DB_PASSWORD","");

    function dbConnect(){
        $result = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
        return $result;
    }

    function errorDebug($data){
        $result = "<pre>".print_r($data,true)."</pre>";
        return $result;
    }

    function getData($table){
        $db = dbConnect();
        $qry = "SELECT * FROM $table WHERE featured='show'";
        $result=mysqli_query($db,$qry);
        if(mysqli_num_rows($result)==0){
            echo "Not items found!";
        }
        return $result;
    }

    function dateCU(){
        date_default_timezone_set("Asia/Rangoon");
        $date = date("F j, Y \a\\t g:i a",time());
        return $date;
    }

    function feedbackMsg($msg){
        $date=dateCU();
        $featured="show";
        $db = dbConnect();
        $qry="INSERT INTO tbl_feedback (msg,date,featured) VALUES ('$msg','$date','$featured')";
        $result = mysqli_query($db,$qry);
        if($result>0){
            return "ok";
        }else{
            return "not";
        }
    }

    function getFeedbackData($table){
        $db = dbConnect();
        $qry = "SELECT * FROM $table WHERE featured='show' ORDER BY id DESC";
        $result=mysqli_query($db,$qry);
        if(mysqli_num_rows($result)==0){
            echo "Not items found!";
        }
        return $result;
    }

    // get data faq

    function getFaq($type,$table){
        $db=dbConnect();
        $qry = "SELECT * FROM $table WHERE type=$type";
        $result = mysqli_query($db,$qry);
        return $result;
    }

    // get data for food search

    function getFoodSearch($id,$table){
        $db=dbConnect();
        $qry = "SELECT * FROM $table WHERE category_id=$id";
        $result = mysqli_query($db,$qry);
        return $result;
    }

    // search data for search

    function searchFood($search){
        $db=dbConnect();
        $qry = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
        $result = mysqli_query($db,$qry);
        return $result;
    }

    // user information 

    function userInfo($name,$contact,$email,$address){
        $db=dbConnect();
        $qry = "INSERT INTO tbl_order (customer_name,customer_contact,customer_email,customer_address) VALUES ('$name','$contact','$email','$address')";
        $result = mysqli_query($db,$qry);
        if($result>0){
            return "ok";
        }else{
            return "not";
        }
    }

    function getFood($id){
        $db=dbConnect();
        $qry = "SELECT * FROM tbl_food WHERE id=$id";
        $result = mysqli_query($db,$qry);
        return $result;
    }

    // get food for final order

    function getFoodFinal($name){
        $db=dbConnect();
        $qry = "SELECT * FROM tbl_food_order WHERE customer_name='$name'";
        $result = mysqli_query($db,$qry);
        return $result;
    }

    // insert data to database and add cart

    function cart($name,$image,$title,$price,$quantity,$total){
        $date = dateCU();
        $status = "Ordered";
        $db = dbConnect();
        $qry = "INSERT INTO tbl_food_order (customer_name,food_title,image,price,quantity,total,order_date,status) VALUES ('$name','$title','$image',$price,$quantity,$total,'$date','$status')";
        $result = mysqli_query($db,$qry);
        if($result>0){
            return "ok";
        }else{
            return "not";
        }
    }

    // delete cart

    function deleteCart($id){
        $db=dbConnect();
        $qry = "DELETE FROM tbl_food_order WHERE id=$id";
        $result = mysqli_query($db,$qry);
        if($result==1){
            return "ok";
        }else{
            return "not";
        }
    }

    // sale table

    function saleTable($name,$title,$price,$quantity,$total){
        $date = dateCU();
        $status="Ordered";
        $db=dbConnect();
        $qry="INSERT INTO tbl_sale (customer,food_title,price,quantity,total,order_date,status) VALUES ('$name','$title',$price,$quantity,$total,'$date','$status')";
        $result=mysqli_query($db,$qry);
        return $result;
    }

    // customer message 

    function customerMessage($username,$email,$number,$title,$content){
        $date=dateCU();
        $status = "new";
        $db=dbConnect();
        $qry = "INSERT INTO tbl_message (username,email,number,title,content,date,status) VALUES ('$username','$email','$number','$title','$content','$date','$status')";
        $result = mysqli_query($db,$qry);
        if($result==1){
            return 'ok';
        }else{
            return 'not';
        }
    }
?>