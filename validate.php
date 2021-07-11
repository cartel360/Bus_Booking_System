<?php
session_start();
if(isset($_GET['ticket'])){
	
require("dbengine/dbconnect.php");
$order_ref=$_GET['ticket'];

if(empty($order_ref)){$order_ref=$_SESSION['ORDERREF'];};
$data=mysqli_query($conn,"SELECT * FROM booking_details WHERE order_ref='$order_ref'");
if(($data) && (mysqli_num_rows($data) >0)){?>
<html>
<link rel="stylesheet" href="ticket.css" type="text/css">

<?php
	
		
//generating fields
$row=mysqli_fetch_assoc($data);
$fullname=$row['fullname'];	
$destination=$row['destination'];
$traveldate=$row['date_reserved'];
$travelclass=$row['class_reserved'];
$seats=$row['seats_reserved'];
$gender = $row['gender'];
$email=$row['EmailId'];
$all=$seats;
$amount=$row['amount'];
$paymethod=$row['account'];
$code=$row['transaction_id'];
mysqli_close($conn);
while($seats>0){
// echo("<div class='ticketbox'>");
// echo ("<a> ORDER REF:</a> <span class='ref'>$order_ref</span>"); 	
// echo("<ul><li>TICKET OWNER: ".$fullname." </li>
// <li>DESTINATION: ".$destination."</li>
// <li>DATE OF TRAVEL: ".$traveldate."</li>
// <li>TRAVEL CLASS: ".$travelclass."</li>
// <li>SEAT ID: ".$seats." of ".$all."</li>
// <li>AMOUNT PAYING: ".$amount." Via ".$paymethod." Transaction ID: ".$code."</li>
// </ul>");
echo ("</div>");
$seats--;
$s=$all+0;
$p=$amount+0;
$ttl=$s * $p;
}
echo("</body></html>");
}		
}

?>
<head>
	<meta charset="utf-8">
	<title><?php echo  $fullname ?> Ticket </title>

	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css">


	<script src="script.js"></script>
	
</head>

<body>
	<form method="POST">

<button class="btn btn-primary" onclick="print()" id="printBtn"><i class="fa fa-download"></i> Download </button>	

<main>


	<header>
		<h1>Receipt</h1>
		<address>
			<p>BUS BOOKING SYSTEM,</p>
			<p>Nairobi,<br>Kenya.</p>
			<p>(+254) 712 638511</p>
		</address>
		<span style="margin-top:-8rem;"><img alt="" src="vendors/images/trainlogo.png"></span>

	</header>
	<side>
		<h1 style="margin-top:6rem;margin-bottom:3rem;"><span></span></h1>
	</side>


	
	<article>
		<h1>Recipient</h1>
		<address>
			
		<input type="text" name="fname" placeholder="id" value=<?php echo  $fullname ?> hidden/>
			<p><?php echo  $fullname ?> <br></p>
		
			
			<p><span style="font-size: 10px;"><?php echo $travelclass ?></span><p>
				
		</address>
		<table class="meta">
			<tr>
				<th style="border: 0px; font-size: 15px; font-weight:bold;"><span>Seats.</span></th>
				<td style="font-weight: bold; font-size: 20px;"><span><?php echo $all; ?> </span></td>
				<!-- <td style="font-weight: bold; font-size: 20px;"><span>00102</span><span><?php echo $id; ?></span></td> -->
			</tr>
			<tr>
				<th><span>Booking Date</span></th>
				<td><span><?php echo date(" d/m/Y"); ?> </span></td>
				
				
			</tr>

		</table>
		<table class="inventory">
			<thead>
				<tr>
					<th><span>Receipt Number</span></th>
					<th><span>Destination</span></th>
					<th><span>Travelling Date</span></th>
					<th><span>Gender</span></th>
					<th><span>Address.</span></th>
					<th><span>Price</span></th>

				</tr>
			</thead>
			<tbody>
				<tr>
					<td><span><?php echo $order_ref; ?> </span></td>
					<td><span><?php echo $destination; ?> </span></td>
					<td><span><?php echo $traveldate; ?></span></td>
					<td><span><?php echo $gender; ?> </span></td>
					<td><span><?php echo $email; ?> </span></td>
					<td><span data-prefix>Ksh. </span><span><?php echo $amount; ?></span></td>
				</tr>

			</tbody>
		</table>

	<table class="balance">
		<tr>
			<th><span>Total</span></th>
			<td><span data-prefix>Ksh. </span><span><?php echo $amount; ?></span></td>
		</tr>
		<tr>
			<th><span>Balance Due</span></th>
			<td><span data-prefix>Ksh. </span><span>0.00</span></td>
		</tr>
		<tr>
			<th><span>Amount Paid</span></th>
			<td><span data-prefix></span><span style="font-weight: bold; font-size: 25px;"><small style="font-size: 15px;" >Ksh. </small><?php echo $ttl; ?></span></td>
		</tr>
	</table>
	</article>

	<aside>
		<h1><span>Contact us</span></h1>
		<div>
			<p align="center">Email :- info@busbooking.com || Web :- www.busbooking.com || Phone :- (+254) 712 638511 </p>
		</div>
	</aside>

	

	<h1 style="margin-top: 8rem;"><span>Thank You!</span></h1>

	</main>
	
		</form>
</body>

</html>

