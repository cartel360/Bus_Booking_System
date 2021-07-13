<?php
session_start();

if ($_POST) {
    //beginning with collecting all
    $order = $_SESSION['ORDERREF'];
    //$id = $_REQUEST['eid'];   
    $destination = $_POST['d'];
    $travelclass = $_POST['tc'];
    $seats = $_POST['s'];
    $traveldate = $_POST['td'];
    //secondpage
    $fullname = $_POST['f'];
    $contact = $_POST['c'];
    $gender = $_POST['g'];
    //payment
    $amount = $_POST['a'];
    $code = $_POST['code'];
    $paymethod = $_POST['p'];
    $bus_id = $_POST['bus'];
    //Order Reference


    //PROCESSING TICKET RESERVATIN
    $message = "";
    //checking received transaction Id	
    require("dbengine/dbconnect.php");

    //Validating Transaction Id  #We are not Validating coz we dont have a paybill  
    $checkcode = mysqli_query($conn, "SELECT transaction_id FROM booking_details WHERE transaction_id='$code'");
    if ((!$checkcode) || (mysqli_num_rows($checkcode) > 0)) {
        $message .= "The Transaction Code #$code Received has already been used, enter a valid code that has not been used. ";
    }
    //Empty Fields and empty dta    
    if ((empty($order)) || (empty($destination)) || (empty($travelclass)) || (empty($seats)) || (empty($fullname)) || (empty($amount)) || (empty($code)) || (empty($paymethod))) {
        $message .= " One of the required fields was not provided, re-check inputs then try again. ";
    }

    //Redundancy Reference No   
    $checkcode = mysqli_query($conn, "SELECT order_ref FROM booking_details WHERE order_ref='$order'");
    if ((!$checkcode) || (mysqli_num_rows($checkcode) > 0)) {
        $message .= "The Order Reference #$order Received belongs to another customer, Click <a href='index.php'>here</a> to generate another one. ";
    }

    // $update=mysqli_query($conn,"UPDATE trains SET booked_seats=:(seats + 1) WHERE id = $order' ");  
    // if((!$update)) {    
    // $message.="Seats not updated / Not Added. ";     
    // }   


    //ending
    if (empty($message)) {
        $bus_query = mysqli_query($conn, "UPDATE trains SET booked_seats = booked_seats + $seats WHERE id = '$bus_id' ");
        $insertdata = mysqli_query($conn, "INSERT into booking_details (order_ref,fullname,EmailId,gender,class_reserved,destination,seats_reserved,date_reserved,transaction_id,account,amount) VALUES('$order','$fullname','$contact','$gender','$travelclass','$destination','$seats','$traveldate','$code','$paymethod','$amount')");
        if ($insertdata && $bus_query) {
            $message = "success";
        } else {
            $message = "Could not post details or update transaction status!";
        }
    }

    //finaly
    echo $message;
}
?>
<?php

?>