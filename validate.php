<?php
session_start();
if(isset($_GET['ticket'])){
	
require("dbengine/dbconnect.php");
$order_ref=$_GET['ticket'];

if(empty($order_ref)){$order_ref=$_SESSION['ORDERREF'];};
$data=mysqli_query($conn,"SELECT * FROM booking_details WHERE order_ref='$order_ref'");
if(($data) && (mysqli_num_rows($data) >0)){?>
<html>
<!-- <style>
.ticketbox{
	
border:2px dashed grey;
font-family:tahoma;
font-size:14px;
display:inline-block;
width:330px;
height:auto;
border-radiud:7px;
padding:21px;
color:grey;
	
}
.ref{
font-family:inherit;
font-weight:bold;
color:green;	
}
</style> -->
<!-- <body onload="window.print();location.href='index.php'"> -->
<style>
		/* reset */

		* {
			border: 0;
			box-sizing: content-box;
			color: inherit;
			font-family: inherit;
			font-size: inherit;
			font-style: inherit;
			font-weight: inherit;
			line-height: inherit;
			list-style: none;
			margin: 0;
			padding: 0;
			text-decoration: none;
			vertical-align: top;
		}

		*[contenteditable] {
			border-radius: 0.25em;
			min-width: 1em;
			outline: 0;
		}

		*[contenteditable] {
			cursor: pointer;
		}

		*[contenteditable]:hover,
		*[contenteditable]:focus,
		td:hover *[contenteditable],
		td:focus *[contenteditable],
		img.hover {
			background: #DEF;
			box-shadow: 0 0 1em 0.5em #DEF;
		}

		span[contenteditable] {
			display: inline-block;
		}

		/* heading */

		h1 {
			font: bold 100% sans-serif;
			letter-spacing: 0.5em;
			text-align: center;
			text-transform: uppercase;
		}

		/* table */

		table {
			font-size: 75%;
			table-layout: fixed;
			width: 100%;
		}

		table {
			border-collapse: separate;
			border-spacing: 2px;
		}

		th,
		td {
			border-width: 1px;
			padding: 0.5em;
			position: relative;
			text-align: left;
		}

		th,
		td {
			border-radius: 0.25em;
			border-style: solid;
		}

		th {
			background: #EEE;
			border-color: #BBB;
		}

		td {
			border-color: #DDD;
		}

		/* page */

		html {
			font: 16px/1 'Open Sans', sans-serif;
			overflow: auto;
			padding: 0.5in;
		}

		html {
			background: #999;
			cursor: default;
		}
		body{
			background: #999;
		}

		main {
			box-sizing: border-box;
			/* height: 11in; */
			margin: 0 auto;
			overflow: hidden;
			padding: 0.5in;
			width: 8.5in;
		}

		main {
			background: #e7f8f4;
			border-radius: 1px;
			box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
		}

		/* header */

		header {
			margin: 0 0 3em;
		}

		header:after {
			clear: both;
			content: "";
			display: table;
		}

		header h1 {
			background: #000;
			border-radius: 0.25em;
			color: red;
			margin: 0 0 1em;
			padding: 0.5em 0;
		}

		header address {
			float: right;
			font-size: 75%;
			font-style: normal;
			line-height: 1.25;
			margin: 0 1em 1em 0;
		}

		header address p {
			margin: 0 0 0.25em;
		}

		header span,
		header img {
			display: block;
			float: left;
		}

		header span {
			margin: 0 0 1em 1em;
			max-height: 25%;
			max-width: 60%;
			position: relative;
		}

		header img {
			max-height: 100%;
			max-width: 100%;
		}

		header input {
			cursor: pointer;
			-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
			height: 100%;
			left: 0;
			opacity: 0;
			position: absolute;
			top: 0;
			width: 100%;
		}

		/* article */

		article,
		article address,
		table.meta,
		table.inventory {
			margin: 0 0 3em;
		}

		article:after {
			clear: both;
			content: "";
			display: table;
		}

		article h1 {
			clip: rect(0 0 0 0);
			position: absolute;
		}

		article address {
			float: left;
			font-size: 125%;
			font-weight: bold;
		}

		/* table meta & balance */

		table.meta,
		table.balance {
			float: right;
			width: 36%;
			border: 0px;
		}

		table.meta:after,
		table.balance:after {
			clear: both;
			content: "";
			display: table;
			border: 0px;
		}

		/* table meta */

		table.meta th {
			width: 40%;
			border: 0px;
		}

		table.meta td {
			width: 60%;
			border: 0px;
		}

		/* table items */

		table.inventory {
			clear: both;
			width: 100%;
			border: 0px;
		}

		table.inventory th {
			font-weight: bold;
			text-align: center;
			border: 0px;
		}

		table.inventory td:nth-child(1) {
			text-align: center;
			width: 26%;
			border: 0px;
		}

		table.inventory td:nth-child(2) {
			text-align: center;
			width: 38%;
			border: 0px;
		}

		table.inventory td:nth-child(3) {
			text-align: center;
			width: 12%;
			border: 0px;
		}

		table.inventory td:nth-child(4) {
			text-align: center;
			width: 12%;
			border: 0px;
		}

		table.inventory td:nth-child(5) {
			text-align: center;
			width: 12%;
			border: 0px;
		}
		table.inventory td:nth-child(6) {
			text-align: center;
			width: 12%;
			border: 0px;
		}
		/* table balance */

		table.balance th,
		table.balance td {
			width: 50%;
			border: 0px;
		}

		table.balance td {
			text-align: right;
			border: 0px;
		}

		/* aside */

		aside h1 {
			border: none;
			border-width: 0 0 1px;
			margin: 0 0 1em;
		}

		aside h1 {
			border-color: #000;
			border-bottom-style: solid;
		}


		/* aside */

		side h1 {
			border: none;
			border-width: 0 0 1px;
			margin: 0 0 1em;
		}

		side h1 {
			border-color: red;
			border-bottom-style: solid;
		}

		/* javascript */

		.add,
		.cut {
			border-width: 1px;
			display: block;
			font-size: .8rem;
			padding: 0.25em 0.5em;
			float: left;
			text-align: center;
			width: 0.6em;
		}

		.add,
		.cut {
			background: #9AF;
			box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
			background-image: -moz-linear-gradient(#00ADEE 5%, #0078A5 100%);
			background-image: -webkit-linear-gradient(#00ADEE 5%, #0078A5 100%);
			border-radius: 0.5em;
			border-color: #0076A3;
			color: #FFF;
			cursor: pointer;
			font-weight: bold;
			text-shadow: 0 -1px 2px rgba(0, 0, 0, 0.333);
		}

		.add {
			margin: -2.5em 0 0;
		}

		.add:hover {
			background: #00ADEE;
		}

		.cut {
			opacity: 0;
			position: absolute;
			top: 0;
			left: -1.5em;
		}

		.cut {
			-webkit-transition: opacity 100ms ease-in;
		}

		tr:hover .cut {
			opacity: 1;
		}

		@media print {
			/* * {
				-webkit-print-color-adjust: exact;
			} */

			/* html {
				background: none;
				padding: 0;
			} */

			#printBtn{
				display: none;
			}

			main {
				box-shadow: none;
				margin: 0;
			}

			span:empty {
				display: none;
			}

			.add,
			.cut {
				display: none;
			}
		}

		@page {
			margin: 0;
		}
	}
	</style>

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
			<p>(+254) 716 311 660</p>
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
			<p align="center">Email :- info@busbooking.com || Web :- www.busbooking.com || Phone :- (+254) 716 311660 </p>
		</div>
	</aside>

	

	<h1 style="margin-top: 8rem;"><span>Thank You!</span></h1>

	</main>
	
		</form>
</body>

</html>

