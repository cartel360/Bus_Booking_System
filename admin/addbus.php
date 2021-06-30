<?php require ("session.php")?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
    <meta content="Semantic-UI-Forest, collection of design, themes and templates for Semantic-UI." name="description" />
    <meta content="Semantic-UI, Theme, Design, Template" name="keywords" />
    <meta content="PPType" name="author" />
    <meta content="#ffffff" name="theme-color" />
    <title>Admin Dashboard</title>
    <link href="static/dist/semantic-ui/semantic.min.css" rel="stylesheet" type="text/css" />
    <link href="static/stylesheets/default.css" rel="stylesheet" type="text/css" />
    <link href="static/stylesheets/pandoc-code-highlight.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">
    <script src="static/dist/jquery/jquery.min.js"></script>
	<script src="admin.js"></script>
  </head>
  <body>

    
    <div class="ui inverted huge borderless fixed fluid menu">
      <a class="header item">BUS RESERVATION SYSTEM</a>
      <div class="right menu">
        <div class="item">
          <div class="ui small input">
		  <form>
            <input placeholder="Search order.." name="search" />
			</form>
          </div>
        </div>
        <a class="item" href="logout.php">Log out</a>
      </div>
    </div>
	
    <div class="ui grid">
      <div class="row">
        <div class="column" id="sidebar">
          <div class="ui secondary vertical fluid menu">
            <a class="item" href="bookings.php">Bookings</a>
            <a class="active item" href="addbus.php">Add Bus</a>
            <a class="item" href="routes.php">Add Routes</a>
            <a class="item" href="transactions.php">Transactions</a>
            <a class="item" href="travelclass.php">Traveling Classes</a><a class="item">Export</a>
			<a class="item" href="developer.php">About developer</a>
          </div>
        </div>
		
        <div class="column" id="content" style="display:none">
	<div class="ui grid">
            <div class="row">   
											
						
				
				</div>
					<div class="pb-20">
						<table class="table table-striped">
							<thead>
								<tr>
                
                <th scope="col">Bus</th>
                
                
                <th scope="col">Seats</th>
                <th scope="col">Booked Seats</th>
				<th scope="col">Ava. Seats</th>
			
				<th scope="col">Remove bus</th>
                
              </tr>
							</thead>
							<tbody>
							<?php
							 		include('db.php');	
							  $sql = "SELECT * FROM `trains`";
							  $re = mysqli_query($con,$sql);
							  
						
										while($row = mysqli_fetch_array($re))
										{
										
											$id = $row['id'];
											$ava = $row['seats']- $row['booked_seats'];
											
											if($id % 2 ==1 )
											{
												echo"<tr class='gradeC'>
												
												<td>".$row['name']."</td>													
												
												<td>".$row['seats']."</td>												
                                                <td>".$row['booked_seats']."</td>
												<th scope='row'>$ava</th>
                                                
                                               
												
													<td><a href=delbus.php?eid=".$id ." <button class='btn btn-danger'> <i class='fa fa-edit' ></i> Remove</button></td>
												</tr>";
											}
											else
											{
												echo"<tr class='gradeU'>
												<td>".$row['name']."</td>	
												
												<td>".$row['seats']."</td>												
                                                <td>".$row['booked_seats']."</td>
												<th scope='row'>$ava</th>
                                                
                                               
												
												<td><a href=delbus.php?eid=".$id ." <button class='btn btn-danger'> <i class='fa fa-edit' ></i> Remove</button></td>
																										
																							
												
												</tr>";
											
											}
										
										}
										
									?>
	
							</tbody>
						</table>


					</div>
				
				</div>
				<div class="panel-body">
        	<button class='btn btn-primary btn text-center' data-toggle='modal' data-target='#myModal' style="float:left; margin-right:9rem;">
														Add Bus
							</button>
                            
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color:red; font-size:40px;">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel"></h4>
                                        </div>
										<form name="form" method="post" action="#">
					
						<div class="form-group row" style="margin-left:1rem;">
							<label class="col-sm-12 col-md-2 col-form-label">Bus</label>
							<div class="col-sm-6 col-md-8">
							<input type="text" class="form-control" name="name" type="number" required="">
							</div>
						</div>
					

						

						<div class="form-group row" style="margin-left:1rem;">
														
							<label class="col-sm-12 col-md-2 col-form-label">Seats</label>
							<div class="col-sm-6 col-md-3">
								<input class="form-control" value="1" name="seat" type="number" required="">
							</div>
						</div>
									
					
						<div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<input type="submit" name="submit" value="Add" class="btn btn-primary">
							 </form>
							 </div>
			
						
				</form>
										   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
      
	  </div>
    </div>

    
    <style type="text/css">
      body {
        display: relative;
      }
      
      #sidebar {
        position: fixed;
        top: 51.8px;
        left: 0;
        bottom: 0;
        width: 18%;
        background-color: #008000;
        padding: 0px;
      }
      #sidebar .ui.menu {
        margin: 2em 0 0;
        font-size: 16px;
      }
      #sidebar .ui.menu > a.item {
        color: #337ab7;
        border-radius: 0 !important;
      }
      #sidebar .ui.menu > a.item.active {
        background-color: #8B4513;
        color: white;
        border: none !important;
      }
      #sidebar .ui.menu > a.item:hover {
        background-color: #4f93ce;
        color: white;
      }
      
      #content {
        margin-left: 19%;
        width: 81%;
        margin-top: 3em;
        padding-left: 3em;
        float: left;
      }
      #content > .ui.grid {
        padding-right: 4em;
        padding-bottom: 3em;
      }
      #content h1 {
        font-size: 36px;
      }
      #content .ui.divider:not(.hidden) {
        margin: 0;
      }
      #content table.ui.table {
        border: none;
      }
      #content table.ui.table thead th {
        border-bottom: 2px solid #eee !important;
      }
    </style>
    <script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<!-- buttons for Export datatable -->

	<!-- Datatable Setting js -->
	<script src="vendors/scripts/datatable-setting.js"></script>
  </body>
</html>
<?php
       				
							 if (isset($_POST['submit'])){
							
							// Create connection
							$con = mysqli_connect("localhost","root","","booking_db") or die(mysql_error());
							//$x = "SELECT * FROM addbus WHERE seat";
							
							$y = "SELECT COUNT(*) FROM addbus As booked";
											
								 // $total = $x - $y;                 
							
							
							// Check connection
							if (!$con) {
							  die("Connection failed: " . mysqli_connect_error());
							}
                            $sql = "INSERT INTO trains (name, seats)
							VALUES ('".$_POST['name']."', '".$_POST['seat']."')";
		
							
							if (mysqli_query($con, $sql)) {
							//echo "<script type='text/javascript'> alert('You've added bus successfully')</script>"; 
							
							echo "<script>
							alert('Bus added Successfully');
							window.location.href='addbus.php';
							</script>";
							
							  
							} else {
							   echo '<script>alert("Fill out the requirements correctly") </script>' ;
							}
							
							}
							mysqli_close($con);
							?>