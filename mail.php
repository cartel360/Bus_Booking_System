<p>WESTERN TRAIN BOOKINGS </p>

<?php

   
   session_start();

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  use PHPMailer\PHPMailer\SMTP;

  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';

   /* Exception class. */
   $rand_id = rand();

   $train_id = $_REQUEST['the_id'];

   $fname = $_REQUEST['fname'];
   $lname = $_REQUEST['lname'];
   $tdate = $_REQUEST['tdate'];
   $departure = $_REQUEST['departure'];
   $destination = $_REQUEST['destination'];
   $time = $_REQUEST['time'];
   $email = $_REQUEST['email'];
   //$final_price = $_REQUEST['total'];

  // echo $final_price;


   $form_data = array("fname" => $fname, "lname" => $lname, "tdate" => $tdate, "departure" => $departure, "destination" => $destination, "email"=>$email, "time"=>$time);

   $message = "Dear " . $form_data['fname'] . "\r\n";
   $message .=" " .$form_data['lname'] . ",\r\n"; 
   $message .= nl2br("We have received your Train Booking request.\nYour Train is set to depart on");
   
   $message .= " " . $form_data['tdate'] . " \r\n";
   $message .= "from " . $form_data['departure'] . "\r\n";
   $message .= "to " . $form_data['destination'] .  "\r\n";
   $message .= "exactly at ". $form_data['time'] . ".\r\n";
   $message .= nl2br(" \n ");
   $message .= nl2br("Report 30 minutes before your traveling time or ealier to process your ticket. \n\nPlease Keep Time.\n "); 
   $message .= nl2br(" \n ");
   $message .= nl2br("Note: Tickets are offered after payment at any of our Stations. \n\nThank You. ");     
   
  



   //PHPMailer Object
   $mail = new PHPMailer(); // create a new object
   $mail->IsSMTP(); // enable SMTP
   $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
   $mail->SMTPAuth = true; // authentication enabled
   $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
   
   $mail->Host = "smtp.gmail.com";
   $mail->Port = 465; // or  465/25/ 587 
   $mail->IsHTML(true);
   $mail->Username = "olalavictor01@gmail.com"; // Enter your Email
   $mail->Password = "olalavic"; // Enter your Email Password
   $mail->SetFrom("westerntrains@gmail.com");
   $mail->Subject = "WESTERN TRAINS BOOKING";
   $mail->Body = $message;
   $mail->AddAddress($email);

   if (!$mail->Send()) {
       echo "Mailer Error: " . $mail->ErrorInfo;
   } else {
    //    echo "<script>
    //        alert('Mail Sent Successfully');
    //        window.location.href='index.php';
          
    //        </script>";
   }

   $con = mysqli_connect("localhost","root","","western-train");
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
$selected_seat = $_POST['selected_seat'];
$sql = "INSERT INTO bookings (fname, lname, email, age, phone, gender, departure, destination, tdate, com, selected_seat, stat )
VALUES ('".$_POST['fname']."','".$_POST['lname']."','".$_POST['email']."','".$_POST['age']."','".$_POST['phone']."','".$_POST['gender']."','".$_POST['departure']."','".$_POST['destination']."','".$_POST['tdate']."','".$_POST['com']."', '".$_POST['selected_seat']."', 1)";
$sql2 = mysqli_query($con, "UPDATE trains SET booked_seats = (booked_seats + 1) WHERE id = $train_id");
$sql3 = mysqli_query($con, "UPDATE trains SET viti = CONCAT_WS(',', viti , $selected_seat) WHERE id = $train_id");
if (mysqli_query($con, $sql)) { 
  echo "<script>
  alert('Ticket booked Successfully. Check your email');
    </script>";
  header('location:feedback.php');
  
} else {
   echo '<script>alert("Your Ticket Booking Failed, Try again later") </script>' ;
   }

mysqli_close($con);


   ?>
  