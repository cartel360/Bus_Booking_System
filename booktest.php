<?php
include('db.php');
$id = $_REQUEST['eid'];
$query = mysqli_query($con, "SELECT * FROM routes WHERE train_id = '$id' ");
while ($row = mysqli_fetch_array($query)) {
  $departure = $row['departure'];
  $destination = $row['destination'];
  $date = $row['date'];
  $time = $row['time'];

?>
  <!DOCTYPE html>
  <html>

  <head>
    <title>Western Train | Booking Your Ticket</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/formstyle.css">
  </head>
  <style>
    .home a {
      color: rgb(248, 32, 3);

    }

    .home a:hover {
      color: rgb(3, 19, 247);
    }
  </style>

  <body>
    <section class="breadcrumbs" style="margin-left: 6rem;">
      <div class="d-flex justify-content-between align-items-center">
        <div class="home">
          <p style="margin-top: 2rem; font-weight: bold; color: black;"><a href="index.php"> Home</a> / Booking
          </p>

        </div>

        <div class="name" style="margin-right:3rem; font-weight:bold; color:blue;">
          <span class="price">WESTERN TRAIN SYSTEM </a></span>
        </div>

      </div>
    </section>
    <main class="page payment-page">

      <section class="payment-form dark">
        <div class="container">
          <div class="block-heading">
            <h2>BOOKING FORM</h2>
            <p>Secure your Ticket with us Now!</p>
          </div>
          <form method="POST" action="mail.php">
            <div class="products">
              
              <h3 class="title">Travelling</h3>
              <div class="item">
                <span class="price"><input type="text" name="departure" value="<?php echo $departure; ?>" readonly class="form-control" style="background-color: transparent; border:0px;"></span>
                <p class="item-name">From</p>
               
              </div>
              <div class="item">
                <span class="price"><input type="text" name="destination" value="<?php echo $destination; ?>" readonly class="form-control" style="background-color: transparent; border:0px;"></span>
                <p class="total">To</p>
               
              </div><!---->
              <div class="total">Date<span class="price"><input type="text" name="tdate" value="<?php echo $date; ?>" readonly class="form-control" style="background-color: transparent; border:0px;"></span></div>
              <div class="total">Time<span class="price"><input type="text" name="time" value="<?php echo $time; ?>" readonly class="form-control" style="background-color: transparent; border:0px;"></span></div>
              <input type="text" value="<?php echo $id ?>" name="the_id" hidden style="display:none;">
            </div>
            <div class="card-details">
              <h3 class="title">Personal Details</h3>
              <div class="row">

                <div class="form-group col-sm-6">
                  <label for="card-holder">First Name</label>
                  <input id="card-holder" type="text" class="form-control" placeholder="Olala" name="fname" required>
                </div>
                <div class="form-group col-sm-6">
                  <label for="">Last Name</label>
                  <div class="input-group expiration-date">
                    <input type="text" class="form-control" placeholder="Victor" name="lname" required>

                  </div>
                </div>
                <div class="form-group col-sm-6">
                  <label for="card-number">Email</label>
                  <input id="card-number" type="email" class="form-control" placeholder="olalavictor@gmail.com" name="email" required>
                </div>
                <div class="form-group col-sm-6">
                  <label for="cvc">Gender</label>
                  <select class="custom-select col-12" name="gender">
                    <option selected="" disabled>Choose gender</option>
                    <option>Male</option>
                    <option>Female</option>

                  </select>
                </div>
                <div class="form-group col-sm-6">
                  <label for="card-holder">Age</label>
                  <input id="card-holder" type="number" class="form-control" placeholder="20" name="age" required>
                </div>
                <div class="form-group col-sm-6">
                  <label for="">Phone Number</label>
                  <div class="input-group expiration-date">
                    <input type="number" class="form-control" placeholder="2547******60" name="phone" required>

                  </div>
                </div>
                <div class="form-group col-sm-6">
                  <label for="card-holder">How would you like to be reached ?</label>
                  <select class="custom-select col-12" name="com">
                    <option selected="" disabled>Choose Mode of Communication</option>
                    <option>Email</option>
                    <option>Phone</option>

                  </select>
                </div>
                <div class="form-group col-sm-6">
                  <label for="card-holder">Choose Seat</label>
                  <?php
                  $result = mysqli_query($con, "SELECT * FROM trains WHERE id='$id'");
                  while ($row = mysqli_fetch_array($result)) {
                    $total_seats = $row['seats'];
                    $booked_seats = $row['booked_seats'];
                    $viti = $row['viti'];
                    
                    $seats_arr = preg_split("/\,/", $viti);

                    $range = range(1,$total_seats);

                    $newunselected = array_diff($range,$seats_arr); //Your new array you can foreach this

                  
                  ?>
                  <select class="custom-select col-12" name="selected_seat">
                    <option selected="" disabled>Choose your seat</option>
                    <?php
                    foreach ($newunselected as $item) {
                      ?>
                      <option value="<?php echo $item; ?>"><?php echo "Seat ", $item; ?></option>
                          <?php
                        }
                  }
                    ?>
                  </select>
                </div>
                <div class="form-group col-sm-12">
                  <button type="submit" name="submit" class="btn btn-primary btn-block">Book Your Ticket</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </section>
    </main>
  </body>
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </body>

  </html>


  <?php

  include('db.php');


  if (isset($_POST['sub'])) {

    $selected_seat = $_POST['selected_seat'];

    // Create connection
    $con = mysqli_connect("localhost", "root", "", "western-train");

    // Check connection
    if (!$con) {
      die("Connection failed: " . mysqli_connect_error());
    }


    $sql3 = mysqli_query($con, "UPDATE trains SET viti = CONCAT_WS(' ', viti , $selected_seat) WHERE id = $train_id");
    
    if (mysqli_query($con, $sql3)) {
      //echo "<script type='text/javascript'> alert('You've added Train successfully')</script>"; 

      echo "<script>
                  alert('Test Successfully');
                  window.location.href='mail.php';
                  </script>";
    } else {
      //echo mysqli_error($con);
      echo '<script>alert("Your Ticket Booking Failed, Try again later") </script>';
    }
  }
  mysqli_close($con);
  ?>

<?php
}
?>