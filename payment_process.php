<?php
    session_start();
    include('db.php');
    date_default_timezone_set("Asia/Kolkata");
//    use Razorpay\Api\Api;
//        $api = new Api($api_key, $api_secret);
    if (isset($_POST['amt']) && isset($_POST['name']) && isset($_POST['desc'])){
        $amt = $_POST['amt'];
        $name = $_POST['name'];
        $desc = $_POST['desc'];
        $payment_status = "Pending";
        $added_on = date('Y-m-d h:i:s');
        mysqli_query($conn,"insert into Payment(Name, Amount, Payment_Status, Added_On, Description) values('$name', '$amt', '$payment_status', '$added_on', '$desc')");
        $_SESSION['OID']=mysqli_insert_id($conn);
    }
    
    if (isset($_POST['payment_id']) && isset($_SESSION['OID'])){
        $payment_id = $_POST['payment_id'];
        $added_on = date('Y-m-d h:i:s');
        mysqli_query($conn,"update Payment set Payment_Status='Complete', Payment_ID='$payment_id', Added_On='$added_on' where ID='".$_SESSION['OID']."'");
    }
?>