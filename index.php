<?php

 include "db.php";
 include "header.php";

?>
  <body>

  	<section>
  		<div class="container">
  			<div class="row">
  				<div class="col-md-12">
  					<h1 class="heading">All Users Data</h1>

  <!--Table start-->
  	<table class="table table-striped">
          <thead class="thead-dark">
    <tr>
      <th scope="col">Serial</th>
      <th scope="col">Avatar</th>
      <th scope="col">Full Name</th>
      <th scope="col">Father's Name</th>
      <th scope="col">Email Id</th>
      <th scope="col">Phone No.</th>
      <th scope="col">Address</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  	<?php 
  	$query = "SELECT * FROM users";
  	$all_users = mysqli_query($db, $query);

  	while ( $row = mysqli_fetch_assoc($all_users) ) {
  		$id           = $row['id'];
  		$name         = $row['name'];
  		$email        = $row['email'];
  		$phone        = $row['phone'];
  		$address      = $row['address'];
  		$father_name  = $row['father_name'];
  		$avatar       = $row['avatar'];
  	?>

  	<tr>
      <th scope="row"><?php echo $id; ?></th>
      <td>
      	<?php 
      	  if (!empty($avatar)) { ?>
      	  	<img src="img/<?php echo $avatar; ?>" class = "avatar"></td>
      	  <?php } 

      	  else{ ?>
      	  	<img src="img/default.png" class = "avatar"></td>

      	  <?php } 

      	?>
      	
      <td><?php echo $name; ?></td>
      <td><?php echo $father_name; ?></td>
      <td><?php echo $email; ?></td>
      <td><?php echo $phone; ?></td>
      <td><?php echo $address; ?></td>
      <td>
      	<div class="btn-group">
      		<a href="update.php?update=<?php echo $id; ?>" class="btn btn-warning btn-sm">Update</a>
      		<a href="index.php?delete=<?php echo $id; ?>" class="btn btn-danger btn-sm">Delete</a>
      		
      	</div>
      </td>

    </tr>

  
  	<?php  }

  ?>



  </tbody>
</table>
 <!--Table End-->

            <a href="create.php" class="btn btn-primary">Add New User</a>

  					
  				</div>
  			</div>
  		</div>

  	</section>

  	<?php

  	// delete query

  	if ( isset($_GET['delete']) ) {
  		$the_user = $_GET['delete'];

  		$query = "DELETE FROM users WHERE id = '$the_user' ";

  		 $deleteUser = mysqli_query($db, $query);

                if ($deleteUser) {
                  header("location:index.php");
                }
                else {
                  die("Database Not Connected" .mysqli_error($db));
                } 
  	}

  ?>

  <?php  include "footer.php"; ?>

   

   




